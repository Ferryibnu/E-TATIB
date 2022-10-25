<head>
	<title>Laporan Data Pegawai</title>
  <link rel="stylesheet" type="style/css" href="../public/css/bootstrap.min.css">
</head>

<div class="chart tab-pane active" id="triwulan1" style="position: relative; height: 400px;">
  <canvas id="chart1" height="400" style="height: 400px;"></canvas>
</div>


<<link rel="stylesheet"  type="text/javascript" src="../public/AdminLTE/plugins/chart.js/Chart.min.js">

<script type="text/javascript">
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