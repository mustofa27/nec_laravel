@extends('front.layout')
@section('content')
    <section id="services">
      <div class="container" style="min-height: 54vh">
        <div class="section-header">
          <h2>Konfirmasi dan Upload Bukti</h2>
          <form class="row" method="post" action="{{ url('konfirmasi') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
              <div class="form-group col-sm-12">
                <label>Nomor Salah Satu Peserta dalam Paket</label>
                <input type="number" name="nomor_peserta" required="" class="form-control" required="">
              </div>
              <div class="form-group col-sm-12">
                <label>Pengirim (atas nama)</label>
                <input type="text" name="pengirim" required="" class="form-control" required="">
              </div>
              <div class="form-group col-sm-12">
                <label>Foto Bukti Pembayaran</label>
                <input type="file" name="bukti" required="" class="form-control" required="">
              </div>
              <div class="col-sm-12">
                <div class="row">
                <div class="col-sm-3"></div>
                <input type="submit" class="btn btn-primary col-sm-6" value="Upload">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>
  <?php
  session()->put('registered', true);
  ?>
@endsection