<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refund;
use App\InvoiceOutProduct;
use App\InvoiceOut;
use Auth;
class RefundController extends Controller
{
	public function index()
	{
		$refund = Refund::orderBy('created_at' , 'desc')->paginate(50);
		return view('admin.refund_list',['refunds' => $refund]);

	}

	public function store(Request $request) 
    {
        date_default_timezone_set("Asia/Dhaka");
        $refund = new Refund();
        $refund->invoice_out_id = $request['report_id'];
        $refund->subtotal = $request['subtotal'];
        $refund->percent = $request['percent'];
        $refund->percent_amount = $request['percent_amount'];
        $refund->without_percent = $request['without_percent'];
        $refund->discount = $request['discount'];
        $refund->total = $request['total_paid'];
        $refund->user_id = Auth::user()->id ;
        $receive_cash = InvoiceOut::find($request['report_id']);
        $receive_cash->due = 0 ;
        $receive_cash->update();
        if($receive_cash->receive_cash > $request['total_paid'])
        	$refund->refund = $receive_cash->receive_cash - $request['total_paid'];
        else 
        	$refund->less = $request['total_paid'] - $receive_cash->receive_cash ;
        $refund->save();

        for($i=0;$i<count($_POST['itemNo']);$i++)
        {
            $invoiceoutproduct = new InvoiceOutProduct();
            $invoiceoutproduct->invoiceOut_id = $request['report_id'];
            $invoiceoutproduct->refund_id = $refund->id;
            $invoiceoutproduct->reportType_id = $request['itemNo'][$i];
            $invoiceoutproduct->report_name = $request['itemName'][$i];
            $invoiceoutproduct->report_room = $request['itemAvailable'][$i];
            $invoiceoutproduct->report_cost = $request['total'][$i];
            $invoiceoutproduct->save();
        }
        return redirect()->route('refund.index')->with(['success' => 'Refund Successfully'] );
    }

	public function destroy(Request $request , $id)
    {
        $refund = Refund::find($id);
        if(!$refund){
            return redirect()->route('refund.index')->with(['fail' => 'Page not found !']);
        }
        $refund->delete();

        $invoiceOutProduct = InvoiceOutProduct::where('refund_id', $request['refund_id'])->get();
 
        $count = $invoiceOutProduct->count();
        for($i=1 ; $i<= $count; $i++) 
        {
        	$invoiceOutProduct = InvoiceOutProduct::where('refund_id', $request['refund_id'])->first();
            $invoiceOutProduct->delete();
        }

        $invoiceOut = InvoiceOut::find($request['report_id']);
        $invoiceOut->delete();


        return redirect()->route('refund.index')->with(['success' => 'Deleted Successfully.']);
    }

	public function create(Request $request)
    {
    	$refund_id = $request['refund_id'];
        $refund = Refund::find($refund_id);
 		$report_id = $refund->invoice_out_id;
        $invoiceout = InvoiceOut::find($report_id);
        $invoiceoutproducts = InvoiceOutProduct::where('refund_id' , $refund_id)->get();
        return view('admin.refund_view' , ['refund' => $refund , 'invoiceout' => $invoiceout , 'invoiceoutproducts' => $invoiceoutproducts]);
    }


}