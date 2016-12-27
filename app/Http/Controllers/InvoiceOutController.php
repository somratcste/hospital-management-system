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
use App\Village;
class InvoiceoutController extends Controller
{
    public static function convert_number_to_words($number) {

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . Self::convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . Self::convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = Self::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= Self::convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }


    public function index()
    {
        $doctors = Doctor::all();
        $marketings = Marketing::all();
        $report_id = InvoiceOut::orderBy('created_at','desc')->first();
        if($report_id == NULL)
            $report_id = 01 ;
        else
            
            $report_id = $report_id->id +1;
        return view('admin.invoiceout',['doctors'=>$doctors, 'report_id'=>$report_id,'marketings'=>$marketings]);
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
            $invoiceoutproduct->invoice_out_id = $invoiceoutID;
            $invoiceoutproduct->reportType_id = $request['itemNo'][$i];
            $invoiceoutproduct->report_discount = $request['itemDiscount'][$i];
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
        $delivaryTime = $invoiceout->created_at;
        $delivaryTime = $delivaryTime->addDays(2);
        $delivaryTime = $delivaryTime->format('d-m-Y h:i A');
        if($invoiceout->due == 0)
            $money = $invoiceout->total;
        else
            $money = $invoiceout->receive_cash;
        $money = InvoiceoutController::convert_number_to_words($money);
        $invoiceoutproducts = InvoiceOutProduct::where('invoice_out_id',$invoiceout_id)->get();
        return view('admin.invoiceout_view', ['invoiceout'=>$invoiceout,'invoiceoutproducts'=>$invoiceoutproducts,'delivaryTime'=> $delivaryTime , 'money' => $money]);
    }

    public function autocomplete_village(Request $request)
    {
       $term = $request->term ;
        $data =  Village::where('id','LIKE','%'.$term.'%')
        ->orWhere('name','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results = array();
        foreach ($data as $value) {
            $results[] = ['label' => $value->name .'-'. $value->mobile ,'village_id' => $value->id,'marketing_id' =>$value->marketing_id,'marketing_name'=> $value->marketing->name ];
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
        $invoiceoutproducts = InvoiceOutProduct::where('invoice_out_id',$invoiceout_id)->get();
        return view('admin.invoiceout_refund', ['invoiceout'=>$invoiceout,'invoiceoutproducts'=>$invoiceoutproducts]); 
    }

    

}