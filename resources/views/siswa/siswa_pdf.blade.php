<head>
	<title>Laporan Data Pegawai</title>
  <link rel="stylesheet" type="style/css" href="../public/css/bootstrap.min.css">
</head>

	<center>
    <b style="font-size: 10px">PEMERINTAH PROVINSI JAWA TIMUR DINAS PENDIDIKAN
      <br>
      <b style="font-size: 12px">SEKOLAH MENENGAH KEJURUAN NEGERI 1 SURABAYA</b></b>
      <i style="font-size: 8px">
      <br>
      Jl. SMEA No. 4 Wonokromo Telp. 031-8292038 FAX. 031- 8292039, Email : info@smkn1-sby.sch.id, 60243
      </i>
      <br>
    <br>

      <b style="font-size: 12px">LAPORAN PELANGGARAN TENGAH SEMESETER
        <br>
      TAHUN PELAJARAN {{date('Y', strtotime($tahun))}}</b>
	</center>

  {{-- Logo SMKN 1 --}}
  <img src="../public/img/icon.png" style="opacity:0.1;
  position:fixed;
  width:220px;
  bottom:270px;
  left:230px; "/>

  {{-- logo kemendikbud surabaya --}}
  <img src="../public/img/kemendik.png" style="position:fixed;
  width:80px;
  bottom:960px;
  left:80px; "/>
		
  <div class="card-body">
    <div class="row">
      <div class="col-md-4"> <pre>Nama                   : {{$siswa->nama}}</pre></div>
    </div>
    
    <div class="row">
        <div class="col-md-4"> <pre>NISN                   : {{$siswa->nisn}}</pre></div>
    </div>

      <div class="row">
        <div class="col-md-4"> <pre>Kelas                  : {{$siswa->kelas->kelas}}</pre></div>
      </div>

      <div class="row">
        <div class="col-md-4"> <pre>Tempat, Tanggal Lahir  : {{$siswa->tempat_lahir}}, {{isset($siswa->tgl_lahir) ? date('d-m-Y', strtotime($siswa->tgl_lahir)) : ''}}</pre></div>
      </div>

      <div class="row">
        <div class="col-md-4"> <pre>Jenis Kelamin          :@if($siswa->jns_kelamin == 'L') Laki-laki @else Perempuan @endif</pre></div>
      </div>

      <div class="row">
        <div class="col-md-4"> <pre>Agama                  : {{$siswa->agama}}</pre></div>
      </div>

      <div class="row">
        <div class="col-md-4"> <pre>No HP                  : {{$siswa->no_telp}}</pre></div>
      </div>

      <div class="row">
        <div class="col-md-4"> <pre>Total Poin Pelanggaran : {{isset($totalPoin->total) ? ($totalPoin->total). ' poin' : ''}}</pre></div>
      </div>

    </div>
  </div>

  <table class="table table-bordered" style="font-size: 12px">
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
        <td>{{$p->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <b style="font-size: 12px">Catatan Penanganan</b>
  <table class="table table-bordered" style="font-size: 12px">
    <thead class="thead">
      <tr>
        <th>No</th>
        <th>Tindak Lanjut</th>
        <th>Status Penanganan</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach($penanganan as $p)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{$p->catatan}}</td>
        <td>{{$p->status}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <center>
    <p style="font-size: 12px; position:fixed; right:1px;"> Surabaya, {{date('d-m-Y', strtotime($tahun))}}
      <br>
      Guru Tatib
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    (............................................)
  </p>
  </center>
  
