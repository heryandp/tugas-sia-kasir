<h3>Dashboard</h3>
<br/>
<?php 
	$sql="select * from barang where stok <= 3";
	$row = $config -> prepare($sql);
	$row -> execute();
	$r = $row -> rowCount();
	if($r > 0){
?>
<?php
		echo "
		<div class='alert alert-warning'>
			<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
			<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
		</div>
		";	
	}
?>

<!-- data jumlah -->
<?php $hasil_barang = $lihat -> barang_row();?>
<?php $hasil_kategori = $lihat -> kategori_row();?>
<?php $stok = $lihat -> barang_stok_row();?>
<?php $jual = $lihat -> jual_row();?>

<?php if($_SESSION['admin']['nama_role'] == 'Administrator'){ ?>
<div class="row">
    <!--STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fas fa-cubes"></i> Jenis Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_barang);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=barang'>Tabel
                    Barang <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
    </div>
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h6 class="pt-2"><i class="fas fa-chart-bar"></i> Stok Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($stok['jml']);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=barang'>Tabel
                    Barang <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Telah Terjual</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($jual['stok']);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=laporan'>Tabel
                    Laporan <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fa fa-bookmark"></i> Kategori Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_kategori);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=kategori'>Tabel
                    Kategori <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Barang paling banyak terjual</h6>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="table bg-info text-white">
                    <tr>
                        <td class="text-center">Nama Barang</td>
                        <td class="text-center">Merk Barang</td>
                        <td class="text-center">Banyak Terjual</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        // var_dump($lihat -> jual_top());
                        foreach($lihat -> jual_top() as $row){
                            echo '<tr>';
                            echo '<td class="text-center">'.$row['nama_barang'].'</td>';
                            echo '<td class="text-center">'.$row['merk'].'</td>';
                            echo '<td class="text-center">'.$row['jumlah'].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Omzet Bulan Ini</h6>
            </div>
            <div class="card-body">
                <h2><?php echo "Rp.".number_format($lihat->omzet_sekarang()[0], 0, ',', '.') ?></h2>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Omzet Total</h6>
            </div>
            <div class="card-body">
                <h2><?php echo "Rp.".number_format($lihat->omzet_total()[0], 0, ',', '.') ?></h2>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
    <div class="row">
    <!--STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fas fa-cubes"></i> Jenis Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_barang);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=barang'>Tabel
                    Barang <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
    </div>
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h6 class="pt-2"><i class="fas fa-chart-bar"></i> Stok Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($stok['jml']);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=barang'>Tabel
                    Barang <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Barang paling banyak terjual</h6>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="table bg-info text-white">
                    <tr>
                        <td class="text-center">Nama Barang</td>
                        <td class="text-center">Merk Barang</td>
                        <td class="text-center">Banyak Terjual</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        // var_dump($lihat -> jual_top());
                        foreach($lihat -> jual_top() as $row){
                            echo '<tr>';
                            echo '<td class="text-center">'.$row['nama_barang'].'</td>';
                            echo '<td class="text-center">'.$row['merk'].'</td>';
                            echo '<td class="text-center">'.$row['jumlah'].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>