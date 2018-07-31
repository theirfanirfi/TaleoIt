<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/forgotpassword',function(){
return view('forgotpassword');
})->name('forgotpassword');

Route::get('/adminlogin', function () {
    return view('clientlogin');
})->name('adminlogin');

Route::get('/register',function(){
    return view('register');
})->name('register');

Route::post('/registerPost','LoginController@registerClient')->name('registerPost');
Route::post('/loginPost','LoginController@loginClient')->name('loginPost');
Route::get('/logout','LoginController@logOut')->name('logout');

Route::post('/credentialsAnswered','LoginController@credentialsAnswered')->name('credentialsAnswered');

Route::get('/resetPassword','LoginController@resetPassword')->name('resetPassword');
Route::post('processReset','LoginController@processReset')->name('processReset');

/*
@ Client Routes
@ Protected By Middleware #ClientWare
*/
Route::group(['prefix'=>'admin', 'middleware'=> 'ClientWare'],function(){
    Route::get('/','ClientController@index')->name('Admin');
    Route::get('/forms','ClientController@submittedForms')->name('forms');
    Route::get('/app/{id}','ClientController@application')->name('app');
    Route::get('/deleteApp/{id}','ClientController@deleteApp')->name('deleteApp');
    Route::get('changeAppStatus','ClientController@changeAppStatus')->name('changeAppStatus');

    //final interview

    Route::get('/finalInterview','ClientController@finalInterview')->name('finalinterview');

    //pre screening

    Route::get('/prescreening','ClientController@prescreening')->name('prescreening');

    //hired

    Route::get('/hired','ClientController@hired')->name('hired');

    //screened

    Route::get('/screened','ClientController@screened')->name('screened');

    //checkNotification

    Route::get('/checkNotification','ClientController@checkNotification')->name('checkNotification');
    // Client Profile
    Route::get('/profile','ClientController@profile')->name('profile');
    Route::post('/updateProfile','ClientController@updateProfile')->name('updateProfile');

    // Change Password

    Route::post('/changePassword','ClientController@changePassword')->name('changePassword');

    //Shortlisted

    Route::get('/shortlisted','ClientController@shortListed')->name('shortlisted');

    //waiting list
    Route::get('/waitinglist','ClientController@waitingList')->name('waitinglist');

    //rejected

    Route::get('/rejected','ClientController@rejectedList')->name('rejected');

    //Recuriters

    Route::get('/addRecruiter','ClientController@addRecruiter')->name('addRecruiter');
    //add Recruiter
    Route::post('/recruiter','ClientController@recruiter')->name('recruiter');
    //view Recruiters
    Route::get('/recruiters','ClientController@recruiters')->name('recruiters');
    //edit Recruiter Account
    Route::get('/editRecruiter/{id}','ClientController@editRecruiter')->name('editRecruiter');

    //delete Recruiter
    Route::get('/deleteRecruiter/{id}','ClientController@deleteRecruiter')->name('deleteRecruiter');

    //update Recruiter
    Route::post('/updateRecruiter','ClientController@updateRecruiter')->name('updateRecruiter');
// Export SUbmitted forms

Route::get('/exportSubmitted','ClientController@exportSubmittedXL')->name('exportSubmittedXL');

//export final

Route::get('/exportFinalXL','ClientController@exportFinalXL')->name('exportFinalXL');
Route::get('/exportRejectedXL','ClientController@exportRejectedXL')->name('exportRejectedXL');
Route::get('/exportPreXL','ClientController@exportPreXL')->name('exportPreXL');
Route::get('/exportScanned','ClientController@exportScanned')->name('exportScanned');
Route::get('/exportHired','ClientController@exportHired')->name('exportHired');

//withdrawn

Route::get('/wdApps','ClientController@wdApps')->name('wdApps');


// Documents
Route::get('/documents','ClientController@documents')->name('documents');

Route::get('/docsubmitted','ClientController@docsubmitted')->name('docsubmitted');
Route::get('/docspre','ClientController@docspre')->name('docspre');
Route::get('/docscreened','ClientController@docscreened')->name('docscreened');
Route::get('/docsfinal','ClientController@docsfinal')->name('docsfinal');
Route::get('/docshired','ClientController@docshired')->name('docshired');
Route::get('/docsrejected','ClientController@docsrejected')->name('docsrejected');

//all
Route::get('/allPassports','ClientController@allpassports')->name('allPassports');
Route::get('/allToeicScoreCards','ClientController@allToeicScoreCards')->name('allToeicScoreCards');
Route::get('/allCvs','ClientController@allCvs')->name('allCvs');

//get actual cvs
Route::get('/cvs/{status}','ClientController@cvs')->name('cvs');

//get actual Passports
Route::get('/passports/{status}','ClientController@passports')->name('passports');

//get actual toeicscorecard
Route::get('/toeicscorecard/{status}','ClientController@toeicscorecard')->name('toeicscorecard');


Route::post('/securityQuestion','ClientController@securityQuestion')->name('securityQuestion');


//changing layout color

Route::get('/light','ClientController@light')->name('light');
Route::get('/dark','ClientController@dark')->name('dark');

//Note

Route::post('/addNote','ClientController@addNote')->name('addNote');
Route::get('/deleteNote/{id}','ClientController@deleteNote')->name('deleteNote');


//start stop application submissions
Route::get('/startstop','ClientController@startstop')->name('startstop');

});


// user 

Route::group(['prefix' => 'apply', 'middleware' => 'UserWare'],function(){

    Route::get('/','UserController@index')->name('apply');
    //submit form

    Route::post('/submitForm','UserController@submitForm')->name('submitForm');
    Route::post('/updateForm','UserController@updateForm')->name('updateForm');

    //sotring the form various steps in session

    Route::get('/stepone','UserController@stepone')->name('stepone');
    Route::get('/steptwo','UserController@steptwo')->name('steptwo');
    Route::get('/stepthree','UserController@stepthree')->name('stepthree');

    //withdraw application

    Route::get('/withdrawApp','UserController@withdraw')->name('withDrawApp');

    //Security question

    Route::get('/sq','UserController@sq')->name('sq');
    Route::post('/squestion','UserController@squestion')->name('squestion');

    //submit application: mark isSubmitted as one.



    Route::get('/submitApplication','UserController@submitApplication')->name('submitApplication');
    Route::get('/editApplication','UserController@editApplication')->name('editApplication');

    

});

Route::get('put-in-dir', function() {
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));

    $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', 'Test Dir')
        ->first(); // There could be duplicate directory names!

    if ( ! $dir) {
        return 'Directory does not exist!';
    }

    Storage::cloud()->put($dir['path'].'/test.txt', 'Hello World');

    return 'File was created in the sub directory in Google Drive';
});

Route::get('create-dir', function() {
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));


    $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', 'Test')
        ->first(); // There could be duplicate directory names!
    $filename = 'laravel.png';
    $filePath = public_path("uploads\\00013pp.jpg");
    $fileData = File::get($filePath);

    $dir2 = $dir['path'];
    $contents2 = collect(Storage::cloud()->listContents($dir2, $recursive));
    $dir2 = $contents2->where('type', '=', 'dir')
    ->where('filename', '=', 'Test')
    ->first(); // There could be duplicate directory names!
    dd($dir);
    //echo "<br/> anoterh </br>";
    //dd($dir2);
    exit();

    Storage::cloud()->put($dir2['path']."/".$filename, $fileData);

});
