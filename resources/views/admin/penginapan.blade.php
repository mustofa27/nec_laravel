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
              <a href="{{ url('penginapan/create') }}" class="btn btn-danger">+</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Detail</th>
                    <th>Alamat</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Detail</th>
                    <th>Alamat</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $count = 0;?>
                  @foreach($data['penginapan'] as $s)
                    <tr>
                      <td>{{ ++$count }}</td>
                      <td>{{ $s->name }}</td>
                      <td>{{ $s->detail }}</td>
                      <td>{{ $s->alamat }}</td>
                      <td>{{ $s->fasilitas }}</td>
                      <td>{{ $s->harga }}</td>
                      <td><img src="{{ asset($s->path) }}" class="img-responsive" width="100"></td>
                      <td>
                        <a href="{{ url('penginapan/edit', $s->id) }}" class="btn btn-warning btn-sm btn-icon-anim btn-square mr-5"><i class="fa fa-edit"></i></a>
                        <a href="{{ url('penginapan/destroy', $s->id) }}" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5"><i class="fa fa-trash-o"></i></a>
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
