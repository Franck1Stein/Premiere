@include('layouts.header')

      <div id="app" class="wrapper">

      @include('layouts.navbar')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="{{ asset('/img/logo.svg') }}" alt="FastFurious Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Fast Furious</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
              <img src="{{ asset('/img/admin1.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
              <a href="#" class="d-block">
                {{ Auth::user()->name }}
              </a>
            </div>

          </div>

          <!-- Sidebar Menu -->
          @include('layouts.sidebar')
          <!-- /.sidebar-menu -->

        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <div class="content">

          <div class="container-fluid">

            <router-view></router-view>

          </div><!-- /.container-fluid -->

        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      @include('layouts.copyRightFooter')

    </div>
    <!-- ./wrapper -->

@include('layouts.footer')
