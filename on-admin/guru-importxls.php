<?php 
include "cek-admin.php";
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Rapor SMK Negeri 1 Brondong</title>
  <link rel="icon" href="../dist/img/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Sistem Informasi Akademik SMK Negeri 1 Brondong">
  <meta name="keywords" content="Siakad, simaka, smk, negeri, brondong, lamongan, web">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
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
                <img src="<?php echo $_SESSION['foto']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nama']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['nama']; ?> 
                    <small><?php echo $_SESSION['username']; ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Akun Saya</a>
                  </div>
                  <div class="pull-right">
                    <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
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
            <img src="<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Administrator</a>
          </div>
        </div>
        <br/>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php include "menu.php"; ?>
      </section>
      <!-- /.sidebar -->
    </aside>

    <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index.php"; // Set logout URL

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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><i class="ion ion-trophy"></i> Impor Data Guru</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <?php
            include "../koneksi.php";

//memanggil file excel_reader
            require "excel_reader2.php";

//jika tombol import ditekan
            if(isset($_POST['submit'])){

              $target = basename($_FILES['filepegawaiall']['name']) ;
              move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);

// tambahkan baris berikut untuk mencegah error is not readable
              chmod($_FILES['filepegawaiall']['name'],0777);

              $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);

//    menghitung jumlah baris file xls
              $baris = $data->rowcount($sheet_index=0);

//    jika kosongkan data dicentang jalankan kode berikut
              $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
              if($drop == 1){
//             kosongkan tabel pegawai
               $truncate ="TRUNCATE TABLE pegawai";
               mysql_query($truncate);
             };

//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
             for ($i=2; $i<=$baris; $i++)
             {
//       membaca data (kolom ke-1 sd terakhir)
              $nama           = $data->val($i, 1);
              $tempat_lahir   = $data->val($i, 2);
              $tanggal_lahir  = $data->val($i, 3);

//      setelah data dibaca, masukkan ke tabel pegawai sql
              $query = "INSERT into pegawai (nama,tempat_lahir,tanggal_lahir)values('$nama','$tempat_lahir','$tanggal_lahir')";
              $hasil = mysql_query($query);
            }

            if(!$hasil){
//          jika import gagal
              die(mysql_error());
            }else{
//          jika impor berhasil
              echo "Data berhasil diimpor.";
            }

//    hapus file xls yang udah dibaca
            unlink($_FILES['filepegawaiall']['name']);
          }

          ?>

          <form name="myForm" id="myForm" onSubmit="return validateForm()" action="import.php" method="post" enctype="multipart/form-data">
            <input type="file" id="filepegawaiall" name="filepegawaiall" />
            <input type="submit" name="submit" value="Import" /><br/>
            <label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
          </form>

          <script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
function validateForm()
{
  function hasExtension(inputID, exts) {
    var fileName = document.getElementById(inputID).value;
    return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
  }

  if(!hasExtension('filepegawaiall', ['.xls'])){
    alert("Hanya file XLS (Excel 2003) yang diijinkan.");
    return false;
  }
}
</script>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Sistem Informasi Akademik | SMK Negeri 1 Brondong</b>
  </div>
  <strong>Copyright &copy; 2017 <a href="http://smkn1brondong.sch.id" target="_blank">SMK Negeri 1 Brondong</a></strong>
</footer>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function () {
  $("#example1").DataTable();
  $("#example2").DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false

  });
});
</script>
</body>
</html>