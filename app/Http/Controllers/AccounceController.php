<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\AccounceCost;
use Illuminate\Http\Request;

class AccounceController extends Controller 
{
	public function index()
    {
        $accounce_costs = AccounceCost::whereDate('created_at' , '=' , Carbon::today()->toDateString())->orderBy('created_at' , 'desc')->get();
        return view('admin.accounce_cost' , ['accounce_costs' => $accounce_costs]);
    }


    public function show()
    {
        $accounce_costs = AccounceCost::whereDate('created_at' , '=' , Carbon::today()->toDateString())->orderBy('created_at' , 'desc')->get();
        return view('admin.accounce_cost' , ['accounce_costs' => $accounce_costs]);
    }

    public function store(Request $request) 
    {
        $accounce_cost = new AccounceCost();
        $accounce_cost->name = $request['name'];
        $accounce_cost->taka = $request['taka'];
        $accounce_cost->save();
        return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }
}