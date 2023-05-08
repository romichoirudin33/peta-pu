@extends('layouts.app')

@section('title', 'Peta | PU Pemrov NTB')

@section('contents')
    <div>
        <form action="{{ route('file-drives.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <label for="">Upload file disini</label>
            <div class="input-group">
            <input type="file" class="form-control shadow-none" name="file_gambar" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Upload</button>
        </div>
        </form>
    </div>
    <hr>
    <div class="my-3" style="min-height: 400px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>File</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $i)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div style="min-width: 100px" class="text-center">
                            @if(in_array(pathinfo($i->file, PATHINFO_EXTENSION), ['jpg','png', 'jpeg']))
                                <img src="/{{ $i->file }}" alt="{{ $i->id }}" style="max-width: 100px; object-fit: cover;aspect-ratio: 1">
                            @elseif(in_array(pathinfo($i->file, PATHINFO_EXTENSION), ['pdf','xls', 'xlsx', 'doc', 'docx']))
                                <a href="/{{ $i->file }}" target="_blank">
                                    <i class="fa fa-file fa-2x"></i>
                                </a>
                            @else
                                <a href="/{{ $i->file }}" target="_blank">
                                    <i class="fa fa-question-circle-o fa-2x"></i>
                                </a>
                            @endif
                            </div>
                            <div class="ms-4">
                                <h6 class="mb-3"><b>File : </b> <a href="/{{ $i->file }}" target="_blank">{{ $i->file }}</a></h6>
                                <form action="{{ route('file-drives.destroy', $i->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="if (confirm('anda yakin akan menghapus ini ?')) this.form.submit()" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus file ini
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
