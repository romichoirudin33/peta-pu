@extends('layouts.app')

@section('title', 'Peta | PU Pemrov NTB')

@section('contents')
    @if(!Auth::guest())
        <div class="text-end">
            <a href="{{ route('peta.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    @endif
    <div class="px-5 my-3">
        @foreach($data as $i)
            <div class="card" style="border-radius: 1em">
                <div class="card-body">
                    <img src="{{ asset('storage/'.$i->file) }}" alt="peta-{{$i->id}}" class="img-fluid mb-3">
                    @if(!Auth::guest())
                        <div class="text-center mb-4">
                            <form action="{{ route('peta.destroy', $i->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('peta.edit', $i->id) }}" class="btn btn-primary">Edit</a>
                                <button type="button" onclick="if (confirm('anda yakin akan menghapus ini ?')) this.form.submit()" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
