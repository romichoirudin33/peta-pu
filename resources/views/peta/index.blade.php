@extends('layouts.app')

@section('title', 'Peta | PU Pemrov NTB')

@section('contents')
    @if(!Auth::guest())
        <div class="text-end">
            <a href="{{ route('peta.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
    @endif
    <div class="px-5 my-3" style="min-height: 400px">
        @foreach($data as $i)
            <div class="card" style="border-radius: 1em">
                <div class="card-body">
                    <img src="/{{ $i->file }}" alt="peta-{{$i->id}}" class="img-fluid mb-3">
{{--                    <img src="{{ asset('storage/'.$i->file) }}" alt="peta-{{$i->id}}" class="img-fluid mb-3">--}}
                    @if(!Auth::guest())
                        <div class="text-center mb-4">
                            <form action="{{ route('peta.destroy', $i->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('peta.edit', $i->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                <button type="button" onclick="if (confirm('anda yakin akan menghapus ini ?')) this.form.submit()" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
