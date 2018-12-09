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
<title>Boo Admin - Welcome</title>
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
                                <h4 class="welcome"><small><i class="fontello-icon-newspaper"></i>ID Sertifikat</small></h4>
                                  <!-- // navbar -->
                                  <!-- // content item -->
                                  <div class="section-content">

                                      <table class="table table-striped table-condensed table-content boo-table">
                                          <caption>Detail Info</caption>
                                          <tbody>
                                              <tr>
                                                  <td>DATA TIDAK DITEMUKAN</td>
                                          </tbody>
                                      </table>
                                      <br>
                                      <div class="btn-group"> <a class="btn btn-mini btn-glyph dropdown-toggle" data-toggle="dropdown" href="#"><i class="fontello-icon-print"></i> Cetak Sertifikat <span class="caret"></span> </a>
                                          <ul class="dropdown-menu">
                          
                                              <li><a target="_blank" href="../../sertifikat/cetak/{{$data_sertifikat->id}}/filled" id="filled_sertifikat">Background</a></li>
                                          </ul>
                                      </div>
                                    <!-- // table-content -->
                                  </div>
                                  <!-- // content -->
                                </span>
                            </div>
                            </div>
                            <div class="span7">
                                <h4 class="welcome"><small>Raharja Verification Center</small></h4>
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




</body>
</html>
