@extends('layouts.app')

@section('title', 'Peta | PU Pemrov NTB')

@section('contents')
    <div style="min-height: 400px">
        <form action="{{ route('peta.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="file">Pilih file gambar peta</label>
                        <input type="file" name="file_gambar" id="file_gambar" class="form-control shadow-none @error('file') is-invalid @enderror" required>
                        @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group py-3">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="/{{ $data->file }}" alt="image" class="img-fluid" id="img_preview">
                    {{--                <img src="{{ asset('storage/'.$data->file) }}" alt="image" class="img-fluid" id="img_preview">--}}
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        file_gambar.onchange = evt => {
            const [file] = file_gambar.files
            if (file) {
                img_preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
