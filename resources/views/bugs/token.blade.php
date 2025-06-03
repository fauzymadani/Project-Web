<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Masukkan Token Edit</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            background-color: #fdfdfd;
            color: #000;
            margin: 2em;
            line-height: 1.5;
        }

        h1 {
            font-size: 22px;
            border-bottom: 1px solid #aaa;
            padding-bottom: 0.3em;
            margin-bottom: 1em;
        }

        form {
            margin-top: 1em;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 300px;
            padding: 6px;
            margin-top: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            margin-top: 1em;
            padding: 6px 12px;
            font-size: 14px;
            background-color: #eee;
            border: 1px solid #ccc;
            cursor: pointer;
        }

        button:hover {
            background-color: #e0e0e0;
        }

        .error-box {
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

        .back-link {
            margin-top: 2em;
            display: inline-block;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h1>Edit Bug dengan Token</h1>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('bugs.process_token') }}">
        @csrf
        <label for="token">Masukkan Token Edit:</label><br>
        <input 
            type="text" 
            id="token" 
            name="token" 
            required 
            maxlength="32" 
            placeholder="Masukkan token 32 karakter" 
            autofocus
        >
        <br>
        <button type="submit">Lanjutkan</button>
    </form>

    <p class="back-link"><a href="{{ route('bugs.index') }}">← Kembali ke Daftar Bug</a></p>

</body>
</html>
