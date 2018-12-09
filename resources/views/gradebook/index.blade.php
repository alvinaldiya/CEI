@extends('layouts.admin.layout2')

@section('content')
<div id="page-content" class="page-content tab-content overflow-y">

    <div class="page-header">
        <h3><i class="aweso-icon-list-alt opaci35"></i> Gradebook </h3>
    </div>
    <div class="row-fluid">
      <div class="span4 grider">
          <div class="widget widget-simple widget-notes">
              <div class="widget-header">
                  <h4><i class="fontello-icon-edit"></i> Cari Data Peserta </h4>
              </div>
              <div class="widget-content">
                  <div class="widget-body">
                      <form id="formCariPeserta" class="form">
                          <fieldset>
                              <label for="gradebook_cari_peserta" class="control-label">Acara / Kegiatan</label>
                              <select id="gradebook_cari_peserta" name='gradebook[cari_peserta]' class="input-block-level">
                                  @foreach ($list_kegiatan as $row)
                                      <option value="{{$row->id}}">{{$row->alias}}</option>
                                  @endforeach
                              </select>
                          </fieldset>
                          <!-- // fieldset Input -->
                          <div class="clearfix"></div>

                      </form>
                          <button id="btnCariPeserta" class="btn btn-yellow btn-block">Cari</button>
                  </div>
              </div>
          </div>
          <!-- // Widget -->
      </div>
      <!-- // Column -->
      <div class="span8 grider">
          <div class="widget widget-simple">
              <div class="widget-header">
                  <h4><i class="fontello-icon-edit"></i> Input Gradebook Peserta&nbsp;&nbsp;</h4><h4 id='alias'> </h4>
                  <button type="button" id="btnReset" class="btn btn-green pull-right"><i class="fontello-icon-arrows-cw"></i> Reset</button>
                  <button type="button" style="display: none" id="btnInputNoUrut" class="btn btn-green pull-right"><i class="fontello-icon-list-add"></i> Input No Sertifikat</button>
              </div>
              <div class="widget-content">
                  <div class="widget-body">
                    <table class="table table-bordered" id="table-list-peserta">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>ID</th>
                          <th>NIM</th>
                          <th>NAMA</th>
                          <th>NILAI</th>
                          <th>GRADE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- /*@if (count($dataPeserta) > 0)
                          @foreach ($dataPeserta as $data)
                            <tr class="table-row">
                              <td>{{$data->rownum}}</td>
                              <td>{{$data->id}}</td>
                              <td>{{$data->nim}}</td>
                              <td>{{$data->nama}}</td>
                              <td contenteditable="true">{{$data->nilai}}</td>
                              <td>{{$data->grade}}</td>
                            </tr>
                          @endforeach
                        @else*/ -->
                          <tr>
                            <td colspan="6" style="background:#FDFDFD;text-align:center;">No Data Available</td>
                          </tr>
                        <!-- // @endif -->
                    </tbody>
                    </table>
                  </div>
              </div>
          </div>
          <!-- // Widget -->
      </div>
      <!-- // Column -->
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

    $("#btnCariPeserta").click(function(){

        var formdata = $("#formCariPeserta").serialize();

        $.ajax({
            type: "POST",
            //url: base_url()+'/peserta/getListPesertaByKegiatan',
            url: '{{ url("peserta/getListPesertaByKegiatan") }}',
            data: formdata,
            success: function( res ) {
                if(res.code == 200 ){

                    console.log(res);

                    $("#btnInputNoUrut").css("display", "block");

                    $('#table-list-peserta tr:not(:first)').remove();

                    var data = res.data;

                    $('#alias').html(data[0]['alias']);

                    for (var i = 0; i < data.length; i++) {

                        var nim   = (data[i]['nim'] ==  null) ? '-' : data[i]['nim'];
                        var grade = (data[i]['grade'] ==  null) ? '-' : data[i]['grade'];
                        var rid   = data[i]['id'];

                        $('#table-list-peserta').append("<tr><td>"+(i+1)+"</td><td>"+rid+"</td><td>"+nim+"</td><td>"+data[i]['nama']+"</td><td contenteditable='true' onBlur=\"saveToDatabase(this,'nilai', \'"+rid+"\')\" onClick='showEdit(this);'>"+data[i]['nilai']+"</td><td id='grade"+rid+"'>"+grade+"</td></tr>");
                    }
                }else{
                        $("#btnInputNoUrut").css("display", "none");
                        $('#table-list-peserta tr:not(:first)').remove();
                        $('#table-list-peserta').append("<tr><td colspan='6' style='background:#FDFDFD;text-align:center;'>No Data Available</td></tr>");
                }
            }
        });
    });

    $("#btnInputNoUrut").click(function(){

        var formdata = $("#formCariPeserta").serialize();

        $.ajax({
            type: "POST",
            //url: base_url()+'/peserta/getListPesertaByKegiatan',
            url: '{{ url("sertifikat/inputNoSertifikat") }}',
            data: formdata,
            success: function( res ) {
                if(res.code==200){
                    swal("Berhasil", res.message+" "+res.data.jumlah  +" data.", "success");
                }else{
                    swal("Peringatan", res.message, "error");
                }
            }
        });
    });

    $("#btnReset").click(function(){
        init();
        $('#table-list-peserta tr:not(:first)').remove();
        $('#table-list-peserta').append("<tr><td colspan='6' style='background:#FDFDFD;text-align:center;'>No Data Available</td></tr>");
        $('#alias').html('');
        $("#btnInputNoUrut").css("display", "none");
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

function saveToDatabase(editableObj,column,id){
  console.log(editableObj+' '+ column +' '+ id);

  var formdata = {
    value  : editableObj.innerHTML,
    column : column,
    id     : id
  }

  $.ajax({
      type: "POST",
      //url: base_url()+"/gradebook/updateGradebook",
      url : '{{ url("gradebook/updateGradebook") }}', 
      data:formdata,
      success: function (res) {
          if(res.code == 200 ){
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
  $("#gradebook_cari_peserta").select2({
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
