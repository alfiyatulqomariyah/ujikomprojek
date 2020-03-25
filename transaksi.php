<?php 
include "admin/sidebar.php";
include "function.php";

$sql_kode = "SELECT max(id_transaksi) as maxKode FROM transaksi";
$query_kode = mysqli_query($koneksi, $sql_kode);

$data_kode = mysqli_fetch_array($query_kode);
$id_transaksi = $data_kode['maxKode'];

$noUrut = (int) substr($id_transaksi, 3, 3);
$noUrut++;

$char = "TRK";
$kodeTransaksi = $char . sprintf("%03s", $noUrut);

// $id_order = $_GET["id_order"];
$result = "SELECT * FROM  detail_order INNER JOIN masakan ON detail_order.id_masakan=masakan.id_masakan";
$d_query= mysqli_query($koneksi, $result);
$data = mysqli_fetch_array($d_query);
 ?>

<div class="container">
<h1>Transaksi <small></small></h1>
<hr>
<div class="row">
  <div class="col-md-6 mb-3">
    <form  method="post" action="" enctype="multipart/form-data">  
      <div class="card">
        <div class="card-header">
          <h5>Transaksi</h5>
        </div>

        <div class="container">
        <div class="cad-body">
        <input type="hidden" name="id_order" value="<?=$data['id_order'];?>">

        <div class="row"> 
        <form  method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="kodeTransaksi" value="<?= $kodeTransaksi?>">
        <div class="form-group" style="margin-right: 11px;">
        	<label>Pesanan</label>
          <input type="text" name="" class="form-control" value="<?=$data['nama_masakan'];?>" readonly>
        </div>
        <div class="form-group">
        	<label>Harga</label>
          <input type="text" name="harga" class="form-control" require value="<?=$data['harga'];?>" readonly>
        </div>
         <div class="form-group" style="margin-right: 11px;">
         	<label>Jumlah</label>
          <input type="text" name="jumlah" class="form-control" require value="<?=$data['jumlah'];?>" readonly>
        </div>
         <div class="form-group">
         	<label>Total Bayar</label>
          <input type="number" name="total" class="form-control" require value="<?=$data['jumlah'] * $data['harga'];?>" readonly>
        </div>
        <div class="form-group" style="margin-right: 11px;">
        	<label>Uang Pelanggan</label>
          <input type="number" name="bayar" class="form-control" require>
        </div>
         <!-- <div class="form-group">
         	<label>Kembalian</label>
          <input type="text" name="kembalian" class="form-control" require value="<?=$data['bayar'] - $data['total'];?>">
        </div> -->
        <br>

      </div>

       <input type="submit" name="submit" value="Simpan" class="btn btn-primary" style="width: 20%; height: 20%; margin-right: 11px; margin-bottom:  11px;">
          <a href="data_transaksi.php" class="btn btn-primary" style="width: 20%; height: 20%;  margin-bottom:  11px;"> Kembali</a>
          <br>
    </form>
    </div>

    <div class="row">
    <?php 
    	if(isset($_POST['submit'])) {
    		$total = $_POST['total'];
    		$bayar = $_POST['bayar'];
    		$kode = $_POST['kodeTransaksi'];
    		if($bayar < $total) {
    			?>
    			<div class="alert alert-danger">
    				Nominal uang kurang
    			</div>
    			<?php
    		} else {
    			$tgl_skrg = date("Ymd");
    			$sid = $_SESSION["user_id"];
    			$id_order = $_POST["id_order"];
    			$kembalian = $bayar - $total;
    			$sql_insert = "INSERT INTO transaksi SET id_transaksi='$kode', id_user='$sid', id_order='$id_order', tanggal='$tgl_skrg', total='$total', bayar='$bayar', kembalian='$kembalian'";
    			$query_insert = mysqli_query($koneksi, $sql_insert);
    			if($query_insert) {
    				$update = "UPDATE orders SET status_order='Sudah Dibayar' WHERE id_order='$id_order'";
    				$query_update = mysqli_query($koneksi, $update);
    				if($query_update) {
    					?>
    					<div class="col-lg-12">
    					<p>Uang Kembalian: <?= $kembalian?></p>
    					<span style="float: left;"><a href="struk.php?id_transaksi=<?= $kode?>">Cetak</a></span>
    					</div>
    					<?php 
    				}
    			}
    		}
    	}
     ?>
     </div>

  </div>
</div>
</div>
</div>
</div>
<?php include "admin/footer.php"; ?> 