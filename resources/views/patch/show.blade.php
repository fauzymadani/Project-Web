<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commit Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Detail Commit</h1>

    @if(isset($error))
        <p>{{ $error }}</p>
    @else
        <h2>{{ $commitDetails['commit']['message'] }}</h2>
        <p>By: {{ $commitDetails['commit']['author']['name'] }} on {{ $commitDetails['commit']['author']['date'] }}</p>

        <h3>Patch</h3>
        <pre><code class="language-diff">{{ $patchContent }}</code></pre>
    @endif

    <a href="{{ route('commits.index') }}">Kembali ke Daftar Commit</a>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            hljs.highlightAll();
        });
    </script>
</body>
</html>

