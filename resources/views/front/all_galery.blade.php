@extends('front.layout')
@section('content')
    
    <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Galeri</h2>
          <p></p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          @foreach($all_galery as $g)
            <div class="col-lg-3 col-md-4">
              <div class="portfolio-item wow fadeInUp">
                <a href="{{ asset($g->path) }}" class="portfolio-popup">
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
  </main>
@endsection


