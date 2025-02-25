@extends('layouts.index.fetch')

@section('content')
<div class="container text-center py-5">
    <h1 class="display-4 text-danger">404</h1>
    <h2 class="text-primary">Oops! Halaman Tidak Ditemukan</h2>
    <p class="text-secondary">Sepertinya halaman yang Anda cari tidak ada atau telah dipindahkan.</p>
    <a href="{{ route('buku.baca') }}" class="btn btn-lg btn-primary"><i class="fa-solid fa-house-chimney"></i> Kembali ke Beranda</a>
</div>
@endsection
<script src="https://kit.fontawesome.com/683c7d9e6d.js" crossorigin="anonymous"></script>
