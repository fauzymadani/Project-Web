@extends('layouts/app')
@section('content')
@include('components.modal')

<style>
    body {
        background-color: #1E1E1E !important;
        color: #EAEAEA !important;
        font-family: 'Inter', sans-serif;
    }

    h1, h2, h3 {
        color: #FFFFFF;
        font-weight: bold;
    }

    .container {
        max-width: 900px;
        margin: auto;
        padding: 20px;
    }

    .card {
        background-color: #252525 !important;
        color: #EAEAEA;
        border: 1px solid #333;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #181818 !important;
        color: #EAEAEA;
        font-weight: bold;
        border-bottom: 1px solid #333;
        padding: 15px;
        border-radius: 12px 12px 0 0;
    }

    .table-dark {
        background-color: #222;
        border-radius: 10px;
        overflow: hidden;
    }

    .table-dark th, .table-dark td {
        color: #EAEAEA;
        border-color: #333;
        padding: 12px;
    }

    .table-dark tbody tr:hover {
        background-color: #333;
    }

    pre {
        background: #181818;
        border-radius: 8px;
        padding: 10px;
        overflow-x: auto;
    }
</style>

<div class="container">
    <h1 class="text-primary text-center">Admin Guidelines</h1>
    <p class="text-light">Halo admin, ini adalah panduan untuk mengelola sistem.</p>

    <div class="card">
        <div class="card-header">Management</div>
        <div class="card-body">
            <p>Semua pengaturan sistem dapat dilakukan melalui sidebar kiri. Untuk verifikasi hash, kunjungi <a href="{{ route('hashes') }}">halaman ini</a>. Untuk melihat pembaruan sistem terbaru, cek changelog di sidebar bagian bawah.</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Artikel</div>
        <div class="card-body">
            <p>Artikel dikelola melalui sidebar dan menggunakan <a href="https://www.markdownguide.org/getting-started/">Markdown</a>.</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Tutorial Singkat Markdown</div>
        <div class="card-body">
            <p>Gunakan sintaks berikut untuk menulis artikel dengan Markdown:</p>
            <pre><code class="language-md"># Judul Tingkat 1
## Judul Tingkat 2
### Judul Tingkat 3</code></pre>
            <p>Menambahkan link:</p>
            <pre><code class="language-md">[Teks Link](https://contoh.com)</code></pre>
            <p>full: </p>
            <pre><code class="language-md">
# Example headings

## Sample Section

## This'll be a _Helpful_ Section About the Greek Letter Θ!
A heading containing characters not allowed in fragments, UTF-8 characters, two consecutive spaces between the first and second words, and formatting.

## This heading is not unique in the file

TEXT 1

## This heading is not unique in the file

TEXT 2

# Links to the example headings above

Link to the sample section: [Link Text](#sample-section).

Link to the helpful section: [Link Text](#thisll-be-a-helpful-section-about-the-greek-letter-Θ).

Link to the first non-unique section: [Link Text](#this-heading-is-not-unique-in-the-file).

Link to the second non-unique section: [Link Text](#this-heading-is-not-unique-in-the-file-1).
        </code></pre>
            <p>Referensi lengkap: <a href="https://docs.github.com/en/get-started/writing-on-github">Markdown GitHub Docs</a></p>
        </div>
    </div>

    <h3 class="text-secondary text-center"><i class="fa-solid fa-square-poll-vertical"></i> Statistik Peminjaman Buku</h3>

    <div class="card">
        <div class="card-header"><i class="fa-solid fa-chart-bar"></i> Grafik Buku Terpopuler</div>
        <div class="card-body">
            <canvas id="bukuChart" style="width: 100%; height: 400px;"></canvas>
        </div>
    </div>

    <div class="card">
        <div class="card-header">📋 Daftar Buku Teratas</div>
        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Total Dipinjam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Harry Potter</td><td>30</td></tr>
                    <tr><td>2</td><td>Laskar Pelangi</td><td>25</td></tr>
                    <tr><td>3</td><td>Atomic Habits</td><td>20</td></tr>
                    <tr><td>4</td><td>Rich Dad Poor Dad</td><td>18</td></tr>
                    <tr><td>5</td><td>The Subtle Art</td><td>15</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('bukuChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Harry Potter', 'Laskar Pelangi', 'Atomic Habits', 'Rich Dad Poor Dad', 'The Subtle Art'],
                datasets: [{
                    label: 'Total Dipinjam',
                    data: [30, 25, 20, 18, 15],
                    backgroundColor: ['#81a1c1', '#88c0d0', '#8fbcbb', '#a3be8c', '#b48ead'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { ticks: { color: '#EAEAEA' }, grid: { color: 'rgba(255, 255, 255, 0.1)' } },
                    x: { ticks: { color: '#EAEAEA' }, grid: { color: 'rgba(255, 255, 255, 0.1)' } }
                },
                plugins: { legend: { labels: { color: '#EAEAEA' } } }
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css">
<script>
    document.addEventListener("DOMContentLoaded", function() { hljs.highlightAll(); });
</script>
@endsection

