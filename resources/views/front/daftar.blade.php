@extends('front.layout-pendaftaran')
@section('content')
    <section id="services">
        <div class="panel panel-default">
            <!-- Form wizard with validation starts here -->
            <div class="panel-heading">
                <div class="section-header">
                    <h2>Pendaftaran</h2>
                </div>
            </div>

            <div class="panel-body">
                <form role="forl" id="rootwizard" class="form-wizard validate" action="{{url('daftar')}}" method='post'>
                    {!! csrf_field() !!}
                    <ul class="tabs">
                      <li class="active">
                          <a class="name-tab" href="#fwv-1" data-toggle="tab" >
                              Daftar Paket
                          </a>
                      </li>
                      <li>
                          <a class="name-tab"  href="#fwv-2" data-toggle="tab">
                              Informasi Umum Pendaftar
                          </a>
                      </li>
                      <li>
                          <a class="name-tab"  href="#fwv-3" data-toggle="tab">
                              Informasi Tambahan
                          </a>
                      </li>
                      <li>
                          <a class="name-tab"  href="#fwv-4" data-toggle="tab">
                              Penginapan
                          </a>
                      </li>
                      <li>
                          <a class="name-tab"  href="#fwv-5" data-toggle="tab">
                              Konfirmasi Data
                          </a>
                      </li>
                    </ul>

                    <div class="progress-indicator">
                        <span></span>
                    </div>

                    <div class="tab-content no-margin">

                        <!-- Tabs Content -->
                        <div class="tab-pane with-bg active" id="fwv-1">
                            <h3>
                                Paket yang Tersedia
                            </h3><br/>
                            <h5>
                                Anda bisa memilih lebih dari satu program untuk program-program yang berdurasi 2 Minggu
                            </h5><br/>
                            <div class="table-responsive">          
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Program</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($program as $l)
                                          <tr>
                                            <td>
                                                <div class="columns">
                                                    @if ( $l->durasi != "2 Minggu")
                                                          <div class= "sale-box">
                                                            <span class ="new">FAVORIT</span>
                                                          </div>
                                                    @endif
                                                    <ul class="price">
                                                        <br>
                                                      @if(!empty($id_program) && $l->id == $id_program)
                                                        <input type="checkbox" class="cbr cbr-secondary" name="id_program[]" id="id_program" data-validate="required" value="<?php echo $l->id; ?>" checked> 
                                                      @else
                                                        <input type="checkbox" class="cbr cbr-secondary" name="id_program[]" id="id_program" data-validate="required" value="<?php echo $l->id; ?>"> 
                                                      @endif
                                                      <li class="header">{{$l->name}}</li>
                                                      <li class="grey">{{"Rp ".$l->harga}}</li>
                                                      <li>{{$l->group}}</li>
                                                      <li>{{$l->durasi}}</li>
                                                      <li>{{$l->jumlah_pertemuan}}</li>
                                                      <li>{{$l->opsi_tanggal_mulai}}</li>
                                                    </ul>            
                                                      <br>
                                                    @if ( $l->rate/40 < 1)
                                                      <div class="rating-box">
                                                        <img class ="rating" src="{{ asset('front/img/0.png') }}">
                                                      </div>
                                                    @elseif ( $l->rate/40 >= 1 && $l->rate/40 < 2)
                                                      <div class="rating-box">
                                                        <img class ="rating" src="{{ asset('front/img/2.png') }}">
                                                      </div>
                                                    @elseif ( $l->rate/40 >= 2 && $l->rate/40 < 3)
                                                      <div class="rating-box">
                                                        <img class ="rating" src="{{ asset('front/img/2.png') }}">
                                                      </div>
                                                    @elseif ( $l->rate/40 >= 3 && $l->rate/40 < 4)
                                                      <div class="rating-box">
                                                        <img class ="rating" src="{{ asset('front/img/3.png') }}">
                                                      </div>
                                                    @elseif ( $l->rate/40 >= 4 && $l->rate/40 < 5)
                                                      <div class="rating-box">
                                                        <img class ="rating" src="{{ asset('front/img/4.png') }}">
                                                      </div>
                                                    @else
                                                      <div class="rating-box">
                                                        <img class ="rating" src="{{ asset('front/img/5.png') }}">
                                                      </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <article style = "color:black;">
                                                    {!!$l->detail!!}
                                                </article>
                                            </td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane with-bg" id="fwv-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Info Umum</h4>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label" for="pendaftar_name">Nama Lengkap</label>
                                        <input class="form-control" name="pendaftar_name" id="pendaftar_name" data-validate="required" data-message-required="Nama Lengkap harus diisi" placeholder="Nama Anda" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="pendaftar_jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" name="pendaftar_jenis_kelamin" id="pendaftar_jenis_kelamin" data-validate="required" data-message-required="Jenis Kelamin harus diisi">
                                            <option value="">Pilih</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="pendaftar_tempat_lahir">Tempat Lahir</label>
                                        <input class="form-control" name="pendaftar_tempat_lahir" id="pendaftar_tempat_lahir" data-validate="required" data-message-required="Tempat Lahir harus diisi" placeholder="Tempat Lahir" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="pendaftar_tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="pendaftar_tgl_lahir" id="pendaftar_tgl_lahir" data-validate="required" data-message-required="Tanggal Lahir harus diisi" placeholder="Tanggal Lahir" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="pendaftar_email">Email</label>
                                        <input class="form-control" name="pendaftar_email" id="pendaftar_email" data-validate="required,email" data-message-required="Email harus diisi" placeholder="Email" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="pendaftar_no_hp">No Telp</label>
                                        <input class="form-control" name="pendaftar_no_hp" id="pendaftar_no_hp"  data-validate="required,number" data-message-required="No Telp harus diisi" data-validate="number" placeholder="No Telp" />                                        
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="pendaftar_kota_asal">Kota Asal</label>
                                        <input class="form-control" name="pendaftar_kota_asal" id="pendaftar_kota_asal" data-validate="required" data-message-required="Kota Asal harus diisi" placeholder="Kota Asal" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="pendaftar_institusi">Institusi</label>
                                        <input class="form-control" name="pendaftar_institusi" id="pendaftar_institusi" placeholder="Institusi (Isi '-' jika tidak ada" data-validate="required" data-message-required="Institusi harus diisi"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <div class="tab-pane with-bg" id="fwv-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Informasi Tambahan</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Tambah Peserta baru</strong><br><br>
                                    <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                    <div class="input-group control-group after-add-more">
                                        <div class="input-group-btn"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <strong>Info Kursus</strong><br><br>
                                    <div  class="col-md-12">
                                    <div class="form-group">
                                            <label class="control-label" for="pendaftar_tgl_lahir">Tanggal Mulai</label>
                                            <?php if(empty($course_date_start)){?>
                                            <br>
                                            <br>
                                            <p>Silahkan pilih tanggal mulai untuk program anda.</p>
                                            <br>
                                            <select class="form-control" name="course_date_start" id="course_date_start" data-validate="required" data-message-required="Harus memilih tanggal mulai">
                                                <option value="">Pilih</option>
                                                <?php $tanggal = date('d'); $bulan = date('n'); $tahun = date('Y');
                                                    if($tanggal < 10){
                                                        $tanggal_mulai = 10;
                                                        $bulan_mulai = $bulan;
                                                        $tahun_mulai = $tahun;
                                                    } elseif($tanggal >= 10 && $tanggal < 25){
                                                        $tanggal_mulai = 25;
                                                        $bulan_mulai = $bulan;
                                                        $tahun_mulai = $tahun;
                                                    } else{
                                                        $tanggal_mulai = 10;
                                                        $bulan_mulai = $bulan+1;
                                                        $tahun_mulai = $tahun;
                                                        if($bulan_mulai > 12){
                                                            $bulan_mulai = 1;
                                                            $tahun_mulai = $tahun+1;
                                                        }
                                                    }
                                                ?>
                                                <?php for($i = 0; $i < 10; $i++) {?>
                                                <option value="<?php echo "".$tahun_mulai."-".$bulan_mulai."-".$tanggal_mulai; ?>"><?php echo date('j F Y', strtotime("".$tahun_mulai."-".$bulan_mulai."-".$tanggal_mulai)); ?></option>
                                                <?php 
                                                    if($tanggal_mulai == 10){
                                                        $tanggal_mulai = 25;
                                                    } else{
                                                        $tanggal_mulai = 10;
                                                        $bulan_mulai++;
                                                        if($bulan_mulai > 12){
                                                            $bulan_mulai = 1;
                                                            $tahun_mulai = $tahun+1;
                                                        }
                                                    }
                                                ?>
                                                <?php }?>
                                            </select>
                                            <?php } else{?>
                                            <input class="form-control" name="course_date_start" id="course_date_start" placeholder="Tanggal Mulai" value="<?php echo $course_date_start; ?>" disabled/>
                                            <?php } ?>
                                        </div>
                                    </div>
    
                                </div>
                            </div>

                        </div>
                        
                        <div class="tab-pane with-bg" id="fwv-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Penginapan yang Tersedia</h4>
                                </div>
                            </div>

                            <div class="row">
                                <?php foreach ($penginapan as $pg) { ?>
                                    <div class="col-md-6">
                                        <div class="panel panel-color panel-info" style="border: 1px solid #eeee; ">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <input type="radio" class="cbr cbr-primary" name="id_penginapan" id="id_penginapan" data-validate="required" value="<?php echo $pg->id; ?>"> 
                                                    <?php echo $pg->name; ?> (Harga : <?php echo $pg->harga; ?>)
                                                </h3>
                                            </div>    
                                            <div class="panel-body">
                                                <span class="badge badge-info pull-right" id="modal" name="modal">
                                                    <a style="color: white" href="#" 
                                                       onClick="showDetailsPG(<?php echo $pg->ID_PENGINAPAN; ?>)">Details..</a>
                                                </span> 
                                            </div>                      
                                        </div>  
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="tab-pane with-bg" id="fwv-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Konfirmasi Data</h4>
                                </div>
                            </div>                                                     

                            <div class="row">                                
                                <div class="col-md-12">
                                    <strong>Data Diri</strong>
                                </div>
                            </div>                            

                            <div class="row">
                                <div class="col-md-2">
                                    <label>Nama Pendaftar</label>
                                </div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-4">
                                    <p class="pendaftar_name_result" id="pendaftar_name_result" name="pendaftar_name_result"></p>
                                </div>
                            </div>                                
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Jenis Kelamin</label>
                                </div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-4">
                                    <p class="pendaftar_jenis_kelamin_result" id="pendaftar_jenis_kelamin_result" name="pendaftar_jenis_kelamin_result"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Tempat Lahir</label>
                                </div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-4">
                                    <p class="pendaftar_tempat_lahir_result" id="pendaftar_tempat_lahir_result" name="pendaftar_tempat_lahir_result"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Tanggal Lahir</label>
                                </div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-4">
                                    <p class="pendaftar_tgl_lahir_result" id="pendaftar_tgl_lahir_result" name="pendaftar_tgl_lahir_result"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-4">
                                    <p class="pendaftar_email_result" id="pendaftar_email_result" name="pendaftar_email_result"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>No HP</label>
                                </div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-4">
                                    <p class="pendaftar_no_hp_result" id="pendaftar_no_hp_result" name="pendaftar_no_hp_result"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Kota Asal</label>
                                </div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-4">
                                    <p class="pendaftar_kota_asal_result" id="pendaftar_kota_asal_result" name="pendaftar_kota_asal_result"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Institusi</label>
                                </div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-4">
                                    <p class="pendaftar_institusi_result" id="pendaftar_institusi_result" name="pendaftar_institusi_result"></p>
                                </div>
                            </div><br/>                            
                            <div class="row" align="center">
                                <div class="col-md-12">
                                    <h4><b>Mohon kembali melakukan pengecekan data personal anda.</b></h4>
                                </div>
                            </div><br/>
                            <div class="row" align="center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="checkbox" class="cbr" name="chk-rules" id="chk-rules" data-validate="required" data-message-message="You must accept rules in order to complete this registration.">
                                        <label for="chk-rules">Dengan ini, saya mengonfirmasikan data yang saya masukkan adalah valid.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" align="center">
                                        <button type='submit' class='btn btn-secondary' >Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Tabs Pager -->
                        <ul class="pager wizard">
                            <li class="previous">
                                <a href="#"><i class="entypo-left-open"></i> Previous</a>
                            </li>

                            <li class="next">
                                <a href="#">Next <i class="entypo-right-open"></i></a>
                            </li>
                        </ul>

                    </div>

                </form>

                <!-- Copy Fields -->

                <div class="copy hide">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input class="col-md-3" name="addmore[]" class="form-control" placeholder="Nama" style="height: 32px;" required="required">
                        <p class="col-md-1"></p>
                        <input class="col-md-3" name="addmore[]" class="form-control" placeholder="Alamat" style="height: 32px;" required="required">
                        <p class="col-md-1"></p>
                        <input class="col-md-3" name="addmore[]" class="form-control" placeholder="Telepon" style="height: 32px;" required="required">
                        <div class="input-group-btn"> 
                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@section('custom-script')
<script type="text/javascript">
    $(document).ready(function () {
        $(".add-more").click(function () {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        $("body").on("click", ".remove", function () {
            $(this).parents(".control-group").remove();
        });

    });
</script>

<script>
    $("[id='id_program']")
            .change(function () {
                if(this.checked){
                    var value = $(this).val();
                    var checked = $("#id_program:checked");
                    var programs = {!! json_encode($program->toArray()) !!};
                    var tipe = "";
                    var indikator = 0;
                    for(i = 0; i < programs.length; i++){
                        if(programs[i].id == value){
                            tipe = programs[i].tipe;
                        }
                    }
                    if(tipe == "single"){
                        if(checked.length > 1){
                            $(this).removeAttr("checked");
                            window.alert("Kamu tidak bisa memilih 2 program dengan durasi 1 bulan atau lebih");
                        }
                    } else{
                        if(checked.length > 1){
                            var count = 0;
                            for(i = 0; i < checked.length; i++){
                                var nilai = $(checked[i]).val();
                                for(j = 0; j < programs.length; j++){
                                    if(programs[j].id == nilai && programs[j].tipe == "single"){
                                        count++;
                                    }
                                }
                            }
                            if(count > 0){
                                $(this).removeAttr("checked");
                                window.alert("Kamu tidak bisa memilih 2 program dengan durasi 1 bulan atau lebih");
                            }
                        }
                    }
                }
            });
    $("[id='pendaftar_name']")
            .change(function () {
                var value = $(this).val();
                $("[id='pendaftar_name_result']").text(value);
            })
            .change();
    $("[id='pendaftar_jenis_kelamin']")
            .change(function () {
                var value = $(this).val();
                $("[id='pendaftar_jenis_kelamin_result']").text(value);
            })
            .change();
    $("[id='pendaftar_tempat_lahir']")
            .change(function () {
                var value = $(this).val();
                $("[id='pendaftar_tempat_lahir_result']").text(value);
            })
            .change();
    $("[id='pendaftar_tgl_lahir']")
            .change(function () {
                var value = $(this).val();
                $("[id='pendaftar_tgl_lahir_result']").text(value);
            })
            .change();
    $("[id='pendaftar_email']")
            .change(function () {
                var value = $(this).val();
                $("[id='pendaftar_email_result']").text(value);
            })
            .change();
    $("[id='pendaftar_no_hp']")
            .change(function () {
                var value = $(this).val();
                $("[id='pendaftar_no_hp_result']").text(value);
            })
            .change();
    $("[id='pendaftar_kota_asal']")
            .change(function () {
                var value = $(this).val();
                $("[id='pendaftar_kota_asal_result']").text(value);
            })
            .change();
    $("[id='pendaftar_institusi']")
            .change(function () {
                var value = $(this).val();
                $("[id='pendaftar_institusi_result']").text(value);
            })
            .change();
</script>
@endsection