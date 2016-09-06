<?php

namespace App\Http\Controllers;


use App\OperationType;
use App\Patient;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function patientSearch()
    {
        $patient = Patient::first();
        return response()->json($patient);
    }

    public function patientCreate(Request $request)
    {
        $operation 		   = new OperationType();
        $operation->name 	   = ucfirst($request['name']);
        $operation->cost    = $request['cost'];
        $saved =  $operation->save();

        if(!$saved){
            App::abort(500, 'Error');
        } else {
            return response()->json(['status' => 'Success']);
        }
    }

}
