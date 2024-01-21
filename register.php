<?php

  if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    include('koneksi.php');
    $result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nim, nama, jurusan, email, pass) VALUES ('$nim','$nama','$jurusan','$email','$pass')");

    if($result){
      echo "<script>
              var info = 'Data Berhasil Ditambahkan!';  
              window.alert(info);
              document.location='index.php'; 
            </script>";
    }
    else{
      echo "<script> 
              var info = 'Data Gagal Ditambahkan!'; 
              window.alert(info);
              document.location='register.php'; 
            </script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register Mahasiswa Asrama</title>
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
        <h1><a href="">Presensi Asrama UNAND</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="homepembina.php">Home</a></li>
          <li><a class="nav-link scrollto" href="register.php">Register</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h2>Silahkan isikan data di bawah ini</h2>
      <div class="col-lg-3 col-md-5">
        <div class="form">
          <form action="register.php" method="post">
            <div class="form-group">
              <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" required>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" required>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group mt-3">
              <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
            </div>
            <button class="btn-get-started" type="submit" name="submit">Register</button>
          </form>
        </div>
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
