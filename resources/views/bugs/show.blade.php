<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Detail Bug - {{ $bug->title }}</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            background-color: #ffffff;
            color: #000;
            margin: 2em 3em;
            line-height: 1.5;
        }

        h1 {
            font-size: 24px;
            border-bottom: 1px solid #bbb;
            padding-bottom: 0.3em;
            margin-bottom: 1em;
        }

        h2, h3, h4, h5, h6 {
            font-weight: normal;
            border-bottom: 1px dashed #ccc;
            color: #333;
            margin-top: 1.5em;
            margin-bottom: 0.7em;
        }

        p {
            margin-top: 0.4em;
            margin-bottom: 1em;
        }

        strong {
            font-weight: normal;
            color: #444;
        }

        .label {
            background-color: #eee;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.95em;
            color: #222;
        }

        a {
            color: #0050b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        code, pre {
            font-family: "DejaVu Sans Mono", monospace;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            padding: 0.6em;
            font-size: 13px;
            display: block;
            overflow-x: auto;
            border-radius: 4px;
            white-space: pre-wrap;
        }

        .markdown-content {
            font-size: 15px;
            white-space: pre-wrap;
            margin-top: 1em;
        }

        .alert {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 1em;
            margin-bottom: 1.5em;
            border-left: 4px solid #888;
            font-size: 14px;
        }

        button {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 0.5em 1em;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c9302c;
        }

        .markdown-content {
            border: 1px solid gray;
            padding: 30px;
        }
    </style>
</head>
<body>

@if (session('token'))
    <div class="alert">
        <strong>Token Edit Anda:</strong><br>
        <code>{{ session('token') }}</code>
        <p style="margin-top: 0.5em;"><small>Simpan token ini agar bisa mengedit atau menghapus laporan ini nanti.</small></p>
    </div>
@endif

<h1><strong>Subject:</strong> {{ $bug->title }}</h1>

@if ($bug->label)
    <p><strong>Label:</strong> <span class="label">{{ $bug->label }}</span></p>
    <p><strong>To:</strong> <span class="label">maintainer</span></p>
@endif

<div class="markdown-content">{!! $htmlDescription !!}</div>

<p><a href="{{ route('bugs.index') }}">← Kembali ke Daftar Bug</a></p>

@if (request('token') === $bug->edit_token)
    <p>
        <a href="{{ route('bugs.edit', ['bug' => $bug->id, 'token' => request('token')]) }}">✏️ Edit Bug</a>
    </p>
    <form method="POST" action="{{ route('bugs.destroy', ['bug' => $bug->id, 'token' => request('token')]) }}" onsubmit="return confirm('Yakin mau hapus bug ini?')">
        @csrf
        @method('DELETE')
        <button type="submit">🗑️ Hapus Bug</button>
    </form>
@endif

</body>
</html>
