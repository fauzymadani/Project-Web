<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=EB+Garamond&display=swap" rel="stylesheet"> -->
    <style>
     .navbar-dark .nav-item .nav-link {
      color: #fff;
  }

  .navbar-dark .nav-item .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease;
      border-radius: 0.25rem;
      color: #fff;
  }

  .fa-li {
      position: relative;
      left: 0;
  }
</style>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    footer {
        background: #0d6efd;
        color: white;
        /*padding: 40px 0;*/
        padding-top: 20px;
    }
    .footer-logo img {
        max-width: 120px;
    }
    .footer-links a {
        color: white;
        text-decoration: none;
        transition: 0.3s;
    }
    .footer-links a:hover {
        text-decoration: underline;
    }
    .social-icons a {
        color: white;
        font-size: 20px;
        margin: 0 10px;
        transition: 0.3s;
    }
    .social-icons a:hover {
        color: #d4d4d4;
    }
    .footer-bottom {
        background: rgba(0, 0, 0, 0.2);
        text-align: center;
        padding: 10px 0;
        /*margin-top: 20px;*/
        margin-bottom: 0px;
    }

    .section-1 p {
        text-align: justify;
    }

    /*buat easter egg */
    .doom-mode {
        background-color: #8B0000 !important;
        color: #FFD700 !important;
        filter: invert(1) contrast(2) saturate(2);
        transition: all 0.5s ease-in-out;
    }

    .doom-mode h1, .doom-mode h2, .doom-mode h3, .doom-mode p, .doom-mode a {
        color: #FFD700 !important;
    }

    .doom-mode a {
        text-decoration: none;
        font-weight: bold;
    }

    .doom-mode img {
        filter: grayscale(100%) contrast(2);
    }

    .doom-mode .card {
        background-color: rgba(139, 0, 0, 0.8) !important;
        border: 3px solid #FFD700 !important;
        box-shadow: 0px 0px 20px rgba(255, 0, 0, 0.7);
    }

    @keyframes shake {
        0% { transform: translate(2px, 2px) rotate(0deg); }
        25% { transform: translate(-2px, -2px) rotate(-1deg); }
        50% { transform: translate(2px, -2px) rotate(1deg); }
        75% { transform: translate(-2px, 2px) rotate(0deg); }
        100% { transform: translate(2px, 2px) rotate(-1deg); }
    }

    .doom-mode .shake {
        animation: shake 0.2s infinite;
    }

    .transition-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .transition-card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .article-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .article-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #0d6efd;
    }

    .article-content {
        color: #333;
    }

    .btn-read-more {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 8px;
        background: #0d6efd;
        color: white;
        text-decoration: none;
        transition: background 0.3s;
    }

    .btn-read-more:hover {
        background: #0b5ed7;
    }

    .card-hover {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .testimoni-container {
        position: relative;
        overflow: hidden;
        max-width: 100%;
    }

    .testimoni-wrapper {
        overflow-x: hidden; /* Hapus scrollbar */
        scroll-behavior: smooth;
        position: relative;
    }

    .testimoni-slider {
        display: flex;
        gap: 20px;
        padding: 10px;
        width: max-content;
        transition: transform 0.5s ease-in-out; /* Animasi smooth */
    }

    .testimoni-card {
        min-width: 400px;
        max-width: 400px;
        height: 200px;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        text-align: center;
        flex-shrink: 0;
    }

    .scroll-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 50%;
        font-size: 20px;
        z-index: 10;
    }

    .scroll-btn.left {
        left: 10px;
    }

    .scroll-btn.right {
        right: 10px;
    }

    .scroll-btn:hover {
        background: rgba(0, 0, 0, 0.8);
    }

    .content {
        font-family: 'Georgia', sans-serif;
    }

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


</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">
          <img src="{{ asset('img/smk.png') }}" height="50" alt="" loading="lazy" />
      </a>

      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
  </button>


  <!-- Collapsible wrapper -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('buku.baca') }}">Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('buku.baca') }}#sambutan">Sambutan</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('buku.baca')}}#buku">Buku</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('buku.baca')}}#artikel">Artikel</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('site-info')}}">Info</a>
      </li>
      <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="{{ route('hashes')}}">Hash</a>-->
        <!--</li>-->
    </ul>
    <!-- Left links -->
<!--      <audio id="librarySoundtrack" loop>-->
<!--    <source src="{{ asset('music/music1.mp3') }}" type="audio/mp3">-->
<!--    Browser Anda tidak mendukung audio tag.-->
<!--</audio>-->
<!---->
<!--<button id="toggleMusic" class="btn btn-outline-primary">-->
<!--    🎵 Play Musik-->
<!--</button>-->

<!-- Search form -->
<form class="d-flex input-group w-auto">
    <input type="search" class="form-control" placeholder="Type query" aria-label="Search" />
    <button class="btn btn-outline-primary" type="button" data-mdb-ripple-init data-mdb-ripple-color="dark"
    style="padding: .45rem 1.5rem .35rem;">
    Search
</button>
</form>


