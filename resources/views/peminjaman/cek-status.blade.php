@extends('layouts.index.fetch') {{-- ganti sesuai layout kamu --}}

@section('content')
<div class="container">
    <h2>Cek Status Peminjaman</h2>

    <div class="alert alert-info mt-3">
        <p>
            Silakan masukkan NISN Anda untuk melihat status peminjaman buku. Harap diperhatikan bahwa pengembalian buku tepat waktu sangat penting.
            Jika terlambat mengembalikan buku, maka akan dikenakan sanksi sesuai dengan peraturan perpustakaan yang berlaku.
            Sanksi bisa berupa denda, pembatasan peminjaman, atau pemberitahuan kepada wali/pihak sekolah.
            Mohon untuk selalu memperhatikan tanggal pengembalian agar tidak terkena sanksi.
        </p>
    </div>

    <form method="POST" action="{{ route('peminjaman.cekStatus') }}">
        @csrf
        <div class="form-group">
            <label for="nisn">Masukkan NISN:</label>
            <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn') }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Cek</button>
    </form>

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            {{ $errors->first() }}
        </div>
    @endif

    @if($peminjaman && $peminjaman->isEmpty())
        <div class="alert alert-warning mt-3">
            Data tidak ditemukan untuk NISN tersebut.
        </div>
    @endif

    @if($peminjaman && $peminjaman->isNotEmpty())
        <h4 class="mt-4">Hasil Peminjaman:</h4>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Dikembalikan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $item)
                <tr>
                    <td>{{ $item->nama_peminjam }}</td>
                    <td>{{ $item->buku->nama_buku ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_dikembalikan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<br>
<br>
@endsection

