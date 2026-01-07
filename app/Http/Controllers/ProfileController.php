<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class ProfileController extends Controller
{
    public function index() {
        return view('profile');
    }

    public function new_password(Request $request)
    {
        $request->validate([
            'password_sekarang' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ], [
            'password_sekarang.required' => 'Password sekarang wajib diisi',
            'password_baru.required' => 'Password baru wajib diisi',
            'password_baru.min' => 'Password baru minimal 8 karakter',
            'password_baru.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user = Auth::user();

        if (! Hash::check($request->password_sekarang, $user->password)) {
            return back()->with('error', 'Password sekarang salah');
        }

        try {
            $user->update([
                'password' => bcrypt($request->password_baru)
            ]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('login');
        } catch (\Throwable $th) {
            return back()->with('error', 'Password berhasil diubah' . $th->getMessage());
        }

    }
}
