<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Models\FormModel;
use Auth;
class ClientController extends Controller
{
    //

    public function index()
    {
        return view('client.index');
    }

    public function submittedForms()
    {
        $forms = FormModel::all();
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
        
        $forms = FormModel::whereApp_status(3)->get();
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
        $forms = FormModel::whereApp_status(1)->get();
        return view('client.finalinterview',['forms' => $forms]);
    }

    public function prescreening()
    {
        $forms = FormModel::whereApp_status(2)->get();
        return view('client.prescreening',['forms' => $forms]);
    }

    public function hired()
    {
        $forms = FormModel::whereApp_status(4)->get();
        return view('client.hired',['forms' => $forms]);
    }

    public function screened()
    {
        $forms = FormModel::whereApp_status(5)->get();
        return view('client.hired',['forms' => $forms]);
    }

    public function checkNotification()
    {
        $forms = FormModel::whereAlert_status(0)->count();
        echo $forms;
    }
    
}
