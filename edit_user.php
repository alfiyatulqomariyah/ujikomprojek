<?php
 include "admin/sidebar.php";
 include "function.php";
$id_user = $_GET['id_user'];
$user = query_user("SELECT * FROM user WHERE id_user = $id_user ")[0];
$result = mysqli_query($koneksi, "SELECT * FROM level");

if(isset($_POST['submit'])){
  if(edit_user($_POST)>0){
  echo "
    <script>
      alert('User berhasil di ubah')
      document.location.href = 'user.php?page=user';
    </script>";
  } else {
    echo "
    <script>
      alert('User gagal di ubah')
      document.location.href = 'user.php?page=user';
    </script>";
  }
}
?>
<div class="container">
<h1>Ubah <small>User</small></h1>
<hr>
<div class="row">
  <div class="col-md-6 mb-3">
    <form  method="post" action="" enctype="multipart/form-data">  
      <div class="card">
        <div class="card-header">
          <h5>Ubah User Baru</h5>
        </div>

        <div class="container">
        <div class="cad-body">
          <input type="hidden" name="id_user" value="<?=$user['id_user'];?>">

          <!-- Ubah User -->
        <div class="form-group form-label-group">
          <label>Nama User</label>
            <input type="text" name="nama_user" class="form-control" value="<?=$user['nama_user'];?>">
        </div>

          <!-- Ubah Username -->
          <div class="form-group form-label-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?=$user['username']; ?>">
          </div>

          <!-- Password -->
          <div class="form-group form-label-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?=$user['password']; ?>">
          </div>
          
          <!-- Akses -->

        <div class="form-group">
          <label>Pilih Akses Sebagai :</label>
                  <select name="id_level" class="form-control" required="">
                    <?php if ($user['id_level']=='1') {
                           echo '<option>admin</option><option>kasir</option><option>waiter</option><option>owner</option>';
                       } else if ($user['id_level']=='2') {
                           echo "<option>waiter</option><option>admin</option><option>kasir</option><option>owner</option>";
                      } else if ($user ['id_level']=='3'){
                            echo "<option>kasir</option><option>admin</option><option>waiter</option><option>owner</option>";
                       } else if ($user['id_level']=='4'){
                            echo "<option>owner</option><option>admin</option><option>kasir</option><option>waiter</option>";
                       }?>
                  </select>
                </div>

          <div class="card-footer">
            <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
          </div> <!-- end card-->

      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
<?php include "admin/footer.php"; ?> 