<?php
  // Referensi: https://www.studentstutorial.com/php/forgot-password
  // https://www.youtube.com/watch?v=YqWT0qp8O_0

  // Import PHPMailer classes into the global namespace
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  // Include library files
  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  // Create an instance; Pass `true` to enable exceptions 
  $mail = new PHPMailer; 
  
  // Server settings 
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
  $mail->isSMTP();                            // Set mailer to use SMTP 
  $mail->Mailer = "smtp"; 
  $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
  $mail->SMTPAuth = true;                     // Enable SMTP authentication 
  $mail->Username = 'ppsi2022b3@gmail.com';       // SMTP username 
  $mail->Password = 'jmjybppwmfotwnav';         // SMTP password 
  $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted 
  $mail->Port = 587;                          // TCP port to connect to 
  
  // Sender info 
  $mail->setFrom('ppsi2022b3@gmail.com', 'Asrama Unand'); 
  //$mail->addReplyTo('reply@example.com', 'SenderName'); 

  if(isset($_POST['submit'])){
    $idpembina = $_POST['idpembina'];

    include('koneksi.php');
    $result = mysqli_query($mysqli, 'SELECT * FROM pembina WHERE idpembina="'.$idpembina.'"');
    $row = mysqli_fetch_assoc($result);
    $fetch_idpembina=$row['idpembina'];
    $email=$row['email'];
    $password=$row['password'];
    if($idpembina==$fetch_idpembina) {
      // Add a recipient 
      $mail->addAddress($email); 
      
      //$mail->addCC('cc@example.com'); 
      //$mail->addBCC('bcc@example.com'); 
      
      // Set email format to HTML 
      $mail->isHTML(true); 
      
      // Mail subject 
      $mail->Subject = 'Password akun pembina Asrama Unand'; 
      
      // Mail body content
      $bodyContent = "Password akun pembina Asrama Unand anda dengan ID $fetch_idpembina adalah : $password";
      $mail->Body    = $bodyContent; 

      if($mail->send()){
        echo "<script> 
                alert('Email yang berisi password akun pembina anda telah dikirim ke $email'); 
                document.location='loginpembina.php';
              </script>";
        $mail->clearAddresses();
      }
    }   
    else { 
      echo "<script> 
            alert('Email tidak berhasil dikirim karena ID Pembina tidak ada'); 
            document.location='lupapasswordpembina.php';
          </script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lupa Password Pembina Asrama</title>
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
        <h1><a href="index.php">Presensi Asrama UNAND</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="loginpembina.php">Pembina</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Lupa Password?</h1>
      <h2>Masukkan ID Pembina anda</h2>
      <div class="col-lg-3 col-md-5">
        <div class="form">
          <form action="" method="post">
            <div class="form-group">
              <input type="text" name="idpembina" class="form-control" id="idpembina" placeholder="ID Pembina" required>
            </div>
            <button class="btn-get-started" type="submit" name="submit">Submit</button>
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
