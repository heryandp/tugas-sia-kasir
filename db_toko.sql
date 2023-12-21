-- Database export via SQLPro (https://www.sqlprostudio.com/allapps.html)
-- Exported by heryan at 19-12-2023 15:35.
-- WARNING: This file may contain descructive statements such as DROPs.
-- Please ensure that you are running the script at the proper location.


-- BEGIN TABLE barang
DROP TABLE IF EXISTS barang;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Table barang contains no data. No inserts have been genrated.
-- Inserting 0 rows into barang


-- END TABLE barang

-- BEGIN TABLE kategori
DROP TABLE IF EXISTS kategori;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(30) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Inserting 5 rows into kategori
-- Insert batch #1
INSERT INTO kategori (id_kategori, kode_kategori, nama_kategori, tgl_input) VALUES
(1, 'ATK', 'ATK', '7 May 2017, 10:23'),
(7, 'MIN', 'Minuman', '6 October 2020, 0:20'),
(8, 'VOC', 'Voucher', '19 December 2023, 9:55'),
(9, 'PLS', 'Pulsa', '19 December 2023, 10:09'),
(10, 'MKN', 'Makanan', '19 December 2023, 14:41');

-- END TABLE kategori

-- BEGIN TABLE login
DROP TABLE IF EXISTS login;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Inserting 1 row into login
-- Insert batch #1
INSERT INTO login (id_login, user, pass, id_member) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- END TABLE login

-- BEGIN TABLE member
DROP TABLE IF EXISTS member;
CREATE TABLE `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Inserting 1 row into member
-- Insert batch #1
INSERT INTO member (id_member, nm_member, alamat_member, telepon, email, gambar, NIK) VALUES
(1, 'Dian Islamiati', 'Radio Dalam', '081234567890', 'example@gmail.com', '1702971785cara-mengambil-foto-profesional-5.jpg', '12314121');

-- END TABLE member

-- BEGIN TABLE nota
DROP TABLE IF EXISTS nota;
CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `pajak` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table nota contains no data. No inserts have been genrated.
-- Inserting 0 rows into nota


-- END TABLE nota

-- BEGIN TABLE penjualan
DROP TABLE IF EXISTS penjualan;
CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `pajak` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table penjualan contains no data. No inserts have been genrated.
-- Inserting 0 rows into penjualan


-- END TABLE penjualan

-- BEGIN TABLE toko
DROP TABLE IF EXISTS toko;
CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  PRIMARY KEY (`id_toko`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Inserting 1 row into toko
-- Insert batch #1
INSERT INTO toko (id_toko, nama_toko, alamat_toko, tlp, nama_pemilik) VALUES
(1, 'CV Daruttaqwa', 'Radio Dalam', '081234567890', 'Hisyam Kazim');

-- END TABLE toko

