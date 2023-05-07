@extends('layouts.app')

@section('title', 'Peta | PU Pemrov NTB')

@section('contents')
    <form action="{{ route('image-assets.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="row" style="min-height: 400px">
            <div class="col-md-6">
                <h4>Gambar halaman beranda</h4>
                <hr>
                <div class="form-group mb-2">
                    <label for="file_gambar">Pilih file</label>
                    <input type="file" name="file_gambar" id="file_gambar" class="form-control shadow-none @error('file') is-invalid @enderror" required>
                    @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="is_main2">Ditampilkan ukuran besar</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_main" id="is_main1" value="1">
                        <label class="form-check-label" for="is_main1">
                            Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_main" id="is_main2" value="0" checked>
                        <label class="form-check-label" for="is_main2">
                            Tidak
                        </label>
                    </div>
                </div>
                <div class="form-group py-3">
                    <a href="{{ route('image-assets.index') }}" class="btn btn-outline-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Tambahkan
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/no-image.png') }}" alt="image" class="img-fluid" id="img_preview">
            </div>
        </div>
    </form>
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
