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

});


// user 

Route::group(['prefix' => 'user', 'middleware' => 'UserWare'],function(){

    Route::get('/','UserController@index');

});
