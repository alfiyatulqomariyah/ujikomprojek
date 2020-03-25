<?php
 include "admin/sidebar.php";
 include "function.php";
$id_masakan = $_GET['id_masakan'];
$masakan = query_menu("SELECT * FROM masakan WHERE id_masakan = $id_masakan ")[0];

if(isset($_POST['submit'])){
  if(edit_menu($_POST)>0){
  echo "
    <script>
      alert('Menu berhasil di ubah')
      document.location.href = 'menu.php?page=menu';
    </script>";
  } else {
    echo "
    <script>
      alert('Menu gagal di ubah')
      document.location.href = 'menu.php?page=menu';
    </script>";
  }
}
?>
<div class="container">
<h1>Ubah <small>Menu</small></h1>
<hr>
<div class="row">
  <div class="col-md-6 mb-3">
    <form  method="post" action="" enctype="multipart/form-data">  
      <div class="card">
        <div class="card-header">
          <h5>Ubah Menu Baru</h5>
        </div>

        
        <!-- Ubah Gambar --> 
        <div class="card-body">
            <input type="hidden" name="id_masakan" value="<?= $masakan["id_masakan"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $masakan["gambar"]; ?>">
          <div class="form-group form-label-group">
            <input type="hidden" name="id_masakan" value="<?= $masakan["id_masakan"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $masakan["gambar"]; ?>">
            <img src="img/<?=$masakan['gambar'];?>" style="width:20%">
            <input type="file" name="gambar">
          </div>

          <!-- Ubah Menu -->
        <div class="form-group form-label-group">
          <label>Menu</label>
            <input type="text" name="nama_masakan" class="form-control" value="<?=$masakan['nama_masakan'];?>">
        </div>

          <!-- Ubah Harga -->
          <div class="form-group form-label-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?=$masakan['harga']; ?>">
          </div>

          <!-- Ubah Status -->
          <div class="form-group form-label-group">
            <label>Status Masakan</label>
            <input type="text" name="status_masakan" class="form-control" value="<?=$masakan['status_masakan']; ?>">
            <p>Diisi dengan Tersedia/Habis</p>
          </div>

        <div class="card-footer">
          <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
      </div> <!-- end card-->
    </form>
  </div>
</div>
</div>
<?php include "admin/footer.php"; ?>