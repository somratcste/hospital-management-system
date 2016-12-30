<?php

use Illuminate\Support\Facades\Input;
use App\Village;
use App\Doctor;
date_default_timezone_set("Asia/Dhaka");
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

	Route::resource('report','ReportController');

	Route::get('/report_view',[
    	'uses' => 'ReportController@view',
    	'as' => 'report.view'
    ]);

    Route::get('/report_get' , [
    	'uses' => 'ReportController@get',
    	'as' => 'report.get'
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

	Route::resource('operation','OperationController');

	Route::get('/operation_view',[
    	'uses' => 'OperationController@view',
    	'as' => 'operation.view'
    ]);

    Route::get('/operation_get' , [
    	'uses' => 'OperationController@get',
    	'as' => 'operation.get'
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

    Route::get('/invoice_view',[
    	'uses' => 'InvoiceController@view',
    	'as' => 'invoice.view'
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

    Route::get('/invoiceout_refund' , [
    	'uses' => 'InvoiceOutController@refund',
    	'as' => 'invoiceout.refund'
    ]);

    Route::get('/invoiceout_paid_list',[
    	'uses' => 'InvoiceOutController@paidList',
    	'as' => 'invoiceout.paidlist'
    ]);

    Route::resource('searchrf','SearchRfController');//Reference Fund : rf
    Route::get('searchrf_marketing_view', [
    	'uses' => 'SearchRFController@view',
    	'as' => 'marketing.view'
    ]);

    Route::get('/reportout_village' , function(){
	   $marketing_id = Input::get('marketing_id');
	   $villages = Village::where('marketing_id', $marketing_id)->get();
	   return Response::json($villages); 	
	});

	Route::get('daily_accounce' , [
		'uses' => 'TotalReportController@dailyAccounce' ,
		'as' => 'daily_accounce'
	]);

	Route::get('monthly_accounce' , [
		'uses' => 'TotalReportController@monthlyAccounce' ,
		'as' => 'monthly_accounce'
	]);

	Route::get('/daily_entry_hospital' , [
		'uses' => 'TotalReportController@dailyEntryHospital',
		'as' => 'daily_entry_hospital'
	]);

	Route::get('/daily_delivary_hospital' , [
		'uses' => 'TotalReportController@dailyDelivaryHospital',
		'as' => 'daily_delivary_hospital'
	]);

	Route::get('/patient_details', [
		'uses' => 'PatientController@details',
		'as' => 'patient.details'
	]);

	Route::get('/monthly_entry_hospital' , [
		'uses' => 'TotalReportController@monthlyEntryHospital',
		'as' => 'monthly_entry_hospital'
	]);

	Route::get('/monthly_delivary_hospital' , [
		'uses' => 'TotalReportController@monthlyDelivaryHospital',
		'as' => 'monthly_delivary_hospital'
	]);

	Route::get('/daily_entry_stock' , [
		'uses' => 'TotalReportController@dailyEntryStock',
		'as' => 'daily_entry_stock'
	]);

	Route::get('/daily_delivary_stock' , [
		'uses' => 'TotalReportController@dailyDelivaryStock',
		'as' => 'daily_delivary_stock'
	]);

	Route::get('/monthly_entry_stock' , [
		'uses' => 'TotalReportController@monthlyEntryStock',
		'as' => 'monthly_entry_stock'
	]);

	Route::get('/monthly_delivary_stock' , [
		'uses' => 'TotalReportController@monthlyDelivaryStock',
		'as' => 'monthly_delivary_stock'
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


	Route::get('/autocomplete',array('as'=>'autocomplete','uses'=>'StockController@autocomplete'));

	// Route::get('/user_registration', [
	// 	'uses' => 'RegistrationController@index',
	// 	'as' => 'user.registration'
	// ]);

	Route::resource('user','RegistrationController');
	Route::post('/password_reset' , [
		'uses' => 'RegistrationController@password_reset',
		'as' => 'password_reset'
	]);

	Route::resource('refund' , 'RefundController');

	Route::resource('stock' , 'StockController');

	Route::post('stock_process' , [
		'uses' => 'StockController@process',
		'as' => 'stock.process'
	]);

	Route::resource('accounce_cost' , 'AccounceController');

	Route::get('/autocomplete_doctor',array('as'=>'autocomplete_doctor','uses'=>'PatientOutController@autocomplete_doctor'));

	Route::get('/autocomplete_village',array('as'=>'autocomplete_village','uses'=>'InvoiceOutController@autocomplete_village'));

	Route::get('/autocomplete_marketing',array('as'=>'autocomplete_marketing','uses'=>'SearchRFController@autocomplete_marketing'));

	Route::get('/autocomplete_indoor_patient',array('as'=>'autocomplete_indoor_patient','uses'=>'ReportController@autocomplete_indoor_patient'));
	
});


Route::auth();

Route::get('/home', 'HomeController@index');
