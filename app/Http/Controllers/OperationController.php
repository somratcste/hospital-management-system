<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OperationType;
use Illuminate\Support\Facades\Input;
use File;
use App\Operation;
class OperationController extends Controller
{
    public function operationTypeIndex ()
    {
        return view('admin.operationType');
    }

    public function operationTypesave(Request $request)
    {
    	$this->validate($request , [
            'name' => 'required',
    		'cost' => 'required'
    	]);

    	$operation 		   = new OperationType();
    	$operation->name 	   = ucfirst($request['name']);
    	$operation->cost    = $request['cost'];
    	$operation->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function operationTypeupdate(Request $request)
    {
       $this->validate($request , [
            'name' => 'required',
            'cost' => 'required'
        ]);


        $operation            = OperationType::find($request['operationType_id']);
        $operation->name      = ucfirst($request['name']);
        $operation->cost    = $request['cost'];
        $operation->update();
        return redirect()->route('operationType.list')->with(['success' => 'Updated Successfully'] );
    }

    public function operationTypeViewList()
    {
        $operation = OperationType::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.operationType_list' , ['operationTypes' => $operation]);

    }

    public function operationTypedelete(Request $request)
    {
        $operation = OperationType::find($request['operationType_id']);
        if(!$operation){
            return redirect()->route('operationType.list')->with(['fail' => 'Page not found !']);
        }

        $operation->delete();
        return redirect()->route('operationType.list')->with(['success' => 'Deleted Information Successfully !']);

    }

    //operation Controller 
    
    public function getIndex ()
    {
        return view('admin.operation');
    }

    public function save(Request $request)
    {
        $this->validate($request , [
            'patient_id' => 'required',
            'operationType_id' => 'required',
            'description' => 'required'
        ]);

        $operation          = new Operation();
        $operation->patient_id      = $request['patient_id'];
        $operation->operationType_id    = $request['operationType_id'];
        $operation->description    = $request['description'];
        if(Input::hasFile('image')){

            $file = Input::file('image');
            $file->move(public_path(). '/images/operations',$file->getClientOriginalName());

            $operation->image = $file->getClientOriginalName();
            $operation->size = $file->getClientsize();
            $operation->type = $file->getClientMimeType();
        }
        $operation->save();

        return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       $this->validate($request , [
            'patient_id' => 'required',
            'operationType_id' => 'required',
            'description' => 'required'
        ]);


        $operation            = Operation::find($request['operation_id']);
        $operation->patient_id      = $request['patient_id'];
        $operation->operationType_id    = $request['operationType_id'];
        $operation->description    = $request['description'];
        if(Input::hasFile('image')){

            if($operation->image){
                $image_path = public_path().'/images/operations/'.$operation->image;
                unlink($image_path);
            }
            $file = Input::file('image');
            $file->move(public_path(). '/images/operations',$file->getClientOriginalName());

            $operation->image = $file->getClientOriginalName();
            $operation->size = $file->getClientsize();
            $operation->type = $file->getClientMimeType();
        }
        $operation->update();
        return redirect()->route('operation.list')->with(['success' => 'Updated Successfully'] );
    }

    public function viewList($operationFloor = null)
    {
        $operation = Operation::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.operation_list' , ['operations' => $operation]);
    }

    public function delete(Request $request)
    {
        $operation = Operation::find($request['operation_id']);
        if(!$operation){
            return redirect()->route('operation.list')->with(['fail' => 'Page not found !']);
        }
        if($operation->image){
            $image_path = public_path().'/images/operations/'.$operation->image;
            unlink($image_path);
        }
        $operation->delete();
        return redirect()->route('operation.list')->with(['success' => 'Deleted Information Successfully !']);

    }
}
