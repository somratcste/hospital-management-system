<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportType;
use Illuminate\Support\Facades\Input;
use File;
use App\Report;
class ReportController extends Controller
{
    public function reportTypeIndex ()
    {
        return view('admin.reportType');
    }

    public function reportTypesave(Request $request)
    {
    	$this->validate($request , [
            'name' => 'required',
    		'cost' => 'required'
    	]);

    	$report 		   = new ReportType();
    	$report->name 	   = ucfirst($request['name']);
    	$report->cost    = $request['cost'];
    	$report->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function reportTypeupdate(Request $request)
    {
       $this->validate($request , [
            'name' => 'required',
            'cost' => 'required'
        ]);


        $report            = ReportType::find($request['reportType_id']);
        $report->name      = ucfirst($request['name']);
        $report->cost    = $request['cost'];
        $report->update();
        return redirect()->route('reportType.list')->with(['success' => 'Updated Successfully'] );
    }

    public function reportTypeViewList()
    {
        $report = ReportType::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.reportType_list' , ['reportTypes' => $report]);

    }

    public function reportTypedelete(Request $request)
    {
        $report = ReportType::find($request['reportType_id']);
        if(!$report){
            return redirect()->route('reportType.list')->with(['fail' => 'Page not found !']);
        }

        $report->delete();
        return redirect()->route('reportType.list')->with(['success' => 'Deleted Information Successfully !']);

    }

    //Report Controller 
    
    public function getIndex ()
    {
        return view('admin.report');
    }

    public function save(Request $request)
    {
        $this->validate($request , [
            'patient_id' => 'required',
            'reportType_id' => 'required',
            'description' => 'required'
        ]);

        $report          = new Report();
        $report->patient_id      = $request['patient_id'];
        $report->reportType_id    = $request['reportType_id'];
        $report->description    = $request['description'];
        if(Input::hasFile('image')){

            $file = Input::file('image');
            $file->move(public_path(). '/images/reports',$file->getClientOriginalName());

            $report->image = $file->getClientOriginalName();
            $report->size = $file->getClientsize();
            $report->type = $file->getClientMimeType();
        }
        $report->save();

        return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       $this->validate($request , [
            'patient_id' => 'required',
            'reportType_id' => 'required',
            'description' => 'required'
        ]);


        $report            = Report::find($request['report_id']);
        $report->patient_id      = $request['reportNo'];
        $report->reportType_id    = $request['reportType_id'];
        $report->description    = $request['description'];
        if(Input::hasFile('image')){

            if($report->image){
                $image_path = public_path().'/images/reports/'.$report->image;
                unlink($image_path);
            }
            $file = Input::file('image');
            $file->move(public_path(). '/images/reports',$file->getClientOriginalName());

            $report->image = $file->getClientOriginalName();
            $report->size = $file->getClientsize();
            $report->type = $file->getClientMimeType();
        }
        $report->update();
        return redirect()->route('report.list')->with(['success' => 'Updated Successfully'] );
    }

    public function viewList($reportFloor = null)
    {
        $report = Report::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.report_list' , ['reports' => $report]);
    }

    public function delete(Request $request)
    {
        $report = report::find($request['report_id']);
        if(!$report){
            return redirect()->route('report.list')->with(['fail' => 'Page not found !']);
        }
        if($report->image){
            $image_path = public_path().'/images/reports/'.$report->image;
            unlink($image_path);
        }
        $report->delete();
        return redirect()->route('report.list')->with(['success' => 'Deleted Information Successfully !']);

    }
}
