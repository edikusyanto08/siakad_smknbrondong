<?php
include "_header.php";

if (isset($_REQUEST['update'])){
  $id = $_REQUEST['id'];
  $jenis_muatan = $_REQUEST['jenis_muatan'];
  $nama_mapel = $_REQUEST['nama_mapel'];
  $kur = $_REQUEST['kur'];
  $k1 = $_REQUEST['k1'];
  $k2 = $_REQUEST['k2'];
  $k3 = $_REQUEST['k3'];

  if (($_REQUEST['k1'] == 'k1_none') || ($_REQUEST['k2'] == 'k2_none') || ($_REQUEST['k3'] == 'k3_none')){
    print "<script>alert('Tentukan status (AKTIF/TIDAK AKTIF) untuk masing-masing kelas terlebih dahulu!');history.go(-1);</script>";
  }else{
    $sql = "UPDATE tb_mapel SET jenis_muatan='$jenis_muatan', nama_mapel='$nama_mapel', kur='$kur', k1='$k1', k2='$k2', k3='$k3' WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data mata pelajaran BERHASIL diupdate!');history.go(-1);</script>";
    }else{        
      print "<script>alert('Data mata pelajaran GAGAL diupdate!');history.go(-1);</script>";
    }
    }// k123 none
  }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-pencil"></i>
        UPDATE DATA MATA PELAJARAN
        <small>SMK NEGERI 1 BRONDONG</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><a href="<?php print $root; ?>admin/mapel"><button  class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</button></a></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <?php
            $id = $_REQUEST['id'];
            $sql = "SELECT * FROM tb_mapel WHERE id='$id'";
            $query = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <br/>
            <form class="form form-horizontal" method="POST">
              <div class="form-group">
                <label class="col-md-2 control-label">Jenis Muatan</label>
                <div class="col-md-5">
                  <select name="jenis_muatan" class="form-control">
                    <option>- Pilih Jenis Muatan -</option>
                    <option <?php if ($result['jenis_muatan']=="Kelompok A - Muatan Nasional"){ print "selected=''";}?>>Kelompok A - Muatan Nasional</option>
                    <option <?php if ($result['jenis_muatan']=="Kelompok B - Muatan Kewilayahan"){ print "selected=''";}?>>Kelompok B - Muatan Kewilayahan</option>
                    <option <?php if ($result['jenis_muatan']=="Kelompok C - Muatan Peminatan Kejuruan"){ print "selected=''";}?>>Kelompok C - Muatan Peminatan Kejuruan</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Nama Mata Pelajaran</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="nama_mapel" value="<?php print $result['nama_mapel']; ?>" autofocus="on">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Kurikulum</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="kur" value="<?php print $result['kur']; ?>" autofocus="on">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Kelas X</label>
                <div class="col-md-5">
                  <select class="form-control" name="k1">
                    <option value="k1_none">- Pilih Status -</option>
                    <option <?php if ($result['k1']=="1"){ print "selected=''";}?> value="1">AKTIF</option>
                    <option <?php if ($result['k1']=="0"){ print "selected=''";}?> value="0">TIDAK AKTIF</option>
                  </select>
                </div>              
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Kelas XI</label>
                <div class="col-md-5">
                  <select class="form-control" name="k2">
                    <option value="k2_none">- Pilih Status -</option>
                    <option <?php if ($result['k2']=="1"){ print "selected=''";}?> value="1">AKTIF</option>
                    <option <?php if ($result['k2']=="0"){ print "selected=''";}?> value="0">TIDAK AKTIF</option>
                  </select>
                </div>              
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Kelas XII</label>
                <div class="col-md-5">
                  <select class="form-control" name="k3">
                    <option value="k3_none">- Pilih Status -</option>
                    <option <?php if ($result['k3']=="1"){ print "selected=''";}?> value="1">AKTIF</option>
                    <option <?php if ($result['k3']=="0"){ print "selected=''";}?> value="0">TIDAK AKTIF</option>
                  </select>
                </div>              
              </div>

              <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-5"><button type="submit" name="update" class="btn btn-primary flat"><i class="fa fa-check"></i> UPDATE</button></div>
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