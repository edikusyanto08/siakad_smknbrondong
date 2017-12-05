<?php
include "_header.php";

if(isset($_REQUEST['update'])){
  $id = $_REQUEST['id'];
  $th_ajaran = $_REQUEST['th_ajaran'];
  $tingkat = $_REQUEST['tingkat'];
  $nama_rombel = $_REQUEST['nama_rombel'];
  $kompetensi = $_REQUEST['kompetensi'];
  $wali_kelas = $_REQUEST['wali_kelas'];

  if (($_REQUEST['th_ajaran'] == 'none') || ($_REQUEST['tingkat'] == 'none') || ($_REQUEST['kompetensi'] == 'none') || ($_REQUEST['wali_kelas'] == 'none')){
  print "<script>alert('Pastikan Anda telah melengkapi semua data!');history.go(-1);</script>";
}else{
  $sql = "UPDATE tb_rombel SET th_ajaran='$th_ajaran', tingkat='$tingkat', nama_rombel='$nama_rombel', kompetensi='$kompetensi', wali_kelas='$wali_kelas' WHERE id='$id'";
  $query = mysqli_query($con, $sql);

  if (mysqli_affected_rows($con)>0){
    print "<script>alert('Data rombel berhasil diupdate!');history.go(-1);</script>";
  }else{
    print "<script>alert('Data rombel gagal diupdate. Silahkan ulangi kembali!');history.go(-1);</script>";
  }
}
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-pencil"></i>
      UPDATE DATA ROMBEL
      <small>SMK NEGERI 1 BRONDONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root;?>admin/rombel" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a></h3>

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
          $query = mysqli_query($con, "SELECT * FROM tb_rombel WHERE id='$id'");
          $getRombel = mysqli_fetch_array($query);
          ?>
          <form class="form form-horizontal" method="POST">
            <div class="form-group">
              <label class="control-label col-md-2">Tahun Ajaran</label>
              <div class="col-md-5">
                <select name="th_ajaran" class="form-control" autofocus="on">
                  <option value="none">- Pilih Tahun Ajaran -</option>
                  <option value="<?php print $getRombel['th_ajaran'] ?>" selected=""><?php print $getRombel['th_ajaran'];?></option>
                  <?php
                  $sql = "SELECT * FROM tb_tapel ORDER BY tapel ASC";
                  $query  = mysqli_query($con, $sql);
                  while ($data = mysqli_fetch_array($query)){
                    ?>
                    <option value="<?php print $data['tapel'];?>"><?php print $data['tapel'];?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2">Pilih Kelas</label>
                <div class="col-md-5">
                  <select name="tingkat" class="form-control" autofocus="on">
                    <option value="none">- Pilih Kelas -</option>
                    <option <?php if ($getRombel['tingkat']=="Kelas X"){ print "selected=''";}?> value="Kelas X">Kelas X</option>
                    <option <?php if ($getRombel['tingkat']=="Kelas XI"){ print "selected=''";}?> value="Kelas XI">Kelas XI</option>
                    <option <?php if ($getRombel['tingkat']=="Kelas XII"){ print "selected=''";}?> value="Kelas XII">Kelas XII</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2">Nama Rombel</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="nama_rombel" value="<?php print $getRombel['nama_rombel'];?>" placeholder="Nama Rombel" required="" autofocus="on">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2">Kompetensi Keahlian</label>
                <div class="col-md-5">
                  <select name="kompetensi" class="form-control" autofocus="on">
                    <option value="none">- Pilih Kompetensi Keahlian -</option>
                    <option <?php if ($getRombel['kompetensi']=="Teknik Kendaraan Ringan"){ print "selected=''";}?> value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                    <option <?php if ($getRombel['kompetensi']=="Teknik Komputer dan Jaringan"){ print "selected=''";}?> value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                    <option <?php if ($getRombel['kompetensi']=="Teknik Pemesinan"){ print "selected=''";}?> value="Teknik Pemesinan">Teknik Pemesinan</option>
                    <option <?php if ($getRombel['kompetensi']=="Multimedia"){ print "selected=''";}?> value="Multimedia">Multimedia</option>
                    <option <?php if ($getRombel['kompetensi']=="Tata Busana"){ print "selected=''";}?> value="Tata Busana">Tata Busana</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2">Pilih Wali Kelas</label>
                <div class="col-md-5">
                  <select name="wali_kelas" class="form-control" autofocus="on">
                    <option value="none">- Pilih Wali Kelas -</option>
                    <option value="<?php print $getRombel['wali_kelas']?>" selected=""><?php print $getRombel['wali_kelas'];?></option>
                    <?php
                    $sql = "SELECT * FROM tb_guru ORDER BY nama_guru ASC";
                    $query = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_array($query)){
                      ?>
                      <option value="<?php print $data['nama_guru'];?>"><?php print $data['nama_guru'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-5">
                    <button type="submit" name="update" class="btn btn-md btn-primary flat"><i class="fa fa-check"></i> UPDATE</button>
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