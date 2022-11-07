@extends('layouts.app')

@section('title', 'Data | PU Pemrov NTB')

@section('contents')
    @if(!Auth::guest())
        <div class="text-end">
            <a href="{{ route('data.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    @endif
    <div class="my-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>No</td>
                <td>Pekerjaan Spam</td>
                <td>Anggaran / Tahun</td>
                <td>Jumlah KK Terlayani</td>
                <td>Kondisi</td>
                <td>Pilihan</td>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $i)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $i->pekerjaan_spam }}</td>
                    <td>{{ $i->anggaran }}</td>
                    <td>{{ $i->jumlah_terlayani }}</td>
                    <td>{{ $i->kondisi }}</td>
                    <td>
                        <form action="{{ route('data.destroy', $i->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
{{--                            <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>--}}
                            @if(!Auth::guest())
                                <a href="{{ route('data.edit', $i->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" onclick="if (confirm('anda yakin akan menghapus ini ?')) this.form.submit()" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endif
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak terdapat data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
