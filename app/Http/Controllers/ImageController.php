<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Auth;
use App\Http\Models\FormModel;

class ImageController extends Controller
{
    //

    public function getFile($filename)
    {
    //return $image = File::get('uploads/'.$name);
       // return response()->make($image,200,['content-type' => 'image/jpg']);
       //return \Image::make(storage_path($name))->response();
       
       if(Auth::user())
       {
       $user = Auth::user();
        if(FormModel::where(['user_id' => $user->id, 'passportFileName' => $filename])->count() > 0){
       return response()->download(storage_path('app/'.$filename), null, [], null);
        }
        else 
        {
            $data = "You may be facing the error due to the following reasons: <br/>";
            $data .= "<li>The File does not belong to you.</li>";
            $data .= "<li>The File does not exist.</li>";
            $data .= "<li>Your session is expired.</li>";
            return $data;
        }
       }
       else 
       {
           $data = "You may be facing the error due to the following reasons: <br/>";
           $data .= "<li>The File does not belong to you.</li>";
           $data .= "<li>The File does not exist.</li>";
           $data .= "<li>Your session is expired.</li>";
           return $data;
       }
    }
}
