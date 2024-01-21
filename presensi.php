<?php

  include('session_cek.php');
  include('koneksi.php');

  $nim = $_SESSION['nim'];
  $result = mysqli_query($mysqli, 'SELECT * FROM presensi WHERE nim="'.$nim.'"');
  
  
  // Proses pencarian
  if(isset($_POST['submit'])) {
    $tanggalcetak = $_POST['tanggalcetak'];
    $query = 'SELECT * FROM presensi WHERE nim="'.$nim.'" AND tanggal="'.$tanggalcetak.'"';
  } else {
    // Tampilkan semua data jika form tidak disubmit
    $query = 'SELECT * FROM presensi WHERE nim="'.$nim.'"';
  }

  $result = mysqli_query($mysqli, $query);

  if(!$result) {
    echo "<script> 
            alert('Gagal Menampilkan Data!'); 
            document.location='home.php';
          </script>";
  }
  

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Presensi Malam</title>
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

  <!-- CSS for Printing -->
  <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print" />

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
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="home.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="presensi.php">Presensi</a></li>
          <li><a class="nav-link scrollto" href="profil.php">Profil</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header><!-- End Header -->

  <section id="services2" style="height:100vh;padding-bottom:100px;">
    <div class="section-header">
      <h3 class="section-title">Presensi</h3>
      <p class="section-description"></p>
    </div>
    <div class="container px-3 px-lg-5">
    <form method="post" action="presensi.php">
    <input type="date" name="tanggalcetak" class="form-control noPrint" id="tanggalcetak" placeholder="Pilih Tanggal" required>
        <br>
      <tr>
        <td><button type="submit" class="btn btn-primary noPrint" name="submit">Pilih Tanggal</button></td>
        <td><a href="tambahpresensi.php" class='btn btn-xs btn-primary noPrint'>Isi Presensi</a></td>
        <br><br>
      </tr>
      </form>
      <div class="card mt-0">
      <div class="card-header bg-dark text-white">
        List Daftar Presensi 
      </div>
      <div class="card-body">  
        <table class="table table-bordered table-sm table-striped align-center">
          <tr>
            <th class="text-center">No</th> 
            <th class="text-center">Tanggal</th>
            <th class="text-center">Waktu</th>
            <th class="text-center">Status Kehadiran</th>
            <th class="text-center">Jenis Presensi</th>
            <!-- <th class="text-center">Gedung</th> -->
            <th class="text-center">Bukti</th>
            <th class="text-center">Status Persetujuan</th>
          </tr>

          <?php
            $no=1;
            while($data = mysqli_fetch_array($result)){ ?>
            <tr>
              <td class="text-center"><?php echo $no?></td>
              <td class="text-center"><?php echo date('d-m-Y', strtotime($data['tanggal']))?></td>
              <td class="text-center"><?php echo date('H:i A', strtotime($data['waktu']))?></td>
              <td class="text-center"><?php echo $data['statuskehadiran']?></td>
              <td class="text-center"><?php echo $data['jenispresensi']?></td>
              <!-- <td class="text-center"><?php echo $data['gedung']?></td> -->
              <td class="text-center">
                    <?php
                     if (!empty($data['file_name']) && file_exists('upload/' . $data['file_name'])) {
                      echo '<a href="upload/' . $data['file_name'] . '" target="_blank">Image</a>';
                  } else {
                      echo 'N/A';
                  }
                    ?>
                </td>
              <td class="text-center"><?php echo $data['statuspersetujuan']?></td>
              
            </tr>
          <?php  
            $no++;  
            }
          ?>
        </table>
      </div>
      </div>
    </div>
  </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <!-- <div class="footer-top">
      <div class="container">
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Asrama UNAND</strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div> -->
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