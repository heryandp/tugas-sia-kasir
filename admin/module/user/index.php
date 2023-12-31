<?php if(isset($_GET['nonaktif'])) {?>
    <h4>Data User Nonaktif</h4>
<br />

            <a href="index.php?page=user" class="btn btn-primary btn-md">
            <i class="fa fa-arrow-left"></i> Balik</a>

            <div class="clearfix"></div>
        <br />
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="example1">
            <thead>
                <tr style="background:#DFF0D8;color:#333;">
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				$hasil = $lihat -> member_nonaktif();
				$no=1;
				foreach($hasil as $isi){
			?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['user'];?></td>
                    <td>
                    <img class="avatar-img"
                            src="assets/img/user/<?php echo $isi['gambar'];?>">   
                    <?php echo $isi['nm_member'];?>
                </td>
                    <td><?php echo $isi['email'];?></td>
                    <td><?php echo $isi['nama_role'];?></td>
                    <td>
                    <a href="index.php?page=user/details&id=<?php echo $isi['id_login'];?>" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info"></i>
                                    </span>
                                    <span class="text">Detil</span>
                                </a>

                        <a href="fungsi/edit/edit.php?reaktivasi=yes&id=<?php echo $isi['id_login'];?>" class="btn btn-success btn-icon-split"
                            onclick="javascript:return confirm('Apakah anda ingin mengaktifkan kembali user ?');">
                            <span class="icon text-white-50">
                                            <i class="fas fa-archive"></i>
                            </span>
                            <span class="text">Reaktivasi</span>
                        </a>
                    </td>
                </tr>
                <?php $no++; }?>
            </tbody>
        </table>
    </div>
</div>

<?php } else{ ?>
<h4>Data User</h4>
<br />
<?php if(isset($_GET['success']) && $_GET['success'] == 'tambah'){?>
<div class="alert alert-success">
    <p>Tambah User Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'edit'){?>
<div class="alert alert-success">
    <p>Edit User Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'reset'){?>
<div class="alert alert-success">
    <p>Reset Password Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'nonaktif'){?>
<div class="alert alert-success">
    <p>User berhasil dinonaktifkan !</p>
</div>
<?php }?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'reaktivasi'){?>
<div class="alert alert-success">
    <p>User berhasil diaktifkan kembali !</p>
</div>
<?php }?>
<?php if(isset($_GET['gagal']) && $_GET['gagal'] == 'tambah'){?>
        <div class="alert alert-danger">
            <p>Gagal menambahkan user !</p>
        </div>
<?php }?>
<?php if(isset($_GET['gagal']) && $_GET['gagal'] == 'edit'){?>
        <div class="alert alert-danger">
            <p>Gagal mengubah user !</p>
        </div>
<?php }?>

<button type="button" class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Tambah Data</button>
<a href="index.php?page=user&nonaktif=yes" class="btn btn-warning btn-md mr-2">
            <i class="fa fa-filter"></i> Filter User Nonaktif</a>
            <a href="index.php?page=user" class="btn btn-success btn-md">
            <i class="fa fa-spinner"></i> Refresh Data</a>

            <div class="clearfix"></div>
        <br />
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="example1">
            <thead>
                <tr style="background:#DFF0D8;color:#333;">
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				$hasil = $lihat -> member();
				$no=1;
				foreach($hasil as $isi){
			?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['user'];?></td>
                    <td>
                    <img class="avatar-img"
                            src="assets/img/user/<?php echo $isi['gambar'];?>">   
                    <?php echo $isi['nm_member'];?>
                </td>
                    <td><?php echo $isi['email'];?></td>
                    <td><?php echo $isi['nama_role'];?></td>
                    <td>
                    <a href="index.php?page=user/details&id=<?php echo $isi['id_login'];?>" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info"></i>
                                    </span>
                                    <span class="text">Detil</span>
                                </a>
                                <?php if($isi['user'] == $_SESSION['admin']['user']) {?>
                        <a href="index.php?page=profil" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                            <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>
                        <?php } else{ ?>
                            <a href="index.php?page=user/edit&id=<?php echo $isi['id_login'];?>" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                            <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>

                        <?php } ?>
                        <?php if($isi['user'] != 'admin') {?>
                        <a href="fungsi/hapus/hapus.php?user=hapus&id=<?php echo $isi['id_login'];?>" class="btn btn-danger btn-icon-split"
                            onclick="javascript:return confirm('Apakah anda ingin menonaktifkan user ?');">
                            <span class="icon text-white-50">
                                            <i class="fas fa-archive"></i>
                            </span>
                            <span class="text">Nonaktifkan</span>
                        </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php $no++; }?>
            </tbody>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style=" border-radius:0px;">
                    <div class="modal-header" style="background:#285c64;color:#fff;">
                        <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="fungsi/tambah/tambah.php?user=tambah" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <table class="table table-striped bordered">
                                <tr>
                                    <td>Role</td>
                                    <td>
                                        <select name="role" class="form-control" required>
                                            <option value="#" disabled selected>Pilih Role</option>
                                            <?php  $roles = $lihat -> roles(); foreach($roles as $isi){ 	?>
                                            <option value="<?php echo $isi['id_role'];?>">
                                                <?php echo $isi['nama_role'];?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" placeholder="Nama" required class="form-control"
                                            name="nama"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><textarea placeholder="Alamat" required class="form-control"
                                            name="alamat"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td><input type="tel" placeholder="Nomor Telepon" required class="form-control"
                                            name="telepon" pattern="[0-9]{10-12}"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="email" placeholder="Alamat Email" required class="form-control"
                                            name="email"></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td><input type="number" placeholder="NIK" required class="form-control"
                                            name="nik"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" required placeholder="Username" class="form-control"
                                            name="username"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" required placeholder="Password" class="form-control"
                                            name="password"></td>
                                </tr>
                                <tr>
                                    <td>Foto User</td>
                                    <td><input type="file" accept="image/*" name="foto"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
<?php } ?>