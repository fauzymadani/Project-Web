<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporkan Bug</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --bg: #1c1c1c;
            --fg: #e0e0e0;
            --link: #8cc2dd;
            --link-hover: #d0e9ff;
            --input-bg: #2a2a2a;
            --input-border: #444;
            --highlight: #363636;
            --button-bg: #444;
            --button-hover: #005faf;
            --error-bg: #4c1c1c;
            --error-border: #ff5f5f;
            --error-text: #ffcccc;
        }

        body {
            font-family: monospace;
            background-color: var(--bg);
            color: var(--fg);
            margin: 2em;
            line-height: 1.5;
        }

        a {
            color: var(--link);
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 1em;
            display: inline-block;
        }

        a:hover {
            color: var(--link-hover);
            text-decoration: underline;
        }

        h1 {
            font-weight: normal;
            font-size: 24px;
            border-bottom: 1px solid #555;
            padding-bottom: 0.3em;
            margin-bottom: 1em;
        }

        .container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2em;
        }

        .form-section {
            max-width: 720px;
        }

        .info-section {
            font-size: 14px;
            padding: 0.5em;
            border-radius: 6px;
        }

        label {
            display: block;
            margin-top: 1.2em;
            font-size: 14px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            font-family: monospace;
            font-size: 14px;
            border: 1px solid var(--input-border);
            padding: 8px;
            box-sizing: border-box;
            background: var(--input-bg);
            color: var(--fg);
            resize: vertical;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--link);
            background: #222;
        }

        textarea {
            min-height: 140px;
        }

        button {
            margin-top: 1.5em;
            font-family: monospace;
            font-size: 14px;
            padding: 8px 18px;
            background-color: var(--button-bg);
            color: white;
            border: 1px solid #888;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--button-hover);
        }

        .alert {
            background-color: var(--error-bg);
            border: 1px solid var(--error-border);
            color: var(--error-text);
            padding: 0.7em 1em;
            margin-bottom: 1em;
            font-size: 13px;
        }

        ul {
            margin: 0;
            padding-left: 1.2em;
        }

        ul li {
            margin-bottom: 0.2em;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .info-section {
                margin-top: 2em;
            }

            button {
                width: 100%;
            }
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

    <div class="container">
        <div class="form-section">
            <form method="POST" action="{{ route('bugs.store') }}" onsubmit="return validateCaptcha();">
                @csrf

                <label for="title">Judul</label>
                <input type="text" name="title" id="title" required>

                <label for="label">Label</label>
                <input type="text" name="label" id="label" placeholder="contoh: critical, UI, minor">

                <label for="description">Deskripsi (Support Markdown)</label>
                <textarea name="description" id="description" required></textarea>

                @if ($question)
                    <label for="captcha">CAPTCHA: Berapa {{ $question }}?</label>
                    <input type="text" name="captcha" id="captchaInput" required>
                @endif

                <button type="submit">Kirim Bug</button>
            </form>
        </div>
        <div class="info-section">
            <p>Dengan melaporkan bug, Anda telah membantu untuk membuat sistem yang lebih baik dan stabil.</p>
            <p>Pastikan deskripsi Anda jelas, lengkap, dan jika perlu sertakan langkah-langkah untuk mereproduksi bug-nya.</p>
        </div>
    </div>

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
