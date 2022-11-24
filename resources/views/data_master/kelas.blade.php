@extends('layouts.head')
@section('konten')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card shadow mt-4">
          <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-dark card-title">Data Master Kelas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Master Kelas </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('tambah_kelas')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Tab 1 -->

                    <div class="form-row">
                      <div class="form-group col-md-12" >
                        <label for="inputStatus">Kelas </label>
                        <input required type="text" class="form-control" name="kelas">
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
                <th>Kelas </th>
                <th>Jurusan </th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                
              @foreach($kelas as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->kelas}}</td>
                <td>{{ $s->jurusan}}</td>
                <td>
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
                      <a href="/kelas/hapus/{{$s->id}}" class="btn btn-primary">Iya</a>
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
                          <form action="/kelas/edit/{{$s->id}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
              
                          <div class="form-row">
                            <div class="form-group col-md-12" >
                              <label for="inputStatus">Kelas </label>
                              <input type="text" value="{{$s->kelas}}" class="form-control" name="kelas" required>
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
        <a class="dropdown-item" data-toggle="modal" data-target="#tambahModal" href="#" title="Tambah kelas ">Tambah Data</a>
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