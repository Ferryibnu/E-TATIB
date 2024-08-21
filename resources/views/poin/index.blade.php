@extends('layouts.head')
@section('konten')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    {{-- notifikasi sukses --}}
    <div class="alert alert-warning alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
      Tutorial memberikan permisson QR Scanner ada <a href="#" data-toggle="modal" data-target="#ModalTutor" title="Download Template Excel"><u>disini</u></a>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card shadow mt-4">
          <div class="card-header py-3">
            @if ($date)
              <h3 class="m-0 font-weight-bold text-dark card-title">Pelanggaran Tanggal {{ $date }}</h3>  
            @else
              <h3 class="m-0 font-weight-bold text-dark card-title">Semua Pelanggaran</h3>
            @endif
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{route('catat')}}" id="pilih">
              <div class="form-row">
                <div class="form-group col-md-4" >Tanggal Awal: 
                  <input type="date" name="tgl_awal" id="tgl_awal" >
                  {{-- <noscript>
                    <input type="submit" value="submit">
                  </noscript> --}}
                </div>
                <div class="form-group col-md-4" >Tanggal Akhir: 
                  <input type="date" name="tgl_akhir" id="tgl_akhir" >
                </div>
                <div class="form-group col-md-4 text-right" >
                  <button type="submit" class="btn btn-primary" >Kirim</button>
                  <button type="submit" id="tgl" name="tgl" value="all" class="btn btn-success">Tampilkan Semua</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Catat Pelanggaran</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="{{route('catat_pelanggaran')}}" method="POST" enctype="multipart/form-data">
                              {{ csrf_field() }}
          
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                      <label for="selectSiswa">Nama Siswa<span style="color: red;">&#42;</span></label>
                                      <select id="selectSiswa" class="form-control select2bs4" name="siswa_id" style="width: 100%;" required></select>
                                  </div>
                              </div>
          
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                      <label for="selectPelanggaran">Pelanggaran<span style="color: red;">&#42;</span></label>
                                      <select id="selectPelanggaran" class="form-control select2bs4" name="pelanggaran_id" style="width: 100%;" required>
                                          @foreach($pelanggaran as $p)
                                              <option value="{{ $p->id }}">{{ $p->pelanggaran }} (Poin: {{ $p->poin }})</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="tanggalPelanggaran">Tanggal Pelanggaran<span style="color: red;">&#42;</span></label>
                                  <input type="datetime-local" class="form-control" id="tanggalPelanggaran" name="tanggal_pelanggaran" required>
                                </div>
                              </div>
          
                          </div>
                          <div class="modal-footer">
                              <button id="submitButton" type="submit" class="btn btn-primary">Tambah</button>
                          </div>
                      </form>
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

                    <!-- Scan QR-->
                    <div id="reader"></div>

                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal -->

            <!-- Modal Tutor -->
            <div class="modal fade" id="ModalTutor" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tutorial Permission QR Scanner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <iframe src="https://drive.google.com/file/d/1xyELrwkjR98lsaYy1cykn17l_jMh_72A/preview"  width="100%" frameborder="0" height="450px" allow="autoplay"></iframe>
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
                <th>Pelanggaran</th>
                <th>Poin</th>
                <th>Waktu Pelanggaran</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach($siswaPoin as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$s->siswa->nisn}}</td>
                <td>{{$s->siswa->nama}}</td>
                <td>{{ $s->siswa->kelas->kelas }}</td>
                <td>{{ $s->pelanggaran->pelanggaran }}</td>
                <td>{{ $s->pelanggaran->poin }}</td>
                <td>{{ date('d-m-Y / H:i:s', strtotime($s->created_at)) }}</td>
                <td>
                  <a class="btn btn-sm btn-secondary" title="Preview" href="/siswa/profile/{{$s->siswa_id}}"><i class="fa fa-list"></i></a>
                  <a target="_blank" href="/siswa/cetak_pdf/{{$s->siswa_id}}" type="button" title="Pdf" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf"></i></a>
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
                      <a href="/poin/hapus/{{$s->id}}" class="btn btn-primary">Iya</a>
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
                          <form action="/poin/edit/{{$s->id}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
              
                          <div class="form-row">
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">NISN</label>
                              <input id="nisn1" type="text" class="form-control" name="nisn" value="{{$s->siswa->nisn}}" disabled>
                            </div>
      
                            <div class="form-group col-md-6" >
                              <label for="inputStatus">Tgl Pelanggaran</label>
                              <input id="tgl" type="date" class="form-control" name="tgl" value="{{$s->tgl}}">
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

                @endforeach
              </tbody>
            </table>
              {{-- {{ $siswaPoin->links() }} --}}
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
        <a class="dropdown-item" data-toggle="modal" data-target="#tambahModal" href="#" title="Tambah Data Pelanggar">Catat Pelanggaran</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#scanQr" href="#" title="Scan QR Code">Scan QR Siswa</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#ModalReset" href="#" title="Reset Data">Reset Data Pelanggaran</a>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
{{-- Data Tables AdminLTE --}}<script>
  $(document).ready(function() {
    // Initialize Select2 Elements
    $('.select2').select2();
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    // Initialize DataTable
    $("#example1").DataTable({
      responsive: true,
      lengthChange: true,
      autoWidth: false,
      bPaginate: true,
      buttons: [
        {
          extend: 'print',
          title: '',
          footer: false,
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6]
          }
        },
        {
          extend: 'copy',
          title: '',
          footer: false,
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6]
          }
        },
        {
          extend: 'excel',
          title: '',
          footer: false,
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6]
          }
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // Initialize QR Code Scanner
    function onScanSuccess(decodedText, decodedResult) {
      $("#nisn").val(decodedText);
      $('#tambahModal').modal('show');
      $('#scanQr').modal('hide');
      var nisn = $('#nisn').val();

      $.ajax({
        url: nisn.substr(0, 2) == "00" ? "{{ route('autofill') }}" : "{{ route('autofillNull') }}",
        data: { nisn: +nisn, _token: '{{ csrf_token() }}' },
        method: 'post',
        success: function(data) {
          $("#nama").val(data.nama);
          $("#rfid").val(data.rfid);
          $("#kelas").val(data.kelas);
        }
      });
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", { fps: 10, qrbox: 250 } // ukuran qr code box 250
    );
    html5QrcodeScanner.render(onScanSuccess);

    // Autofill RFID
    function rfidSiswa() {
      var rfid = $('#rfid').val();
      var nisn = $('#nisn').val();
      var url = rfid ? "{{ route('autoRFID') }}" : "{{ route('autofillNull') }}";
      var data = rfid ? { rfid: +rfid, _token: '{{ csrf_token() }}' } : { nisn: +nisn, _token: '{{ csrf_token() }}' };

      $.ajax({
        url: url,
        data: data,
        method: 'post',
        success: function(data) {
          $("#nama").val(data.nama);
          $("#nisn").val(data.nisn);
          $("#kelas").val(data.kelas);
        }
      });

      // Toggle submit button state
      // $('#submitButton').attr('disabled', rfid == '' || nisn == '');
    }

    $('#selectSiswa').select2({
      theme: 'bootstrap4',
      ajax: {
        url: '{{ route('getSiswaList') }}',
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term // search term
          };
        },
        processResults: function(data) {
          return {
            results: data
          };
        },
        cache: true
      },
      placeholder: 'Select a student',
      allowClear: true
    });
  });

  $('#submitButton').on('click', function() {
    $(this).hide();
  });

  document.addEventListener('DOMContentLoaded', function() {
    // Get the current date and time
    var now = new Date();
    
    // Format the date and time to match the datetime-local input format
    var year = now.getFullYear();
    var month = ('0' + (now.getMonth() + 1)).slice(-2); // Months are 0-based
    var day = ('0' + now.getDate()).slice(-2);
    var hours = ('0' + now.getHours()).slice(-2);
    var minutes = ('0' + now.getMinutes()).slice(-2);

    // Construct the datetime-local format
    var datetimeLocal = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;

    // Set the default value of the datetime-local input
    document.getElementById('tanggalPelanggaran').value = datetimeLocal;
  });
</script>

{{-- SCAN QR CODE --}}
<script src="{{ asset('js/html5-qrcode.min.js') }}" type="text/javascript"></script>
<!-- /.content -->
@endsection