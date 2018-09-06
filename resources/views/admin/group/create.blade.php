@extends('layouts.parent_admin')

@section('content')
<div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box" style="overflow:auto">
          <div class="box-header">
            @if (isset($data['group']))
            <h3 class="box-title">
              Edit Group
            </h3>
            @else
            <h3 class="box-title">
              Tambah Group
            </h3>
            @endif
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if (isset($data['group']))
            <?php
            $jurusan = $data['group'];
            ?>
            <form action="{{ route('group.update', $jurusan->id) }}" method="post">
            @else
            <form action="{{ url('group/create') }}" method="post">
            @endif
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Nama</label>
                @if(isset($jurusan->name))
                <input value="{{ $jurusan->name }}" type="text" class="form-control col-sm-12" name="name">
                @else
                <input type="text" class="form-control col-sm-12" name="name">
                @endif
              </div> 
              <div class="form-group">
                <label>Detail</label>
                @if(isset($jurusan->detail))
                <textarea class="form-control col-sm-12" name="detail">{{ $jurusan->detail }}</textarea>
                @else
                <textarea class="form-control col-sm-12" name="detail"></textarea>
                @endif
              </div> 
              <input type="submit" class="btn btn-success col-sm-6 col-sm-offset-3">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection