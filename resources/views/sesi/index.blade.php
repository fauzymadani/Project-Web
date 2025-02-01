<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - Sisfo</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
    @import url('https://fonts.cdnfonts.com/css/galgey');
    @import url('https://fonts.cdnfonts.com/css/major-mono-display-2');
    @import url('https://fonts.cdnfonts.com/css/lt-binary-neue');
        body {
            background-color: #2e3440;
            /*font-family: 'Galgey', sans-serif;*/
            font-family: 'LT Binary Neue', sans-serif;
            font-family: 'LT Binary Neue Round', sans-serif;
            background-size: cover;
            height: 100vh;
        }
        .login-card {
            background-color: rgba(37, 44, 55, 0.9);
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-top: auto;
            margin-bottom: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #d8dee9;
            height: 540px;
        }
        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            display: block;
        }
        .btn-user {
            background-color: #88c0d0;
            border-color: #88c0d0;
        }
        .btn-user:hover {
            background-color: #81a1c1;
            border-color: #81a1c1;
        }
        .form-control-user {
            background-color: #3b4252;
            color: #eceff4;
            border: 1px solid #434c5e;
        }
        .form-control-user:focus {
            border-color: #88c0d0;
            box-shadow: 0 0 0 0.2rem rgba(136, 192, 208, 0.5);
        }
        .text-gray-900 {
            color: #d8dee9;
        }

        .form-control-user {
        background-color: #3b4252 !important;
        color: #eceff4;
        border: 1px solid #434c5e;
        }

    .form-control-user:focus {
        background-color: #3b4252 !important;
        color: #eceff4 !important;
        border-color: #88c0d0;
        box-shadow: 0 0 0 0.2rem rgba(136, 192, 208, 0.5);
    }

::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #3b4252;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: #81a1c1;
    border-radius: 10px;
    border: 2px solid #3b4252;
}

::-webkit-scrollbar-thumb:hover {
    background: #88c0d0;
}

* {
    scrollbar-width: thin;
    scrollbar-color: #81a1c1 #3b4252;
}

    </style>
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 login-card">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <img src="https://avetis.gallerycdn.vsassets.io/extensions/avetis/nord-palette/0.1.0/1636705823860/Microsoft.VisualStudio.Services.Icons.Default" alt="Nord Logo" class="profile-image">
                                <h1 class="h4 text-white-900 mb-4">Selamat Datang, Admin!</h1>
                            </div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <form class="user" action="/sesi/login" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" value="{{ Session::get('email') }}" placeholder="Masukkan Alamat Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Masukkan Password Anda" required>
                                        </div>
                                        <button type="submit" class="btn btn-user text-white btn-block">LOGIN</button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>
