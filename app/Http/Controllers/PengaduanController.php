<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\PengaduanStatus;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function tracking() {
        $data = Pengaduan::get();
        return view('tracking', compact('data'));
    }

    public function tracking_detail($uuid) {
        $data = Pengaduan::where('uuid', $uuid)->firstOrFail();;
        return view('tracking-detail', compact('data'));
    }

    public function pengaduan_baru() {
        return view('pengaduan-baru');
    }

    public function pengaduan_store(Request $request) {
        $validated = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'fakultas' => 'required',
            'lokasi_ruangan' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png',
            'deskripsi' => 'required',
            'harapan_saran' => 'required'
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
                'user_uuid' => auth()->user()->uuid,
                'judul' => $validated['judul'],
                'kategori' => $validated['kategori'],
                'fakultas_id' => $validated['fakultas'],
                'lokasi_ruangan_id' => $validated['lokasi_ruangan'],
                'gambar' => $path,
                'deskripsi' => $validated['deskripsi'],
                'harapan_saran' => $validated['harapan_saran'],
                'anonim' => $request->anonim ? 'true' : 'false'
            ]);

            PengaduanStatus::create([
                'pengaduan_uuid' => $pengaduan->uuid,
                'status' => 'terkirim',
                'waktu_terkirim' => now()
            ]);

            return redirect('/')
                ->with('success', 'Pengaduan berhasil dikirim');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Pengaduan gagal dikirim');
        }
    }
}
