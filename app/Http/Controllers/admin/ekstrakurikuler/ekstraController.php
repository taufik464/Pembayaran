<?php

namespace App\Http\Controllers\admin\ekstrakurikuler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ekstraController extends Controller
{
    public function index()
    {
        return view('admin.ekstrakurikuler.index');
    }
}
