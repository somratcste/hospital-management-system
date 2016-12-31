<?php 

namespace App\Http\Controllers;

use App\Employee;
use App\Patient;
use App\Seat;
use App\Doctor;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Ecategory;
use App\Report;
use App\ReportProduct;
use App\Operation;
use App\OperationProduct;
use App\Invoice;

class PatientController extends Controller
{
    
    public function getIndex ()
    {
        $doctors = Doctor::all();
        $seat = Seat::orderBy('created_at' , 'desc')->where('status' , 'empty')->get();
        $patient = Patient::orderBy('created_at' , 'desc')->first();
        return view('admin.patient' , ['doctors' => $doctors , 'seats' => $seat , 'lastID' => $patient->id+2 ]);
    }

    public function save(Request $request)
    {
    	$this->validate($request , [
    		'name' 		=> 'required|max:200',
    		'gender' 	=> 'required',
    		'pphone'	=> 'required',
    	]);
        date_default_timezone_set("Asia/Dhaka");
    	$patient 		   = new Patient();
    	$patient->name 	   = ucfirst($request['name']);
        $patient->fh = $request['fh'];
        $patient->fname = $request['fname'];
        $patient->bloodGroup = $request['bloodGroup'];
    	$patient->gender	   = $request['gender'];
        $patient->age = $request['age'];
        $patient->occupation = $request['occupation'];
        $patient->religion = ucfirst($request['religion']); 
        $patient->laddress = $request['laddress'];
        $patient->paddress = $request['paddress'];
        $patient->hphone = $request['hphone'];
        $patient->pphone = $request['pphone'];
        $patient->doctor_id = $request['doctor_id'];
        $patient->seat_id = $request['seat_id']; 

        $seat = Seat::find($request['seat_id']);
        $seat->status = "full";
        $seat->update();

    	$patient->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       
    }

    public function viewList()
    {
        $patient = Patient::orderBy('created_at' , 'desc')->paginate(50);
        $doctors = Doctor::all();
        $seat = Seat::all();
        return view('admin.patient_list' , ['patients' => $patient , 'doctors' => $doctors , 'seats' => $seat]);
    }

    public function delete(Request $request)
    {
        $patient = Patient::find($request['patient_id']);
        if(!$patient){
            return redirect()->route('patient.list')->with(['fail' => 'Page not found !']);
        }
        if($patient->image){
            $image_path = public_path().'/images/patients/'.$patient->image;
            unlink($image_path);
        }
        $patient->delete();
        return redirect()->route('patient.list' , ['patient' => $patient->patient_type ])->with(['success' => 'Deleted Information Successfully !']);

    }

    public function details(Request $request)
    {
        $report = Report::where('patient_id',$request['patient_id'])->first();
        if($report == NULL){
            $money_report = 0;
            $reportproducts = 0 ;
        }else {
            $reportproducts = ReportProduct::where('report_id',$report->id)->get();
            $money_report = $report->receive_cash;
            $money_report = InvoiceoutController::convert_number_to_words($money_report);
        }  
        $operation = Operation::where('patient_id',$request['patient_id'])->first();
        if($operation == NULL){
            $operationproducts = 0 ;
        }else {
            $operationproducts =OperationProduct::where('operation_id',$operation->id)->get();
        }   
        $invoice = Invoice::where('patient_id',$request['patient_id'])->first();
        if($invoice == NUll){
            $money_invoice = 0 ;
        } else {
            $money_invoice = $invoice->total;
            $money_invoice = InvoiceoutController::convert_number_to_words($money_invoice);
        }
        $patient = Patient::find($request['patient_id']);
        return view('admin.patient_details',['patient'=>$patient,'report'=>$report,'reportproducts'=>$reportproducts,'money_report'=>$money_report,'operation'=>$operation,'operationproducts'=>$operationproducts,'invoice'=>$invoice,'money_invoice'=>$money_invoice]);
    }
}
