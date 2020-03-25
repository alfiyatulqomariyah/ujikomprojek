<?php   
  include "admin/sidebar.php";
  include "function.php";
  $sid = $_SESSION["user_id"];
  $total_a =0;
  $result = mysqli_query($koneksi, "SELECT * FROM orders INNER JOIN user ON orders.id_user=user.id_user");
   ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <div class="container" style="margin-bottom: 30px;">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-secondary"><b>DATA</b> ORDER
      </h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO MEJA</th>
              <th>KODE ORDER</th>
              <th>NAMA PEMESAN</th>
              <th>STATUS ORDER</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tfoot>
          </tfoot>
          <tbody>

            <?php while($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
                <td><?= $row['no_meja']; ?></td>
                <td><?= $row['kode_beli']; ?></td>
                <td><?= $row['nama_user']; ?></td>
                <td><?= $row['status_order']; ?></td>
                <td>

                <a href="transaksi.php?id_order=<?= $row["id_order"]; ?>" class="btn btn-danger btn-sm">Bayar</a>
                <!-- <a href="detail_beli.php?id_order=<?= $row["id_order"]; ?>" class="btn btn-primary btn-sm" >Detail</i></a> -->
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>

        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM detail_order INNER JOIN user ON orders.id_user=user.id_user");
        ?>

       <!--  <div class="modal fade" id="modalIni" tabindex="-1" role="dialog" aria-labelledby="modalTR" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalIni">Detail Pesanan</h5>
                    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>
                        <div class="modal-body">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea harum aspernatur reiciendis. Voluptatum suscipit aliquam vitae sint, labore voluptas eveniet. Et neque est a suscipit, reiciendis iusto deleniti similique nostrum!
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                </div>
              </div>
            </div>
          </div> -->

      </div>  
    </div>  
  </div>
 </div>
</body>
</html>

<?php include "admin/footer.php"; ?>