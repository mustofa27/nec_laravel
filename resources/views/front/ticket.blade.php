<style type="text/css">
  @page{
    margin: 0px 0px 0px 0px
  }
  /*body{
    background: url('{{ asset('ticket/background.jpg')  }}');
    background-size: 680.315px 340.157px;
  }*/
  .content {
    position: absolute;
    top: 40%;
    left: 5%;
    /*transform: translate(-50%, -50%);*/
    width: 100%;
  }
  .placeholder{
    background: white;
    border-radius: 100% ;
    width: 90%;
    margin-left: -10px;
    padding: 10px;
  }
  h2{
    font-style: italic;
    padding: 0px;
    margin: 0px;
  }
</style>
<body>
  <img src="{{ asset('ticket/background.jpg') }}" style="width: 100%; height: 100%;">
  <div class="content">
    <table style="width: 100%">
      <tr>
        <td style="width: 40%;">
          <img src="{{ asset('ticket/ttw-sby.png') }}" style="width: 300px">
        </td>
        <td style="width: 60%;">
          <h2>NAMA</h2>
          <div class="placeholder">{{ $nama }}</div>
          <h2>NO PESERTA</h2>
          <div class="placeholder">{{ $nomor_peserta }}</div>
          <h2>JENIS JURUSAN</h2>
          <div class="placeholder">
          <?php
          switch ($jenis_sbmptn) {
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
          </div>
        </td>
      </tr>
    </table>
  </div>
</body>