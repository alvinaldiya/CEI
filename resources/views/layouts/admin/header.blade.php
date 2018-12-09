<div id="header">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="brand" href="javascript:void(0);"><img src="assets/img/demo/logo-brand.png"></a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        @php
                            $role = (new \App\Http\Helper)->getRoleID();
                            $menu = (new \App\Http\Helper)->getMenu($role);
                        @endphp

                        @foreach ($menu as $data)
                             <li class="{{ Request::path() == $data->link ? 'active' : '' }}"> <a href="{{$data->link}}">{{ucwords($data->menu_name)}}</a> </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- // navbar -->

    <div class="header-drawer">
        <div class="mobile-nav text-center visible-phone"> <a href="javascript:void(0);" class="mobile-btn" data-toggle="collapse" data-target=".sidebar"><i class="aweso-icon-chevron-down"></i> Components</a> </div>
        <!-- // Resposive navigation -->
        <div class="breadcrumbs-nav hidden-phone">
            <ul id="breadcrumbs" class="breadcrumb">
                <li><a href="#"><i class="fontello-icon-home f12"></i> Dashboard</a> <span class="divider">/</span></li>
                @for($i = 0; $i <= count(Request::segments()); $i++)
                    @if (Request::segment($i) != 'home')
                        <li class="{{ Request::segment($i) == Request::path() ? 'active' : '' }}">
                            {{ucwords(Request::segment($i))}}
                        </li>
                    @endif
                @endfor
            </ul>
        </div>
        <!-- // breadcrumbs -->
    </div>
    <!-- // drawer -->
</div>
