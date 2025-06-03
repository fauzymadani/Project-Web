<!DOCTYPE html>
<html>
<head>
    <title>Edit Bug</title>
</head>
<body>
    <h1>Edit Bug #{{ $bug->id }}</h1>

    <form method="POST" action="{{ route('bugs.update.token', $bug->edit_token) }}">
        @csrf
        @method('PUT')

        <!-- Token disisipkan sebagai input hidden -->
        <input type="hidden" name="token" value="{{ $bug->edit_token }}">

        <label>Judul:</label><br>
        <input type="text" name="title" value="{{ old('title', $bug->title) }}" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="description" rows="5" required>{{ old('description', $bug->description) }}</textarea><br><br>

        <label>Label (opsional):</label><br>
        <input type="text" name="label" value="{{ old('label', $bug->label) }}"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><a href="{{ route('bugs.show', $bug->id) }}">Kembali ke detail bug</a></p>
</body>
</html>
