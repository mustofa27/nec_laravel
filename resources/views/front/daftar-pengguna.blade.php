@extends('front.layout')
@section('content')
    
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Formulir Pendaftaran</h2>
          <form method="post" action="{{ url('daftar') }}" enctype="multipart/form-data">
          <input type="hidden" name="id_transaksi" value="{{ $transaksi->id }}">
          {!! csrf_field() !!}
          @for($i = 0; $i< $product->jumlah_peserta; $i++)
          <h3>Peserta {{ $i+1 }}</h3>
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Nama</label>
              <input type="text" name="name[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Email</label>
              <input type="email" name="email[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Alamat</label>
              <textarea name="alamat[{{$i}}]" class="form-control" required=""></textarea>
            </div>
            <div class="form-group col-sm-6">
              <label>No. HP</label>
              <input type="text" name="hp[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Asal Sekolah</label>
              <input type="text" name="sekolah[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Akun FB</label>
              <input type="text" name="fb[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>ID Instagram</label>
              <input type="text" name="ig[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>ID Line</label>
              <input type="text" name="line[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Nomor Whatsapp</label>
              <input type="number" name="wa[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Foto</label>
              <input type="file" name="path_foto[{{$i}}]" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
              <label>Jenis Try Out yang Diikuti</label>
              <select class="form-control" name="jenis_sbmptn[{{$i}}]">
                <option value="ipa">SBMPTN SAINTEK (IPA)</option>
                <option value="ips">SBMPTN SOSHUM (IPS)</option>
                <option value="stan">USM STAN</option>
              </select>
            </div>
          </div>
          <hr style="margin-top: 100px">
          @endfor
            <div class="col-sm-4"></div>
            <input type="submit" class="btn btn-primary col-sm-4" value="Daftar">
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