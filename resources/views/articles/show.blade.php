@extends('layouts.index.public')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=EB+Garamond&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/github.min.css') }}">
<script src="{{ asset('assets/highlight.min.js') }}"></script>
<style>
/* Container markdown */
.content pre {
    background-color: #f6f8fa;
    color: #24292e;
    padding: 1rem;
    border-radius: 6px;
    overflow-x: auto;
    font-family: 'Fira Code', monospace;
    font-size: 0.92rem;
    line-height: 1.5;
    margin-bottom: 1.5rem;
    border: 1px solid #d0d7de;
}

/* Inline code */
.content code {
    background-color: #f3f4f6;
    color: #d63384;
    font-family: 'Fira Code', monospace;
    padding: 0.2em 0.4em;
    border-radius: 4px;
    font-size: 0.9em;
}

/* Syntax highlighting sederhana */
.content pre code {
    color: #24292e;
}

/* Keywords */
.content pre code span.keyword     { color: #d73a49; font-weight: 600; }
/* Strings */
.content pre code span.string      { color: #032f62; }
/* Comments */
.content pre code span.comment     { color: #6a737d; font-style: italic; }
/* Functions */
.content pre code span.function    { color: #005cc5; }
/* Variables */
.content pre code span.variable    { color: #e36209; }
/* Numbers */
.content pre code span.number      { color: #005cc5; }
</style>


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
        <a href="{{ route('artikel.index') }}" class="btn btn-outline-primary">Kembali ke Daftar Artikel</a>
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

<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('pre code').forEach((el) => {
            hljs.highlightElement(el);
        });
    });
</script>
