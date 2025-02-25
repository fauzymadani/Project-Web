@extends('layouts.index.fetch')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold text-primary">SHA-256 Hash Validation</h1>
    <br>
    <span><strong>Apa itu SHA-256?</strong></span>
    <p>
        SHA-256 (Secure Hash Algorithm 256-bit) adalah algoritma kriptografi yang digunakan untuk menghasilkan representasi unik dari suatu file atau data dalam bentuk string 64 karakter. Algoritma ini sering digunakan untuk:
    </p>
    <ul>
        <li>Verifikasi Integritas File → Memastikan file tidak dimodifikasi oleh pihak yang tidak berwenang.</li>
        <li>Keamanan Data → Mencegah perubahan data tanpa terdeteksi.</li>
        <li>Autentikasi → Digunakan dalam sistem keamanan untuk menyimpan password dalam bentuk hash.</li>
    </ul>
    <br>
    <h1>Kenapa SHA-256 Digunakan dalam File Integrity Check?</h1>
    <p>
        Di website ini, kami menggunakan SHA-256 Hash untuk mengecek apakah file penting dalam sistem masih asli atau sudah berubah. Setiap kali sebuah file diperiksa, sistem akan:
    </p>
    <ol>
        <li>Menghitung hash SHA-256 dari file</li>
        <li>Membandingkan hash dengan nilai yang tersimpan sebelumnya</li>
        <li>Menampilkan status apakah file valid atau telah diubah</li>
    </ol>
    <p>
        Jika hash file berbeda dari yang sebelumnya, itu berarti ada kemungkinan file telah diubah atau dimodifikasi.
    </p>
    <br>
    <h2>Bagaimana Cara Kerja SHA-256?</h2>
    <p>SHA-256 bekerja dengan cara mengambil input (file, teks, atau data lainnya) lalu mengonversinya menjadi string unik sepanjang 64 karakter. Contohnya:</p>
    <pre><code class="language-bash">
Input: "Hello, world!"
SHA-256 Hash: a591a6d40bf420404a011733cfb7b190d62c65bf0bcda32b53a302a972c6e9f5
    </code></pre>
    <p>Contoh lain, jika kita generate hash dari file.txt yang isinya "Halo":</p>
    <pre><code class="language-bash">
$ sha256sum test.txt
04b673aa03b29cf7eb667a26d955740b77ec1e6eec6e0ddeee868cbe35d5dbf6  test.txt
    </code></pre>
    <p>
        Setiap perubahan kecil dalam input akan menghasilkan hash yang sepenuhnya berbeda, sehingga perubahan dalam file bisa langsung terdeteksi.
        Dengan adanya fitur ini, kami berkomitmen untuk menjaga keamanan dan integritas website ini agar tetap aman dari perubahan yang tidak sah.
    </p>
    <hr>

    <h2 class="text-center text-primary">🔐 File Integrity Check</h2>

    <div id="message-box" class="alert d-none"></div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>File</th>
                <th>Hash</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hashes as $file => $result)
                <tr>
                    <td>{{ $result['file'] }}</td>
                    <td><code>{{ $result['hash'] }}</code></td>
                    <td>{!! $result['status'] !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    hljs.highlightAll();
});
</script>

<script src="{{ asset('highlight/highlight.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('highlight/styles/github-dark.min.css') }}">
<script src="https://kit.fontawesome.com/683c7d9e6d.js" crossorigin="anonymous"></script>
@endsection

