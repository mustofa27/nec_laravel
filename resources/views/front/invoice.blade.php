<style>
  .invoice-box {
      max-width: 800px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, .15);
      font-size: 10px;
      line-height: 18px;
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
      font-size: 14px;
      line-height: 18px;
      color: #333;
      font-weight: bold;
  }

  .invoice-box table tr.heading td {
      background: #a9f2c9;
      border-bottom: 1px solid #ddd;
      border-top: 3px solid #59d88c;
      font-weight: bold;
      font-size: 14px;
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
                    <?php } else{?>
                    <td>
                        <img class="unpaid" src="{{ asset('front/img/paid.png') }}">
                    </td>
                    <?php }?>
                </tr>
            </table>
            <h2>Bukti Pendaftaran</h2>
            <table>
                <tr class="item">
                    <td>Kode Transaksi</td>
                    <td>{{$transaksi->kode}}</td>
                    <td>Tanggal Transaksi</td>
                    <td>{{$transaksi->created_at}}</td>
                </tr>
                <tr class="item">
                    <td>Tanggal Mulai</td>
                    <td>{{$transaksi->tanggal_mulai}}</td>
                </tr>
            </table>  
            <table>
              <tr class="heading" >
                  <td colspan="2">Pendaftar Utama
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
              <tr class="item">
                    <td>Jumlah Pendaftar</td>
                    <td>
                      {{$jumlah_pendaftar}}
                    </td>
                </tr>
            </table>
            <br/>
            <table>
              <tr class="heading">
                <td colspan="4">
                    Pembayaran
                </td>
              </tr>
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($program as $p)
                <tr class="item">
                    <td>
                        {{$p->name}}
                    </td>
                    <td>
                        {{$p->harga}}
                    </td>
                    <td>
                        {{$jumlah_pendaftar}}
                    </td>
                    <td>
                        {{$p->harga * $jumlah_pendaftar}}
                    </td>
                </tr>
                @endforeach
                <tr class="item">
                    <td>
                        {{$penginapan->name}}
                    </td>
                    <td>
                        {{$penginapan->harga}}
                    </td>
                    <td>
                        {{$jumlah_pendaftar}}
                    </td>
                    <td>
                        {{$penginapan->harga * $jumlah_pendaftar}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Biaya Administrasi
                    </td>
                    <td>
                        25000
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        25000
                    </td>
                </tr>
                <tr>
                    <td class="item last">Total</td>
                    <td class="item last">
                        
                    </td>
                    <td class="item last">
                        
                    </td>
                    <td class="item last">
                        {{$transaksi->grand_total}}
                    </td>
                </tr>
              </tbody>
            </table>
            <?php if($transaksi->status != "accepted"){?>
              <h4>Silahkan melakukan pembayaran ke salah satu rekening dibawah ini</h4>
              <img src="{{ asset('front/img/rekening.jpg') }}" style="width:100%;height:auto;"> 
            <?php }?>            
        </div>
</body>