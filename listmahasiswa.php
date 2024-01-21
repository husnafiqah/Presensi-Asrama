<?php

  include('session_cek_pembina.php');
  include('koneksi.php');

  $result = mysqli_query($mysqli, 'SELECT * FROM mahasiswa');
    
  if(!$result){
    echo "<script> 
            alert('Gagal Menampilkan Data!'); 
            document.location='homepembina.php';
            </script>";
  }

  $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

  $query = "SELECT * FROM mahasiswa WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR gedung LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR email LIKE '%$keyword%' OR notelpon LIKE '%$keyword%'";
  $result = mysqli_query($mysqli, $query);

  if (!$result) {
    echo "<script> 
          alert('Gagal Menampilkan Data!'); 
          document.location='homepembina.php';
        </script>";
  }

  if (isset($_GET['nim'])) {
    $id = $_GET['nim'];
    $deletePresensi = mysqli_query($mysqli, "DELETE FROM `presensi` WHERE `nim` = '$id'");
    $delete = mysqli_query($mysqli, "DELETE FROM `mahasiswa` WHERE `nim` = '$id'");

    if (!$delete) {
        echo "<script> 
            alert('Gagal Menghapus Data!'); 
            document.location='listmahasiswa.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data berhasil dihapus.'); 
            document.location='listmahasiswa.php';
        </script>";
    }

}

?>

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mahasiswa</title>
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
        <li><a class="nav-link scrollto noPrint" href="homepembina.php">Home</a></li>
          <li><a class="nav-link scrollto noPrint" href="presensipembina.php">Presensi</a></li>
          <li><a class="nav-link scrollto active noPrint" href="listmahasiswa.php">Mahasiswa</a></li>
          <li><a class="nav-link scrollto noPrint" href="profilpembina.php">Profile</a></li>
          <li><a class="nav-link scrollto noPrint" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header><!-- End Header -->

  <section id="services2" style="height:120vh;padding-bottom:100px;">
    <div class="section-header">
      <h3 class="section-title">Mahasiswa</h3>
      <!-- <p class="section-description"></p> -->
    </div>
    <br>
    <div class="container px-3 px-lg-5">
      <form method="post" action="listmahasiswa.php">
      <input type="text" class="form-control noPrint" placeholder="Masukkan" name="keyword">
      <br>
      <tr>
        <td><button type="submit" class="btn btn-primary noPrint" name="submit">Search</button></td>
        <!-- <td><a href="cetakpresensimalam.php?tanggalcetak=<?php echo $tanggalcetak ?>" class='btn btn-xs btn-success noPrint'>Cetak Tanggal</a></td> -->
        <td><a href="tambahuserbaru.php"  class="btn btn-primary noPrint">Tambah Mahasiswa</a></td>
        <td><a onClick="window.print()" class='btn btn-xs btn-secondary noPrint'>Cetak</a></td>
       
      </form>
      
      <div class="card mt-0">
      <div class="card-header bg-dark text-white">
        List Mahsiswa
      </div>
      <div class="card-body">  
        <table class="table table-bordered table-sm table-striped align-center">
          <tr>
            <th class="text-center">No</th> 
            <th class="text-center">NIM</th>
            <th class="text-center">Nama</th>
            <!-- <th class="text-center">Jurusan</th>
            <th class="text-center">Email</th>
            <th class="text-center">No Telpon</th> -->
            <th class="text-center">Gedung</th>
            <th class="text-center noPrint">Detail</th>
            <th class="text-center noPrint">Aksi</th>
          </tr>

          <?php
            $no=1;
            while($data = mysqli_fetch_array($result)){ ?>
            <tr>
              <td class="text-center"><?php echo $no?></td>
              <td class="text-center"><?php echo $data['nim']?></td>
              <td class="text-center"><?php echo $data['nama']?></td>
              <!-- <td class="text-center"><?php echo $data['jurusan']?></td>
              <td class="text-center"><?php echo $data['email']?></td>
              <td class="text-center"><?php echo $data['notelpon']?></td> -->
              <td class="text-center"><?php echo $data['gedung']?></td>
              <td class="text-center noPrint">
                  <a href="detailpresensimahasiswa.php?id=<?php echo $data['nim']?>" class='btn btn-primary'>Detail</a>
              </td>
              <td class="text-center noPrint">
                  <a href="kelolamahasiswa.php?id=<?php echo $data['nim']?>" class='btn btn-primary'>Edit</a>
                  <button class='btn btn-danger' onclick="confirmDelete('<?php echo $data['nim']?>')">Delete</button>
              </td>
            </tr>

          <?php  
            $no++;  
            }
          ?>

<script>
function confirmDelete(nim) {
    var confirmDelete = confirm("Apakah Anda yakin ingin menghapus data mahasiswa?");

    if (confirmDelete) {
        // Jika pengguna menekan OK, maka lakukan penghapusan
        window.location.href = 'listmahasiswa.php?nim=' + nim;
    }
    // Jika pengguna menekan Cancel, tidak ada tindakan tambahan
}
</script>
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

<footer>

</footer>