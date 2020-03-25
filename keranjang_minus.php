<?php  
session_start();
include "function.php";
$sid = $_SESSION["user_id"];
$id = $_GET["id"];

$sql = mysqli_query($koneksi, "SELECT id_masakan FROM keranjang WHERE id_masakan='$_GET[id]' AND id_user='$sid'");
	$ketemu=mysqli_num_rows($sql);
	if ($ketemu > 0) {
		// kalau belum ada mka jlnkn prnth insert
		mysqli_query($koneksi, "UPDATE keranjang SET jumlah = jumlah - 1 WHERE id_user = '$sid' AND id_masakan='$_GET[id]'");
	}

	header('Location:keranjang.php?page=keranjang');

?>