<?php
session_start();

include "koneksi.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/login/owl.carousel.min.css">

    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/login/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/login/style.css">

    <title>Login #2</title>
  </head>
  <body>

  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/login.jpg');">
   <a href="index.php"> <i class="fa fa-times fa-3x " aria-hidden="true" ></i> </a>
</div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>COLO CONSOLE</strong></h3>
            <p class="mb-4">LOGIN MENGGUNAKAN USERNAME DAN PASSWORD AKUN ANDA</p>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username" name="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary" name="login">

              <hr />
                                    Belum Memiliki Akun ?  <a href="daftar.php" >Daftar here</a>

            </form>

             <?php
                                        // jika ada tombol simpan di tekan maka akan di jalanakan
                                        if (isset($_POST['login'])) 
                                        {   
                                            $email = $_POST["email"];
                                            $password = $_POST["password"];
                                            // LAKUKAN query ngecek akun di label pelanggan di db
                                            $ambil = $koneksi->query("SELECT * FROM pelanggan 
                                            WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

                                            //ngitung akun yang akan di ambil bernilai 
                                            $yangcocok = $ambil->num_rows;
                                            // jika 1 akun yang cocok , maka diloginkan
                                            if ($yangcocok==1 ) {
                                                // anda sukses login
                                                // mendapatkan akun dalam bentuk array
                                                $akun = $ambil->fetch_assoc();
                                                // simpan di session pelanggan
                                                $_SESSION['pelanggan']=$akun;

                                                echo "<div class='alert alert-info'>login tersimpan</div>";
                                                echo "<meta http-equiv='refresh' content='1;url=home.php'>";
                                            }
                                            else {
                                                echo "<div class='alert alert-danger'>Login Gagal Periksa akun anda</div>";
                                                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                            }
                                        }
                                        ?>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>