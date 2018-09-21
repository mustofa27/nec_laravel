@extends('layouts.parent_admin')

@section('content')
<div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box" style="overflow:auto">
            <div class="box-header">
              <h3 class="box-title">
                @if(isset($data['title']))
                    {{ $data['title'] }}
                @endif
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Kota Asal</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Institusi</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal Pendaftaran</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Kota Asal</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Institusi</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal Pendaftaran</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $count = 0;?>
                  @foreach($data['pendaftar'] as $s)
                    <tr>
                      <td>{{ ++$count }}</td>
                      <td>{{ $s->nama }}</td>
                      <td>{{ $s->email }}</td>
                      <td>{{ $s->hp }}</td>
                      <td>{{ $s->jenis_kelamin }}</td>
                      <td>{{ $s->kota_asal }}</td>
                      <td>{{ $s->tempat_lahir }}</td>
                      <td>{{ $s->tgl_lahir }}</td>
                      <td>{{ $s->institusi }}</td>
                      <td>{{ $s->kode_transaksi }}</td>
                      <td>{{ $s->created_at }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
@endsection
