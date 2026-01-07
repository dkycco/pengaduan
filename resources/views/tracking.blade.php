@extends('layouts.main-layout')
@section('content')
<section class="content-grid" style="grid-template-columns: 1fr;">
    <div class="glass-card table-card" style="grid-column: span 1;">
        <div class="card-header">
            <div>
                <h2 class="card-title">Pengaduan</h2>
                <p class="card-subtitle">Semua pengaduanmu</p>
            </div>
            <div class="card-actions">
                <div class="search-box">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path
                            d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <input type="text" class="search-input" placeholder="Cari pengaduanmu...">
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <table class="data-table">
                @forelse ($data as $item)
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Suka</th>
                            <th>anonim</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ \Illuminate\Support\Str::limit($item->judul, 20, '...') }}</td>
                            <td>{{ ucwords(str_replace('_', ' ', $item->kategori)) }}</td>
                            <td>{{ formatTanggal( $item->created_at) }}</td>
                            <td>{{ $item->suka }}</td>
                            <td>
                                @if ($item->anonim === 'true')
                                    <span class="status-badge processing">Anonim</span>
                                @elseif ($item->anonim === 'false')
                                    <span class="status-badge pending">Tidak</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->pengaduan_status->status === 'terkirim')
                                    <span class="status-badge pending">Terkirim</span>
                                @elseif ($item->pengaduan_status->status === 'diproses')
                                    <span class="status-badge processing">Diproses</span>
                                @elseif ($item->pengaduan_status->status === 'selesai')
                                    <span class="status-badge completed">Selesai</span>
                                @endif
                            </td>
                            <td class="table-action">
                                <a href="" class="card-btn card-btn-edit" style="padding: 6px 12px;">
                                    <svg class="data-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 2C2.34315 2 1 3.34315 1 5V9V10V19C1 20.6569 2.34315 22 4 22H7C7.55228 22 8 21.5523 8 21C8 20.4477 7.55228 20 7 20H4C3.44772 20 3 19.5523 3 19V10V9C3 8.44772 3.44772 8 4 8H11.7808H13.5H20.1C20.5971 8 21 8.40294 21 8.9V9C21 9.55228 21.4477 10 22 10C22.5523 10 23 9.55228 23 9V8.9C23 7.29837 21.7016 6 20.1 6H13.5H11.7808L11.3489 4.27239C11.015 2.93689 9.81505 2 8.43845 2H4ZM4 6C3.64936 6 3.31278 6.06015 3 6.17071V5C3 4.44772 3.44772 4 4 4H8.43845C8.89732 4 9.2973 4.3123 9.40859 4.75746L9.71922 6H4ZM22.1213 11.7071C20.9497 10.5355 19.0503 10.5355 17.8787 11.7071L16.1989 13.3869L11.2929 18.2929C11.1647 18.4211 11.0738 18.5816 11.0299 18.7575L10.0299 22.7575C9.94466 23.0982 10.0445 23.4587 10.2929 23.7071C10.5413 23.9555 10.9018 24.0553 11.2425 23.9701L15.2425 22.9701C15.4184 22.9262 15.5789 22.8353 15.7071 22.7071L20.5556 17.8586L22.2929 16.1213C23.4645 14.9497 23.4645 13.0503 22.2929 11.8787L22.1213 11.7071ZM19.2929 13.1213C19.6834 12.7308 20.3166 12.7308 20.7071 13.1213L20.8787 13.2929C21.2692 13.6834 21.2692 14.3166 20.8787 14.7071L19.8622 15.7236L18.3068 14.1074L19.2929 13.1213ZM16.8923 15.5219L18.4477 17.1381L14.4888 21.097L12.3744 21.6256L12.903 19.5112L16.8923 15.5219Z" />
                                    </svg>
                                </a>

                                <a href="{{ url('/tracking/detail/' . $item->uuid) }}" class="card-btn card-btn-view" style="padding: 6px 12px;">
                                    <svg class="data-icon" viewBox="0 0 24 24" viewBox="0 0 24 24" stroke="currentColor"
                                        fill="none">
                                        <path
                                            d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137"
                                            stroke-width="1.5" stroke-linecap="round" />
                                        <path
                                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @empty
                    <div class="card-alert">
                        <svg class="alert-icon" viewBox="0 0 48 48" fill="currentColor" stroke="none">
                            <g id="warning">
                            <g id="warning_2">
                            <path id="Combined Shape" fill-rule="evenodd" clip-rule="evenodd" d="M44.0006 24.0002C44.0006 31.1617 40.2039 37.6662 34.1486 41.2376C33.6729 41.5182 33.0598 41.36 32.7793 40.8843C32.4987 40.4086 32.6569 39.7955 33.1326 39.5149C38.5842 36.2996 42.0006 30.4465 42.0006 24.0002C42.0006 14.0585 33.9423 6.00024 24.0006 6.00024C14.0589 6.00024 6.00061 14.0585 6.00061 24.0002C6.00061 32.1408 11.4496 39.2041 19.1933 41.3525C19.4778 41.4356 19.9645 41.5638 20.5489 41.692C20.7425 41.7344 20.9344 41.7739 21.1234 41.8098C21.666 41.913 22.0222 42.4365 21.919 42.979C21.8159 43.5216 21.2924 43.8778 20.7498 43.7746C20.5419 43.7351 20.3316 43.6919 20.1203 43.6455C19.4859 43.5063 18.9569 43.3671 18.6453 43.2759C10.0544 40.8926 4.00061 33.0453 4.00061 24.0002C4.00061 12.954 12.9543 4.00024 24.0006 4.00024C35.0469 4.00024 44.0006 12.954 44.0006 24.0002ZM20.9834 26.9104C20.9834 28.5853 22.3497 29.9524 24.0254 29.9524C25.7012 29.9524 27.0674 28.5853 27.0674 26.9104V14.9944C27.0674 13.3182 25.7017 11.9524 24.0254 11.9524C22.3491 11.9524 20.9834 13.3182 20.9834 14.9944V26.9104ZM25.0674 26.9104C25.0674 27.481 24.5963 27.9524 24.0254 27.9524C23.4545 27.9524 22.9834 27.481 22.9834 26.9104V14.9944C22.9834 14.4227 23.4537 13.9524 24.0254 13.9524C24.5971 13.9524 25.0674 14.4227 25.0674 14.9944V26.9104ZM22.9741 34.8879C22.9869 34.8215 23.0533 34.6327 23.0991 34.5388C23.3411 34.0438 23.9365 33.8377 24.4312 34.0781C24.926 34.3185 25.1316 34.9139 24.8908 35.4096C24.7623 35.6743 24.5295 35.8627 24.2461 35.9391C23.7128 36.0827 23.397 36.6315 23.5406 37.1647C23.6843 37.698 24.233 38.0139 24.7663 37.8702C25.6018 37.6452 26.3052 37.076 26.6899 36.2832C27.413 34.7949 26.7939 33.0025 25.3052 32.2792C23.8177 31.5564 22.0281 32.1758 21.3018 33.6614C21.1827 33.9058 21.0586 34.2585 21.0103 34.5094C20.9057 35.0517 21.2606 35.576 21.8029 35.6806C22.3452 35.7851 22.8696 35.4302 22.9741 34.8879Z"/>
                            </g>
                            </g>
                        </svg>
                        <span>Hmm, sepertinya tidak ada apa-apa disini...</span>
                    </div>
                @endforelse
            </table>
        </div>
    </div>
</section>
@endsection
