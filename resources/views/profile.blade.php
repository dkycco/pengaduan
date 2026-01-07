@extends('layouts.main-layout')

@section('content')
    <div class="settings-grid">
    <div class="glass-card settings-nav-card">
        <ul class="settings-nav">
            <li class="settings-nav-item">
                <a href="#" class="settings-nav-link active" data-tab="profile">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Data Diri
                </a>
            </li>
            <li class="settings-nav-item">
                <a href="#" class="settings-nav-link" data-tab="security">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    Keamanan
                </a>
            </li>
        </ul>
    </div>

    <div class="glass-card">
        <div class="settings-tab-content active" id="tab-profile">
            <div class="settings-section">
                <h3 class="settings-section-title">Informasi Data Diri</h3>
                <div class="form-grid">
                    <div class="form-group-settings">
                        <label>Nama lengkap</label>
                        <input disabled type="text" value="{{ auth()->user()->nama }}">
                    </div>
                    <div class="form-group-settings">
                        <label>NIM</label>
                        <input disabled type="number" value="{{ auth()->user()->nim }}">
                    </div>
                    <div class="form-group-settings">
                        <label>Fakultas</label>
                        <input disabled type="text" value="{{ auth()->user()->fakultas->nama }}">
                    </div>
                    <div class="form-group-settings">
                        <label>Prodi</label>
                        <input disabled type="text" value="{{ auth()->user()->prodi->nama }}">
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('new-password') }}" method="POST">
            @csrf
            <div class="settings-tab-content" id="tab-security">
                <div class="settings-section">
                    <h3 class="settings-section-title">Data Pengaduan</h3>
                    <div class="form-grid">
                        <div class="form-group-settings full-width">
                            <label>Password Sekarang</label>
                            <input name="password_sekarang" type="text" placeholder="Masukan password sekarang">
                        </div>
                        <div class="form-group-settings">
                            <label>Password Baru</label>
                            <input name="password_baru" type="text" placeholder="Masukan password baru">
                        </div>
                        <div class="form-group-settings">
                            <label>Konfirmasi Password Baru</label>
                            <input name="password_baru_confirmation" type="text" placeholder="Masukan password baru">
                        </div>
                    </div>
                </div>
                    
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary" style="width: auto;">Simpan</button>
                    <button type="button" class="btn btn-secondary" style="width: auto;">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection