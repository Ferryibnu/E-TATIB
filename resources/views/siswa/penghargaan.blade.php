@extends('layouts.head')
@section('konten')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    {{-- notifikasi sukses --}}
    {{-- @if ($sukses = $poinTotal)
    @foreach($sukses as $s)
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
        Peringatan untuk <strong>{{ $s->nama }}</strong> Karena <strong>{{ $s->Penghargaan }} {{ $s->total }}x</strong>
    </div>
    @endforeach
    @endif --}}

    <div class="row">
      <div class="col-12">
        <div class="card shadow mt-4">
          <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-dark card-title">Data Siswa Berprestasi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Catat Penghargaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('catat_penghargaan')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Tab 1 -->

                    <div class="form-row">
                      <div class="form-group col-md-5" >
                        <label for="inputStatus">NISN</label>
                        <input id="nisn" type="text" class="form-control" name="nisn"  onkeyup="nisnSiswa()" required>
                      </div>

                      <div class="form-group col-md-7" >
                        <label for="inputStatus">Nama</label>
                        <input id="nama" type="text" class="form-control" name="nama" disabled>
                      </div>

                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4" >
                        <label for="inputStatus">Kelas</label>
                        <input id="kelas" type="text" class="form-control" name="kelas" disabled>
                      </div>

                      <div class="form-group col-md-8">
                        <label for="inputStatus">Penghargaan</label>
                         <select class="form-control select2bs4" name="penghargaan_id" style="width: 100%;" required>
                            @foreach($awards as $p)
                              <option value="{{$p->id}}">{{$p->kriteria}}  ({{$p->poin}} Poin)</option>
                            @endforeach
                          </select>
                      </div>
                    </div>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah</button></form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal -->


            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Penghargaan</th>
                <th>Poin</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach($siswa_awards as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$s->nisn}}</td>
                <td>{{$s->nama}}</td>
                <td>{{ $s->kelas->kelas }}</td>
                <td>{{ $s->penghargaan->kriteria }}</td>
                <td>{{ $s->penghargaan->poin }}</td>
                <td>
                  <a class="btn btn-sm btn-secondary" title="Preview" href="/siswa/profile/{{$s->id}}"><i class="fa fa-list"></i></a>
                  <a target="_blank" href="/siswa/cetak_pdf/{{$s->id}}" type="button" title="Pdf" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf"></i></a>
                  <button type="button" title="Edit" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#ModalEdit{{$s->id}}"><i class="fa fa-edit"></i></button>
                  <button type="button" title="Hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDelete{{$s->id}}"><i class="fa fa-trash"></i></button>
                </td>
              </tr>

              <!--  modal delete -->

              <div class="modal fade" id="ModalDelete{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin ingin menghapus?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <a href="/awards/hapus/{{$s->id}}" class="btn btn-primary">Iya</a>
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Delete --}}

              {{-- Modal Edit --}}
              <div class="modal fade" id="ModalEdit{{$s->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home{{$s->id}}" role="tabpanel" aria-labelledby="home-tab{{$s->id}}">
                          <form action="/awards/edit/{{$s->id}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
              
                          <div class="form-row">
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">NISN</label>
                              <input id="nisn" type="text" class="form-control" name="nisn" value="{{$s->nisn}}" disabled>
                            </div>
      
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">Nama</label>
                              <input id="nama" type="text" class="form-control" name="pencatat" value="{{$s->nama}}" disabled>
                            </div>
                          </div>
      
                          <div class="form-row">
                            <div class="form-group col-md-4" >
                              <label for="inputStatus">Kelas</label>
                              <input id="kelas" type="text" class="form-control" name="pencatat" value="{{$s->kelas->kelas}}" disabled>
                            </div>
                            <div class="form-group col-md-8" >
                              <label for="inputStatus">Penghargaan</label>
                                <select class="form-control select2bs4" name="penghargaan_id" style="width: 100%;" required>
                                  @foreach($awards as $pel)
                                    <option selected="selected" value="{{$pel->id}}" @if($s->penghargaan_id == $pel->id) selected @endif>{{$pel->kriteria}} ({{$pel->poin}} Poin)</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>
              
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button></form>
                    </div>
                  </div>
                </div>
              </div>

                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <div class="dropdown">
      <a class="float"  role="button" id="dropdownMenuButton" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-plus my-float"></i>
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" data-toggle="modal" data-target="#tambahModal" href="#" title="Tambah Penghargaan">Catat Penghargaan</a>
        <br>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
{{-- Data Tables AdminLTE --}}
<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": [
       {
           extend: 'print',
           title: '',
           footer: false,
           exportOptions: {
                columns: [1,2,3,4,5,6]
            }
       },
       {
           extend: 'copy',
           title: '',
           footer: false,
           exportOptions: {
            columns: [1,2,3,4,5,6]
            }
       },
       {
           extend: 'excel',
           title: '',
           footer: false,
           exportOptions:  {
            columns: [1,2,3,4,5,6]
            }
       }         
    ]  
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

{{-- SCAN QR CODE --}}
<script src="{{ asset ('js/html5-qrcode.min.js') }}" type="text/javascript"></script>

{{-- //HTML 5 QR SCANNER --}}
<script>
  function onScanSuccess(decodedText, decodedResult) {
    
    // handle the scanned code as you like, for example:
    // console.log(`Code matched = ${decodedText}`, decodedResult);
    $("#nisn").val(decodedText)
    $('#tambahModal').modal('show')
    $('#scanQr').modal('hide');
    var nisn = $('#nisn').val();
    console.log(nisn);
    $.ajax({
      url: "{{route('autofill')}}",
      data: { nisn: +nisn, _token: '{{csrf_token()}}' },
      method: 'post',
        success: function(data)
        {
          $("#nama").val(data.nama)
          $("#kelas").val(data.kelas);
        }
    });
  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
  html5QrcodeScanner.render(onScanSuccess);
</script>

<script>
 function nisnSiswa() {
    var nisn = $('#nisn').val();
    console.log(nisn);
    $.ajax({
      url: "{{route('autofill')}}",
      data: { nisn: +nisn, _token: '{{csrf_token()}}' },
      method: 'post',
        success: function(data)
        {
          $("#nama").val(data.nama),
          $("#kelas").val(data.kelas);
        }
    });
  }
</script>
<!-- /.content -->
@endsection