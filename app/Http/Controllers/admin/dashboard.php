<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryInformasi;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index()
    {
        $jumgaleri = GalleryInformasi::count();
        $totalVisitors = cache()->get('total_visitors', 0);
        return view('admin.dashboard', compact('jumgaleri', 'totalVisitors'));
    }
}
