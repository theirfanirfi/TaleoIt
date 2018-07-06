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

    public function stepone(Request $req)
    {
        $data = $req->input('data');
        $response['error'] = false;

        Session()->put('firstname',$data[0]);
        Session()->put('lastname',$data[1]);
        Session()->put('streetAddress',$data[2]);
        Session()->put('city',$data[3]);
        Session()->put('state',$data[4]);
        Session()->put('zip',$data[5]);
        Session()->put('country',$data[6]);
        Session()->put('phone',$data[7]);
        Session()->put('age',$data[8]);
        Session()->put('gender',$data[9]);
        Session()->put('email',$data[10]);
        Session()->put('height',$data[11]);
        Session()->put('weight',$data[12]);

        echo json_encode($response);
    }

    public function steptwo(Request $req)
    {
        $data = $req->input('data');
        $response['error'] = false;
        
        echo json_encode($response);
    }
}
