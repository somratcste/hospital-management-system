<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use DateTime;
use App\StockEntry;
use App\StockDelivary;
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
        $data =  Stock::where('name','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results = array();
        foreach ($data as $value) {
            $results[] = ['label' => $value->name ,'stock_id' => $value->id, 'quantity'=> $value->quantity];
        }
        return response()->json($results);
    }

    public function process(Request $request)
    {
        if($request->stock_process == 1)
            {
                $stockEntry = new StockEntry();
                $stockEntry->stock_id = $request['stock_id'];
                $stockEntry->type = $request['type'];
                $stockEntry->quantity_entry = $request['quantity'];
                $stockEntry->address = $request['address'];
                $stockEntry->save();

                $stock = Stock::find($request['stock_id']);
                $stock->quantity = $stock->quantity + $request['quantity'];
                $stock->update();

                return redirect()->back()->with(['success' => 'Product Entry Successfully']);
            }
        else 
            {
                $stockDelivary = new StockDelivary();
                $stockDelivary->stock_id = $request['stock_id'];
                $stockDelivary->type = $request['type'];
                $stockDelivary->quantity_delivary = $request['quantity'];
                $stockDelivary->address = $request['address'];
                $stockDelivary->save();

                $stock = Stock::find($request['stock_id']);
                $stock->quantity = $stock->quantity - $request['quantity'];
                $stock->update();

                return redirect()->back()->with(['success' => 'Product Delivary Successfully']);
            }
    }


}