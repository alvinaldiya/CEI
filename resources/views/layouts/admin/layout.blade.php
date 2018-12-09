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

<!-- Le fav and touch icons -->
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
                                <h4 class="welcome"> <small><i class="fontello-icon-user-4"></i>Sign in </small>RCC</h4>
                                <form method="get" action="login/google" name="login_form">
                                    <fieldset>
                                        <div class="controls controls-row">
                                            <button type="submit" class="span4 btn btn-yellow btn-large">Login With Google</button>
                                        </div>
                                        <hr class="margin-xm">
                                    </fieldset>
                                </form>
                                <!-- // form -->
                            </div>
                            <div class="span7">
                                <h4 class="welcome"><small>Raharja Certification Center</small></h4>
                                <p>Lorem ipsum dolor sit amet consectetuer Curabitur egestas adipiscing laoreet Suspendisse. Lacus Sed justo penatibus vel wisi elit felis lorem Donec ipsum. Pretium nibh nibh eget adipiscing volutpat dui..</p>
                                <p>Semper ipsum rutrum egestas Nam congue semper urna metus lorem habitasse. Sodales Nulla Vestibulum pretium justo quis vestibulum pellentesque et amet eu. Senectus augue turpis et Vestibulum ut risus velit pellentesque laoreet lacus.</p>
                            </div>
                        </div>
                        <!-- // Tab Login -->

                        <div class="web-description span12">
                            <h5>Copyright &copy; 2017 STMIK RAHARJA</h5>
                            <p>Maintenance By Sultan <br />
                                All rights reserved FADF.</p>
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

<!-- Plugins Bootstrap -->
<script src="{{ asset("assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.min.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js")}}"></script>

<script>
$(document).ready(function() {


});

</script>


</body>
</html>
