<?php

session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config.php';
    if (!empty($_GET['kategori'])) {
        $kd= htmlentities(htmlentities($_POST['kdkategori']));
        $nama= htmlentities(htmlentities($_POST['kategori']));
        $tgl= date("j F Y, G:i");
        $data[] = $kd;
        $data[] = $nama;
        $data[] = $tgl;
        $sql = 'INSERT INTO kategori (kode_kategori,nama_kategori,tgl_input) VALUES (?,?,?)';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
    }

    if (!empty($_GET['barang'])) {
        // $id = htmlentities($_POST['id']);
        $kategori = htmlentities($_POST['kategori']);
        $nama = htmlentities($_POST['nama']);
        $merk = htmlentities($_POST['merk']);
        $beli = htmlentities($_POST['beli']);
        $jual = htmlentities($_POST['jual']);
        $satuan = htmlentities($_POST['satuan']);
        $stok = htmlentities($_POST['stok']);
        $tgl = htmlentities($_POST['tgl']);

        // get kode kategori untuk penamaan id barang
        $sql = 'SELECT kode_kategori FROM kategori WHERE id_kategori='.$kategori;
        $row = $config -> prepare($sql);
        $row -> execute();
        $resultkd = $row->fetchAll(PDO::FETCH_ASSOC);

        // cek table barang kosong/tidak
        $sql = 'SELECT COUNT(*) FROM barang';
        $row = $config -> prepare($sql);
        $row -> execute();
        $count = $row->fetchColumn();

        if ($count == 0) {
            $sql = 'ALTER TABLE barang AUTO_INCREMENT = 0';
            $row = $config -> prepare($sql);
            $row -> execute();
            $id = 1;
        } else {
             // buat penomoran untuk id barang
            $sql = 'SELECT id FROM barang ORDER BY ID DESC LIMIT 1';
            $row = $config -> prepare($sql);
            $row -> execute();
            $resultid = $row->fetch(PDO::FETCH_ASSOC);
            $id = $resultid['id']+1;
        }

        
        $data[] = $resultkd[0]['kode_kategori'].$id;
        $data[] = $kategori;
        $data[] = $nama;
        $data[] = $merk;
        $data[] = $beli;
        $data[] = $jual;
        $data[] = $satuan;
        $data[] = $stok;
        $data[] = $tgl;
        $sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
    }
    
    if (!empty($_GET['jual'])) {
        $id = $_GET['id'];

        // get tabel barang id_barang
        $sql = 'SELECT * FROM barang WHERE id_barang = ?';
        $row = $config->prepare($sql);
        $row->execute(array($id));
        $hsl = $row->fetch();

        if ($hsl['stok'] > 0) {
            $kasir =  $_GET['id_kasir'];
            $jumlah = 1;
            $total = $hsl['harga_jual'];
            $tgl = date("j F Y, G:i");

            $data1[] = $id;
            $data1[] = $kasir;
            $data1[] = $jumlah;
            $data1[] = $total;
            $data1[] = $tgl;

            $sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
            $row1 = $config -> prepare($sql1);
            $row1 -> execute($data1);

            echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
        } else {
            echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
        }
    }
}
