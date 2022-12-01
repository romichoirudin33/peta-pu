@extends('layouts.app')

@section('title', 'Data | PU Pemrov NTB')

@section('contents')
    <form action="{{ route('data.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="pekerjaan_spam">Pekerjaan Spam</label>
                    <input type="text" name="pekerjaan_spam" class="form-control shadow-none @error('pekerjaan_spam') is-invalid @enderror" value="{{ old('pekerjaan_spam') ?? $data->pekerjaan_spam }}">
                    @error('pekerjaan_spam')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="anggaran">Anggaran</label>
                    <input type="text" name="anggaran" class="form-control shadow-none @error('anggaran') is-invalid @enderror" value="{{ old('anggaran') ?? $data->anggaran }}">
                    @error('anggaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="jumlah_terlayani">Jumlah KK Terlayani</label>
                    <input type="text" name="jumlah_terlayani" class="form-control shadow-none @error('jumlah_terlayani') is-invalid @enderror" value="{{ old('jumlah_terlayani') ?? $data->jumlah_terlayani }}">
                    @error('jumlah_terlayani')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" name="kondisi" class="form-control shadow-none @error('kondisi') is-invalid @enderror" value="{{ old('kondisi') ?? $data->kondisi }}">
                    @error('kondisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="dusun">Dusun</label>
                    <input type="text" name="dusun" class="form-control shadow-none @error('dusun') is-invalid @enderror" value="{{ old('dusun') ?? $data->dusun }}">
                    @error('dusun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control shadow-none @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan') ?? $data->kecamatan }}">
                    @error('kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="desa">Desa</label>
                    <input type="text" name="desa" class="form-control shadow-none @error('desa') is-invalid @enderror" value="{{ old('desa') ?? $data->desa }}">
                    @error('desa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control shadow-none @error('kabupaten') is-invalid @enderror" value="{{ old('kabupaten') ?? $data->kabupaten }}">
                    @error('kabupaten')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="lat">Koordinat (lat/lng)</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="lat" class="form-control shadow-none @error('lat') is-invalid @enderror" value="{{ old('lat') ?? $data->lat }}">
                            @error('lat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" name="lng" class="form-control shadow-none @error('lng') is-invalid @enderror" value="{{ old('lng') ?? $data->lng }}">
                            @error('lng')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="dimensi">Dimensi</label>
                    <input type="text" name="dimensi" class="form-control shadow-none @error('dimensi') is-invalid @enderror" value="{{ old('dimensi') ?? $data->dimensi }}">
                    @error('dimensi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="panjang_pipa">Panjang Pipa</label>
                    <input type="text" name="panjang_pipa" class="form-control shadow-none @error('panjang_pipa') is-invalid @enderror" value="{{ old('panjang_pipa') ?? $data->panjang_pipa }}">
                    @error('panjang_pipa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="file">Tambah Foto (jika ada)</label>
                    <input type="file" name="file_gambar" id="file_gambar" class="form-control shadow-none @error('file') is-invalid @enderror">
                    @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group py-3">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                @if($data->image)
                    <img src="{{ asset('storage/'.$data->image->file) }}" alt="image" class="img-fluid" id="img_preview">
                @else
                    <div class="text-center">Tidak terdapat gambar</div>
                @endif
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
