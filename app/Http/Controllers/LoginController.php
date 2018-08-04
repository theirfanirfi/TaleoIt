<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Models\Settings;
use Auth;

class LoginController extends Controller
{
    //

    public function registerClient(Request $req)
    {
        $email = $req->input('email');
        $name = $req->input('fullname');
        $password = $req->input('password');
        $user = new User();
        if($user->checkEmail($req->input('email')) > 0)
        {
            return redirect()->back()->with('error',$req->input('email'). ' is already taken. Use another one.');
        }
        else
        {
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            if($user->save())
            {
                
                $credentials = $req->only('email','password');
                if(Auth::attempt($credentials))
                {
                 return redirect('/apply');
                }
                else
                {
                 return redirect('/login');
                }
            }
            else
            {
                return redirect()->back()->with('error','Error occurred during registeration. Please try again later.');
      
            }
        }
    }

    public function loginClient(Request $req)
    {
        $user = User::whereEmail($req->input('email'));
        if($user->count() > 0)
        {
           $credentials = $req->only('email','password');
           if(Auth::attempt($credentials))
           {
               $setting = Settings::all()->first();
               Session()->put('startstop',$setting->application);
               switch($user->first()->role)
               {
                   case 1:
                   return redirect('/admin');
                   break;
                   case 2:
                   if($user->first()->isFullAccess == 1)
                   {
                       Session()->put('Access',"1");
                   }
                   else 
                   {
                    Session()->put('Access',"0");
                   }
                   return redirect('/admin');
                   break;
                   case 3:
                   return redirect('/apply');
                   break;
                   default:
                   return redirect('/login');



               }
           }
           else
           {
            return redirect()->back()->with('error',"Invalid Credentials."); 
           }
        }
        else
        {
            return redirect()->back()->with('error',"Invalid Credentials."); 
        }
    }

    public function logOut()
    {
        Auth::logout();
        Session()->flush();
        $exitCode = \Artisan::call('cache:clear');
        return redirect('/login');
    }

    public function credentialsAnswered(Request $req)
    {
        $email = $req->input('email');
        $question = $req->input('security');
        $answer = $req->input('answer');

        $user = User::where(['email' => $email, 'securityQuestion' => $question, 'answer' => $answer]);
        if($user->count() > 0)
        {
            Session()->put('password_reset_id',$user->first()->id);
            return redirect('/resetPassword');
        }
        else 
        {
            return redirect()->back()->with('error',"Invalid Credentials."); 

        }
    }

    public function resetPassword()
    {
        if(Session('password_reset_id') != null){
        return view('resetPassword');

        }
        return redirect('/');
    }

    public function processReset(Request $req)
    {
        $user = User::find(Session('password_reset_id'));
        $nPassword = $req->input('new_password');
        $cPassword = $req->input('confirm_password');

        if($nPassword == "" || $cPassword == "")
        {
            return redirect()->back()->with('error','All Field are Required.');
        }
        else if($nPassword !== $cPassword)
        {
            return redirect()->back()->with('error','New Password and Confirm Password mismatched.');

        }
        else 
        {
            $user->password = Hash::make($nPassword);
            if($user->save())
            {
                Session()->forget('password_reset_id');
            return redirect('/login')->with('success','Password Changed.');

            }
            else 
            {
            return redirect()->back()->with('error','Error Occurred in Reseting the Password. Try Again.');

            }
        }
    }

  
}
