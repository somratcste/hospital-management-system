<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ecategory;

class EmployeeCategoryController extends Controller
{

    public function index()
    {
        $ecategory = Ecategory::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.e_category' , ['ecategorys' => $ecategory]);
    }


    public function show()
    {
        $ecategory = Ecategory::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.e_category' , ['ecategorys' => $ecategory]);
    }

    public function store(Request $request) 
    {
        $ecategory = new Ecategory();
        $ecategory->name = $request['name'];
        $ecategory->save();
        return redirect()->back()->with(['success1' => 'Category Created Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $ecategory = Ecategory::find($id);
        $ecategory->name = $request['name'];
        $ecategory->save();
        return redirect()->back()->with(['success' => 'Category Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $ecategory = Ecategory::find($id);
        if(!$ecategory){
            return redirect()->route('ecategory.index')->with(['fail' => 'Page not found !']);
        }
        $ecategory->delete();
        return redirect()->route('ecategory.index')->with(['success' => 'Category Deleted.']);
    }

}