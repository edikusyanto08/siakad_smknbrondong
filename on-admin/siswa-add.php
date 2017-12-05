<?php
include "_header.php";

if (isset($_REQUEST['add'])){
  $nis_nisn = $_REQUEST['nis_nisn'];
  $nama_siswa = $_REQUEST['nama_siswa'];
  $jk = $_REQUEST['jk'];
  $tmp_lahir = $_REQUEST['tmp_lahir'];
  $tgl_lahir = $_REQUEST['tgl_lahir'];
  $agama = $_REQUEST['agama'];
  $alamat_siswa = $_REQUEST['alamat_siswa'];
  $telp_hp_siswa = $_REQUEST['telp_hp_siswa'];
  $nama_sek_asal = $_REQUEST['nama_sek_asal'];
  $alamat_sek_asal = $_REQUEST['alamat_sek_asal'];
  $th_ijazah = $_REQUEST['th_ijazah'];
  $no_ijazah = $_REQUEST['no_ijazah'];
  $diterima_kelas = $_REQUEST['diterima_kelas'];
  $tgl_diterima = $_REQUEST['tgl_diterima'];
  $nama_ayah = $_REQUEST['nama_ayah'];
  $nama_ibu = $_REQUEST['nama_ibu'];
  $alamat_ortu = $_REQUEST['alamat_ortu'];
  $telp_hp_ortu = $_REQUEST['telp_hp_ortu'];
  $pekerjaan_ortu = $_REQUEST['pekerjaan_ortu'];
  $nama_wali = $_REQUEST['nama_wali'];
  $alamat_wali = $_REQUEST['alamat_wali'];
  $telp_hp_wali = $_REQUEST['telp_hp_wali'];
  $pekerjaan_wali = $_REQUEST['pekerjaan_wali'];
  $photo = $_FILES['photo']['name'];
  $tmp = $_FILES['photo']['tmp_name'];

  $newphoto = date('dmYHis').$photo;

  $path = "../img/img-siswa/".$newphoto;

  if (move_uploaded_file($tmp, $path)){

    $sql = "INSERT INTO tb_siswa (nis_nisn, nama_siswa, jk, tmp_lahir, tgl_lahir, agama, alamat_siswa, telp_hp_siswa, nama_sek_asal, alamat_sek_asal, th_ijazah, no_ijazah, diterima_kelas, tgl_diterima, nama_ayah, nama_ibu, alamat_ortu, telp_hp_ortu, pekerjaan_ortu, nama_wali, alamat_wali, telp_hp_wali, pekerjaan_wali, photo) VALUES ('$nis_nisn', '$nama_siswa', '$jk', '$tmp_lahir', '$tgl_lahir', '$agama', '$alamat_siswa', '$telp_hp_siswa', '$nama_sek_asal', '$alamat_sek_asal', '$th_ijazah', '$no_ijazah', '$diterima_kelas', '$tgl_diterima', '$nama_ayah', '$nama_ibu', '$alamat_ortu', '$telp_hp_ortu', '$pekerjaan_ortu', '$nama_wali', '$alamat_wali', '$telp_hp_wali', '$pekerjaan_wali', '$newphoto')";
    $query = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con)> 0 ){
      print "<script>alert('BERHASIL menyimpan data siswa ke dalam database!');history.go(-1);</script>";
    }else{
      print "<script>alert('GAGAL menyimpan data siswa. Silahkan ulangi kembali!');history.go(-1);</script>";
    }
  }else{
    print "<script>alert('GAGAL! Maaf foto siswa gagal diupload. Silahkan ulangi kembali!');history.go(-1);</script>";
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="ion ion-android-person-add"></i> INPUT DATA SISWA
      <small>SMK NEGERI 1 BRONDONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              <a align="right" href="<?php print $root; ?>admin/student" class="btn btn-sm btn-danger flat"><i class="fa fa-chevron-circle-left"></i>&nbsp;&nbsp;&nbsp;Kembali</a> &nbsp; <a href="<?php print $root;?>admin/student/import-xls" class="btn btn-sm btn-success flat"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Impor Data (.xls)</a>
              
            </h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <br/><br/>
            <form method="POST" enctype="multipart/form-data" class="form-horizontal">
              <p class="bg-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>DATA PRIBADI SISWA</strong></p>
              <div class="form-group">
                <label class="col-sm-2 control-label">NIS/NISN</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="nis_nisn" type="text" id="nis_nisn" class="form-control" placeholder="NIS/NISN Siswa" autofocus="on" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Siswa</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="nama_siswa" type="text" id="nama_siswa" class="form-control" placeholder="Nama Siswa" required="required" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-6">
                  <select class="form-control" name="jk" id="jk">
                    <option value="LAKI-LAKI">LAKI-LAKI</option>
                    <option value="PEREMPUAN">PEREMPUAN</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>
                <div class="col-sm-3">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="tmp_lahir" class="form-control" id="tmp_lahir" type="text" placeholder="Tempat Lahir" required />
                </div>
                <div class="col-sm-3 date">
                  <input name="tgl_lahir" class="form-control" type="date" placeholder="Tanggal Lahir (bb/tt/tttt)" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-6">
                  <select class="form-control" name="agama" id="agama">
                    <option value="ISLAM">ISLAM</option>
                    <option value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
                    <option value="KATOLIK">KATOLIK</option>
                    <option value="HINDU">HINDU</option>
                    <option value="BUDDHA">BUDDHA</option>
                    <option value="KONG HU CU">KONG HU CU</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="alamat_siswa" type="text" id="alamat_siswa" class="form-control" placeholder="Alamat Siswa" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No. Telp/HP Siswa</label>
                <div class="col-sm-6">
                  <input size="12" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" name="telp_hp_siswa" type="text" id="telp_hp_siswa" class="form-control" placeholder="No. Telp/HP Siswa" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Foto Siswa</label>
                <div class="col-md-6">
                  <input type="file" name="photo" class="form-control">
                </div>
              </div>

              <p class="bg-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>DATA SEKOLAH ASAL</strong></p>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Sekolah Asal</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="nama_sek_asal" type="text" id="nama_sek_asal" class="form-control" placeholder="Nama Sekolah Asal" autofocus="on" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Sekolah Asal</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="alamat_sek_asal" type="text" id="alamat_sek_asal" class="form-control" placeholder="Alamat Sekolah Asal" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tahun Ijazah</label>
                <div class="col-sm-6">
                  <input onKeyPress="return goodchars(event,'0123456789',this)" size="4" maxlength="4" name="th_ijazah" type="text" id="th_ijazah" class="form-control" placeholder="Tahun Ijazah" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nomor Ijazah</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="no_ijazah" type="text" id="no_ijazah" class="form-control" placeholder="Nomor Ijazah" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Diterima di Kelas</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="diterima_kelas" type="text" id="diterima_kelas" class="form-control" placeholder="Diterima di Kelas" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Pada Tanggal</label>
                <div class="col-sm-6 date">
                  <input name="tgl_diterima" type="date" class="form-control" placeholder="Tanggal Diterima (bb/tt/tttt)" required />
                </div>
              </div>

              <p class="bg-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>DATA ORANG TUA/WALI SISWA</strong></p>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Ayah</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="nama_ayah" type="text" id="nama_ayah" class="form-control" placeholder="Nama Ayah" autofocus="on" required="" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Ibu</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="nama_ibu" type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Orang Tua</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="alamat_ortu" type="text" id="alamat_ortu" class="form-control" placeholder="Alamat Orang Tua" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No. Telp/HP</label>
                <div class="col-sm-6">
                  <input onKeyPress="return goodchars(event,'0123456789',this)" size="12" maxlength="12" name="telp_hp_ortu" type="text" id="telp_hp_ortu" class="form-control" placeholder="No. Telp/HP" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Pekerjaan Orang Tua</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="pekerjaan_ortu" type="text" id="pekerjaan_ortu" class="form-control" placeholder="Pekerjaan Orang Tua" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Wali Murid</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="nama_wali" type="text" id="nama_wali" class="form-control" placeholder="Nama Wali Murid" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Wali Murid</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="alamat_wali" type="text" id="alamat_wali" class="form-control" placeholder="Alamat Wali Murid" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No. Telp/HP Wali Murid</label>
                <div class="col-sm-6">
                  <input onKeyPress="return goodchars(event,'0123456789',this)" size="12" maxlength="12" name="telp_hp_wali" type="text" id="telp_hp_wali" class="form-control" placeholder="No. Telp/HP Wali Murid" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Pekerjaan Wali Murid</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" name="pekerjaan_wali" type="text" id="pekerjaan_wali" class="form-control" placeholder="Pekerjaan Wali Murid" required />
                </div>
              </div>

              <div class="form-group" style="margin-bottom: 20px;">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <input type="submit" name="add" value="SIMPAN" class="btn btn-md btn-primary flat" />
                </div></div>
              </form>

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
  <?php
  include "_footer.php";
  ?>