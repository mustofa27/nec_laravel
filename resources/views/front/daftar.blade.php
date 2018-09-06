@extends('front.layout')
@section('content')
    <section id="services">
      <div class="container" style="min-height: 54vh">
        <div class="section-header">
          <h2>Formulir Pendaftaran</h2>
          <form class="row" method="post" action="{{ url('daftar-pengguna') }}">
          {!! csrf_field() !!}
            <div class="form-group col-sm-4">
              <label>Lokasi Try Out</label>
              <select class="form-control" name="lokasi" required="">
                <option>-- pilih lokasi --</option>
                @foreach($lokasi as $d)
                  @if(!empty($id_lokasi) && $d->id == $id_lokasi)
                    <option value="{{ $d->id }}" selected="selected">{{ $d->name }}</option>
                  @else
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group col-sm-4">
              <label>Try Out</label>
              <select class="form-control" name="to" required="">
                @if(!empty($to))
                  <option>-- pilih tanggal pelaksanaan --</option>
                  @foreach($to as $t)
                    <option value="{{ $t->id }}">{{ $t->tanggal_pelaksanaan }}</option>
                  @endforeach
                @else
                  <option>-- pilih lokasi terlebih dulu --</option>
                @endif
              </select>
            </div>
            <div class="form-group col-sm-4">
              <label>Paket</label>
              <select class="form-control" name="product" required="">
                <option>-- pilih lokasi terlebih dulu --</option>
              </select>
            </div>
            <div class="col-sm-4"></div>
            <input type="submit" class="btn btn-primary col-sm-4" value="Isi form">
          </form>
        </div>
      </div>
    </section>
  </main>
@endsection
@section('custom-script')
<script type="text/javascript">
$('select[name=lokasi]').on('change', function(){
  let id_lokasi = $(this).val();
  $.get('{{ url("ajax/to") }}/'+id_lokasi).success(function(data){
    $('select[name=to]').html('');
    $('select[name=to]').append('<option>-- pilih tanggal pelaksanaan --</option>');
    for(var i = 0; i < data.length; i++){
      $('select[name=to]').append('<option value="'+data[i].id+'">'+data[i].tanggal_pelaksanaan+"</option>");
    }
  })
});
$('select[name=to]').on('change', function(){
  let id_lokasi = $(this).val();
  $.get('{{ url("ajax/product") }}/'+id_lokasi).success(function(data){
    $('select[name=product]').html('');
    $('select[name=product]').append('<option>-- pilih paket pendaftaran --</option>');
    for(var i = 0; i < data.length; i++){
      $('select[name=product]').append('<option value="'+data[i].id+'">'+data[i].name+"</option>");
    }
  })
});
</script>
@endsection