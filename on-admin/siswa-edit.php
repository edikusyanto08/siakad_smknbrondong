<?php
include "_header.php";

if (isset($_REQUEST['update'])){
  $nis_nisn         = $_REQUEST['nis_nisn'];
  $nama_siswa       = $_REQUEST['nama_siswa'];
  $jk               = $_REQUEST['jk'];
  $tmp_lahir        = $_REQUEST['tmp_lahir'];
  $tgl_lahir        = $_REQUEST['tgl_lahir'];
  $agama            = $_REQUEST['agama'];
  $alamat_siswa     = $_REQUEST['alamat_siswa'];
  $telp_hp_siswa    = $_REQUEST['telp_hp_siswa'];
  $nama_sek_asal    = $_REQUEST['nama_sek_asal'];
  $alamat_sek_asal  = $_REQUEST['alamat_sek_asal'];
  $th_ijazah        = $_REQUEST['th_ijazah'];
  $no_ijazah        = $_REQUEST['no_ijazah'];
  $diterima_kelas   = $_REQUEST['diterima_kelas'];
  $tgl_diterima     = $_REQUEST['tgl_diterima'];
  $nama_ayah        = $_REQUEST['nama_ayah'];
  $nama_ibu         = $_REQUEST['nama_ibu'];
  $alamat_ortu      = $_REQUEST['alamat_ortu'];
  $telp_hp_ortu     = $_REQUEST['telp_hp_ortu'];
  $pekerjaan_ortu   = $_REQUEST['pekerjaan_ortu'];
  $nama_wali        = $_REQUEST['nama_wali'];
  $alamat_wali      = $_REQUEST['alamat_wali'];
  $telp_hp_wali     = $_REQUEST['telp_hp_wali'];
  $pekerjaan_wali    = $_REQUEST['pekerjaan_wali'];

  if (isset($_REQUEST['ubah_foto'])){
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];

    $new_image = date('dmYHis').$photo;
    $path = "../img/img-siswa/".$new_image;

    if (move_uploaded_file($tmp, $path)){
      $sql = "SELECT * FROM tb_siswa WHERE nis_nisn='$nis_nisn'";
      $query = mysqli_query($con, $sql);
      // $result = mysqli_fetch_array($query);

      if (is_file("../img/img-siswa/".$result['photo']))
        unlink("../img/img-siswa/".$result['photo']);

      $sql = "UPDATE tb_siswa SET nama_siswa='$nama_siswa', jk='$jk', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', agama='$agama', alamat_siswa='$alamat_siswa', telp_hp_siswa='$telp_hp_siswa', nama_sek_asal='$nama_sek_asal', alamat_sek_asal='$alamat_sek_asal', th_ijazah='$th_ijazah', no_ijazah='$no_ijazah', diterima_kelas='$diterima_kelas', tgl_diterima='$tgl_diterima', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', alamat_ortu='$alamat_ortu', telp_hp_ortu='$telp_hp_ortu', pekerjaan_ortu='$pekerjaan_ortu', nama_wali='$nama_wali', alamat_wali='$alamat_wali', telp_hp_wali='$telp_hp_wali', pekerjaan_wali='$pekerjaan_wali', photo='$new_image' WHERE nis_nisn='$nis_nisn'";
      $query = mysqli_query($con, $sql);
      
      if (mysqli_affected_rows($con)>0){
        print "<script>alert('Data siswa BERHASIL diupdate!');history.go(-1);</script>";
        // header('Location:$rootadmin/student');
      }else{
        print "<script>alert('GAGAL! Data siswa gagal diupdate. Silahkan ulangi kembali!');</script>";
      }
    }else{//if move upload file
      print "<script>alert('GAGAL! Terjadi kesalahan saat mengupload foto. Silahkan ulangi kembali!');history.go(-1);</script>";
   } 
  }else{//if isset get ubah foto
    $sql = "UPDATE tb_siswa SET nama_siswa='$nama_siswa', jk='$jk', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', agama='$agama', alamat_siswa='$alamat_siswa', telp_hp_siswa='$telp_hp_siswa', nama_sek_asal='$nama_sek_asal', alamat_sek_asal='$alamat_sek_asal', th_ijazah='$th_ijazah', no_ijazah='$no_ijazah', diterima_kelas='$diterima_kelas', tgl_diterima='$tgl_diterima', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', alamat_ortu='$alamat_ortu', telp_hp_ortu='$telp_hp_ortu', pekerjaan_ortu='$pekerjaan_ortu', nama_wali='$nama_wali', alamat_wali='$alamat_wali', telp_hp_wali='$telp_hp_wali', pekerjaan_wali='$pekerjaan_wali' WHERE nis_nisn='$nis_nisn'";
    $query = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con)>0){
      print "<script>alert('BERHASIL!\nData siswa berhasil diupdate.');history.go(-1);";
    }else{
      print "<script>alert('GAGAL\nData siswa gagal diupdate. Silahkan ulangi kembali!');history.go(-1);</script>";
    }
  }
}//if isset update
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-pencil"></i>
      EDIT DATA SISWA
      <small>SMK NEGERI 1 BRONDONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root; ?>/admin/student" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> BACK</a></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <?php
        $id = $_REQUEST['nis_nisn'];
        $sql = "SELECT * FROM tb_siswa WHERE nis_nisn='$id'";
        $query = mysqli_query($con, $sql);
        while ($result = mysqli_fetch_array($query)){
          ?>
          <form class="form form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 control-label">NIS/NISN</label>
              <div class="col-sm-6">
                <input name="nis_nisn" type="text" class="form-control" value="<?php print $result['nis_nisn'];?>" required="required" readonly="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Siswa</label>
              <div class="col-sm-6">
                <input onkeyup="this.value=this.value.toUpperCase()" name="nama_siswa" type="text" class="form-control" placeholder="Nama Siswa" value="<?php print $result['nama_siswa'];?>" required="required" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-6">
                <select class="form-control" name="jk" id="jk">
                  <option value="select_jk">- Pilih Jenis Kelamin -</option>
                  <option <?php if ($result['jk']=="LAKI-LAKI"){ print "selected=''";}?> value="LAKI-LAKI">LAKI-LAKI</option>
                  <option <?php if ($result['jk']=="PEREMPUAN"){ print "selected=''";}?> value="PEREMPUAN">PEREMPUAN</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>
              <div class="col-sm-3">
                <input onkeyup="this.value=this.value.toUpperCase()" name="tmp_lahir" class="form-control" id="tmp_lahir" type="text" value="<?php print $result['tmp_lahir'];?>" placeholder="Tempat Lahir" required />
              </div>
              <div class="col-sm-3 date">
                <input value="<?php print $result['tgl_lahir'];?>" name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir (tt/bb/tttt)" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Agama</label>
              <div class="col-sm-6">
                <select class="form-control" name="agama" id="agama">
                  <option value="select_agama">- Pilih Agama -</option>
                  <option <?php if ($result['agama']=="ISLAM"){ print "selected=''";}?> value="ISLAM">ISLAM</option>
                  <option <?php if ($result['agama']=="KRISTEN PROTESTAN"){ print "selected=''";}?> value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
                  <option <?php if ($result['agama']=="KATOLIK"){ print "selected=''";}?> value="KATOLIK">KATOLIK</option>
                  <option <?php if ($result['agama']=="HINDU"){ print "selected=''";}?> value="HINDU">HINDU</option>
                  <option <?php if ($result['agama']=="BUDDHA"){ print "selected=''";}?> value="BUDDHA">BUDDHA</option>
                  <option <?php if ($result['agama']=="KONG HU CU"){ print "selected=''";}?> value="KONG HU CU">KONG HU CU</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-6">
                <input onkeyup="this.value=this.value.toUpperCase()" name="alamat_siswa" type="text" id="alamat_siswa" class="form-control" value="<?php print $result['alamat_siswa'] ?>" placeholder="Alamat Siswa" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No. Telp/HP Siswa</label>
              <div class="col-sm-6">
                <input maxlength="12" size="12" onKeyPress="return goodchars(event,'0123456789',this)" name="telp_hp_siswa" type="text" class="form-control" placeholder="No. Telp/HP Siswa (Jika tidak ada nomor telp/HP gunakan tanda (-)" value="<?php print $result['telp_hp_siswa'];?>" required/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Foto Siswa</label>
              <div class="col-md-6">
                <img src="<?php print $root;?>/img/img-siswa/<?php print $result['photo'];?>"  width="150px;"><br/><br/>
                <input type="checkbox" name="ubah_foto" value="true"> centang jika ingin mengubah foto.<br/>
                <input type="file" name="photo" class="form-control">
              </div>
            </div>

            <p class="bg-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>DATA SEKOLAH ASAL</strong></p>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Sekolah Asal</label>
              <div class="col-sm-6">
                <input onkeyup="this.value=this.value.toUpperCase()" name="nama_sek_asal" type="text" class="form-control" value="<?php print $result['nama_sek_asal'];?>" placeholder="Nama Sekolah Asal"  />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat Sekolah Asal</label>
              <div class="col-sm-6">
                <input onkeyup="this.value=this.value.toUpperCase()" name="alamat_sek_asal" type="text" id="alamat_sek_asal" value="<?php print $result['alamat_sek_asal'];?>" class="form-control" placeholder="Alamat Sekolah Asal" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tahun Ijazah</label>
              <div class="col-sm-6">
                <input size="4" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" name="th_ijazah" type="text" id="th_ijazah" value="<?php print $result['th_ijazah'];?>" class="form-control" placeholder="Tahun Ijazah" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor Ijazah</label>
              <div class="col-sm-6">
                <input onkeyup="this.value=this.value.toUpperCase()" name="no_ijazah" type="text" id="no_ijazah" value="<?php print $result['no_ijazah'];?>" class="form-control" placeholder="Nomor Ijazah" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Diterima di Kelas</label>
              <div class="col-sm-6">
                <input onkeyup="this.value=this.value.toUpperCase()" name="diterima_kelas" type="text" id="diterima_kelas" value="<?php print $result['diterima_kelas'];?>" class="form-control" placeholder="Diterima di Kelas" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Pada Tanggal</label>
              <div class="col-sm-6 date">
                <input value="<?php print $result['tgl_diterima'];?>" name="tgl_diterima" type="date" class="form-control" placeholder="Tanggal Diterima (tt/bb/tttt)" required />
              </div>
            </div>

            <p class="bg-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>DATA ORANG TUA/WALI SISWA</strong></p>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Ayah</label>
              <div class="col-sm-6">
                <input value="<?php print $result['nama_ayah'];?>" onkeyup="this.value=this.value.toUpperCase()" name="nama_ayah" type="text" id="nama_ayah" class="form-control" placeholder="Nama Ayah"  required="" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Ibu</label>
              <div class="col-sm-6">
                <input value="<?php print $result['nama_ibu'];?>" onkeyup="this.value=this.value.toUpperCase()" name="nama_ibu" type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat Orang Tua</label>
              <div class="col-sm-6">
                <input value="<?php print $result['alamat_ortu'];?>" onkeyup="this.value=this.value.toUpperCase()" name="alamat_ortu" type="text" id="alamat_ortu" class="form-control" placeholder="Alamat Orang Tua" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No. Telp/HP</label>
              <div class="col-sm-6">
                <input value="<?php print $result['telp_hp_ortu'];?>" onKeyPress="return goodchars(event,'0123456789',this)" name="telp_hp_ortu" type="text" id="telp_hp_ortu" class="form-control" placeholder="No. Telp/HP" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Pekerjaan Orang Tua</label>
              <div class="col-sm-6">
                <input value="<?php print $result['pekerjaan_ortu'];?>" onkeyup="this.value=this.value.toUpperCase()" name="pekerjaan_ortu" type="text" id="pekerjaan_ortu" class="form-control" placeholder="Pekerjaan Orang Tua" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Wali Murid</label>
              <div class="col-sm-6">
                <input value="<?php print $result['nama_wali'];?>" onkeyup="this.value=this.value.toUpperCase()" name="nama_wali" type="text" id="nama_wali" class="form-control" placeholder="Nama Wali Murid" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat Wali Murid</label>
              <div class="col-sm-6">
                <input value="<?php print $result['alamat_wali'];?>" onkeyup="this.value=this.value.toUpperCase()" name="alamat_wali" type="text" id="alamat_wali" class="form-control" placeholder="Alamat Wali Murid" required />
              </div>
            </div>  

            <div class="form-group">
              <label class="col-sm-2 control-label">No. Telp/HP Wali Murid</label>
              <div class="col-sm-6">
                <input value="<?php print $result['telp_hp_wali'];?>" onKeyPress="return goodchars(event,'0123456789',this)" name="telp_hp_wali" type="text" id="telp_hp_wali" class="form-control" placeholder="No. Telp/HP Wali Murid" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Pekerjaan Wali Murid</label>
              <div class="col-sm-6">
                <input value="<?php print $result['pekerjaan_wali'];?>" onkeyup="this.value=this.value.toUpperCase()" name="pekerjaan_wali" type="text" id="pekerjaan_wali" class="form-control" placeholder="Pekerjaan Wali Murid" required />
              </div>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
              <label class="col-sm-2 control-label"></label>
              <div class="col-sm-6">
                <input type="submit" name="update" value="SIMPAN" class="btn btn-md btn-primary flat" />
              </div></div>

              <?php } ?>
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