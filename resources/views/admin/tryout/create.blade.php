@extends('layouts.parent_admin')

@section('content')
<div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box" style="overflow:auto">
          <div class="box-header">
            @if (isset($data['tryout']))
            <h3 class="box-title">
              Edit Tryout
            </h3>
            @else
            <h3 class="box-title">
              Tambah Tryout
            </h3>
            @endif
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if (isset($data['tryout']))
            <?php
            $to = $data['tryout'];
            ?>
            <form action="{{ route('tryout.update', $to->id) }}" method="post">
            @else
            <form action="{{ url('tryout/create') }}" method="post">
            @endif
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Deskripsi</label>
                @if(isset($to->deskripsi))
                <textarea class="form-control col-sm-12" name="desc">{{ $to->deskripsi }}</textarea>
                @else
                <textarea class="form-control col-sm-12" name="desc"></textarea>
                @endif
              </div> 
              <div class="form-group">
                <label>Tanggal Pelaksanaan</label>
                @if(isset($to->tanggal_pelaksanaan))
                <input value="{{ $to->tanggal_pelaksanaan }}" name="tanggal_pelaksanaan" class='date form-control datepicker'>
                @else
                <input name="tanggal_pelaksanaan" class='date form-control datepicker'>
                @endif
              </div> 
              <div class="form-group">
                <label>Tempat Pelaksanaan</label>
                @if(isset($to->tempat_pelaksanaan))
                <input value="{{ $to->tempat_pelaksanaan }}" type="text" class="form-control" name="tempat_pelaksanaan" />
                @else
                <input type="text" class="form-control" name="tempat_pelaksanaan" />
                @endif
              </div> 
              <div class="form-group">
                <label>Harga</label>
                @if(isset($to->harga))
                <input value="{{ $to->harga }}" type="text" class="form-control" name="harga" />
                @else
                <input type="number" class="form-control" name="harga" />
                @endif
              </div> 
              <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control select2" name="id_lokasi">
                  <optgroup label="Select Lokasi">
                    @foreach($data['lokasi'] as $p)
                    <option value="{{ $p->id }}"
                      <?php
                      if (isset($to->id_lokasi)){
                        if ($to->id_lokasi == $p->id)
                          echo "selected='selected'";
                      }
                      ?>>{{ $p->name }}</option>
                    @endforeach
                  </optgroup>
                </select>
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