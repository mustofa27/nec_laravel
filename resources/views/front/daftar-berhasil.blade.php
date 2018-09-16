@extends('front.layout')
@section('content')
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Selamat, Pendaftaran Berhasil!</h2>
          <p style="margin-bottom: 50px">Data diri peserta berhasil disimpan, kode transaksi sudah dikirim ke email anda. <b>Silahkan cek email </b> atau catat dan <i>screenshot</i> halaman ini untuk melakukan pembayaran dan upload bukti pembayaran.</p>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 pendaftar-result">
              <span>Identitas Pendaftar:</span>
              <table width="100%">
              @foreach($pendaftars as $d)
                <tr style="margin-top: 50px">
                  <td width="30%">Nama</td>
                  <td width="50%">: {{ $d->nama }}</td>
                </tr>
                <tr>
                  <td>No HP</td>
                  <td>: {{ $d->hp }}</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>: {{ $d->kota_asal }}</td>
                </tr>
              @endforeach
              </table>
            </div>
          </div>
          <div class="row" style="margin-top: 50px">
            <div class="col-sm-2"></div>
            <div class="col-sm-12">
              <center>
                <h3>Silahkan transfer:</h3>
                <br>
                Nominal: <b>Rp. {{$product->grand_total}}</b>
                <br>
                Ke: 
                <br>
                <b>7625-009-731(BCA) a/n Mutafawwiqin Rizqoni Ardiansyah</b>
                <br>
                <b>900-00-0970236-7(Mandiri) a/n Mutafawwiqin Rizqoni Ardiansyah</b>
                <br>
                <b>028-768-7787(BNI) a/n Mutafawwiqin Rizqoni Ardiansyah</b>
                <br>
                lalu upload bukti pembayaran melalu tombol di bawah ini
                <br>
                <a href="{{ url('konfirmasi') }}" class="btn btn-primary">Upload bukti</a>
              </center>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php
  session()->put('registered', true);
  ?>
@endsection