<?php
include "admin/sidebar.php";
if($_SESSION['user_level'] != 1) { header("location:index.php?page=index");}
include "function.php";
$result = mysqli_query($koneksi, "SELECT * FROM masakan ORDER BY id_masakan DESC");

// Pagination
$jumlahDataPerHalaman = 4;
$jumlahData= count(query( "SELECT * FROM user"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$result =  mysqli_query($koneksi, "SELECT * FROM masakan LIMIT $awalData, $jumlahDataPerHalaman");
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
</head>
<body>
    <div class="container" style="margin-bottom: 30px;">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-secondary"><b>Daftar</b>Menu</h5>
        </div>
        <div class="card-body">
            <div class="table-responsi">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status Masakan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <a href="tambah_menu.php?page=tambah_menu" class="fa fa-w fa-plus btn btn-primary" style="margin-bottom: 20px;"> Tambah</a>

                        <!-- Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="post" autocomplete="on">
                            <div class="input-group" style="margin-bottom: 20px;">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="cari" value="cari">
                                            <i  class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                            </div>
                        </form>

                        <?php
                        if(isset($_POST["cari"])) {
                            $keyword = $_POST["keyword"];
                            $result = mysqli_query($koneksi, "SELECT * FROM masakan WHERE nama_masakan LIKE '%$keyword%' OR harga LIKE '%$keyword%' ORDER BY masakan.id_masakan ASC");
                        }
                        $cek = mysqli_num_rows($result);
                        if($cek < 1) { ?>
                          <p class="mt-5 text-center">Data tidak ditemukan</p>
                        <?php } ?>

                    </tfoot>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><img style="height: 70px; width: 90px;" src="img/<?= $row['gambar']; ?>" alt="..."></td>
                            <td><?= $row['nama_masakan']; ?></td>
                            <td><?= $row['kategori']; ?></td>
                            <td>Rp. <?= $row['harga']; ?></td>
                            <td><?= $row['status_masakan']; ?></td>
                            <td>
                                <a href="edit_menu.php?id_masakan=<?= $row['id_masakan']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="hapus_menu.php?id_masakan=<?= $row['id_masakan']; ?>" onclick="return confirm('Apakah Yakin Ingin Menghapus Menu Ini?')" class="btn btn-danger btn-sm class="fas fa-trash><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <nav aria-label="..." style="">
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

            </div>
        </div>
    </div>
</div>

</body>
</html>


<?php include "admin/footer.php"; ?>