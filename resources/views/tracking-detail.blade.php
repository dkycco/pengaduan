@extends('layouts.main-layout')

@section('content')
<div class="glass-card">
    <div class="card-header">
        <div>
            <h2 class="card-title">{{ $data->anonim === 'true' ? 'Pengguna Anonim' : $data->user->nama }}</h2>
            <p class="card-subtitle">{{ $data->created_at->format('D - d M Y') }}</p>
        </div>
        <div class="card-info">
            <div class="info-item card-subtitle">
                <svg class="info-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path
                        d="M16.1369 4.72848C14.5914 3.18295 13.8186 2.41018 12.816 2.12264C11.8134 1.83509 10.7485 2.08083 8.61875 2.57231L7.39057 2.85574C5.59881 3.26922 4.70292 3.47597 4.08944 4.08944C3.47597 4.70292 3.26922 5.59881 2.85574 7.39057L2.57231 8.61875C2.08083 10.7485 1.83509 11.8134 2.12264 12.816C2.41018 13.8186 3.18295 14.5914 4.72848 16.1369L6.55812 17.9665C9.24711 20.6555 10.5916 22 12.2623 22C13.933 22 15.2775 20.6555 17.9665 17.9665C20.6555 15.2775 22 13.933 22 12.2623C22 10.9198 21.1319 9.788 19.3957 8"
                        stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M8.60693 10.8789C9.7115 10.8789 10.6069 9.98348 10.6069 8.87891C10.6069 7.77434 9.7115 6.87891 8.60693 6.87891C7.50236 6.87891 6.60693 7.77434 6.60693 8.87891"
                        stroke-width="1.5" stroke-linecap="round" />
                    <path d="M11.5416 18.5001L12.5416 17.5001M18.5206 11.5209L14.9999 15.0417" stroke-width="1.5"
                        stroke-linecap="round" />
                </svg>
                {{ ucwords(str_replace('_', ' ', $data->kategori)) }}
            </div>
            <div class="info-item card-subtitle">
                <svg class="info-icon" fill="currentColor" viewBox="0 -0.05 26.1 26.1">
                    <g id="Group_719" data-name="Group 719" transform="translate(-50 -100)">
                        <path id="Path_1486" data-name="Path 1486"
                            d="M63,126c-7.2,0-13-1.6-13-3.5,0-1.3,2.6-2.4,6.5-3l1.6,1.7c-3.6.2-5.5.8-5.5,1.3,0,.8,4.3,1.5,10.4,1.5s10.5-.7,10.5-1.5c0-.6-1.9-1.1-5.5-1.3l1.6-1.7c3.9.6,6.5,1.7,6.5,3C76,124.4,70.2,126,63,126Zm4-17a4,4,0,1,1-4-4A4.012,4.012,0,0,1,67,109Zm-6,0a2,2,0,1,0,2-2A2.006,2.006,0,0,0,61,109Zm3,12-1,1-1-1c-.3-.4-6.6-5.8-7.8-10.5-.1-.3-.3-1.4.8-1.5.9-.1,1.1,1,1.1,1,.8,3.5,5.2,6.9,6.9,9,1.8-2.3,7-6.1,7-10,0-4.5-2.6-7-7-7-3.3,0-5.6,1.4-6.5,4,0,0-.4,1.2-1.1,1-.8-.2-.9-.8-.6-1.7A9,9,0,0,1,72,109C72,114,64.4,120.6,64,121Z" />
                    </g>
                </svg>
                {{ $data->fakultas->nama }}
            </div>
        </div>
    </div>

    <div class="card-body">
        <img class="content-img" src="{{ asset('img/img-content.jpg') }}" alt="">

        <h2 class="content-title">LAB komputer yang tidak layak</h2>
        <div class="content-text">
            <p>Terdapat beberapa komputer yang tidak layak serta kondisi dari lab tersebut tidak
                rapih dan bersih.</p>
            <span class="content-subtitle">Lihat selengkapnya...</span>
        </div>

        <div class="tracking-detail">
            <div class="row">
                <div class="col left">
                    <p class="active">20:00 WIB - 1 Januari 2026</p>
                    <p class="active">08:00 WIB - 4 Januari 2026</p>
                    <p>-</p>
                </div>

                <div class="col track">
                    <div class="active"></div>
                    <span class="active"></span>
                    <div class="active"></div>
                    <span></span>
                    <div></div>
                </div>

                <div class="col right">
                    <p class="active">Pengaduan dibuat</p>
                    <p class="active">Diproses</p>
                    <p>Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="footer-item">
            <svg class="footer-icon" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M20.5,4.609A5.811,5.811,0,0,0,16,2.5a5.75,5.75,0,0,0-4,1.455A5.75,5.75,0,0,0,8,2.5,5.811,5.811,0,0,0,3.5,4.609c-.953,1.156-1.95,3.249-1.289,6.66,1.055,5.447,8.966,9.917,9.3,10.1a1,1,0,0,0,.974,0c.336-.187,8.247-4.657,9.3-10.1C22.45,7.858,21.453,5.765,20.5,4.609Zm-.674,6.28C19.08,14.74,13.658,18.322,12,19.34c-2.336-1.41-7.142-4.95-7.821-8.451-.513-2.646.189-4.183.869-5.007A3.819,3.819,0,0,1,8,4.5a3.493,3.493,0,0,1,3.115,1.469,1.005,1.005,0,0,0,1.76.011A3.489,3.489,0,0,1,16,4.5a3.819,3.819,0,0,1,2.959,1.382C19.637,6.706,20.339,8.243,19.826,10.889Z" />
            </svg>
            200
        </div>

        <div class="footer-item">
            <a class="footer-link" href="">Edit?</a>
        </div>
    </div>
</div>
@endsection
