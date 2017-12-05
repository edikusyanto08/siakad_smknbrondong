<?php
include "_header.php";

if (isset($_REQUEST['update'])){
  $id = $_REQUEST['nip'];
  $nuptk = $_REQUEST['nuptk'];
  $nama_guru = $_REQUEST['nama_guru'];
  $tmp_lahir = $_REQUEST['tmp_lahir'];
  $tgl_lahir = $_REQUEST['tgl_lahir'];
  $jk = $_REQUEST['jk'];
  $agama = $_REQUEST['agama'];
  $alamat = $_REQUEST['alamat'];
  $telp_hp = $_REQUEST['telp_hp'];
  $status = $_REQUEST['status'];
  $jenis_ptk = $_REQUEST['jenis_ptk'];

  if (isset($_REQUEST['ubah_foto'])){
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if (($_REQUEST['jk'] == 'none') || ($_REQUEST['status'] == 'none') || ($_REQUEST['agama'] == 'none') || ($_REQUEST['jenis_ptk'] == 'none')){
      print "<script>alert('Pastikan Anda telah melengkapi seluruh form!');history.go(-1);</script>";
    }else{
      $new_image = date('dmYHis').$foto;
      $path = "../img/img-guru/".$new_image;

      if (move_uploaded_file($tmp, $path)){
        $sql = "SELECT * FROM tb_guru WHERE nip='$id'";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_array($query);

        if (is_file("../img/img-guru/".$result['foto']))
          unlink("../img/img-guru/".$result['foto']);

        $sql = "UPDATE tb_guru SET nuptk='$nuptk', nama_guru='$nama_guru', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', jk='$jk', agama='$agama', alamat='$alamat', telp_hp='$telp_hp', status='$status', jenis_ptk='$jenis_ptk', foto='$new_image' WHERE nip='$id'";
        $query = mysqli_query($con, $sql);

        if (mysqli_affected_rows($con)>0){
          print "<script>alert('BERHASIL! Data guru berhasil diupdate.');history.go(-1);";
        }else{
          print "<script>alert('GAGAL! Data guru gagal diupdate. Silahkan ulangi kembali!');history.go(-1);</script>";
        }
    }else{//if move upload file
      print "<script>alert('GAGAL! Terjadi kesalahan saat mengupload foto. Silahkan ulangi kembali!');history.go(-1);</script>";
    } 
  }
  }else{//if isset get ubah foto
    if (($_REQUEST['jk'] == 'jk_none') || ($_REQUEST['status'] == 'status_none')){
      print "<script>alert('Silahkan pilih jenis kelamin dan status terlebih dahulu!');history.go(-1);</script>";
    }else{
      $sql = "UPDATE tb_guru SET nuptk='$nuptk', nama_guru='$nama_guru', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', jk='$jk', agama='$agama', alamat='$alamat', telp_hp='$telp_hp', status='$status', jenis_ptk='$jenis_ptk' WHERE nip='$id'";
      $query = mysqli_query($con, $sql);

      if (mysqli_affected_rows($con)>0){
        print "<script>alert('BERHASIL! Data guru berhasil diupdate.');history.go(-1);";
      }else{
        print "<script>alert('GAGAL! Data guru gagal diupdate. Silahkan ulangi kembali!');history.go(-1);</script>";
      }
    }
  }
}//if isset update
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="ion ion-edit"></i>  Edit Data Guru</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <br/>

            <form method="POST" class="form-horizontal" enctype="multipart/form-data">
              <?php
              $nip = $_GET['nip'];
              $query = "SELECT * FROM tb_guru WHERE nip='".$nip."'";
              $sql = mysqli_query($con, $query);
              $data = mysqli_fetch_array($sql);
              ?>
              <div class="form-group">
                <label class="col-sm-2 control-label">NIP</label>
                <div class="col-sm-6">
                  <input value="<?php echo $data['nip']; ?>" name="nip" type="text" id="nip" class="form-control" placeholder="NIP Guru" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">NUPTK</label>
                <div class="col-sm-6">
                  <input value="<?php echo $data['nuptk']; ?>" name="nuptk" type="text" class="form-control" placeholder="NUPTK" autofocus="on">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Guru</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $data['nama_guru']; ?>" name="nama_guru" type="text" id="nama_guru" class="form-control" placeholder="Nama Guru" required/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>
                <div class="col-sm-3">
                  <input onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $data['tmp_lahir']; ?>" name="tmp_lahir" type="text" class="form-control" placeholder="Tempat Lahir" required/>
                </div>
                <div class="col-sm-3">
                  <input value="<?php echo $data['tgl_lahir']; ?>" name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" required/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-6">
                  <select class="form-control" name="jk" id="jk">
                    <option value="none">- Pilih Jenis Kelamin-</option>
                    <option <?php if ($data['jk']=="LAKI-LAKI"){ print "selected=''";}?> value="LAKI-LAKI">LAKI-LAKI</option>
                    <option <?php if ($data['jk']=="PEREMPUAN"){ print "selected=''";}?> value="PEREMPUAN">PEREMPUAN</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-6">
                  <select class="form-control" name="agama">
                    <option value="none">- Pilih Agama -</option>
                    <option <?php if ($data['agama']=="ISLAM"){ print "selected=''";}?> value="ISLAM">ISLAM</option>
                    <option <?php if ($data['agama']=="KRISTEN PROTESTAN"){ print "selected=''";}?> value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
                    <option <?php if ($data['agama']=="KATOLIK"){ print "selected=''";}?> value="KATOLIK">KATOLIK</option>
                    <option <?php if ($data['agama']=="HINDU"){ print "selected=''";}?> value="HINDU">HINDU</option>
                    <option <?php if ($data['agama']=="BUDDHA"){ print "selected=''";}?> value="BUDDHA">BUDDHA</option>
                    <option <?php if ($data['agama']=="KONG HU CU"){ print "selected=''";}?> value="KONG HU CU">KONG HU CU</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Guru</label>
                <div class="col-sm-6">
                  <input onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $data['alamat']; ?>" name="alamat" type="text" id="alamat" class="form-control" placeholder="Alamat Guru" required/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No. Telp/HP</label>
                <div class="col-sm-6">
                  <input maxlength="12" size="12" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['telp_hp']; ?>" name="telp_hp" type="text" id="telp_hp" class="form-control" placeholder="No. Telp/HP Guru" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-6">
                  <select class="form-control" name="status" id="status">
                    <option value="none">- Pilih Status -</option>
                    <option <?php if ($data['status']=="PNS"){ print "selected=''";}?> value="PNS">PNS</option>
                    <option <?php if ($data['status']=="PNS Diperbantukan"){ print "selected=''";}?> value="PNS Diperbantukan">PNS Diperbantukan</option>
                    <option <?php if ($data['status']=="PNS DEPAG"){ print "selected=''";}?> value="PNS DEPAG">PNS DEPAG</option>
                    <option <?php if ($data['status']=="GTY/PTY"){ print "selected=''";}?> value="GTY/PTY">GTY/PTY</option>
                    <option <?php if ($data['status']=="GTT"){ print "selected=''";}?> value="GTT">GTT</option>
                    <option <?php if ($data['status']=="Honor Daeran TK. I Provinsi"){ print "selected=''";}?> value="Honor Daerah TK. I Provinsi">Honor Daerah TK. I Provinsi</option>
                    <option <?php if ($data['status']=="Honor Daerah TK. II Kab/Kota"){ print "selected=''";}?> value="Honor Daerah TK. II Kab/Kota">Honor Daerah TK. II Kab/Kota</option>
                    <option <?php if ($data['status']=="Guru Bantu Pusat"){ print "selected=''";}?> value="Guru Bantu Pusat">Guru Bantu Pusat</option>
                    <option <?php if ($data['status']=="Guru Honor Sekolah"){ print "selected=''";}?> value="Guru Honor Sekolah">Guru Honor Sekolah</option>
                    <option <?php if ($data['status']=="Tenaga Honor Sekolah"){ print "selected=''";}?> value="Tenaga Honor Sekolah">Tenaga Honor Sekolah</option>
                    <option <?php if ($data['status']=="CPNS"){ print "selected=''";}?> value="CPNS">CPNS</option>
                    <option <?php if ($data['status']=="Kontrak Kerja WNA"){ print "selected=''";}?> value="Kontrak Kerja WNA">Kontrak Kerja WNA</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis PTK</label>
                <div class="col-sm-6">
                  <select class="form-control" name="jenis_ptk" id="status">
                    <option value="none">- Pilih Jenis PTK -</option>
                    <option <?php if ($data['jenis_ptk']=="Guru BK"){ print "selected=''";}?> value="Guru BK">Guru BK</option>
                    <option <?php if ($data['jenis_ptk']=="Guru Inklusi"){ print "selected=''";}?> value="Guru Inklusi">Guru Inklusi</option>
                    <option <?php if ($data['jenis_ptk']=="Guru Kelas"){ print "selected=''";}?> value="Guru Kelas">Guru Kelas</option>
                    <option <?php if ($data['jenis_ptk']=="Guru Mapel"){ print "selected=''";}?> value="Guru Mapel">Guru Mapel</option>
                    <option <?php if ($data['jenis_ptk']=="Guru TIK"){ print "selected=''";}?> value="Guru TIK">Guru TIK</option>
                    <option <?php if ($data['jenis_ptk']=="Laboran"){ print "selected=''";}?> value="Laboran">Laboran</option>
                    <option <?php if ($data['jenis_ptk']=="Pengawas BK"){ print "selected=''";}?> value="Pengawas BK">Pengawas BK</option>
                    <option <?php if ($data['jenis_ptk']=="Penjaga Sekolah"){ print "selected=''";}?> value="Penjaga Sekolah">Penjaga Sekolah</option>
                    <option <?php if ($data['jenis_ptk']=="Pesuruh/Office Boy"){ print "selected=''";}?> value="Pesuruh/Office Boy">Pesuruh/Office Boy</option>
                    <option <?php if ($data['jenis_ptk']=="Petugas Keamanan"){ print "selected=''";}?> value="Petugas Keamanan">Petugas Keamanan</option>
                    <option <?php if ($data['jenis_ptk']=="Tenaga Administrasi Sekolah"){ print "selected=''";}?> value="Tenaga Administrasi Sekolah">Tenaga Administrasi Sekolah</option>
                    <option <?php if ($data['jenis_ptk']=="Tenaga Perpustakaan"){ print "selected=''";}?> value="Tenaga Perpustakaan">Tenaga Perpustakaan</option>
                    <option <?php if ($data['jenis_ptk']=="Tukang Kebun"){ print "selected=''";}?> value="Tukang Kebun">Tukang Kebun</option>
                  </select>
                </div>
              </div>

              <div class="form-group" style="margin-bottom: 20px;">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                  <a href="<?php print $root;?>admin/teacher" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a>
                  <button type="submit" class="btn btn-sm btn-primary flat" name="update"><i class="fa fa-check"></i> UPDATE</button>
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