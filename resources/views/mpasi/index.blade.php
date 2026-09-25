@extends('layouts.app')

@section('title', 'Mamam Yuk - Mamam Yuk Harian Untuk Si Kecil')

@section('content')
    @include('mpasi.partials.data-json')

    <div id="loading-overlay" style="display: none;">
        <div class="spinner-border text-warning" style="width: 3.5rem; height: 3.5rem;" role="status"></div>
        <div class="mt-3 fw-bold text-brand-purple">Memuat Mamam Yuk - Mamam Yuk Harian Si Kecil...</div>
    </div>

    <div id="app">
        @include('mpasi.partials.portal-pelanggan')
        @include('mpasi.partials.portal-kasir')
        @include('mpasi.partials.portal-admin')
        @include('mpasi.partials.portal-owner')
    </div>

    @include('mpasi.partials.scripts')
@endsection
