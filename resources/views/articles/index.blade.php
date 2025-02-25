@extends('layouts.index.public')

@section('content')
<div class="container py-5">
    <h2 class="fw-semibold text-primary mb-4">Artikel Terbaru</h2>

    <div class="row">
    @foreach ($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 rounded transition-card h-100">
                @if($article->image_url)
                    <img src="{{ asset('uploads/articles/' . $article->image_url) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Gambar Artikel">
                @endif
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title text-primary">{{ $article->title }}</h4>
                    <p class="text-muted mb-1"><strong>Ditulis pada:</strong> {{ $article->created_at->format('d M Y') }}</p>
                    <p class="card-text text-secondary">{!! Str::limit(Str::markdown($article->content), 100, '...') !!}</p>
                    <a href="{{ route('artikel.show', $article->id) }}" class="btn btn-sm btn-outline-primary mt-auto">
                        📖 Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>


    <div class="text-center mt-4">
        {{ $articles->links() }} <!-- Pagination -->
    </div>
</div>
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var easyMDE = new EasyMDE({
        element: document.getElementById("editor"),
        spellChecker: false,
        uploadImage: true, // Aktifkan fitur upload gambar
        imageUploadEndpoint: "{{ route('upload.image') }}", // Route upload gambar
        imageMaxSize: 2 * 1024 * 1024, // Batas ukuran (2MB)
        imageAccept: "image/png, image/jpeg, image/gif", // Format gambar yang diterima
        previewRender: function(plainText, preview) {
            setTimeout(function () {
                preview.innerHTML = easyMDE.markdown(plainText);
            }, 250);
            return "Loading preview...";
        },
    });
});
</script>

