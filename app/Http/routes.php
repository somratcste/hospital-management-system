<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']] , function() {

	Route::get('/', [
    	'uses' => 'AdminController@index',
    	'as' => 'admin.index'
	]);

	//Doctor

	Route::get('/doctor' , [
		'uses' => 'DoctorController@getIndex',
		'as' => 'doctor.index'
	]);

	Route::post('/doctor/save' , [
		'uses' => 'DoctorController@save',
		'as' => 'doctor.save'
	]);

	Route::post('/doctor/update' , [
		'uses' => 'DoctorController@update',
		'as' => 'doctor.update'
	]);

	Route::get('/doctor/delete' , [
		'uses' => 'DoctorController@delete',
		'as' => 'doctor.delete'
	]);

	Route::get('/doctor/list' , [
		'uses' => 'DoctorController@viewList',
		'as' => 'doctor.list'
	]);

	//Nurse 

	Route::get('/nurse' , [
		'uses' => 'NurseController@getIndex',
		'as' => 'nurse.index'
	]);

	Route::post('/nurse/save' , [
		'uses' => 'NurseController@save',
		'as' => 'nurse.save'
	]);

	Route::post('/nurse/update' , [
		'uses' => 'NurseController@update',
		'as' => 'nurse.update'
	]);

	Route::get('/nurse/delete' , [
		'uses' => 'NurseController@delete',
		'as' => 'nurse.delete'
	]);

	Route::get('/nurse/list' , [
		'uses' => 'NurseController@viewList',
		'as' => 'nurse.list'
	]);
});


