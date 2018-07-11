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

    public function submitForm(Request $req)
    {

        $success = 0;
        $user = Auth::user();
        if(FormModel::checkForm($user->id) == 0){
        $form = new FormModel();
        $form->firstname = Session()->get('firstname');
        $form->lastname = Session()->get('lastname');
        $form->streetAddress = Session()->get('streetAddress');
        $form->city = Session()->get('city');
        $form->stateRegion = Session()->get('state');
        $form->zip = Session()->get('zip');
        $form->country = Session()->get('country');
        $form->contactPhone = Session()->get('phone');
        $form->age = Session()->get('age');
        $form->gender = Session()->get('gender');
        $form->email = Session()->get('email');
        $form->height = Session()->get('height');
        $form->weight = Session()->get('weight');
        
        $form->user_id = $user->id;

        $form->applied_for_ana_year =  Session()->get('applied_for_ana_year');
        $form->applied_for_ana = Session()->get('applied_for_ana');
        $form->airline = Session()->get('airline');
        $form->work_experience = Session()->get('work_experience');
        $form->japanese_culture =  Session()->get('japanese_culture');
        $form->internation_experience =  Session()->get('internation_experience');
        $form->japanese_lang =  Session()->get('japanese_lang');
        $form->school_name =  Session()->get('school_name');
        $form->school_year = Session()->get('school_year');
        $form->employer_name = Session()->get('employer_name');
        $form->employer_year = Session()->get('employer_year');

        $form->passportNumber = Session()->get('passportNumber');
        $form->passportExpiry = Session()->get('passportExpiry');
        $form->toeicScore = Session()->get('toeic_score');
        $form->universityName = Session()->get('uni_name');

        //request
        $additionalText = $req->input('cv_additional_text');
        $form->coverLetter = $additionalText;
        $form->tatoo = $req->input('tatoo');
        $form->glasses = $req->input('glasses');
        $form->japanase = $req->input('study_japanese_if_hired');
        $form->confirm = $req->input('confirm_form');

        $destination = "./uploads";
        //files
        if($form->save()){
        $passportFile = $req->file('passport_file');
        $pName = $passportFile->getClientOriginalName();
        $extP = $passportFile->getClientOriginalExtension();
            $success++;
        // $thaicard_file = $req->file('thai_id_card');
        // $tCard = $thaicard_file->getClientOriginalName();
        // $extC = $thaicard_file->getClientOriginalExtension();



        $score_file = $req->file('toeic_score_card');
        $sF = $score_file->getClientOriginalName();
        $extS = $score_file->getClientOriginalExtension();


        
        $cv_file = $req->file('cv_file');
        $cF = $cv_file->getClientOriginalName();
        $extCV = $cv_file->getClientOriginalExtension();


        if($passportFile->move($destination,"000".$form->id."pp".".".$extP))
        {
            $form->passportFileName = "000".$form->id."pp".".".$extP;
            $form->save();
            $success++;

        }

        // if($thaicard_file->move($destination,"000".$form->id."id".".".$extC))
        // {
        //     $form->idCardFileName  = "000".$form->id."id".".".$extC;
        //     $form->save();
        // }


        if($score_file->move($destination,"000".$form->id."to".".".$extS))
        {
            $form->toeicFileName  = "000".$form->id."to".".".$extS;
            $form->save();
            $success++;

        }

        if($cv_file->move($destination,"000".$form->id."cv".".".$extCV))
        {
            $form->cvFileName  = "000".$form->id."cv".".".$extCV;
            $form->save();
            $success++;

        }

        }
        else 
        {
        return redirect()->back()->with('error','Error Occurred in Submitting the Application. Please try again.');

        }

        if($success > 0)
        {
        return redirect()->back()->with('success','Application Submitted.');
            
        }
        else 
        {
            return redirect()->back()->with('error','Error Occurred in Submitting the Application. Please try again.');

        }
        
    }
    else 
    {
        return redirect()->back()->with('error','You have already submitted the Application.');
    }
        
    }
}
