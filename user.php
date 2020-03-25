<?php   
  include "admin/sidebar.php";
  if($_SESSION['user_level'] != 1) { header("location:index.php?page=index");}
  include "function.php";
  $result = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN level ON user.id_level=level.id_level");

  // Pagination
$jumlahDataPerHalaman = 4;
$jumlahData= count(query( "SELECT * FROM user"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$result = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN level on user.id_level = level.id_level LIMIT $awalData, $jumlahDataPerHalaman ");

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>USER</title>
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
</head>
<body>
   <div class="container" style="margin-bottom: 30px;">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-secondary"><b>User</b> Setting
      </h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Username</th>
              <th>Nama Pengguna</th>
              <th>Aksi</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
            <a href="registrasi.php?page=registrasi" class="fa fa-w fa-plus btn btn-primary" style="margin-bottom: 20px;"> Tambah</a>

            <!-- Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="post" autocomplete="on">
              <div class="input-group"style="margin-bottom: 20px;">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" name="cari" value="cari">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>

            <?php   

              if(isset($_POST["cari"])){
                $keyword = $_POST["keyword"];

                $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username LIKE '%$keyword%' OR nama_user LIKE '%$keyword%' ORDER BY user.id_user ASC");
              }

              $cek = mysqli_num_rows($result);
              if($cek < 1) { ?>
                <p class="mt-5 text-center">Data tidak ditemukan</p>
    

             <?php } ?>

             <tr>
              <th>Username</th>
                  <th>Nama Pengguna</th>
                  <th>Akses</th>
                  <th>Opsi</th>
             </tr>
          </tfoot>
          <tbody>

            <?php while($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
                <td><?= $row['username']; ?></td>
                <td><?= $row['nama_user']; ?></td>
                <td><?= $row['nama_level']; ?></td>
                <td>

                <a href="edit_user.php?id_user=<?= $row["id_user"]; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                <?php if ($_SESSION['user_id'] != $row["id_user"]) { ?>
                  <a href="hapus_user.php?id_user=<?= $row["id_user"]; ?>" onclick="return confirm('Apakah Yakin Ingin Menghapus User Ini?')" class="btn btn-danger btn-sm"
                    ><i class="fas fa-trash"></i></a>
                <?php  }?>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>  
    </div>  
  </div>
 </div>
</body>
</html>

<nav aria-label="..." style="margin-left: 30px;">
  <ul class="pagination">
    <?php if($halamanAktif > 1 ) : ?>
      <li class="page-item">
        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">Previous</a>
      </li>
    <?php endif; ?>
    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
    <?php if($i == $halamanAktif) : ?>
      <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>" style="font-weight: bold;"><?= $i ?></a></li>
    <?php else : ?>
      <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
    <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman) : ?>
      <li class="page-item">
        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
      </li>
    <?php endif; ?>
  </ul>
</nav>

 <?php include "admin/footer.php"; ?>