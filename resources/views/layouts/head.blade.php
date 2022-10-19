<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/gif/png" href="{{ asset('img/icon.png') }}">
  <title>E-TATIB SMKN 1 SURABAYA</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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
      color: rgb(0, 123, 255);
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

        /* The container <div> - needed to position the dropdown content */
    .drop {
      position: fixed;
      display: inline-block;
      width:70px;
      height:70px;
      bottom:120px;
      right:80px; 
    }

    /* drop Content (Hidden by Default) */
    .drop-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    /* Links inside the drop */
    .drop-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color of drop links on hover */
    .drop-content a:hover {
      background-color:rgb(0, 123, 255);
      color: white;
    }

    /* Show the drop menu on hover */
    .drop:hover .drop-content {
      display: block;
    }

    /* Change the background color of the drop button when the drop content is shown */
    .drop:hover .float {
      background-color: rgb(0, 123, 255);
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
            <span>{{ Auth::user()->name }}</span>
            <img src="{{ asset('img/user.png') }}" style="width: 40px" alt="User Image">
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="AdminLTE/index3.html" class="brand-link">
      <img src="{{ asset('img/icon.png') }}" style="opacity: .8; width:37px; margin-left: 9px;">
      <span class="brand-text font-weight-light ml-2"> E-TATIB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/siswa" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <span class="badge badge-info right">{{ $total_siswa }}</span>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/poin" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <span class="badge badge-danger right">{{ $total_pelanggaran }}</span>
              <p>
                Catat Pelanggaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Penanganan Lanjut
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="penanganan/berat" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <span class="badge badge-danger right">1</span>
                  <p>Kategori Berat</p>
                </a>
                <a href="penanganan/sedang" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <span class="badge badge-warning right">1</span>
                  <p>Kategori Sedang</p>
                </a>
                <a href="penanganan/ringan" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <span class="badge badge-success right">1</span>
                  <p>Kategori Ringan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/riwayat" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <span class="badge badge-light right">{{ $riwayatPelanggaran }}</span>
              <p>
                Riwayat Pelanggar
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
    
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
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
<script src="{{asset('AdminLTE/plugins/pdfmake/pdfmake.min.js}')}}"></script>
<script src="{{asset('AdminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
{{-- SCAN QR CODE --}}
<script src="{{ asset ('js/html5-qrcode.min.js') }}" type="text/javascript"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('AdminLTE/plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  function onScanSuccess(decodedText, decodedResult) {
    
    // handle the scanned code as you like, for example:
    // console.log(`Code matched = ${decodedText}`, decodedResult);
    $("#result").val(decodedText)
    $('#tambahModal').modal('show')
    $('#scanQr').modal('hide')

  }

  function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    console.warn(`Code scan error = ${error}`);
  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
  html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

@include('sweetalert::alert')
</body>
</html>

