@extends('layouts.app')

@section('content')
    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Buku</h6>
                    </div>
                    <div class="card-body">
                        {{-- Nama Buku --}}
                        <div class="form-group">
                            <label for="nama_buku">Nama Buku</label>
                            <input type="text" class="form-control" name="nama_buku" value="{{ old('nama_buku') }}" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                        </div>

                        {{-- Kategori --}}
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" class="custom-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->kategori_buku }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- File PDF --}}
                        <div class="form-group">
                            <label for="file_pdf">Upload File PDF</label>
                            <input type="file" class="form-control" name="file_pdf" accept="application/pdf" required>
                        </div>

                        {{-- Sampul Buku (opsional) --}}
                        <div class="form-group">
                            <label for="sampul">Upload Sampul Buku (Opsional)</label>
                            <input type="file" class="form-control" name="sampul" accept="image/*">
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

