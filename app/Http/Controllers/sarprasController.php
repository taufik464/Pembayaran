<?php

namespace App\Http\Controllers;
use App\Models\Sarpras;
use Illuminate\Http\Request;


class sarprasController extends Controller
{
    public function index()
    {
        $sarpras = Sarpras::all();
        return view('sarpras.sarpras')->with('sarpras', $sarpras);
    }
}
