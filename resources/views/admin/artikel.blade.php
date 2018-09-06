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
                <a href="{{ url('artikel/create') }}" class="btn btn-danger">+</a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Img</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>URL</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nomor</th>
                    <th>Img</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>URL</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $count = 0;?>
                  @foreach($data['artikel'] as $s)
                    <tr>
                      <td>{{ ++$count }}</td>
                      <td style="height: 100px; overflow: hidden;"><img src="{{ asset($s->img) }}" style="width: 100px;"></td>
                      <td>{{ $s->judul }}</td>
                      <td>{{ substr($s->isi, 0, 100) }}</td>
                      <td>{{ $s->url }}</td>
                      <td>{{ $s->category }}</td>
                      <td>
                        <a href="{{ url('artikel/edit', $s->id) }}" class="btn btn-warning btn-sm btn-icon-anim btn-square mr-5"><i class="fa fa-edit"></i></a>
                        <a href="{{ url('artikel/destroy', $s->id) }}" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5"><i class="fa fa-trash-o"></i></a>
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
