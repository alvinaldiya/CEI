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
<title>CEI - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="">
<meta name="author" content="">
<meta name="_token" content="{!! csrf_token() !!}" />

<!-- Le styles -->
<link href="{{ asset("assets/css/lib/bootstrap.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/lib/bootstrap-responsive.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/boo-extension.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/boo.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/style.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/boo-coloring.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/boo-utility.css")}}" rel="stylesheet">
<link href="{{ asset("assets/css/theme_manipulation.css")}}" rel="stylesheet">
<link href="{{ asset("assets/plugins/sweetalert/dist/sweetalert.css")}}" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link href="{{ asset("assets/plugins/all-autocomplete/styles.css")}}" rel="stylesheet">

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

{!! Charts::assets() !!}

</head>

<body>
<div class="page-container">
    <div id="header-container">

        @include('layouts.admin.header')

    </div>
    <!-- // header-container -->

    <div id="main-container">

        <div id="main-content" class="main-content container-fluid">

            @yield('content')

        </div>
        <!-- // main-content -->

    </div>
    <!-- // main-container  -->

    <footer id="footer-fix">

        <div id="footer-content" class="footer-content">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li><a id="btnLogout" class="btn-glyph fontello-icon-logout-1 tip" href="/logout" title="logout"></a></li>
                        <li class="divider-vertical"></li>
                        <li><a id="btnScrollup" class="scrollup btn-glyph fontello-icon-up-open-1" href="javascript:void(0);"><span class="hidden-phone">Scroll</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- // footer content -->

    </footer>
    <!-- // footer-fix  -->

</div>
<!-- // page-container  -->

<!-- Le javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset("assets/js/lib/jquery.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery-ui.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery.cookie.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery.date.min.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery.mousewheel.js")}}"></script>
<script src="{{ asset("assets/js/lib/jquery.load-image.min.js")}}"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="{{ asset("assets/js/lib/bootstrap/bootstrap.js")}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

<!-- Plugins Bootstrap -->
<!-- <script src="{{ asset("assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.min.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-fuelux/js/all-fuelux.min.js")}}"></script>  -->
<script src="{{ asset("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js")}}"></script>
<!-- <script src="{{ asset("assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-daterangepicker/js/bootstrap-daterangepicker.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-toggle-button/js/bootstrap-toggle-button.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-fileupload/js/bootstrap-fileupload.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-rowlink/js/bootstrap-rowlink.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-progressbar/js/bootstrap-progressbar.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-select/bootstrap-select.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-bootbox/bootbox.min.js")}}"></script> -->
<script src="{{ asset("assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-modal/js/bootstrap-modal.js")}}"></script>
<!-- <script src="{{ asset("assets/plugins/bootstrap-wizard/js/bootstrap-wizard.min.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-wizard-2/js/bwizard-only.min.js")}}"></script>
<script src="{{ asset("assets/plugins/bootstrap-image-gallery/js/bootstrap-image-gallery.min.js")}}"></script> -->

<!-- Plugins Custom - Only example -->
<!-- <script src="{{ asset("assets/plugins/pl-extension/google-code-prettify/prettify.js")}}"></script> -->

<!-- Plugins Custom - System -->
<!-- <script src="{{ asset("assets/plugins/pl-system/nicescroll/jquery.nicescroll.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-system/xbreadcrumbs/xbreadcrumbs.js")}}"></script>  -->

<!-- Plugins Custom - System info -->
<!-- <script src="{{ asset("assets/plugins/pl-system-info/qtip2/dist/jquery.qtip.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-system-info/gritter/js/jquery.gritter.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-system-info/notyfy/jquery.notyfy.js")}}"></script> -->

<!-- Plugins Custom - Content -->
<!-- <script src="{{ asset("assets/plugins/pl-content/list/js/list.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-content/list/plugins/list.paging.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-content/jpages/js/jPages.js")}}"></script> -->

<!-- Plugins Custom - Component -->
<!-- <script src="{{ asset("assets/plugins/pl-component/fullcalendar/fullcalendar.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-component/rangeslider/jqallrangesliders.min.js")}}"></script>  -->

<!-- Plugins Custom - Form -->
<!-- <script src="{{ asset("assets/plugins/pl-form/uniform/jquery.uniform.min.js")}}"></script> -->
<script src="{{ asset("assets/plugins/pl-form/select2/select2.min.js")}}"></script>
<!--<script src="{{ asset("assets/plugins/pl-form/counter/jquery.counter.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-form/elastic/jquery.elastic.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-form/inputmask/jquery.inputmask.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-form/inputmask/jquery.inputmask.extensions.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-form/validate/js/jquery.validate.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-form/duallistbox/jquery.duallistbox.min.js")}}"></script>-->

<script src="{{ asset("assets/plugins/sweetalert/dist/sweetalert.min.js")}}"></script>
<script src="{{ asset("assets/plugins/all-autocomplete/jquery.autocomplete.min.js")}}"></script>

<!-- Plugins Custom - Gallery -->
<!-- <script src="{{ asset("assets/plugins/pl-gallery/nailthumb/jquery.nailthumb.1.1.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-gallery/nailthumb/showLoading/js/jquery.showLoading.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-gallery/wookmark/jquery.imagesloaded.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-gallery/wookmark/jquery.wookmark.min.js")}}"></script> -->

<!-- Plugins Tables -->
<!-- <script src="{{ asset("assets/plugins/pl-table/datatables/media/js/jquery.dataTables.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-table/datatables/plugin/jquery.dataTables.plugins.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-table/datatables/plugin/jquery.dataTables.columnFilter.js")}}"></script>  -->

<!-- Plugins data visualization -->
<!-- <script src="{{ asset("assets/plugins/pl-visualization/sparkline/jquery.sparkline.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/easy-pie-chart/jquery.easy-pie-chart.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/percentageloader/percentageloader.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/knob/knob.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.categories.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.grow.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.orderBars.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.pie.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.resize.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.selection.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.stack.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.stackpercent.js")}}"></script>
<script src="{{ asset("assets/plugins/pl-visualization/flot/jquery.flot.time.js")}}"></script>  -->

<!-- main js -->
<script src="{{ asset("assets/js/core.js")}}"></script>
<!-- <script src="{{ asset("assets/js/application.js")}}"></script> -->
<script src="{{ asset("assets/js/config.js")}}"></script>

<!-- Only This Demo Page -->
<!-- <script src="{{ asset("assets/js/demo/demo-dashboard1.js")}}"></script>  -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

@yield('scripts')

</body>
</html>
