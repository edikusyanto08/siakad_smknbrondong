<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><i class="fa fa-eye"></i> PROFIL GURU
			<small>SMK NEGERI 1 BRONDONG</small></h1>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-4">
					<?php
					$id = $_REQUEST['nip'];
					$sql = "SELECT * FROM tb_guru WHERE nip='$id'";
					$query = mysqli_query($con, $sql);
					$result = mysqli_fetch_array($query);
					?>
					<!-- Profile Image -->
					<div class="box box-primary">
						<div class="box-body box-profile">
							<?php
							if ($result['foto'] == ''){
								print "<img class='profile-user-img img-responsive img-circle' src='$root/img/user-default.png' alt='User profile picture'>";
							}else{
								?><img height="50px" width="50px" class="profile-user-img img-responsive img-circle" src="<?php print $root; ?>img/img-guru/<?php print $result['foto']; ?>" alt="User profile picture"><?php
							}
							?>
							<br/>
							<h3 class="profile-username text-center"><?php print $result['nama_guru']; ?></h3>
							<p class="text-muted text-center"><?php print $result['nip']; ?></p>             
						</div>

						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
				<div class="col-md-8">
					<div class="box box-primary">
						<div class="box-header">
							<button type="button" class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
						<div class="box-body">
							<form class="form form-horizontal">
								<div class="form-group">
									<label class="col-md-3 control-label">NIP</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['nip']; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">NUPTK</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['nuptk']; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Nama Guru</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['nama_guru']; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Tempat, Tanggal Lahir</label>
									<div class="col-md-5">
										<input type="text" class="form-control" value="<?php print $result['tmp_lahir']; ?>">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" value="<?php print dateformat($result['tgl_lahir']); ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Jenis Kelamin</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['jk']; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Agama</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['agama']; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Alamat</label>
									<div class="col-md-9">
										<input type="text" class="form-control col-md-4" value="<?php print $result['alamat'];?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">No. Telp/HP</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['telp_hp'];?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Status</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['status'];?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Jenis PTK</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['jenis_ptk'];?>">
									</div>
								</div>

								<p class="label label-primary col-md-12">DETAIL LOGIN</p><br/><br/>
								<?php
								$nip = $_REQUEST['nip']; 
								$query = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$nip'");
								$data = mysqli_fetch_array($query);
								?>
								<div class="form-group">
									<label class="col-md-3 control-label">Username</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $data['username'];?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Password</label>
									<div class="col-md-9">
										<input type="password" class="form-control" value="<?php print $data['password'];?>">Password dapat diganti di menu <b>Data User!</b>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3"></label>
									<div class="col-md-9">
										<a href="<?php print $root;?>admin/teacher" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a>
									</div>
								</div>
							</form>
						</div>
					</div>
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