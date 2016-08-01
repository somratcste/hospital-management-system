<?php 

namespace App\Http\Controllers;

class DoctorController extends Controller
{
    public function getIndex ()
    {
        return view('admin.doctor');
    }
}
