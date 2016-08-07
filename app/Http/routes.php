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

	//ReportType

	Route::get('/reportType' , [
		'uses' => 'ReportController@reportTypeIndex',
		'as' => 'reportType.index'
	]);

	Route::post('/reportType/save' , [
		'uses' => 'ReportController@reportTypesave',
		'as' => 'reportType.save'
	]);

	Route::post('/reportType/update' , [
		'uses' => 'ReportController@reportTypeupdate',
		'as' => 'reportType.update'
	]);

	Route::get('/reportType/delete' , [
		'uses' => 'ReportController@reportTypedelete',
		'as' => 'reportType.delete'
	]);

	Route::get('/reportType/list/report' , [
		'uses' => 'ReportController@reportTypeViewList',
		'as' => 'reportType.list'
	]);

	//report

	Route::get('/report' , [
		'uses' => 'ReportController@getIndex',
		'as' => 'report.index'
	]);

	Route::post('/report/save' , [
		'uses' => 'ReportController@save',
		'as' => 'report.save'
	]);

	Route::post('/report/update' , [
		'uses' => 'ReportController@update',
		'as' => 'report.update'
	]);

	Route::get('/report/delete' , [
		'uses' => 'ReportController@delete',
		'as' => 'report.delete'
	]);

	Route::get('/report/viewlist' , [
		'uses' => 'ReportController@viewList',
		'as' => 'report.list'
	]);

	//OperationType

	Route::get('/operationType' , [
		'uses' => 'Operationcontroller@operationTypeIndex',
		'as' => 'operationType.index'
	]);

	Route::post('/operationType/save' , [
		'uses' => 'Operationcontroller@operationTypesave',
		'as' => 'operationType.save'
	]);

	Route::post('/operationType/update' , [
		'uses' => 'Operationcontroller@operationTypeupdate',
		'as' => 'operationType.update'
	]);

	Route::get('/operationType/delete' , [
		'uses' => 'Operationcontroller@operationTypedelete',
		'as' => 'operationType.delete'
	]);

	Route::get('/operationType/list/operation' , [
		'uses' => 'Operationcontroller@operationTypeViewList',
		'as' => 'operationType.list'
	]);

	//operation

	Route::get('/operation' , [
		'uses' => 'Operationcontroller@getIndex',
		'as' => 'operation.index'
	]);

	Route::post('/operation/save' , [
		'uses' => 'Operationcontroller@save',
		'as' => 'operation.save'
	]);

	Route::post('/operation/update' , [
		'uses' => 'Operationcontroller@update',
		'as' => 'operation.update'
	]);

	Route::get('/operation/delete' , [
		'uses' => 'Operationcontroller@delete',
		'as' => 'operation.delete'
	]);

	Route::get('/operation/viewlist' , [
		'uses' => 'Operationcontroller@viewList',
		'as' => 'operation.list'
	]);

	//Patient

	Route::get('/patient' , [
		'uses' => 'PatientController@getIndex',
		'as' => 'patient.index'
	]);

	Route::post('/patient/save' , [
		'uses' => 'PatientController@save',
		'as' => 'patient.save'
	]);

	Route::post('/patient/update' , [
		'uses' => 'PatientController@update',
		'as' => 'patient.update'
	]);

	Route::get('/patient/delete' , [
		'uses' => 'PatientController@delete',
		'as' => 'patient.delete'
	]);

	Route::get('/patient/{patient?}/list' , [
		'uses' => 'PatientController@viewList',
		'as' => 'patient.list'
	]);

	Route::get('/invoice' , [
		'uses' => 'PatientController@invoice',
		'as' => 'admin.invoice'
	]);

    Route::get('/api/patient_search' , [
        'uses' => 'ApiController@patientSearch',
        'as' => 'apipatient.search'
    ]);

    Route::get('/api/operationtype_create' , [
        'uses' => 'ApiController@patientCreate',
        'as' => 'apipatient.create'
    ]);

});


