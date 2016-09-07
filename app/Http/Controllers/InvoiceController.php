<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
	public function invoice()
    {
        return view('admin.invoice');
    }
}