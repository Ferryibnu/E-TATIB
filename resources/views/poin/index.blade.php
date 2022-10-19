@extends('layouts.head')
@section('konten')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    {{-- notifikasi sukses --}}
    @if ($sukses = $poinTotal)
    @foreach($sukses as $s)
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
        Peringatan untuk <strong>{{ $s->nama }}</strong> Karena <strong>{{ $s->pelanggaran }} {{ $s->total }}x</strong>
    </div>
    @endforeach
    @endif

    <div class="row">
      <div class="col-12">
        <div class="card shadow mt-4">
          <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-dark card-title">Data Siswa yang Melanggar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
             <!--  modal Reset -->

             <div class="modal fade" id="ModalReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Anda yakin ingin melakukan reset data?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="/poin/reset" class="btn btn-primary">Iya</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="/poin/tambah/proses" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Tab 1 -->

                    <div class="form-row">
                      <div class="form-group col-md-6" >
                        <label for="inputStatus">NISN</label>
                        <input id="result" type="text" class="form-control" name="nisn" required>
                      </div>

                      <div class="form-group col-md-6" >
                        <label for="inputStatus">Nama Pencatat</label>
                        <input id="pencatat" type="text" class="form-control" name="pencatat">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12" >
                        <label for="inputStatus">Pelanggaran</label>
                         <select class="form-control select2bs4" name="pelanggaran_id" style="width: 100%;" required>
                            @foreach($pelanggaran as $p)
                              <option value="{{$p->id}}">{{$p->pelanggaran}}  (Poin: {{$p->poin}})</option>
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

            <!-- Modal Scan QR Code -->
            <div class="modal fade" id="scanQr" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <!-- Scan -->
                    <div id="reader"></div>

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
                <th>Pelanggaran</th>
                <th>Poin</th>
                <th>Pencatat</th>
                <th>catatan</th>
                <th>Waktu Pelanggaran</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach($siswaPoin as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->siswa->nisn }}</td>
                <td>{{ $s->siswa->nama }}</td>
                <td>{{ $s->pelanggaran->pelanggaran }}</td>
                <td>{{ $s->pelanggaran->poin }}</td>
                <td>{{ $s->pencatat }}</td>
                <td>{{ $s->catatan }}</td>
                <td>{{ date('d-m-Y / H:i:s', strtotime($s->created_at)) }}</td>
                <td>
                  <a class="btn btn-sm btn-secondary" title="Preview" href="/siswa/profile/{{$s->siswa_id}}"><i class="fa fa-list"></i></a>
                  <a target="_blank" href="/siswa/cetak_pdf/{{$s->siswa_id}}" type="button" title="Pdf" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf"></i></a>
                  <button type="button" title="Edit" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#ModalEdit{{$s->id}}"><i class="fa fa-edit"></i></button>
                  <button type="button" title="Hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDelete{{$s->id}}"><i class="fa fa-trash"></i></button>
                </td>
              </tr>

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
                          <form action="/poin/edit/{{$s->id}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
              
                          <div class="form-row">
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">NISN</label>
                              <input id="result" type="text" class="form-control" name="nisn" value="{{$s->siswa->nisn}}" disabled>
                            </div>
      
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">Nama Pencatat</label>
                              <input id="pencatat" type="text" class="form-control" name="pencatat" value="{{$s->pencatat}}">
                            </div>
                          </div>
      
                          <div class="form-row">
                            <div class="form-group col-md-12" >
                              <label for="inputStatus">Pelanggaran</label>
                                <select class="form-control select2bs4" name="pelanggaran_id" style="width: 100%;" required>
                                  @foreach($pelanggaran as $pel)
                                    <option selected="selected" value="{{$pel->id}}" @if($s->pelanggaran_id == $pel->id) selected @endif>{{$pel->pelanggaran}} (Poin: {{$pel->poin}})</option>
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
                      <a href="/poin/hapus/{{$s->id}}" class="btn btn-primary">Iya</a>
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
    <div class="drop">
      <a class="float" href="#" title="Tambah Data Pegawai">
        <i class="fa fa-plus my-float"></i>
      </a>
      <div class="drop-content">
        <a data-toggle="modal" data-target="#tambahModal" href="#" title="Tambah Data Pelanggar">Tambah Pelanggar</a>
        <a data-toggle="modal" data-target="#scanQr" href="#" title="Scan QR Code">Scan QR Siswa</a>
        <a data-toggle="modal" data-target="#ModalReset" href="#" title="Reset Data">Reset Data Pelanggaran</a>
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
<!-- /.content -->
@endsection