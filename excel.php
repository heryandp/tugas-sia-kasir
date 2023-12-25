<?php 
	@ob_start();
	session_start();
	if(!empty($_SESSION['admin'])){ }else{
		echo '<script>window.location="login.php";</script>';
        exit;
	}

    $bulan_tes =array(
        '01'=>"Januari",
        '02'=>"Februari",
        '03'=>"Maret",
        '04'=>"April",
        '05'=>"Mei",
        '06'=>"Juni",
        '07'=>"Juli",
        '08'=>"Agustus",
        '09'=>"September",
        '10'=>"Oktober",
        '11'=>"November",
        '12'=>"Desember"
    );


    if(!empty($_GET['cari'])){
        $filename = "data-laporan-" . strtolower($bulan_tes[$_GET['bln']]) . "-" . $_GET['thn'];
    } else if(!empty($_GET['hari'])){
        $filename = "data-laporan-" . $_GET['tgl'];
    } else{
        $filename = "data-laporan-" . date('Y-m-d');
    }

    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=".$filename.".xls");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 

    require 'config.php';
    include $view;
    $lihat = new view($config);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen</title>
</head>
<body>
	<!-- view barang -->	
    <!-- view barang -->	
    <div class="modal-view">
        <h3 style="text-align:center;"> 
        <?php if(!empty($_GET['cari'])){ ?>
			Data Laporan Penjualan Bulan <?= $bulan_tes[$_GET['bln']];?> Tahun <?= $_GET['thn'];?>
			<?php }elseif(!empty($_GET['hari'])){?>
			Data Laporan Penjualan Tanggal <?= $_GET['tgl'];?>
			<?php }else{?>
			Data Laporan Penjualan Tanggal <?= date('Y-m-d');?>
			<?php }?>
        </h3>
        <table border="1" width="100%" cellpadding="3" cellspacing="4">
            <thead>
                <tr bgcolor="yellow">
                    <th> No</th>
                    <th> ID Barang</th>
                    <th> Nama Barang</th>
                    <th style="width:10%;"> Satuan</th>
                    <th style="width:10%;"> Jumlah</th>
                    <th style="width:10%;"> Modal</th>
                    <th style="width:10%;"> Total</th>
                    <th style="width:10%;"> Pajak</th>
                    <th> Kasir</th>
                    <th> Tanggal Input</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1; 
                    if(!empty(htmlentities($_GET['cari']))){
                        $periode = htmlentities($_GET['bln']).'-'.htmlentities($_GET['thn']);
                        $no=1; 
                        $jumlah = 0;
                        $bayar = 0;
                        $hasil = $lihat -> periode_jual($periode);
                    }elseif(!empty(htmlentities($_GET['hari']))){
                        $hari = htmlentities($_GET['tgl']);
                        $no=1; 
                        $jumlah = 0;
                        $bayar = 0;
                        $hasil = $lihat -> hari_jual($hari);
                    }else{
                        $hasil = $lihat -> hari_jual(date('Y-m-d'));
                    }
                ?>
                <?php 
                    $bayar = 0;
                    $jumlah = 0;
                    $modal = 0;
                    foreach($hasil as $isi){ 
                        $bayar += $isi['total'] + $isi['pajak'];
                        $modal += $isi['harga_beli'] * $isi['jumlah'];
                        $ppn += $isi['pajak'];
                        $jumlah += $isi['jumlah'];
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['id_barang'];?></td>
                    <td><?php echo $isi['nama_barang'];?></td>
                    <td><?php echo $isi['satuan_barang'];?> </td>
                    <td><?php echo $isi['jumlah'];?> </td>
                    <td>Rp.<?php echo number_format($isi['harga_beli']* $isi['jumlah']);?>,-</td>
                    <td>Rp.<?php echo number_format($isi['total'] + $isi['pajak']);?>,-</td>
					<td>Rp.<?php echo number_format($isi['pajak']);?>,-</td>
                    <td><?php echo $isi['nm_member'];?></td>
                    <td><?php echo $isi['tanggal_input'];?></td>
                </tr>
                <?php $no++; }?>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><b>Total Terjual</b></td>
                    <td><b><?php echo $jumlah;?></b></td>
                    <td><b>Rp.<?php echo number_format($modal);?>,-</b></td>
                    <td><b>Rp.<?php echo number_format($bayar);?>,-</b></td>
                    <td><b>Rp.<?php echo number_format($ppn);?>,-</b></td>
                    <td><b>Keuntungan</b></td>
                    <td><b>
                        Rp.<?php echo number_format($bayar-$modal-$ppn);?>,-</b></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
