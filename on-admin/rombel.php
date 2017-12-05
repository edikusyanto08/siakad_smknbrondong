<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-users"></i>
      DATA ROMBEL
      <small>SMK NEGERI 1 BRONDONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root;?>admin/rombel/add"><button class="btn btn-sm btn-primary flat"><i class="fa fa-plus"></i> TAMBAH DATA</button></a></h3>

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
          <table class="table table-striped" id="example1">
            <thead>
              <tr>
                <th width="5%"><center>NO</center></th>
                <th>Tahun Ajaran</th>
                <th>Kelas</th>
                <th>Nama Rombel</th>
                <th>Kompetensi Keahlian</th>
                <th>Wali Kelas</th>
                <th width="20%"><center>TOOLS</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = "SELECT * FROM tb_rombel ORDER BY id ASC";
              $query = mysqli_query($con, $sql);
              while ($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <td><center><?php print $no++;?></center></td>
                  <td><?php print $data['th_ajaran'];?></td>
                  <td><?php print $data['tingkat'];?></td>
                  <td><?php print $data['nama_rombel'];?></td>
                  <td><?php print $data['kompetensi'];?></td>
                  <td><?php print $data['wali_kelas'];?></td>
                  <td><center>
                    <a href="<?php print $root; ?>admin/rombel/anggota" class="btn btn-xs btn-success flat tip-bottom" data-toggle="tooltip" data-original-title="Anggota Rombel"><i class="fa fa-search-plus"></i> Anggota Rombel</a>
                    <a href="<?php print $root; ?>admin/rombel/update?id=<?php print $data['id'];?>" class="btn btn-xs btn-primary flat tip-bottom" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                    <a href="?del=<?php print $data['id']; ?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Apakah Anda yakin untuk menghapus data rombel <?php print $data['nama_rombel'];?>?');"><i class="fa fa-trash"></i></a>
                  </center></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php
            if (isset($_REQUEST['del'])){
              $id = $_REQUEST['del'];
              $sql = "DELETE FROM tb_rombel WHERE id='$id'";
              $query = mysqli_query($con, $sql);
              if (mysqli_affected_rows($con)>0){
                print "<script>alert('Data rombel BERHASIL dihapus!');history.go(-1);</script>";
              }else{
                print "<script>alert('Data rombel GAGAL dihapus!');history.go(-1);</script>";
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