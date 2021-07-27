<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | Admin</title>
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="{{ asset('assets/img/RMNews.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Heebo:300,400,500,600,700,800,900&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="https://cdn.tiny.cloud/1/xbxcbxzli7rp657jngvvujp1q7nvuewfkpc3lv91sji02ghf/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body>
    <section class="section-navbar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="hide-md">
                    <a class="btn-slide-menu" href="#nav-slider" data-bs-target="#nav-slider"
                        data-bs-toggle="offcanvas">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <div
                    class="d-flex d-sm-flex justify-content-center justify-content-sm-center justify-content-md-start sm-100">
                    <img src="{{ asset('assets/img/logo_brand.png') }}">
                </div>
                <div class="ms-3 hide-sm">
                    <a class="link-nav active" href="#">Dashboard</a>
                    <a class="link-nav" href="#">Video</a>
                    <a class="link-nav" href="#">Tranding</a>
                    <a class="link-nav" href="#">Profile</a>
                </div>
            </div>
        </div>
    </section>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="nav-slider">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5><button type="button" class="btn-close text-reset"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="bg-nav-sm"><i class="fa fa-home"></i><a class="link-nav-sm" href="#">Dashboard</a></div>
            <div class="bg-nav-sm"><i class="fa fa-youtube-play"></i><a class="link-nav-sm" href="#">Viedo</a></div>
            <div class="bg-nav-sm"><i class="fas fa-chart-line"></i><a class="link-nav-sm" href="#">Tranding</a></div>
            <div class="bg-nav-sm"><i class="fas fa-user-alt"></i><a class="link-nav-sm" href="#">Profile</a></div>
        </div>
    </div>


    @yield('content')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny_mce.js') }}"></script>
</body>

</html>
