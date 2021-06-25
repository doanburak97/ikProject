<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('includes.header')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('vendors/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
{{--            <div class="form-inline">--}}
{{--                <div class="input-group" data-widget="sidebar-search">--}}
{{--                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"--}}
{{--                           aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-sidebar">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
{{--                        <a href="#" class="nav-link active">--}}
{{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                            <p>--}}
{{--                                Starter Pages--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="\companies" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Companies</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="\employees" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employees</p>
                                </a>
                            </li>
                        </ul>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-th"></i>--}}
{{--                            <p>--}}
{{--                                Simple Link--}}
{{--                                <span class="right badge badge-danger">New</span>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <div class="content">
            <div class="card-body">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    @include('includes.footer')

</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
<!-- Datatables.net -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</body>
</html>

