<?php 

session_start();
 if(!isset($_SESSION["user_username"])){
  header("location: login.php");
  exit;
 }

include 'function.php';
$masakan = mysqli_query($koneksi, "SELECT * FROM masakan WHERE kategori='Makanan' ORDER BY id_masakan DESC");
$minuman = mysqli_query($koneksi, "SELECT * FROM masakan WHERE kategori='Minuman' ORDER BY id_masakan DESC");

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Resto Eat&Joy Factory</title>
    <link rel="shortcut icon" type="image/png" href="img/food.png">
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/cssb/bootstrap.min.css">
  </head>
  <body>
    <!-- <h1></h1> -->

    <!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <img src="img/food.png" style="width: 40px; margin: 7px;">
  <a class="navbar-brand" href="#" style="padding-left: 30px; font-family: Lucida Calligraphy;"><b>Home</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#about" style="padding-left: 30px; font-family: Lucida Calligraphy;"><b>About</b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#menu" style="padding-left: 30px; font-family: Lucida Calligraphy;"><b>Menu</b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php" style="padding-right: 30px; font-family: Lucida Calligraphy;"><b>Logout</b><span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<!-- Akhir NAvbar -->

<!-- Coroseul -->
<section class="p-b-55">
    <div class="row align-items-center" style="height: 640px; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('img/bg3.jpg') no-repeat; background-size: cover;">
        <div class="col text-left" style="margin-left: 40px; font-family: Lucida Calligraphy;">
            <h1 class="text-white" style="font-size: 60px;">Resto Eat&Joy Factory</h1>
            <p class="text-white" style="font-size: 25px;">Selamat Datang!</p>
            </div>
        </div>
    </section>
<!-- Akhir Coroseul -->

<!-- Jumbotron -->
<div class="container" style="margin-top: 50px;">
        <section>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2>Tata Cara Pemesanan</h2>
                            <hr>
                            Bar : Open till late</h5>
                            <h6>Monday-Friday : 08.00 - 22.30</h6>
                            <h6>Saturday      : 10.00 - 22.30</h6>
                            <h6>Sunday        : 09.00 - 22.30</h6>
                            <p>Dusun Cibeureum, Desa Cibogo, Kec. Padaherang, Rt/RW 02/01, Kab. Pangandaran. Dekat Konveksi Karya Lestari.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2>Info Restoran</h2>
                            <hr>
                            Bar : Open till late</h5>
                            <h6>Monday-Friday : 08.00 - 22.30</h6>
                            <h6>Saturday      : 10.00 - 22.30</h6>
                            <h6>Sunday        : 09.00 - 22.30</h6>
                            <p>Dusun Cibeureum, Desa Cibogo, Kec. Padaherang, Rt/RW 02/01, Kab. Pangandaran. Dekat Konveksi Karya Lestari.</p>
                        </div>
                    </div>
                </div>
            </div>
          </section>
        </div>
<!-- Akhir Jumbotron -->

<!-- Menu -->
<div class="container" id="menu" style="margin-bottom: 10%; margin-top: 10%;">
  <h2 style="font-family: Bradley Hand ITC;">Daftar Masakan</h2>
  <div class="progress" style="height: 3px;">
    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%;" aria-valuenow="25" ria-valuemin="0" ria-valuemax="100"></div>
  </div>

  <form action="" method="post" enctype="multipart/form-data" style="margin-top: 3%">
    <div class="row">
      <?php while($row = mysqli_fetch_assoc($masakan)) : ?>
        <div class="col-lg-3">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark text-center"><?= $row['kategori']; ?></h6>
            </div>
            <div class="card-body text-center">
              <img style="height: 100px;" src="img/<?= $row['gambar']; ?>" alt="...">
              <h6 class="m-0 font-weight-bold text-dark mt-2"><?php echo $row['nama_masakan'];?></h6>
              <h6 class="m-0 font-weight-bold text-danger mt-2">Rp. <?php echo $row['harga'];?></h6>
            </div>
            <div class="card-footer text-center border-bottom-primary">
              <a href="aksi_keranjang.php?id=<?= $row['id_masakan']; ?>" class="btn btn-primary btn-sm"><b>Pesan</b></a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
    </div>
  </form>
</div>

<div class="container" id="menu" style="margin-bottom: 10%; margin-top: 10%;">
  <h2 style="font-family: Bradley Hand ITC;">Daftar Minuman</h2>
  <div class="progress" style="height: 3px;">
    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%;" aria-valuenow="25" ria-valuemin="0" ria-valuemax="100"></div>
  </div>

  <form action="" method="post" enctype="multipart/form-data" style="margin-top: 3%">
    <div class="row">
      <?php while($row = mysqli_fetch_assoc($minuman)) : ?>
        <div class="col-lg-3">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark text-center"><?= $row['kategori']; ?></h6>
            </div>
            <div class="card-body text-center">
              <img style="height: 100px;" src="img/<?= $row['gambar']; ?>" alt="...">
              <h6 class="m-0 font-weight-bold text-dark mt-2"><?php echo $row['nama_masakan'];?></h6>
              <h6 class="m-0 font-weight-bold text-danger mt-2">Rp. <?php echo $row['harga'];?></h6>
            </div>
            <div class="card-footer text-center border-bottom-info">
              <a href="aksi_keranjang.php?id=<?= $row['id_masakan']; ?>" class="btn btn-primary btn-sm"><b>Pesan</b></a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
    </div>
  </form>
</div>
<!-- Akhir Menu -->

<!-- Footer -->
<!-- <footer class=" text-white bg-dark">
  <div class="container">
    <div class="row pt-3">
      <div class="col text-center">
        <p style="font-family: Lucida Calligraphy; font-size: 13px;">Copyright @RestoEat&JoyFactory2020</p>
      </div>
    </div>
  </div>
</footer> -->
<!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jsb/jquery-3.4.1.slim.min.js"></script>
    <script src="js/jsb/popper.min.js"></script>
    <script src="js/jsb/bootstrap.min.js"></script>
  </body>
</html>