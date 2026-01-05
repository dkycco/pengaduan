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
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Suka</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>LAB komputer yang tidak layak</td>
                        <td>Fasilitas</td>
                        <td>1 Januari 2026</td>
                        <td>200</td>
                        <td><span class="status-badge processing">Diproses</span></td>
                        <td class="table-action">
                            <a href="" class="card-btn card-btn-edit" style="padding: 6px 12px;">
                                <svg class="data-icon" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 2C2.34315 2 1 3.34315 1 5V9V10V19C1 20.6569 2.34315 22 4 22H7C7.55228 22 8 21.5523 8 21C8 20.4477 7.55228 20 7 20H4C3.44772 20 3 19.5523 3 19V10V9C3 8.44772 3.44772 8 4 8H11.7808H13.5H20.1C20.5971 8 21 8.40294 21 8.9V9C21 9.55228 21.4477 10 22 10C22.5523 10 23 9.55228 23 9V8.9C23 7.29837 21.7016 6 20.1 6H13.5H11.7808L11.3489 4.27239C11.015 2.93689 9.81505 2 8.43845 2H4ZM4 6C3.64936 6 3.31278 6.06015 3 6.17071V5C3 4.44772 3.44772 4 4 4H8.43845C8.89732 4 9.2973 4.3123 9.40859 4.75746L9.71922 6H4ZM22.1213 11.7071C20.9497 10.5355 19.0503 10.5355 17.8787 11.7071L16.1989 13.3869L11.2929 18.2929C11.1647 18.4211 11.0738 18.5816 11.0299 18.7575L10.0299 22.7575C9.94466 23.0982 10.0445 23.4587 10.2929 23.7071C10.5413 23.9555 10.9018 24.0553 11.2425 23.9701L15.2425 22.9701C15.4184 22.9262 15.5789 22.8353 15.7071 22.7071L20.5556 17.8586L22.2929 16.1213C23.4645 14.9497 23.4645 13.0503 22.2929 11.8787L22.1213 11.7071ZM19.2929 13.1213C19.6834 12.7308 20.3166 12.7308 20.7071 13.1213L20.8787 13.2929C21.2692 13.6834 21.2692 14.3166 20.8787 14.7071L19.8622 15.7236L18.3068 14.1074L19.2929 13.1213ZM16.8923 15.5219L18.4477 17.1381L14.4888 21.097L12.3744 21.6256L12.903 19.5112L16.8923 15.5219Z" />
                                </svg>
                            </a>

                            <a href="{{ route('tracking-detail') }}" class="card-btn card-btn-view" style="padding: 6px 12px;">
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

                    <tr>
                        <td>Projektor tidak layak pakai</td>
                        <td>Fasilitas</td>
                        <td>1 Januari 2026</td>
                        <td>340</td>
                        <td><span class="status-badge completed">Selesai</span></td>
                        <td class="table-action">
                            <button class="card-btn card-btn-edit" style="padding: 6px 12px;">
                                <svg class="data-icon" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 2C2.34315 2 1 3.34315 1 5V9V10V19C1 20.6569 2.34315 22 4 22H7C7.55228 22 8 21.5523 8 21C8 20.4477 7.55228 20 7 20H4C3.44772 20 3 19.5523 3 19V10V9C3 8.44772 3.44772 8 4 8H11.7808H13.5H20.1C20.5971 8 21 8.40294 21 8.9V9C21 9.55228 21.4477 10 22 10C22.5523 10 23 9.55228 23 9V8.9C23 7.29837 21.7016 6 20.1 6H13.5H11.7808L11.3489 4.27239C11.015 2.93689 9.81505 2 8.43845 2H4ZM4 6C3.64936 6 3.31278 6.06015 3 6.17071V5C3 4.44772 3.44772 4 4 4H8.43845C8.89732 4 9.2973 4.3123 9.40859 4.75746L9.71922 6H4ZM22.1213 11.7071C20.9497 10.5355 19.0503 10.5355 17.8787 11.7071L16.1989 13.3869L11.2929 18.2929C11.1647 18.4211 11.0738 18.5816 11.0299 18.7575L10.0299 22.7575C9.94466 23.0982 10.0445 23.4587 10.2929 23.7071C10.5413 23.9555 10.9018 24.0553 11.2425 23.9701L15.2425 22.9701C15.4184 22.9262 15.5789 22.8353 15.7071 22.7071L20.5556 17.8586L22.2929 16.1213C23.4645 14.9497 23.4645 13.0503 22.2929 11.8787L22.1213 11.7071ZM19.2929 13.1213C19.6834 12.7308 20.3166 12.7308 20.7071 13.1213L20.8787 13.2929C21.2692 13.6834 21.2692 14.3166 20.8787 14.7071L19.8622 15.7236L18.3068 14.1074L19.2929 13.1213ZM16.8923 15.5219L18.4477 17.1381L14.4888 21.097L12.3744 21.6256L12.903 19.5112L16.8923 15.5219Z" />
                                </svg>
                            </button>

                            <button class="card-btn card-btn-view" style="padding: 6px 12px;">
                                <svg class="data-icon" viewBox="0 0 24 24" viewBox="0 0 24 24" stroke="currentColor"
                                    fill="none">
                                    <path
                                        d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                        stroke-width="1.5" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
