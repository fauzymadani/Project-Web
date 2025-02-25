@extends('layouts.index.fetch')

@section('content')
<div class="container py-5">
    <h2 class="fw-semibold text-primary mb-4">📚 Semua Buku</h2>

    <div class="row">
        @foreach ($buku as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow border-0 rounded overflow-hidden transition-card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-primary">{{ $item->nama_buku }}</h4>
                        <p class="text-muted mb-1"><strong>Kategori:</strong> {{ $item->kategori->kategori_buku ?? 'Tidak ada kategori' }}</p>
                        <p class="card-text flex-grow-1 text-secondary"><strong>Deskripsi:</strong> {{ Str::limit($item->deskripsi, 100, '...') }}</p>

                        @if($item->file_pdf)
                            <a href="{{ asset('uploads/pdf/' . $item->file_pdf) }}" target="_blank" class="btn btn-sm btn-primary mt-auto">
                                📖 Lihat PDF
                            </a>
                        @else
                            <p class="text-danger mt-auto">❌ Tidak ada file PDF</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

