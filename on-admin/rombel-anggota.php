<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-user-plus"></i>
      TAMBAH ANGGOTA ROMBEL
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
        </div>
      </div>
      <div class="box-body">
        <button type="submit" id="button" name="button">SUBMIT</button>
        <table id="example1" class="table table-striped">
          <thead>
            <tr>
              <th width="5%"><center>NO</center></th>
              <th>NIS/NIS</th>
              <th>Nama Siswa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $sql = "SELECT * FROM tb_siswa ORDER BY nama_siswa ASC";
            $query = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($query)){
              ?>
              <tr>
                <td><center><?php print $no++; ?></center></td>
                <td><?php print $data['nis_nisn']; ?></td>
                <td><?php print $data['nama_siswa']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function() {
      var table = $('#example1').DataTable();

      $('#example1 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
      } );

      $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
      } );
    } );
  </script>
  <?php
  include "_footer.php";
  ?>