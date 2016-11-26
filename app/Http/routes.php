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
use Illuminate\Support\Facades\Input;
use App\Village;
use App\Doctor;

Route::get('/' , function() {
	return view('auth.login');
});

Route::group(['middleware' => ['auth']] , function() {


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

	Route::get('/employee/list' , [
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

	Route::get('/patient/admit/list' , [
		'uses' => 'PatientController@viewList',
		'as' => 'patient.list'
	]);

    Route::get('/api/patient_search' , [
        'uses' => 'ApiController@patientSearch',
        'as' => 'apipatient.search'
    ]);

    Route::get('/api/operationtype_create' , [
        'uses' => 'ApiController@patientCreate',
        'as' => 'apipatient.create'
    ]);

    Route::get('/create_invoice', [
    	'uses' => 'InvoiceController@getIndex',
    	'as' => 'invoice.create_invoce'
    ]);

    Route::resource('invoice', 'InvoiceController');

    Route::resource('ecategory' , 'EmployeeCategoryController');

    Route::resource('marketing','MarketingController');

    Route::resource('specialist','SpecialistController');

    Route::resource('doctor','DoctorController');

    Route::get('/patientout_view_' , [
    	'uses' => 'DoctorController@view',
    	'as' => 'doctor.view'
    ]);

    Route::resource('village','VillageController');

    Route::resource('patientout','PatientOutController');

    Route::get('/patientout_api' , function(){
	   $doctor_id = Input::get('doctor_id');
	   $doctors = Doctor::where('id', $doctor_id)->get();
	   return Response::json($doctors); 	
	});

    Route::resource('invoiceout','InvoiceOutController');

    Route::get('/invoiceout_view',[
    	'uses' => 'InvoiceOutController@view',
    	'as' => 'invoiceout.view'
    ]);

    Route::get('/invoiceout_paid_list',[
    	'uses' => 'InvoiceOutController@paidList',
    	'as' => 'invoiceout.paidlist'
    ]);

    Route::resource('searchrf','SearchRfController');//Reference Fund : rf

    Route::get('/reportout_village' , function(){
	   $marketing_id = Input::get('marketing_id');
	   $villages = Village::where('marketing_id', $marketing_id)->get();
	   return Response::json($villages); 	
	});

	Route::get('/daily_entry_hospital' , [
		'uses' => 'TotalReportController@dailyEntryHospital',
		'as' => 'daily_entry_hospital'
	]);

	Route::get('/daily_delivary_hospital' , [
		'uses' => 'TotalReportController@dailyDelivaryHospital',
		'as' => 'daily_delivary_hospital'
	]);

	Route::get('/monthly_entry_hospital' , [
		'uses' => 'TotalReportController@monthlyEntryHospital',
		'as' => 'monthly_entry_hospital'
	]);

	Route::get('/monthly_delivary_hospital' , [
		'uses' => 'TotalReportController@monthlyDelivaryHospital',
		'as' => 'monthly_delivary_hospital'
	]);

	Route::get('/daily_entry_pharmacy' , [
		'uses' => 'TotalReportController@dailyEntrypharmacy',
		'as' => 'daily_entry_pharmacy'
	]);

	Route::get('/daily_delivary_pharmacy' , [
		'uses' => 'TotalReportController@dailyDelivarypharmacy',
		'as' => 'daily_delivary_pharmacy'
	]);

	Route::get('/monthly_entry_pharmacy' , [
		'uses' => 'TotalReportController@monthlyEntrypharmacy',
		'as' => 'monthly_entry_pharmacy'
	]);

	Route::get('/monthly_delivary_pharmacy' , [
		'uses' => 'TotalReportController@monthlyDelivarypharmacy',
		'as' => 'monthly_delivary_pharmacy'
	]);


	Route::get('/autocomplete',array('as'=>'autocomplete','uses'=>'ReportOutController@autocomplete'));

	// Route::get('/user_registration', [
	// 	'uses' => 'RegistrationController@index',
	// 	'as' => 'user.registration'
	// ]);

	Route::resource('user','RegistrationController');
});


Route::auth();

Route::get('/home', 'HomeController@index');
