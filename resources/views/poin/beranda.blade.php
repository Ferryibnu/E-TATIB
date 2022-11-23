@extends('layouts.head')
@section('konten')
<section class="content active">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row mt-3">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$total_siswa}}</h3>

            <p>Total Siswa</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{route('siswa')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$total_pelanggar}}</h3>

            <p>Siswa yang Melanggar</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="{{route('catat')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$pelanggaran}}</h3>

            <p>Total Pelanggaran</p>
          </div>
          <div class="icon">
            <i class="fa fa-file"></i>
          </div>
          <a href="{{route('catat')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$prestasi}}</h3>

            <p>Siswa Berprestasi</p>
          </div>
          <div class="icon">
            <i class="fa fa-award"></i>
          </div>
            <a href="{{route('awards')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
     <!-- BAR CHART -->
     <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-bar mr-1"></i>
          Grafik Triwulan
        </h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto mt-2">
            
            <li class="nav-item">
              <a class="nav-link active" href="#triwulan1" data-toggle="tab"> Januari-Maret</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#triwulan2" data-toggle="tab">April-Juni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#triwulan3" data-toggle="tab">Juli-September</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#triwulan4" data-toggle="tab">Oktober-Desember</a>
            </li>
          </ul>
        </div>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content p-0">
          <!-- Morris chart - Sales -->
          <div class="chart tab-pane active" id="triwulan1" style="position: relative; height: 400px;">
              <canvas id="chart1" height="400" style="height: 400px;"></canvas>
           </div>
          <div class="chart tab-pane" id="triwulan2" style="position: relative; height: 400px;">
            <canvas id="chart2" height="400" style="height: 400px;"></canvas>
          </div>
          <div class="chart tab-pane" id="triwulan3" style="position: relative; height: 400px;">
              <canvas id="chart3" height="400" style="height: 400px;"></canvas>
           </div>
          <div class="chart tab-pane" id="triwulan4" style="position: relative; height: 400px;">
            <canvas id="chart4" height="400" style="height: 400px;"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-bar mr-1"></i>
          Grafik Pelangaran Berdasarkan
        </h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto mt-2">
            
            <li class="nav-item">
              <a class="nav-link active" href="#kelas" data-toggle="tab"> Kelas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#jurusan" data-toggle="tab">Jurusan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kategori" data-toggle="tab">Kategori</a>
            </li>
          </ul>
        </div>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content p-0">
          <!-- Morris chart - Sales -->
          <div class="chart tab-pane active" id="kelas" style="position: relative; height: 400px;">
              <canvas id="chart5" height="400" style="height: 400px;"></canvas>
           </div>
           <div class="chart tab-pane" id="jurusan" style="position: relative; height: 400px;">
             <canvas id="chart7" height="400" style="height: 400px;"></canvas>
           </div>
          <div class="chart tab-pane" id="kategori" style="position: relative; height: 400px;">
            <canvas id="chart6" height="400" style="height: 400px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // Data Chart Januari-Maret
  $(function(){
  var Data = {
      labels  : ['Januari', 'Februari', 'Maret'],
      datasets: [
        {
          label               : 'Ringan',
          backgroundColor     : 'rgba(40, 167, 69, 0.4)',
          borderColor         : 'rgba(40, 167, 69, 1)',
          borderWidth         : 1,
          pointRadius          : false,
          pointColor          : '#28a746',
          pointStrokeColor    : 'rgba(40, 167, 69, 1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$ringan_jan}}, {{$ringan_feb}}, {{$ringan_mar}}]
        },
        {
          label               : 'Sedang',
          backgroundColor     : 'rgba(255, 193, 7, 0.4)',
          borderColor         : 'rgba(255, 193, 7, 1)',
          borderWidth         : 1,
          pointRadius         : false,
          pointColor          : 'rgba(255, 193, 7, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$sedang_jan}}, {{$sedang_feb}}, {{$sedang_mar}}]
        },
        {
          label               : 'Berat',
          backgroundColor     : 'rgba(220, 53, 69, 0.4)',
          borderColor         : 'rgba(220, 53, 69, 1)',
          borderWidth         : 1,
          pointRadius         : false,
          pointColor          : 'rgba(220, 53, 69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$berat_jan}}, {{$berat_feb}}, {{$berat_mar}}]
        },
      ]
    }
    var barChartCanvas = $('#chart1').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data)
    var temp0 = Data.datasets[0]
    var temp1 = Data.datasets[1]
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

// Data Chart April-Juni
$(function(){
  var Data2 = {
      labels  : ['April', 'Mei', 'Juni'],
      datasets: [
        {
          label               : 'Ringan',
          backgroundColor     : 'rgba(40, 167, 69, 0.4)',
          borderColor         : 'rgba(40, 167, 69, 1)',
          borderWidth         : 1,
          pointRadius          : false,
          pointColor          : '#28a746',
          pointStrokeColor    : 'rgba(40, 167, 69, 1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$ringan_apr}}, {{$ringan_may}}, {{$ringan_june}}]
        },
        {
          label               : 'Sedang',
          backgroundColor     : 'rgba(255, 193, 7, 0.4)',
          borderColor         : 'rgba(255, 193, 7, 1)',
          borderWidth         : 1,
          pointRadius         : false,
          pointColor          : 'rgba(255, 193, 7, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$sedang_apr}}, {{$sedang_may}}, {{$sedang_june}}]
        },
        {
          label               : 'Berat',
          backgroundColor     : 'rgba(220, 53, 69, 0.4)',
          borderColor         : 'rgba(220, 53, 69, 1)',
          borderWidth         : 1,
          pointRadius         : false,
          pointColor          : 'rgba(220, 53, 69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$berat_apr}}, {{$berat_may}}, {{$berat_june}}]
        },
      ]
    }
    var barChartCanvas = $('#chart2').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data2)
    var temp0 = Data2.datasets[0]
    var temp1 = Data2.datasets[1]
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

// Data Chart Juli-September
$(function(){
    var Data3 = {
      labels  : ['Juli', 'Agustus', 'September'],
      datasets: [
        {
          label               : 'Ringan',
          backgroundColor     : 'rgba(40, 167, 69, 0.4)',
          borderColor         : 'rgba(40, 167, 69, 1)',
          borderWidth         : 1,
          pointRadius          : false,
          pointColor          : '#28a746',
          pointStrokeColor    : 'rgba(40, 167, 69, 1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$ringan_july}}, {{$ringan_aug}}, {{$ringan_sep}}]
        },
        {
          label               : 'Sedang',
          backgroundColor     : 'rgba(255, 193, 7, 0.4)',
          borderColor         : 'rgba(255, 193, 7, 1)',
          borderWidth         : 1,
          pointRadius         : false,
          pointColor          : 'rgba(255, 193, 7, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$sedang_july}}, {{$sedang_aug}}, {{$sedang_sep}}]
        },
        {
          label               : 'Berat',
          backgroundColor     : 'rgba(220, 53, 69, 0.4)',
          borderColor         : 'rgba(220, 53, 69, 1)',
          borderWidth         : 1,
          pointRadius         : false,
          pointColor          : 'rgba(220, 53, 69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$berat_july}}, {{$berat_aug}}, {{$berat_sep}}]
        },
      ]
    }
    var barChartCanvas = $('#chart3').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data3)
    var temp0 = Data3.datasets[0]
    var temp1 = Data3.datasets[1]
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

// Data Chart Oktober-Desember
$(function(){
    var Data4 = {
      labels  : ['Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Ringan',
          backgroundColor     : 'rgba(40, 167, 69, 0.4)',
          borderColor         : 'rgba(40, 167, 69, 1)',
          borderWidth         : 1,
          pointRadius          : false,
          pointColor          : '#28a746',
          pointStrokeColor    : 'rgba(40, 167, 69, 1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$ringan_oct}}, {{$ringan_nov}}, {{$ringan_dec}}]
        },
        {
          label               : 'Sedang',
          backgroundColor     : 'rgba(255, 193, 7, 0.4)',
          borderColor         : 'rgba(255, 193, 7, 1)',
          borderWidth         : 1,
          pointRadius         : false,
          pointColor          : 'rgba(255, 193, 7, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$sedang_oct}}, {{$sedang_nov}}, {{$sedang_dec}}]
        },
        {
          label               : 'Berat',
          backgroundColor     : 'rgba(220, 53, 69, 0.4)',
          borderColor         : 'rgba(220, 53, 69, 1)',
          borderWidth         : 1,
          pointRadius         : false,
          pointColor          : 'rgba(220, 53, 69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$berat_oct}}, {{$berat_nov}}, {{$berat_dec}}]
        },
      ]
    }
    var barChartCanvas = $('#chart4').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data4)
    var temp0 = Data4.datasets[0]
    var temp1 = Data4.datasets[1]
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

// PIE CHART Kelas
$(function(){
  var Data1 = {
      labels  : ['10', '11', '12'],
      datasets: [{
      label: 'Weekly Sales',
      data: [{{$kelas10}}, {{$kelas11}}, {{$kelas12}}],
      backgroundColor: [
        'rgba(255, 26, 104, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(0, 0, 0, 0.2)'
      ],
      borderColor: [
        'rgba(255, 26, 104, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(0, 0, 0, 1)'
      ],
      borderWidth: 1
    }]
    }
    var barChartCanvas = $('#chart5').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data1)

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'pie',
      data: barChartData,
      options: barChartOptions
    })
})

// PIE CHART Kategori
$(function(){
  var Data6 = {
      labels  : ['Sikap Perilaku', 'Kerajinan', 'Kerapian'],
      datasets: [{
      label: 'Weekly Sales',
      data: [{{$sikap}}, {{$kerajinan}}, {{$kerapian}}],
      backgroundColor: [
        'rgba(255, 26, 104, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(0, 0, 0, 0.2)'
      ],
      borderColor: [
        'rgba(255, 26, 104, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(0, 0, 0, 1)'
      ],
      borderWidth: 1
    }]
    }
    var barChartCanvas = $('#chart6').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data6)

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'pie',
      data: barChartData,
      options: barChartOptions
    })
})
</script>


@endsection