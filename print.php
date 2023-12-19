<?php 
	@ob_start();
	session_start();
	if(!empty($_SESSION['admin'])){ }else{
		echo '<script>window.location="login.php";</script>';
        exit;
	}
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> penjualan();
?>
<html>
	<head>
		<title>print</title>
		<link rel="stylesheet" href="sb-admin/css/sb-admin-2.min.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<center>
						<p><b><?php echo $toko['nama_toko'];?></b></p>
						<p><?php echo $toko['alamat_toko'];?></p>
						<p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
						<p>Kasir : <?php  echo htmlentities($_GET['nm_member']);?></p>
					</center>
					<div class="table-responsive">
						<table class="table table-bordered border-dark" style="width:100%;">
							<tr>
								<td>No</td>
								<td>Barang</td>
								<td>Jumlah</td>
								<td>Harga</td>
								<td>Total</td>
							</tr>
							<?php $no=1; foreach($hsl as $isi){?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $isi['nama_barang'];?></td>
								<td><?php echo $isi['jumlah'];?></td>
								<td>Rp.<?php echo number_format($isi['total']/$isi['jumlah']);?></td>
								<td>Rp.<?php echo number_format($isi['total']);?></td>
							</tr>
							<?php $no++; }?>
						</table>
					</div>
					<div class="pull-right">
						<?php $hasil = $lihat -> jumlah(); ?>
						Total : Rp.<?php echo number_format($hasil['bayar']);?>,-
						<br/>
						Total Pajak (10%) : Rp.<?php echo number_format($hasil['bayar']*0.1);?>,-
						<br/>
						Total Semua : Rp.<?php echo number_format($hasil['bayar']*1.1);?>,-
						<br/>
						Bayar : Rp.<?php echo number_format(htmlentities($_GET['bayar']));?>,-
						<br/>
						Kembali : Rp.<?php echo number_format(htmlentities($_GET['kembali']));?>,-
					</div>
					<div class="clearfix"></div>
					<br>
					<center>
						<p>Terima Kasih Telah berbelanja di toko kami !</p>
					</center>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>
