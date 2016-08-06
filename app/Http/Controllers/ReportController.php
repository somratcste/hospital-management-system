<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportType;
use Illuminate\Support\Facades\Input;
use File;
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


        $report            = ReportType::find($request['report_id']);
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
        $report = ReportType::find($request['report_id']);
        if(!$report){
            return redirect()->route('reportType.list')->with(['fail' => 'Page not found !']);
        }

        $report->delete();
        return redirect()->route('reportType.list')->with(['success' => 'Deleted Information Successfully !']);

    }
}
