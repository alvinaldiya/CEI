<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title>CEI Verify Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->

<link href="{{ asset("assets/css/lib/bootstrap.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/lib/bootstrap-responsive.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/boo-extension.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/boo.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/style.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/boo-coloring.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/boo-utility.css")}}" rel="stylesheet">
<style>
input[type="text"].error {
    border: 1px solid #f00;
}
</style>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="assets/plugins/selectivizr/selectivizr-min.js"></script>
    <script src="assets/plugins/flot/excanvas.min.js"></script>
<![endif]-->

<link rel="shortcut icon" href="assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body class="signin signin-horizontal">
<div class="page-container">
    <div id="header-container">
        <div id="header">
            <div class="navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container"> </div>
                </div>
            </div>
            <!-- // navbar -->

            <div class="header-drawer" style="height:3px"> </div>
            <!-- // breadcrumbs -->
        </div>
        <!-- // drawer -->
    </div>
    <!-- // header-container -->

    <div id="main-container">
        <div id="main-content" class="main-content container">
            <div id="page-content" class="page-content">
                <div class="row">
                    <div class="tab-content overflow form-dark">
                        <div class="tab-pane fade in active" id="login">
                            <div class="span5">
                                <h4 class="welcome"><small><i class="fontello-icon-newspaper"></i>Input No Sertifikat</small></h4>
                                <form id="formVerify">
                                    <fieldset>
                                        <div class="controls controls-row">
                                            <input name='formVerify[id]' type="text" class="span2" id='no_sertifikat' placeholder="No Sertifikat"></input>
                                            <input name='formVerify[tahun]' type="text" class="span2" id='tahun_sertifikat' placeholder="Tahun Sertifikat"></input>
                                            <div class="clearfix"></div>
                                            <button id="btnVerify" type="submit" class="btn btn-green">Verify</button>
                                            <button id="btnReset" type="submit" class="btn">Reset</button>
                                        </div>
                                        <hr class="margin-xm">
                                    </fieldset>
                                </form>
                                <!-- // form -->
                                <span id='invalidCek' style="display: none;">
                                  <div class="alert alert-danger">
                                      <span class="bold">Gagal!</span> ID Sertifikat Invalid.
                                  </div>
                                </span>

                                <span id="validCek" style="display: none;">
                                  <div class="alert alert-success">
                                      <span class="bold">Sukses</span> ID Sertifikat Valid.
                                  </div>
                                  <div class="well well-box well-nice">
                                  <div class="navbar">
                                      <div class="navbar-inner no-bg">
                                          <h4 class="title"><i class="fontello-icon-window"></i> Info Sertifikat</h4>
                                      </div>
                                  </div>
                                  <!-- // navbar -->
                                  <!-- // content item -->
                                  <div class="section-content">

                                      <table class="table table-striped table-condensed table-content boo-table">
                                          <caption>Detail Info</caption>
                                          <tbody>
                                              <tr>
                                                  <td>ID</td>
                                                  <td><span id="detail_id_sertifikat"></span></td>
                                              </tr>
                                              <tr>
                                                  <td>No Sertifikat</td>
                                                  <td><span id="no_sertifikat2"></span></td>
                                              </tr>
                                              <tr>
                                                  <td>Nama</td>
                                                  <td><span id="nama_peserta"></span></td>
                                              </tr>
                                              <tr>
                                                  <td>Kegiatan</td>
                                                  <td><span id="nama_kegiatan"></span></td>
                                              </tr>
                                              <tr>
                                                  <td>Tanggal Kegiatan</td>
                                                  <td><span id="tgl_kegiatan"></span></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                      <br>
                                      <div class="btn-group"> <a class="btn btn-mini btn-glyph dropdown-toggle" data-toggle="dropdown" href="#"><i class="fontello-icon-print"></i> Cetak Sertifikat <span class="caret"></span> </a>
                                          <ul class="dropdown-menu">
                                              <li><a target="_blank" id="blank_sertifikat">Blank</a></li>
                                              <!-- <li><a target="_blank" id="filled_sertifikat">Background</a></li> -->
                                          </ul>
                                      </div>
                                    <!-- // table-content -->
                                  </div>
                                  <!-- // content -->
                                </span>
                            </div>
                            </div>
                            <div class="span7">
                                <h4 class="welcome"><small>Central Events Information</small></h4>
                                <p>Selamat datang di pusat verifikasi sertifikat Peguruan Tinggi Raharja.</p>
                                <p>Aplikasi ini berguna untuk melakukan validasi sertifikasi yang telah diterbitkan oleh Perguruan Tinggi Raharja.</p>
                                <p>Bagi anda Pribadi Raharja, maupun Pelajar / Mahasiswa/i dari Perguruan Tinggi lain dapat melakukan verifikasi data sertifikasi melalui aplikasi ini.</p>
                                

                            </div>
                        </div>
                        <!-- // Tab Login -->

                        <div class="web-description span12">
                            <h5>Copyright &copy; 2017 STMIK RAHARJA</h5>
                            <p>Maintenance By Withheld Team <br />
                                All rights reserved.</p>
                        </div>
                    </div>

                </div>
                <!-- // Example row -->

            </div>
            <!-- // page content -->

        </div>
        <!-- // main-content -->

    </div>
    <!-- // main-container  -->

