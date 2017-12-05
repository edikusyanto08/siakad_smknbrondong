<?php
include ("config.php");
date_default_timezone_set('Asia/Jakarta');

$username = mysqli_escape_string($con, $_POST['username']);
$password = mysqli_escape_string($con, md5($_POST['password']));

$sql = mysqli_query($con, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
if (mysqli_num_rows($sql)==0) {
	header('location:index.php?error');
}else{
  $row = mysqli_fetch_array ($sql);

  if (mysqli_num_rows($sql) == 1) {
    $_SESSION['password'] = $row['password'];
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['foto'] = $row['foto'];
    $_SESSION['level'] = $row['level'];
    if ($row['level'] == "Admin"){
      header('location:admin/');
    }
    elseif ($row['level'] == "Siswa") {
      header('location:student/');
    }
    elseif ($row['level'] == "Guru") {
      header('location:on-guru/index.php');
    }
    elseif ($row['level'] == "Wali Kelas") {
      header('location:on-wali/');
    }
    elseif ($row['level'] == "Kurikulum") {
      header('location:on-kurikulum/');
    }
 }
}
?>