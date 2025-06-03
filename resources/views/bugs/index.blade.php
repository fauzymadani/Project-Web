<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Daftar Bug</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: monospace;
        background-color: #1e1e1e;
        color: #f0f0f0;
        margin: 2em;
        line-height: 1.5;
    }

    h1 {
        font-size: 22px;
        border-bottom: 1px solid #444;
        padding-bottom: 0.3em;
        margin-bottom: 0.2em;
    }

    .subtitle {
        font-size: 14px;
        color: #aaa;
        margin-bottom: 1em;
    }

    .summary {
        background: #2b2b2b;
        border: 1px solid #444;
        padding: 1em;
        margin-bottom: 1em;
        font-size: 14px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 1em;
        background-color: #262626;
    }

    th, td {
        padding: 6px 12px;
        text-align: left;
        border-bottom: 1px solid #333;
    }

    tbody tr:hover {
        background-color: #333;
    }

    .label {
        background: #444;
        color: #eee;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 0.9em;
    }

    .notice {
        border: 1px solid #b33;
        background: #401818;
        padding: 1em;
        margin-bottom: 1em;
        color: #f88;
    }

    a {
        color: #8ab4f8;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .toplink {
        display: inline-block;
        margin-bottom: 1em;
        font-size: 14px;
    }

    .footer {
        margin-top: 3em;
        font-size: 13px;
        color: #888;
    }

    em {
        color: #bbb;
    }

    @media (max-width: 600px) {
        body {
            margin: 1em;
        }

        table, thead, tbody, th, td, tr {
            font-size: 14px;
        }
    }
    </style>
</head>
<body>

    <h1>Daftar Bug Aktif</h1>
    <div class="subtitle">Bug Tracking System SMKN 1 GARUT</div>

    @if (session('success'))
        <div class="notice">
            {{ session('success') }}
        </div>
    @endif

    <div class="summary">
        <strong>Total Bug:</strong> {{ $bugs->count() }}<br>
        <strong>Label Unik:</strong> {{ $bugs->pluck('label')->filter()->unique()->count() }}<br>
        <strong>Waktu sekarang:</strong> {{ now()->format('Y-m-d H:i') }}
    </div>

    <a class="toplink" href="{{ route('bugs.create') }}">[ Laporkan Bug Baru ]</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Label</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bugs as $bug)
                <tr>
                    <td>#{{ $bug->id }}</td>
                    <td>
                        <a href="{{ route('bugs.show', $bug->id) }}">{{ $bug->title }}</a>
                    </td>
                    <td>
                        @if ($bug->label)
                            <span class="label">{{ $bug->label }}</span>
                        @else
                            -
                        @endif
                    </td>
                    <td>Aktif</td>
                    <td>
                        <a class="toplink" href="{{ route('bugs.enter_token') }}">[ Edit Bug via Token ]</a>    
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><em>Tidak ada bug aktif.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Halaman ini dihasilkan pada {{ now()->format('Y-m-d H:i:s') }}. Powered by Laravel & Blade.
    </div>

</body>
</html>
