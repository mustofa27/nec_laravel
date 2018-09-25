@extends('layouts.parent_admin')

@section('content')
<div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box" style="overflow:auto">
          <div class="box-header">
            @if (isset($data['program']))
            <h3 class="box-title">
              Edit Program
            </h3>
            @else
            <h3 class="box-title">
              Tambah Program
            </h3>
            @endif
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if (isset($data['program']))
            <?php
            $product = $data['program'];
            ?>
            <form action="{{ route('program.update', $product->id) }}" method="post">
            @else
            <form action="{{ url('program/create') }}" method="post">
            @endif
              {!! csrf_field() !!}
              <div class="form-group">
                <label>Nama</label>
                @if(isset($product->name))
                <input value="{{ $product->name }}" type="text" class="form-control" name="name">
                @else
                <input type="text" name="name" class='form-control'>
                @endif
              </div> 
              <div class="form-group">
                <label>Detail</label>
                @if(isset($product->detail))
                <textarea class="form-control ckeditor" name="detail">{{ $product->detail }}</textarea>
                @else
                <textarea class="form-control ckeditor" name="detail"></textarea>
                @endif
              </div> 
              <div class="form-group">
                <label>Harga</label>
                @if(isset($product->harga))
                <input value="{{ $product->harga }}"  type="number" class="form-control" name="harga" />
                @else
                <input type="number" class="form-control" name="harga" />
                @endif
              </div> 
              <div class="form-group">
                <label>Tipe</label>
                <select class="form-control select2" name="tipe">
                  <optgroup label="Select Tipe" >
                    <option value="single"
                      <?php
                      if (isset($product->tipe)){
                        if ($product->tipe == "single")
                          echo "selected='selected'";
                      }
                      ?>>Single</option>
                    <option value="multi"
                      <?php
                      if (isset($product->tipe)){
                        if ($product->tipe == "multi")
                          echo "selected='selected'";
                      }
                      ?>>Multiple</option>
                  </optgroup>
                </select>
              </div> 
              <div class="form-group">
                <label>Status</label>
                <select class="form-control select2" name="status">
                  <optgroup label="Select Status" >
                    <option value="aktif"
                      <?php
                      if (isset($product->tipe)){
                        if ($product->status == "aktif")
                          echo "selected='selected'";
                      }
                      ?>>Aktif</option>
                    <option value="nonaktif"
                      <?php
                      if (isset($product->status)){
                        if ($product->tipe == "nonaktif")
                          echo "selected='selected'";
                      }
                      ?>>Nonaktif</option>
                  </optgroup>
                </select>
              </div> 
              <div class="form-group">
                <label>Durasi</label>
                @if(isset($product->durasi))
                <input value="{{ $product->durasi }}"  type="text" class="form-control" name="durasi" />
                @else
                <input type="text" class="form-control" name="durasi" />
                @endif
              </div>
              <div class="form-group">
                <label>Rating</label>
                @if(isset($product->rate))
                <input value="{{ $product->rate }}"  type="number" class="form-control" name="rate" />
                @else
                <input type="number" class="form-control" name="rate" />
                @endif
              </div>
              <div class="form-group">
                <label>Jumlah Pertemuan</label>
                @if(isset($product->jumlah_pertemuan))
                <input value="{{ $product->jumlah_pertemuan }}"  type="text" class="form-control" name="jumlah_pertemuan" />
                @else
                <input type="text" class="form-control" name="jumlah_pertemuan" />
                @endif
              </div>
              <div class="form-group">
                <label>Opsi Tanggal Mulai</label>
                @if(isset($product->opsi_tanggal_mulai))
                <input value="{{ $product->opsi_tanggal_mulai }}"  type="text" class="form-control" name="opsi_tanggal_mulai" />
                @else
                <input type="text" class="form-control" name="opsi_tanggal_mulai" />
                @endif
              </div>
              <div class="form-group">
                <label>Tanggal Mulai</label>
                @if(isset($product->tanggal_mulai))
                <input value="{{ $product->tanggal_mulai }}"  type="date" class="date form-control datepicker" name="tanggal_mulai" />
                @else
                <input type="date" class="date form-control datepicker" name="tanggal_mulai" />
                @endif
              </div>
              <div class="form-group">
                <label>Tanggal Berakhir</label>
                @if(isset($product->tanggal_berakhir))
                <input value="{{ $product->tanggal_berakhir }}"  type="date" class="date form-control datepicker" name="tanggal_berakhir" />
                @else
                <input type="date" class="date form-control datepicker" name="tanggal_berakhir" />
                @endif
              </div>
              <div class="form-group">
                <label>Group</label>
                <select class="form-control select2" name="id_group">
                  <optgroup label="Select Group" >
                    @foreach($data['group'] as $p)
                    <option value="{{ $p->id }}"
                      <?php
                      if (isset($product->id_group)){
                        if ($product->id_group == $p->id)
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