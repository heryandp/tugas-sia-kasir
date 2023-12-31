<?php
session_start();

// fungsi untuk upload foto produk
function uploadPhoto($file, $jenis)
{
    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/'.$jenis.'/';

    // Generate a unique filename using timestamp and original extension
    $timestamp = time();  // Get current timestamp
    $originalFilename = basename($file['name']);
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    $newFilename = $timestamp . rand(1,99) . '.' . $extension;
    $targetFile = $targetDirectory . $newFilename;

    // Check if file is an image
    $imageFileType = strtolower($extension);  // Already lowercase from pathinfo

    // Allow only certain file formats
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        return false;
    }

    // Move the file to the target directory
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $newFilename;
    } else {
        echo 'Sorry, there was an error uploading your file.';
        return false;
    }
}

if (!empty($_SESSION['admin'])) {
    require '../../config.php';
    if (!empty($_GET['user'])) {
        $nama = htmlentities($_POST['nama']);
        $alamat = htmlentities($_POST['alamat']);
        $tlp = htmlentities($_POST['telepon']);
        $email = htmlentities($_POST['email']);
        $nik = htmlentities($_POST['nik']);
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $role = htmlentities($_POST['role']);

        //Upload foto
        $foto = uploadPhoto($_FILES['foto'], 'user');

        $sql = 'SELECT COUNT(user) FROM login WHERE user = "'.$username.'"';
        $row = $config -> prepare($sql);
        $row -> execute();
        $count = $row->fetchColumn();

        if($count == 0 && $foto != false){

        $sql = 'SELECT id_member FROM member ORDER BY id_member DESC LIMIT 1';
        $row = $config -> prepare($sql);
        $row -> execute();
        $resultid = $row->fetch(PDO::FETCH_ASSOC);
        $id = $resultid['id_member']+1;


        $data[] = intval($id);
        $data[] = $nama;
        $data[] = $alamat;
        $data[] = $tlp;
        $data[] = $email;
        $data[] = $foto;
        $data[] = $nik;

        $sql = 'INSERT INTO member (id_member, nm_member, alamat_member, telepon, email, gambar, nik) VALUES (?,?,?,?,?,?,?)';
        $row = $config->prepare($sql);   
        $row->execute($data);

        $data_login[] = $username;
        $data_login[] = $password;
        $data_login[] = $password;
        $data_login[] = $id;
        $data_login[] = $role;

        $sql = 'INSERT INTO login (user, pass, default_pass, id_member, id_role) VALUES (?,md5(?),md5(?),?,?)';
        $row = $config->prepare($sql);    
        $row->execute($data_login);

        echo '<script>window.location="../../index.php?page=user&success=tambah"</script>';
        } else{
            echo '<script>window.location="../../index.php?page=user&gagal=tambah"</script>';

        }
    }

    if (!empty($_GET['kategori'])) {
        $kd= htmlentities(htmlentities($_POST['kdkategori']));
        $nama= htmlentities(htmlentities($_POST['kategori']));
        $tgl= date("j F Y, G:i");
        $data[] = $kd;
        $data[] = $nama;
        $data[] = $tgl;

        //Cek apakah kode sudah terpakai
        $sql = "SELECT COUNT(*) FROM kategori WHERE kode_kategori = '".$kd."'";
        $row = $config -> prepare($sql);
        $row -> execute();
        $count = $row->fetchColumn();
        
        if ($count == 0){
            $sql = 'INSERT INTO kategori (kode_kategori,nama_kategori,tgl_input) VALUES (?,?,?)';
            $row = $config -> prepare($sql);
            $row -> execute($data);
            echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
        } else {
            echo '<script>window.location="../../index.php?page=kategori&&gagal=tambah-data"; alert("Kode sudah terpakai !");</script>';
        }
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
        $foto = htmlentities($_FILES['foto']['name']);

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

        $foto = uploadPhoto($_FILES['foto'], 'produk');

        $data[] = $resultkd[0]['kode_kategori'].$id;
        $data[] = $kategori;
        $data[] = $nama;
        $data[] = $merk;
        $data[] = $beli;
        $data[] = $jual;
        $data[] = $satuan;
        $data[] = $stok;
        $data[] = $foto;
        $data[] = $tgl;

        if($foto != false){
            $sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,foto,tgl_input) 
                    VALUES (?,?,?,?,?,?,?,?,?,?) ';
            $row = $config -> prepare($sql);
            $row -> execute($data);

            echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
        }else{
            echo '<script>window.location="../../index.php?page=barang&gagal=tambah-data"</script>';
        }
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
            $data1[] = $total*0.1;
            $data1[] = $tgl;

            $sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,pajak,tanggal_input) VALUES (?,?,?,?,?,?)';
            $row1 = $config -> prepare($sql1);
            $row1 -> execute($data1);

            echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
        } else {
            echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
        }
    }
}
