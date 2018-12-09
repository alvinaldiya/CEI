@extends('layouts.admin.layout2')

@section('content')
<div class="row-fluid page-head">
                <h2 class="page-title"><i class="aweso-icon-list-alt"></i> Sertifikat</h2>
                <p class="pagedesc">Cetak Sertifikat Peserta REC </p>
                <div class="page-bar">
                    <div class="btn-toolbar">
                        <ul class="nav nav-tabs pull-right">
                            <li class="active" id="user-tab"> <a href="#cetakSertifikat" data-toggle="tab">Cetak Sertifikat</a> </li>
                            <li id="articles-tab"> <a href="#masterSertifikat" data-toggle="tab">Master Sertifikat</a> </li>
                            <!--<li id="wizard-tab"> <a href="#TabTop3" data-toggle="tab">Wizard</a> </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- // page head -->

            <div id="page-content" class="page-content tab-content overflow-y">
                <div id="cetakSertifikat" class="tab-pane padding-bottom30 active fade in">

                    <div class="row-fluid">
                      <!-- // Column -->
                      <div class="span12 grider">
                          <div class="widget widget-simple">
                              <div class="widget-header">
                                  <h4><i class="fontello-icon-article-alt-1"></i> Cetak Sertifikat</h4><h4 id='alias'> </h4>
                              </div>
                              <div class="widget-content">
                                  <div class="widget-body">
                                    <fieldset>
                                        <label for="sertifikat_acara" class="control-label">Acara / Kegiatan</label>
                                        <select id="sertifikat_acara" name='sertifikat[acara]' class="input-block-level span4">
                                            <option></option>
                                            @foreach ($list_kegiatan as $row)
                                                <option value="{{$row->id}}">{{$row->alias}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <table class="table table-striped table-hover" id="table-sertifikat">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nim</th>
                                                <th>Alias</th>
                                                <th>Judul Acara</th>
                                                <th>Nama</th>
                                                <th>Asal Kampus</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                  </div>
                              </div>
                          </div>
                          <!-- // Widget -->
                      </div>
                      <!-- // Column -->

                    </div>
                    <!-- // Example row -->
                </div>
                <!-- // Example TAB 1 -->

                <div id="masterSertifikat" class="tab-pane fade padding-bottom30">
                    <div class="row-fluid">
                        <div class="span6 grider">
                            <div class="widget well well-nice">
                                <div class="widget-header">
                                    <h4><i class="fontello-icon-edit"></i> Tambah Blanko <small> (Buat Blanko Baru)</small></h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <form id="formBlanko" role="form" method="POST" class="span12 form-horizontal" enctype="multipart/form-data">
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <fieldset>
                                                        <ul class="form-list list-bordered dotted">
                                                            <li class="control-group">
                                                                <label for="nama_blanko" class="control-label">Nama Blanko</label>
                                                                <div class="controls">
                                                                    <input id="nama_blanko" class="input-block-level" type="text" value="" name="nama_blanko">
                                                                </div>
                                                            </li>
                                                            <li class="control-group">
                                                                <label for="nama_file" class="control-label">File</label>
                                                                <div class="controls">
                                                                    <input id="file" class="input-block-level" type="file" value="" name="file">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->

                                                            <!-- <li class="control-group">
                                                                <label for="jenis_blanko" class="control-label">Jenis Blanko</label>
                                                                <div class="controls">
                                                                    <select id="jenis_blanko" class="selectpicker input-medium" data-style="btn-info" name="jenis_blanko">
                                                                        <option value="1">Depan Saja</option>
                                                                        <option value="2">Depan Belakang</option>
                                                                    </select>
                                                                </div>
                                                            </li> -->
                                                            <!-- // form item -->
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input -->
                                                    <div class="form-actions">
                                                        <button id="btn-simpan-blanko" type="submit" class="btn btn-blue">Simpan</button>
                                                        <button id="btn-reset-blanko"  class="btn">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget -->

                        </div>
                        <!-- // Column -->

                        <div class="span6 grider">
                            <div class="widget widget-simple">
                                <div class="widget-header">
                                    <h4><i class="fontello-icon-article-alt-1"></i> Data Blanko
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                    <table class="table table-striped table-hover" id="table-master-sertifikat">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Blanko</th>
                                                <th>Nama Fiile</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget -->
                        </div>
                        <!-- // Column -->

                    </div>
                    <!-- // Example row -->
                </div>

            </div>
@endsection

@section('scripts')
<script type="text/javascript">
//INIT FORM
init();

$(function(){

  var id = '';

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });

  //TABLE DATA TRANSACTION SERTIFIKAT
  var table_sertifikat = $("#table-sertifikat").DataTable({
      processing: true,
      serverSide: true,
      ajax: {
            url: '{{ url("sertifikat/getSertifikatDatatables") }}',
            data: function (d) {
                d.id_kegiatan = $('#sertifikat_acara').val();
            }
        },
      columns: [
          //{ data: 'rownum', name: 'rownum' },
          { data: 'id', name: 'id' },
          { data: 'nim', name: 'nim' },
          { data: 'alias', name: 'alias'},
          { data: 'judul_acara', name: 'judul_acara'},
          { data: 'nama', name: 'nama' },
          { data: 'asal_kampus', name: 'asal_kampus'},
          { data: 'action', name: 'action'}
      ],
      //"scrollX": true,
  });

  //on dblclick table master acara
  $('#table-sertifikat tbody').on( 'dblclick', 'tr', function () {
      clear();
      var hasil = table_sertifikat.row(this).data();
      id = hasil['id'];
      $("#modal_peserta_asal_kampus").prop('readonly', false);

      $.ajax({
          type: "GET",
          url: base_url()+"/peserta/getDetailPeserta/"+hasil['id'],
          success: function (res) {

              if(res.code == 200 ){
                  console.log(res.data);
                  if(res.data[0]['asal_kampus'] ==  'PERGURUAN TINGGI RAHARJA'){
                    $("#modal_peserta_asal_kampus").prop('readonly', true);
                  }

                  $("#modalPeserta").modal();
                  $("#headModalPeserta").html("Edit Data Peserta");
                  $("#modal_peserta_nama").val(res.data[0]['nama']);
                  $("#modal_peserta_asal_kampus").val(res.data[0]['asal_kampus']);
              }
            },
          dataType: 'JSON'
      });

  } );
  //END TABLE DATA TRANSACTION SERTIFIKAT

  //TABLE DATA MASTER SERTIFIKAT
  var table_master_blanko = $("#table-master-sertifikat").DataTable({
      processing: true,
      serverSide: true,
      ajax: {
            url: '{{ url("sertifikat/getMasterSertifikatDatatables") }}',
            type: "POST"
        },
      columns: [
          //{ data: 'rownum', name: 'rownum' },
          { data: 'id', name: 'id' },
          { data: 'nama_blanko', name: 'nama_blanko' },
          { data: 'nama_file', name: 'nama_file'},
          { data: 'action', name: 'action'}
      ]
  });
  //END TABLE DATA MASTER SERTIFIKAT

  $('#checkbox_pr').change(
    function(){
        if (this.checked) {
            clear();
            $("#peserta_nim").prop('readonly', true);
            $("#peserta_nama").prop('readonly', false);
            $("#peserta_asal_kampus").prop('readonly', false);
        }else{
            clear();
            $("#peserta_nama").prop('readonly', true);
            $("#peserta_nim").prop('readonly', false);
            $("#peserta_asal_kampus").prop('readonly', true);
            $("#peserta_asal_kampus").val('PERGURUAN TINGGI RAHARJA');
        }
    });

    $("#peserta_nim").keypress(function(e){
        if(e.keyCode == 13){
          var nim = $('#peserta_nim').val();

          $.ajax({
              type: "GET",
              url: base_url()+"/master/getDataMhs/"+nim,
              success: function (res) {
                  var data = res.data[0];
                  if(res.code == 200 ){
                    var nama_mhs = data['NamaDepan']+' '+data['NamaBelakang'];
                    $('#peserta_nama').val(nama_mhs);
                  }else{
                    swal("Gagal", res.message, "error");
                  }

                },
              dataType: 'JSON'
          });
        }
    });

    $("#formPeserta").validate({
        rules: {
            "peserta[nim]": {
                 required: function(){
                       return $('#checkbox_pr').prop('checked') !=  true;
                 }
            },
            "peserta[nama]": {
                 required: function(){
                       return true;
                 }
            },
            "peserta[asal_kampus]": {
                 required: function(){
                       return $('#checkbox_pr').prop('checked') ==  true;
                 }
            }
        },
        messages: {
            "peserta[nim]" : {
                required: "Field harus diisi.",
            },
            "peserta[nama]" : {
                required: "Field harus diisi.",
            },
            "peserta[asal_kampus]" : {
                required: "Field harus diisi.",
            }
        }
    });
    $("#formModalPeserta").validate({
        rules: {
            "formModalPeserta[modal_peserta_nama]": {
                  required: function(){
                        return true;
                  }
            },
            "formModalPeserta[modal_peserta_asal_kampus]": {
                  required: function(){
                       return true;
                  }
            }
        },
        messages: {
            "formModalPeserta[modal_peserta_nama]": {
                required: "Field harus diisi.",
            },
            "formModalPeserta[modal_peserta_asal_kampus]": {
                required: "Field harus diisi.",
            }
        }
    });

    $("#btnTambahPeserta").click(function(){
      var valid = $("#formPeserta").valid();

      if(valid == true){
          var formdata = $("#formPeserta").serialize();

          $.ajax({
              type: "POST",
              url: base_url()+'/peserta/tambahPeserta',
              data: formdata,
              success: function( res ) {
                  if(res.code == 200 ){
                      swal("Berhasil", res.message, "success");
                      table_sertifikat.ajax.reload();
                  }else{
                      swal("Gagal", res.message, "error");
                  }

                  clear();
                  init();
              }
          });
      }
    });

    $("#btnUpdatePeserta").click(function(){
      var valid = $("#formModalPeserta").valid();

      if(valid == true){
          var formdata = $("#formModalPeserta").serialize();

          console.log(formdata);

          $.ajax({
              type: "POST",
              url: base_url()+'/peserta/updatePeserta/'+id,
              data: formdata,
              success: function( res ) {
                  if(res.code == 200 ){
                      $("#modalPeserta").modal('toggle');
                      swal("Berhasil", res.message, "success");
                      table_sertifikat.ajax.reload();
                  }else{
                      $("#modalPeserta").modal('toggle');
                      swal("Gagal", res.message, "error");
                  }

                  clear();
                  init();
              }
          });
      }
    });

    $("#sertifikat_acara").live('change', function(){
      table_sertifikat.ajax.reload();
    });

    $("#btnReset").click(function(){
        init();
        $('#table-list-peserta tr:not(:first)').remove();
        $('#table-list-peserta').append("<tr><td colspan='6' style='background:#FDFDFD;text-align:center;'>No Data Available</td></tr>");
        $('#alias').html('');
    });

    $("#btn-simpan-blanko").click(function(e){

      e.preventDefault();

      $.ajax({
          type: "POST",
          url: '{{ url("sertifikat/tambahBlanko") }}',
          data:new FormData($("#formBlanko")[0]),
          success: function( res ) {
            console.log(res);
            if(res.code == 200){
                $('#nama_blanko').val("");
                $('#file').val("");

                swal("Berhasil.", "Blanko Berhasil ditambahkan.", "success");
                $("#table-master-sertifikat").DataTable().ajax.reload();
            }else{
                swal("Gagal.", "Blanko gagal dibuat.", "success");
            }
          },
          cache: false,
          async:false,
          processData: false,
          contentType: false,
          dataType : 'JSON'
      });

    });

    $("#btn-reset-blanko").click(function(e){

      e.preventDefault();
      $('#formBlanko')[0].reset();

    });

});

