@extends('layouts.app')

@section('title', 'Capaian | PU Pemrov NTB')

@section('contents')
    @if(!Auth::guest())
        <div class="text-end">
            <a href="{{ route('capaian.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    @endif
    <div class="my-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>No</td>
                <td>Tahun</td>
                <td>Target</td>
                <td>Capaian/td>
                <td>Pilihan</td>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $i)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $i->tahun }}</td>
                    <td>{{ $i->target }}</td>
                    <td>{{ $i->capaian }}</td>
                    <td>
                        <form action="{{ route('capaian.destroy', $i->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            @if(!Auth::guest())
                                <a href="{{ route('capaian.edit', $i->id) }}" class="btn btn-primary">
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

