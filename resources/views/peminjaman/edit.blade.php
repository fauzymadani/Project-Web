@extends('layouts/app')
@section('content')
    {{-- Menampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form edit Peminjaman --}}
    <form action="{{ url('peminjaman/' . $data->nisn) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Edit Peminjaman</h6>
                    </div>
                    <div class="card-body">
                        {{-- Field NISN (readonly jika tidak boleh diubah) --}}
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" name="nisn" value="{{ old('nisn', $data->nisn) }}" readonly>
                        </div>

                        {{-- Nama Peminjam --}}
                        <div class="form-group">
                            <label for="nama_peminjam">Nama Peminjam</label>
                            <input type="text" class="form-control" name="nama_peminjam" value="{{ old('nama_peminjam', $data->nama_peminjam) }}">
                        </div>

                        {{-- Tanggal Pinjam --}}
                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <textarea class="form-control" name="tanggal_pinjam">{{ old('tanggal_pinjam', $data->tanggal_pinjam) }}</textarea>
                        </div>
                        
                        {{-- Tanggal Dikembalikan --}}
                        <div class="form-group">
                            <label for="tanggal_dikembalikan">Tanggal Dikembalikan</label>
                            <textarea class="form-control" name="alamat">{{ old('tanggal_dikembalikan', $data->tanggal_dikembalikan) }}</textarea>
                        </div>


                    <div class="form-group">
    <label for="buku_id">Buku Yang Dipinjam:</label>
    <select name="buku_id" class="form-control" required>
        <option value="" disabled>-- Pilih Buku --</option>
        @foreach($buku as $r)
            <option value="{{ $r->id }}"
                {{ old('buku_id', $data->buku_id) == $item->id }}>
                {{ $r->buku }}
            </option>
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
