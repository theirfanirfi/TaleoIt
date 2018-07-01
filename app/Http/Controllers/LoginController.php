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
        echo "<pre>";
        var_dump($req->input());
        echo "</pre>";
    }

    public function loginClient(Request $req)
    {
        echo "<pre>";
        var_dump($req->input());
        echo "</pre>";
    }

    public function checkEmail($email)
    {
        $user = User::whereEmail($email)->first();
        if($user->count() > 0)
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    }
}
