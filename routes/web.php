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

Route::get('/register',function(){
    return view('register');
})->name('register');

Route::post('/registerClient','LoginController@registerClient')->name('registerClient');
Route::post('/loginClient','LoginController@loginClient')->name('loginClient');
Route::get('/logout','LoginController@logOut')->name('logout');

/*
@ Client Routes
@ Protected By Middleware #ClientWare
*/
Route::group(['prefix'=>'client', 'middleware'=> 'ClientWare'],function(){
    Route::get('/','ClientController@index')->name('client');
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


});


// user 

Route::group(['prefix' => 'user', 'middleware' => 'UserWare'],function(){

    Route::get('/','UserController@index');
    //submit form

    Route::post('/submitForm','UserController@submitForm')->name('submitForm');

    //sotring the form various steps in session

    Route::get('/stepone','UserController@stepone')->name('stepone');
    Route::get('/steptwo','UserController@steptwo')->name('steptwo');
    Route::get('/stepthree','UserController@stepthree')->name('stepthree');

    //withdraw application

    Route::get('/withdrawApp','UserController@withdraw')->name('withDrawApp');

    

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
    Storage::cloud()->makeDirectory('Test Dir');
    return 'Directory was created in Google Drive';
});
