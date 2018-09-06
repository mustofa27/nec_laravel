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
                <a href="{{ url('program/create') }}" class="btn btn-danger">+</a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Detail</th>
                    <th>Harga</th>
                    <th>Tipe</th>
                    <th>Status</th>
                    <th>Durasi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Group</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Detail</th>
                    <th>Harga</th>
                    <th>Tipe</th>
                    <th>Status</th>
                    <th>Durasi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Group</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $count = 0;?>
                  @foreach($data['program'] as $s)
                    <tr>
                      <td>{{ ++$count }}</td>
                      <td>{{ $s->name }}</td>
                      <td>{{ $s->detail }}</td>
                      <td>{{ $s->harga }}</td>
                      <td>{{ $s->tipe }}</td>
                      <td>{{ $s->status }}</td>
                      <td>{{ $s->durasi }}</td>
                      <td>{{ $s->tanggal_mulai }}</td>
                      <td>{{ $s->tanggal_berakhir }}</td>
                      <td>{{ $s->group }}</td>
                      <td>
                        <a href="{{ route('program.edit', $s->id) }}" class="btn btn-warning btn-sm btn-icon-anim btn-square mr-5"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('program.destroy', $s->id) }}" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5"><i class="fa fa-trash-o"></i></a>
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
