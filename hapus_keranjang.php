<?php 
$koneksi = mysqli_connect("localhost", "root", "", "kasir");
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_keranjang = $id");

if( mysqli_affected_rows($koneksi) > 0 ) {
	echo "
	<script>
		alert('Pesanan berhasil di hapus');
		document.location.href = 'keranjang.php?page=keranjang';
	</script>
	";
} else {
	echo "
	<script>
		alert('Pesanan gagal di hapus');
		document.location.href = 'keranjang.php?page=keranjang';
	</script>
	";
}

 ?>