@extends('layouts.head')
@section('konten')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card shadow mt-4">
          <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-dark card-title">Data Siswa dengan Pelanggaran Ringan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Pelanggaran Terakhir</th>
                <th>Total Poin</th>
                <th>Tindak Lanjut</th>
                <th>Status</th>
                <th>Waktu Pelanggaran</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                {{-- Total Poin --}}
                @foreach($ringan as $s)
                @php
                  $total = $totalPoin->where('siswa_id', $s->siswa_id);
                  
                  foreach ($total as $tot) {
                  }

                  if(isset($tot->siswa_id)) {
                    if($tot->siswa_id == $s->siswa_id){
                      $t = $tot;
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
                <td>{{ $s->siswa->nisn }}</td>
                <td>{{ $s->siswa->nama }}</td>
                <td>{{ $s->pelanggaran->pelanggaran }}</td>
                <td>{{ $t->total }}</td>
                <td>{{ $s->catatan }}</td>
                <td>
                  @if ($s->status == "Belum Selesai")
                    <span class="badge badge-danger">{{ $s->status }}</span>
                  @else
                    <span class="badge badge-success">{{ $s->status }}</span>
                  @endif 
                </td>
                <td>{{ date('d-m-Y / H:i:s', strtotime($s->created_at)) }}</td>
                <td>
                  @if ($s->status == "Belum Selesai")
                    <button type="button" title="Edit" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#ModalEdit{{$s->id}}"><i class="fa fa-edit"></i></button>
                  @endif  
                </td>
              </tr>

                {{-- Modal Edit/Konfirmasi Status --}}
                <div class="modal fade" id="ModalEdit{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Anda yakin ingin melakukan Konfirmasi Status Pelanggaran?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <a href="/penanganan/edit/{{$s->id}}" class="btn btn-primary">Iya</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal --}}
                
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