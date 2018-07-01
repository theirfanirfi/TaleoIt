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
}
