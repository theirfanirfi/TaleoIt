<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\FormModel;
use App\Http\Models\Settings;
use App\User;
use Auth;
class UserController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $setting = Settings::all()->first();
        $form = FormModel::whereUser_id($user->id)->where(['isWithDrawn' => 0]);
        return view('user.formm',['user' => $user, 'form' => $form, 'setting' => $setting]);
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
        $airline = "";
        $airlinePosition = "";


        if($applied_for_ana == "D" || $applied_for_ana == "C")
        {
            $applied_for_ana_year = $data['applied_for_ana_year'];
        }
        else 
        {
            Session()->forget('applied_for_ana_year');
        }

        $airline = $data["airline"];
        $airlinePosition = $data["airlinePosition"];
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
        Session()->put('airlinePosition',$airlinePosition);
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
        $form->firstname = $req->input('firstname');
        $form->lastname = $req->input('lastname');
        $form->streetAddress = $req->input('streetAddress');
        $form->city = $req->input('city');
        $form->stateRegion = $req->input('stateRegion');
        $form->zip = $req->input('zip');
        $form->country = $req->input('country');
        $form->contactPhone = $req->input('contactPhone');
        $form->age = $req->input('age');
        $form->gender = $req->input('gender');
        $form->email = $req->input('email');
        $form->height = $req->input('height');
        $form->weight = $req->input('weight');
        
        $form->user_id = $user->id;


        $form->applied_for_ana = $req->input('applied_for_ana');

        if($req->input('applied_for_ana') == "D" || $req->input('applied_for_ana') == "C")
        {
        $applied_for_ana_year = $req->input('applied_for_ana_year');
        $form->applied_for_ana_year =  $applied_for_ana_year;

        }

        $form->airline = $req->input('airline');
        $form->airlinePosition = $req->input('airlinePosition');
        $form->work_experience = $req->input('work_experience');
        $form->japanese_culture =  $req->input('japanese_culture');
        $form->internation_experience =  $req->input('internation_experience');
        $form->japanese_lang =  $req->input('japanese_lang');
     
                $school_name = $req->input('school_name');
                $school_year = $req->input('school_year');
                $form->school_name =  $school_name;
                $form->school_year = $school_year;
          
                $employer_name = $req->input('employer_name');
                $employer_year = $req->input('employer_year');

                
        $form->employer_name = $employer_name;
        $form->employer_year = $employer_year;



        $form->passportNumber = $req->input('passport_number');
        $form->passportExpiry = $req->input('passport_expiry');
        $form->toeicScore = $req->input('toeic_score');
        $form->universityName = $req->input('uni_name');

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


        if($passportFile->move($destination,$form->id."pp".".".$extP))
        {
            $form->passportFileName = $form->id."pp".".".$extP;
            $form->save();
            $success++;

        }

        // if($thaicard_file->move($destination,"000".$form->id."id".".".$extC))
        // {
        //     $form->idCardFileName  = "000".$form->id."id".".".$extC;
        //     $form->save();
        // }


        if($score_file->move($destination,$form->id."to".".".$extS))
        {
            $form->toeicFileName  = $form->id."to".".".$extS;
            $form->save();
            $success++;

        }

        if($cv_file->move($destination,$form->id."cv".".".$extCV))
        {
            $form->cvFileName  = $form->id."cv".".".$extCV;
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


    public function withdraw()
    {
        $user = Auth::user();
        $form = FormModel::whereUser_id($user->id)->first();
        $form->isWithDrawn = 1;
        if($form->save())
        {
            return redirect()->back()->with('success','Application is withdrawned');
        }
        else 
        {
            return redirect()->back()->with('error','Error Occurred in withdrawing the Application. Please try again.');

        }
    }

    public function sq()
    {
        $user = Auth::user();
        $form = FormModel::whereUser_id($user->id)->where(['isWithDrawn' => 0]);
        return view('user.sq',['user' => $user, 'form' => $form]);
    }

    public function squestion(Request $req)
    {
        $question = $req->input('security');
        $answer = $req->input('answer');
        $user = Auth::user();
        if($question == "" || $answer == "")
        {
            return redirect()->back()->with('error','Please Select Question and Answer it.');
        }
        else 
        {
            $u = User::find($user->id);
            $u->securityQuestion = $question;
            $u->answer = $answer;
            if($u->save())
            {
                return redirect()->back()->with('success','Security Question Set.');
    
            }
            else
            {
            return redirect()->back()->with('error','Error Occurred in setting the Security Question. Please Try again.');
    
            }
        }
    }


    public function submitApplication()
    {
        $user = Auth::user();
        $form = FormModel::whereUser_id($user->id)->first();
        $form->isSubmitted = 1;
        if($form->save())
        {
        Session()->forget('editApplication');
            return redirect()->back()->with('success','Congratulations, Your application has been submitted.');

        }
        else
        {
            return redirect()->back()->with('error','Error Occurred in submitting the application. Please Try again.');

        }
    }

    public function editApplication()
    {
        Session()->put('editApplication',1);
        $user = Auth::user();
        $form = FormModel::whereUser_id($user->id)->first();
        Session()->put('firstname',$form->firstname);
        Session()->put('lastname',$form->lastname);
        Session()->put('streetAddress',$form->streetAddress);
        Session()->put('city',$form->city);
        Session()->put('state',$form->stateRegion);
        Session()->put('zip',$form->zip);
        Session()->put('country',$form->country);
        Session()->put('phone',$form->contactPhone);
        Session()->put('age',$form->age);
        Session()->put('gender',$form->gender);
        Session()->put('email',$form->email);
        Session()->put('height',$form->height);
        Session()->put('weight',$form->weight);

        Session()->put('applied_for_ana',$form->applied_for_ana);
        Session()->put('applied_for_ana_year',$form->applied_for_ana_year);
        Session()->put('airline',$form->airline);
        Session()->put('airlinePosition',$form->airlinePosition);
        Session()->put('work_experience',$form->work_experience);
        Session()->put('japanese_culture',$form->japanese_culture);
        Session()->put('internation_experience',$form->internation_experience);
        Session()->put('japanese_lang',$form->japanese_lang);
        Session()->put('school_name',$form->school_name);
        Session()->put('school_year',$form->school_year);
        Session()->put('employer_name',$form->employer_name);
        Session()->put('employer_year',$form->employer_year);

        Session()->put('passportNumber',$form->passportNumber);
        Session()->put('passportExpiry',$form->passportExpiry);
        Session()->put('toeic_score',$form->toeicScore);
        Session()->put('uni_name',$form->universityName);
        Session()->put('cover',$form->coverLetter);

        return redirect('/apply');
    }



    /// update form


    public function updateForm(Request $req)
    {

        $success = 0;
        $user = Auth::user();
        $form = FormModel::whereUser_id($user->id)->first();
        $form->firstname = $req->input('firstname');
        $form->lastname = $req->input('lastname');
        $form->streetAddress = $req->input('streetAddress');
        $form->city = $req->input('city');
        $form->stateRegion = $req->input('stateRegion');
        $form->zip = $req->input('zip');
        $form->country = $req->input('country');
        $form->contactPhone = $req->input('contactPhone');
        $form->age = $req->input('age');
        $form->gender = $req->input('gender');
        $form->email = $req->input('email');
        $form->height = $req->input('height');
        $form->weight = $req->input('weight');
        
        $form->user_id = $user->id;


        $form->applied_for_ana = $req->input('applied_for_ana');

        if($req->input('applied_for_ana') == "D" || $req->input('applied_for_ana') == "C")
        {
            $applied_for_ana_year =$req->input('applied_for_ana_year');
        $form->applied_for_ana_year =  $applied_for_ana_year;

        }

        $form->airline = $req->input('airline');
        $form->airlinePosition = $req->input('airlinePosition');
        $form->work_experience = $req->input('work_experience');
        $form->japanese_culture =  $req->input('japanese_culture');
        $form->internation_experience =  $req->input('internation_experience');
        $form->japanese_lang =  $req->input('japanese_lang');
        if($req->input('japanese_lang') == "D")
        {

                $school_name = $req->input('school_name');
                $school_year = $req->input('school_year');
                $form->school_name =  $school_name;
                $form->school_year = $school_year;
          
                $employer_name = $req->input('employer_name');
                $employer_year = $req->input('employer_year');

                
        $form->employer_name = $employer_name;
        $form->employer_year = $employer_year;

        }



        $form->passportNumber = $req->input('passport_number');
        $form->passportExpiry = $req->input('passport_expiry');
        $form->toeicScore = $req->input('toeic_score');
        $form->universityName = $req->input('uni_name');

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


        if($passportFile->move($destination,$form->id."pp".".".$extP))
        {
            $form->passportFileName = $form->id."pp".".".$extP;
            $form->save();
            $success++;

        }

        // if($thaicard_file->move($destination,"000".$form->id."id".".".$extC))
        // {
        //     $form->idCardFileName  = "000".$form->id."id".".".$extC;
        //     $form->save();
        // }


        if($score_file->move($destination,$form->id."to".".".$extS))
        {
            $form->toeicFileName  = $form->id."to".".".$extS;
            $form->save();
            $success++;

        }

        if($cv_file->move($destination,$form->id."cv".".".$extCV))
        {
            $form->cvFileName  = $form->id."cv".".".$extCV;
            $form->save();
            $success++;

        }

        }
        else 
        {
        return redirect()->back()->with('error','Error Occurred in Updating the Application. Please try again.');

        }

        if($success > 0)
        {
            Session()->forget('editApplication');
        return redirect()->back()->with('success','Application Updated.');
            
        }
        else 
        {
            return redirect()->back()->with('error','Error Occurred in Updating the Application. Please try again.');

        }
        
    }   
    
}
