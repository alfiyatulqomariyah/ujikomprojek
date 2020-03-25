<?php 
session_start();
 if(!isset($_SESSION["user_username"])){
  header("location: login.php");
  exit;
 }


 ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resto Eat&Joy Factory</title>
  <link rel="shortcut icon" type="image/png" href="img/food.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="img/food.png" width="45px;">
        </div>
        <div class="sidebar-brand-text mx-6">Resto Eat&Joy <sup>Factory</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>

      </li>
      <?php if ($_SESSION ['user_level'] == 1)  { ?>
      <!-- Nav Item User -->
      <li class="nav-item">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-id-badge"></i>
          <span>User</span></a>
      </li>
    

      <li class="nav-item">
        <a class="nav-link" href="menu.php">
          <i class="fa fa-coffee"></i>
          <span>Entri Menu</span></a>
      </li>
<?php } ?>

      <?php if ($_SESSION ['user_level'] == 1 || $_SESSION ['user_level'] == 2) { ?>
      <!-- Order -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Entri Order</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">LAINNYA :</h6>
            <a class="collapse-item" href="data_order_sudahDibayar.php">Data Order Sudah Dibayar</a>
            <a class="collapse-item" href="data_orderDiProses.php">Data Order Diproses</a>
            <a class="collapse-item" href="index2.php">Pesan</a>
            <!-- <a class="collapse-item" href="tambah_pesanan.php">Meja</a> -->
          </div>
        </div>
      </li>
  <?php } ?>

       <?php if ($_SESSION ['user_level'] == 1 || $_SESSION ['user_level'] == 3) { ?>
       <!-- Transaksi -->
      <li class="nav-item">
        <a class="nav-link" href="data_transaksi.php">
          <i class="fas fa-dollar-sign"></i>
          <span>Entri Transaksi</span></a>
      </li>
<?php } ?>

<?php if ($_SESSION ['user_level'] == 1 || $_SESSION ['user_level'] == 2 || $_SESSION ['user_level'] == 3 || $_SESSION ['user_level'] == 4) { ?>
      <!-- Laporan -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-book"></i>
          <span>Generate Laporan</span></a>
      </li>
      <?php } ?>

      <!-- Divider -->
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-one d-lg-inline text-gray-800 small"><?= $_SESSION["user_username"]; ?></span>
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        
        <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
