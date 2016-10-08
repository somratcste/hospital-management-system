<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialist;

class SpecialistController extends Controller
{

    public function index()
    {
        $specialist = Specialist::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.specialist' , ['specialists' => $specialist]);
    }


    public function show()
    {
        $specialist = Specialist::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.specialist' , ['specialists' => $specialist]);
    }

    public function store(Request $request) 
    {
        $specialist = new Specialist();
        $specialist->name = $request['name'];
        $specialist->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $specialist = Specialist::find($id);
        $specialist->name = $request['name'];
        $specialist->save();
        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $specialist = Specialist::find($id);
        if(!$specialist){
            return redirect()->route('specialist.index')->with(['fail' => 'Page not found !']);
        }
        $specialist->delete();
        return redirect()->route('specialist.index')->with(['success' => 'Deleted Successfully.']);
    }

}