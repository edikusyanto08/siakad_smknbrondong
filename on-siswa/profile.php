<?php
include "_header.php";

$nis_nisn = $_SESSION['username'];

$sql = "SELECT * FROM tb_siswa WHERE nis_nisn='$nis_nisn'";
$query = mysqli_query($con,$sql);
$data = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><i class="fa fa-user-circle-o"></i> DATA PRIBADI
			<small>SMK NEGERI 1 BRONDONG</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php print $root; ?>on-siswa/"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Data Pribadi</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-4">

					<!-- Profile Image -->
					<div class="box box-primary">
						<div class="box-body box-profile">
							<img class="profile-user-img img-responsive img-circle" src="<?php print $root;?>img/img-siswa/<?php print $_SESSION['foto']; ?>" alt="User profile picture">
							<br/>
							<h3 class="profile-username text-center"><?php print $_SESSION['nama']; ?></h3>
							<p class="text-muted text-center"><?php print $_SESSION['username']; ?></p>							
						</div>

						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
				<div class="col-md-8">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#datasiswa" data-toggle="tab">DATA SISWA</a></li>
							<li><a href="#data_orangtua" data-toggle="tab">DATA ORANGTUA & WALI</a></li>
						</ul>
						<div class="tab-content">
							<!-- Data Siswa -->
							<div class="active tab-pane" id="datasiswa">
								<br/>
								<form class="form form-horizontal">
									<div class="form-group">
										<label class="col-sm-3 control-label">NIS/NISN:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $_SESSION['username'];?>" >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Siswa:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['nama_siswa'];?>" >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Jenis Kelamin:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['jk'];?>" >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Tempat Lahir:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['tmp_lahir'];?>" >
										</div>
										<label class="col-sm-3 control-label">Tanggal Lahir:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['tgl_lahir'];?>" >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Agama:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['agama'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['alamat_siswa'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Telp/HP:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['telp_hp_siswa'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Sekolah Asal:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['nama_sek_asal'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat Sekolah:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['alamat_sek_asal'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">No. Ijazah:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['no_ijazah'];?>">
										</div>
										<label class="col-sm-3 control-label">Tahun Ijazah:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['th_ijazah'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Diterima:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['diterima_kelas'];?>">
										</div>
										<label class="col-sm-3 control-label">Tgl. Diterima:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['th_ijazah'];?>">
										</div>
									</div>
								</form>
								<br/>
							</div>
							<!-- Data Siswa -->

							<!-- Data Orangtua-->
							<div class="tab-pane" id="data_orangtua">
								<br/>
								<form class="form form-horizontal">
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Ayah:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['nama_ayah'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Ibu:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['nama_ibu'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['alamat_ortu'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Telp/HP:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['telp_hp_ortu'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Pekerjaan:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['pekerjaan_ortu'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Wali:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['nama_wali'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat Wali:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['alamat_wali'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Telp/HP:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['telp_hp_wali'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Pekerjaan:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['pekerjaan_wali'];?>">
										</div>
									</div>
									<br/>
								</form>
							</div>
							<!-- Data Orangtu -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.nav-tabs-custom -->
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