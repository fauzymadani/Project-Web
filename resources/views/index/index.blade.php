@extends('layouts.index.public')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.js"></script>
<link rel="stylesheet" href="{{ asset('assets/aos.css') }}">
<script src="{{ asset('assets/aos.js') }}"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=EB+Garamond&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">
<style type="text/css">
    .transition-card {
        transition: transform 0.2s ease-out, box-shadow 0.3s ease-out;
        transform-style: preserve-3d;
        perspective: 1000px;
        position: relative;
        overflow: hidden;
    }

    .transition-card:hover {
        box-shadow: 0px 10px 30px rgba(255, 255, 255, 0.3), 0px 0px 15px rgba(0, 255, 255, 0.5);
    }

    .kepala-banner {
        background: linear-gradient(135deg, #d1e7dd, #f8f9fa);
        border-left: 6px solid #0d6efd;
        max-width: 400px;
        margin: 0 auto;
        font-family: 'Playfair Display', serif;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
    }

    .section-1 .text-muted {
        color: #6c757d !important;
        font-size: 0.9rem;
    }

</style>

<div class="container py-5">
    <!-- Section Sambutan -->
    <section class="section-1 text-center mb-5 pb-5 border-bottom">
    <div class="p-4" data-aos="fade-up" style="font-family: 'EB Garamond', serif;">
        <h1 class="fw-bold text-primary" id="sambutan">Sambutan Kepala Sekolah</h1>

        <img src="{{ asset('images/kepala.jpg') }}" class="img-fluid my-3 rounded" style="max-height: 320px; object-fit: cover;" alt="Kepala Sekolah" data-aos="fade-up">

        <p class="lead text-dark fw-semibold" data-aos="fade-up">
            Assalamu’alaikum warahmatullahi wabarakatuh,
        </p>
        <p class="text-dark" data-aos="fade-up">
            Puji syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya. Dengan hadirnya website Perpustakaan SMKN 1 Garut ini, kami berkomitmen untuk terus mendukung peningkatan literasi dan akses informasi bagi seluruh warga sekolah.
        </p>
        <p class="text-dark" data-aos="fade-up">
            Melalui platform ini, kami berharap siswa-siswi dapat dengan mudah mengakses berbagai koleksi digital, informasi literasi, serta melakukan peminjaman buku secara daring. Semoga keberadaan website ini dapat memberikan manfaat yang nyata dalam mendukung proses belajar-mengajar.
        </p>
        <p class="text-dark" data-aos="fade-up">
            Mari bersama kita jadikan literasi sebagai bagian dari budaya sekolah yang unggul dan berkarakter.
        </p>
        <p class="fw-semibold text-dark" data-aos="fade-up">
            Wassalamu’alaikum warahmatullahi wabarakatuh.
        </p>

        <!-- Footer dalam kontainer -->
        <div class="mt-5 pt-3 small text-muted" style="font-family: 'Merriweather', serif;" data-aos="fade-up">
            Kepala SMKN 1 Garut<br>
            <strong>Nama Kepala Sekolah</strong>
        </div>
    </div>
    </section>


    <!-- Section Buku -->
    <section class="section-2 pt-5">
        <div class="row">
            <h2 class="fw-semibold text-primary mb-4" id="buku"><i class="fa-solid fa-book"></i> Buku</h2>
            @foreach ($buku->take(3) as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card card-hover h-100 shadow border-0 rounded overflow-hidden transition-card">
                    @if($item->sampul)
                        <img src="{{ asset('uploads/sampul/' . $item->sampul) }}" class="card-img-top" alt="Sampul {{ $item->nama_buku }}">
                    @else
                        <img src="{{ asset('img/default-cover.jpg') }}" class="card-img-top" alt="Default Cover">
                    @endif
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
                            <i class="fas fa-book"></i> Lihat PDF
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
            <a href="{{ route('buku.list') }}" class="btn btn-lg btn-outline-primary" data-aos="fade-up"><i class="fa-solid fa-book"></i> Lihat Semua Buku</a>
        </div>
        <hr>
    </section>
    <!-- Section Artikel -->
    <section class="section-3 pt-5 mb-5">
        <div class="row">
            <h2 class="fw-semibold text-primary mb-4" id="artikel"><i class="fa-solid fa-newspaper"></i> Artikel Terbaru</h2>
            @foreach ($articles as $article)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow border-0 rounded overflow-hidden transition-card">
                    <div class="card-body d-flex flex-column">
                        @if($article->image)
                        @endif
                        <h2 class="title card-title text-primary" style="font-family: 'EB Garamond', 'Georgia', 'Times New Roman', serif;">{{ $article->title }}</h2>
                        <p class="text-muted"><strong>Diposting pada:</strong> {{ $article->created_at->format('d M Y') }}</p>
                        <hr>
                        <p class="content card-text text-secondary" style="font-family: 'Georgia', sans-serif;">{!! Str::limit(Str::markdown($article->content), 100, '...') !!}</p>
                        <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-outline-primary mt-auto"><i class="fas fa-book"></i> Baca Selengkapnya</a>

                    </div>


                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('artikel.index') }}" class="btn btn-lg btn-outline-primary" data-aos="fade-up"><i class="fa-solid fa-newspaper"></i> Lihat Semua Artikel</a>
        </div>
    </section>
    <hr>
    <!-- Section Testimoni -->
    <section class="section-4 pt-5" id="testimoni">
        <div class="text-center mb-4">
            <h2 class="fw-semibold text-primary"><i class="fa-solid fa-bullhorn"></i> Testimoni Pengguna</h2>
            <p class="text-muted">Apa kata mereka tentang perpustakaan ini?</p>
        </div>

        <div class="testimoni-container" data-aos="fade-up">
            <button class="scroll-btn left" onclick="scrollLeft()">&#10094;</button>
            <div class="testimoni-wrapper">
                <div class="testimoni-slider">
                    <div class="testimoni-card">
                        <p class="text-secondary fst-italic">"Perpustakaannya keren! Buku digitalnya lengkap banget!"</p>
                        <h5 class="fw-bold text-primary">- Raka S.</h5>
                        <div class="text-warning">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="testimoni-card">
                        <p class="text-secondary fst-italic">"Sekarang makin mudah cari referensi buat tugas sekolah!"</p>
                        <h5 class="fw-bold text-primary">- Nabila A.</h5>
                        <div class="text-warning">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="testimoni-card">
                        <p class="text-secondary fst-italic">"Fitur eBook-nya bagus! Gak perlu repot minjem langsung ke perpustakaan."</p>
                        <h5 class="fw-bold text-primary">- Budi P.</h5>
                        <div class="text-warning">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="testimoni-card">
                        <p class="text-secondary fst-italic">"Website ini membantu banget buat nyari buku referensi!"</p>
                        <h5 class="fw-bold text-primary">- Lina M.</h5>
                        <div class="text-warning">⭐⭐⭐⭐</div>
                    </div>
                    <div class="testimoni-card">
                        <p class="text-secondary fst-italic">"Developer nya jago banget ini buat web kayak gini, apalagi masih pelajar kan! beuhhh, harus di rekomendasi pkl ke PT.Diantara inimahh"</p>
                        <h5 class="fw-bold text-primary">- Dimas W.</h5>
                        <div class="text-warning">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>
            <button class="scroll-btn right" onclick="scrollRight()">&#10095;</button>
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
<script src="{{ asset('script/search.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.js"></script>
<link rel="stylesheet" href="{{ asset('assets/easymde.min.css') }}">
<script src="{{ asset('assets/easymde.min.js') }}"></script>
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

<script src="{{ asset('assets/marked.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("content-preview").innerHTML = marked.parse(`{!! addslashes($article->content) !!}`);
    });
</script>
<script src="{{ asset('script/main.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        AOS.init({
            duration: 1000,
            once: true,
            disable: false
        });
    });
</script>
<script src="https://kit.fontawesome.com/683c7d9e6d.js" crossorigin="anonymous"></script>

