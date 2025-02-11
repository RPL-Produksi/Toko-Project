@extends('layouts.app-admin')
@section('title', 'Dashboard')

@push('css')
    {{-- CSS Only For This Page --}}
@endpush

@section('content')
    @if (session('welcome'))
        <div class="alert alert-success border-left-success">
            {{ session('welcome') }}, {{ $user->username }}
        </div>
    @endif

    <div class="card p-3 mb-4 border-left-primary">
        <h4 class="text-primary">Dashboard {{ $user->role }}</h4>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card bg-success p-3 text-white">
                <h4 class="text-white">Perusahaan :</h4>
                <h1 style="font-size: 3rem"><i class="fa-solid fa-building"></i> 2</h1>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary p-3 text-white">
                <h4 class="text-white">Owner :</h4>
                <h1 style="font-size: 3rem"><i class="fa-sharp fa-solid fa-user-tie"></i> 2</h1>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-warning p-3 text-white">
                <h4 class="text-white">Admin :</h4>
                <h1 style="font-size: 3rem"><i class="fa-solid fa-user"></i> 2</h1>
            </div>
        </div>
        <div class="col-4 mt-4">
            <div class="card bg-info p-3 text-white">
                <h4 class="text-white">Kasir :</h4>
                <h1 style="font-size: 3rem"><i class="fa-solid fa-users"></i> 7</h1>
            </div>
        </div>
        <div class="col-4 mt-4">
            <div class="card bg-danger p-3 text-white">
                <h4 class="text-white">Member :</h4>
                <h1 style="font-size: 3rem"><i class="fa-solid fa-users"></i> 1</h1>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- JS Only For This Page --}}
@endpush
