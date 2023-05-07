@extends('layouts.app')

@section('title', 'Peta | PU Pemrov NTB')

@section('contents')
    <div class="text-end">
        <a href="{{ route('image-assets.create') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Tambah
        </a>
    </div>
    <div class="my-3" style="min-height: 400px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $i)
                <tr>
                    <td>
                        <div class="d-flex">
                            <img src="/{{ $i->name_file }}" alt="{{ $i->id }}" style="max-width: 100px">
                            <div class="ms-4">
                                <h6 class="mb-3"><b>Ukuran besar : </b> {{ $i->is_main ? 'Ya' : 'Tidak' }}</h6>
                                <form action="{{ route('image-assets.destroy', $i->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="if (confirm('anda yakin akan menghapus ini ?')) this.form.submit()" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus gambar ini
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="1">Tidak terdapat data</td>
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
            // $('.table').DataTable();
        });
    </script>
@endsection
