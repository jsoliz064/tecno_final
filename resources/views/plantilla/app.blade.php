<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'FICH')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}')}}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Fredoka+One:300,300i,400,400i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    {{-- <link href="{{ asset('css/styleBlack.css') }}" rel="stylesheet" id="dark"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" id="stylesheet" type="text/css"> 
    @yield('css')
</head>

<body>
    @auth
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                    <span class="d-none d-lg-block">Camiri</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="POST" action="#">
                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div><!-- End Search Bar -->

            <!-- ======= nav ======= -->
            @include('plantilla.partials.nav')
        </header>

        <!-- ======= Sidebar ======= -->
        @include('plantilla.partials.sidebar')

        <main id="main" class="main">
            <div class="pagetitle">
                @yield('content_header')
            </div>

            <section class="section dashboard">
                @yield('content')
            </section>

        </main>

        <!-- ======= Footer ======= -->
        @include('plantilla.partials.footer')
    @endauth

    @yield('auth')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')

     <script>
        document.getElementById('dark-mode').addEventListener('click', changeVariable);
        document.getElementById('adulto-mode').addEventListener('click', adultoMode);
        document.getElementById('joven-mode').addEventListener('click', jovenMode);
        document.getElementById('nino-mode').addEventListener('click', ninomode);

        function changeVariable() {
        if (localStorage.boolean) {
            localStorage.boolean = 1 ;
            window.location.reload();
        } else {
            localStorage.boolean= 0;
         }
        
        }
        function adultoMode() {
        if (localStorage.boolean) {
            localStorage.boolean = 2 ;
            window.location.reload();
        } else {
            localStorage.boolean= 0;
         }
        
        }
        function jovenMode() {
        if (localStorage.boolean) {
            localStorage.boolean = 3 ;
            window.location.reload();
        } else {
            localStorage.boolean= 0;
         }
        
        }
        function ninomode() {
        if (localStorage.boolean) {
            localStorage.boolean = 4 ;
            window.location.reload();
        } else {
            localStorage.boolean= 0;
         }
        
        }

        window.onload= cargarSty;
        window.addEventListener('load',cargarSty);
        function cargarSty(){
            
            if (localStorage.boolean==1){
                let stylesheet = document.getElementById("stylesheet");
                stylesheet.href = "{{ asset('css/styleBlack.css') }}";
                
            } else if (localStorage.boolean==2){
                let stylesheet = document.getElementById("stylesheet");
                stylesheet.href = "{{ asset('css/styleAdulto.css') }}";
 
            }
             else if (localStorage.boolean==3){
                let stylesheet = document.getElementById("stylesheet");
                stylesheet.href =  "{{ asset('css/styleJoven.css') }}";
 
            }
             else if (localStorage.boolean==4){
                let stylesheet = document.getElementById("stylesheet");
                console.log("llega");
                stylesheet.href =  "{{ asset('css/styleNino.css') }}";
                

            }
            else{
                let stylesheet = document.getElementById("stylesheet");
                stylesheet.href =   "{{ asset('css/style.css') }}";
                
            }
        }
    </script> 


    {{-- <script>
        document.getElementById('dark-mode').addEventListener('click', changeStylesheet);
     function changeStylesheet() {
     var head = document.getElementsByTagName("head")[0];
     var link = document.createElement("link");
     link.rel = "stylesheet";
    link.type = "text/css";
    link.href = "{{ asset('css/styleBlack.css') }}";
    head.appendChild(link); 
    }
    </script> --}}
</body>

</html>
