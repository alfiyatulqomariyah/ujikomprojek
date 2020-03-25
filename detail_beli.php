<?php   
  include "admin/sidebar.php";
  include "function.php";
  $result = mysqli_query($koneksi, "SELECT * FROM transaksi LEFT JOIN  detail_order ON detail_order.id_order=transaksi.id_order LEFT JOIN user ON detail_order.id_user=user.id_user LEFT JOIN masakan ON detail_order.id_masakan=masakan.id_masakan");
 ?>

 <div class="container" style="margin-bottom: 30px;">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-secondary"><b>DETAIL</b> ORDER
      </h5>
    </div>
     <!-- Ubah Gambar --> 
        <div class="card-body">
            <input type="hidden" name="id_masakan" value="<?= $result["jumlah"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $result["kode_beli"]; ?>">
          </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>JUMLAH</th>
              <th>KODE ORDER</th>
              <th>PESANAN</th>
              <th>HARGA</th>
              <th>NAMA</th>
              <th>TANGGAL</th>
              <th>KETERANGAN</th>
            </tr>
          </thead>
          <tfoot>
          </tfoot>
          <tbody>

            <?php while($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['kode_beli']; ?></td>
                <td><?= $row['nama_masakan']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['nama_user']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['keterangan']; ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>  
    </div>  
  </div>
 </div>

 <?php include "admin/footer.php"; ?>