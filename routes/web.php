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
});
Route::post('/login','LoginController@ceklogin');
Route::get('/register', function () {
    return view('register');
});
Route::group(['middleware' => 'auth'], function() {
	Route::get('/','HomeController@index');
    //create order
    Route::get('/project','ProjectController@monitor');
    Route::get('/project/{id}','ProjectController@input');
    Route::post('/project/{id}','ProjectController@save');
    Route::get('/projectmon/{pt}','ProjectController@monitor');

    //user
    Route::get('/user','UserController@index');
    Route::get('/user/{id}','UserController@input');
    Route::post('/user/{id}','UserController@save');
    Route::post('/deleteUser/{id}','UserController@delete');

    //user
    Route::get('/employee','EmployeeController@index');
    Route::get('/employee/{id}','EmployeeController@input');
    Route::post('/employee/{id}','EmployeeController@save');
    Route::post('/deleteEmployee/{id}','EmployeeController@delete');

    //survey
    Route::get('/survey','SurveyController@surveyList');
    Route::get('/inbox','SurveyController@inboxList');
    Route::get('/survey_revisi','SurveyController@revisiList');
    Route::get('/survey/{id}','SurveyController@surveyForm');
    Route::post('/survey/{id}','SurveyController@save');

    //approval
    Route::get('/approval','ApprovalController@list');
    Route::get('/approval/{id}','ApprovalController@form');
    Route::post('/approval/{id}','ApprovalController@save');

    //booked
    Route::get('/booking_odp','BookController@list');
    Route::get('/booking_odp/{id}','BookController@form');
    Route::post('/booking_odp/{id}','BookController@saveODP');
    Route::post('/save_next/{id}','BookController@saveNext');

    //dispatch
    Route::get('/dispatch','DispatchController@list');
    Route::get('/dispatch/{id}','DispatchController@form');
    Route::post('/dispatch/{id}','DispatchController@save');

    //teknisi
    Route::get('/index_teknisi','TeknisiController@list');
    Route::get('/index_teknisi/{id}','TeknisiController@form');
    Route::post('/index_teknisi/{id}','TeknisiController@save');

	Route::get('/logout','LoginController@logout');
});