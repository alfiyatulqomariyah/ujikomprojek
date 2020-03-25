<?php 
 include "admin/sidebar.php";
 include "function.php";
if(isset($_POST["submit"])){
if (tambah_menu($_POST) > 0){
	echo "
		 <script>
			alert('Menu berhasil di tambahkan')
		 	document.location.href = 'menu.php?page=menu';
		</script>";
} else {
    echo "
    <script>
      alert('Menu gagal di tambahkan')
      document.location.href = 'menu.php?page=menu';
    </script>";
	}
 }
?>

<div class="container">
<h1>Menu <small class="text-muted">Tambah</small></h1>
<hr>
<div class="row">
	<div class="col-md-6 mb-3">
		<form  method="post" enctype="multipart/form-data">		
			<div class="card">
				<div class="card-header">
					<h5>Tambah Menu Baru</h5>
				</div> <!-- end card hearder-->
				<div class="card-body">
					<!-- input  gambar -->
					<div class="form-group form-label-group">
						<input type="file" name="gambar"
						class="form-control"
						id="gambar" value="" required>
						<!-- <label for="gambar">Gambar Produk</label> -->
					</div>
					<!-- input gmbar --> 
					<div class="form-group form-label-group">
						<!-- <label for="nMasakan">Menu</label> -->
						<input type="text" name="nama_masakan" 
						class="form-control"
						id="nMasakan" placeholder="Menu" required>
					</div>
					<!-- Input harga -->
					<div class="form-group form-label-group">
						<!-- <label for="nHarga">Harga</label> -->
						<input type="number" name="harga" 
						class="form-control"
						id="nHarga" placeholder="Harga" required>
					</div>
					<div class="form-group form-label-group">
						<!-- <label for="nKategori">Kategori</label> -->
						<input type="text" name="kategori" 
						class="form-control" value="" 
						id="nKategori" placeholder="Kategori">
						<p>Diisi dengan Makanan/Minuman</p>
					</div>
					<!-- Input status -->
					<div class="form-group form-label-group">
						<!-- <label for="nStatus">Status Masakan</label> -->
						<input type="text" name="status_masakan" 
						class="form-control" value="" 
						id="nStatus" placeholder="Status Masakan">
						<p>Diisi dengan Tersedia/Habis</p>
					</div>
				</div> <!-- end card body-->
				<div class="card-footer">
					<button class="btn btn-primary" type="submit" name="submit"> Simpan</button>
				</div> <!-- end card footer-->
			</div> <!-- end card-->
		</form>
	</div>
</div>
</div>
<?php include "admin/footer.php"; ?>