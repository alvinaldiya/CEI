@extends('layouts.admin.layout2')

@section('content')
<div id="page-content" class="page-content tab-content overflow-y">

    <div class="page-header">
        <h3><i class="aweso-icon-list-alt opaci35"></i> Daftar Peserta </h3>
    </div>
    <div class="row-fluid">
        <div class="span4 grider">
            <div class="widget widget-simple widget-notes">
                <div class="widget-header">
                    <h4><i class="fontello-icon-edit"></i> Tambah Peserta</h4>
                    <button type="button" id="btnReset" class="btn btn-green pull-right"><i class="fontello-icon-arrows-cw"></i> Reset</button>
                </div>
                <div class="widget-content">
                    <div class="widget-body">
                        <form id="formPeserta" class="form">
                            <div class="controls">
                                <input id="checkbox_pr" class="checkbox" type="checkbox" value="1" name="peserta[pr]">
                                <label for="disableGroup_change" class="checkbox">Bukan Pribadi Raharja</label>
                            </div>
                            <fieldset>
                                <label for="peserta_nim" class="control-label">NIM</label>
                                <input id="peserta_nim" class="input-block-level" type="text" name="peserta[nim]">
                                <label for="peserta_nama" class="control-label">Nama</label>
                                <input id="peserta_nama" class="input-block-level" type="text" name="peserta[nama]">
                                <label for="peserta_asal_kampus" class="control-label">Asal Kampus</label>
                                <input id="peserta_asal_kampus" class="input-block-level" type="text" name="peserta[asal_kampus]">
                                <label for="peserta_list_kegiatan" class="control-label">Acara / Kegiatan</label>
                                <select id="peserta_list_kegiatan" name='peserta[list_kegiatan]' class="input-block-level">
                                    @foreach ($list_kegiatan as $row)
                                        <option value="{{$row->id}}">{{$row->alias}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <!-- // fieldset Input -->
                            <div class="clearfix"></div>

                        </form>
                            <button id="btnTambahPeserta" class="btn btn-yellow btn-block">Simpan</button>
                    </div>
                </div>
            </div>
            <!-- // Widget -->
        </div>
        <!-- // Column -->
        <div class="span8 grider">
            <div class="widget widget-simple">
                <div class="widget-header">
                    <h4><i class="fontello-icon-th-list-4"></i> List Peserta Kegiatan REC</h4>
                </div>
                <!-- // widget header -->
                <div class="widget-content">
                    <div class="widget-body">
                        <table class="table table-striped table-hover" id="table-peserta">
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
                <!-- // widget content -->
            </div>
            <!-- // Widget -->
        </div>
        <!-- // Column -->
    </div>

</div>

<!-- MODAL TRANSACTION KEGIATAN -->
<div id="modalPeserta" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fontello-icon-cancel-1"></i></button>
        <h4 id="headModalPeserta"></h4>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <form id="formModalPeserta">
                <div class="span6">
                    <ul class="form-list label-left list-bordered dotted">
                        <li class="control-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <input id="modal_peserta_nama" name='formModalPeserta[modal_peserta_nama]' type="text" class="input-block-level autocomplete-suggestions span11">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="span6">
                    <ul class="form-list label-left list-bordered dotted">
                        <li class="control-group">
                            <label class="control-label">Asal Kampus</label>
                            <div class="controls">
                                <input id="modal_peserta_asal_kampus" name='formModalPeserta[modal_peserta_asal_kampus]' type="text" class="input-block-level autocomplete-suggestions span11">
                            </div>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-boo">Close</button>
        <button type="button" id="btnUpdatePeserta" class="btn btn-green">Update</button>
    </div>
</div>
<!-- END MODAL TRANSACTION KEGIATAN -->

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

  var table_peserta = $("#table-peserta").DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ url("peserta/getPesertaDatatables") }}',
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
      "scrollX": true,
  });

  //on dblclick table master acara
  $('#table-peserta tbody').on( 'dblclick', 'tr', function () {
      clear();
      var hasil = table_peserta.row(this).data();
      id = hasil['id'];
      $("#modal_peserta_asal_kampus").prop('readonly', false);

      $.ajax({
          type: "GET",
          url: base_url()+"/peserta/getDetailPeserta/"+hasil['id'],
          success: function (res) {

              if(res.code == 200 ){
                
                  console.log(res.data);

                  if(res.data['asal_kampus'] ==  'PERGURUAN TINGGI RAHARJA'){
                    $("#modal_peserta_asal_kampus").prop('readonly', true);
                  }

                  $("#modalPeserta").modal();
                  $("#headModalPeserta").html("Edit Data Peserta");
                  $("#modal_peserta_nama").val(res.data['nama']);
                  $("#modal_peserta_asal_kampus").val(res.data['asal_kampus']);
              }
            },
          dataType: 'JSON'
      });

  } );

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
                      table_peserta.ajax.reload();
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
                      table_peserta.ajax.reload();
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

    $("#btnReset").click(function(){
        $("#formPeserta").validate().resetForm();
        $("#formModalPeserta").validate().resetForm();
        init();
    });
});

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
                          $("#table-peserta").DataTable().ajax.reload();
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

function init(){

  $("#peserta_nama").prop('readonly', true);
  $("#peserta_asal_kampus").prop('readonly', true);
  $("#peserta_nim").prop('readonly', false);

  $("#peserta_nim").val("");
  $("#peserta_nama").val("");
  $("#peserta_asal_kampus").val("PERGURUAN TINGGI RAHARJA");

  $('#checkbox_pr').attr('checked', false);

  //INIT SELECT2
  $("#peserta_list_kegiatan").select2({
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
