<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
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
                 return redirect('/client');
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
            return redirect('/client');
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
        return redirect('/login');
    }

  
}