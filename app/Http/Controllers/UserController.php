<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\FormModel;
use Auth;
class UserController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $form = FormModel::whereUser_id($user->id);
        return view('user.form',['user' => $user, 'form' => $form]);
    }
}
