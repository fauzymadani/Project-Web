<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku PDF</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #292a2d;
            color: #EAEAEA;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #FFFFFF;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .book-list {
            width: 90%;
            max-width: 600px;
            list-style: none;
            padding: 0;
        }

        .book-item {
            background: #2A2A2A;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .book-item a {
            text-decoration: none;
            color: #55E38E; /* Warna hijau ChatGPT */
            font-size: 18px;
            font-weight: bold;
            display: block;
            text-align: center;
        }

        .book-item:hover {
            background: #383838;
            transform: scale(1.02);
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .book-list {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <h2><i class="fas fa-book"></i> Daftar Buku PDF</h2>
    <ul class="book-list">
        @forelse ($pdfFiles as $pdf)
            <li class="book-item">
                <a href="{{ asset('pdf/' . $pdf) }}" target="_blank">{{ $pdf }}</a>
            </li>
        @empty
            <li class="book-item">Tidak ada file PDF ditemukan.</li>
        @endforelse
    </ul>

</body>
</html>

