@extends('layouts.head')
@section('konten')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card shadow mt-4">
          <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-dark card-title">Riwayat Pelanggaran</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Pelanggaran</th>
                <th>Poin</th>
                <th>Pencatat</th>
                <th>Waktu Pelanggaran</th>
              </tr>
              </thead>
              <tbody>
                @foreach($riwayat as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->siswa->nisn }}</td>
                <td>{{ $s->siswa->nama }}</td>
                <td>{{ $s->pelanggaran->pelanggaran }}</td>
                <td>{{ $s->pelanggaran->poin }}</td>
                <td>{{ $s->pencatat }}</td>
                <td>{{ date('d-m-Y / H:i:s', strtotime($s->tgl_pelanggaran)) }}</td>
              </tr>
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