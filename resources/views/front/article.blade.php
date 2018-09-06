@extends('front.layout')
@section('content')
    
    <section id="services">
      <div class="container" style="min-height: 54vh">
        <div class="section-header">
          <h2>{{ $article->judul }}</h2>
          <img src="{{asset($article->img)}}" style="max-width:100%">
          <article>
            {!! $article->isi !!}
          </article>
        </div>
      </div>
    </section>
  </main>
@endsection