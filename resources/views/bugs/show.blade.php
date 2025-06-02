<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Detail Bug - {{ $bug->title }}</title>
    <style>
        body {
            font-family: "DejaVu Sans Mono", monospace;
            background-color: #fefefe;
            color: #000;
            margin: 2em 3em;
            line-height: 1.4;
        }
        h1 {
            font-size: 24px;
            border-bottom: 1px solid #aaa;
            padding-bottom: 0.3em;
            margin-bottom: 1em;
        }
        p {
            margin-top: 0.4em;
            margin-bottom: 0.8em;
        }
        strong {
            font-weight: normal;
            color: #444;
        }
        .label {
            background: #eee;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 0.9em;
            color: #333;
        }
        a {
            color: #00c;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        /* Markdown headings style mirip Debian BTS */
        div h2, div h3, div h4, div h5, div h6 {
            border-bottom: 1px dashed #999;
            color: #444;
            padding-bottom: 0.2em;
            margin-top: 1.2em;
            margin-bottom: 0.5em;
            font-weight: normal;
        }

        /* Styling isi deskripsi markdown */
        div {
            white-space: pre-wrap;
            font-size: 14px;
            margin-top: 1em;
        }
    </style>
</head>
<body>
    <h1>{{ $bug->title }}</h1>

    @if ($bug->label)
        <p><strong>Label:</strong> <span class="label">{{ $bug->label }}</span></p>
    @endif

    <div>{!! $htmlDescription !!}</div>

    <p><a href="{{ route('bugs.index') }}">← Kembali ke Daftar Bug</a></p>
</body>
</html>
