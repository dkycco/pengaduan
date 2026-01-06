<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() {
        $pengaduan = Pengaduan::get();
        $pengaduan_selesai = Pengaduan::whereHas('pengaduan_status', function($query) {
            $query->where('status', 'selesai');
        })->take(10)->get();
        return view('beranda', compact('pengaduan', 'pengaduan_selesai'));
    }
}
