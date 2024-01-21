<?php
  include('session_cek_pembina.php');
  include('koneksi.php');

  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $notelpon = $_POST['notelpon'];
    $password = $_POST['password'];

    $result = mysqli_query($mysqli, "UPDATE pembina SET email='$email', nama='$nama', notelpon='$notelpon', 
    password='$password' WHERE idpembina='$idpembina'");
    
    if($result){
      echo "<script>
              var info = 'Data Berhasil Diubah!';  
              window.alert(info);
              document.location='profil.php'; 
            </script>";
    }
    else{
        echo "<script> 
                var info = 'Data Gagal Diubah!'; 
                window.alert(info);
                document.location='profil.php'; 
            </script>";
    }
  }

  $idpembina = $_SESSION['idpembina'];
  $result = mysqli_query($mysqli, 'SELECT * FROM pembina WHERE nama="'.$idpembina.'"');
  
  if(!$result){
    echo "<script> 
            alert('Gagal Menampilkan Data!'); 
            document.location='homepembina.php';
          </script>";
  }

  $data = $result->fetch_assoc();

?>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profil Pembina Asrama</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/unand-icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
      </div>
      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto" href="homepembina.php">Home</a></li>
          <li><a class="nav-link scrollto " href="presensipembina.php">Presensi</a></li>
          <li><a class="nav-link scrollto" href="listmahasiswa.php">Mahasiswa</a></li>
          <li><a class="nav-link scrollto active" href="profilpembina.php">Profile</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <section id="services" style="height:100vh;">
    <div class="section-header">
      <h3 class="section-title">Profil Pembina</h3>
      <!-- <p class="section-description"></p> -->
    </div>
    <br>
    <div class="container px-3 px-lg-4">
      <div class="card mt-0">
      <div class="card-header bg-dark text-white">
        Edit Profil
      </div>
      <div class="card-body">    
      <form method="post" action="profilpembina.php">    
        <div class="form-group">
          <label>ID Pembina</label>
          <input readonly type="text" name="idpembina" class="form-control" value="<?php echo $data['idpembina']?>">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="<?php echo $data['email']?>">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']?>">
        </div>
        <div class="form-group">
          <label>No.Telpon</label>
          <input type="text" name="notelpon" class="form-control" value="<?php echo $data['notelpon']?>">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" name="password" class="form-control" value="<?php echo $data['password']?>">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
      </form>  
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