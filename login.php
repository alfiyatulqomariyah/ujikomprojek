<?php 
// mengaktifkan session pada php
ob_start();
session_start();
if(isset($_SESSION['user_username']))
header("location:index.php?page=index");
include 'function.php';

// proses login
if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sqlLogin = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
  if(password_verify('password', $password)){

  }

  if(mysqli_num_rows($sqlLogin)>0) {
    $row_akun = mysqli_fetch_array($sqlLogin);

    $_SESSION['user_id'] = $row_akun['id_user'];
    $_SESSION['user_username'] = $row_akun['username'];
    $_SESSION['user_password'] = $row_akun['password'];
    $_SESSION['user_level'] = $row_akun['id_level'];

  if ($_SESSION['user_level'] == "1") {
    header("location:index.php?page=index");
  }else if ($_SESSION['user_level'] == "2") {
    header("location:index.php?page=index");
  } else if ($_SESSION['user_level'] == "3") {
    header("location:index.php?page=index");
  } else if ($_SESSION['user_level'] == "4") {
    header("location:index.php?page=index");
  }else if ($_SESSION['user_level'] == "5") {
    header("location:index2.php?page=index2");
  }
  }
  $error = true;
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>
  <link rel="shortcut icon" type="image/png" href="img/food.png">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="height: 640px; background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url('img/log.jpg') no-repeat; background-size: cover;">

<?php 

if(isset($error)){
  echo "<script>
    alert('Username/Password salah');
    </script>";
}

 ?>
   
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md" style="padding-top: 10%;">

        <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: rgb(255, 255, 255,0.6);">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">


                    <h1 class="h4 text-gray-900 mb-4">RESTO EAT&JOY FACTORY LOGIN</h1>

                  <form class="user" action="" method="post">
                    <div class="form-group">                    

                     <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="usernameHelp" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Login">
                    </div>
                    <div class="text-center">
                    <a class="small" href="regis.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
