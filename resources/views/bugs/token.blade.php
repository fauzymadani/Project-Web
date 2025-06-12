<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Masukkan Token Edit</title>
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
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5em;
        }

        input[type="text"] {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            border: 1px solid #444;
            background-color: #2a2a2a;
            color: #ddd;
            font-size: 15px;
            border-radius: 4px;
        }

        button {
            margin-top: 1em;
            padding: 8px 16px;
            font-size: 14px;
            background-color: #007acc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #005fa3;
        }

        .error-box {
            border: 1px solid #b00020;
            background: #3a1a1a;
            padding: 1em;
            margin-bottom: 1.5em;
            color: #ffb3b3;
            border-left: 4px solid #ff4c4c;
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
        <label for="token">Masukkan Token Edit:</label>
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
