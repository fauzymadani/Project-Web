@extends('layouts.app')

@section('content')
    <form action="{{ url('buku/' . $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Edit Buku</h6>
                    </div>
                    <div class="card-body">
                        {{-- Nama Buku --}}
                        <div class="form-group">
                            <label>Nama Buku</label>
                            <input type="text" class="form-control" name="nama_buku"
                                value="{{ old('nama_buku', $data->nama_buku) }}" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="4">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                        </div>

                        {{-- Kategori --}}
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ $data->kategori_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->kategori_buku }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- File PDF --}}
                        <div class="form-group">
                            <label>Upload File PDF (Kosongkan jika tidak ingin mengganti)</label>
                            <input type="file" class="form-control" name="file_pdf" accept="application/pdf">
                            @if($data->file_pdf)
                                <p>File saat ini:
                                    <a href="{{ asset('uploads/pdf/' . $data->file_pdf) }}" target="_blank">
                                        {{ $data->file_pdf }}
                                    </a>
                                </p>
                            @endif
                        </div>

                        {{-- Sampul --}}
                        <div class="form-group">
                            <label>Upload Gambar Sampul (Opsional)</label>
                            <input type="file" class="form-control" name="sampul" accept="image/*">
                            @if($data->sampul)
                                <p>Sampul saat ini:</p>
                                <img src="{{ asset('uploads/sampul/' . $data->sampul) }}" width="120" class="img-thumbnail">
                            @endif
                        </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

