@extends('layouts.public')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Perpustakaan Online</h1>

    <div class="row">
        @foreach ($buku as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->nama_buku }}</h2>
                        <p class="text-muted"><strong>category: </strong>{{ $item->kategori->kategori_buku ?? 'Tidak ada kategori' }}</p>
                        <p class="card-text"><strong>description: </strong>{{ $item->deskripsi }}</p>

                        @if($item->file_pdf)
                            <a href="{{ asset('uploads/pdf/' . $item->file_pdf) }}" target="_blank" class="btn btn-sm btn-primary">
                                Lihat PDF
                            </a>
                        @else
                            <p class="text-danger">Tidak ada file PDF</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
