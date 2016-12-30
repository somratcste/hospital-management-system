<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportType;
use Illuminate\Support\Facades\Input;
use File;
use App\Report;
use App\Patient;
use App\ReportProduct;
use Auth;
use App\IndoorIncome;

class ReportController extends Controller
{


    public function reportTypeIndex ()
    {
        return view('admin.reportType');
    }

    public function reportTypesave(Request $request)
    {
    	$this->validate($request , [
            'name' => 'required',
    		'cost' => 'required',
            'room' => 'required',
            'test_id' => 'unique:report_types'
    	]);

    	$report 		   = new ReportType();
    	$report->name 	   = ucfirst($request['name']);
    	$report->cost    = $request['cost'];
        $report->room = $request['room'];
        $report->test_id = $request['test_id'];
        $report->percent = $request['percent'];
    	$report->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function reportTypeupdate(Request $request)
    {
       $this->validate($request , [
            'name' => 'required',
            'cost' => 'required'
        ]);


        $report            = ReportType::find($request['reportType_id']);
        $report->name      = ucfirst($request['name']);
        $report->cost    = $request['cost'];
        $report->room   = $request['room'];
        $report->test_id = $request['test_id'];
        $report->percent = $request['percent'];
        $report->update();
        return redirect()->route('reportType.list')->with(['success' => 'Updated Successfully'] );
    }

    public function reportTypeViewList()
    {
        $report = ReportType::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.reportType_list' , ['reportTypes' => $report]);

    }

    public function reportTypedelete(Request $request)
    {
        $report = ReportType::find($request['reportType_id']);
        if(!$report){
            return redirect()->route('reportType.list')->with(['fail' => 'Page not found !']);
        }

        $report->delete();
        return redirect()->route('reportType.list')->with(['success' => 'Deleted Information Successfully !']);

    }

    //Report Controller 
    
    public function index ()
    {
        $report_id = Report::orderBy('created_at','desc')->first();
        if($report_id == NULL){
            $report_id = 0 ;
        } else {
            $report_id = $report_id->id ;
        }   
        return view('admin.report' , ['report_id' => $report_id +1]);
    }

    public function store(Request $request)
    {
        $this->validate($request , [ 
            'patient_id' => 'unique:reports' 
        ]);
        date_default_timezone_set("Asia/Dhaka");
        $report = new Report();
        $report->patient_id = $request['patient_id'];
        $report->subtotal = $request['subtotal'];
        $report->percent = $request['percent'];
        $report->percent_amount = $request['percent_amount'];
        $report->without_percent = $request['without_percent'];
        $report->discount = $request['discount'];
        $report->total = $request['total_paid'];
        $report->receive_cash = $request['receive_cash'];
        $report->due = $request['total_paid'] - $request['receive_cash'];
        $report->user_id = Auth::user()->id ;
        $report->save();
        $reportID = $report->id;

        $indoorIncome = new IndoorIncome();
        $indoorIncome->report_id = $reportID;
        $indoorIncome->taka = $request['receive_cash'];
        $indoorIncome->user_id = Auth::user()->id ;
        $indoorIncome->save();
        
        
        for($i=0;$i<count($_POST['itemNo']);$i++)
        {
            $reportproduct = new ReportProduct();
            $reportproduct->report_id = $reportID;
            $reportproduct->reportType_id = $request['itemNo'][$i];
            $reportproduct->report_name = $request['itemName'][$i];
            $reportproduct->report_room = $request['itemAvailable'][$i];
            $reportproduct->report_cost = $request['total'][$i];
            $reportproduct->save();
        }
        return redirect()->route('report.create')->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request ,$id)
    {
        $report = Report::find($id);
        $report->subtotal = $request['subtotal'];
        $report->percent_amount = $request['percent_amount'];
        $report->without_percent = $request['without_percent'];
        $report->discount = $request['discount'];
        $report->total = $request['total_paid'];
        $paid = $report->receive_cash;
        // $report->due = $request['total_paid'] - $request['receive_cash'];
        $report->due = $report->total - ($paid + $request['receive_cash']);
        $report->receive_cash = $request['receive_cash'] + $paid;
        
        

        $reportproduct = ReportProduct::where('report_id', $request['report_id'])->get();
        $count = $reportproduct->count();
        for($i=1 ; $i<= $count; $i++) 
        {
            $reportproduct = ReportProduct::where('report_id', $request['report_id'])->first();

            $reportproduct->delete();
        }

        $report->update();

        $indoorIncome = new IndoorIncome();
        $indoorIncome->report_id = $id;
        $indoorIncome->taka = $request['receive_cash'];
        $indoorIncome->user_id = Auth::user()->id ;
        $indoorIncome->save();

        for($i=0;$i<count($_POST['itemNo']);$i++)
        {
            $reportproduct = new ReportProduct();
            $reportproduct->report_id = $id;
            $reportproduct->reportType_id = $request['itemNo'][$i];
            $reportproduct->report_name = $request['itemName'][$i];
            $reportproduct->report_room = $request['itemAvailable'][$i];
            $reportproduct->report_cost = $request['total'][$i];
            $reportproduct->save();

        }
        return redirect()->route('report.create')->with(['success' => 'Update Successfully'] );
    }

    public function viewList($reportFloor = null)
    {
        $report = Report::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.report_list' , ['reports' => $report]);
    }

    public function destroy(Request $request ,$id)
    {
        $report = Report::find($id);
        if(!$report){
            return redirect()->route('report.create')->with(['fail' => 'Page not found !']);
        }

        
        $reportproduct = ReportProduct::where('report_id', $request['report_id'])->get();
        $count = $reportproduct->count();
        for($i=1 ; $i<= $count; $i++) 
        {
            $reportproduct = ReportProduct::where('report_id', $request['report_id'])->first();
            $reportproduct->delete();
        }

        $report->delete();
        return redirect()->route('report.create')->with(['success' => 'Deleted Successfully.']);
    }

    public function create()
    {
        $report = Report::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.report_list' , ['reports' => $report]);
    }

    public function get(Request $request)
    {
        $report_id = $request['report_id'];
        $report = Report::Find($report_id);
        $reportproducts = ReportProduct::where('report_id',$report_id)->get();
        return view('admin.report_get', ['report'=>$report,'reportproducts'=>$reportproducts]); 
    }

    public function autocomplete_indoor_patient(Request $request)
    {
        $term = $request->term ;
        $data =  Patient::where('id','LIKE','%'.$term.'%')
        ->orWhere('name','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results = array();
        foreach ($data as $value) {
            $results[] = ['label' => $value->name .'-'. $value->pphone ,'id' => $value->id];
        }
        return response()->json($results);
    }

    public function view(Request $request)
    {
        $report_id = $request['report_id'];
        $report = Report::Find($report_id);
        $delivaryTime = $report->created_at;
        $money = $report->receive_cash;
        $money = InvoiceoutController::convert_number_to_words($money);
        $reportproducts = ReportProduct::where('report_id',$report_id)->get();
        return view('admin.report_view', ['report'=>$report,'reportproducts'=>$reportproducts, 'money' => $money]);
    }
}
