@extends('layouts.app')
@section('content')
    <form action="{{ url('kategori/' . $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Edit Kategori Buku</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori Buku</label>
                            <input type="text" class="form-control" name="kategori_buku"
                                value="{{ $data->kategori_buku }}">
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
