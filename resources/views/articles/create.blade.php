@extends('layouts.app')

@section('content')
<h2>Buat Artikel Baru</h2>

<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" name="title" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Konten</label>
        <textarea id="editor" name="content" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Gambar (opsional)</label>
        <input type="file" class="form-control" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<!--<script>-->
<!--    var easyMDE = new EasyMDE({ element: document.getElementById("editor") });-->
<!--</script>-->
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<!--    <script>-->
<!--    document.addEventListener("DOMContentLoaded", function() {-->
<!--       var easyMDE = new EasyMDE({-->
<!--    element: document.getElementById("editor"),-->
<!--    imageUploadEndpoint: "/upload-image", // point to a route that stores the image in Laravel storage-->
<!--    previewImagesInEditor: true,-->
<!--    imagesPreviewHandler: function(parsedImageMarkdown) {-->
<!--        return parsedImageMarkdown;-->
<!--    }-->
<!--});-->
<!--    });-->
<!--</script>-->
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

