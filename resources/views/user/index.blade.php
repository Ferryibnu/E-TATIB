@extends('layouts.head')
@section('konten')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card shadow mt-4">
          <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-dark card-title">Data User Admin</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('tambah_user')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Tab 1 -->

                    <div class="form-row">
                      <div class="form-group col-md-6" >
                        <label for="inputStatus">Nama</label>
                        <input required type="text" class="form-control" name="name">
                      </div>
                      <div class="form-group col-md-6" >
                        <label for="inputStatus">Status</label>
                        <select class="form-control" name="status" style="width: 100%;" required>
                            <option value="Tim Tatib">Tim Tatib</option>
                            <option value="Koordinator">Koordinator Tim Tatib</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6" >
                        <label for="inputStatus">Email</label>
                        <input required type="text" class="form-control" name="email">
                      </div>

                      <div class="form-group col-md-6" >
                        <label for="inputStatus">Password</label>
                        <input required type="text" class="form-control" name="password" value="TIMTATIB123">
                      </div>
                    </div>

                    <label for="inputStatus">Foto</label>
                    <br>
                    <input type="file" name="image"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />

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
                <th>Nama</th>
                <th>Email</th>
                <th>Image</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                
              @foreach($user as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->email }}</td>
                @if ($s->image)
                  <td>
                    <img src={{ $s->image }} height="150px" width="150px"  style="width: 150px; height: 150px;
                    margin: auto;
                    display: block;"> 
                  </td>
                @else
                  <td></td>
                @endif
                <td>{{ $s->status }}</td>
                <td>
                  <button type="button" title="Hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalHapus{{$s->id}}"><i class="fa fa-trash"></i></button>
                  <button type="button" title="Edit" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#ModalEdit{{$s->id}}"><i class="fa fa-edit"></i></button>
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
                      <a href="/user/hapus/{{$s->id}}" class="btn btn-primary">Iya</a>
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Modal Delete --}}
             
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
                          <form action="/user/edit/{{$s->id}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
              
                          <div class="form-row">
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">Nama</label>
                              <input required type="text" class="form-control" name="name" value="{{$s->name}}">
                            </div>
      
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">Status</label>
                              <select class="form-control" name="status" style="width: 100%;" required>
                                  <option value="{{$s->status}}">{{$s->status}}</option>
                                  <option value="Tim Tatib">Tim Tatib</option>
                                  <option value="Koordinator">Koordinator Tim Tatib</option>
                              </select>
                            </div>
                          </div>

                          <label for="inputStatus">Foto</label>
                          <br>
                          <input type="file" name="image"
                              class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                          <br>
                          @if ($s->image)
                            <h6>Foto Lama</h6>
                            <img src={{ $s->image }} style="max-width: 150px; max-height: 150px"> 
                          @endif
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
        <a class="dropdown-item" data-toggle="modal" data-target="#tambahModal" href="#" title="Tambah User">Tambah User</a>
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