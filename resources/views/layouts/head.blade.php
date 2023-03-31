<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/gif/png" href="{{ asset('img/icon.png') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>E-TATIB SMKN 1 SURABAYA</title>
  <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  {{-- sweetalert --}}
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/toastr/toastr.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <style>
    .qr{
      position: relative;
    }
    .float{
      position:fixed;
      width:70px;
      height:70px;
      bottom:70px;
      right:60px; 
      font-size: 24px;
      background-color: transparent;
      text-transform: uppercase;
      color: rgb(3, 82, 167);
      font-weight: bold;
      box-shadow: inset 0 0 0 rgb(0, 123, 255);
      transition: 0.6s ease-out;
      border-radius:50px;
      text-align:center;
    }
    
    .float:hover{
      color: #fff;
      box-shadow: inset 70px 0 0 rgb(0, 123, 255);;
    }

    .my-float{
      margin-top:22px;
      text-shadow: 1px 1px 0 #000;
    } 
    
    .dropdown .dropdown-menu .dropdown-item:hover {
      color: #fff;
      background-color: rgb(3, 82, 167);
    }
    @media (max-width: 600px)
    {
      .image-e 
      {
        display: none;
      }
    }
  </style>

<style>
  .chartMenu {
    background: #1A1A1A;
  }
  .chartMenu p {
    font-size: 20px;
  }
  .chartCard {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .chartBox {
    width: 400px;
    border-radius: 20px;
    background: white;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mb-3">
	    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <span><strong>{{ Auth::user()->name }} </strong></span>
              <img class="image-e rounded-circle" src="{{ asset('img/user.png') }}" style="width: 40px; margin-left: 10px;" alt="User Image">
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="margin-left: -10px;">
          <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout')}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{ asset('img/icon.png') }}" style="opacity: .8; width:37px; margin-left: 9px;">
      <span class="brand-text font-weight-light ml-2"> <b> E-TATIB SMKN 1</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            @if (Route::current()->getName() == 'dashboard')
              <a href="{{route('dashboard')}}" class="nav-link active">
            @else
              <a href="{{route('dashboard')}}"  class="nav-link">
            @endif
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if (Route::current()->getName() == 'siswa')
              <a href="{{route('siswa')}}" class="nav-link active">
            @else
              <a href="{{route('siswa')}}"  class="nav-link">
            @endif
              <i class="nav-icon fas fa-users"></i>
              <span class="badge badge-success right">{{ $total_siswa }}</span>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if (Route::current()->getName() == 'catat')
              <a href="{{route('catat')}}" class="nav-link active">
            @else
              <a href="{{route('catat')}}"  class="nav-link">
            @endif
              <i class="nav-icon fas fa-edit"></i>
              <span class="badge badge-danger right">{{ $total_pelanggaran }}</span>
              <p>
                Catat Pelanggaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if (Route::current()->getName() == 'awards')
              <a href="{{route('awards')}}" class="nav-link active">
            @else
              <a href="{{route('awards')}}"  class="nav-link">
            @endif
              <i class="nav-icon fas fa-award"></i>
              {{-- <span class="badge badge-danger right">{{ $total_pelanggaran }}</span> --}}
              <p>
                Catat Penghargaan
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if (Route::current()->getName() == 'ringan' || Route::current()->getName() == 'sedang' || Route::current()->getName() == 'berat')
              <a href="#" class="nav-link active">
            @else
              <a href="#"  class="nav-link">
            @endif
              <i class="nav-icon fa fa-user"></i>
              <p>
                Penanganan Lanjut
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ringan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <span class="badge badge-success right">{{ $badge_ringan }}</span>
                  <p>Kategori Ringan</p>
                </a>
                <a href="{{route('sedang')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <span class="badge badge-warning right">{{ $badge_sedang }}</span>
                  <p>Kategori Sedang</p>
                </a>
                <a href="{{route('berat')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <span class="badge badge-danger right">{{ $badge_berat }}</span>
                  <p>Kategori Berat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if (Route::current()->getName() == 'riwayat')
              <a href="{{route('riwayat')}}" class="nav-link active">
            @else
              <a href="{{route('riwayat')}}"  class="nav-link">
            @endif
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Riwayat Pelanggaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if (Route::current()->getName() == 'pelanggaran' || Route::current()->getName() == 'tindak' || Route::current()->getName() == 'penghargaan')
              <a href="#" class="nav-link active">
            @else
              <a href="#"  class="nav-link">
            @endif
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pelanggaran')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-dark"></i>
                  <p>Data Pelanggaran</p>
                </a>
                <a href="{{route('penghargaan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-dark"></i>
                  <p>Data Penghargaan</p>
                </a>
                <a href="{{route('tindak')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-dark"></i>
                  <p>Tindak Lanjut</p>
                </a>
                <a href="{{route('kelas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-dark"></i>
                  <p>Kelas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if (Route::current()->getName() == 'user')
              <a href="{{route('user')}}" class="nav-link active">
            @else
              <a href="{{route('user')}}"  class="nav-link">
            @endif
              <i class="nav-icon fas fa-user-plus"></i>
              {{-- <span class="badge badge-danger right">{{ $total_pelanggaran }}</span> --}}
              <p>
                User
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
        @yield('konten')
  </div>

  <footer class="main-footer">
    
    <strong>E-TATIB SMKN 1 SURABAYA &copy; 2022 <a href="https://github.com/Ferryibnu/E-TATIB">- Ferry Ibnu Al Faruq</a>.</strong> 3120510802.
    <div class="float-right d-none d-sm-block">
      <b>D3 PJJ TI B</b> / 2020
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">

  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>

@include('sweetalert::alert')
</body>
</html>

