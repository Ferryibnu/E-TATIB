@extends('layouts.head')
@section('konten')

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-9 col-md-10">
          <div class="card shadow mb-4 mt-4">
            <div class="card-header">
              <h5 class="m-0 font-weight-bold text-dark text-center">{{$siswa->nama}}</h5>
            </div>
            <div class="card-body">
              <div class="row ml-5">
                  <div class="col-md-4"> NISN </div>
                  <div class="col-md-8"> :&emsp;{{$siswa->nisn}}</div>
              </div>
              <hr>

              <div class="row ml-5">
                <div class="col-md-4"> Nama </div>
                <div class="col-md-8"> :&emsp;{{$siswa->nama}}</div>
              </div>
              <hr>

              <div class="row ml-5">
                <div class="col-md-4"> Tempat, Tanggal Lahir</div>
                <div class="col-md-8"> :&emsp;{{$siswa->tempat_lahir}} {{isset($siswa->tgl_lahir) ? ', '.date('d-m-Y', strtotime($siswa->tgl_lahir)) : ''}}</div>
              </div>
              <hr>

              <div class="row ml-5">
                <div class="col-md-4"> Kelas</div>
                <div class="col-md-8"> :&emsp;{{ $siswa->kelas->kelas }}</div>
              </div>
              <hr>

              <div class="row ml-5">
                <div class="col-md-4"> Jenis Kelamin</div>
                <div class="col-md-8"> :&emsp;@if($siswa->jns_kelamin == 'L') Laki-laki @else Perempuan @endif</div>
              </div>
              <hr>

              <div class="row ml-5">
                <div class="col-md-4"> Agama</div>
                <div class="col-md-8"> :&emsp;{{ $siswa->agama }}</div>
              </div>
              <hr>

              <div class="row ml-5">
                <div class="col-md-4"> No HP</div>
                <div class="col-md-8"> :&emsp;{{ $siswa->no_telp }}</div>
              </div>
              <hr>
        
              <div class="qr text-center mt-4 mb-1">
                {!! $qrCode !!}
              </div>

            </div>
          </div>
        </div> 
    </div> 

    <div class="row justify-content-center">
      <div class="col-9 col-md-10">
        <div class="card shadow mb-4 mt-4">
          <div class="card-header">
            <h5 class="m-0 font-weight-bold text-dark text-center">Data Pelanggaran</h5>
          </div>
          <div class="card-body">
            <p>Total Poin Pelanggaran : {{isset($totalPoin->total) ? ($totalPoin->total) : ''}}</p>
            <table class="table">
              <thead class="thead-light" style="left:1%;">
                <tr>
                  <th>No</th>
                  <th>Pelanggaran</th>
                  <th>Poin</th>
                  <th>Waktu Pelanggaran</th>
                </tr>
              </thead>
              <tbody>
                @php $i=1 @endphp
                @foreach($siswaPoin as $p)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$p->pelanggaran->pelanggaran}}</td>
                  <td>{{$p->pelanggaran->poin}}</td>
                  <td>{{$p->created_at}}</td>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div> 
  </div> 
</div> 
</section>
@endsection