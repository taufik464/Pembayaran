<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sarprasController extends Controller
{
    public function index()
    {
        return view('sarpras.sarpras');
    }
}
