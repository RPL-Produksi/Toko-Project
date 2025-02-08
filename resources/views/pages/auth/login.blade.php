@extends('layouts.auth')
@section('title', 'Login')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
    <section class="login-section">
        <div class="row h-100">
            <div class="col-md-7 d-none d-md-block" style="background-color: #4e72de">
                <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
                    <div>
                        <div class="d-flex justify-content-center mb-5">
                            <img src="{{ asset('image/Screenshot_2024-12-25_074836-removebg-preview.png') }}" width="500"
                                alt="">
                        </div>
                        <div class="text-white">
                            <h3 class="text-center fw-semibold">Selamat Datang di Lumi Store</h3>
                            <p class="text-center">Aplikasi ini dirancang untuk memudahkan Anda dalam mengelola dan <br>
                                memantau perkembangan toko Lumi Store.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-center align-items-center" style="background-color: white">
                <div class="login-form">
                    <div>
                        <h2 class="fw-bold text-center" style="color: #666666">Lumi Store</h2>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-center" style="color: #777777">Hallo! Selamat Datang</h3>
                    </div>
                    <div class="mt-5">
                        <form action="" class="form-group" method="POST">
                            @csrf
                            <div>
                                <label for="username" class="text-secondary">Masukan username anda</label>
                                <input type="text" name="username" required class="form-control">
                            </div>
                            <div class="mt-3">
                                <label for="password" class="text-secondary">Password</label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="mt-2" style="font-size: 14px; text-decoration: none; color: #4e72de;">RPL
                                    Production</a>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-login py-2 rounded-5 text-white"
                                    style="background-color: #4e72de">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    {{-- js --}}
@endpush
