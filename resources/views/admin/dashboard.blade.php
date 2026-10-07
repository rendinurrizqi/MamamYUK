@extends('layouts.app')

@section('title', 'Portal Admin - MPASI Hap Hap Baby')

@section('content')
    @include('mpasi.partials.data-json')

    <div id="loading-overlay" style="display: none;">
        <div class="spinner-border text-warning" style="width: 3.5rem; height: 3.5rem;" role="status"></div>
        <div class="mt-3 fw-bold text-brand-purple">Memuat Portal Admin MPASI Hap Hap Baby...</div>
    </div>

    <div id="app">
        @include('mpasi.partials.portal-admin')
    </div>

    @include('mpasi.partials.scripts')
@endsection
