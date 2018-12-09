@extends('layouts.admin.layout2')

@section('content')
<div class="row-fluid page-head">
    <h2 class="page-title"><i class="fontello-icon-monitor"></i> Jadwal <small>REC</small></h2>
    <p class="pagedesc">Daftar Acara yang diselenggarakan REC : </p>
    <div class="page-bar">
        <div class="btn-toolbar"> </div>
    </div>
</div>
<!-- // page head -->

<div id="page-content" class="page-content">
    <section>
        <div class="row-fluid margin-top20">
            <div class="span4">
                <div class="widget widget-simple">
                    <div class="widget-header">
                        <h4><i class="fontello-icon-th-list-4"></i> List Master Acara</h4>
                        <button type="button" id="btnTambahMasterAcara" class="btn btn-green pull-right"><i class="fontello-icon-list-add"></i>Tambah</button>
                    </div>
                    <!-- // widget header -->
                    <div class="widget-content">
                        <div class="widget-body">
                            <table class="table table-striped table-hover" id="table-master-acara">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id</th>
                                        <th>Judul Acara</th>
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

            <div class="span8">
                <div class="widget widget-simple">
                    <div class="widget-header">
                        <h4><i class="fontello-icon-th-list-4"></i> List Daftar Kegiatan REC</h4>
                        <a class="btn btn-success pull-right" id="btnTambahKegiatan"><i class="fontello-icon-list-add"></i> Tambah</a>
                    </div>
                    <!-- // widget header -->
                    <div class="widget-content">
                        <div class="widget-body">
                            <table class="table table-striped table-hover" id="table-kegiatan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id</th>
                                        <th>Judul Acara</th>
                                        <th>Alias</th>
                                        <th>Peserta</th>
                                        <th>Semester</th>
                                        <th>TA</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Lokasi</th>
                                        <th>Jenis Kegiatan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- // widget content -->
                </div>
                <!-- // Widget -->
            </div>
        </div>

    </section>
</div>
<!-- // page content -->
<!-- responsive MODAL MASTER ACARA -->
<div id="modalMasterAcara" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fontello-icon-cancel-1"></i></button>
        <h4 id="headerMasterAcara"></h4>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span12">
                <form id="formMasterAcara" method="post">
                    <h4>Judul Acara</h4>
                        <p>
                            <input type="text" id="judul_acara" name='formMasterAcara[judul_acara]' class="input-block-level autocomplete-suggestions"/>
                        </p>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-boo">Close</button>
        <button type="button" id="btnSimpanMasterAcara" class="btn btn-green">Save</button>
        <button type="button" id="btnUpdateMasterAcara" class="btn btn-green">Update</button>
    </div>
</div>
<!-- end responsive MODAL MASTER ACARA-->

