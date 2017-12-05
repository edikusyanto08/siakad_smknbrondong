<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Main content -->
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
      <h3 class="box-title"><i class="ion ion-trophy"></i> Input Nilai Siswa</h3>

      <div class="box-tools pull-right">
       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
     </div>

     <!-- /.box-header -->
     <div class="box-body">
      <form method="POST" action="input-guru.php" class="form-horizontal" enctype="multipart/form-data">
       <div class="form-group">
        <label class="col-sm-2 control-label">Kelas / Tahun Pelajaran</label>
        <div class="col-sm-4">
         <input name="kelas" type="text" id="kelas" class="form-control" placeholder="Kelas" autofocus="on" required="required">
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Mata Pelajaran</label>
        <div class="col-sm-4">
         <input name="mapel" type="text" id="mapel" class="form-control" placeholder="Mata Pelajaran" required="required" />
        </div>
       </div>

       <div class="form-group" style="margin-bottom: 20px;">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-6">
         <input type="submit" value="TAMPIL" class="btn btn-md btn-primary" />
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