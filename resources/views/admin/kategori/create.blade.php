@extends('layouts.parent_admin')

@section('content')
<div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box" style="overflow:auto">
          <div class="box-header">
            @if (isset($data['category']))
            <h3 class="box-title">
              Edit Kategori
            </h3>
            @else
            <h3 class="box-title">
              Tambah Kategori
            </h3>
            @endif
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if (isset($data['category']))
            <?php
            $category = $data['category'];
            ?>
            <form action="{{ route('category.update', $category->id) }}" method="post">
            @else
            <form action="{{ url('category/create') }}" method="post">
            @endif
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Nama</label>
                @if(isset($category->name))
                <input value="{{ $category->name }}" type="text" class="form-control col-sm-12" name="name">
                @else
                <input type="text" class="form-control col-sm-12" name="name">
                @endif
              </div> 
              <div class="form-group">
                <label>Deskripsi</label>
                @if(isset($category->desc))
                <textarea class="form-control col-sm-12" name="desc">{{ $category->desc }}</textarea>
                @else
                <textarea class="form-control col-sm-12" name="desc"></textarea>
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