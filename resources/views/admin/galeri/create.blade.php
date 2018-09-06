@extends('layouts.parent_admin')

@section('content')
<div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box" style="overflow:auto">
          <div class="box-header">
            @if (isset($galeri))
            <h3 class="box-title">
              Edit Galeri
            </h3>
            @else
            <h3 class="box-title">
              Tambah Galeri
            </h3>
            @endif
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if (isset($galeri))
            <?php
            $galeri = $galeri;
            ?>
            <form action="{{ url('galeri/edit', $galeri->id) }}" method="post" enctype="multipart/form-data">
            @else
            <form action="{{ url('galeri/create') }}" method="post" enctype="multipart/form-data">
            @endif
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Name</label>
                @if(isset($galeri->name))
                <input value="{{ $galeri->name }}" type="text" class="form-control col-sm-12" required="" name="name">
                @else
                <input type="text" class="form-control col-sm-12" required="" name="name">
                @endif
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                @if(isset($galeri->desc))
                <textarea class="form-control" required="" name="deskripsi">{{ $galeri->desc }}</textarea>
                @else
                <textarea class="form-control" required="" name="deskripsi"></textarea>
                @endif
              </div>
             <div class="form-group col-sm-4">
               @if (isset($galeri->path))
                <img src="{{ asset($galeri->path) }}" style="width: 100%">
              @else
                Foto tidak ada
              @endif
             </div> 
              <div class="form-group col-sm-8">
                <label>Foto</label>
                <input type="file" name="path" class="form-control">
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