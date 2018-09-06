@extends('layouts.parent_admin')

@section('content')
<div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box" style="overflow:auto">
          <div class="box-header">
            @if (isset($penginapan))
            <h3 class="box-title">
              Edit Penginapan
            </h3>
            @else
            <h3 class="box-title">
              Tambah Penginapan
            </h3>
            @endif
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if (isset($penginapan))
            <form action="{{ route('penginapan.update', $penginapan->id) }}" method="post" enctype="multipart/form-data">
            @else
            <form action="{{ url('penginapan/create') }}" method="post" enctype="multipart/form-data">
            @endif
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Nama</label>
                @if(isset($penginapan->name))
                <input value="{{ $penginapan->name }}" type="text" class="form-control col-sm-12" name="name">
                @else
                <input type="text" class="form-control col-sm-12" name="name">
                @endif
              </div>
              <div class="form-group">
                <label>Detail</label>
                @if(isset($penginapan->detail))
                <input value="{{ $penginapan->detail }}" type="text" class="form-control col-sm-12" name="detail">
                @else
                <input type="text" class="form-control col-sm-12" name="detail">
                @endif
              </div>
              <div class="form-group">
                <label>Alamat</label>
                @if(isset($penginapan->alamat))
                <input value="{{ $penginapan->alamat }}" type="text" class="form-control col-sm-12" name="alamat">
                @else
                <input type="text" class="form-control col-sm-12" name="alamat">
                @endif
              </div>
              <div class="form-group">
                <label>Fasilitas</label>
                @if(isset($penginapan->fasilitas))
                <input value="{{ $penginapan->fasilitas }}" type="text" class="form-control col-sm-12" name="fasilitas">
                @else
                <input type="text" class="form-control col-sm-12" name="fasilitas">
                @endif
              </div>
              <div class="form-group">
                <label>Harga</label>
                @if(isset($penginapan->harga))
                <input value="{{ $penginapan->harga }}" type="number" class="form-control col-sm-12" name="harga">
                @else
                <input type="number" class="form-control col-sm-12" name="harga">
                @endif
              </div>
              <div class="form-group col-sm-4">
                @if (isset($penginapan->path))
                  <img src="{{ asset($penginapan->path) }}" style="width: 100%">
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