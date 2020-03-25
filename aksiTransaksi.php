<?php 
session_start();
include "function.php";
$sid = $_SESSION["user_id"];
$total_a= 0;
$sql = mysqli_query($koneksi, "SELECT * FROM  detail_order INNER JOIN masakan ON detail_order.id_masakan=masakan.id_masakan WHERE id_order='$_GET[id_order]'");
$dt=mysqli_num_rows($sql);

$sql = mysqli_query($koneksi, "SELECT id_order FROM transaksi WHERE id_order='$_GET[id_order]' AND id_user='$sid'");
$ketemu = mysqli_num_rows($sql);
if($ketemu==0) {
	$tgl_skrg = date("Ymd");
	$total = $_POST['total'];
	// kalau brg blm ad mk d jlnkn prnth insert
	mysqli_query($koneksi, "INSERT INTO transaksi
							(id_user, id_order, tanggal, total_bayar)
							VALUES ('$sid', '$_GET[id_order]', '$tgl_skrg', '$total_bayar')");
	mysqli_query($koneksi, "UPDATE orders SET status_orders = 'SUdah Dibayar' WHERE id_order='$_GET[id_order]'");
} else {
	//kalau barang ada mk jlnkn prntah update
	mysqli_query($koneksi, "UPDATE status_orders
		SET status_detail_order='Pesanan DIterima' WHERE id_status_order='$_GET[id_order]'");
}
header('Location:data_transaksi.php');
 ?>
