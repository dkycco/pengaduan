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
                    <svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="2">
                        <g clip-path="url(#clip0_901_1370)">
                        <path d="M21 1V10C21 10 21 11 22 11H26M21 1C21 1 22 1 23 2L30 9C31 10 31 11 31 11V30C31 31 30 31 30 31H13V11M21 1H11M13 11L7 13M13 11L7 1L1 11M7 31V13M7 13L1 11M4 6H10M1 11V29" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_901_1370">
                        <rect width="32" height="32" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                    Data Pengaduan
                </a>
            </li>
        </ul>
    </div>

    <div class="glass-card">
        <form action="{{ route('pengaduan-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="settings-tab-content active" id="tab-profile">
                <div class="settings-section">
                    <h3 class="settings-section-title">Informasi Data Diri</h3>
                    <div class="form-grid">
                        <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                        <div class="form-group-settings">
                            <label>Nama lengkap</label>
                            <input type="text" value="{{ auth()->user()->nama }}">
                        </div>
                        <div class="form-group-settings">
                            <label>NIM</label>
                            <input type="number" value="{{ auth()->user()->nim }}">
                        </div>
                        <div class="form-group-settings">
                            <label>Fakultas</label>
                            <input type="text" value="{{ auth()->user()->fakultas_id }}">
                        </div>
                        <div class="form-group-settings">
                            <label>Prodi</label>
                            <input type="text" value="{{ auth()->user()->prodi_id }}">
                        </div>
                    </div>
                </div>
    
                <div class="settings-section">
                    <h3 class="settings-section-title">Preferensi</h3>
                    <div class="settings-row">
                        <label for="">Anonim</label>
                        <label class="toggle-switch">
                            <input type="checkbox" name="anonim" value="1">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
    
                <div class="btn-group">
                    <a href="#" class="btn btn-primary settings-nav-link" data-tab="security" style="width: auto;">Selanjutnya</a>
                </div>
            </div>
    
            <div class="settings-tab-content" id="tab-security">
                <div class="settings-section">
                    <h3 class="settings-section-title">Data Pengaduan</h3>
                    <div class="form-grid">
                        <div class="form-group-settings full-width">
                            <label>Judul Pengaduan</label>
                            <input type="text" name="judul" placeholder="Masukan judul pengaduan">
                        </div>
                        <div class="form-group-settings">
                            <label>Kategori</label>
                            <select class="form-select" name="kategori">
                                <option disabled selected>Pilih kategori</option>
                                <option value="fasilitas_kampus">Fasilitas Kampus</option>
                                <option value="pelayanan_administrasi">Pelayanan Administrasi</option>
                                <option value="kebijakan_kampus">Kebijakan Kampus</option>
                                <option value="tenaga_pengajar/staf">Tenaga Pengajar/staf</option>
                                <option value="kegiatan_mahasiswa">Kegiatan Mahasiswa</option>
                            </select>
                        </div>
                        <div class="form-group-settings">
                            <label>Gambar</label>
                            <input type="file" name="gambar" placeholder="Pilih gambar">
                        </div>
                        <div class="form-group-settings">
                            <label>Fakultas</label>
                            <select class="form-select" name="fakultas">
                                <option disabled selected>Pilih fakultas</option>
                                <option value="1">Fakultas Teknik Informasi</option>
                            </select>
                        </div>
                        <div class="form-group-settings">
                            <label>Lokasi/Ruangan</label>
                            <select class="form-select" name="lokasi_ruangan">
                                <option disabled selected>Pilih lokasi/ruangan</option>
                                <option value="1">Ruang 1</option>
                            </select>
                        </div>
                        <div class="form-group-settings full-width">
                            <label>Deskrip Pengaduan</label>
                            <textarea name="deskripsi"></textarea>
                        </div>
                        <div class="form-group-settings full-width">
                            <label>Harapan/Saran</label>
                            <textarea name="harapan_saran"></textarea>
                        </div>
                    </div>
                </div>
    
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary" style="width: auto;">Simpan</button>
                    <a href="#" class="btn btn-secondary settings-nav-link" data-tab="profile" style="width: auto;">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil 🎉',
            text: 'Pengaduan berhasil dikirim',
            icon: 'success',
            background: 'rgba(255, 255, 255, 0.05)',
            confirmButtonText: 'OK',
            confirmButtonColor: '#34d399',
            customClass: {
                popup: 'custom-swal'
            }
        });
    </script>
    @endif

    @if (session('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal ❌',
        text: '{{ session('error') }}',
        confirmButtonText: 'Tutup'
    });
    </script>
    @endif
@endpush
