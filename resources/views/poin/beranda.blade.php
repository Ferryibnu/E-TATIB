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
    
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-table mr-1"></i>
              Tabel Pelanggaran Triwulan
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto mt-2">
                
                <li class="nav-item">
                  <a class="nav-link active" href="#jan" data-toggle="tab">Jan-Mar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#apr" data-toggle="tab">Apr-Mei</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#jul" data-toggle="tab">Jul-Sep</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#okt" data-toggle="tab">Okt-Des</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="jan" style="position: relative;">
                <table class="table table-responsive table-bordered text-center" style="font-size: 17.25px">
                  <thead class="thead">
                    <tr>
                      <th colspan="3">Januari</th>
                      <th colspan="3">Februari</th>
                      <th colspan="3">Maret</th>
                    </tr>
                    <tr>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> {{$ringan_jan}} </td>
                      <td> {{$sedang_jan}} </td>
                      <td> {{$berat_jan}} </td>
                      <td> {{$ringan_feb}} </td>
                      <td> {{$sedang_feb}} </td>
                      <td> {{$berat_feb}} </td>
                      <td> {{$ringan_mar}} </td>
                      <td> {{$sedang_mar}} </td>
                      <td> {{$berat_mar}} </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="chart tab-pane" id="apr" style="position: relative;">
                <table class="table table-responsive table-bordered text-center" style="font-size: 17.25px">
                  <thead class="thead">
                    <tr>
                      <th colspan="3">April</th>
                      <th colspan="3">Mei</th>
                      <th colspan="3">Juni</th>
                    </tr>
                    <tr>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> {{$ringan_apr}} </td>
                      <td> {{$sedang_apr}} </td>
                      <td> {{$berat_apr}} </td>
                      <td> {{$ringan_may}} </td>
                      <td> {{$sedang_may}} </td>
                      <td> {{$berat_may}} </td>
                      <td> {{$ringan_june}} </td>
                      <td> {{$sedang_june}} </td>
                      <td> {{$berat_june}} </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="chart tab-pane" id="jul" style="position: relative;">
                <table class="table table-responsive table-bordered text-center" style="font-size: 17.25px">
                  <thead class="thead">
                    <tr>
                      <th colspan="3">Juli</th>
                      <th colspan="3">Agustus</th>
                      <th colspan="3">September</th>
                    </tr>
                    <tr>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> {{$ringan_july}} </td>
                      <td> {{$sedang_july}} </td>
                      <td> {{$berat_july}} </td>
                      <td> {{$ringan_aug}} </td>
                      <td> {{$sedang_aug}} </td>
                      <td> {{$berat_aug}} </td>
                      <td> {{$ringan_sep}} </td>
                      <td> {{$sedang_sep}} </td>
                      <td> {{$berat_sep}} </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="chart tab-pane" id="okt" style="position: relative;">
                <table class="table table-responsive table-bordered text-center" style="font-size: 17.25px">
                  <thead class="thead">
                    <tr>
                      <th colspan="3">Oktober</th>
                      <th colspan="3">November</th>
                      <th colspan="3">Desember</th>
                    </tr>
                    <tr>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                      <td>Ringan</td>
                      <td>Sedang</td>
                      <td>Berat</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> {{$ringan_oct}} </td>
                      <td> {{$sedang_oct}} </td>
                      <td> {{$berat_oct}} </td>
                      <td> {{$ringan_nov}} </td>
                      <td> {{$sedang_nov}} </td>
                      <td> {{$berat_nov}} </td>
                      <td> {{$ringan_dec}} </td>
                      <td> {{$sedang_dec}} </td>
                      <td> {{$berat_dec}} </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-file mr-1"></i>Report Tindak Lanjut</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          @if ($sumTindak == 0)
              
          @else
            <div class="card-body">
              <div class="progress-group">
                Panggilan Wali Kelas 
                <span class="float-right"><b>({{ substr($badge_ringan / $sumTindak * 100, 0,5,)}}%) {{$badge_ringan}}</b>/{{$sumTindak}}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: {{ substr($badge_ringan / $sumTindak * 100, 0,5,)}}%"></div>
                </div>
              </div>
              <div class="progress-group">
                Panggilan Orang Tua 
                <span class="float-right"><b>({{ substr($badge_sedang / $sumTindak * 100, 0,5,)}}%) {{$badge_sedang}}</b>/{{$sumTindak}}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width: {{ substr($badge_sedang / $sumTindak * 100, 0,5,)}}%"></div>
                </div>
              </div>
              <div class="progress-group">
                Skorsing
                <span class="float-right"><b>({{ substr($badge_berat / $sumTindak * 100, 0,5,)}}%) {{$badge_berat}}</b>/{{$sumTindak}}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: {{ substr($badge_berat / $sumTindak * 100, 0,5,)}}%"></div>
                </div>
              </div>
              <div class="progress-group">
                Dikeluarkan
                <span class="float-right"><b>({{ substr($DO / $sumTindak * 100, 0,5,)}}%) {{$DO}}</b>/{{$sumTindak}}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-dark" style="width: {{ substr($DO / $sumTindak * 100, 0,5,)}}%"></div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
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

    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
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
              <div class="chart tab-pane active" id="kelas" style="position: relative; height: 525px;">
                  <canvas id="chart5" height="500" style="height: 500px;"></canvas>
              </div>
              <div class="chart tab-pane" id="jurusan" style="position: relative; height: 525px;">
                <canvas id="chart7" height="500" style="height: 500px;"></canvas>
              </div>
              <div class="chart tab-pane" id="kategori" style="position: relative; height: 525px;">
                <canvas id="chart6" height="500" style="height: 500px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fa fa-percent mr-1"></i>
              Persentase
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto mt-2">
                
                <li class="nav-item">
                  <a class="nav-link active" href="#kel" data-toggle="tab"> Kelas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#jurus" data-toggle="tab">Jurusan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#katego" data-toggle="tab">Kategori</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              @if ($sumKelas == 0)
                  
              @else
                <div class="tab-pane active" id="kel">
                  <div class="progress-group">
                    Kelas 10 
                    <span class="float-right"><b>({{ substr($kelas10 / $sumKelas * 100, 0,5,)}}%) {{$kelas10}}</b>/{{$sumKelas}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($kelas10 / $sumKelas * 100, 0,5,)}}%; background-color: rgba(255, 26, 104, 0.5);"></div>
                    </div>
                  </div>
                  
                  <div class="progress-group">
                    Kelas 11 
                    <span class="float-right"><b>({{ substr($kelas11 / $sumKelas * 100, 0,5,)}}%) {{$kelas11}}</b>/{{$sumKelas}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($kelas11 / $sumKelas * 100, 0,5,)}}%; background-color: rgba(54, 162, 235, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    Kelas 12 
                    <span class="float-right"><b>({{ substr($kelas12 / $sumKelas * 100, 0,5,)}}%) {{$kelas12}}</b>/{{$sumKelas}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($kelas12 / $sumKelas * 100, 0,5,)}}%; background-color: rgba(255, 206, 86, 0.7);"></div>
                    </div>
                  </div>
                </div>
              @endif
              <!-- Morris chart - Sales -->
              @if ($sumJurusan == 0)
                  
              @else
                <div class="tab-pane" id="jurus">
                  <div class="progress-group">
                    TKJ 
                    <span class="float-right"><b>({{ substr($tkj / $sumJurusan * 100, 0,5,)}}%) {{$tkj}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($tkj / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(255, 193, 7, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    RPL 
                    <span class="float-right"><b>({{ substr($rpl / $sumJurusan * 100, 0,5,)}}%) {{$rpl}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($rpl / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(255, 102, 0, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    PH 
                    <span class="float-right"><b>({{ substr($ph / $sumJurusan * 100, 0,5,)}}%) {{$ph}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($ph / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(255, 102, 0, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    DKV 
                    <span class="float-right"><b>({{ substr($dkv / $sumJurusan * 100, 0,5,)}}%) {{$dkv}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($dkv / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(0, 0, 0, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    MM 
                    <span class="float-right"><b>({{ substr($mm / $sumJurusan * 100, 0,5,)}}%) {{$mm}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($mm / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(54, 162, 235, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    PSPT 
                    <span class="float-right"><b>({{ substr($pspt / $sumJurusan * 100, 0,5,)}}%) {{$pspt}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($pspt / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(255, 26, 104, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    AK 
                    <span class="float-right"><b>({{ substr($ak / $sumJurusan * 100, 0,5,)}}%) {{$ak}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($ak / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(220, 53, 69, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    AKL 
                    <span class="float-right"><b>({{ substr($akl / $sumJurusan * 100, 0,5,)}}%) {{$akl}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($akl / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(186, 6, 6, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    BD 
                    <span class="float-right"><b>({{ substr($bd / $sumJurusan * 100, 0,5,)}}%) {{$bd}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($bd / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(174, 55, 255, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    BDP 
                    <span class="float-right"><b>({{ substr($bdp / $sumJurusan * 100, 0,5,)}}%) {{$bdp}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($bdp / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(0, 206, 209, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    MP 
                    <span class="float-right"><b>({{ substr($mp / $sumJurusan * 100, 0,5,)}}%) {{$mp}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($mp / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(0, 206, 139, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    OTKP 
                    <span class="float-right"><b>({{ substr($otkp / $sumJurusan * 100, 0,5,)}}%) {{$otkp}}</b>/{{$sumJurusan}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($otkp / $sumJurusan * 100, 0,5,)}}%; background-color: rgba(0, 0, 209, 0.5);"></div>
                    </div>
                  </div>
                </div> 
              @endif
              
              @if ($sumKategori == 0)
                  
              @else
                <div class="tab-pane" id="katego">
                  <div class="progress-group">
                    Sikap Perilaku
                    <span class="float-right"><b>({{ substr($sikap / $sumKategori * 100, 0,5,)}}%) {{$sikap}}</b>/{{$sumKategori}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($sikap / $sumKategori * 100, 0,5,)}}%; background-color: rgba(255, 26, 104, 0.5);"></div>
                    </div>
                  </div>
                  
                  <div class="progress-group">
                    Kerajinan
                    <span class="float-right"><b>({{ substr($kerajinan / $sumKategori * 100, 0,5,)}}%) {{$kerajinan}}</b>/{{$sumKategori}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($kerajinan / $sumKategori * 100, 0,5,)}}%; background-color: rgba(54, 162, 235, 0.5);"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    Kerapian 
                    <span class="float-right"><b>({{ substr($kerapian / $sumKategori * 100, 0,5,)}}%) {{$kerapian}}</b>/{{$sumKategori}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar" style="width: {{ substr($kerapian / $sumKategori * 100, 0,5,)}}%; background-color: rgba(255, 206, 86, 0.7);"></div>
                    </div>
                  </div>
                </div>
              @endif
              
            </div>
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
        'rgba(255,255,204, 1)',
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

// PIE CHART Jurusan
$(function(){
  var Data7 = {
      labels  : ['TKJ', 'RPL', 'PH', 'DKV', 'MM', 'PSPT', 'AK', 'AKL', 'BD', 'BDP', 'MP', 'OTKP'],
      datasets: [{
      data: [{{$tkj}}, {{$rpl}}, {{$ph}}, {{$dkv}}, {{$mm}}, {{$pspt}}, {{$ak}}, {{$akl}}, {{$bd}}, {{$bdp}}, {{$mp}}, {{$otkp}}],
      backgroundColor: [
        'rgba(255, 193, 7, 0.4)',
        'rgba(255, 102, 0, 0.4)',
        'rgba(255, 102, 0, 0.4)',
        'rgba(0, 0, 0, 0.4)',
        'rgba(54, 162, 235, 0.4)',
        'rgba(255, 26, 104, 0.4)',
        'rgba(220, 53, 69, 0.1)',
        'rgba(186, 6, 6, 0.4)',
        'rgba(174, 55, 255, 0.4)',
        'rgba(0, 206, 209, 0.4)',
        'rgba(0, 206, 139, 0.4)',
        'rgba(0, 0, 209, 0.4)',
      ],
      borderColor: [
        'rgba(255, 193, 7, 1)',
        'rgba(255, 102, 0, 1)',
        'rgba(0, 134, 49, 1)',
        'rgba(0, 0, 0, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 26, 104, 1)',
        'rgba(220, 53, 69, 0.5)',
        'rgba(186, 6, 6, 1)',
        'rgba(174, 55, 255, 1)',
        'rgba(0, 206, 209, 1)',
        'rgba(0, 206, 139, 1)',
        'rgba(0, 0, 209, 1)',
      ],
      borderWidth: 1
    }]
    }
    var barChartCanvas = $('#chart7').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, Data7)

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