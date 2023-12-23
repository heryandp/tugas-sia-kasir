 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php 
	$id = $_GET['barang'];
	$hasil = $lihat -> barang_edit($id);
?>
 <a href="index.php?page=barang" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Balik </a>
 <h4>Edit Barang</h4>
 <?php if(isset($_GET['success'])){?>
 <div class="alert alert-success">
     <p>Edit Data Berhasil !</p>
 </div>
 <?php }?>
 <?php if(isset($_GET['remove'])){?>
 <div class="alert alert-danger">
     <p>Hapus Data Berhasil !</p>
 </div>
 <?php }?>
<div class="card card-body">
	<div class="table-responsive">
		<table class="table table-striped">
			<form action="fungsi/edit/edit.php?barang=edit" method="POST">
				<tr>
					<td>ID Barang</td>
					<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_barang'];?>"
							name="id"></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>
						<select name="kategori" class="form-control">
							<option value="#" disabled>Pilih Kategori</option>
							<?php  $kat = $lihat -> kategori(); foreach($kat as $isi){ 	?>
							<option <?php echo $hasil['nama_kategori'] == $isi['nama_kategori'] ? "selected" : "" ;?> value="<?php echo $isi['id_kategori'];?>"><?php echo $isi['nama_kategori'];?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Nama Barang</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['nama_barang'];?>" name="nama"></td>
				</tr>
				<tr>
					<td>Merk Barang</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['merk'];?>" name="merk"></td>
				</tr>
				<tr>
					<td>Harga Beli</td>
					<td><input type="number" class="form-control" value="<?php echo $hasil['harga_beli'];?>" name="beli"></td>
				</tr>
				<tr>
					<td>Harga Jual</td>
					<td><input type="number" class="form-control" value="<?php echo $hasil['harga_jual'];?>" name="jual"></td>
				</tr>
				<tr>
					<td>Satuan Barang</td>
					<td>
						<select name="satuan" class="form-control">
							</option>
							<option value="#" disabled>Pilih Satuan</option>
							<option <?php echo $hasil['satuan_barang'] == "PCS" ? "selected" : "" ;?> value="PCS">PCS</option>
							<option <?php echo $hasil['satuan_barang'] == "DUS" ? "selected" : "" ;?> value="DUS">DUS</option>
							<option <?php echo $hasil['satuan_barang'] == "PAK" ? "selected" : "" ;?> value="PAK">PAK</option>
							<option <?php echo $hasil['satuan_barang'] == "BAL" ? "selected" : "" ;?> value="BAL">BAL</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Stok</td>
					<td><input type="number" class="form-control" value="<?php echo $hasil['stok'];?>" name="stok"></td>
				</tr>
				<tr>
					<td>Tanggal Update</td>
					<td><input type="text" readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i");?>"
							name="tgl"></td>
				</tr>
				<tr>
					<td></td>
					<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
				</tr>
			</form>
		</table>
	</div>
</div>