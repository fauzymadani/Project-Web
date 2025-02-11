@extends('layouts.app')
@section('content')
    <form action="{{ url('buku/' . $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Edit Buku</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Buku</label>
                            <input type="text" class="form-control" name="nama_buku"
                                value="{{ $data->nama_buku }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="" disabled selected> Pilih Kategori</option>

                                @foreach ($kategori as $item)

                                <option value="{{$item->id}}" {{ $data->kategori_id == $item->id ? 'selected' : ''}}>{{$item->kategori_buku}}</option>
                                @endforeach
                            </select>
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
