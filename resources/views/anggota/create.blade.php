@extends('layouts/app')
@section('content')
    <!--<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">-->
    <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Anggota</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nia">NIA</label>
                            <input type="number" id="nia" class="form-control" name="nia" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_anggota">Nama Anggota</label>
                            <input type="text" id="nama_anggota" class="form-control" name="nama_anggota" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" class="form-control" name="alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="form-control" name="jenis_kelamin" required>
                                <option value="" selected disabled hidden>-- Pilih Jenis Kelamin --</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="foto" >Upload Foto Anggota</label>
                            <input type="file" id="foto" class="form-control-file" name="foto" accept="image/*"
                                required>
                        </div>
                        <div class="from-group">
                            <label > Tugas </label>
                            <select name="role_id" required>
                                @foreach($role as $r)
                                  <option value="{{ $r->id }}">{{ $r->roles }}</option>
                                   @endforeach
                            </select>
                    </div>




                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
