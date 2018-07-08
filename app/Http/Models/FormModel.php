<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    protected $table = "formmodel";
    protected $primaryKey = "id";

    public static function checkForm($user_id)
    {
        return FormModel::where(['user_id'=>$user_id])->count();
    }
}
