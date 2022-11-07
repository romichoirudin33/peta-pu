@extends('layouts.app')

@section('title', 'PU Pemrov NTB')

@section('contents')
    <form action="{{ route('home.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="name">Nama Instansi</label>
                    <input type="text" name="name" class="form-control shadow-none @error('name') is-invalid @enderror" value="{{ old('name') ?? $apps->name }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="profil">Profil</label>
                    <textarea style="height: 160px" name="profil" class="form-control shadow-none @error('profil') is-invalid @enderror">{{ old('profil') ?? $apps->profil }}</textarea>
                    @error('profil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="visi">Visi</label>
                    <textarea style="height: 100px" name="visi" class="form-control shadow-none @error('visi') is-invalid @enderror">{{ old('visi') ?? $apps->visi }}</textarea>
                    @error('visi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="misi">Misi</label>
                    <textarea style="height: 100px" name="misi" class="form-control shadow-none @error('misi') is-invalid @enderror">{{ old('misi') ?? $apps->misi }}</textarea>
                    @error('misi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group py-3">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
        </div>
    </form>

@endsection
