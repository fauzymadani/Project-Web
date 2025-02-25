@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Edit Artikel</h1>

    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="editor" class="form-label">Konten</label>
            <textarea id="editor" name="content">{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (opsional)</label>
            <input type="file" class="form-control" name="image">
            @if($article->image)
                <p class="mt-2">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel" class="img-fluid" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
    </form>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var easyMDE = new EasyMDE({ element: document.getElementById("editor") });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("content-preview").innerHTML = marked.parse(`{!! addslashes($article->content) !!}`);
    });
</script>


@endsection

