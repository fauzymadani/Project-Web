@extends('layouts.index.fetch')

@section('content')
<div class="container">
    <h1>About This Site</h1>
    <br>
    <p><strong>Last Updated:</strong> {{ $formattedTime }}</p>
    <p><strong>sha256sum: </strong> <code>4cf33219224c19801dc045b2f7f23e21ac325167e561167c14a8169a41dc26a7</code> <p>
    <p><strong>Total Buku:</strong> {{ $totalBuku }}</p>
    <p><strong>Total Artikel:</strong> {{ $totalArticle }}</p>
    <p><strong>Active Git Branch:</strong> {{ trim(shell_exec('git rev-parse --abbrev-ref HEAD')) }}</p>
    <p><strong>Last Git Commit:</strong> {{ trim(shell_exec('git log -1 --pretty=%B')) }}</p>
    <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
    <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
</div>
@endsection

