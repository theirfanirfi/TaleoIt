<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Models\FormModel;
use App\Http\Models\Notes;
use App\Http\Models\Settings;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
class ClientController extends Controller
{
    //

    public function index()
    {
        $submitted = FormModel::where(['isWithDrawn' => 0])->count();
        $final = FormModel::whereApp_status(1)->where(['isWithDrawn' => 0])->count();
        $prescreening = FormModel::whereApp_status(2)->where(['isWithDrawn' => 0])->count();
        $rejected = FormModel::whereApp_status(3)->where(['isWithDrawn' => 0])->count();
        $hired = FormModel::whereApp_status(4)->where(['isWithDrawn' => 0])->count();
        $screened = FormModel::whereApp_status(5)->where(['isWithDrawn' => 0])->count();
        return view('client.index',['submitted' => $submitted, 'final' => $final, 'pre' => $prescreening, 'rejected' => $rejected, 'hired' => $hired, 'screened' => $screened, 'page' =>"Dashboard"]);
    }

    public function submittedForms()
    {
        $forms = FormModel::where(['isWithDrawn' => 0])->get();
        FormModel::whereAlert_status(0)->update(['alert_status' => 1]);
        return view('client.submittedforms',['forms' => $forms, 'page' => "All Applicants"]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('client.profile',['user' => $user, 'page' =>'Settings']);
    }

    public function updateProfile(Request $req)
    {
        $user = Auth::user();
        $name = $req->input('fullname');
        $email = $req->input('email');
        $user->name = $name;
        $user->email = $email;
        if($user->save())
        {
            return redirect()->back()->with('success','Profile Updated.');
        }
        else
        {
            return redirect()->back()->with('error','Erro occurred in updating the Profile. Try Again.');
        }
    }

    public function changePassword(Request $req)
    {
        $user = Auth::user();
        $currentPassword = $req->input('currentPassword');
        $newPassword = $req->input('newPassword');
        if($currentPassword != "" && $newPassword != ""){
        if(Hash::check($currentPassword,$user->password))
        {
            $user->password = Hash::make($newPassword);
            if($user->save())
            {
                return redirect()->back()->with('success','Password Updated.');
            }
            else
            {
                return redirect()->back()->with('error','Erro occurred in changing the Password. Try Again.');
            }
        }
        else
        {
            return redirect()->back()->with('error','Invalid Current Password.');
        }
    }
    else
    {
        return redirect()->back()->with('error','Password Fields are required.');
    }

    }


    public function waitingList()
    {
        return view('client.submittedforms');
    }

    public function shortListed()
    {
        return view('client.submittedforms');
    }

    public function rejectedList()
    {
        
        $forms = FormModel::whereApp_status(3)->where(['isWithDrawn' => 0])->get();
        return view('client.rejected',['forms' => $forms,'page' => 'Rejected Applicants']);
    }

    public function addRecruiter()
    {
        return view('client.addRecuriter', ['page' => 'Add Recruiter']);
    }

    public function recruiter(Request $req)
    {
        $name = $req->input('fullname');
        $email = $req->input('email');
        $password = $req->input('password');
        $control = $req->input('control');
        if($name== "" || $email == "" || $password == "")
        {
            return redirect()->back()->with('error','All fields are required');
        }
        else if($control == "")
        {
            return redirect()->back()->with('error','Please choose the Control option.');

        }
        else
        {
            $user = User::whereEmail($email);
            if($user->count() > 0)
            {
                return redirect()->back()->with('error','User/Recruiter with Same Email Already exists.');
            }
            else
            {
                $u = new User();
                $u->name = $name;
                $u->email = $email;
                $u->password = Hash::make($password);
                $u->role = 2;
                $u->isRecruiter = 1;

                if($control == "fullcontrol"){
                $u->isFullAccess = 1;

                }
                else 
                {
                    $u->isFullAccess = 0;
                }

                if($u->save())
                {
                    return redirect()->back()->with('success','Recruiter Added.');
                }
                else
                {
                    return redirect()->back()->with('error','Error Occurred in Adding the user try again.');
                }
            }
        }
    }

    public function recruiters()
    {
        $recruiters = User::recruiters();
        return view('client.recruiters',['recruiters' => $recruiters,'page' => 'Recruiters']);
    }

    public function editRecruiter($id)
    {
        $user = User::find($id);
        return view('client.editRecruiter',['user' => $user, 'page' => ' Update Recruiter :  '.$user->name]);
    }

    public function updateRecruiter(Request $req)
    {
        $name = $req->input('fullname');
        $email = $req->input('email');
        $password = $req->input('password');
        $id = $req->input('id');
        $control = $req->input('control');
        if($name == "" || $email == "")
        {
            return redirect()->back()->with('error','Full Name and Email Fields are required.');
        }
        else if($control == "")
        {
            return redirect()->back()->with('error','Please select Any option in the controls.');

        }
        else
        {
            $user = User::find($id);
            $user->name = $name;

            if($user->email != $email && $user->checkEmail($email) > 0)
            {
                return redirect()->back()->with('error', 'Email: '.$email. " can not be assigned. Please choose another one.");
            }
            else
            {
                $user->email = $email;
            }

   
            
            if($password != "")
            {
                if(strlen($password) < 6)
                {
                    return redirect()->back()->with('error','Password Length must be at least six characters long.');
                }
                else
                {
                    $user->password = Hash::make($password);
                }
            }

            if($control == "fullcontrol")
            {
                $user->isFullAccess = 1;
            }
            else 
            {
                $user->isFullAccess = 0;

            }


            if($user->save())
            {
                return redirect()->back()->with('success','Account Updated.');
            }
            else
            {
                return redirect()->back()->with('error','Error Occurred in updating the Account. Try Again.');
            }
        }
    }

    public function deleteRecruiter($id)
    {
        $user = User::find($id);
        if($user->delete())
        {
            return redirect()->back()->with('success','Recruiter Deleted.');
        }
        else
        {
            return redirect()->back()->with('error','Error Occurred in deleting the Recruiter. Please Try Again.');
        }
    }

    public function application($id)
    {
        $form = FormModel::find($id);
        $notes = Notes::whereForm_id($form->id)->get();
        return view('client.application',['form' => $form,'page' => 'Applicant Profile','notes' => $notes]);
    }

    public function deleteApp($id)
    {
        $form = FormModel::find($id);
        if($form->delete())
        {
            return redirect()->back()->with('success','Application Deleted.');
        }
        else
        {
            return redirect()->back()->with('error','Error occurred in deleting the application. Try Again.');
        }
    }

    public function changeAppStatus(Request $req)
    {
        $form_id = $req->input('form_id');
        $status = $req->input('status');
        $status_var = "";
        switch($status)
        {
            case 0:
            $status_var = "Submitted";
            break;
            case 1:
            
            $status_var = "Final Interview";
            break;
            case 2:
            
            $status_var = "Pre Screening";
            break;
            case 3:
            
            $status_var = "Rejected";
            break;
            case 4:
            
            $status_var = "Hired";
            break;

            case 5:
            
            $status_var = "Screened";
            break;

            default:
            $status_var = "Submitted";
            $status = 0;
        }
        $response['error'] = true;
        $form = FormModel::find($form_id);
        $form->application_status = $status_var;
        $form->app_status = $status;

        if($form->save())
        {
            $response['error'] = false;

        }

        echo json_encode($response);
    }

    public function finalInterview()
    {
        $forms = FormModel::whereApp_status(1)->where(['isWithDrawn' => 0])->get();
        return view('client.finalinterview',['forms' => $forms, 'page' => 'Final Interview Candidates']);
    }

    public function prescreening()
    {
        $forms = FormModel::whereApp_status(2)->where(['isWithDrawn' => 0])->get();
        return view('client.prescreening',['forms' => $forms, 'page' => 'Pre-Screening Applicants']);
    }

    public function hired()
    {
        $forms = FormModel::whereApp_status(4)->where(['isWithDrawn' => 0])->get();
        return view('client.hired',['forms' => $forms,'page' => 'Hired Candidates']);
    }

    public function screened()
    {
        $forms = FormModel::whereApp_status(5)->where(['isWithDrawn' => 0])->get();
        return view('client.screened',['forms' => $forms, 'page' => 'Screened Applicants']);
    }


    public function wdApps()
    {
        $forms = FormModel::where(['isWithDrawn' => 1])->get();
        return view('client.withdrawnApps',['forms' => $forms, 'page' => 'Withdrawn Candidates']);
    }

    public function checkNotification()
    {
        $forms = FormModel::whereAlert_status(0)->count();
        echo $forms;
    }


    public function exportSubmittedXL()
  {
    $form = FormModel::where(['isWithDrawn' => 0])->get();
    $forms = array();

    foreach($form as $f){
      $forms[] = ['Id' => $f->id,'First Name' => $f->firstname, 'Last Name'=> $f->lastname,  'Email' => $f->email, 'Contact Phone' => $f->contactPhone, 'Gender' => $f->gender, 'Age' => $f->age, 'Height' => $f->height, 'Weight' => $f->weight, 'University' => $f->universityName,'Toeic Score' => $f->toeicScore,'Work Experience' => $f->work_experience,'Japanese Culture' => $f->japanese_culture,'Japanese Language' => $f->japanese_lang, 'Internation Work Experience' => $f->internation_experience,'Airline Position and Experience' => $f->airline,'Applied For ANA' => $f->applied_for_ana];
    }

    Excel::create("Submitted Applications", function($excel) use ($forms) {

    $excel->sheet('Submitted Applications', function($sheet) use ($forms) {

        $sheet->fromArray($forms
        );

    });

})->export('xlsx');

}



public function exportFinalXL()
{
  $form = FormModel::whereApp_status(1)->where(['isWithDrawn' => 0])->get();
  $forms = array();
  foreach($form as $f){
    $forms[] = ['Id' => $f->id,'First Name' => $f->firstname, 'Last Name'=> $f->lastname,  'Email' => $f->email, 'Contact Phone' => $f->contactPhone, 'Gender' => $f->gender, 'Age' => $f->age, 'Height' => $f->height, 'Weight' => $f->weight, 'University' => $f->universityName,'Toeic Score' => $f->toeicScore,'Work Experience' => $f->work_experience,'Japanese Culture' => $f->japanese_culture,'Japanese Language' => $f->japanese_lang, 'Internation Work Experience' => $f->internation_experience,'Airline Position and Experience' => $f->airline,'Applied For ANA' => $f->applied_for_ana];
  }

  Excel::create("Final Interview Candidates", function($excel) use ($forms) {

  $excel->sheet('Final Interview Candidates', function($sheet) use ($forms) {

      $sheet->fromArray($forms
      );

  });

})->export('xlsx');

}



public function exportRejectedXL()
{
  $form = FormModel::whereApp_status(3)->where(['isWithDrawn' => 0])->get();
  $forms = array();
  foreach($form as $f){
    $forms[] = ['Id' => $f->id,'First Name' => $f->firstname, 'Last Name'=> $f->lastname,  'Email' => $f->email, 'Contact Phone' => $f->contactPhone, 'Gender' => $f->gender, 'Age' => $f->age, 'Height' => $f->height, 'Weight' => $f->weight, 'University' => $f->universityName,'Toeic Score' => $f->toeicScore,'Work Experience' => $f->work_experience,'Japanese Culture' => $f->japanese_culture,'Japanese Language' => $f->japanese_lang, 'Internation Work Experience' => $f->internation_experience,'Airline Position and Experience' => $f->airline,'Applied For ANA' => $f->applied_for_ana];
  }

  Excel::create("Final Interview Candidates", function($excel) use ($forms) {

  $excel->sheet('Final Interview Candidates', function($sheet) use ($forms) {

      $sheet->fromArray($forms
      );

  });

})->export('xlsx');

}


public function exportPreXL()
{
  $form = FormModel::whereApp_status(2)->where(['isWithDrawn' => 0])->get();
  $forms = array();
  foreach($form as $f){
    $forms[] = ['Id' => $f->id,'First Name' => $f->firstname, 'Last Name'=> $f->lastname,  'Email' => $f->email, 'Contact Phone' => $f->contactPhone, 'Gender' => $f->gender, 'Age' => $f->age, 'Height' => $f->height, 'Weight' => $f->weight, 'University' => $f->universityName,'Toeic Score' => $f->toeicScore,'Work Experience' => $f->work_experience,'Japanese Culture' => $f->japanese_culture,'Japanese Language' => $f->japanese_lang, 'Internation Work Experience' => $f->internation_experience,'Airline Position and Experience' => $f->airline,'Applied For ANA' => $f->applied_for_ana];
  }

  Excel::create("Pre Scanning Candidates", function($excel) use ($forms) {

  $excel->sheet('Pre Scanning Candidates', function($sheet) use ($forms) {

      $sheet->fromArray($forms
      );

  });

})->export('xlsx');

}

public function exportScanned()
{
  $form = FormModel::whereApp_status(5)->where(['isWithDrawn' => 0])->get();
  $forms = array();
  foreach($form as $f){
    $forms[] = ['Id' => $f->id,'First Name' => $f->firstname, 'Last Name'=> $f->lastname,  'Email' => $f->email, 'Contact Phone' => $f->contactPhone, 'Gender' => $f->gender, 'Age' => $f->age, 'Height' => $f->height, 'Weight' => $f->weight, 'University' => $f->universityName,'Toeic Score' => $f->toeicScore,'Work Experience' => $f->work_experience,'Japanese Culture' => $f->japanese_culture,'Japanese Language' => $f->japanese_lang, 'Internation Work Experience' => $f->internation_experience,'Airline Position and Experience' => $f->airline,'Applied For ANA' => $f->applied_for_ana];
  }

  Excel::create("Scanned Candidates", function($excel) use ($forms) {

  $excel->sheet('Scanned Candidates', function($sheet) use ($forms) {

      $sheet->fromArray($forms
      );

  });

})->export('xlsx');

}

public function exportHired()
{
  $form = FormModel::whereApp_status(4)->where(['isWithDrawn' => 0])->get();
  $forms = array();
  foreach($form as $f){
    $forms[] = ['Id' => $f->id,'First Name' => $f->firstname, 'Last Name'=> $f->lastname,  'Email' => $f->email, 'Contact Phone' => $f->contactPhone, 'Gender' => $f->gender, 'Age' => $f->age, 'Height' => $f->height, 'Weight' => $f->weight, 'University' => $f->universityName,'Toeic Score' => $f->toeicScore,'Work Experience' => $f->work_experience,'Japanese Culture' => $f->japanese_culture,'Japanese Language' => $f->japanese_lang, 'Internation Work Experience' => $f->internation_experience,'Airline Position and Experience' => $f->airline,'Applied For ANA' => $f->applied_for_ana];
  }

  Excel::create("Hired Candidates", function($excel) use ($forms) {

  $excel->sheet('Hired Candidates', function($sheet) use ($forms) {

      $sheet->fromArray($forms
      );

  });

})->export('xlsx');

}

public function documents()
{
    return view('client.documents',['page' => 'Documents']);
}

/*
* Status for loading various documents
* O : Submitted
* 1: Final Interview
* 2: Pre-screening
* 3: Rejected
* 4: Hired
* 5: Screened
*/

public function docsubmitted()
{
//$forms = FormModel::select(['id','cvFileName','toeicFileName','passportFileName'])->get();
    return view('client.documents-in',['page' => 'Submitted Applications Documents','status' => 0]);
}

public function docspre()
{
    return view('client.documents-in',['page' => 'Pre-Screening Applications Documents','status' => 2]);
}

public function docscreened()
{
    return view('client.documents-in',['page' => 'Screened Applications Documents','status' => 5]);
}

public function docsfinal()
{
    return view('client.documents-in',['page' => 'Final Interview Candidates Documents','status' => 1]);
}

public function docshired()
{
    return view('client.documents-in',['page' => 'Hired Candidates Documents','status' => 4]);
}

public function docsrejected()
{
    return view('client.documents-in',['page' => 'Rejected Candidates Documents','status' => 3]);
}

public function cvs($status)
{
$forms = FormModel::select(['id','cvFileName'])->where(['app_status' => $status])->get();
    return view('client.actualdocs',['page' => 'CVs','forms' => $forms]);
}

public function passports($status)
{
$forms = FormModel::select(['id','passportFileName'])->where(['app_status' => $status])->get();
    return view('client.actualpassportdocs',['page' => 'Passports','forms' => $forms]);
}

public function toeicscorecard($status)
{
$forms = FormModel::select(['id','toeicFileName'])->where(['app_status' => $status])->get();
    return view('client.actualtoeicdocs',['page' => 'TOEIC Score Cards','forms' => $forms]);
}


public function allpassports()
{
    $forms = FormModel::select(['id','passportFileName'])->get();
    return view('client.passports',['page' => 'All Passports','forms' => $forms]);
}

public function allToeicScoreCards()
{
    $forms = FormModel::select(['id','toeicFileName'])->get();
    return view('client.toeicscorecards',['page' => 'All TOEIC Score Cards','forms' => $forms]); 
}


public function allCvs()
{
    $forms = FormModel::select(['id','cvFileName'])->get();
    return view('client.allcvs',['page' => 'All CVs','forms' => $forms]); 
}

public function securityQuestion(Request $req)
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

public function light()
{
Session()->put('light',1);
Session()->forget('dark');
return redirect()->back();
}


public function dark()
{
    Session()->put('dark',1);
    Session()->forget('light'); 
return redirect()->back();

}

public function addNote(Request $req)
{
    $fid = $req->input('form_id');
    $notee = $req->input('note');
    if($fid == "" || $notee == "")
    {
        return redirect()->back()->with('error','Note Field can not be empty.');
    }
    else
    {
        $note = new Notes();
        $note->form_id = $fid;
        $note->note = $notee;
        if($note->save())
        {
            return redirect()->back()->with('success','Note  Added.');

        }
        else
        {
        return redirect()->back()->with('error','Error occurred in saving the note. Please try again later.');

        }
    }
}

public function deleteNote($id)
{
    $note = Notes::find($id);
    if($note->delete())
    {
        return redirect()->back()->with('success','Note  Deleted.');
    }
    else 
    {
        return redirect()->back()->with('error','Error occurred in deleting the note. Please try again later.');

    }
}

public function startstop()
{
$setting = Settings::all()->first();
$msg = "";
if($setting->application == 0)
{
    $setting->application = 1;
    Session()->forget('startstop');
    Session()->put('startstop',1);
    $msg = "Application submission state changed from stop to start. Now users will be able to submit Applications.";
}
else
{
    $setting->application = 0;
    Session()->forget('startstop');
    Session()->put('startstop',0);
    $msg = "Application submission state changed from start to stop. Now users will not be able to submit Applications.";


}

if($setting->save())
{
    return redirect()->back()->with('success',$msg);
}
else 
{
    return redirect()->back()->with('error','Error occurred. Please try again.');

}
}
    
}
