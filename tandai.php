<?php 
include "function.php";
$id_order = $_GET['id_order'];
if(empty($id_order)) {
	header('location : data_order_sudahDibayar.php');
}

	$sql = "UPDATE orders SET status_order='Diproses' WHERE id_order='$id_order'";
	$query = mysqli_query($koneksi, $sql);
	if($query) {
		?>
			<script type="text/javascript">
				window.location.href="data_order_sudahDibayar.php";
			</script>
		<?php
	} else {
		?>
		<script type="text/javascript">
			alert('Gagal Mengubah Status');
			window.location.href="data_order_sudahDibayar.php";
		</script>
		<?php
	}
 ?>
