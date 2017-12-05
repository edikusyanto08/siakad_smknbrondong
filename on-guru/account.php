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
      <h3 class="box-title"><i class="ion ion-person"></i> Akun Saya</h3>

      <div class="box-tools pull-right">
       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
     </div>

     <!-- /.box-header -->
     <div class="box-body">
      <form method="POST" action="input-guru.php" class="form-horizontal">
       <div class="form-group">
        <label class="col-sm-2 control-label">NIP / NIK</label>
        <div class="col-sm-4">
         <input name="nip_nik" type="text" id="nip_nik" class="form-control" placeholder="NIP / NIK" autofocus="on" required="required">
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Nama Lengkap</label>
        <div class="col-sm-4">
         <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Lengkap" autofocus="on" required="required">
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-4">
         <input name="status" type="text" id="status" class="form-control" placeholder="Status" autofocus="on" required="required">
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4">
         <label class="label label-success">DETAIL LOGIN</label>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-4">
         <input name="username" type="text" id="username" class="form-control" placeholder="Username" autofocus="on" required="required">
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-4">
         <input name="pass" type="text" id="pass" class="form-control" placeholder="Password" autofocus="on" required="required">
        </div>
       </div>

       <div class="form-group" style="margin-bottom: 20px;">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4">
         <input type="submit" value="SIMPAN" class="btn btn-md btn-primary" />
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