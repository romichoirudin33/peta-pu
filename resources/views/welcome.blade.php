@extends('layouts.app')

@section('title', 'PU Pemrov NTB')

@section('contents')
    @if(!Auth::guest())
        <div class="text-end">
            <a href="{{ route('home.edit') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i> Edit
            </a>
        </div>
    @endif
    <div class="mb-3">
        <h5>Nama Instansi</h5>
        {{ $apps->name }}
    </div>
    <div class="mb-3">
        <h5>Profil</h5>
        {{ $apps->profil }}
    </div>
    <div class="mb-3">
        <h5>Visi</h5>
        {{ $apps->visi }}
    </div>
    <div class="mb-3">
        <h5>Misi</h5>
        {{ $apps->misi }}
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid mb-3">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid mb-3">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid mb-3">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid mb-3">
                </div>
            </div>
        </div>
    </div>
@endsection
