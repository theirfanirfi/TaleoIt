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
        $applied_for_ana_year = "";
        $applied_for_ana = $data['applied_for_ana'];

        $school_name = "";
        $school_year = "";
        $employer_name = "";
        $employer_year = "";


        if($applied_for_ana == "D" || $applied_for_ana == "C")
        {
            $applied_for_ana_year = $data['applied_for_ana_year'];
        }
        else 
        {
            Session()->forget('applied_for_ana_year');
        }

        $airline = $data["airline"];
        $work_experience = $data['work_experience'];
        $japanese_culture = $data['japanese_culture'];
        $internation_experience = $data['internation_experience'];
        $japanese_lang = $data['japanese_lang'];

        if($japanese_lang == "D")
        {
            if(!empty($data['school_name']))
            {
                $school_name = $data['school_name'];
                $school_year = $data['school_year'];
                Session()->forget('employer_name');
                Session()->forget('employer_year');
            }
            else if(!empty($data['employer_name']))
            {
                $employer_name = $data['employer_name'];
                $employer_year = $data['employer_year'];
                Session()->forget('school_name');
                Session()->forget('school_year');
            }
        }

        Session()->put('applied_for_ana',$applied_for_ana);
        Session()->put('applied_for_ana_year',$applied_for_ana_year);
        Session()->put('airline',$airline);
        Session()->put('work_experience',$work_experience);
        Session()->put('japanese_culture',$japanese_culture);
        Session()->put('internation_experience',$internation_experience);
        Session()->put('japanese_lang',$japanese_lang);
        Session()->put('school_name',$school_name);
        Session()->put('school_year',$school_year);
        Session()->put('employer_name',$employer_name);
        Session()->put('employer_year',$employer_year);
        

        echo json_encode($response);
    }

    public function stepthree(Request $req)
    {
        $data = $req->input('data');
        $passportNumber = $data[0];
        $passportExpiry = $data[1];
        $toeic_score = $data[2];
        $uni_name = $data[3];

        Session()->put('passportNumber',$passportNumber);
        Session()->put('passportExpiry',$passportExpiry);
        Session()->put('toeic_score',$toeic_score);
        Session()->put('uni_name',$uni_name);
        $response['data'] = $data;
        $response['error'] =  false;
        echo json_encode($response);
    }
}
