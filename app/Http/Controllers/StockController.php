<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use DateTime;
class StockController extends Controller
{

    public function index()
    {
        $stock = Stock::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.stock' , ['stocks' => $stock]);
    }


    public function show()
    {
        $stock = Stock::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.stock' , ['stocks' => $stock]);
    }

    public function store(Request $request) 
    {
        $stock = new Stock();
        $stock->name = $request['name'];
        $stock->quantity = $request['quantity'];
        $stock->price = $request['price'];
        $stock->type = $request['type'];
        $stock->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $stock = Stock::find($id);
        $stock->name = $request['name'];
        $stock->quantity = $request['quantity'];
        $stock->price = $request['price'];
        $stock->type = $request['type'];
        $stock->save();
        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $stock = Stock::find($id);
        if(!$stock){
            return redirect()->route('stock.index')->with(['fail' => 'Page not found !']);
        }
        $stock->delete();
        return redirect()->route('stock.index')->with(['success' => 'Deleted Successfully.']);
    }

    public function create(Request $request)
    {
       return  view('admin.stock_process');
    }

    public function autocomplete(Request $request)
    {
        $term = $request->term ;
        $data =  Stock::where('name','LIKE','%'.$term.'%')->take(10)->get();
        $result = array();
        foreach ($data as $value) {
            $result[] = ['quantity'=> $value->quantity];
        }
        return response()->json($result);
    }

}