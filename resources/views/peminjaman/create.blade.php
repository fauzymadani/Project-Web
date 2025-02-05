@extends('layouts/app')
@section('content')
    <!--<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">-->
    <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Peminjaman</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="number" id="nisn" class="form-control" name="nisn" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_peminjam">Nama Peminjam</label>
                            <input type="text" id="nama_peminjam" class="form-control" name="nama_peminjam" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <textarea id="tanggal_pinjam" class="form-control" name="tanggal_pinjam" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_dikembalikan">Tanggal Dikembalikan</label>
                            <textarea id="tanggal_dikembalikan" class="form-control" name="tanggal_dikembalikan" required></textarea>
                        </div>
                        <div class="from-group">
                            <label > Buku Yang Dipinjam </label>
                            <select name="buku_id" class="custom-select">
                                @foreach($buku as $item)
                                  <option value="{{ $item->id }}">{{ $item->nama_buku }}</option>
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
