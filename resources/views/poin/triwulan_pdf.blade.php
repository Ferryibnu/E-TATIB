<head>
	<title>Laporan Data Pegawai</title>
  <link rel="stylesheet" type="style/css" href="../public/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../public/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/AdminLTE/dist/css/adminlte.min.css">
  {{-- sweetalert --}}
  <link rel="stylesheet" href="../public/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../public/AdminLTE/plugins/toastr/toastr.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../public/AdminLTE/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../public/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<div class="chart tab-pane active" id="triwulan1" style="position: relative; height: 400px;">
  <canvas id="chart1" height="400" style="height: 400px;"></canvas>
</div>


<script src="../public/AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery -->
<script src="../public/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../public/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../public/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../public/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../public/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../public/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../public/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../public/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../public/AdminLTE/plugins/pdfmake/pdfmake.min.js}"></script>
<script src="../public/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../public/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../public/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../public/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/AdminLTE/dist/js/demo.js"></script>
{{-- SCAN QR CODE --}}
<script src="{{ asset ('js/html5-qrcode.min.js') }}" type="text/javascript"></script>
<!-- ChartJS -->
<script src="../public/AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- dropzonejs -->
<script src="../public/AdminLTE/plugins/dropzone/min/dropzone.min.js"></script>
<!-- Select2 -->
<script src="../public/AdminLTE/plugins/select2/js/select2.full.min.js"></script>

<script>
   $(function(){
  var Data1 = {
      labels  : [{{$bulan}}, {{$bulan1}}, {{$bulan2}}],
      datasets: [
        {
          label               : 'Ringan',
          backgroundColor     : 'rgba(40, 167, 69, 1)',
          borderColor         : 'rgba(40, 167, 69, 1)',
          pointRadius          : false,
          pointColor          : '#28a746',
          pointStrokeColor    : 'rgba(40, 167, 69, 1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$ringan}}, {{$ringan1}}, {{$ringan2}}]
        },
        {
          label               : 'Sedang',
          backgroundColor     : 'rgba(255, 193, 7, 1)',
          borderColor         : 'rgba(255, 193, 7, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(255, 193, 7, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$sedang}}, {{$sedang1}}, {{$sedang2}}]
        },
        {
          label               : 'Berat',
          backgroundColor     : 'rgba(220, 53, 69, 1)',
          borderColor         : 'rgba(220, 53, 69, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(220, 53, 69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$berat}}, {{$berat1}}, {{$berat2}}]
        },
      ]
    }
    var barChartCanvas = $('#chart1').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data1)
    var temp0 = Data1.datasets[0]
    var temp1 = Data1.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
})
</script>