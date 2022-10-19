<head>
	<title>Laporan Data Pegawai</title>
  <link rel="stylesheet" type="style/css" href="../public/css/bootstrap.min.css">
</head>

	<center>
		<h4>RAPOR PELANGGARAN SISWA</h4>
    <br>
	</center>
		
		
	<div class="card-body">
          <div class="row">
              <div class="col-md-4"> <pre>NISN                        : {{$siswa->nisn}}</pre></div>
          </div>

            <div class="row">
              <div class="col-md-4"> <pre>Nama                        : {{$siswa->nama}}</pre></div>
            </div>

            <div class="row">
              <div class="col-md-4"> <pre>Kelas                       : {{$siswa->kelas->kelas}}</pre></div>
            </div>

            <div class="row">
              <div class="col-md-4"> <pre>Tempat, Tanggal Lahir       : {{$siswa->tempat_lahir}}, {{isset($siswa->tgl_lahir) ? date('d-m-Y', strtotime($siswa->tgl_lahir)) : ''}}</pre></div>
            </div>

            <div class="row">
              <div class="col-md-4"> <pre>Jenis Kelamin               :@if($siswa->jns_kelamin == 'L') Laki-laki @else Perempuan @endif</pre></div>
            </div>

            <div class="row">
              <div class="col-md-4"> <pre>Agama                       : {{$siswa->agama}}</pre></div>
            </div>

            <div class="row">
              <div class="col-md-4"> <pre>No HP                  : {{$siswa->no_telp}}</pre></div>
            </div>

            <div class="row">
              <div class="col-md-4"> <pre>Total Poin Pelanggaran      : {{$totalPoin->total}}</pre></div>
            </div>
             
          </div>
        </div>

        <br>
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
            </tr>
            @endforeach
          </tbody>
        </table>
