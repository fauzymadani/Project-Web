@extends('layouts.index.public')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=EB+Garamond&display=swap" rel="stylesheet">

<div class="container py-5">
    <h2 class="title fw-bold text-primary">{{ $article->title }}</h2>
    <p class="text-muted"><strong>Ditulis pada:</strong> {{ $article->created_at->format('d M Y') }}</p>
    @if($article->image)
    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid">
    @endif
    <div class="border-bottom mb-4"></div>

    <div class="content">
        {!! Str::markdown($article->content) !!}
    </div>

    <br>
    <br>
    <br>
    <br>
    <hr>
    <div class="mt-4">
        <a href="{{ route('artikel.index') }}" class="btn btn-outline-primary">🔙 Kembali ke Daftar Artikel</a>
    </div>
</div>
<!-- <hr> -->
<div class="container">
    <h2 class="fw-bold">Comment</h2>
    <script src="https://utteranc.es/client.js"
    repo="fauzymadani/Project-Web"
    issue-term="pathname"
    label="Comment"
    theme="github-light"
    crossorigin="anonymous"
    async>
</script>
</div>
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var easyMDE = new EasyMDE({
            element: document.getElementById("editor"),
            previewRender: function(plainText) {
                return easyMDE.markdown(plainText); // Render Markdown langsung
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("content-preview").innerHTML = marked.parse(`{!! addslashes($article->content) !!}`);
    });
</script>



