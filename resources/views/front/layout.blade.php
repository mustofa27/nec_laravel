<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>
  @if(isset($webTitle))
    {{ $webTitle }} | 
  @endif
  Newcastle English Institute
  </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('general/img/logo.png') }}" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('front/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('front/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
  <style type="text/css">
    .box.wow .icon{
      text-align: center;
      font-size: 20pt;
    }
    .pendaftar-result{
      border: solid .5px #ccc; 
      padding: 15px;
    }
    @media only screen and (min-width: 600px){
      .cek-result{
        margin-left: 25%;
        width: 50%;
      }
    }


    .lok-icon{
        width: 100%;
        height: 100%;
        float: none;
      }
      .lok-text{
        width: 100%;    
      }
      .lok-icon img{
        width: 100%;
      }
    @media only screen and (min-width: 600px){
      .lok-icon img{
        width: 80%;
      }
      .lok-icon{
        width: 40%;
        height: 100px;
        overflow: hidden;
        float: left;
      }
    }
  </style>
  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:newcastleenglishclub@gmail.com">newcastleenglishclub@gmail.com</a>
        <i class="fa fa-phone"></i> +62 87866107170
      </div>
      <div class="social-links float-right">
        <a href="https://www.facebook.com/newcastleenglishclub/" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://www.instagram.com/newcastlepare/" class="instagram"><i class="fa fa-instagram"></i></a>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#body" class="scrollto" style="font-size: 20px">
          <img src="{{ asset('general/img/logo.png') }}" style="height:50px; width:36px;">
          &nbsp;&nbsp;<b>Newcastle English Institute</b>
        </a>
      </div>
      <nav class="navbar navbar-expand-lg" style="z-index: 100; background-color: white;" id="nav-menu-container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-icon fa-bars" style="color: black"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          <?php
            $links = [
              [url('/'), 'Home'],
              [url('/daftar'), 'Daftar'],
              [url('/konfirmasi'), 'Konfirmasi Pembayaran'],
              [url('/cek-status'), 'Galeri'],
              [url('/hasil'), 'Artikel'],
            ];
            $class = '';
            foreach ($links as $key => $value) {
              if (url()->current() == $value[0] || (strpos(url()->current(),$value[0]) !== false && $value[0] != url('/')))
                $class = 'color: #FECC00  !important;';
              else 
                $class = '';
              ?>
              <li style="margin: 0px 10px;"><a href="{{ $value[0] }}" style="{{ $class }}">{{ $value[1] }}</a></li>
              <?php
            }
            ?>
          </ul>
        </div>
      </nav>
      <!-- <nav id="nav-menu-container">
        <ul class="nav-menu">
        <?php
        $links = [
          [url('/'), 'Home'],
          [url('/daftar'), 'Daftar'],
          [url('/konfirmasi'), 'Konfirmasi Pembayaran'],
          [url('/cek-status'), 'Cek Status'],
          [url('/hasil'), 'Lihat Hasil'],
          [url('/pembahasan'), 'Jawaban'],
        ];
        $class = '';
        foreach ($links as $key => $value) {
          if (url()->current() == $value[0] || (strpos(url()->current(),$value[0]) !== false && $value[0] != url('/')))
            $class = 'menu-active';
          else 
            $class = '';
          ?>
          <li class="{{ $class }}"><a href="{{ $value[0] }}">{{ $value[1] }}</a></li>
          <?php
        }
        ?>
        </ul>
      </nav> --><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  @yield('content')
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('front/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('front/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('front/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('front/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('front/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('front/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('front/lib/magnific-popup/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('front/lib/sticky/sticky.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
  $('.carousel').carousel()
    <?php
    $toast = session()->get('toast');
    if (!empty($toast)){
      ?>
      swal("{{ $toast[0] }}", "{{ $toast[1] }}", "{{ $toast[0] }}");
      <?php
      session()->forget('toast');
    }
    ?>
  </script>
  @yield('custom-script')
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->
  <!-- Contact Form JavaScript File -->
  <!-- <script src="{{ asset('contactform/contactform.js') }}"></script> -->

  <!-- Template Main Javascript File -->
  <!-- <script src="{{ asset('js/main.js') }}"></script> -->

</body>
</html>
