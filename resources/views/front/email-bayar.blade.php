<h2>Selamat, pendaftaran berhasil dilakukan </h2>
Data Peserta:
<table>
  <tr style="margin-top: 50px">
    <td rowspan="4" width="20%"><img src="{{ asset($pendaftar->path_foto) }}" style="width: 100px"></td>
    <td width="30%">Nama</td>
      <td width="50%">: {{ $pendaftar->nama }}</td>
  </tr>
  <tr>
    <td>Tanggal Lahir</td>
    <td>: {{ $pendaftar->tanggal_lahir }}</td>
  </tr>
  <tr>
    <td>Nomor Peserta</td>
    <td>: {{ $pendaftar->nomor_peserta }}</td>
  </tr>
  <tr>
    <td>Jenis TryOut</td>
    <td>: 
    <?php
    switch ($pendaftar->jenis_sbmptn) {
      case 'ipa':
        echo "SBMPTN SAINTEK (IPA)";
        break;
      
      case 'ips':
        echo "SBMPTN SOSHUM (IPS)";
        break;
      
      case 'STAN':
        echo "USM STAN";
        break;
      
      default:
        # code...
        break;
    }
    ?>
    </td>
  </tr>
</table>
<br>
<center>
  <h3>Silahkan salah satu pendaftar melakukan transfer kolektif:</h3>
  <br>
  Nominal: <b>Rp. {{$nominal}}</b>
  <br>
  Ke: 
  <br>
  <b>7625-009-731(BCA) a/n Mutafawwiqin Rizqoni Ardiansyah</b>
  <br>
  <b>900-00-0970236-7(BCA) a/n Mutafawwiqin Rizqoni Ardiansyah</b>
  <br>
  <b>028-768-7787(BNI) a/n Mutafawwiqin Rizqoni Ardiansyah</b>
  <br>
  lalu upload bukti pembayaran melalu tombol di bawah ini
  <br>
  <a href="{{ url('konfirmasi') }}" class="btn btn-primary">Upload bukti</a>
</center>
<br>
<br>
<br>
Regards,
<b>Tim Masuk PTN</b>
<br>
<br>
<i>Jangan balas email ini karena dibuat oleh sistem</i>