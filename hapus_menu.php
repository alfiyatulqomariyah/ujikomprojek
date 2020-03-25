<?php 
$koneksi = mysqli_connect("localhost", "root", "", "kasir");
$id_masakan = $_GET["id_masakan"];
mysqli_query($koneksi, "DELETE FROM masakan WHERE id_masakan = $id_masakan");

if( mysqli_affected_rows($koneksi) > 0 ) {
	echo "
	<script>
		alert('Menu berhasil di hapus');
		document.location.href = 'menu.php?page=menu';
	</script>
	";
} else {
	echo "
	<script>
		alert('Menu gagal di hapus');
		document.location.href = 'menu.php?page=menu';
	</script>
	";
}

 ?>