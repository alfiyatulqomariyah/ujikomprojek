<?php 
  include "admin/sidebar.php";
 include "function.php";
$result = mysqli_query($koneksi, "SELECT * FROM orders ORDER BY id_order DESC");

?>
			<div class="container" style="margin-bottom: 30px;">
			<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-secondary"><b>User</b> Setting</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No_meja</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php while($row = mysqli_fetch_assoc($result)) : ?>
				<tr>
					<td><?= $row['no_meja']; ?></td>
					<td><?= $row['tanggal']; ?></td>
					<td><?= $row['keterangan']; ?></td>
					<td><?= $row['harga']; ?></td>
					<td><?= $row['status_order']; ?></td>
					<td>

					<a href="edit_user.php?id_user=<?= $row["id_user"]; ?>" class="btn btn-info btn-sm"><i class="fas fa-edit">Edit</i></a>
          
					<a href="transaksi.php?id_order=<?= $row["id_order"]; ?>" class="btn btn-danger btn-sm">Bayar</a>

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