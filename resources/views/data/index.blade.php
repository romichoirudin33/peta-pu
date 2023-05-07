@extends('layouts.app')

@section('title', 'Data | PU Pemrov NTB')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('contents')
    @if(!Auth::guest())
        <div class="text-end">
            <a href="{{ route('data.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
    @endif
    <div class="my-3" style="min-height: 400px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Pekerjaan Spam</th>
                <th>Tahun</th>
                <th>Jumlah KK Terlayani</th>
                <th>Kondisi</th>
                <th class="text-center">Pilihan</th>
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
                    <td class="text-center">
                        <form action="{{ route('data.destroy', $i->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('data.show', $i->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                            @if(!Auth::guest())
                                <a href="{{ route('data.edit', $i->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" onclick="if (confirm('anda yakin akan menghapus ini ?')) this.form.submit()" class="btn btn-danger btn-sm">
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

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
@endsection
