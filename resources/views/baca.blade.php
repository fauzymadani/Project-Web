<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>

    <iframe src="{{ asset('pdf/sample.pdf') }}"></iframe>

</body>
</html>
