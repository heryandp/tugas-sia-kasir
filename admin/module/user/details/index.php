 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php 
	$id = $_GET['id'];
	$hasil = $lihat -> member_edit($id);
?>
<h4>Detail User</h4>
<br>
<a href="index.php?page=user" class="btn btn-primary btn-md">
            <i class="fa fa-arrow-left"></i> Balik</a>

            <div class="clearfix"></div>
        <br />

<div class="row">
	<div class="col-sm-6">
		<div class="card card-primary">
			<div class="card-header">
				<h5 class="mt-2"><i class="fa fa-user"></i> Foto Pengguna </h5>
			</div>
			<div class="card-body">
				<img src="assets/img/user/<?php echo $hasil['gambar'];?>" alt="#" class="img-fluid w-100" />
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card card-primary">
			<div class="card-header">
				<h5 class="mt-2"><i class="fa fa-user"></i> Data Utama Pengguna </h5>
			</div>
			<div class="card-body">
				<div class="box-content">
					<form class="form-horizontal" method="POST" action=""
						enctype="multipart/form-data">
						<fieldset>
							<div class="control-group mb-3">
								<label class="control-label" for="typeahead">Nama </label>
								<div class="input-group">
									<input type="text" class="form-control" style="border-radius:0px;" name="nama"
										data-items="4" value="<?php echo $hasil['nm_member']; ?>"
										required="required" disabled readonly />
								</div>
							</div>
							<div class="control-group mb-3">
								<label class="control-label" for="typeahead">Email </label>
								<div class="input-group">
									<input type="email" class="form-control" style="border-radius:0px;" name="email"
										value="<?php echo $hasil['email']; ?>" required="required" disabled readonly/>
								</div>
							</div>
							<div class="control-group mb-3">
								<label class="control-label" for="typeahead">Telepon </label>
								<div class="input-group">
									<input type="text" class="form-control" style="border-radius:0px;" name="tlp"
										value="<?php echo $hasil['telepon']; ?>" required="required" disabled readonly/>
								</div>
							</div>
							<div class="control-group mb-3">
								<label class="control-label" for="typeahead">NIK ( KTP ) </label>
								<div class="input-group">
									<input type="text" class="form-control" style="border-radius:0px;" name="nik"
										value="<?php echo $hasil['NIK']; ?>" required="required" disabled readonly/>
								</div>
							</div>
							<div class="control-group mb-3">
								<label class="control-label" for="typeahead">Alamat </label>
								<div class="controls">
									<textarea name="alamat" rows="3" class="form-control" style="border-radius:0px;"
										required="required" disabled readonly><?php echo $hasil['alamat_member']; ?></textarea>
								</div>
							</div>
                            <div class="control-group mb-3">
								<label class="control-label" for="typeahead">Username </label>
								<div class="input-group">
									<input type="text" class="form-control" style="border-radius:0px;" name="username"
										value="<?php echo $hasil['user']; ?>" required="required" disabled readonly/>
								</div>
							</div>
							<div class="control-group mb-3">
								<label class="control-label" for="typeahead">Role </label>
								<div class="input-group">
									<input type="text" class="form-control" style="border-radius:0px;" name="role"
										value="<?php echo $hasil['nama_role']; ?>" required="required" disabled readonly/>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>