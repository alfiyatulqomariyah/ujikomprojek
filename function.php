<?php 
// menghubungkan dengan koneksi
$koneksi = mysqli_connect("localhost", "root", "", "kasir");
// cek koneksi
if (mysqli_connect_errno()) {
  echo "koneksi database gagal :" . mysqli_connect_error();
}

function query($query){
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows [] = $row;
  }
  return $rows;
}

// Registrasi
function registrasi($regis) {
  global $koneksi;

  $NamaLengkap = mysqli_real_escape_string($koneksi, $regis["NamaLengkap"]);
  $username =strtolower(stripcslashes($regis["username"]));
  $password = mysqli_real_escape_string($koneksi, $regis["password"]);
  $id_level = ($regis["id_level"]);
  // cek username sudah ada atau belum
  $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username= '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
          alert('Username sudah terdaftar!');
          </script>";
        return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  // tambahkan user baru ke database
  mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$password','$NamaLengkap','$id_level') ");

  return mysqli_affected_rows($koneksi);
}

//Upload gambar
function upload(){
  $namaFile=$_FILES['gambar']['name'];
  $ukuranFile=$_FILES['gambar']['size'];
  $error=$_FILES['gambar']['error'];
  $tmpName=$_FILES['gambar']['tmp_name'];
// // cek apakah tidak ada gambar yang diupload
  if( $error === 4){
    echo "
    <script>
      alert('Pilih gambar terlebih dahulu!');
      document.location.href = 'tambah_menu.php';
    </script>";

    return false;
  } 
  $ekstensiGambarValid=['jpg','jpeg','png'];
  $ekstensiGambar=explode('.', $namaFile);
  $ekstensiGambar=strtolower(end($ekstensiGambar));
  if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "
    <script>
      alert('Yang anda upload bukan gambar')
      document.location.href = 'tambah_menu.php';
    </script>";
    return false;

  }
  $namafile_baru=uniqid();
  $namafile_baru.= '.';
  $namafile_baru.=$ekstensiGambar;
  $folder ="img/";
  move_uploaded_file($tmpName,$folder . $namafile_baru);
  return $namafile_baru;
}

// tambah menu
function tambah_menu($data){
  global $koneksi;
$nama_masakan=htmlspecialchars($data["nama_masakan"]);
$gambar = upload();
if( !$gambar ){
  return false;
}
$harga=htmlspecialchars($data["harga"]);
$status_masakan=htmlspecialchars($data["status_masakan"]);
$kategori=htmlspecialchars($data["kategori"]);
$query ="INSERT into masakan values ('','$nama_masakan','$gambar','$harga','$status_masakan','$kategori')";
mysqli_query($koneksi,$query);
return mysqli_affected_rows($koneksi);
}


// Ubah menu
function query_menu($query) {
  global $koneksi;
  $masakan = mysqli_query($koneksi, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($masakan) ){
    $rows[] = $row;
  }
  return $rows;
 }

function edit_menu($ubahmenu){
  global $koneksi;
  $id_masakan = $ubahmenu["id_masakan"];
  $nama_masakan=htmlspecialchars($ubahmenu["nama_masakan"]);
  $gambarLama = htmlspecialchars($ubahmenu["gambarLama"]);
  $harga=htmlspecialchars($ubahmenu["harga"]);
  $status_masakan=htmlspecialchars($ubahmenu["status_masakan"]);
  // apakah yang di pilih gambar
  if($_FILES['gambar']['error'] === 4){
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }
  $query="UPDATE masakan SET
      id_masakan='$id_masakan',
      nama_masakan='$nama_masakan',
      gambar='$gambar',
      harga='$harga',
      status_masakan='$status_masakan'
      WHERE
      id_masakan=$id_masakan
      ";
  mysqli_query($koneksi,$query);
  return mysqli_affected_rows($koneksi);
  }

// tambah user
function tambah_user($user){
  global $koneksi;
$username=htmlspecialchars($user["username"]);
$nama_user=htmlspecialchars($user["nama_user"]);
$password=htmlspecialchars($user["password"]);
$id_level=htmlspecialchars($user["id_level"]);
$query ="INSERT into user values ('','$username','$password','$nama_user','$id_level')";
mysqli_query($koneksi,$query);
return mysqli_affected_rows($koneksi);
}

// Edit User
function query_user($query) {
  global $koneksi;
  $user = mysqli_query($koneksi, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($user) ){
    $rows[] = $row;
  }
  return $rows;
 }

function edit_user($ubahuser){
  global $koneksi;
  $id_user = $ubahuser["id_user"];
  $nama_user=htmlspecialchars($ubahuser["nama_user"]);
  $username=htmlspecialchars($ubahuser["username"]);
  $password = htmlspecialchars($ubahuser["password"]);
  $id_level = htmlspecialchars($ubahuser["id_level"]);

  if ($_POST['id_level']=='admin') {
                           $id_level='1';
                       } else if ($_POST['id_level']=='waiter') {
                           $id_level='2';
                        } else if ($_POST['id_level']=='kasir') {
                           $id_level='3';
                       } else {
                            $id_level='4';
                       }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query="UPDATE user SET
      username='$username',
      password='$password',
      nama_user='$nama_user',
      id_level='$id_level'
      WHERE
      id_user=$id_user
      ";
  mysqli_query($koneksi,$query);
  return mysqli_affected_rows($koneksi);
  }


function query_status($query) {
  global $koneksi;
  $sts = mysqli_query($koneksi, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($sts) ){
    $rows[] = $row;
  }
  return $rows;
 }

function edit_status($ubahstatus){
  global $koneksi;
  $id_order = $ubahstatus["id_order"];
  $sts=htmlspecialchars($ubahstatus["status_order"]);

  if ($_POST['id_order']=='Sudah Dibayar') {
                           $sts='Sudah Dibayar';
                       } else if ($_POST["status_order"]=='Di Proses') {
                           $sts='Di Proses';
                        }

  $query="UPDATE orders SET
      id_order='$id_order',
      status_order='$sts'
      WHERE
      id_order=$id_order
      ";
  mysqli_query($koneksi,$query);
  return mysqli_affected_rows($koneksi);
  }