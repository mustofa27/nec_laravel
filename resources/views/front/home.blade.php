@extends('front.layout')
@section('content')
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <!-- <h2>
        Try Out <span>SBMPTN 2019</span>
        <br>By <span>Masuk PTN</span>
      </h2>
      <div>
        <a href="#about" class="btn-get-started scrollto">Daftar Sekarang</a>
        <a href="#portfolio" class="btn-projects scrollto">Alur Pendaftaran</a>
      </div> -->
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="overflow: hidden; width: 100%;">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block" style="width: 100%;" src="{{ asset('front/img/carousel/1.jpg') }}" alt="">
        </div>
        <div class="carousel-item">
          <img class="d-block" style="width: 100%;" src="{{ asset('front/img/carousel/2.jpg') }}" alt="">
        </div>
        <div class="carousel-item">
          <img class="d-block" style="width: 100%;" src="{{ asset('front/img/carousel/3.jpg') }}" alt="">
        </div>
      </div>
    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="{{ asset('general/img/visit_kampung_inggris.png') }}" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Fasilitas</h2>
            <h3>Beberapa fasilitas unggulan yang kamu dapatkan jika bergabung dengan kami</h3>
            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Qualified Tutor</li>
              <li><i class="ion-android-checkmark-circle"></i> Materi</li>
              <li><i class="ion-android-checkmark-circle"></i> Modul</li>
              <li><i class="ion-android-checkmark-circle"></i> Study Club</li>
              <li><i class="ion-android-checkmark-circle"></i> Sertificate</li>
              <li><i class="ion-android-checkmark-circle"></i> Dresscode*</li>
            </ul>

          </div>
        </div>

      </div>
    </section>
    <!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Program Kami</h2>
          <p></p>
        </div>
        <div class="row">
          <?php $count = 0;?>
          @foreach($program as $l)  
          <div class="col-lg-6">
            <a href="{{ url('/daftar/'.$l->id)}}">
              @if($count%4 == 0)
              <div class="box wow fadeInRight">
              @elseif($count%4 == 1)
              <div class="box wow fadeInRight" data-wow-delay="0.2s">
              @elseif($count%4 == 2)
              <div class="box wow fadeInLeft">
              @elseif($count%4 == 3)
              <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              @endif
                <div class="lok-icon"><img src="{{ asset($l->img) }}" class="kota-img"></div>
                <div class="lok-text">
                  <h4 class="title">{{$l->name}}</h4>
                </div>
              </div>
            </a>
          </div>
          <?php $count++;?>
          @endforeach
        </div>
      </div>
    </section><!-- #portfolio -->
    <!--==========================
      Our Portfolio Section
    ============================-->
    <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Galeri</h2>
          <p></p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">
          @foreach($galeri as $g)
            <div class="col-lg-3 col-md-4">
              <div class="portfolio-item wow fadeInUp">
                <a href="{{ asset($g->path) }}" class="portfolio-popup" target="blank">
                  <img src="{{ asset($g->path) }}" alt="">
                  <div class="portfolio-overlay">
                    <div class="portfolio-info"><h2 class="wow fadeInUp">{{ $g->name }}</h2></div>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section><!-- #portfolio -->
    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Artikel</h2>
          <p></p>
        </div>
        <div class="row">
          @foreach($artikel as $d)
          <div class="col-sm-3">
            <div class="img-holder" style="height: 200px; overflow: hidden;">
              <img src="{{ asset($d->img) }}" onerror="this.src='{{ asset('general/img/intro.jpg') }}'" style="width: 100%">
            </div>
            <a href="{{ url('article/'.$d->url) }}" style="font-weight: bold; text-align: center;">{{ $d->judul }}</a>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Kontak Kami</h2>
          <p>Hubungi kami untuk mendapatkan pengalaman belajar bahasa inggris yang luar biasa</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Jl. Brawijaya 74B, Tulungrejo, Kampung Inggris, Pare, Kediri, Indonesia</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Nomor Telepon</h3>
              <p><a href="tel:+62 87866107170">+62 87866107170</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:newcastleenglishclub@gmail.com">newcastleenglishclub@gmail.com</a></p>
            </div>
          </div>

        </div>
      </div>

  </main>
@endsection