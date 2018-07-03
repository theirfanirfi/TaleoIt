<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
