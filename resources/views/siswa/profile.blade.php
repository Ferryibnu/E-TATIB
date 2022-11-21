@extends('layouts.head')
@section('konten')

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
          <div class="card shadow mb-4 mt-4">
            <div class="card-header">
              <h5 class="m-0 font-weight-bold text-dark text-center">{{$siswa->nama}}</h5>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-4"> NISN </div>
                  <div class="col-8"> :&emsp;{{$siswa->nisn}}</div>
              </div>
              <hr>

              <div class="row">
                <div class="col-4"> Nama </div>
                <div class="col-8"> :&emsp;{{$siswa->nama}}</div>
              </div>
              <hr>

              <div class="row">
                <div class="col-4"> Tempat, Tgl Lahir</div>
                <div class="col-8"> :&emsp;{{$siswa->tempat_lahir}} {{isset($siswa->tgl_lahir) ? ', '.date('d F Y', strtotime($siswa->tgl_lahir)) : ''}}</div>
              </div>
              <hr>

              <div class="row">
                <div class="col-4"> Kelas</div>
                <div class="col-8"> :&emsp;{{ $siswa->kelas->kelas }}</div>
              </div>
              <hr>

              <div class="row">
                <div class="col-4"> Jenis Kelamin</div>
                <div class="col-8"> :&emsp;@if($siswa->jns_kelamin == 'L') Laki-laki @else Perempuan @endif</div>
              </div>
              <hr>

              <div class="row">
                <div class="col-4"> Agama</div>
                <div class="col-8"> :&emsp;{{ $siswa->agama }}</div>
              </div>
              <hr>

              <div class="row">
                <div class="col-4"> No HP</div>
                <div class="col-8"> :&emsp;{{ $siswa->no_telp }}</div>
              </div>
              <hr>

              <div class="row">
                <div class="col-4"> Penghargaan</div>
                <div class="col-8"> :&emsp;{{isset($siswa->penghargaan->kriteria) ? $siswa->penghargaan->kriteria. ' ('.$siswa->penghargaan->poin. ' poin)' : ''}}</div>
              </div>
              <hr>
        
              <div class="qr text-center mt-4 mb-1">
                {!! $qrCode !!}
              </div>

            </div>
          </div>
        </div> 
    </div> 

    <div class="row justify-content-center tabel-pel">
      <div class="col-12 col-md-10">
        <div class="card shadow mb-4 mt-4">
          <div class="card-header">
            <h5 class="m-0 font-weight-bold text-dark text-center">Data Pelanggaran</h5>
          </div>
          <div class="card-body">
            <p>Total Poin Pelanggaran : {{isset($total) ? ($total) . ' poin': ''}}</p>
            <table class="table table-bordered-ded">
              <thead class="thead">
                <tr>
                  <th>No</th>
                  <th>Pelanggaran</th>
                  <th>Poin</th>
                  <th>Pencatat</th>
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
                  <td>{{$p->pencatat}}</td>
                  <td>{{date('d-m-Y H:i:s', strtotime($p->created_at))}}</td>
                </tr>
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