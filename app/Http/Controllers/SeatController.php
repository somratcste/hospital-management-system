<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seat;
use Illuminate\Support\Facades\Input;
use File;
class SeatController extends Controller
{
    public function getIndex ()
    {
        return view('admin.seat');
    }

    public function save(Request $request)
    {
    	$this->validate($request , [
            'seatNo' => 'required',
    		'seatFloor' => 'required',
    		'rent'	=> 'required',
            'seatType' => 'required',
    		'status' => 'required'
    	]);

    	$seat 		   = new Seat();
    	$seat->seatNo 	   = ucfirst($request['seatNo']);
    	$seat->seatFloor    = $request['seatFloor'];
    	$seat->rent	   = $request['rent'];
        $seat->seatType = $request['seatType'];
    	$seat->status = $request['status'];
        if(Input::hasFile('image')){

            $file = Input::file('image');
            $file->move(public_path(). '/images/seats',$file->getClientOriginalName());

            $seat->image = $file->getClientOriginalName();
            $seat->size = $file->getClientsize();
            $seat->type = $file->getClientMimeType();
        }
    	$seat->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       $this->validate($request , [
            'seatNo' => 'required',
            'seatFloor' => 'required',
            'rent'  => 'required',
            'seatType' => 'required',
            'status' => 'required'
        ]);


        $seat            = Seat::find($request['seat_id']);
        $seat->seatNo      = ucfirst($request['seatNo']);
        $seat->seatFloor    = $request['seatFloor'];
        $seat->rent    = $request['rent'];
        $seat->seatType = $request['seatType'];
        $seat->status = $request['status'];
        if(Input::hasFile('image')){

            if($seat->image){
                $image_path = public_path().'/images/seats/'.$seat->image;
                unlink($image_path);
            }
            $file = Input::file('image');
            $file->move(public_path(). '/images/seats',$file->getClientOriginalName());

            $seat->image = $file->getClientOriginalName();
            $seat->size = $file->getClientsize();
            $seat->type = $file->getClientMimeType();
        }
        $seat->update();
        return redirect()->route('seat.list' , ['seat' => $seat->seatFloor])->with(['success' => 'Updated Successfully'] );
    }

    public function viewList($seatFloor = null)
    {
        $seat = Seat::orderBy('created_at' , 'desc')->where('seatFloor' , $seatFloor)->paginate(50);
        return view('admin.seat_list' , ['seats' => $seat , 'seatFloor' => $seatFloor]);
    }

    public function delete(Request $request)
    {
        $seat = Seat::find($request['seat_id']);
        if(!$seat){
            return redirect()->route('seat.list')->with(['fail' => 'Page not found !']);
        }
        if($seat->image){
            $image_path = public_path().'/images/seats/'.$seat->image;
            unlink($image_path);
        }
        $seat->delete();
        return redirect()->route('seat.list' , ['seat' => $seat->seatFloor ])->with(['success' => 'Deleted Information Successfully !']);

    }
}
