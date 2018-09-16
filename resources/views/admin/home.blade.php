@extends('layouts.parent_admin')

@section('content')
<div>
    <section class="content">
      <div class="row">
        <div class="col-xs-11">

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
                    <th>Tanggal Mulai</th>
                    <th>Status</th>
                    <th>Kode</th>
                    <th>Grand Total</th>
                    <th>Bukti</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nomor</th>
                    <th>Tanggal Mulai</th>
                    <th>Status</th>
                    <th>Kode</th>
                    <th>Grand Total</th>
                    <th>Bukti</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $count = 0;?>
                  @foreach($data['transaksi'] as $s)
                    <tr>
                      <td>{{ ++$count }}</td>
                      <td>{{ $s->tanggal_mulai }}</td>
                      <td>{{ $s->status }}</td>
                      <td>{{ $s->kode }}</td>
                      <td>{{ $s->grand_total }}</td>
                      <td><img src="{{ asset($s->path) }}" class="img-responsive" width="100"></td>
                      <td>
                        <a href="{{ url('transaksi/accept', $s->id) }}">Accept</a>
                        <a href="{{ url('transaksi/reject', $s->id) }}">Reject</a>
                      </td>
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
