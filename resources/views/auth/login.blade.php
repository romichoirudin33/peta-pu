@extends('layouts.app')

@section('title', 'PU Pemrov NTB')

@section('contents')
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="text-center">
            <img src="{{ asset('assets/pemprov-ntb.png') }}" alt="pemprov-ntb" style="height: 150px; margin-right: 1.5em; margin-left: 1.5em">
            <img src="{{ asset('assets/pu.png') }}" alt="pu" style="height: 130px">
            </div>
            <h5 class="text-center mt-3">
                Dinas Pekerjaan Umum<br> dan Penataan Ruang <br> Provinsi Nusa Tenggara Barat
            </h5>
        </div>
        <div class="col-md-6">
            <div class="card mb-4" style="border-color: #151e72;">
                <div class="card-body">
                    <h5 class="mb-3">Login</h5>
                    <p>
                    <small class="text-muted">Masukkan email dan password yang digunakan untuk login</small>
                    </p>

                    <form action="{{ route('login.login_action') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control shadow-none @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Password</label>
                            <input type="password" name="password" class="form-control shadow-none @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group pt-5">
                            <button type="submit" class="btn btn-primary px-5">
                                Login
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-link text-decoration-none">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
