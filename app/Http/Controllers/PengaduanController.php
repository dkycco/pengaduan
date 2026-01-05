<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function tracking() {
        return view('tracking');
    }

    public function tracking_detail() {
        return view('tracking-detail');
    }

    public function pengaduan_baru() {
        return view('pengaduan-baru');
    }

    public function pengaduan_store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'fakultas' => 'required',
            'lokasi_ruangan' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
            'harapan_saran' => 'required',
        ]);

        try {
            if (!$request->hasFile('gambar')) {
                return response()->json([
                    'success' => false,
                    'message' => 'File gambar wajib diupload'
                ], 422);
            }

            $file = $request->file('gambar');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('pengaduan', $filename, 'public');

            $pengaduan = Pengaduan::create([
                'user_id' => $validated['user_id'],
                'judul' => $validated['judul'],
                'kategori' => $validated['kategori'],
                'fakultas_id' => $validated['fakultas'],
                'lokasi_ruangan_id' => $validated['lokasi_ruangan'],
                'gambar' => $path,
                'deskripsi' => $validated['deskripsi'],
                'harapan_saran' => $validated['harapan_saran']
            ]);

            return redirect()->back()
                ->with('success', 'Pengaduan berhasil dikirim');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Pengaduan gagal dikirim');
        }
    }
}
