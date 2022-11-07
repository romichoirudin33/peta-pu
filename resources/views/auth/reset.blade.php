@extends('layouts.app')

@section('title', 'PU Pemrov NTB')

@section('contents')
    <div class="card mb-4" style="max-width: 500px">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <h5 class="mb-4">Login</h5>
            <form action="{{ route('login.reset_password') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="email">Password Lama</label>
                    <input type="password" name="password_lama" class="form-control shadow-none @error('password_lama') is-invalid @enderror" value="{{ old('password_lama') }}">
                    @error('password_lama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="email">Password Baru</label>
                    <input type="password" name="password" class="form-control shadow-none @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="email">Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control shadow-none @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pt-5">
                    <button type="submit" class="btn btn-primary">
                        Ganti Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
