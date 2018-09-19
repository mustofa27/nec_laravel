<style>
  .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, .15);
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
  }

  .invoice-box table {
      width: 100%;
      text-align: left;
      border-collapse: collapse;
  }

  .invoice-box table td {
      border-collapse: collapse;
      padding: 5px;
  }

  .invoice-box .border {
      border-bottom: 1px solid #eee;
  }

  .invoice-box .title {
      font-size: 25px;
      line-height: 18px;
      color: #333;
      font-weight: bold;
  }

  .invoice-box table tr.heading td {
      background: #a9f2c9;
      border-bottom: 1px solid #ddd;
      border-top: 3px solid #59d88c;
      font-weight: bold;
      font-size: 18px;
  }

  .invoice-box table tr.item td{
      border-bottom: 1px solid #eee;
  }

  .invoice-box .item.last {
      border-top: 3px solid #59d88c;
  }

  .invoice-box .logo{
      max-width:50px;
  }

  .invoice-box .unpaid{
      max-width:100px;
  }

  @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
          width: 100%;
          display: block;
          text-align: center;
      }

      .invoice-box table tr.information table td {
          width: 100%;
          display: block;
          text-align: center;
      }
  }

</style>
<body>
  <div class="invoice-box">
            <table>
                <tr class="top">
                    <td>

                        <img class="logo" src="{{ asset('general/img/logo.png') }}"> 
                    </td>
                    <td class="title">
                        Newcastle English Institute
                    </td>
                    <?php if($transaksi->status != "accepted"){?>
                    <td>
                        <img class="unpaid" src="{{ asset('front/img/unpaid.jpg') }}">
                    </td>
                    <?php }?>
                </tr>
            </table>
            <br/><br/>
            <table>
                <tr class="heading" >
                    <td colspan="2">Bukti Pendaftaran
                    </td>
                </tr>
                <tr class="item">
                    <td style="width:35%">Kode Transaksi</td>
                    <td>{{$transaksi->kode}}</td>
                </tr>
                <tr class="item">
                    <td>Paket</td>
                    <?php $total_harga_paket = 0;?>
                    <td>
                        <ul>
                            @foreach($program as $p)
                            <li>
                                {{$p->name}}
                            </li>
                            <?php $total_harga_paket+=$p->harga;?>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr class="item">
                    <td>Penginapan</td>
                    <td>
                      {{$penginapan->name}}
                    </td>
                </tr>
            </table>  
            <br/><br/>
            <table>
              <tr class="heading" >
                  <td colspan="2">Daftar Peserta
                  </td>
              </tr>
              <tr class="item">
                 <td style="width: 35%">
                      Nama
                  </td>
                  <td>
                      {{$pendaftar->nama}}
                  </td>
              </tr>
              <tr class="item">
                  <td >
                      Alamat
                  </td>
                  <td >
                      {{$pendaftar->kota_asal}}
                  </td>
              </tr>
              <tr class="item">
                  <td >
                      No HP
                  </td>
                  <td >
                      {{$pendaftar->hp}}
                  </td>
              </tr>
            </table>
            <br/><br/>
            <table>
                <tr class="heading">
                    <td colspan="2">
                        Pembayaran
                    </td>
                </tr>
                <tr class="item">
                    <td style="width:35%">
                        Harga Paket
                    </td>
                    <td>
                        {{$total_harga_paket}}
                    </td>
                </tr>
                <tr class="item">
                    <td style="width:35%">
                        Harga Penginapan
                    </td>
                    <td>
                        {{$penginapan->harga}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Biaya Administrasi
                    </td>
                    <td>
                        25000 
                    </td>
                </tr>
                <tr>
                    <td class="item last">Total</td>
                    <td class="item last">
                        {{$transaksi->grand_total}}
                    </td>
                </tr>
            </table>
        </div>
</body>