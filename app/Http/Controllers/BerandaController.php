<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() {
        $data = Pengaduan::get();
        return view('beranda', compact('data'));
    }
}
