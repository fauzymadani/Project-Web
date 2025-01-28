<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git Commit Viewer</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Commit Log - {{ $repoOwner }}/{{ $repoName }}</h1>

    @if(isset($error))
        <p>{{ $error }}</p>
    @else
        <ul>
            @foreach ($commits as $commit)
                <li>
                    <a href="{{ route('commits.show', ['sha' => $commit['sha']]) }}">
                        {{ $commit['commit']['message'] }}
                    </a>
                    - {{ $commit['commit']['author']['name'] }}
                    ({{ $commit['commit']['author']['date'] }})
                </li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('dashboard')}}"></a>
</body>
</html>

