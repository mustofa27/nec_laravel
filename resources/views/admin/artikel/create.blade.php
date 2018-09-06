@extends('layouts.parent_admin')

@section('content')
<div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box" style="overflow:auto">
          <div class="box-header">
            @if (isset($artikel))
            <h3 class="box-title">
              Edit Artikel
            </h3>
            @else
            <h3 class="box-title">
              Tambah Artikel
            </h3>
            @endif
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if (isset($artikel))
            <?php
            $artikel = $artikel;
            ?>
            <form action="{{ url('artikel/edit', $artikel->id) }}" method="post" enctype="multipart/form-data">
            @else
            <form action="{{ url('artikel/create') }}" method="post" enctype="multipart/form-data">
            @endif
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Judul</label>
                @if(isset($artikel->judul))
                <input value="{{ $artikel->judul }}" type="text" class="form-control col-sm-12" required="" name="judul">
                @else
                <input type="text" class="form-control col-sm-12" required="" name="judul">
                @endif
              </div>
              <div class="form-group">
                <label>URL</label>
                @if(isset($artikel->url))
                <input value="{{ $artikel->url }}" type="text" class="form-control col-sm-12" required="" name="url">
                @else
                <input type="text" class="form-control col-sm-12" required="" name="url">
                @endif
              </div>
              <div class="form-group">
                <label>Isi</label>
                @if(isset($artikel->isi))
                <textarea class="form-control ckeditor" required="" name="isi">{{ $artikel->isi }}</textarea>
                @else
                <textarea class="form-control" required="" name="isi" id="isi"></textarea>
                @endif
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" required="" name="id_cat">
                  @foreach($categories as $d)
                  @if(isset($artikel))
                    @if($artikel->id_cat == $d->id_cat)
                      <option value="{{ $d->id }}" selected="">{{ $d->name }}</option>
                    @else
                      <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endif
                  @else
                      <option value="{{ $d->id }}">{{ $d->name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
             <div class="form-group col-sm-4">
               @if (isset($artikel->img))
                <img src="{{ asset($artikel->img) }}" style="width: 100%">
              @else
                Foto tidak ada
              @endif
             </div> 
              <div class="form-group col-sm-8">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
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