<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Back Office NEC | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin_template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_template/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin_template/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_template/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin_template/dist/css/skins/_all-skins.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <header class="main-header">
            <!-- Logo -->
              <a href="{{ route('transaksi') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">NEC<b>Institute</b></span>
              </a>
              <!-- Header Navbar: style can be found in header.less -->
              <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </div>
              </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
              <section class="sidebar">
              <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                <li>
                  <a href="{{ route('transaksi') }}">
                    <i class="fa fa-th"></i> <span>Transaksi</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('pendaftar') }}">
                    <i class="fa fa-th"></i> <span>Pendaftar</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('group') }}">
                    <i class="fa fa-th"></i> <span>Group</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('program') }}">
                    <i class="fa fa-th"></i> <span>Program</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('penginapan') }}">
                    <i class="fa fa-th"></i> <span>Penginapan</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('category') }}">
                    <i class="fa fa-th"></i> <span>Kategori Artikel</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('artikel') }}">
                    <i class="fa fa-th"></i> <span>Artikel</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('galeri') }}">
                    <i class="fa fa-th"></i> <span>Gallery</span>
                    </a>
                </li>
                </ul>
              </section>
              <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 1.0.0
            </div>
            </footer>
            <div class="control-sidebar-bg"></div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin_template/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin_template/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('admin_template/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin_template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin_template/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_template/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin_template/dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <script>
      var konten = document.getElementById("isi");
      CKEDITOR.replace(konten,{
        language:'en-gb'
      });
      CKEDITOR.config.allowedContent = true;
    </script>
</body>
</html>
