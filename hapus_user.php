<?php 
$koneksi = mysqli_connect("localhost", "root", "", "kasir");
$id_user = $_GET["id_user"];
mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_user");

if( mysqli_affected_rows($koneksi) > 0 ) {
	echo "
	<script>
		alert('User berhasil di hapus');
		document.location.href = 'user.php?page=user';
	</script>
	";
} else {
	echo "
	<script>
		alert('User gagal di hapus');
		document.location.href = 'user.php?page=user';
	</script>
	";
}

 ?>