function hapusMasterBlanko(id){

swal({
        title: "Peringatan!",
        text: "Anda yakin akan menghapus data master blanko?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: "GET",
                url: base_url()+'/sertifikat/blanko/delete/'+ id,
                success: function( res ) {

                    if(res.code == 200 ){
                        swal("Berhasil", res.message, "success");
                        $("#table-master-sertifikat").DataTable().ajax.reload();
                    }else{
                        swal("Gagal", res.message, "error");
                    }

                    clear();
                    init();
                }
            });
        } else {
            swal("Cancelled", "Batal dihapus.", "error");
        }
    }
);
}

function hapusPeserta(id){
  swal({
          title: "Peringatan!",
          text: "Anda yakin akan menghapus data ini?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes!",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
      },
      function(isConfirm) {
          if (isConfirm) {
              $.ajax({
                  type: "POST",
                  url: base_url()+'/peserta/hapusPeserta/'+ id,
                  success: function( res ) {

                      if(res.code == 200 ){
                          swal("Berhasil", res.message, "success");
                          $("#table-sertifikat").DataTable().ajax.reload();
                      }else{
                          swal("Gagal", res.message, "error");
                      }

                      clear();
                      init();
                  }
              });
          } else {
              swal("Cancelled", "Batal dihapus.", "error");
          }
      }
  );
}

