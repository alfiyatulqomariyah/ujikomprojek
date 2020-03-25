<?php 
 include "admin/sidebar.php";
include "function.php";
$query = ("SELECT * FROM level");
$result = mysqli_query($koneksi, $query);

if (isset($_POST["registrasi"])){
  if(registrasi($_POST) > 0){
    echo "<script>
    alert ('User baru berhasil ditambahkan')
     document.location.href = 'user.php';;
    </script>";
  } else {
    echo mysqli_error($koneksi);
  }
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

  <title>Tambah User</title>
  <link rel="shortcut icon" type="image/png" href="img/restaurant.png">

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-5">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">User Tambah</h1>
              </div>
              <form class="user" action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="NamaLengkap" id="NamaLengkap" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" required>
                  </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required=>
                  </div>
                </div>
                <div class="form-group">
                  <select name="id_level" class="form-control" required="">
                    <option>Pilih Akses Sebagai :</option>
                    <?php while($regis = mysqli_fetch_assoc($result)) : ?>
                      <option value="<?= $regis['id_level']?>"><?= $regis["nama_level"] ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
                <button type="submit" name="registrasi" class="btn btn-primary btn-user btn-block">
                  Simpan
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>
<?php include "admin/footer.php"; ?>
