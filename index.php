<?php

  if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $pass = $_POST['pass'];

    include('koneksi.php');

    $result = mysqli_query($mysqli, 'SELECT * FROM mahasiswa WHERE nim="'.$nim.'" AND pass="'.$pass.'"');

    if($result->num_rows>0){
      session_start();
      $_SESSION['nim'] = $nim;  
      echo "<script> 
              alert('Anda Berhasil Login!'); 
              document.location='home.php';
            </script>";
    }
    else{
      echo "<script> 
              alert('NIM/Password anda salah!'); 
              document.location='index.php';
            </script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Presensi Asrama UNAND</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/unand-icon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Regna - v4.7.0
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">
      <div id="logo">
        <h1><a href="">e-Dorms</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Mahasiswa</a></li>
          
          <li><a class="nav-link scrollto" href="loginpembina.php">Pembina</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Selamat Datang</h1>
      <h2>Aplikasi Presensi Asrama Universitas Andalas</h2>
      <div class="col-lg-3 col-md-5">
        <div class="form-group">
          <form action="index.php" method="post">
            <div class="form-group">
              <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" required>
            </div>
            <br>
            <div class="form-group">
              <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
            </div>
            <br>
            <button class="btn-get-started" "type="submit" name="submit">Sign In</button>
          </form>
          <!-- <td><a href="lupapassword.php">Lupa Password?</a></td> -->
        </div>
      </div>
    </div>
  </section>

  <section id="about">
    <div class="container" data-aos="fade-up">
      <div class="row about-container">
        <div class="col-lg-6 content order-lg-1 order-2">
          <h2 class="title">About Us</h2>
          <p>
            Presensi mahasiswa asrama UNAND merupakan aplikasi berbasis website yang bertujuan agar memudahkan mahasiswa asrama dan pembina dalam mengelola proses presensi.
            Berikut merupakan beberapa fitur yang disediakan :
          </p>
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a href="">Presensi Pagi</a></h4>
            <p class="description">Presensi pagi dilakukan ketika selesai shalat subuh berjamaah dengan mengisi form presensi</p>
            <p class="description"></p>
          </div>
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a href="">Presensi Malam</a></h4>
            <p class="description">Presensi malam dilakukan seminggu setelah pertemuan rutin di asrama dengan mengisi form presensi</p>
            <p class="description"></p>
          </div>
        </div>
        <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
      </div>
    </div>
  </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Asrama UNAND</strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
