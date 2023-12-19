-- Database export via SQLPro (https://www.sqlprostudio.com/allapps.html)
-- Exported by heryan at 19-12-2023 11:46.
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Inserting 3 rows into barang
-- Insert batch #1
INSERT INTO barang (id, id_barang, id_kategori, nama_barang, merk, harga_beli, harga_jual, satuan_barang, stok, tgl_input, tgl_update) VALUES
(1, 'ATK1', 1, 'Pulpen', 'Standar', '1500', '1700', 'PCS', '55', '19 December 2023, 11:39', NULL),
(2, 'ATK2', 1, 'Pensil', 'Faber Castell', '1600', '1700', 'PCS', '88', '19 December 2023, 11:39', NULL),
(4, 'VOC3', 8, 'Diamond 50', 'Mobile Legend', '100000', '105000', 'PCS', '55', '19 December 2023, 11:41', NULL);

-- END TABLE barang

-- BEGIN TABLE kategori
DROP TABLE IF EXISTS kategori;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(30) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Inserting 6 rows into kategori
-- Insert batch #1
INSERT INTO kategori (id_kategori, kode_kategori, nama_kategori, tgl_input) VALUES
(1, 'ATK', 'ATK', '7 May 2017, 10:23'),
(5, 'SA', 'Sabun', '7 May 2017, 10:28'),
(6, 'SN', 'Snack', '6 October 2020, 0:19'),
(7, 'MIN', 'Minuman', '6 October 2020, 0:20'),
(8, 'VOC', 'Voucher', '19 December 2023, 9:55'),
(9, 'PLS', 'Pulsa', '19 December 2023, 10:09');

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
(1, 'Fauzan Falah', 'uj harapan', '081234567890', 'example@gmail.com', 'unnamed.jpg', '12314121');

-- END TABLE member

-- BEGIN TABLE nota
DROP TABLE IF EXISTS nota;
CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Inserting 6 rows into nota
-- Insert batch #1
INSERT INTO nota (id_nota, id_barang, id_member, jumlah, total, tanggal_input, periode) VALUES
(1, 'BR002', 1, '5', '15000', '19 December 2023, 9:07', '12-2023'),
(2, 'BR002', 1, '5', '15000', '19 December 2023, 9:07', '12-2023'),
(3, 'BR002', 1, '6', '18000', '19 December 2023, 9:51', '12-2023'),
(4, 'BR002', 1, '6', '18000', '19 December 2023, 9:51', '12-2023'),
(5, 'BR002', 1, '6', '18000', '19 December 2023, 9:51', '12-2023'),
(6, 'BR002', 1, '6', '18000', '19 December 2023, 9:51', '12-2023');

-- END TABLE nota

-- BEGIN TABLE penjualan
DROP TABLE IF EXISTS penjualan;
CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
(1, 'CV Daruttaqwa', 'Ujung Harapan', '081234567890', 'Fauzan Falah');

-- END TABLE toko

