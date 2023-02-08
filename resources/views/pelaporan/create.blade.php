<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome - Pengaduan Masyarakat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="front/assets/img/favicon.png" rel="icon">
  <link href="front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="front/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="front/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="front/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="front/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.9.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">PENGADUAN SEKOLAH</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto active" href="{{ route('profil') }}">Profil</a></li>
          <li><a class="nav-link scrollto active" href="{{ route('login') }}">Login</a></li>
          <li><a class="nav-link scrollto active" href="{{ route('register') }}">Register</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
          <li><a class="getstarted scrollto" href="#">Dashboard</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Silahkan Kirimkan laporan Anda</h1>
          <h2></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{ route('register') }}" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=OA7uHhwMyOw&ab_channel=KaffiAhmad" class="btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="front/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>



  </section><!-- End Hero -->

  <main id="main">

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-30">


            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="card">
                    <div class="card-header">Tambah Pelaporan</div>
                  <br>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                    {{Session::get('message')}}</div>
                    @endif

                <div class="card-body">
                        <div class="form-group">
                        <label for="nama">Nama</label>
                            <select name="nama" class="form-control @error('nama') is-invalid @enderror">
                            <option value="">Pilih siswa</option>
                            @foreach(App\Models\Siswa::all() as $siswa)
                            <option value="{{$siswa->id}}">{{$siswa->nama}}</option>
                            @endforeach 
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </select>
                    </div>      
                        <br>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach(App\Models\Kategori::all() as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->keterangan}}</option>
                            @endforeach 
                            @error('kategori_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </select>
                    </div>                       
                        <br>

                        
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="foto">Foto  </label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-outline-primary">Tambah</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<br>
<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
<form class="d-none d-md-flex" action="/pelaporanlist">
            <input class="form-control border-0" type="search" placeholder="Search" name="search" value="{{ request('search') }}">
        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>   36
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Foto</th>

                                    </tr>
                                </thead>

                            <tbody>
                                @foreach($pelaporans as $key=>$pelaporan)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$pelaporan->siswa_id}}</td>
                                    <td>{{$pelaporan->kategori_id}}</td>
                                    <td>{{$pelaporan->lokasi}}</td>
                                    <td>{{$pelaporan->keterangan}}</td>
                                    <td><img src="{{asset('image')}}/{{$pelaporan->foto}}" width="100"></td>                                      @endforeach
</div>
</div>
</div>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="front/assets/vendor/aos/aos.js"></script>
  <script src="front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="front/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="front/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="front/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="front/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="front/assets/js/main.js"></script>

</body>

</html>