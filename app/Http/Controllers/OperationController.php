<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OperationType;
use Illuminate\Support\Facades\Input;
use App\Operation;
use App\Doctor; 
use Auth;
use App\OperationProduct;

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
    
    public function index ()
    {
        $operation_id = Operation::orderBy('created_at','desc')->first();
        if($operation_id == NULL){
            $operation_id = 0 ;
        } else {
            $operation_id = $operation_id->id ;
        } 
        $doctors = Doctor::all();  
        return view('admin.operation' , ['operation_id' => $operation_id +1,'doctors'=>$doctors]);
    }

    public function store(Request $request)
    {
        $this->validate($request , [ 
            'patient_id' => 'unique:operations' 
        ]);
        date_default_timezone_set("Asia/Dhaka");
        $operation = new Operation();
        $operation->patient_id = $request['patient_id'];
        $operation->doctor_id = $request['doctor_id'];
        $operation->dateTime = $request['dateTime'];
        $operation->subtotal = $request['subtotal'];
        $operation->user_id = Auth::user()->id ;
        $operation->save();
        $operationID = $operation->id;
        
        
        for($i=0;$i<count($_POST['itemNo']);$i++)
        {
            $operationproduct = new OperationProduct();
            $operationproduct->operation_id = $operationID;
            $operationproduct->operation_type_id = $request['itemNo'][$i];
            $operationproduct->operation_name = $request['itemName'][$i];
            $operationproduct->operation_cost = $request['total'][$i];
            $operationproduct->save();
        }
        return redirect()->route('operation.create')->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request ,$id)
    {
        $operation = Operation::find($id);
        $operation->subtotal = $request['subtotal'];
        

        $operationproduct = OperationProduct::where('operation_id', $request['operation_id'])->get();
        $count = $operationproduct->count();
        for($i=1 ; $i<= $count; $i++) 
        {
            $operationproduct = OperationProduct::where('operation_id', $request['operation_id'])->first();

            $operationproduct->delete();
        }

        $operation->update();

        for($i=0;$i<count($_POST['itemNo']);$i++)
        {
            $operationproduct = new OperationProduct();
            $operationproduct->operation_id = $id;
            $operationproduct->operation_type_id = $request['itemNo'][$i];
            $operationproduct->operation_name = $request['itemName'][$i];
            $operationproduct->operation_cost = $request['total'][$i];
            $operationproduct->save();

        }
        return redirect()->route('operation.create')->with(['success' => 'Update Successfully'] );
    }

    public function viewList($operationFloor = null)
    {
        $operation = Operation::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.operation_list' , ['operations' => $operation]);
    }

    public function destroy(Request $request ,$id)
    {
        $operation = Operation::find($id);
        if(!$operation){
            return redirect()->route('operation.create')->with(['fail' => 'Page not found !']);
        }

        
        $operationproduct = OperationProduct::where('operation_id', $request['operation_id'])->get();
        $count = $operationproduct->count();
        for($i=1 ; $i<= $count; $i++) 
        {
            $operationproduct = OperationProduct::where('operation_id', $request['operation_id'])->first();
            $operationproduct->delete();
        }

        $operation->delete();
        return redirect()->route('operation.create')->with(['success' => 'Deleted Successfully.']);
    }

    public function create()
    {
        $operation = Operation::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.operation_list' , ['operations' => $operation]);
    }

    public function get(Request $request)
    {
        $operation_id = $request['operation_id'];
        $operation = Operation::Find($operation_id);
        $operationproducts = OperationProduct::where('operation_id',$operation_id)->get();
        return view('admin.operation_get', ['operation'=>$operation,'operationproducts'=>$operationproducts]); 
    }

    public function autocomplete_indoor_patient(Request $request)
    {
        $term = $request->term ;
        $data =  Patient::where('id','LIKE','%'.$term.'%')
        ->orWhere('name','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results = array();
        foreach ($data as $value) {
            $results[] = ['label' => $value->name .'-'. $value->pphone ,'id' => $value->id];
        }
        return response()->json($results);
    }

    public function view(Request $request)
    {
        $operation_id = $request['operation_id'];
        $operation = Operation::Find($operation_id);
        $delivaryTime = $operation->created_at;
        $money = $operation->subtotal;
        $operationproducts = OperationProduct::where('operation_id',$operation_id)->get();
        return view('admin.operation_view', ['operation'=>$operation,'operationproducts'=>$operationproducts, 'money' => $money]);
    }
}
