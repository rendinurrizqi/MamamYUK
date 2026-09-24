@extends('layouts.app')

@section('title', 'Kasir POS - Mamam Yuk')

@section('content')
    @include('mpasi.partials.data-json')

    <div id="loading-overlay">
        <div class="spinner-border text-warning" style="width: 3.5rem; height: 3.5rem;" role="status"></div>
        <div class="mt-3 fw-bold text-brand-purple">Memuat Portal Kasir Mamam Yuk...</div>
    </div>

    <div id="app">
        @include('mpasi.partials.portal-kasir')
    </div>

    @include('mpasi.partials.scripts')
@endsection
