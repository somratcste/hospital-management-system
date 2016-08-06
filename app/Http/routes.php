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

});


