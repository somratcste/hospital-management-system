<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Carbon\Carbon;
use App\Marketing;
use App\InvoiceOut;
use App\InvoiceOutProduct;
use App\OutdoorIncome;
use Auth;
class InvoiceoutController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        $marketings = Marketing::all();
        $report_id = InvoiceOut::orderBy('created_at','desc')->first();
        if($report_id == NULL)
            $report_id = 01 ;
        else
            
            $report_id = $report_id->id +1;
        return view('admin.invoiceout',['doctors'=>$doctors, 'marketings'=>$marketings,'report_id'=>$report_id]);
    }


    public function show()
    {
        $invoiceout = Invoiceout::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.invoiceout' , ['invoiceouts' => $invoiceout]);
    }

    public function store(Request $request) 
    {
        date_default_timezone_set("Asia/Dhaka");
        $invoiceout = new InvoiceOut();
        $invoiceout->patientout_id = $request['patientout_id'];
        $invoiceout->patient_id = $request['patient_id'];
        $invoiceout->marketing_id = $request['marketing_id'];
        $invoiceout->village_id = $request['village_id'];
        $invoiceout->subtotal = $request['subtotal'];
        $invoiceout->percent = $request['percent'];
        $invoiceout->percent_amount = $request['percent_amount'];
        $invoiceout->without_percent = $request['without_percent'];
        $invoiceout->discount = $request['discount'];
        $invoiceout->total = $request['total_paid'];
        $invoiceout->receive_cash = $request['receive_cash'];
        $invoiceout->due = $request['total_paid'] - $request['receive_cash'];
        $invoiceout->user_id = Auth::user()->id ;
        $invoiceout->save();
        $invoiceoutID = $invoiceout->id;

        $outdoorIncome = new OutdoorIncome();
        $outdoorIncome->invoice_out_id = $invoiceoutID;
        $outdoorIncome->taka = $request['receive_cash'];
        $outdoorIncome->user_id = Auth::user()->id ;
        $outdoorIncome->save();
        
        
        for($i=0;$i<count($_POST['itemNo']);$i++)
        {
            $invoiceoutproduct = new InvoiceOutProduct();
            $invoiceoutproduct->invoiceOut_id = $invoiceoutID;
            $invoiceoutproduct->reportType_id = $request['itemNo'][$i];
            $invoiceoutproduct->report_name = $request['itemName'][$i];
            $invoiceoutproduct->report_room = $request['itemAvailable'][$i];
            $invoiceoutproduct->report_cost = $request['total'][$i];
            $invoiceoutproduct->save();
        }
        return redirect()->route('invoiceout.create')->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $invoiceout = InvoiceOut::find($id);
        $paid = $invoiceout->receive_cash;
        $invoiceout->receive_cash = $request['receive_cash'] + $paid;
        $invoiceout->due = $invoiceout->total - ($paid + $request['receive_cash']);
        $invoiceout->save();

        $outdoorIncome = new OutdoorIncome();
        $outdoorIncome->invoice_out_id = $id;
        $outdoorIncome->taka = $request['receive_cash'];
        $outdoorIncome->user_id = Auth::user()->id ;
        $outdoorIncome->save();

        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $invoiceout = InvoiceOut::find($id);
        if(!$invoiceout){
            return redirect()->route('invoiceout.create')->with(['fail' => 'Page not found !']);
        }
        $invoiceout->delete();
        return redirect()->route('invoiceout.create')->with(['success' => 'Deleted Successfully.']);
    }

    public function create()
    {
        $invoiceouts = InvoiceOut::orderBy('created_at','desc')->where('created_at','>=',Carbon::now()->subMonth())->where('due','!=',0)->paginate(50);
        $invoiceoutproduct = InvoiceOutProduct::all();
        return view('admin.invoiceout_due_list',['invoiceouts' => $invoiceouts , 'invoiceoutproduct'=> $invoiceoutproduct]);
    }

    public function view(Request $request)
    {
        $invoiceout_id = $request['invoiceout_id'];
        $invoiceout = InvoiceOut::Find($invoiceout_id);
        $invoiceoutproducts = InvoiceOutProduct::where('invoiceOut_id',$invoiceout_id)->get();
        return view('admin.invoiceout_view', ['invoiceout'=>$invoiceout,'invoiceoutproducts'=>$invoiceoutproducts]);
    }

    public function autocomplete(Request $request)
    {
        $term = $request->name_startsWith;
        $data = invoiceType::where('name','LIKE','%'.$term.'%')->take(10)->get();
        $results = array();
        foreach ($data as $key => $v) {
            $results[] = ['test_id'=>$v->id ,'value'=>$v->name , 'cost'=>$v->cost,'room'=>$v->room];
        }
        return response()->json($results);
    }

    public function paidList()
    {
        $invoiceouts = InvoiceOut::orderBy('created_at','desc')->where('created_at','>=',Carbon::now()->subMonth())->whereRaw('total = receive_cash')->paginate(50);
        $invoiceoutproduct = InvoiceOutProduct::all();
        return view('admin.invoiceout_paid_list',['invoiceouts' => $invoiceouts , 'invoiceoutproduct'=> $invoiceoutproduct]);
    }

    public function refund(Request $request)
    {
        $invoiceout_id = $request['invoiceout_id'];
        $invoiceout = InvoiceOut::Find($invoiceout_id);
        $invoiceoutproducts = InvoiceOutProduct::where('invoiceOut_id',$invoiceout_id)->get();
        return view('admin.invoiceout_refund', ['invoiceout'=>$invoiceout,'invoiceoutproducts'=>$invoiceoutproducts]); 
    }

    

}