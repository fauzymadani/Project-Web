<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporkan Bug</title>
    <style>
        body {
            font-family: "Courier New", Courier, monospace;
            background-color: #fff;
            color: #000;
            margin: 2em 3em;
            line-height: 1.4;
        }
        a {
            color: #00c;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 1em;
            display: inline-block;
        }
        a:hover {
            text-decoration: underline;
        }
        h1 {
            font-weight: normal;
            font-size: 24px;
            border-bottom: 1px solid #aaa;
            padding-bottom: 0.3em;
            margin-bottom: 1em;
        }
        form {
            max-width: 600px;
        }
        label {
            display: block;
            font-weight: normal;
            margin-bottom: 0.3em;
            margin-top: 1.2em;
            font-size: 14px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            font-family: monospace;
            font-size: 14px;
            border: 1px solid #999;
            padding: 6px 8px;
            box-sizing: border-box;
            background: #fff;
            color: #000;
            resize: vertical;
        }
        textarea {
            min-height: 120px;
        }
        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #00c;
            background: #eef;
        }
        button {
            margin-top: 1.5em;
            font-family: monospace;
            font-size: 14px;
            padding: 6px 15px;
            background-color:rgb(172, 173, 173);
            color: white;
            border: 1px solid black;
            cursor: pointer;
        }
        button:hover {
            background-color: #084a9e;
        }
        /* Error box mirip Debian.org warning box */
        .alert {
            background-color: #fee;
            border: 1px solid #f99;
            color: #900;
            padding: 0.7em 1em;
            margin-bottom: 1em;
            font-size: 13px;
            font-family: monospace;
        }
        ul {
            margin: 0;
            padding-left: 1.2em;
        }
        ul li {
            margin-bottom: 0.2em;
        }
    </style>
</head>
<body>
    <a href="{{ route('bugs.index') }}">← kembali</a>
    <h1>Laporkan Bug</h1>

    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('bugs.store') }}" onsubmit="return validateCaptcha();">
        @csrf

        <label for="title">Judul</label>
        <input type="text" name="title" id="title" required>

        <label for="label">Label</label>
        <input type="text" name="label" id="label" placeholder="contoh: critical, UI, minor">

        <label for="description">Deskripsi (Markdown)</label>
        <textarea name="description" id="description" required></textarea>

        @if ($question)
            <label for="captcha">CAPTCHA: Berapa {{ $question }}?</label>
            <input type="text" name="captcha" id="captchaInput" required>
        @endif

        <button type="submit">Kirim Bug</button>
    </form>

    <script>
        function validateCaptcha() {
            const captchaField = document.getElementById('captchaInput');
            if (captchaField && !captchaField.value.trim()) {
                alert("Harap isi CAPTCHA terlebih dahulu.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
