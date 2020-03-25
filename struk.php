<?php 
include "function.php";
$sql = "SELECT * FROM transaksi LEFT JOIN  detail_order ON detail_order.id_order=transaksi.id_order LEFT JOIN user ON detail_order.id_user=user.id_user LEFT JOIN masakan ON detail_order.id_masakan=masakan.id_masakan";
$query= mysqli_query($koneksi, $sql);
$cek = mysqli_num_rows($query);

if($cek > 0) {
	$data = mysqli_fetch_array($query);
} else {
	?>
	<script type="text/javascript">
		window.location.href="data_transaksi.php";
	</script>
	<?php
}
// print_r($data);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Struk</title>
	<style type="text/css">
		body {
			font-family: monospace;
		}
		.cetak {
			width: 40%;
			height: auto;
			border: 1px solid #000;
			padding: 20px;
		}
	</style>
</head>
<body style="margin: 0 auto;">
	<center>

		<div class="cetak">
			<h2 style="margin: 0;">RESTO EAT&JOY FACTORY</h2> <br/>
			<span><?= date('d-m-Y')  . ", ". date('H:i:s') ?></span>
			<br>
		<table style="float: none;" width="100%" border="0" cellpadding="10" cellspacing="0">
			<tr>
				<td colspan="4">Nama: <?= $data['nama_user']; ?></td>
				<tr>
					<td style="border-bottom: 1px solid#999"><?= $data['nama_masakan']; ?></td>
					<td style="border-bottom: 1px solid#999"><?= $data['harga']; ?></td>
					<td style="border-bottom: 1px solid#999"><?= $data['jumlah']; ?>x </td>
					<td style="border-bottom: 1px solid#999"><?= $data['total']; ?></td>
				</tr>
				<tr>
					<td colspan="3">Uang Bayar</td>
					<td><?= $data['bayar']; ?></td>
				</tr>
				<tr>
					<td colspan="3">Kembalian</td>
					<td><?= $data['kembalian']; ?></td>
				</tr>
				<tr>
					<td colspan="4" style="text-align: center;">Terimakasih atas kunjungan Anda!</td>
				</tr>
			</tr>
		</table>
		</div>
	</center>
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>