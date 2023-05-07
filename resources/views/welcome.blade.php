@extends('layouts.app')

@section('title', 'PU Pemrov NTB')

@section('contents')
    @if(!Auth::guest())
        <div class="text-end">
            <a href="{{ route('home.edit') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i> Edit
            </a>
            <a href="{{ route('image-assets.index') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-image"></i> Edit Gambar
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
        <h5>Visi dan Misi</h5>
        {{ $apps->visi }}
    </div>
    {{--    <div class="mb-3">--}}
    {{--        <h5>Misi</h5>--}}
    {{--        {{ $apps->misi }}--}}
    {{--    </div>--}}
    <div class="row">
        <div class="col-md-6">
            @if($bigImage)
                <img src="{{ $bigImage->name_file }}" alt="main" class="img-fluid" style="object-fit: cover;aspect-ratio: 1">
            @endif
            {{--            <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid">--}}
        </div>
        <div class="col-md-6">
            <div class="row">
                @foreach($smallImage as $i)
                    <div class="col-md-6">
                        <img src="{{ $i->name_file }}" alt="{{ $i->id }}" class="img-fluid mb-3" style="object-fit: cover;aspect-ratio: 1">
                    </div>
                @endforeach
                {{--                <div class="col-md-6">--}}
                {{--                    <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid mb-3">--}}
                {{--                </div>--}}
                {{--                <div class="col-md-6">--}}
                {{--                    <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid mb-3">--}}
                {{--                </div>--}}
                {{--                <div class="col-md-6">--}}
                {{--                    <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid mb-3">--}}
                {{--                </div>--}}
                {{--                <div class="col-md-6">--}}
                {{--                    <img src="{{ asset('assets/no-image.png') }}" alt="empty" class="img-fluid mb-3">--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