function saveToDatabase(editableObj,column,id){
  console.log(editableObj+' '+ column +' '+ id);

  var formdata = {
    value  : editableObj.innerHTML,
    column : column,
    id     : id
  }

  $.ajax({
      type: "POST",
      url: base_url()+"/gradebook/updateGradebook",
      data:formdata,
      success: function (res) {

          if(res.code == 200 ){
              console.log(res.data);

              $('#grade'+formdata.id).html(res.data.grade);
          }
        },
      dataType: 'JSON'
  });

}

function showEdit(editableObj) {
}

function init(){

  $("#peserta_nama").prop('readonly', true);
  $("#peserta_asal_kampus").prop('readonly', true);
  $("#peserta_nim").prop('readonly', false);

  $("#peserta_nim").val("");
  $("#peserta_nama").val("");
  $("#peserta_asal_kampus").val("PERGURUAN TINGGI RAHARJA");

  $('#checkbox_pr').attr('checked', false);

  //INIT SELECT2
  $("#sertifikat_acara").select2({
      placeholder : "-- Pilih Sebuah Option --",
      allowClear  : true
  });
}

function clear(){
  $("#peserta_nim").val("");
  $("#peserta_nama").val("");
  $("#peserta_asal_kampus").val("");
  $("#formPeserta").validate().resetForm();
  $("#formModalPeserta").validate().resetForm();
}

</script>
@endsection