</div>
<!-- // page-container -->

<!-- Le javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset("assets/js/lib/jquery.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery-ui.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery.cookie.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery.mousewheel.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery.load-image.min.js")}}"></script>
<script src="{{ asset("assets/js/lib/bootstrap/bootstrap.js")}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

<!-- Plugins Bootstrap -->
<script src="{{ asset("assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.min.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js")}}"></script>
<script src="{{ asset("assets/js/config.js")}}"></script>

<script>
$(document).ready(function() {

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });

  $("#formVerify").validate({
      rules: {
          "formVerify[id]": "required",
          "formVerify[tahun]": "required"
      },
      errorPlacement: function(){
            return false;
        },
  });

  $("#btnVerify").click(function(e){
    e.preventDefault();

    var valid = $("#formVerify").valid();

      if(valid == true){

        var data = {
          no_sertifikat     : $("#no_sertifikat").val(),
          tahun_sertifikat  : $("#tahun_sertifikat").val()
        };

        $.ajax({
            type: "GET",
            //url: base_url()+"/verify/cekSertifikat",
            url: '{{ url("verify/cekSertifikat") }}',
            data: data,
            success: function (res) {
              if(res.code == 200){
                var data = res.data;
                
                if(data['no_urut'] == null || data['no_urut'] == '' ){
                    $('#validCek').attr("style", "display:none");
                    $('#invalidCek').removeAttr('style');
                }else{
                    $('#invalidCek').attr("style", "display:none");
                    $('#detail_id_sertifikat').html(data['id']);
                    $('#no_sertifikat2').html(pad(data['no_urut'],4));
                    $('#nama_peserta').html(data['nama'].toUpperCase());
                    $('#nama_kegiatan').html(data['judul_acara']);
                    $('#tgl_kegiatan').html(convertMysqlDateToHumanDate(data['tgl_kegiatan']));
                    $("#blank_sertifikat").attr("href", "sertifikat/cetak/"+data['id']+"/blank");
                    $("#filled_sertifikat").attr("href", "sertifikat/cetak/"+data['id']+"/filled");
    
                    $('#validCek').removeAttr('style');
                    $("#id_sertifikat").val(null);
                }

              }else{
                $('#validCek').attr("style", "display:none");
                $('#invalidCek').removeAttr('style');
              }
            },
            dataType: 'JSON'
        });
      }
  });

  $("#btnReset").click(function(e){
      $("#validCek").attr("style", "display:none;");
      $("#invalidCek").attr("style", "display:none;");
      $("#no_sertifikat").val(null);
      $("#tahun_sertifikat").val(null);
      $("#formVerify").validate().resetForm();
      e.preventDefault();
  });

});

$("#no_sertifikat").keypress(function(){
    var panjang = $("#no_sertifikat").val();

    if((panjang.length + 1) > 3){
        $("#tahun_sertifikat").focus();
    }
    console.log(panjang.length + 1);
});

$("#no_sertifikat").bind("paste", function(e){
    alert("ga boleh copas");
    return false;
} );

$("#tahun_sertifikat").bind("paste", function(e){
    alert("ga boleh copas");
    return false;
} );

function pad(str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

</script>


</body>
</html>
