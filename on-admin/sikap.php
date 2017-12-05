<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-child"></i>
      DATA SIKAP/PRILAKU
      <small>SMK NEGERI 1 BRONDONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root; ?>admin/sikap/add" class="btn btn-sm btn-primary flat"><i class="fa fa-plus"></i> TAMBAH DATA</a></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <table id="example1" class="table table-striped">
            <thead>
              <tr>
                <th width="5%"><center>NO</center></th>
                <th>Tahun Pelajaran</th>
                <th>Butir Sikap</th>
                <th><center>ACTION</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = "SELECT * FROM tb_sikap ORDER BY th_ajaran ASC";
              $query = mysqli_query($con, $sql);
              while ($data = mysqli_fetch_array($query)){
              ?>
              <tr>
                <td><center><?php print $no++; ?></center></td>
                <td><?php print $data['th_ajaran']; ?></td>
                <td><?php print $data['butir_sikap'];?></td>
                <td><center>
                  <a href="" class="btn btn-xs btn-primary flat tip-bottom" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="?del=<?php print $data['id'];?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Apakah Anda yakin untuk menghapus data sikap <?php print $data['butir_sikap'];?>?');"><i class="fa fa-trash"></i></a>
                </center></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php
          if (isset($_REQUEST['del'])){
            $id = $_REQUEST['del'];
            $sql = "DELETE FROM tb_sikap WHERE id='$id'";
            $query = mysqli_query($con, $sql);
            if (mysqli_affected_rows($con)>0){
              print "<script>alert('Data sikap BERHASIL dihapus!');history.go(-1);</script>";
            }else{
              print "<script>alert('Data sikap GAGAL dihapus. Silahkan ulangi kembali!');history.go(-1);</script>";
            }
          }
          ?>
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