<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketing;

class MarketingController extends Controller
{

    public function index()
    {
        $marketing = Marketing::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.marketing' , ['marketings' => $marketing]);
    }


    public function show()
    {
        $marketing = Marketing::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.marketing' , ['marketings' => $marketing]);
    }

    public function store(Request $request) 
    {
        $marketing = new Marketing();
        $marketing->name = $request['name'];
        $marketing->mobile = $request['mobile'];
        $marketing->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $marketing = Marketing::find($id);
        $marketing->name = $request['name'];
        $marketing->mobile = $request['mobile'];
        $marketing->save();
        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $marketing = Marketing::find($id);
        if(!$marketing){
            return redirect()->route('marketing.index')->with(['fail' => 'Page not found !']);
        }
        $marketing->delete();
        return redirect()->route('marketing.index')->with(['success' => 'Deleted Successfully.']);
    }

}