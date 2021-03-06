<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" id="theme" href="{{ URL::asset('theme/css/theme-default.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/sweetalert.css')}}">
    
    <!-- CHARTS-->
    {{-- Charts::assets() --}}

    <script src="{{ URL::asset('vendor/consoletvs/charts/jquery-3.0.0.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/canvas-gauges/gauge.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/chartist/chartist.min.js')}}"></script>
    <link rel='stylesheet' type='text/css' href="{{ URL::asset('vendor/consoletvs/charts/chartist/chartist.min.css') }} " />
    <script src="{{ URL::asset('vendor/consoletvs/charts/chartjs/Chart.js')}}"></script>
    <script type='text/javascript' src="{{ URL::asset('vendor/consoletvs/charts/fusioncharts/fusioncharts.js')}}"></script>
    <script type='text/javascript' src="{{ URL::asset('vendor/consoletvs/charts/fusioncharts/themes/fusioncharts.theme.fint.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/highcharts/js/highcharts.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/highcharts/js/modules/exporting.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/highmaps/js/modules/map.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/highmaps/js/modules/data.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/highmaps/maps/world.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/justgage/raphael-2.1.4.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/justgage/justgage.js')}}"></script>
    <link rel='stylesheet' href="{{ URL::asset('vendor/consoletvs/charts/morris/morris.css')}}">
    <script type='text/javascript' src="{{ URL::asset('vendor/consoletvs/charts/morris/raphael.min.js')}}"></script><script type='text/javascript' src="{{ URL::asset('vendor/consoletvs/charts/morris/morris.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/d3/d3.js')}}"></script>
    <link rel='stylesheet' href="{{ URL::asset('vendor/consoletvs/charts/plottable/plottable.css')}}"><script src="{{ URL::asset('vendor/consoletvs/charts/plottable/plottable.js')}}"></script>
    <script src="{{ URL::asset('vendor/consoletvs/charts/progressbar/progressbar.min.js')}}"></script>


    <!-- THEME -->

    <!-- START PLUGINS --> 
    <script type="text/javascript" src="{{ URL::asset('dist/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/jquery/jquery.min.js') }}"></script> 
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/jquery/jquery-ui.min.js') }}"></script> 
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap.min.js') }}"></script>        
    <!-- END PLUGINS -->
    
    <!-- START THIS PAGE PLUGINS-->  

    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/icheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>



    
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/morris/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/morris/morris.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/rickshaw/d3.v3.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/rickshaw/rickshaw.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/owl/owl.carousel.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/tableexport/tableExport.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/tableexport/jquery.base64.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/tableexport/html2canvas.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/tableexport/jspdf/libs/sprintf.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/tableexport/jspdf/jspdf.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/tableexport/jspdf/libs/base64.js') }}"></script>

    <!-- END THIS PAGE PLUGINS-->  

    <!-- START TEMPLATE -->
    <script type="text/javascript" src="{{ URL::asset('theme/js/settings.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('theme/js/actions.js') }}"></script>
            
    <!-- END TEMPLATE -->

    
</head>

<body>
    
</body>

    <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{route('index')}}">Carteira</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ Auth::user()->photo != NULL ? route('images', [Auth::user()->photo, 170]) : '../theme/assets/images/users/userdefault.png'}}" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{Auth::user()->name}}</div><!-- criar cadastro de usuario-->
                                <div class="profile-data-title"></div>
                            </div>
                            <div class="profile-controls">
                                <a href="{{route('editar_usuario')}}" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#!" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navegação</li>
                    <li>
                        <a href="{{ route('index') }}"><span class="fa fa fa-desktop"></span> <span class="xn-text">Inicio</span></a>
                    </li> 
                    <li>
                        <a href="{{ route('index_despesa') }}"><span class="fa fa-shopping-cart"></span> <span class="xn-text">Despesas</span></a>
                    </li>
                    <li>
                        <a href="{{ route('index_receita') }}"><span class="fa fa-money"></span> <span class="xn-text">Receitas</span></a>
                    </li>
                    <li>
                        <a href="{{ route('index_contato') }}"><span class="fa fa-users"></span> <span class="xn-text">Contatos </span></a>
                    </li>
                    <li>
                        <a href="{{ route('index_conta') }}"><span class="fa fa-bank"></span> <span class="xn-text">Conta Bancária </span></a>
                    </li>  
                    <li>
                        <a href="{{ route('index_relatorio') }}"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Relatórios</span></a>
                    </li> 
                    <li>
                        <a href="{{ route('index_economia') }}"><span class="fa fa fa-dollar"></span> <span class="xn-text">Metas de economia</span></a>
                    </li> 
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="{{ url('logout') }}"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- SALDO -->
                    <li class="pull-right">
                        <a href="{{route('index')}}">
                            <strong>Saldo: <strong style="{!!(Session::get('user.saldo') < 0) ? 'color:red' : '' !!}">R$ {{number_format(Session::get('user.saldo'),2,',','.')}}</strong></strong>
                            
                            <strong><strong>
                        </a>         
                    </li>
                    <!-- END SALDO -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
              
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START SALES BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3></h3>
                                    </div>                                     
                                    <ul class="panel-controls panel-controls-title">                                        
                                        <li>
                                            <div id="reportrange" class="dtrange">                                            
                                                <span></span><b class="caret"></b>
                                            </div>                                     
                                        </li>                                
                                        <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                                    </ul>                                    
                                    
                                </div>
                                <div class="panel-body">                                    
                                    <div class="row stacked">
                                        <div class="col-md-12">                                            
                                            @yield('carteira')
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <!-- END SALES BLOCK -->
                            
                        </div>
                        <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-content">
                                <ul class="list-inline item-details">
                                    <li><a href="http://themifycloud.com/downloads/janux-premium-responsive-bootstrap-admin-dashboard-template/">Admin templates</a></li>
                                </ul>
                            </div>
                        </div>
                            
                        </div>
                    </div>
                    
                    <!-- START DASHBOARD CHART -->
                    <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
                    <div class="block-full-width">
                                                                       
                    </div>                    
                    <!-- END DASHBOARD CHART -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

</body>

@yield('pbody')

</html>
