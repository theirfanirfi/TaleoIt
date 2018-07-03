<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
class ClientController extends Controller
{
    //

    public function index()
    {
        return view('client.index');
    }

    public function submittedForms()
    {
        return view('client.submittedforms');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('client.profile',['user' => $user]);
    }

    public function updateProfile(Request $req)
    {
        $user = Auth::user();
        $name = $req->input('fullname');
        $email = $req->input('email');
        $user->name = $name;
        $user->email = $email;
        if($user->save())
        {
            return redirect()->back()->with('success','Profile Updated.');
        }
        else
        {
            return redirect()->back()->with('error','Erro occurred in updating the Profile. Try Again.');
        }
    }

    public function changePassword(Request $req)
    {
        $user = Auth::user();
        $currentPassword = $req->input('currentPassword');
        $newPassword = $req->input('newPassword');
        if($currentPassword != "" && $newPassword != ""){
        if(Hash::check($currentPassword,$user->password))
        {
            $user->password = Hash::make($newPassword);
            if($user->save())
            {
                return redirect()->back()->with('success','Password Updated.');
            }
            else
            {
                return redirect()->back()->with('error','Erro occurred in changing the Password. Try Again.');
            }
        }
        else
        {
            return redirect()->back()->with('error','Invalid Current Password.');
        }
    }
    else
    {
        return redirect()->back()->with('error','Password Fields are required.');
    }

    }
}
