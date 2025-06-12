<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Detail Bug - {{ $bug->title }}</title>
    <style>
        :root {
            --bg: #1c1c1c;
            --fg: #e0e0e0;
            --link: #8cc2dd;
            --link-hover: #d0e9ff;
            --label-bg: #333;
            --label-fg: #ddd;
            --code-bg: #2a2a2a;
            --code-border: #444;
            --alert-bg: #2e2e2e;
            --alert-border: #555;
            --button-bg: #5a1f1f;
            --button-hover: #7a2f2f;
        }

        body {
            font-family: monospace;
            background-color: var(--bg);
            color: var(--fg);
            margin: 2em;
            line-height: 1.6;
            font-size: 15px;
        }

        h1 {
            font-size: 20px;
            border-bottom: 1px solid #444;
            padding-bottom: 0.3em;
            margin-bottom: 1em;
            font-weight: normal;
        }

        h2, h3, h4 {
            font-weight: normal;
            color: #ccc;
            margin-top: 1.5em;
            margin-bottom: 0.7em;
        }

        a {
            color: var(--link);
            text-decoration: none;
        }

        a:hover {
            color: var(--link-hover);
            text-decoration: underline;
        }

        .label {
            background-color: var(--label-bg);
            color: var(--label-fg);
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.9em;
        }

        code, pre {
            font-family: monospace;
            background-color: var(--code-bg);
            padding: 0.2em;
            font-size: 14px;
            display: block;
            overflow-x: auto;
            border-radius: 4px;
            white-space: pre-wrap;
            margin: 1em 0;
        }

        .markdown-content {
            /* white-space: pre-wrap; */
            padding-left: 1.5em;
            padding-right: 1.5em;
            /* padding: 1.2em; */
            border: 1px solid var(--code-border);
            background: #222;
            border-radius: 4px;
        }

        .alert {
            background-color: var(--alert-bg);
            border: 1px solid var(--alert-border);
            padding: 1em;
            margin-bottom: 1.5em;
            font-size: 14px;
            border-left: 4px solid #888;
        }

        button {
            color: white;
            border: none;
            padding: 0.5em 1.2em;
            border-radius: 4px;
            cursor: pointer;
            font-family: monospace;
            font-size: 14px;
        }

        button:hover {
            background-color: var(--button-hover);
        }

        p {
            margin-top: 0.8em;
        }

        small {
            color: #aaa;
        }

        h1 {
        font-size: 20px;
        font-weight: normal;
        padding-bottom: 0.3em;
        margin-bottom: 1em;
        border-bottom: 1px solid #888;
        color: #fff;
    }

    h2, h3, h4 {
        font-weight: normal;
        color: #ccc;
        margin-top: 1.5em;
        margin-bottom: 0.7em;
        border-bottom: 1px dashed #444;
        padding-bottom: 0.3em;
    }
    </style>
</head>
<body>

@if (session('token'))
    <div class="alert">
        <strong>Token Edit Anda:</strong><br>
        <code>{{ session('token') }}</code>
        <p><small>Simpan token ini agar bisa mengedit atau menghapus laporan ini nanti.</small></p>
    </div>
@endif

<h1>Subject: {{ $bug->title }}</h1>

@if ($bug->label)
    <p><strong>Label:</strong> <span class="label">{{ $bug->label }}</span></p>
    <p><strong>To:</strong> <span class="label">maintainer</span></p>
@endif

<div class="markdown-content">{!! $htmlDescription !!}</div>

<p style="margin-top: 2em;"><a href="{{ route('bugs.index') }}">← Kembali ke Daftar Bug</a></p>

@if (request('token') === $bug->edit_token)
    <p>
        <a href="{{ route('bugs.edit', ['bug' => $bug->id, 'token' => request('token')]) }}">[Edit Bug]]</a>
    </p>
    <form method="POST" action="{{ route('bugs.destroy', ['bug' => $bug->id, 'token' => request('token')]) }}" onsubmit="return confirm('Yakin mau hapus bug ini?')">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus Bug</button>
    </form>
@endif

</body>
</html>
