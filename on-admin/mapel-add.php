<?php
include "_header.php";

if (isset($_REQUEST['add'])){
  $jenis_muatan = $_REQUEST['jenis_muatan'];
  $nama_mapel = $_REQUEST['nama_mapel']; 
  $kur = $_REQUEST['kur'];
  $k1 = $_REQUEST['k1'];
  $k2 = $_REQUEST['k2'];
  $k3 = $_REQUEST['k3'];

  if (($_REQUEST['jenis_muatan'] == 'none') || ($_REQUEST['k1'] == 'k1_none') || ($_REQUEST['k2'] == 'k2_none') || ($_REQUEST['k3'] == 'k3_none')){
    print "<script>alert('Pastikan Anda telah melengkapi semua form!');history.go(-1);</script>";
  }else{
    $sql = "INSERT INTO tb_mapel (nama_mapel, jenis_muatan, kur, k1, k2, k3) VALUES ('$nama_mapel', '$jenis_muatan', '$kur', '$k1', '$k2', '$k3')";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data mata pelajaran BERHASIL ditambahkan!');history.go(-1);</script>";
    }else{
      print "<script>alert('Data mata pelajaran GAGAL ditambahkan. Silahkan ulangi kembali!');history.go(-1);</script>";
    }//if affected
  }//if k1 
}// if isset
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-plus"></i>
      TAMBAH DATA MATA PELAJARAN
      <small>SMK NEGERI 1 BRONDONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root; ?>admin/mapel" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <br/>
          <form class="form form-horizontal" method="POST">
            <div class="form-group">
              <label class="col-md-2 control-label">Jenis Muatan</label>
              <div class="col-md-5">
                <select class="form-control" name="jenis_muatan">
                  <option value="none">- Pilih Jenis Muatan -</option>
                  <option value="Kelompok A - Muatan Nasional">Kelompok A - Muatan Nasional</option>
                  <option value="Kelompok B - Muatan Kewilayahan  ">Kelompok B - Muatan Kewilayahan</option>
                  <option value="Kelompok C - Muatan Peminatan Kejuruan ">Kelompok C - Muatan Peminatan Kejuruan</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Nama Mata Pelajaran</label>
              <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Nama Mata Pelajaran" name="nama_mapel" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Kurikulum</label>
              <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Kurikulum" name="kur" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Kelas X</label>
              <div class="col-md-5">
                <select class="form-control" name="k1">
                  <option value="k1_none">- Pilih Status -</option>
                  <option value="1">AKTIF</option>
                  <option value="0">TIDAK AKTIF</option>
                </select>
              </div>              
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Kelas XI</label>
              <div class="col-md-5">
                <select class="form-control" name="k2">
                  <option value="k2_none">- Pilih Status -</option>
                  <option value="1">AKTIF</option>
                  <option value="0">TIDAK AKTIF</option>
                </select>
              </div>              
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Kelas XII</label>
              <div class="col-md-5">
                <select class="form-control" name="k3">
                  <option value="k3_none">- Pilih Status -</option>
                  <option value="1">AKTIF</option>
                  <option value="0">TIDAK AKTIF</option>
                </select>
              </div>              
            </div>

            <div class="form-group">
              <div class="col-md-2"></div>
              <div class="col-md-5"><button type="submit" name="add" class="btn btn-primary flat"><i class="fa fa-check"></i> SIMPAN</button></div>
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