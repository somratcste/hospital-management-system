<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nurse;
use Illuminate\Support\Facades\Input;
use File;

class NurseController extends Controller
{
    public function getIndex ()
    {
        return view('admin.nurse');
    }

    public function save(Request $request)
    {
        $this->validate($request , [
            'name'      => 'required|max:200',
            'degree'    => 'required|max:100',
            'gender'    => 'required',
            'birthDate' => 'required',
            'mobile'    => 'required|numeric',
            'email'     => 'required|email'
        ]);

        $nurse            = new Nurse();
        $nurse->name      = ucfirst($request['name']);
        $nurse->degree    = $request['degree'];
        $nurse->gender    = $request['gender'];
        $nurse->birthDate = $request['birthDate'];
        $nurse->mobile    = $request['mobile'];
        $nurse->email     = $request['email'];     
        $nurse->hAddress  = $request['hAddress'];
        $nurse->oaddress  = $request['oAddress'];
        $nurse->specialist = $request['specialist'];
        if(Input::hasFile('image')){

            $file = Input::file('image');
            $file->move(public_path(). '/images/nurses',$file->getClientOriginalName());

            $nurse->image = $file->getClientOriginalName();
            $nurse->size = $file->getClientsize();
            $nurse->type = $file->getClientMimeType();
        }
        $nurse->save();

        return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       $this->validate($request , [
            'name'      => 'required|max:200',
            'degree'    => 'required|max:100',
            'gender'    => 'required',
            'birthDate' => 'required',
            'mobile'    => 'required',
            'email'     => 'required|email'
        ]);


        $nurse            = Nurse::find($request['nurse_id']);
        $nurse->name      = ucfirst($request['name']);
        $nurse->degree    = $request['degree'];
        $nurse->gender    = $request['gender'];
        $nurse->birthDate = $request['birthDate'];
        $nurse->mobile    = $request['mobile'];
        $nurse->email     = $request['email'];     
        $nurse->hAddress  = $request['hAddress'];
        $nurse->oaddress  = $request['oAddress'];
        $nurse->specialist = $request['specialist'];
        if(Input::hasFile('image')){

            if($nurse->image){
                $image_path = public_path().'/images/nurses/'.$nurse->image;
                unlink($image_path);
            }
            $file = Input::file('image');
            $file->move(public_path(). '/images/nurses',$file->getClientOriginalName());

            $nurse->image = $file->getClientOriginalName();
            $nurse->size = $file->getClientsize();
            $nurse->type = $file->getClientMimeType();
        }
        $nurse->update();
        return redirect()->route('nurse.list')->with(['success' => 'Updated Successfully'] );
    }

    public function viewList()
    {
        $nurse = Nurse::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.nurse_list' , ['nurses' => $nurse]);
    }

    public function delete(Request $request)
    {
        $nurse = Nurse::find($request['nurse_id']);
        if(!$nurse){
            return redirect()->route('nurse.list')->with(['fail' => 'Page not found !']);
        }
        if($nurse->image){
            $image_path = public_path().'/images/nurses/'.$nurse->image;
            unlink($image_path);
        }
        $nurse->delete();
        return redirect()->route('nurse.list')->with(['success' => 'Deleted Information Successfully !']);

    }
}
