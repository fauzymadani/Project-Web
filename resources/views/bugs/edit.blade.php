<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Edit Bug #{{ $bug->id }}</title>
    <style>
        :root {
            color-scheme: dark;
        }

        body {
            font-family: "DejaVu Sans", sans-serif;
            background-color: #1e1e1e;
            color: #ddd;
            margin: 2em auto;
            max-width: 700px;
            line-height: 1.6;
        }

        h1 {
            font-size: 22px;
            border-bottom: 1px solid #555;
            padding-bottom: 0.3em;
            margin-bottom: 1em;
            color: #fff;
        }

        form {
            margin-top: 1em;
            margin-bottom: 2em;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5em;
        }

        input[type="text"],
        textarea {
            width: 100%;
            max-width: 100%;
            padding: 10px;
            border: 1px solid #444;
            background-color: #2a2a2a;
            color: #ddd;
            font-size: 15px;
            border-radius: 4px;
            margin-bottom: 1em;
        }

        button {
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        .btn-save {
            background-color: #007acc;
            color: white;
        }

        .btn-save:hover {
            background-color: #005fa3;
        }

        .btn-delete {
            background-color: #cc0000;
            color: white;
            margin-left: 1em;
        }

        .btn-delete:hover {
            background-color: #a30000;
        }

        a {
            color: #4ea6ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .back-link {
            margin-top: 2em;
            display: inline-block;
            font-size: 14px;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>

    <h1>Edit Bug #{{ $bug->id }}</h1>

    {{-- Form Edit --}}
    <form method="POST" action="{{ route('bugs.update.token', $bug->edit_token) }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="token" value="{{ $bug->edit_token }}">

        <label for="title">Judul:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $bug->title) }}" required>

        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" rows="5" required>{{ old('description', $bug->description) }}</textarea>

        <label for="label">Label (opsional):</label>
        <input type="text" name="label" id="label" value="{{ old('label', $bug->label) }}">

        <div class="actions">
            <button type="submit" class="btn-save">Simpan Perubahan</button>
        </div>
    </form>

    <!-- {{-- Form Hapus --}}
    <form method="POST" action="{{ route('bugs.delete.token') }}" onsubmit="return confirm('Yakin mau menghapus bug ini?');">
        @csrf
        @method('DELETE')
        <input type="hidden" name="token" value="{{ $bug->edit_token }}">
        <button type="submit" class="btn-delete">Hapus Laporan</button>
    </form> -->

    <p class="back-link"><a href="{{ route('bugs.show', $bug->id) }}">← Kembali ke Detail Bug</a></p>

</body>
</html>
