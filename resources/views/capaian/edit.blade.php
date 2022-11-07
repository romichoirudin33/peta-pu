@extends('layouts.app')

@section('title', 'Capaian | PU Pemrov NTB')

@section('contents')
    <form action="{{ route('capaian.update', $data->id) }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="tahun">Tahun</label>
                    <input type="text" name="tahun" class="form-control shadow-none @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}">
                    @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="target">Target</label>
                    <input type="text" name="target" class="form-control shadow-none @error('target') is-invalid @enderror" value="{{ old('target') }}">
                    @error('target')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="capaian">Capaian</label>
                    <input type="text" name="capaian" class="form-control shadow-none @error('capaian') is-invalid @enderror" value="{{ old('capaian') }}">
                    @error('capaian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group py-3">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
