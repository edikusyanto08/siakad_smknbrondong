<?php
include "_header.php";

if (isset($_REQUEST['add'])){
  $nip = $_REQUEST['nip'];
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
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];

  if (($_REQUEST['jk'] == 'jk_none') || ($_REQUEST['status'] == 'status_none')){
    print "<script>alert('Silahkan pilih jenis kelamin dan status terlebih dahulu!');history.go(-1);</script>";
  }else{
    $newphoto = date('dmYHis').$foto;
    $path = "../img/img-guru/".$newphoto;

    if (move_uploaded_file($tmp, $path)){
      $sql = "INSERT INTO tb_guru (nip, nuptk, nama_guru, tmp_lahir, tgl_lahir, jk, agama, alamat, telp_hp, status, jenis_ptk, foto) VALUES ('$nip', '$nuptk', '$nama_guru', '$tmp_lahir', '$tgl_lahir', '$jk', '$agama', '$alamat', '$telp_hp', '$status', '$jenis_ptk', '$newphoto')";
      $query = mysqli_query($con, $sql);
      if (mysqli_affected_rows($con)>0){
        print "<script>alert('Data guru berhasil ditambahkan!');</script>";
      }else{
        print "<script>alert('Maaf, data guru gagal ditambahkan ke database!');</script>";
      }
    } else{
      print "<script>alert('GAGAL! Maaf foto guru gagal diupload. Silahkan ulangi kembali!');</script>";
    }
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="ion ion-android-person-add"></i> INPUT DATA GURU
      <small>SMK NEGERI 1 BRONDONG</small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <a href="<?php print $root; ?>admin/teacher" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a> &nbsp; <a href="<?php print $root; ?>admin/teacher/import" class="btn btn-sm btn-success flat"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Impor Data (.xls)</a></h3>

                <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                 title="Collapse">
                 <i class="fa fa-minus"></i></button>
               </div>
             </div>

             <!-- /.box-header -->
             <div class="box-body">
              <br/>

              <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label">NIP</label>
                  <div class="col-sm-6">
                    <input name="nip" type="text" id="nip" class="form-control" placeholder="NIP Guru" autofocus="on" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">NUPTK</label>
                  <div class="col-sm-6">
                    <input name="nuptk" type="text" class="form-control" placeholder="NUPTK Guru" autofocus="on" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Guru</label>
                  <div class="col-sm-6">
                    <input onkeyup="this.value=this.value.toUpperCase()" name="nama_guru" type="text" id="nama_guru" class="form-control" placeholder="Nama Guru" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-6">
                    <input onkeyup="this.value=this.value.toUpperCase()" name="tmp_lahir" type="text" class="form-control" placeholder="Tempat Lahir" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-6">
                    <input name="tgl_lahir" type="date" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="jk" id="jk">
                      <option value="jk_none">- Pilih Jenis Kelamin -</option>
                      <option value="LAKI-LAKI">LAKI-LAKI</option>
                      <option value="PEREMPUAN">PEREMPUAN</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="agama">
                      <option value="agama_none">- Pilih Agama -</option>
                      <option value="ISLAM">ISLAM</option>
                      <option value="KRISEN PROTESTAN">KRISEN PROTESTAN</option>
                      <option value="KATOLIK">KATOLIK</option>
                      <option value="HINDU">HINDU</option>
                      <option value="BUDDHA">BUDDHA</option>
                      <option value="KONG HU CU">KONG HU CU</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat Guru</label>
                  <div class="col-sm-6">
                    <input onkeyup="this.value=this.value.toUpperCase()" name="alamat" type="text" id="alamat" class="form-control" placeholder="Alamat Guru" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Telp/HP</label>
                  <div class="col-sm-6">
                    <input size="12" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" name="telp_hp" type="text" id="telp_hp" class="form-control" placeholder="No. Telp/HP Guru" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="status" id="status">
                      <option value="status_none">- Pilih Status -</option>
                      <option value="PNS">PNS</option>
                      <option value="PNS Diperbantukan">PNS Diperbantukan</option>
                      <option value="PNS DEPAG">PNS DEPAG</option>
                      <option value="GTY/PTY">GTY/PTY</option>
                      <option value="GTT">GTT</option>
                      <option value="Honor Daerah TK. I Provinsi">Honor Daerah TK. I Provinsi</option>
                      <option value="Honor Daerah TK. II Kab/Kota">Honor Daerah TK. II Kab/Kota</option>
                      <option value="Guru Bantu Pusat">Guru Bantu Pusat</option>
                      <option value="Guru Honor Sekolah">Guru Honor Sekolah</option>
                      <option value="Tenaga Honor Sekolah">Tenaga Honor Sekolah</option>
                      <option value="CPNS">CPNS</option>
                      <option value="Kontrak Kerja WNA">Kontrak Kerja WNA</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis PTK</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="jenis_ptk" id="status">
                      <option value="ptk_none">- Pilih Jenis PTK -</option>
                      <option value="Guru BK">Guru BK</option>
                      <option value="Guru Inklusi">Guru Inklusi</option>
                      <option value="Guru Kelas">Guru Kelas</option>
                      <option value="Guru Mapel">Guru Mapel</option>
                      <option value="Guru TIK">Guru TIK</option>
                      <option value="Laboran">Laboran</option>
                      <option value="Pengawas BK">Pengawas BK</option>
                      <option value="Penjaga Sekolah">Penjaga Sekolah</option>
                      <option value="Pesuruh/Office Boy">Pesuruh/Office Boy</option>
                      <option value="Petugas Keamanan">Petugas Keamanan</option>
                      <option value="Tenaga Administrasi Sekolah">Tenaga Administrasi Sekolah</option>
                      <option value="Tenaga Perpustakaan">Tenaga Perpustakaan</option>
                      <option value="Tukang Kebun">Tukang Kebun</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto Guru</label>
                  <div class="col-sm-6">
                    <input type="file" name="foto" class="form-control">
                  </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <input type="submit" value="SIMPAN" name="add" class="btn btn-md btn-primary flat" />
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
    include "_footer.php"
    ?>