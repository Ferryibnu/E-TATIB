<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link rel="icon" type="image/gif/png" href="{{ asset('img/icon.png') }}">
  <title>E-TATIB SMKN 1 SURABAYA</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v2.0.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href=""><span>E-TATIB</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#pelanggaran">Pelanggaran</a></li>
          <li><a href="#pelanggar">Pelanggaran Harian</a></li>
          <li><a href="#faq">Q&A</a></li>
          <li><a href="#team">Team</a></li>

          @if (Auth::user() && Auth::user()->level == "user")
            <li><a href="#profile">Profile</a></li>
            <li><a href="#laporan">Laporan</a></li>
            <li class="nav-item dropdown">
              <a style="background: #eb5d1e;
              color: #fff;
              border-radius: 50px;
              margin: 0 15px;
              padding: 10px 25px;" data-toggle="dropdown" href="#">
                  <span>{{ Auth::user()->name }}</span>
              </a>
              <div class="dropdown-menu" style="text-align: center;">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout')}}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </a>
              </div>
            </li>
          @elseif (Auth::user() && Auth::user()->level == "admin")
          <li><a href="/dashboard">Dashboard Admin</a></li>
          <li class="nav-item dropdown">
            <a style="background: #eb5d1e;
            color: #fff;
            border-radius: 50px;
            margin: 0 15px;
            padding: 10px 25px;" data-toggle="dropdown" href="#">
                <span>{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu" style="text-align: center;">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout')}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </a>
            </div>
          </li>
          @else
            <li class="get-started"><a href="{{ route('login') }}">Login</a></li>
          @endif
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
          <h1>E-TATIB</h1>
          <h2>Sistem Informasi Pencatatan Pelanggaran Siswa SMKN 1 Surabaya</h2>
          @if (Auth::user())
            <a href="#about" class="btn-get-started scrollto">Apa itu E-TATIB ?</a>
          @else
            <a href="{{ route('login') }}" class="btn-get-started scrollto">Login E-TATIB</a>
          @endif
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/Tatib.svg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">Apa itu E-TATIB?</h3>
            <p data-aos="fade-up" data-aos-delay="100">
              E-TATIB adalah Sistem Informasi pencatatan poin pelanggaran siswa, saat siswa melakukan pelanggaran maka akan dicatat oleh Tim Tatib yang bertugas. Siswa diwajibkan untuk menunjukkan unique <b>QR Code</b> mereka pada TIm Tatib. Setelah itu siswa juga bisa melihat <b>Laporan Pelanggaran</b> yang telah mereka lakukan. 
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <br>
                <i class="icofont-qr-code"></i>
                <h4>QR Code</h4>
                <p>QR Code bisa didapatkan dengan melakukan login terlebih dahulu, setelah itu masuk ke menu <b>Profile</b> </p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>Laporan Pelanggaran</h4>
                <p>Setelah login, siswa dapat melihat Profile beserta laporan pelanggaran yang telah dilakukan </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= pelanggaran Section ======= -->
    <section id="pelanggaran" class="pelanggaran section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Pelanggaran</h2>
          <p>Jenis Pelanggaran di SMKN 1 Surabaya</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="icofont-instrument"></i></div><br>
              <h4 class="title"><a href="">Sikap Prilaku</a></h4>
              <p class="description">Kategori Sikap Prilaku ini memiliki banyak sekali pelanggaran, mulai dari pelanggaran ringan seperti <b>membuat kegaduhan dengan poin 10, </b>sampai dengan pelanggaran berat seperti <b>Mencuri di sekolah maupun luar sekolah dengan poin 250</b> </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="icofont-clock-time"></i></div><br>
              <h4 class="title"><a href="">Kerajinan</a></h4>
              <p class="description">Kategori Kerajinan ini termasuk pelanggaran ringan dengan <b>poin 10 </b>seperti <b>Datang Terlambat , Di kantin saat KBM, Tidur Dikelas</b>, sampai dengan <b>poin 20</b> seperti <b>Pulang Sebelum waktunya tanpa izin dari sekolah, Tidak mengikuti Pramuka wajib</b></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="icofont-tie"></i></div><br>
              <h4 class="title"><a href="">Kerapian</a></h4>
              <p class="description">Kategori Kerapian ini termasuk pelanggaran ringan dengan <b>poin 10 </b>seperti <b>Atribut seragam tidak lengkap , Memakai sepatu selain hitam</b>, sampai dengan <b>poin 30</b> seperti <b>Memakai make-up berlebihan(putri), Memakai tindik telinga lebih dari 1(putri)</b></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End pelanggaran Section -->

    @if (Auth::user() && Auth::user()->level == "user")
            <!-- ======= profile Us Section ======= -->
    <section id="profile" class="profile">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Profile</h2>
          <p>{{$siswa_withID->nama}}</p>
        </div>

        <div class="row">

          <div class="col-12" style="margin-top: -47px" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-id-card"></i>
                <h4>NISN:</h4>
                <p>{{$siswa_withID->nisn}}</p>
              </div>

              <div class="address">
                <i class="icofont-ui-user"></i>
                <h4>Nama:</h4>
                <p>{{$siswa_withID->nama}}</p>
              </div>

              <div class="address">
                <i class='bx bxs-graduation'></i>
                <h4>Kelas:</h4>
                <p>{{$siswa_withID->kelas->kelas}}</p>
              </div>

              <div class="address">
                <i class="icofont-book"></i>
                <h4>Agama:</h4>
                <p>{{$siswa_withID->agama}}</p>
              </div>

              <div class="address">
                @if($siswa_withID->jns_kelamin == 'L') <i class="icofont-student-alt"></i> @else <i class="icofont-student"></i> @endif
                <h4>Jenis Kelamin:</h4>
                <p>@if($siswa_withID->jns_kelamin == 'L') Laki-laki @else Perempuan @endif</p>
              </div>

              <div class="address">
                <i class="icofont-birthday-cake"></i>
                <h4>Tempat, Tanggal Lahir:</h4>
                <p>{{$siswa_withID->tempat_lahir}} {{isset($siswa_withID->tgl_lahir) ? ', '.date('d-m-Y', strtotime($siswa_withID->tgl_lahir)) : ''}}</p>
              </div>

              <div class="phone">
                <i class="icofont-smart-phone"></i>
                <h4>No. HP:</h4>
                <p>{{$siswa_withID->no_telp}}</p>
              </div>

              <div class="phone">
                <i class="icofont-award"></i>
                <h4>Penghargaan:</h4>
                <p>{{isset($siswa_withID->penghargaan->kriteria) ? $siswa_withID->penghargaan->kriteria. ' ('.$siswa_withID->penghargaan->poin. ' poin)' : ''}}</p>
              </div>

              <div class="phone">
                <i class="icofont-exclamation-circle"></i>
                <h4>Total Skor Pelanggaran:</h4>
                <p>{{isset($total) ? ($total) . ' poin': ''}}</p>
              </div>

              <div class="qr text-center mt-4 mb-1">
                {!! $qrCode !!}
              </div>
              </div>

          </div>
        </div>

      </div>
    </section><!-- End profile Us Section -->

    <!-- ======= laporan Section ======= -->
    <section id="laporan" class="laporan">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Laporan</h2>
          <p>{{$siswa_withID->nama}}</p>
        </div>
        
        <table class="table table-bordered" style="margin-top: -30px" data-aos="fade-up">
          <thead class="thead">
            <tr>
              <th>No</th>
              <th>Pelanggaran</th>
              <th>Skor</th>
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
              <td>{{date('d-m-Y H:i:s', strtotime($p->created_at))}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </section><!-- End laporan Section -->
    @endif

     <!-- ======= pelanggar Section ======= -->
     <section id="pelanggar" class="pelanggar">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Pelanggaran Harian</h2>
          <p>Pelanggaran Tanggal {{date('d-m-Y', strtotime($date))}}</p>
          <form action="{{route('berandaSiswa')}}" id="pilih">
            <div class="form-group col-md-3" >Pilih Tanggal: 
              <input type="date" name="tgl" id="tgl" oninput='pilih.submit()'>
              <noscript>
                <input type="submit" value="submit">
              </noscript>
            </div>
          </form>
        </div>
        
        <table class="table table-bordered" style="margin-top: -30px" data-aos="fade-up">
          <thead class="thead">
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Pelanggaran</th>
              <th>Skor</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1 @endphp
            @foreach($pelanggar as $p)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{$p->siswa->nama}}</td>
              <td>{{$p->pelanggaran->pelanggaran}}</td>
              <td>{{$p->pelanggaran->poin}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="">
          {{ $pelanggar->links() }}
        </div>
    </section><!-- End pelanggar Section -->

<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq section-bg">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Q&A</h2>
      <p>Pertanyaan yang berkaitan tentang E-Tatib</p>
    </div>

    <ul class="faq-list">

      <li data-aos="fade-up" data-aos-delay="100">
        <a data-toggle="collapse" class="" href="#faq1">Bagaimana cara saya mendapat <strong> QR Code? </strong><i class="icofont-simple-up"></i></a>
        <div id="faq1" class="collapse show" data-parent=".faq-list">
          <p>
            Untuk mendapat QR Code, siswa diharuskan untuk login dengan akun yang sudah dibuat oleh TATIB. Isi Form login dengan<b> NISN </b>sebagai email dan isi passwordnya dengan <b>TATIB123</b>. Setelah login anda klik ke menu <b>Profile</b>, pada menu profil anda dapat melihat data diri beserta unique QR Code siswa.
           </p>
        </div>
      </li>

      <li data-aos="fade-up" data-aos-delay="200">
        <a data-toggle="collapse" href="#faq2" class="collapsed">Berapa total poin pelanggaran siswa sehingga terancam <strong> skorsing? </strong><i class="icofont-simple-up"></i></a>
        <div id="faq2" class="collapse" data-parent=".faq-list">
          <p>
            Dalam buku penghubung tata tertib peserta didik tertulis bahwa <strong>siswa yang memiliki total skor 150</strong> akan dilakukan hukuman skorsing.
          </p>
        </div>
      </li>

      <li data-aos="fade-up" data-aos-delay="300">
        <a data-toggle="collapse" href="#faq3" class="collapsed">Berapa total poin pelanggaran siswa sehingga terancam <strong>dikeluarkan dari sekolah? </strong> <i class="icofont-simple-up"></i></a>
        <div id="faq3" class="collapse" data-parent=".faq-list">
          <p>
            Dalam buku penghubung tata tertib peserta didik tertulis bahwa <strong>siswa yang memiliki total skor 250</strong> akan dikembalikan ke orangtua atau dikeluarkan dari sekolah.
          </p>
        </div>
      </li>

      <li data-aos="fade-up" data-aos-delay="400">
        <a data-toggle="collapse" href="#faq4" class="collapsed">Apakah dengan mendapat penghargaan dapat mengurangi jumlah skor pelanggaran? <i class="icofont-simple-up"></i></a>
        <div id="faq4" class="collapse" data-parent=".faq-list">
          <p>
            <strong>Benar</strong>. Total skor pelanggaran <strong>dapat dikurangi dengan mendapatkan penghargaan/prestasi</strong>, oleh karena itu kurangi bermalas-malasan dan raihlah prestasi setinggi langit.
          </p>
        </div>
      </li>

      {{-- <li data-aos="fade-up" data-aos-delay="500">
        <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="icofont-simple-up"></i></a>
        <div id="faq5" class="collapse" data-parent=".faq-list">
          <p>
            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
          </p>
        </div>
      </li>

      <li data-aos="fade-up" data-aos-delay="600">
        <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="icofont-simple-up"></i></a>
        <div id="faq6" class="collapse" data-parent=".faq-list">
          <p>
            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
          </p>
        </div>
      </li> --}}

    </ul>

  </div>
</section><!-- End F.A.Q Section -->

<!-- ======= Team Section ======= -->
<section id="team" class="team">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Team Tatib</h2>
      <p>Discipline Enforcer SMKN 1 Surabaya</p>
    </div>

    <div class="row">

      <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="member">
          <img src="img/guru1.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Abdul Majid, S.Pd.</h4>
              <span>Pendidikan Pancasila dan Kewarganegaraan</span>
            </div>
            {{-- <div class="social">
              <a href=""><i class="icofont-twitter"></i></a>
              <a href=""><i class="icofont-facebook"></i></a>
              <a href=""><i class="icofont-instagram"></i></a>
              <a href=""><i class="icofont-linkedin"></i></a>
            </div> --}}
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="member">
          <img src="img/guru2.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Cheby Marse, S.Pd</h4>
              <span>Bimbingan Konseling</span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="member">
          <img src="img/guru3.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Ririn Wartinah, S.Pd</h4>
              <span>Produktif Perhotelan</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="member">
          <img src="img/guru4.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Sunardi, S.Pd</h4>
              <span>Prakarya dan Kewirausahaan, Sejarah Indonesia</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="member">
          <img src="img/yunita.png" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Yunitaningrum Dwi Candrarini,S.T</h4>
              <span>Fisika Kimia dan Seni Budaya</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="member">
          <img src="img/zain.png" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Zainuri, S.Pd.I</h4>
              <span>Pendidikan Agama Islam</span>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
            <h3>SMKN 1 Surabaya</h3>
            <p>
              Jl. SMEA No. 4 Wonokromo, Surabaya <br>
              <strong>Phone:</strong>  031-8292038<br>
              <strong>Email:</strong> info@smkn1-sby.sch.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Link SMKN 1 Surabaya</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://www.smkn1-sby.sch.id/">Web Profile SMKN 1 Surabaya</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://bkk.smkn1-sby.sch.id/">BKK</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://lsp.smkn1-sby.sch.id/">LSP</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
            <h4>Sosial Media</h4>
            <p>Kunjungi Sosial Media SMKN 1 Surabaya</p>
            <div class="social-links mt-3">
              <a href="https://www.youtube.com/channel/UCeJCDRP0PhIt7p81pbKR5hg" class="youtube"><i class="bx bxl-youtube"></i></a>
              <a href="https://www.instagram.com/smkn1surabaya.official/?hl=id" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        <strong><span>E-TATIB</span></strong>. 2022
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Created by <a href="https://www.instagram.com/alfaruq_ferry/">Ferry Ibnu Al Faruq</a> | Template by <a href="https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/">Ninestars</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>