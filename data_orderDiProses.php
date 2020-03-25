<?php   
    
  include "admin/sidebar.php";
  include "function.php";
  $result = mysqli_query($koneksi, "SELECT * FROM orders INNER JOIN user ON orders.id_user=user.id_user WHERE status_order='DiProses'");
 ?>

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
              <th>ID ORDER</th>
              <th>KODE ORDER</th>
              <th>NAMA</th>
              <th>TANGGAL</th>
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
                <td><?= $row['id_order']; ?></td>
                <td><?= $row['kode_beli']; ?></td>
                <td><?= $row['nama_user']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['status_order']; ?></td></td>
                <td>
                  <a onclick="return confirm('Yakin ?')" href="tandai.php?id_order=<?= $row['id_order']; ?>" class="btn btn-sm btn-primary">Tandai</a>
                  <a href="detail_beli.php?id_order=<?= $row["id_order"]; ?>" class="btn btn-danger btn-sm" >Detail</i></a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>  
    </div>  
  </div>
 </div>

 <?php include "admin/footer.php"; ?>