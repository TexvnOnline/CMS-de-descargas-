<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    @yield('title')
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {!! Html::style('adminlte/plugins/fontawesome-free/css/all.min.css') !!}
  {!! Html::style('adminlte/plugins/ekko-lightbox/ekko-lightbox.css') !!}
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  {!! Html::style('adminlte/dist/css/adminlte.min.css') !!}
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{!!asset('adminlte/dist/img/AdminLTELogo.png')!!}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{!!asset('adminlte/dist/img/user2-160x160.jpg')!!}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{!! Auth::user()->name !!}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

               {{-- Usuarios --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Roles --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('roles.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>

          {{--  Categorías  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Categorías 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{--  Articulos  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Artículos 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('articles.pending')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendientes</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('articles.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista completa</p>
                </a>
              </li>

            </ul>
          </li>
           {{--  TAGS  --}}
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Etiquetas 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tags.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tags.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>

          {{--  Red social  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-google-plus-g"></i>
              <p>
                Red social 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('socials.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('socials.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>
          {{--  Publicidad  --}}
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ad"></i>
              <p>
                Publicidad 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('covers.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('covers.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista</p>
                </a>
              </li>
            </ul>
          </li>

          {{--  DONACIONES  --}}
          <li class="nav-item has-treeview">
            <a href="{{route('donations.index')}}" class="nav-link">
              <i class="nav-icon fab fa-cc-paypal"></i>
              <p>
                Donaciones 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              @yield('title')
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Inicio</a></li>
              @yield('breadcrumb')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      @if (session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" >
        {{session('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <!-- Default box -->
      @yield('content')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3-pre
    </div>
    <strong>Copyright &copy; 2020-2025 <a href="http://lanube.cu.ma">LaNube.cu.ma</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
{!! Html::script('adminlte/plugins/jquery/jquery.min.js') !!}
 {!! Html::script('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')!!}
{!! Html::script('adminlte/plugins/filterizr/jquery.filterizr.min.js') !!}
{!! Html::script('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js') !!}
{!! Html::script('https://unpkg.com/axios/dist/axios.min.js') !!}
{!! Html::script('https://cdn.jsdelivr.net/npm/sweetalert2@9') !!}
{!! Html::script('adminlte/dist/js/adminlte.min.js') !!}
{!! Html::script('adminlte/dist/js/demo.js') !!}
{!! Html::script('adminlte/plugins/filterizr/jquery.filterizr.min.js') !!}
@yield('scripts') 
</body>
</html>
