<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Bug</title>
    <style>
    body {
        font-family: "Courier New", Courier, monospace;
        background-color: #fdfdfd;
        color: #000;
        margin: 2em;
    }
    h1 {
        font-size: 20px;
        border-bottom: 1px solid #aaa;
        padding-bottom: 0.3em;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 1em;
    }
    th, td {
        padding: 6px 12px;
        text-align: left;
    }
    /* Hilangkan border */
    th, td {
        border: none;
    }
    /* Buat baris tabel berpindah warna saat hover */
    tbody tr:hover {
        background-color: #f0f0f0;
    }
    .label {
        background: #eee;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 0.9em;
    }
    .notice {
        border: 1px solid #cc0000;
        background: #ffe0e0;
        padding: 1em;
        margin-bottom: 1em;
        color: #800;
    }
    a {
        color: #00c;
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
</style>
</head>
<body>

    <h1>Daftar Bug Aktif</h1>

    @if (session('success'))
        <div class="notice">
            {{ session('success') }}
        </div>
    @endif

    <a class="toplink" href="{{ route('bugs.create') }}">[ Laporkan Bug Baru ]</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Label</th>
                <th>Status</th>
                <th>action</th>
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
                    <td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><em>Tidak ada bug aktif.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
