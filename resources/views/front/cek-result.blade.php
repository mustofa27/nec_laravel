@extends('front.layout')
@section('content')
    <section id="services">
      <div class="container" style="min-height: 54vh">
        <div class="section-header">
          <h2>Cek Status</h2>
            <div class="cek-result">
            <table width="100%">
            <tr style="margin-top: 50px; ">
                <td rowspan="4" width="20%"><img src="{{ asset($peserta->path_foto) }}" style="width: 100px"></td>
                <td width="30%">Nama</td>
                <td width="50%">: <b>{{ $peserta->nama }}</b></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>: <b>{{ $peserta->tanggal_lahir }}</b></td>
              </tr>
              <tr>
                <td>Nomor Peserta</td>
                <td>: <b>{{ $peserta->nomor_peserta }}</b></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>: <b>{{ $transaksi->status }}</b></td>
              </tr>
            </table>
            <center style="margin-top: 50px">
              @if ($transaksi->status == 'accepted')
              <a href="{{ url('download', $peserta->nomor_peserta) }}" class="btn btn-primary">Download Tiket SBMPTN</a>
              @elseif ($transaksi->status == 'registered')
              <a href="{{ url('konfirmasi') }}" class="btn btn-primary">Upload Bukti</a>
              @endif
            </center>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php
  session()->put('registered', true);
  ?>
@endsection