<x-laravel-ui-adminlte::adminlte-layout>
    @stack('page-css')
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                    class="img-circle elevation-2" alt="User Image">
                                <p>
                                    {{ Auth::user()->nom_users }}
                                    {{ Auth::user()->prenoms_users }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{ route('utilisateurs.edit', Auth::user()->id_users) }}" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('PanelAdministration::includes.old.navigation_old')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="page-header">
                    <div class="row">
                        @stack('page-header')
                    </div>
                </div>
                @yield('content')
            </div>

            <!-- Main Footer -->
            
        </div>
        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Powered by </b> <a href="http://www.mastersolut.com" target="_blank">MasterSolut</a>
          </div>
          <strong>Copyright &copy;  <script>document.write(new Date().getFullYear());</script> <a href="javascript:void(0)" target="_blank"></a>.</strong> All rights reserved.
        </footer>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
