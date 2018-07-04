<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('user.form',['user' => $user]);
    }
}
