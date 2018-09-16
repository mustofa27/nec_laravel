@extends('front.layout')
@section('content')
    
    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Artikel</h2>
        </div>
        <div class="row">
          @foreach($all_article as $d)
          <div class="col-sm-3">
            <div class="img-holder" style="height: 200px; overflow: hidden;">
              <img src="{{ asset($d->img) }}" onerror="this.src='{{ asset('general/img/intro.jpg') }}'" style="width: 100%">
            </div>
            <a href="{{ url('article/'.$d->url) }}" style="font-weight: bold; text-align: center;">{{ $d->judul }}</a>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- #artikel -->
  </main>
@endsection


