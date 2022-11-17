@extends('layouts.head')
@section('konten')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card shadow mt-4">
          <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-dark card-title">Data Siswa</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('tambah_siswa')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Tab 1 -->

                    <div class="form-row">
                      <div class="form-group col-md-6" >
                        <label for="inputStatus">NISN</label>
                        <input id="nisn" type="text" class="form-control" name="nisn" required>
                      </div>

                      <div class="form-group col-md-6" >
                        <label for="inputStatus">Nama</label>
                        <input required id="nama" type="text" class="form-control" name="nama">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3" >
                        <label for="inputStatus">Kelas</label>
                        <select class="form-control select2bs4" name="kelas" style="width: 100%;" required>
                            @foreach($kelas as $kls)
                              <option value="{{$kls->id}}">{{$kls->kelas}}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="form-group col-md-4" >
                        <label for="inputStatus">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir">
                      </div>

                      <div class="form-group col-md-5" >
                        <label for="inputStatus">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3" >
                        <label for="inputStatus">Agama</label>
                          <select required name="agama" id="inputUser" class="form-control" >
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Khatolik">Khatolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                          </select>
                      </div>

                      <div class="form-group col-md-4" >
                        <label for="inputStatus">Jenis Kelamin</label>
                          <select required name="jns_kelamin" id="inputKelamin" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                          </select>
                      </div>

                      <div class="form-group col-md-5" >
                        <label for="inputStatus">No HP</label>
                        <input type="text" class="form-control" name="no_telp">
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

            <!-- Import Excel -->
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">
        
                      {{ csrf_field() }}
        
                      <label>Pilih file excel</label>
                      <div class="form-group">
                        <input type="file" name="file" required="required">
                      </div>
                        
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            {{-- Modal Reset --}}
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
                    Anda yakin ingin menghapus semua data siswa?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="/siswa/reset" class="btn btn-primary">Iya</a>
                  </div>
                </div>
              </div>
            </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Total Poin</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                {{-- Total Poin --}}
                @foreach($siswa as $s)
                @php
                  $total = $totalPoin->where('siswa_id', $s->id);
                  
                  foreach ($total as $tot) {
                  }

                  if(isset($tot->siswa_id)) {
                    if($tot->siswa_id == $s->id){
                      if(isset($s->penghargaan->poin)) {
                          $t = $tot->total-$s->penghargaan->poin;
                      } else {
                          $t = $tot->total;
                      }
                    } else {
                      $t = '';
                    }
                  } else {
                    $tot = '';
                  }
                @endphp
                {{-- End Total --}}

              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nisn }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->kelas->kelas }}</td>
                <td> {{isset($t) ? ($t) : ''}}</td>
                <td>
                  <a class="btn btn-sm btn-secondary" title="Preview" href="/siswa/profile/{{$s->id}}"><i class="fa fa-list"></i></a>
                  <a target="_blank" href="/siswa/cetak_pdf/{{$s->id}}" type="button" title="Pdf" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf"></i></a>
                  <button type="button" title="Edit" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#ModalEdit{{$s->id}}"><i class="fa fa-edit"></i></button>
                  <button type="button" title="Hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalHapus{{$s->id}}"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              
              <!--  modal delete -->
              <div class="modal fade" id="ModalHapus{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <a href="/siswa/hapus/{{$s->id}}" class="btn btn-primary">Iya</a>
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Modal Delete --}}

              {{-- Modal Edit --}}
              <div class="modal fade" id="ModalEdit{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <form action="/siswa/edit/{{$s->id}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
              
                          <div class="form-row">
                            <div class="form-group col-md-4" >
                              <label for="inputStatus">NISN</label>
                              <input id="nisn" type="text" value="{{$s->nisn}}" class="form-control" name="nisn" disabled>
                            </div>
      
                            <div class="form-group col-md-8" >
                              <label for="inputStatus">Nama</label>
                              <input id="nama" type="text" value="{{$s->nama}}" class="form-control" name="nama" required>
                            </div>
                          </div>
      
                          <div class="form-row">
                            <div class="form-group col-md-3" >
                              <label for="inputStatus">Kelas</label>
                              <select class="form-control select2bs4" name="kelas" style="width: 100%;" required>
                                  @foreach($kelas as $kls)
                                    <option value="{{$kls->id}}"@if($s->kelas_id == $kls->id) selected @endif>{{$kls->kelas}}</option>
                                  @endforeach
                                </select>
                            </div>
      
                            <div class="form-group col-md-4" >
                              <label for="inputStatus">Tempat Lahir</label>
                              <input type="text" class="form-control" value="{{$s->tempat_lahir}}" name="tempat_lahir" required>
                            </div>
      
                            <div class="form-group col-md-5" >
                              <label for="inputStatus">Tanggal Lahir</label>
                              <input type="date" class="form-control" name="tgl_lahir" value="{{$s->tgl_lahir}}">
                            </div>
                          </div>
      
                          <div class="form-row">
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">Agama</label>
                                <select required name="agama" id="inputUser" class="form-control">
                                  <option value="{{$s->agama}}">{{$s->agama}}</option>
                                  <option value="Islam">Islam</option>
                                  <option value="Kristen">Kristen</option>
                                  <option value="Khatolik">Khatolik</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="Buddha">Buddha</option>
                                </select>
                            </div>
      
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">No HP</label>
                              <input type="text" class="form-control" name="no_telp" value="{{$s->no_telp}}">
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
        <a class="dropdown-item" data-toggle="modal" data-target="#tambahModal" href="#" title="Tambah Data Siswa">Tambah Siswa</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#importExcel" href="#" title="Import Data Siswa">Import Excel Siswa</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#ModalReset" href="#" title="Hapus Semua">Hapus Semua</a>
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
                columns: [1,2,3,4]
            }
       },
       {
           extend: 'copy',
           title: '',
           footer: false,
           exportOptions: {
            columns: [1,2,3,4]
            }
       },
       {
           extend: 'excel',
           title: '',
           footer: false,
           exportOptions:  {
            columns: [1,2,3,4]
            }
       }         
    ]  
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- /.content -->
@endsection