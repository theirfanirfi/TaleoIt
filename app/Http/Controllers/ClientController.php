<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Models\FormModel;
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
        return view('client.index',['submitted' => $submitted, 'final' => $final, 'pre' => $prescreening, 'rejected' => $rejected, 'hired' => $hired, 'screened' => $screened]);
    }

    public function submittedForms()
    {
        $forms = FormModel::where(['isWithDrawn' => 0])->get();
        FormModel::whereAlert_status(0)->update(['alert_status' => 1]);
        return view('client.submittedforms',['forms' => $forms]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('client.profile',['user' => $user]);
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
        return view('client.rejected',['forms' => $forms]);
    }

    public function addRecruiter()
    {
        return view('client.addRecuriter');
    }

    public function recruiter(Request $req)
    {
        $name = $req->input('fullname');
        $email = $req->input('email');
        $password = $req->input('password');
        if($name== "" || $email == "" || $password == "")
        {
            return redirect()->back()->with('error','All fields are required');
        }
        else
        {
            $user = User::whereEmail($email);
            if($user->count() > 0)
            {
                return redirect()->back()->with('error','User with Same email Already exists.');
            }
            else
            {
                $u = new User();
                $u->name = $name;
                $u->email = $email;
                $u->password = Hash::make($password);
                $u->role = 2;
                $u->isRecruiter = 1;
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
        return view('client.recruiters',['recruiters' => $recruiters]);
    }

    public function editRecruiter($id)
    {
        $user = User::find($id);
        return view('client.editRecruiter',['user' => $user]);
    }

    public function updateRecruiter(Request $req)
    {
        $name = $req->input('fullname');
        $email = $req->input('email');
        $password = $req->input('password');
        $id = $req->input('id');
        if($name == "" || $email == "")
        {
            return redirect()->back()->with('error','Full Name and Email Fields are required.');
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
        return view('client.application',['form' => $form]);
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
        return view('client.finalinterview',['forms' => $forms]);
    }

    public function prescreening()
    {
        $forms = FormModel::whereApp_status(2)->where(['isWithDrawn' => 0])->get();
        return view('client.prescreening',['forms' => $forms]);
    }

    public function hired()
    {
        $forms = FormModel::whereApp_status(4)->where(['isWithDrawn' => 0])->get();
        return view('client.hired',['forms' => $forms]);
    }

    public function screened()
    {
        $forms = FormModel::whereApp_status(5)->where(['isWithDrawn' => 0])->get();
        return view('client.screened',['forms' => $forms]);
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
    
}
