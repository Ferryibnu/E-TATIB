@extends('layouts.head')
@section('konten')
<section class="content">
  <div class="container-fluid">
    <div class="col-sm-6">
      <h1 class="m-0">Dashboard</h1>
    </div>
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
          <a href="/siswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <i class="fa fa-file"></i>
          </div>
          <a href="/poin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$cowok}}</h3>

            <p>Siswa Laki-laki</p>
          </div>
          <div class="icon">
            <i class="fa fa-male"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$cewek}}</h3>

            <p>Siswa Perempuan</p>
          </div>
          <div class="icon">
            <i class="fa fa-female"></i>
          </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
     <!-- BAR CHART -->
     <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Grafik Pelanggaran</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="chart1" style="min-height: 250px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- /.container-fluid -->
  </section>
  
<script>
  $(function(){
  // Data Chart Januari-Maret
  var Data1 = {
      labels  : ['Januari', 'Februari', 'Maret','April', 'Mei', 'Juni'],
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
          data                : [{{$ringan_jan}}, {{$ringan_feb}}, {{$ringan_mar}}, {{$ringan_apr}}, {{$ringan_may}}, {{$ringan_june}}]
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
          data                : [1, 2, 4]
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
          data                : [1, 1, 3]
        },
      ]
    }
    

    var Data2 = {
      labels  : ['Juli', 'Agustus', 'September','Oktober', 'November', 'Desember'],
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
          data                : [{{$ringan_july}}, {{$ringan_aug}}, {{$ringan_sep}}, {{$ringan_oct}}, {{$ringan_nov}}, {{$ringan_dec}}]
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
          data                : [1, 2, 4]
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
          data                : [1, 1, 3]
        },
      ]
    }
    var barChartCanvas = $('#chart1').get(0).getContext('2d')
    if({{$today}} >= {{$july}}) {
      var barChartData = $.extend(true, {}, Data2)
      var temp0 = Data2.datasets[0]
      var temp1 = Data2.datasets[1]
    } else {
      var barChartData = $.extend(true, {}, Data1)
      var temp0 = Data1.datasets[0]
      var temp1 = Data1.datasets[1]
    }
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

@endsection