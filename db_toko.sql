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
  `foto` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Inserting 5 rows into kategori
-- Insert batch #1
INSERT INTO kategori (id_kategori, kode_kategori, nama_kategori, tgl_input) VALUES
(1, 'ATK', 'ATK', '7 May 2017, 10:23'),
(7, 'MIN', 'Minuman', '6 October 2020, 0:20'),
(8, 'VOC', 'Voucher', '19 December 2023, 9:55'),
(9, 'PLS', 'Pulsa', '19 December 2023, 10:09'),
(10, 'MKN', 'Makanan', '19 December 2023, 14:41');

-- END TABLE kategori

-- BEGIN TABLE ref_role
DROP TABLE IF EXISTS ref_role;
CREATE TABLE `ref_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Inserting 2 rows into ref_role
-- Insert batch #1
INSERT INTO ref_role (id_role, nama_role) VALUES
(1, 'Administrator'),
(2, 'Kasir');

-- END TABLE ref_role

-- BEGIN TABLE login
DROP TABLE IF EXISTS login;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `default_pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `fg_aktif` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Inserting 3 rows into login
-- Insert batch #1
INSERT INTO login (id_login, user, pass, default_pass, id_member, id_role, fg_aktif) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(2, 'kasir1', '250cf8b51c773f3f8dc8b4be867a9a02', '250cf8b51c773f3f8dc8b4be867a9a02', 2, 2, 1),
(3, 'kasir2', '68053af2923e00204c3ca7c6a3150cf7', '68053af2923e00204c3ca7c6a3150cf7', 3, 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Inserting 1 row into member
-- Insert batch #1
INSERT INTO member (id_member, nm_member, alamat_member, telepon, email, gambar, NIK) VALUES
(1, 'Dian Islamiati', 'Radio Dalam', '081234567890', 'example@gmail.com', '1702971785cara-mengambil-foto-profesional-5.jpg', '12314121'),
(2, 'Hisyam Kazim', 'Matraman', '0813456789', 'hisyam@stmik.ac.id', 'close-up-portrait-attractive-male-model-color-flash-light_158595-5112.jpg', '456789'),
(3, 'Heryan Dwiyoga Putra', 'Grogol', '0813456774', 'heryan@stmik.ac.id', 'caucasian-woman-s-portrait-isolated-gradient-space-neon-light-beautiful-male-model-with-hipster-style_155003-27199.jpg', '456999');

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
(1, 'CV Daruttaqwa', 'Radio Dalam', '081234567890', 'Dian Islamiati');

-- END TABLE toko

