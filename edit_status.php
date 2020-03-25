<?php
 include "admin/sidebar.php";
 include "function.php";
$id_order = $_GET['id_order'];
$sts = query_status("SELECT * FROM orders WHERE id_order = $id_order ")[0];

if(isset($_POST['submit'])){
  if(edit_status($_POST)>0){
  echo "
    <script>
      alert('Status berhasil di ubah')
      document.location.href = 'data_order_sudahDibayar.php?page=data_order_sudahDibayar';
    </script>";
  } else {
    echo "
    <script>
      alert('Status gagal di ubah')
      document.location.href = 'data_order_sudahDibayar.php?page=data_order_sudahDibayar';
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

        <div class="container">
        <div class="cad-body">
          <input type="hidden" name="id_order" value="<?=$sts['id_order'];?>">

          <!-- Ubah Status -->
         <div class="form-group">
          <label>Pilih Akses Sebagai :</label>
                  <select name="status_order" class="form-control" required="">
                    <?php if ($sts["status_order"]=='Sudah Dibayar') {
                           echo '<option>Sudah Dibayar</option><option>Di Proses</option>';
                       }?>
                  </select>
                </div>


        <div class="card-footer">
          <button class="btn btn-info" type="submit" name="submit">Simpan</button>
      </div> <!-- end card-->
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php include "admin/footer.php"; ?>