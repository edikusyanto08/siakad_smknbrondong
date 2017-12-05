<?php
include "_header.php";

if (isset($_REQUEST['add'])){
  $tingkat = $_REQUEST['tingkat'];
  $nama_rombel = $_REQUEST['nama_rombel'];
  $kompetensi = $_REQUEST['kompetensi'];
  $wali_kelas = $_REQUEST['wali_kelas'];
  $th_ajaran = $_REQUEST['th_ajaran'];

  if (($_REQUEST['tingkat'] == 'tingkat_none') || ($_REQUEST['kompetensi'] == 'kompetensi_none') || ($_REQUEST['wali_kelas'] == 'walikelas_none') || ($_REQUEST['th_ajaran'] == 'ajaran_none')){
    print "<script>alert('Pastikan Anda telah memilih Tingkat, Kompetensi Keahlian dan Wali Kelas!');history.go(-1);</script>";
  }else{
    $sql = "INSERT INTO tb_rombel (tingkat, nama_rombel, kompetensi, wali_kelas) VALUES ('$tingkat', '$nama_rombel', '$kompetensi', '$wali_kelas')";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data rombel BERHASIL ditambahkan!');history.go(-1);</script>";
    }else{
      print "<script>alert('Data rombel GAGAL ditambahkan. Silahkan ulangi kembali!');history.go(-1);</script>";
    }
  }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-plus"></i>
      TAMBAH DATA ROMBEL
      <small>SMK NEGERI 1 BRONDONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root; ?>admin/rombel" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a></h3>

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
              <label class="control-label col-md-2">Tahun Ajaran</label>
              <div class="col-md-5">
                <select name="th_ajaran" class="form-control" autofocus="on">
                  <option value="ajaran_none">- Pilih Tahun Ajaran -</option>
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
                  <option value="tingkat_none">- Pilih Kelas -</option>
                  <option value="Kelas X">Kelas X</option>
                  <option value="Kelas XI">Kelas XI</option>
                  <option value="Kelas XII">Kelas XII</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Nama Rombel</label>
              <div class="col-md-5">
                <input type="text" class="form-control" name="nama_rombel" placeholder="Nama Rombel" required="" autofocus="on">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Kompetensi Keahlian</label>
              <div class="col-md-5">
                <select name="kompetensi" class="form-control" autofocus="on">
                  <option value="kompetensi_none">- Pilih Kompetensi Keahlian -</option>
                  <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                  <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                  <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                  <option value="Multimedia">Multimedia</option>
                  <option value="Tata Busana">Tata Busana</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Pilih Wali Kelas</label>
              <div class="col-md-5">
                <select name="wali_kelas" class="form-control" autofocus="on">
                  <option value="walikelas_none">- Pilih Wali Kelas -</option>
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
                  <button type="submit" name="add" class="btn btn-md btn-primary flat"><i class="fa fa-check"></i> TAMBAH</button>
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