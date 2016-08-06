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

	//employee

	Route::get('/employee' , [
		'uses' => 'EmployeeController@getIndex',
		'as' => 'employee.index'
	]);

	Route::post('/employee/save' , [
		'uses' => 'EmployeeController@save',
		'as' => 'employee.save'
	]);

	Route::post('/employee/update' , [
		'uses' => 'EmployeeController@update',
		'as' => 'employee.update'
	]);

	Route::get('/employee/delete' , [
		'uses' => 'EmployeeController@delete',
		'as' => 'employee.delete'
	]);

	Route::get('/{employee?}/list' , [
		'uses' => 'EmployeeController@viewList',
		'as' => 'employee.list'
	]);

	//seat

	Route::get('/seat' , [
		'uses' => 'SeatController@getIndex',
		'as' => 'seat.index'
	]);

	Route::post('/seat/save' , [
		'uses' => 'SeatController@save',
		'as' => 'seat.save'
	]);

	Route::post('/seat/update' , [
		'uses' => 'SeatController@update',
		'as' => 'seat.update'
	]);

	Route::get('/seat/delete' , [
		'uses' => 'SeatController@delete',
		'as' => 'seat.delete'
	]);

	Route::get('/seat/{seat?}/list' , [
		'uses' => 'SeatController@viewList',
		'as' => 'seat.list'
	]);

});


