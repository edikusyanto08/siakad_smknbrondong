<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <style type="text/css">
  div.dataTables_wrapper {
    padding-right: 10px;
    width: 2300px;
    margin: 0 auto;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-line-chart"></i>
    NILAI SISWA
    <small>SMK NEGERI 1 BRONDONG</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Nilai Siswa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box box-primary box-solid">
    <div class="box-body">
      <br/>
      <?php
      $id = $_SESSION['username'];
      $sql = "SELECT * FROM tb_nilai LEFT JOIN tb_user ON tb_nilai.nis_nisn = tb_user.username";
      $query = mysqli_query($con, $sql);
      $data = mysqli_fetch_array($query);
      ?>
      <form class="form form-horizontal" method="POST">
        <div class="col-md-2">
          <label class="control-label" class="control-label class="control-label"">NIS/NISN</label>
        </div>
        <div class="form-group col-md-4">
          <input class="form-control" type="text" value="<?php print $data['nis_nisn'];?>" name="nis_nisn" readonly="">
        </div>

        <div class="col-md-2">
          <label class="control-label">JURUSAN</label>
        </div>
        <div class="form-group col-md-4">
          <input class="form-control" type="text" name="jurusan" readonly="">
        </div>

        <div class="col-md-2">
          <label class="control-label">NAMA</label>
        </div>
        <div class="form-group col-md-4">
          <input class="form-control" type="text" value="<?php print $data['nama'];?>" name="nama" readonly="">
        </div>

        <div class="col-md-2">
          <label class="control-label">KELAS</label>
        </div>
        <div class="form-group col-md-4">
          <select class="form-control" name="kelas_tapel">
            <option value="tapel_none">- Pilih Kelas -</option>
            <option value="">X - GANJIL</option>
            <option value="">X - GENAP</option>
            <option value="">XI - GANJIL</option>
            <option value="">XI - GENAP</option>
            <option value="">XII - GANJIL</option>
            <option value="">XII - GENAP</option>
          </select>
        </div>

        <div class="col-md-12">
          <button class="btn btn-md btn-primary flat pull-right">LIHAT NILAI</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

  <!-- Default box -->
  <div class="box box-primary box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Nilai Siswa</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table" id="example3" class="display nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10%">Mata Pelajaran</th>
            <th width="2%" class="bg-danger"><center>NT 1</center></th>
            <th width="2%" class="bg-danger"><center>NT 2</center></th>
            <th width="2%" class="bg-danger"><center>NT 3</center></th>
            <th width="2%" class="bg-danger"><center>NT 4</center></th>
            <th width="2%" class="bg-danger"><center>NT 5</center></th>
            <th width="2%" class="bg-warning"><center>NH 1</center></th>
            <th width="2%" class="bg-warning"><center>NH 2</center></th>
            <th width="2%" class="bg-warning"><center>NH 3</center></th>
            <th width="2%" class="bg-warning"><center>NH 4</center></th>
            <th width="2%" class="bg-warning"><center>NH 5</center></th>
            <th width="2%" class="bg-info"><center>UTS</center></th>
            <th width="2%" class="bg-info"><center>UAS</center></th>
            <th width="2%" class="bg-info"><center>NAP</center></th>
            <th width="2%" class="bg-info"><center>Pre</center></th>
            <th width="2%" class="bg-danger"><center>PR 1</center></th>
            <th width="2%" class="bg-danger"><center>PR 2</center></th>
            <th width="2%" class="bg-danger"><center>PR 3</center></th>
            <th width="2%" class="bg-danger"><center>PR 4</center></th>
            <th width="2%" class="bg-danger"><center>PR 5</center></th>
            <th width="2%" class="bg-warning"><center>PD 1</center></th>
            <th width="2%" class="bg-warning"><center>PD 2</center></th>
            <th width="2%" class="bg-warning"><center>PD 3</center></th>
            <th width="2%" class="bg-warning"><center>PD 4</center></th>
            <th width="2%" class="bg-warning"><center>PD 5</center></th>
            <th width="2%" class="bg-success"><center>PY 1</center></th>
            <th width="2%" class="bg-success"><center>PY 2</center></th>
            <th width="2%" class="bg-success"><center>PY 3</center></th>
            <th width="2%" class="bg-success"><center>PY 4</center></th>
            <th width="2%" class="bg-success"><center>PY 5</center></th>
            <th width="2%" class="bg-info"><center>NAK</center></th>
            <th width="2%" class="bg-info"><center>Pre</center></th>
            <th width="2%" class="bg-info"><center>JML</center></th>
            <th width="2%" class="bg-info"><center>Rata</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $id = $_SESSION['username'];
          $sql = "SELECT * FROM tb_nilai WHERE nis_nisn='$id'";
          $query = mysqli_query($con, $sql);
          while ($data = mysqli_fetch_array($query)){
            ?>
            <tr>
              <td></td>
              <td class="bg-danger"><center><?php print $data['n_tugas1'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_tugas2'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_tugas3'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_tugas4'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_tugas5'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian1'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian2'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian3'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian4'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian5'];?></center></td>
              <td class="bg-info"><center><?php print $data['uts'];?></center></td>
              <td class="bg-info"><center><?php print $data['uas'];?></center></td>
              <td class="bg-info"><center><?php print $data['nilai_akhir_np'];?></center></td>
              <td class="bg-info"><center><?php print $data['pre_np'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_proses1'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_proses2'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_proses3'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_proses4'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_proses5'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_produk1'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_produk2'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_produk3'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_produk4'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_produk5'];?></center></td>
              <td class="bg-success"><center><?php print $data['n_proyek1'];?></center></td>
              <td class="bg-success"><center><?php print $data['n_proyek2'];?></center></td>
              <td class="bg-success"><center><?php print $data['n_proyek3'];?></center></td>
              <td class="bg-success"><center><?php print $data['n_proyek4'];?></center></td>
              <td class="bg-success"><center><?php print $data['n_proyek5'];?></center></td>
              <td class="bg-info"><center><?php print $data['nilai_akhir_nk'];?></center></td>
              <td class="bg-info"><center><?php print $data['pre_nk'];?></center></td>
              <td class="bg-info"><center><?php print $data['jumlah'];?></center></td>
              <td class="bg-info"><center><?php print $data['rata'];?></center></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <br/>
        <b>Deskripsi:</b>
        <ol>
          <li>NT = Nilai Tugas</li>
          <li>NH = Nilai Harian</li>
          <li>PR = Nilai Proses</li>
          <li>PD = Nilai Produk</li>
          <li>PY = Nilai Proyek</li>
          <li>NAP = Nilai Akhir Pengetahuan</li>          
          <li>PAK = Nilai Akhir Keterampilan</li>
          <li>Pre = Predikat</li>
        </ol>
      </div>
      <!-- /.box-body -->        
      <div class="box-footer">
        <a href="" class="btn btn-sm btn-danger flat"><i class="fa fa-file-pdf-o"></i>&nbsp; DOWNLOAD .PDF</a>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include "_footer.php";
?>