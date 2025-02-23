@extends('layouts.index.public')

@section('content')
<!-- Tambahkan ini di blade view admin -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.js"></script>

<div class="container py-5">
    <!-- Section Sambutan -->
    <section class="section-1 text-center mb-5 pb-5 border-bottom" id="sambutan">
        <h1 class="fw-bold text-primary" id="sambutan">Selamat Datang di Perpustakaan Online</h1>

        <img src="https://www.pngall.com/wp-content/uploads/15/Doom-Slayer-PNG-Image.png" class="img-fluid my-3" style="max-height: 400px; object-fit: cover;" alt="Doom Slayer">

        <p class="lead text-secondary fw-semibold">
            Salam sejahtera bagi kita semua,
        </p>
        <p class="text-secondary">
            Puji syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya, sehingga kita dapat terus meningkatkan budaya literasi di sekolah tercinta ini. Perpustakaan merupakan jantung dari dunia pendidikan, tempat di mana ilmu pengetahuan dapat diakses dengan mudah oleh seluruh warga sekolah.
        </p>
        <p class="text-secondary">
            Seiring dengan perkembangan teknologi, kami dengan bangga menghadirkan website resmi **Perpustakaan SMKN 1 Garut** sebagai sarana untuk memberikan layanan yang lebih luas dan mudah diakses. Melalui platform ini, para siswa, guru, dan seluruh civitas akademika dapat mencari dan meminjam buku secara online, mengakses koleksi digital, serta mendapatkan informasi terbaru mengenai kegiatan literasi di perpustakaan.
        </p>
        <p class="text-secondary">
            Kami berharap website ini dapat menjadi jembatan yang menghubungkan siswa dengan dunia ilmu pengetahuan, membangun budaya membaca, serta mendorong semangat belajar yang lebih tinggi. Kami juga mengundang seluruh warga sekolah untuk aktif memanfaatkan fasilitas ini demi meningkatkan kualitas pendidikan kita bersama.
        </p>
        <p class="fw-semibold text-dark">
            Wassalamu’alaikum warahmatullahi wabarakatuh.
        </p>
        <p class="fw-semibold text-primary">
            "Rip and Tear, until it is Done.."
        </p>
        <p class="fw-semibold text-dark">~ Doom Slayer</p>
    </section>

    <!-- Section Buku -->
    <section class="section-2 pt-5" id="buku">
        <div class="row">
            <h2 class="fw-semibold text-primary mb-4">Buku</h2>
            @foreach ($buku->take(3) as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow border-0 rounded overflow-hidden transition-card">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-primary">{{ $item->nama_buku }}</h4>
                            <p class="text-muted mb-1"><strong>Kategori:</strong> {{ $item->kategori->kategori_buku ?? 'Tidak ada kategori' }}</p>
                            <p class="card-text flex-grow-1 text-secondary"><strong>Deskripsi:</strong> {{ Str::limit($item->deskripsi, 100, '...') }}</p>

                            @if($item->nama_buku == "The Ultimate Guide to Life")
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-sm btn-link mt-auto text-muted">
    Unlock the Secret
</a>

                            @endif

                            @if($item->file_pdf)
                                <a href="{{ asset('uploads/pdf/' . $item->file_pdf) }}" target="_blank" class="btn btn-sm btn-primary mt-auto">
                                    📖 Lihat PDF
                                </a>
                            @else
                                <p class="text-danger mt-auto">❌ Tidak ada file PDF</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('buku.list') }}" class="btn btn-lg btn-outline-primary">📚 Lihat Semua Buku</a>
        </div>
        <hr>
    </section>
    <!-- Section Artikel -->
    <section class="section-3 pt-5" id="artikel">
        <div class="row">
            <h2 class="fw-semibold text-primary mb-4">📝 Artikel Terbaru</h2>
            @foreach ($articles as $article)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow border-0 rounded overflow-hidden transition-card">
                        <div class="card-body d-flex flex-column">
    @if($article->image_url)
        <!--<img src="{{ asset('uploads/articles/' . $article->image_url) }}" class="img-fluid mb-3 rounded" alt="Gambar Artikel">-->
        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded">
    @endif
    <h4 class="card-title text-primary">{{ $article->title }}</h4>
    <p class="text-muted"><strong>Diposting pada:</strong> {{ $article->created_at->format('d M Y') }}</p>
    <p class="card-text text-secondary">{!! Str::limit(Str::markdown($article->content), 100, '...') !!}</p>
    <a href="{{ route('artikel.show', ['id' => $article->id]) }}" class="btn btn-sm btn-outline-primary mt-auto">📖 Baca Selengkapnya</a>
</div>
<!--<a href="{{ route('artikel.show', ['id' => $article->id]) }}" class="btn btn-sm btn-outline-primary mt-auto">📖 Baca Selengkapnya</a>-->


                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('artikel.index') }}" class="btn btn-lg btn-outline-primary">📰 Lihat Semua Artikel</a>
        </div>
    </section>
</div>

<style>
    .transition-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .transition-card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var easyMDE = new EasyMDE({
            element: document.getElementById("editor"),
            previewRender: function(plainText) {
                return easyMDE.markdown(plainText); // Render Markdown langsung
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("content-preview").innerHTML = marked.parse(`{!! addslashes($article->content) !!}`);
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let rickrollLink = document.querySelector('a[href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"]');

    if (rickrollLink) {
        rickrollLink.addEventListener("click", function (event) {
            event.preventDefault();
            rickrollLink.innerText = "Loading...";
            setTimeout(() => {
                window.location.href = rickrollLink.href;
            }, 2000);
        });
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let keyPressed = [];
    let chaosActive = false;

    document.addEventListener("keydown", function (event) {
        keyPressed.push(event.key.toLowerCase());

        if (keyPressed.slice(-2).join("") === "dd" && !chaosActive) {
            chaosActive = true;
            activateDoomMode();
        }

        setTimeout(() => keyPressed = [], 1000);
    });

    function activateDoomMode() {
        document.body.classList.add("doom-mode");

        document.querySelectorAll("h1, h2, h3, p, a, .card").forEach(el => {
            el.classList.add("shake");
        });

        let doomMusic = new Audio("https://doom2.net/doomdepot/music/snes%20doom/e1m1%20-%20at%20doom's%20gate.mp3");
        doomMusic.loop = true;
        doomMusic.play();

        setTimeout(() => {
            document.body.classList.remove("doom-mode");
            document.querySelectorAll(".shake").forEach(el => el.classList.remove("shake"));
            doomMusic.pause();
            doomMusic.currentTime = 0;
            chaosActive = false;
        }, 15000);
    }
});
</script>

