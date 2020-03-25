<?php 
 include "admin/sidebar.php";
 include "function.php";

 ?>
 
 <div class="container">
<h3><b>Selamat Datang Di Resto Eat&Joy Factory</b></h3><hr>


          <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="row">

            <?php if ($_SESSION ['user_level'] == 1)  { ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">MENU</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $sql = "SELECT * FROM masakan";
                          $query = mysqli_query($koneksi,$sql);
                          $count = mysqli_num_rows($query);
                          echo " $count";?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-light-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php if ($_SESSION ['user_level'] == 1 || $_SESSION ['user_level'] == 2)  { ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ORDER</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">  <?php 
                        $sql = "SELECT * FROM orders";
                        $query = mysqli_query($koneksi,$sql);
                        $count = mysqli_num_rows($query);
                         echo " $count";?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-light-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php if ($_SESSION ['user_level'] == 1 || $_SESSION ['user_level'] == 3)  { ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TRANSAKSI</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                        $sql = "SELECT * FROM transaksi";
                        $query = mysqli_query($koneksi,$sql);
                        $count = mysqli_num_rows($query);
                        echo " $count";?></div> 
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-light-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php if ($_SESSION ['user_level'] == 1)  { ?>
            <div class="col-xl-3 col-md-6 mb-4 lg-6">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LAPORAN</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">                      <!-- <?php 
                      $sql = "SELECT * FROM masakan";
                      $query = mysqli_query($koneksi,$sql);
                      $count = mysqli_num_rows($query);
                      echo " $count";?> --></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-map fa-2x text-light-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

        </div>
        </div>
      </div>
    
<!-- END STAT -->
<?php include "admin/footer.php"; ?>