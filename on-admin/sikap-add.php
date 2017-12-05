<?php
include "_header.php";

if (isset($_REQUEST['add'])){
  $butir_sikap = $_REQUEST['butir_sikap'];
  $th_ajaran = $_REQUEST['th_ajaran'];
  if ($th_ajaran == "none"){
    print "<script>alert('Silahkan pilih tahun pelajaran terlebih dahulu!');history.go(-1);</script>";
  }else{
    $setSikap = mysqli_query($con, "INSERT INTO tb_sikap SET butir_sikap='$butir_sikap', th_ajaran='$th_ajaran'");
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('BERHASIL menambahkan data sikap ke database!');history.go(-1);</script>";
    }else{
      print "<script>alert('GAGAL menambahkan data sikap ke database. Silahkan ulangi kembali!');history.go(-1);</script>";
    }
  }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-child"></i>
      TAMBAH DATA SIKAP
      <small>SMK NEGERI 1 BRONDONG</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root; ?>admin/sikap" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i>  KEMBALI</a></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="form form-horizontal" method="post">
            <div class="form-group">
              <label class="col-md-2 control-label">Nama Sikap</label>
              <div class="col-md-5">
                <input type="text" class="form-control" name="butir_sikap" placeholder="Nama Sikap" required autofocus></input>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Tahun Pelajaran</label>
              <div class="col-md-5">
                <select class="form-control" name="th_ajaran">
                  <option value="none">- Pilih Tahun Pelajaran -</option>
                  <?php
                  $getTapel = mysqli_query($con, "SELECT * FROM tb_tapel ORDER BY tapel ASC");
                  while ($result = mysqli_fetch_array($getTapel)) {
                    ?>
                    <option value="<?php print $result['tapel'];?>"><?php print $result['tapel'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label"></label>
              <div class="col-md-5">
                <button class="btn btn-md btn-primary flat" name="add">SIMPAN</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  include "_footer.php";
  ?>
