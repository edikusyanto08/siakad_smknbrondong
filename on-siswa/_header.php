<?php 
include "../config.php";
include "_privileges.php";

$username = $_SESSION['username'];
$sql = "SELECT * FROM tb_siswa WHERE nis_nisn='$username'";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIAKAD SMK NEGERI 1 BRONDONG</title>
  <link rel="icon" href="<?php print $root; ?>dist/img/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Sistem Informasi Akademik SMK Negeri 1 Brondong">
  <meta name="keywords" content="Siakad, simaka, smk, negeri, brondong, lamongan, web">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php print $root; ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php print $root; ?>dist/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php print $root; ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php print $root; ?>dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php print $root; ?>student" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SMK</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SMKN 1 </b>BRONDONG</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php print $root; ?>img/img-siswa/<?php print $data['photo']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $data['nama_siswa']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php print $root; ?>img/img-siswa/<?php print $data['photo']; ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['nama']; ?> 
                    <small><?php echo $_SESSION['username']; ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php print $root; ?>student/profil" class="btn btn-default btn-flat">Akun Saya</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php print $root; ?>logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php print $root; ?>img/img-siswa/<?php print $data['photo']; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Siswa</a>
          </div>
        </div>
        <br/>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php include "_menu.php"; ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <?php
    $timeout = 10; // Set timeout minutes
    $logout_redirect_url = "$root"; // Set logout URL

    $timeout = $timeout * 60; // Converts minutes to seconds
    if (isset($_SESSION['start_time'])) {
      $elapsed_time = time() - $_SESSION['start_time'];
      if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
      }
    }
    $_SESSION['start_time'] = time();
    ?>