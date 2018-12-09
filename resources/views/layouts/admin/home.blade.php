@extends('layouts.admin.layout2')

@section('content')
<div class="row-fluid page-head">
    <h2 class="page-title"><i class="fontello-icon-monitor"></i> Dashboard</h2>
    
    <div class="page-bar">
        <div class="btn-toolbar"> </div>
    </div>
</div>
<!-- // page head -->

<div id="page-content" class="page-content">
    <section>
        <div class="row-fluid margin-top20">
            <div class="span12 well well-black">
                <div class="row-fluid">
                    <div class="span6 grider">
                        <h3><i class="fontello-icon-chart-bar-3"></i> Grafik Seadanya<small></small></h3>
                        <p class="pagedesc"></p>
                        <hr class="margin-mx">

                        <select name="ListGrafik" id="ListGrafik">
                            <option value="Bulan" selected>Bulan</option>
                            <option value="Tahun">Tahun</option>
                        </select>

                       


                        <div id="GrafikBulan" > 

                        {!! $chartPesertaBulan->html() !!} 

                        </div>
                       
                         <div id="GrafikTahun" >
                            {!! $chartPesertaTahun->html() !!} 
                        </div>



                        
                    </div>
                    <!-- // column -->
                    
                    <div class="span6 grider">
                        <div class="row-fluid">
                            <div class="span6 grider-item">
                                <div class="row-fluid">
                                    
                                </div>
                               
                                
                                <div class="row-fluid">
                                    <div class="span12 grider-item">
                                        <ul class="nav nav-well">
                                            <li><a class="well well-black""><i class="fontello-icon-users"></i>
                                                <h4 class="statistic-values pull-right">
                                                {{ $userCount->count() }}</h4>
                                                Total Users</a></li>
                                                <li><a class="well well-black""><i class="fontello-icon-users"></i>
                                                <h4 class="statistic-values pull-right">
                                                {{ $pesertaCount->count() }}</h4>
                                                Total Sertifikat</a></li>
                                                <li><a class="well well-black""><i class="fontello-icon-users"></i>
                                                <h4 class="statistic-values pull-right">
                                                {{ $kegiatanCount->count() }}</h4>
                                                Total Kegiatan</a></li>
                                                <li><a class="well well-black""><i class="fontello-icon-users"></i>
                                                <h4 class="statistic-values pull-right">
                                                {{ $templateCount->count() }}</h4>
                                                Total Template</a></li>
                                            
                                            
                                        </ul>
                                        
                                    </div>
                                </div>
                                
                                
                </div>
                            
        </div>
    </div>
</div>
</div>
</div>

</div>

        <!-- // Example row --> 
        
    </section>
    <section>
        {!! Charts::scripts() !!}
{!! $chartPesertaBulan->script() !!}
{!! $chartPesertaTahun->script() !!}


        
    </section>
    <section>
        
    <!-- responsive MODAL LIST Acara -->
<!-- <div id="modalListUsers" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header"> -->
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fontello-icon-cancel-1"></i></button>
        <h4 id="headListPeserta"></h4> -->
    <!-- </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span12">
                <div class="well well-box well-black">
                    <table id="listUsers" class="table boo-table table-condensed table-content table-hover">

                        <caption>
                        Daftar Users <span id='users_lp'></span>
                        <button type="button" id="btnAbsensi" class="btn-small pull-right">
                        </caption>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
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
</div> -->
<!-- end responsive MODAL LIST Peserta-->
<!--     </section>
</div> -->
<!-- // page content -->




@endsection

@section('scripts')
<script type="text/javascript">
        // var chart = new Highcharts.Chart({
        //   chart: {
        //     renderTo: 'dashChartVisitors',
        //     type: 'column',
        //     options3d: {
        //       enabled: false,
        //       alpha: 15,
        //       beta: 15,
        //       depth: 50,
        //       viewDistance: 25
        //     }
        //   },
        //   title: {
        //     text: 'Chart rotation demo'
        //   },
        //   subtitle: {
        //     text: 'Test options by dragging the sliders below'
        //   },
        //   plotOptions: {
        //     column: {
        //       depth: 25
        //     }
        //   },
        //   series: [{
        //     data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        //   }]
        // });

$("#ListGrafik").on("change",function(){
      if ($(this).val() == 'Tahun') {
            $('#GrafikTahun').show(200);
        }
        else {
            $('#GrafikTahun').hide(200);
        }
}).change();

$("#ListGrafik").on("change",function(){
      if ($(this).val() == 'Bulan') {
            $('#GrafikBulan').show(200);
        }
        else {
            $('#GrafikBulan').hide(200);
        }
}).change();


</script>

@endsection