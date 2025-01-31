@extends('layouts.app')
@section('content')
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Tambah Buku</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>orang</label>
                            <input type="text" class="form-control" name="roles"
                                value="{{ old('roles') }}">
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
