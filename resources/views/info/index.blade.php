@extends('layouts.index.fetch')

@section('content')
<style type="text/css">
   .container-utama {
    margin: 10px;
    padding: 50px;
    border-radius: 15px;
    box-shadow: rgba(38, 57, 77, 0.5) 0px 20px 30px -10px;
    transition: transform 0.15s ease-out, box-shadow 0.2s ease-out;
    transform-style: preserve-3d;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #2e2e2e, #1a1a1a);
    color: white;
    perspective: 1000px;
}

.container-utama:hover {
    box-shadow: 0 15px 40px rgba(255, 255, 255, 0.3), 0 0 15px rgba(0, 255, 255, 0.5);
}

</style>
<br>
<div class="container container-utama">
    <h1>About This Site</h1>
    <br>
    <p><strong>Last Updated:</strong> {{ $formattedTime }}</p>
    <p><strong>sha256sum: </strong> <code>4cf33219224c19801dc045b2f7f23e21ac325167e561167c14a8169a41dc26a7</code> <p>
    <p><strong>Total Buku:</strong> {{ $totalBuku }}</p>
    <p><strong>Total Artikel:</strong> {{ $totalArticle }}</p>
    <p><strong>Active Git Branch:</strong> {{ trim(shell_exec('git rev-parse --abbrev-ref HEAD')) }}</p>
    <p><strong>Last Git Commit:</strong><code> {{ trim(shell_exec('git log -1 --pretty=%B')) }} </code></p>
    <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
    <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".container-utama");

    container.addEventListener("mousemove", (e) => {
        let rect = container.getBoundingClientRect();
        let x = (e.clientX - rect.left) / rect.width - 0.5;
        let y = (e.clientY - rect.top) / rect.height - 0.5;

        let rotateX = y * -25; 
        let rotateY = x * 25;

        container.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
    });

    container.addEventListener("mouseleave", () => {
        container.style.transform = "perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)";
    });
});
</script>

@endsection

