@extends('layouts.app')
@section('content')
    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Tambah Buku</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Buku</label>
                            <input type="text" class="form-control" name="nama_buku"
                                value="{{ old('nama_buku') }}">
                        </div>
                        <div class="form-group">
    <label>Deskripsi</label>
    <textarea class="form-control" name="deskripsi" rows="4">{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
</div>

                        <div class="form-group">
                            <label >Kategori </label>
                            <select name="kategori_id"class="custom-select">
                                @foreach($kategori as $item)
                                  <option value="{{ $item->id }}">{{ $item->kategori_buku}}</option>
                                   @endforeach
                            </select>
                    </div>
                    <div class="form-group">
    <label>Upload File PDF</label>
    <input type="file" class="form-control" name="file_pdf" accept="application/pdf">
</div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
