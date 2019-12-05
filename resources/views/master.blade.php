<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kurumsal Kaynak Planlaması</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('admin/css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Kurumsal Kaynak Planlama</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> Çıkış
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="{{ Request::is('/') ? 'active' : 'no' }}">
                        <a href="{{url('/')}}"><i class="fa fa-fw fa-dashboard"></i> Ana Sayfa</a>
                    </li>
                    <li class="{{ Request::is('uretim/'.'*') ? 'active' : 'no' }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#uretim"><i class="fa fa-fw fa-table"></i> Üretim <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="uretim" class="collapse">
                            <li class="{{ Request::is('uretim/urunler') ? 'active' : 'no' }}">
                                <a href="{{url('uretim/urunler')}}">Ürünler</a>
                            </li>
                            <li class="{{ Request::is('uretim/hammadde') ? 'active' : 'no' }}">
                                <a href="{{url('uretim/hammadde')}}">Hammadde</a>
                            </li>
                            <li class="{{ Request::is('uretim/uretim') ? 'active' : 'no' }}">
                                <a href="{{url('uretim/uretim')}}">Üretim</a>
                            </li>
                            <li class="{{ Request::is('uretim/uretilenler') ? 'active' : 'no' }}">
                                <a href="{{url('uretim/uretilenler')}}">Üretilenler</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('iky/'.'*') ? 'active' : 'no' }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#ikaynaklari"><i class="fa fa-fw fa-edit"></i> İnsan Kaynakları <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ikaynaklari" class="collapse">
                            <li class="{{ Request::is('iky/isciler') ? 'active' : 'no' }}">
                                <a href="{{url('iky/isciler')}}">İşçiler</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#finans"><i class="fa fa-fw fa-bar-chart-o"></i> Finans <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="finans" class="collapse">
                            <li>
                                <a href="{{url('finans/finans')}}">Finans</a>
                            </li>
                            <li>
                                <a href="{{url('finans/aylik')}}">Aylık Giderler</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

          @yield('icerik')

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('admin/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('admin/js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
