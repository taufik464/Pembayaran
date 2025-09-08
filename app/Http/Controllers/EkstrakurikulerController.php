<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstra = Ekstrakurikuler::all();
        return view('ekstrakurikuler.index', compact('ekstra'));
    }

  
}
