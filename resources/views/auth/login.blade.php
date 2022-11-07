@extends('layouts.app')

@section('title', 'PU Pemrov NTB')

@section('contents')
    <div class="card mb-4" style="max-width: 500px">
        <div class="card-body">
            <h5 class="mb-4">Login</h5>
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
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
