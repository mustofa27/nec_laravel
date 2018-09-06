@extends('front.layout')
@section('content')
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Selamat, Pendaftaran Berhasil!</h2>
          <p style="margin-bottom: 50px">Data diri peserta berhasil disimpan, nomor peserta sudah dikirim ke email masing-masing peserta. <b>Silahkan cek email peserta</b> atau catat dan <i>screenshot</i> halaman ini untuk melakukan pembayaran dan upload bukti pembayaran.</p>
          <center><h3>Peserta tidak perlu mendaftar kembali, data peserta sudah disimpan</h3></center>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 pendaftar-result">
              <span>Identitas Pendaftar:</span>
              <table width="100%">
              @foreach($pendaftars as $d)
                <tr style="margin-top: 50px">
                  <td rowspan="4" width="20%"><img src="{{ asset($d->path_foto) }}" style="width: 100px"></td>
                  <td width="30%">Nama</td>
                  <td width="50%">: {{ $d->nama }}</td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td>: {{ $d->tanggal_lahir }}</td>
                </tr>
                <tr>
                  <td>Nomor Peserta</td>
                  <td>: {{ $d->nomor_peserta }}</td>
                </tr>
                <tr>
                  <td>Jenis TryOut</td>
                  <td>: 
                  <?php
                  switch ($d->jenis_sbmptn) {
                    case 'ipa':
                      echo "SBMPTN SAINTEK (IPA)";
                      break;
                    
                    case 'ips':
                      echo "SBMPTN SOSHUM (IPS)";
                      break;
                    
                    case 'stan':
                      echo "USM STAN";
                      break;
                    
                    default:
                      # code...
                      break;
                  }
                  ?>
                  </td>
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