<!-- MODAL TRANSACTION KEGIATAN -->
<div id="modalKegiatan" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fontello-icon-cancel-1"></i></button>
        <h4 id="headModalTambahKegiatan"></h4>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <form id="formListKegiatan">
                <div class="span6">
                    <ul class="form-list label-left list-bordered dotted">
                        <li class="control-group">
                            <label class="control-label">Judul Acara</label>
                            <div class="controls">
                                <select id="kegiatan_judul_acara" name='formListKegiatan[kegiatan_judul_acara]' class="span11" data-style="btn-boo">
                                    @foreach ($kegiatan_judul_acara as $row)
                                        <option value="{{$row->id}}">{{$row->judul_acara}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Jam Mulai</label>
                            <div class="controls">
                                <input id="kegiatan_jam_mulai" maxlength="5" placeholder="HH:mm" class="span11" type="text" name='formListKegiatan[kegiatan_jam_mulai]'>
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Alias</label>
                            <div class="controls">
                                <input id="kegiatan_alias" name='formListKegiatan[kegiatan_alias]' type="text" class="input-block-level autocomplete-suggestions span11">
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Semester</label>
                            <div class="controls">
                                <select id="kegiatan_semester" name='formListKegiatan[kegiatan_semester]' class="selectpicker span6" data-style="btn-boo">
                                    <option value="1">Ganjil</option>
                                    <option value="2">Genap</option>
                                </select>
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Jenis Kegiatan</label>
                            <div class="controls">
                                <select id="kegiatan_jns_kegiatan" name='formListKegiatan[kegiatan_jns_kegiatan]' class="span11" data-style="btn-boo">
                                    @foreach ($kegiatan_list_jns_kegiatan as $row)
                                        <option value="{{$row->id}}">{{$row->jns_kegiatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Blanko</label>
                            <div class="controls">
                                <div class="pull-left span10">
                                    <select id="kegiatan_list_blanko" name='formListKegiatan[kegiatan_list_blanko]' class="span10" data-style="btn-boo">
                                        @foreach ($kegiatan_list_blanko as $row)
                                            <option value="{{$row->id}}">{{$row->nama_blanko}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pull-left">
                                    <a class="btn btn-small btn-glyph" id="previewBlanko" onclick="previewBlanko()"><i class="fontello-icon-eye" title="preview"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="span6">
                    <ul class="form-list label-left list-bordered dotted">
                        <li class="control-group">
                            <label class="control-label">Tanggal</label>
                            <div class="controls">
                                <input class="form-control" id="kegiatan_date" name='formListKegiatan[kegiatan_tanggal]' name="date" placeholder="MM/DD/YYY" type="text"/>
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Jam Akhir</label>
                            <div class="controls">
                                <input id="kegiatan_jam_akhir" name='formListKegiatan[kegiatan_jam_akhir]' placeholder="HH:mm" maxlength="5" class="span11" type="text">
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Moderator</label>
                            <div class="controls">
                                <input id="kegiatan_moderator" name='formListKegiatan[kegiatan_moderator]' type="text" class="input-block-level autocomplete-suggestions span11">
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Tahun Ajaran</label>
                            <div class="controls">
                                <input id="kegiatan_ta" name='formListKegiatan[kegiatan_ta]' class="span11" type="text">
                            </div>
                        </li>
                        <li class="control-group">
                            <label class="control-label">Lokasi</label>
                            <div class="controls">
                                <input id="kegiatan_lokasi" name='formListKegiatan[kegiatan_lokasi]' class="span11" type="text">
                            </div>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-boo">Close</button>
        <button type="button" id="btnSimpanKegiatan" class="btn btn-green">Save changes</button>
        <button type="button" id="btnUpdateKegiatan" class="btn btn-green">Update</button>
    </div>
</div>
<!-- END MODAL TRANSACTION KEGIATAN -->

<!-- responsive MODAL LIST Peserta -->
<div id="modalListPeserta" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fontello-icon-cancel-1"></i></button>
        <h4 id="headListPeserta"></h4> -->
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span12">
                <div class="well well-box well-black">
                    <table id="listPeserta" class="table boo-table table-condensed table-content table-hover">

                        <caption>
                        Daftar Peserta <span id='judul_acara_lp'></span>
                        <button type="button" id="btnAbsensi" class="btn-small pull-right"><i class="fontello-icon-list-4"></i>Absensi</button>
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-boo">Close</button>
    </div>
</div>
<!-- end responsive MODAL LIST Peserta-->

@endsection

@section('scripts')
<script type="text/javascript">
    //INIT FORM
    init();

    $(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $('#judul_acara').devbridgeAutocomplete({
            serviceUrl: '{{ url("acara/getMasterAcaraAutoComplete") }}',
            showNoSuggestionNotice: true,
            noSuggestionNotice: "No results matched",
        });

        $('#kegiatan_alias').devbridgeAutocomplete({
            serviceUrl: '{{ url("kegiatan/getKegiatanAliasAutoComplete") }}',
            showNoSuggestionNotice: true,
            noSuggestionNotice: "No results matched",
        });

        $('#kegiatan_moderator').devbridgeAutocomplete({
            serviceUrl: '{{ url("master/getDataDosen") }}',
            showNoSuggestionNotice: true,
            noSuggestionNotice: "No results matched",
        });

        $("#formMasterAcara").validate({
            rules: {
                "formMasterAcara[judul_acara]": "required"
            },
            messages: {
                "formMasterAcara[judul_acara]": "Field tidak boleh kosong."
            }
        });

        $("#formListKegiatan").validate({
            rules: {
                "formListKegiatan[kegiatan_jam_mulai]": {
                  required: true,
                  minlength: 5
                },
                "formListKegiatan[kegiatan_jam_akhir]": {
                  required: true,
                  minlength: 5
                },
                "formListKegiatan[kegiatan_alias]": "required",
                "formListKegiatan[kegiatan_lokasi]": "required",
                "formListKegiatan[kegiatan_moderator]": "required",
            },
            messages: {
                "formListKegiatan[kegiatan_jam_mulai]" : {
                    required: "Field harus diisi.",
                    minlength: "Minimal 5 Karakter",
                },
                "formListKegiatan[kegiatan_jam_akhir]" : {
                    required: "Field harus diisi.",
                    minlength: "Minimal 5 Karakter",
                },
                "formListKegiatan[kegiatan_alias]": "Field Harus diisi.",
                "formListKegiatan[kegiatan_lokasi]": "Field Harus diisi.",
                "formListKegiatan[kegiatan_moderator]": "Field Harus diisi.",
            }
        });

        //FUNCTION TABLE MASTER ACARA

        //init table
        var table_master_acara = $("#table-master-acara").DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("acara/getMasterAcaraDatatables") }}',
            columns: [
                { data: 'rownum', name: 'rownum' },
                { data: 'id', name: 'id' },
                { data: 'judul_acara', name: 'judul_acara'},
                { data: 'action', name: 'action'}
            ],
            responsive: true,
            columnDefs: [
                {
                    "targets": [ 1 ],
                    "visible": false
                }
            ],
            "scrollX": true,
            "bLengthChange": false,
        });

        //onclick table master acara

        /*$('#table-master-acara tbody').on( 'click', 'tr', function () {

            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table_master_acara.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');

                var hasil       = table_master_acara.row('.selected').data();
                id_master_acara = hasil['id'];
                url             = base_url()+'/acara/masterAcara/delete/'+ id_master_acara;
                console.log(url);
            }
        } );*/

        //on dblclick table master acara
        $('#table-master-acara tbody').on( 'dblclick', 'tr', function () {
            var hasil = table_master_acara.row(this).data();
            id_master_acara = hasil['id'];
            //console.log(hasil['id']);

            $.ajax({
                type: "GET",
                url: base_url()+"/acara/masterAcara/detail/"+id_master_acara,
                success: function (res) {

                    if(res.code == 200 ){
                        $("#modalMasterAcara").modal();
                        $("#headerMasterAcara").html("Edit Data Master Acara");
                        $("#judul_acara").val(res.data['judul_acara']);
                        $("#btnUpdateMasterAcara").show();
                        $("#btnSimpanMasterAcara").hide();
                    }

                  },
                dataType: 'JSON'
            });
        } );

        //modal tambah acara
        $("#btnTambahMasterAcara").click(function(){
            clear();
            $("#modalMasterAcara").modal();
            $("#headerMasterAcara").html("Tambah Data Master Acara");
            $("#btnUpdateMasterAcara").hide();
            $("#btnSimpanMasterAcara").show();
        });

        //END FUNCTION TABLE MASTER ACARA

        //FUNCTION GET ABSENSI
        $("#btnAbsensi").click(function(){
            window.open(base_url()+'/sertifikat/daftarhadir/'+id_tr_kegiatan, '_blank');
        });
        //END FUNCTION GET ABSENSI

        //FUNCTION KEGIATAN
        var table = $("#table-kegiatan").DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("kegiatan/getKegiatanDatatables") }}',
            columns: [
                { data: 'rownum', name: 'rownum' },
                { data: 'id', name: 'id' },
                { data: 'judul_acara', name: 'judul_acara'},
                { data: 'alias', name: 'alias'},
                { data: 'jml_peserta', name: 'jml_peserta'},
                { data: 'semester', name: 'semester'},
                { data: 'tahun_ajaran', name: 'tahun_ajaran'},
                { data: 'tanggal', name: 'tanggal'},
                { data: 'jam', name: 'jam'},
                { data: 'lokasi', name: 'lokasi'},
                { data: 'jns_kegiatan', name: 'jns_kegiatan'},
            ],
            "scrollX": true,
            columnDefs: [
                {
                    "targets": [ 1 ],
                    "visible": false
                }
            ],
        });

        $('#table-kegiatan tbody').on( 'dblclick', 'tr', function () {
            var hasil = table.row(this).data();
            id_kegiatan = hasil['id'];
            //console.log(hasil);

            $.ajax({
                type: "GET",
                url: base_url()+"/kegiatan/detail/"+id_kegiatan,
                success: function (res) {
                    var data = res.data[0];

                    if(res.code == 200 ){
                        var tgl = convertMysqlDateToHumanDate(data['tanggal']);

                        console.log(tgl);

                        $("#modalKegiatan").modal();
                        $("#headModalTambahKegiatan").html("Edit Data Kegiatan");
                        $("#kegiatan_judul_acara").select2().select2('val', data['id_mst_judul_acara']);
                        $("#kegiatan_jns_kegiatan").select2().select2('val', data['id_mst_jns_kegiatan']);
                        $("#kegiatan_list_blanko").select2().select2('val', data['id_mst_blanko']);
                        $("#kegiatan_date").val(tgl);
                        $("#kegiatan_alias").val(data['alias']);
                        $("#kegiatan_lokasi").val(data['lokasi']);
                        $("#kegiatan_jam_mulai").val(data['jamMulai']);
                        $("#kegiatan_jam_akhir").val(data['jamAkhir']);
                        $("#kegiatan_ta").val(data['tahun_ajaran']);
                        $("#kegiatan_moderator").val(data['moderator']);
                        $("#btnUpdateKegiatan").show();
                        $("#btnSimpanKegiatan").hide();
                        id_blanko = $('#kegiatan_list_blanko').select2('data').id;
                    }

                  },
                dataType: 'JSON'
            });
        } );

        $("#btnTambahKegiatan").click(function(){
            clear();
            $("#headModalTambahKegiatan").html("Tambah Data Kegiatan");
            $("#modalKegiatan").modal();
            $("#kegiatan_date").val(get_curdate());
            $("#kegiatan_ta").val(get_ta());
            $("#btnUpdateKegiatan").hide();
            $("#btnSimpanKegiatan").show();
            id_blanko = $('#kegiatan_list_blanko').select2('data').id;

        });

        $("#btnSimpanKegiatan").click(function(){

            var valid = $("#formListKegiatan").valid();

            if(valid == true){
                var formdata = $("#formListKegiatan").serialize();

                $.ajax({
                    type: "POST",
                    url: base_url()+'/kegiatan/save',
                    data: formdata,
                    success: function( res ) {
                        if(res.code == 200 ){
                            $("#modalKegiatan").modal('toggle');
                            swal("Berhasil", res.message, "success");
                            table.ajax.reload();
                        }else{
                            swal("Gagal", res.message, "error");
                        }

                        clear();
                        init();
                    }
                });
            }
        });

        $("#kegiatan_jam_mulai").keypress(function(e){

            var key = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58];

            var nilai = key.indexOf(e.keyCode);

            if( nilai != -1 ){

                var panjang = $("#kegiatan_jam_mulai").val();

                if(panjang.length == 0){

                    if(e.keyCode > 50){

                       e.preventDefault();

                    }

                }

                else if(panjang.length == 3){

                    if(e.keyCode > 53){

                       e.preventDefault();

                    }

                }

                else  if(panjang.length == 2){

                    if(e.keyCode != 58){

                       e.preventDefault();

                    }

                }else{

                    if(e.keyCode == 58){

                       e.preventDefault();

                    }

                }

            } else{

                e.preventDefault();

            }

        });

        $("#kegiatan_jam_akhir").keypress(function(e){

            var key = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58];

            var nilai = key.indexOf(e.keyCode);

            if( nilai != -1 ){

                var panjang = $("#kegiatan_jam_akhir").val();

                if(panjang.length == 0){

                    if(e.keyCode > 50){

                       e.preventDefault();

                    }

                }

                else if(panjang.length == 3){

                    if(e.keyCode > 53){

                       e.preventDefault();

                    }

                }

                else if(panjang.length == 2){

                    if(e.keyCode != 58){

                       e.preventDefault();

                    }

                }else{

                    if(e.keyCode == 58){

                       e.preventDefault();

                    }

                }

            } else{

                e.preventDefault();

            }

        });

        $("#btnUpdateKegiatan").click(function(){

            var valid = $("#formListKegiatan").valid();

            if(valid == true){
                var formdata = $("#formListKegiatan").serialize();

                $.ajax({
                    type: "POST",
                    url: base_url()+'/kegiatan/update/'+id_kegiatan,
                    data: formdata,
                    success: function( res ) {
                        if(res.code == 200 ){
                            $("#modalKegiatan").modal('toggle');
                            swal("Berhasil", res.message, "success");
                            table.ajax.reload();
                        }else{
                            $("#modalKegiatan").modal('toggle');
                            swal("Gagal", res.message, "error");
                        }

                        clear();
                        init();
                    }
                });
            }

        });

        //END FUNCTION KEGIATAN

        //CRUD PROSES
        $("#btnSimpanMasterAcara").click(function(){

            var valid = $("#formMasterAcara").valid();

            if(valid == true){
                var formdata = {
                    judul_acara : $("#judul_acara").val()
                }

                $.ajax({
                    type: "POST",
                    url: base_url()+'/acara/masterAcara/save',
                    data: formdata,
                    success: function( res ) {
                        if(res.code == 200 ){
                            $("#modalMasterAcara").modal('toggle');
                            swal("Berhasil", res.message, "success");
                            table_master_acara.ajax.reload();

                            //redraw master judul acara
                            $.get('{{ url("acara/getListMasterAcara") }}', function(data, status){

                                var items = [];

                                for (var i = 0; i < data.length; i++) {
                                    // logik to create new items
                                    items.push({
                                        "id": data[i].id,
                                        "text": data[i].judul_acara
                                    });

                                    $('#kegiatan_judul_acara').append("<option value=\"" + items[i].id + "\">" + items[i].text + "</option>");
                                }
                            });

                        }else{
                            swal("Gagal", res.message, "error");
                        }

                        clear();
                        init();
                    }
                });
            }
        });

        $("#btnUpdateMasterAcara").click(function(){

            var formdata = {
                judul_acara : $("#judul_acara").val()
            }

            $.ajax({
                type: "POST",
                url: base_url()+'/acara/masterAcara/update/'+id_master_acara,
                data: formdata,
                success: function( res ) {

                    if(res.code == 200 ){
                        $("#modalMasterAcara").modal('toggle');
                        swal("Berhasil", res.message, "success");
                        table_master_acara.ajax.reload();
                        table.ajax.reload();
                    }else{
                        swal("Gagal", res.message, "error");
                    }

                    clear();
                    init();
                }
            });

        });

        //END CRUD PROSES

        setInterval(function(){ table.ajax.reload(); }, 100000);

        $("#kegiatan_list_blanko").live('change', function(){
            id_blanko = $("#kegiatan_list_blanko").val();
        });

    });

    function previewBlanko(){
        window.open(base_url()+"/sertifikat/preview/blanko/"+id_blanko, '_blank');
    }

    function hapusMasterAcara(id){

        swal({
                title: "Peringatan!",
                text: "Anda yakin akan menghapus data master acara?",
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
                        url: base_url()+'/acara/masterAcara/delete/'+ id,
                        success: function( res ) {

                            if(res.code == 200 ){
                                swal("Berhasil", res.message, "success");
                                $("#table-master-acara").DataTable().ajax.reload();
                                $('#kegiatan_judul_acara').find('option').remove();

                                //redraw master judul acara
                                $.get('{{ url("acara/getListMasterAcara") }}', function(data, status){

                                    var items = [];

                                    for (var i = 0; i < data.length; i++) {
                                        // logik to create new items
                                        items.push({
                                            "id": data[i].id,
                                            "text": data[i].judul_acara
                                        });

                                        $('#kegiatan_judul_acara').append("<option value=\"" + items[i].id + "\">" + items[i].text + "</option>");
                                    }
                                });

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

        //init global var
        var id_master_acara = null;
        var id_tr_kegiatan  = null;
        var url             = null;
        var id_blanko       = null;

        //init button
        $("#btnUpdateMasterAcara").hide();
        $("#btnSimpanMasterAcara").show();

        //INIT SELECT2
        $("#kegiatan_judul_acara").select2({
            placeholder : "-- Pilih Sebuah Option --",
            allowClear  : true
        });

        $("#kegiatan_jns_kegiatan").select2({
            placeholder : "-- Pilih Sebuah Option --",
            allowClear  : true
        });

        $("#kegiatan_list_blanko").select2({
            placeholder : "-- Pilih Sebuah Option --",
            allowClear  : true
        });

        //INIT DATE PICKER
        $("#kegiatan_date").datepicker({
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            autoclose: true,
        });

    }

    function clear(){

        //FORM ACARA
        $("#judul_acara").val('');
        $("#formMasterAcara").validate().resetForm();
        $("#formListKegiatan").validate().resetForm();
        //END ACARA

        //FORM KEGIATAN
        $("#kegiatan_judul_acara").select2().select2('val', null);
        $("#kegiatan_alias").val('');
        $("#kegiatan_moderator").val('');
        $("#kegiatan_jam_mulai").val('');
        $("#kegiatan_jam_akhir").val('');
        $("#kegiatan_lokasi").val('');
        $("#kegiatan_ta").val('');
        $("#kegiatan_jns_kegiatan").select2().select2('val', null);

    }

    function showListPeserta(id){

        $("#listPeserta tbody tr").remove();
        $("#judul_acara_lp").html('');

        var formdata = { gradebook : {cari_peserta : id} };
        id_tr_kegiatan = id;

        $.ajax({
            type: "POST",
            url: '{{ url("peserta/getListPesertaByKegiatan") }}',
            data: formdata,
            success: function( res ) {

                var data = res.data;
                $("#judul_acara_lp").html(res.data[0].alias);

                if(res.code == 200 ){

                    var number = 1;

                    $.each( data, function( key, value ) {
                        var nim = value.nim == null ? '-' : value.nim;
                        $('#listPeserta').append('<tr><td>'+number+++'</td><td>'+nim+'</td><td>'+value.nama+'</td></tr>')
                    });

                }
            }
        });

        $("#modalListPeserta").modal();

    }

</script>
@endsection
