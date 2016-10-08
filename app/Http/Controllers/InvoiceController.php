<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Carbon\Carbon;
use App\Invoice;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoice = Invoice::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.invoice_list' , ['invoices' => $invoice]);
    }

    public function create(Request $request)
    {
    	$patient = Patient::find($request['patient_id']);
        $patient = Patient::find($request->input('patient_id'));
        $created = new Carbon($patient->created_at);
        $difference = $created->diffInDays();
        $cost = $patient->seat->rent * $difference;
    	return view('admin.invoice',['patient' => $patient , 'difference' => $difference , 'cost' => $cost]);
    }

    public function show()
    {
        $invoice = Invoice::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.invoice_list' , ['invoices' => $invoice]);
    }

    public function store(Request $request) 
    {
        $invoice = new Invoice();
        $invoice->admission = $request['admission'];
        $invoice->rent = $request['rent'];
        $invoice->consultation = $request['consultation'];
        $invoice->doctor = $request['doctor'];
        $invoice->surgeon = $request['surgeon'];
        $invoice->anesthesia = $request['anesthesia'];
        $invoice->assistant1 = $request['assistant1'];
        $invoice->assistant2 = $request['assistant2'];
        $invoice->operation = $request['operation'];
        $invoice->delivary = $request['delivary'];
        $invoice->medicine = $request['medicine'];
        $invoice->pathology = $request['pathology'];
        $invoice->usg = $request['usg'];
        $invoice->ecg = $request['ecg'];
        $invoice->xray = $request['xray'];
        $invoice->nebulizer = $request['nebulizer'];
        $invoice->suction = $request['suction'];
        $invoice->blood = $request['blood'];
        $invoice->dressing = $request['dressing'];
        $invoice->oxygen = $request['oxygen'];
        $invoice->canulla = $request['canulla'];
        $invoice->catheter = $request['catheter'];
        $invoice->tube = $request['tube'];
        $invoice->ambulance = $request['ambulance'];
        $invoice->incubator = $request['incubator'];
        $invoice->others = $request['others'];
        $invoice->subtotal = $request['subtotal'];
        $invoice->vat = $request['vat'];
        $invoice->service = $request['service'];
        $invoice->total_amount = $request['total_amount'];
        $invoice->discount = $request['discount'];
        $invoice->total = $request['total'];
        $invoice->patient_id = $request['patient_id'];
        $invoice->save();
        return redirect()->back()->with(['success' => 'Invoice Create Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $invoice = Invoice::find($id);
        $invoice->subtotal = $request['subtotal'];
        $invoice->vat = $request['vat'];
        $invoice->service = $request['service'];
        $invoice->total_amount = $request['total_amount'];
        $invoice->discount = $request['discount'];
        $invoice->total = $request['total'];
        $invoice->save();
        return redirect()->back()->with(['success' => 'Invoice Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        if(!$invoice){
            return redirect()->route('invoice.index')->with(['fail' => 'Page not found !']);
        }
        $invoice->delete();
        return redirect()->route('invoice.index')->with(['success' => 'Invoice Deleted.']);
    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    public function getIndex()
    {
        $patients = Patient::all();
        return view('admin.create_invoice', ['patients' => $patients]);
    }


}