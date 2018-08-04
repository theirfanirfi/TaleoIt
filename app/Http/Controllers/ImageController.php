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
       if(Auth::user())
       {    
       $user = Auth::user();
       if($user->role != 2){
       $form = FormModel::where(['user_id' => $user->id])->Where(function($query) use ($filename) { 
        $query->where([ 'passportFileName' => $filename])->orWhere([ 'cvFileName' => $filename])->orWhere([ 'toeicFileName' => $filename]);
       });
        if($form->count() > 0){
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
       return response()->download(storage_path('app/'.$filename), null, [], null);
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