<ul class="navbar-nav mb-2 mb-lg-0">
    <!-- Navbar dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdown" role="button"
      data-mdb-dropdown-init aria-expanded="false">
  </a>
  <!-- Dropdown menu -->
  <ul class="dropdown-menu dropdown-menu-end notifications-list p-1" aria-labelledby="navbarDropdown">
    <li>
      <div class="row">
        <div class="col-md">
          <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg" height='63' width='auto'
          class="d-block" alt="..." />
      </div>
      <div class="col-md">
          <p class="h6 mb-0">New</p>
          <p class="h6 mb-1">Movie title</p>
          <span class="small">Today</span>
      </div>
  </div>
</li>
<li>
  <hr class="dropdown-divider" />
</li>
<li>
  <div class="row">
    <div class="col-md">
      <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(10).jpg" height='63' width='auto'
      class="d-block" alt="..." />
  </div>
  <div class="col-md">
      <p class="h6 mb-0">New</p>
      <p class="h6 mb-1">Movie title</p>
      <span class="small">Today</span>
  </div>
</div>
</li>
<li>
  <hr class="dropdown-divider" />
</li>
<li>
  <div class="row">
    <div class="col-md">
      <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(11).jpg" height='63' width='auto'
      class="d-block" alt="..." />
  </div>
  <div class="col-md">
      <p class="h6 mb-0">New</p>
      <p class="h6 mb-1">Movie title</p>
      <span class="small">Today</span>
  </div>
</div>
</li>
<li>
  <hr class="dropdown-divider" />
</li>
<li>
  <div class="row">
    <div class="col-md">
      <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(20).jpg" height='63' width='auto'
      class="d-block" alt="..." />
  </div>
  <div class="col-md">
      <p class="h6 mb-0">New</p>
      <p class="h6 mb-1">Movie title</p>
      <span class="small">Today</span>
  </div>
</div>
</li>
<li>
  <hr class="dropdown-divider" />
</li>
<li>
  <div class="row">
    <div class="col-md">
      <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(5).jpg" height='63' width='auto'
      class="d-block" alt="..." />
  </div>
  <div class="col-md">
      <p class="h6 mb-0">New</p>
      <p class="h6 mb-1">Movie title</p>
      <span class="small">Today</span>
  </div>
</div>
</li>
<li>
  <hr class="dropdown-divider" />
</li>
<li>
  <div class="row">
    <div class="col-md">
      <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg" height='63' width='auto'
      class="d-block" alt="..." />
  </div>
  <div class="col-md">
      <p class="h6 mb-0">New</p>
      <p class="h6 mb-1">Movie title</p>
      <span class="small">Today</span>
  </div>
</div>
</li>
</ul>
</li>
<li class="nav-item dropdown">
  <ul class="dropdown-menu dropdown-menu-end p-1" aria-labelledby="navbarDropdown">
    <li class="my-2 d-flex align-items-center"><img
        src="https://mdbootstrap.com/img/Photos/Avatars/img%20(4).jpg" class="rounded-circle img-fluid me-1"
        height='25' width='25'><span> User 1</span></li>
        <li class="my-2 d-flex align-items-center"><img
            src="https://mdbootstrap.com/img/Photos/Avatars/img%20(6).jpg" class="rounded-circle img-fluid me-1"
            height='25' width='25'><span> User 2</span></li>
            <li class="my-2 d-flex align-items-center"><img
                src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="rounded-circle img-fluid me-1"
                height='25' width='25'><span> User 3</span></li>
                <li><a class="dropdown-item" href="#">Manage Profiles</a></li>
                <li>
                  <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="#">Your Account</a></li>
              <li><a class="dropdown-item" href="#">Help</a></li>
              <li><a class="dropdown-item" href="#">Log Out</a></li>
          </ul>
      </li>
  </ul>

</div>
<!-- Collapsible wrapper -->
</div>
<!-- Container wrapper -->
</nav>
<!-- Navbar -->
<div class="container mt-5 pt-4">
    @yield('content')
</div>

<footer>
    <div class="container text-center text-md-start">
        <div class="row">
            <div class="col-md-3 mb-4 footer-logo text-center">
                <img src="{{ asset('img/smk.png') }}" alt="Logo">
                <p class="mt-3">Perpustakaan Online SMKN 1 GARUT, dibuat oleh <a href="https://github.com/fauzymadani/" class="text-white">Fauzy</a> & <a href="https://github.com/faqihboyy/" class="text-white">Faqih</a></p>
            </div>
            <div class="col-md-3 footer-links">
                <h5 class="text-uppercase">Tentang</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('tentang.index')}}">Tentang</a></li>
                    <li><a href="{{route('tentang.license')}}">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-links">
                <h5 class="text-uppercase">Kontak</h5>
                <p><i class="fas fa-map-marker-alt"></i> Garut, Indonesia</p>
                <p><i class="fas fa-phone"></i> +62 812 3456 7890</p>
                <p><i class="fas fa-envelope"></i> contact@smkn1garut.ac.id</p>
            </div>
            <div class="col-md-3 text-center">
                <h5 class="text-uppercase">Follow Us</h5>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2025 Perpustakaan SMKN 1 GARUT | All Rights Reserved
    </div>
</footer>

<!-- End of .container -->
<script src="{{ asset('script/search.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://kit.fontawesome.com/683c7d9e6d.js" crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("content-preview").innerHTML = marked.parse(`{!! addslashes($article->content) !!}`);

    });

</script>

</body>
</html>
