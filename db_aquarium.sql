-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2023 pada 07.48
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aquarium`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_beli_produk`
--

CREATE TABLE `detail_beli_produk` (
  `id_detail_produk` int(11) NOT NULL,
  `id_pelanggan` varchar(30) NOT NULL,
  `id_custom` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_beli_produk`
--

INSERT INTO `detail_beli_produk` (`id_detail_produk`, `id_pelanggan`, `id_custom`, `id_produk`, `jumlah`, `tanggal`) VALUES
(109, 'laodri', 10, 0, 1, '2023-01-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jual`
--

CREATE TABLE `detail_jual` (
  `no_transaksi` varchar(20) NOT NULL,
  `id_pelanggan` varchar(30) NOT NULL,
  `data_produk` text NOT NULL,
  `status_bayar` int(1) NOT NULL COMMENT '0 = belum lunas, 1 = lunas',
  `bukti_tf` varchar(100) NOT NULL,
  `tanggal_order` date DEFAULT NULL,
  `no_resi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_jual`
--

INSERT INTO `detail_jual` (`no_transaksi`, `id_pelanggan`, `data_produk`, `status_bayar`, `bukti_tf`, `tanggal_order`, `no_resi`) VALUES
('AQ1674930656', 'ani', '{\"almt\":{\"id_pelanggan\":\"ani\",\"nama_pelanggan\":\"ani sa\",\"images\":\"1674930487_.jpg\",\"desa\":\"kudsua\",\"kodepos\":\"888\",\"rt\":\"9\",\"rw\":\"70\",\"kecamatan\":\"mergia\",\"kabupaten\":\"Blora\",\"no_hp\":\"8921333333333\",\"email\":\"sia@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"76\",\"lokasi_tujuan\":\"Blora\",\"jarak\":\"0\",\"jenis\":\"Jasa Toko\",\"biaya\":\"75000\"},\"keranjang\":[{\"id_detail_produk\":\"101\",\"id_pelanggan\":\"ani\",\"id_custom\":\"0\",\"id_produk\":\"5\",\"jumlah\":\"1\",\"tanggal\":\"2023-01-29\",\"nama_produk\":\"New Giga aquarium\",\"jenis_pro\":\"Aquarium besar\",\"diskripsi\":\"panjang 3meter, lebar 50 cm, tinggi 80cm\",\"harga_belipro\":\"2000000\",\"harga_jualpro\":\"2500000\",\"berat\":\"300000\",\"images\":\"1318245805_images (2).jpg\",\"jml_stok\":\"4\"}],\"custom\":[{\"id_detail_produk\":\"100\",\"id_pelanggan\":\"ani\",\"id_custom\":\"4\",\"id_produk\":\"0\",\"jumlah\":\"1\",\"tanggal\":\"2023-01-28\",\"panjang\":\"10\",\"lebar\":\"10\",\"tinggi\":\"10\",\"ketebalan_kaca\":\"0\",\"harga_satuan\":\"15\",\"keterangan\":\"sasa\"}],\"berat\":300250,\"total_bayar\":2590000}', 1, 'data_95_download-gambar-ruang-kelas-12.jpg', '2023-01-29', ''),
('AQ1675016899', 'riza', '{\"almt\":{\"id_pelanggan\":\"riza\",\"nama_pelanggan\":\"Chalim Riza\",\"images\":\"\",\"desa\":\"ploso\",\"kodepos\":\"59313\",\"rt\":\"3\",\"rw\":\"3\",\"kecamatan\":\"Jati\",\"kabupaten\":\"Kudus\",\"no_hp\":\"089713888646\",\"email\":\"chalimriza@gmail.com\"},\"ongkir\":{\"id_ongkos\":6,\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"pos\",\"biaya\":\"20000\"},\"keranjang\":[],\"custom\":[{\"id_detail_produk\":\"102\",\"id_pelanggan\":\"riza\",\"id_custom\":\"5\",\"id_produk\":\"0\",\"jumlah\":\"2\",\"tanggal\":\"2023-01-30\",\"panjang\":\"20\",\"lebar\":\"10\",\"tinggi\":\"15\",\"ketebalan_kaca\":\"0\",\"harga_satuan\":\"15\",\"keterangan\":\"aquarium polosan\"}],\"berat\":1500,\"total_bayar\":110000}', 1, 'DNvcjOIVAAALwCT2.jpg', '2023-01-30', 'JD012356433442'),
('AQ1675150482', 'gandi', '{\"almt\":{\"id_pelanggan\":\"gandi\",\"nama_pelanggan\":\"Gandi Setya\",\"images\":\"\",\"desa\":\"Robayan\",\"kodepos\":\"53462\",\"rt\":\"3\",\"rw\":\"2\",\"kecamatan\":\"Kalinyamatan\",\"kabupaten\":\"Jepara\",\"no_hp\":\"089644213321\",\"email\":\"gandisetya3@gmail.com\"},\"ongkir\":{\"id_ongkos\":6,\"lokasi_tujuan\":\"Jepara\",\"jarak\":\"0\",\"jenis\":\"jne\",\"biaya\":\"11000\"},\"keranjang\":[{\"id_detail_produk\":\"104\",\"id_pelanggan\":\"gandi\",\"id_custom\":\"0\",\"id_produk\":\"6\",\"jumlah\":\"1\",\"tanggal\":\"2023-01-31\",\"nama_produk\":\"Mini Aquarium\",\"jenis_pro\":\"Aquarium kecil\",\"diskripsi\":\"panjang 10 cm , lebar 10cm, tinggi 10 cm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"15000\",\"berat\":\"250\",\"images\":\"2127844497_images.jpg\",\"jml_stok\":\"18\"},{\"id_detail_produk\":\"103\",\"id_pelanggan\":\"gandi\",\"id_custom\":\"0\",\"id_produk\":\"14\",\"jumlah\":\"1\",\"tanggal\":\"2023-01-31\",\"nama_produk\":\"Lampu Led Aquarium Soliter Mini\",\"jenis_pro\":\"Lampu Aquarium Mini\",\"diskripsi\":\"Lampu led usb soliter cupang\\r\\n\\r\\nWarna lampu putih\\r\\nType lampu :\\r\\n- 4 mata lampu smd 2835\\r\\n- 8 mata lampu smd 2835\\r\\nPanjang 8cm\\r\\nTinggi 7 cm\\r\\nLebar 2,5\",\"harga_belipro\":\"7500\",\"harga_jualpro\":\"15000\",\"berat\":\"100\",\"images\":\"534428834_WhatsApp Image 2023-01-31 at 14.08.04.jpeg\",\"jml_stok\":\"24\"}],\"custom\":[],\"berat\":350,\"total_bayar\":41000}', 1, 'DNvcjOIVAAALwCT3.jpg', '2023-01-31', 'JDAFG1452FF33D'),
('AQ1675154008', 'laodri', '{\"almt\":{\"id_pelanggan\":\"laodri\",\"nama_pelanggan\":\"Laodri Akbar\",\"images\":\"\",\"desa\":\"Purwosari\",\"kodepos\":\"59311\",\"rt\":\"2\",\"rw\":\"3\",\"kecamatan\":\"Kota\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085641444621\",\"email\":\"laodriakbar30@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[],\"custom\":[{\"id_detail_produk\":\"105\",\"id_pelanggan\":\"laodri\",\"id_custom\":\"6\",\"id_produk\":\"0\",\"jumlah\":\"2\",\"tanggal\":\"2023-01-31\",\"panjang\":\"30\",\"lebar\":\"10\",\"tinggi\":\"15\",\"ketebalan_kaca\":\"0\",\"harga_satuan\":\"15\",\"keterangan\":\"\"}],\"berat\":2250,\"total_bayar\":165000}', 1, 'DNvcjOIVAAALwCT4.jpg', '2023-01-31', ''),
('AQ1675155917', 'laodri', '{\"almt\":{\"id_pelanggan\":\"laodri\",\"nama_pelanggan\":\"Laodri Akbar\",\"images\":\"\",\"desa\":\"Purwosari\",\"kodepos\":\"59311\",\"rt\":\"2\",\"rw\":\"3\",\"kecamatan\":\"Kota\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085641444621\",\"email\":\"laodriakbar30@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[],\"custom\":[{\"id_detail_produk\":\"106\",\"id_pelanggan\":\"laodri\",\"id_custom\":\"7\",\"id_produk\":\"0\",\"jumlah\":\"1\",\"tanggal\":\"2023-01-31\",\"panjang\":\"27\",\"lebar\":\"14\",\"tinggi\":\"10\",\"ketebalan_kaca\":\"0\",\"harga_satuan\":\"15\",\"keterangan\":\"-\"}],\"berat\":945,\"total_bayar\":86700}', 0, 'DNvcjOIVAAALwCT5.jpg', '2023-01-31', ''),
('AQ1676279987', 'riza', '{\"almt\":{\"id_pelanggan\":\"riza\",\"nama_pelanggan\":\"Chalim Riza\",\"images\":\"\",\"desa\":\"ploso\",\"kodepos\":\"59313\",\"rt\":\"3\",\"rw\":\"3\",\"kecamatan\":\"Jati\",\"kabupaten\":\"Kudus\",\"no_hp\":\"089713888646\",\"email\":\"chalimriza@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"117\",\"id_pelanggan\":\"riza\",\"id_custom\":\"0\",\"id_produk\":\"4\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-13\",\"nama_produk\":\"Aquarium biasa\",\"jenis_pro\":\"umum\",\"diskripsi\":\"panjang 30 cm lebar 10 tinggi 30cm \",\"harga_belipro\":\"0\",\"harga_jualpro\":\"120000\",\"berat\":\"2250\",\"images\":\"1757697370_WhatsApp Image 2023-01-30 at 02.44.26.jpeg\",\"jml_stok\":\"13\"}],\"custom\":[],\"berat\":2250,\"total_bayar\":150000}', 1, 'E932D01D-D135-4B89-A7E3-D683C15D247E.png', '2023-02-13', ''),
('AQ1676281729', 'dimas', '{\"almt\":{\"id_pelanggan\":\"dimas\",\"nama_pelanggan\":\"Dimas MCS\",\"images\":\"\",\"desa\":\"Temulus\",\"kodepos\":\"59310\",\"rt\":\"2\",\"rw\":\"4\",\"kecamatan\":\"Mejobo\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085643333812\",\"email\":\"dimasmcs@gmail.com\"},\"ongkir\":{\"id_ongkos\":6,\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"tiki\",\"biaya\":null},\"keranjang\":[{\"id_detail_produk\":\"118\",\"id_pelanggan\":\"dimas\",\"id_custom\":\"0\",\"id_produk\":\"5\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-13\",\"nama_produk\":\"New Giga aquarium\",\"jenis_pro\":\"Aquarium besar\",\"diskripsi\":\"panjang 3meter, lebar 50 cm, tinggi 80cm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"2500000\",\"berat\":\"300000\",\"images\":\"1318245805_images (2).jpg\",\"jml_stok\":\"3\"}],\"custom\":[],\"berat\":300000,\"total_bayar\":2500000}', 1, '491CE4A0-AFC5-4B1F-86C1-1AFB5BB5747F.png', '2023-02-13', '1312167653388'),
('AQ1676282386', 'dimas', '{\"almt\":{\"id_pelanggan\":\"dimas\",\"nama_pelanggan\":\"Dimas MCS\",\"images\":\"\",\"desa\":\"Temulus\",\"kodepos\":\"59310\",\"rt\":\"2\",\"rw\":\"4\",\"kecamatan\":\"Mejobo\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085643333812\",\"email\":\"dimasmcs@gmail.com\"},\"ongkir\":{\"id_ongkos\":6,\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"pos\",\"biaya\":\"10000\"},\"keranjang\":[{\"id_detail_produk\":\"119\",\"id_pelanggan\":\"dimas\",\"id_custom\":\"0\",\"id_produk\":\"6\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-13\",\"nama_produk\":\"Mini Aquarium\",\"jenis_pro\":\"Aquarium kecil\",\"diskripsi\":\"panjang 10 cm , lebar 10cm, tinggi 10 cm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"15000\",\"berat\":\"250\",\"images\":\"2127844497_images.jpg\",\"jml_stok\":\"17\"}],\"custom\":[],\"berat\":250,\"total_bayar\":25000}', 1, 'FB008DE4-BBDF-4907-AC2D-3BA7D7DC05A9.png', '2023-02-13', '1324441555145'),
('AQ1676300410', 'egy', '{\"almt\":{\"id_pelanggan\":\"egy\",\"nama_pelanggan\":\"Agusti Egy\",\"images\":\"\",\"desa\":\"brantak\",\"kodepos\":\"59320\",\"rt\":\"4\",\"rw\":\"4\",\"kecamatan\":\"Kalinyamat\",\"kabupaten\":\"Jepara\",\"no_hp\":\"089888098765\",\"email\":\"agustiegy122@gmail.com\"},\"ongkir\":{\"id_ongkos\":6,\"lokasi_tujuan\":\"Jepara\",\"jarak\":\"0\",\"jenis\":\"tiki\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"120\",\"id_pelanggan\":\"egy\",\"id_custom\":\"0\",\"id_produk\":\"4\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-13\",\"nama_produk\":\"Aquarium biasa\",\"jenis_pro\":\"umum\",\"diskripsi\":\"panjang 30 cm lebar 10 tinggi 30cm \",\"harga_belipro\":\"0\",\"harga_jualpro\":\"120000\",\"berat\":\"2250\",\"images\":\"1757697370_WhatsApp Image 2023-01-30 at 02.44.26.jpeg\",\"jml_stok\":\"12\"},{\"id_detail_produk\":\"121\",\"id_pelanggan\":\"egy\",\"id_custom\":\"0\",\"id_produk\":\"11\",\"jumlah\":\"2\",\"tanggal\":\"2023-02-13\",\"nama_produk\":\"Akuarium Sekat Soliter\",\"jenis_pro\":\"Aquarium Soliter Cupang\",\"diskripsi\":\"Akuarium Sekat Soliter untuk ikan cupang 15x10x15 cm\\r\\n4 ruang double sekat Kaca polos bening Ketebalan kaca 3mm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"115000\",\"berat\":\"1150\",\"images\":\"1854396832_WhatsApp Image 2023-01-30 at 02.31.20.jpeg\",\"jml_stok\":\"8\"}],\"custom\":[],\"berat\":4550,\"total_bayar\":400000}', 1, 'DNvcjOIVAAALwCT2.jpg', '2023-02-13', 'A123314455524'),
('AQ1676300514', 'egy', '{\"almt\":{\"id_pelanggan\":\"egy\",\"nama_pelanggan\":\"Agusti Egy\",\"images\":\"\",\"desa\":\"brantak\",\"kodepos\":\"59320\",\"rt\":\"4\",\"rw\":\"4\",\"kecamatan\":\"Kalinyamat\",\"kabupaten\":\"Jepara\",\"no_hp\":\"089888098765\",\"email\":\"agustiegy122@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"163\",\"lokasi_tujuan\":\"Jepara\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[],\"custom\":[{\"id_detail_produk\":\"122\",\"id_pelanggan\":\"egy\",\"id_custom\":\"17\",\"id_produk\":\"0\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-13\",\"panjang\":\"120\",\"lebar\":\"40\",\"tinggi\":\"30\",\"ketebalan_kaca\":\"3\",\"harga_satuan\":\"5\",\"keterangan\":\"hanya aquarium\"}],\"berat\":36000,\"total_bayar\":770000}', 1, 'DNvcjOIVAAALwCT3.jpg', '2023-02-13', ''),
('AQ1676316738', 'ani', '{\"almt\":{\"id_pelanggan\":\"ani\",\"nama_pelanggan\":\"ani sa\",\"images\":\"1674930487_.jpg\",\"desa\":\"kudsua\",\"kodepos\":\"888\",\"rt\":\"9\",\"rw\":\"70\",\"kecamatan\":\"mergia\",\"kabupaten\":\"Blora\",\"no_hp\":\"8921333333333\",\"email\":\"sia@gmail.com\"},\"ongkir\":{\"id_ongkos\":6,\"lokasi_tujuan\":\"Blora\",\"jarak\":\"0\",\"jenis\":\"tiki\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"114\",\"id_pelanggan\":\"ani\",\"id_custom\":\"0\",\"id_produk\":\"4\",\"jumlah\":\"1\",\"tanggal\":\"2023-01-31\",\"nama_produk\":\"Aquarium biasa\",\"jenis_pro\":\"umum\",\"diskripsi\":\"panjang 30 cm lebar 10 tinggi 30cm \",\"harga_belipro\":\"0\",\"harga_jualpro\":\"120000\",\"berat\":\"2250\",\"images\":\"1757697370_WhatsApp Image 2023-01-30 at 02.44.26.jpeg\",\"jml_stok\":\"12\"}],\"custom\":[{\"id_detail_produk\":\"113\",\"id_pelanggan\":\"ani\",\"id_custom\":\"14\",\"id_produk\":\"0\",\"jumlah\":\"2\",\"tanggal\":\"2023-01-31\",\"panjang\":\"10\",\"lebar\":\"20\",\"tinggi\":\"20\",\"ketebalan_kaca\":\"3\",\"harga_satuan\":\"5\",\"keterangan\":\"ewew\"},{\"id_detail_produk\":\"115\",\"id_pelanggan\":\"ani\",\"id_custom\":\"15\",\"id_produk\":\"0\",\"jumlah\":\"2\",\"tanggal\":\"2023-01-31\",\"panjang\":\"10\",\"lebar\":\"10\",\"tinggi\":\"10\",\"ketebalan_kaca\":\"5\",\"harga_satuan\":\"7\",\"keterangan\":\"qs\"},{\"id_detail_produk\":\"123\",\"id_pelanggan\":\"ani\",\"id_custom\":\"18\",\"id_produk\":\"0\",\"jumlah\":\"2\",\"tanggal\":\"2023-02-14\",\"panjang\":\"1\",\"lebar\":\"2\",\"tinggi\":\"2\",\"ketebalan_kaca\":\"1\",\"harga_satuan\":\"3\",\"keterangan\":\"swws\"}],\"berat\":4752,\"total_bayar\":204024}', 1, 'rumputlaut.JPG', '2023-02-14', 'A123314455556'),
('AQ1676376607', 'Gandos1111', '{\"almt\":{\"id_pelanggan\":\"Gandos1111\",\"nama_pelanggan\":\"Gandos\",\"images\":\"\",\"desa\":\"Getas Pejaten\",\"kodepos\":\"9002\",\"rt\":\"05\",\"rw\":\"01\",\"kecamatan\":\"Kota Kudus\",\"kabupaten\":\"Kudus\",\"no_hp\":\"089671799613\",\"email\":\"gandhi.gandos@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"126\",\"id_pelanggan\":\"Gandos1111\",\"id_custom\":\"0\",\"id_produk\":\"40\",\"jumlah\":\"5\",\"tanggal\":\"2023-02-14\",\"nama_produk\":\"Aquarium Laut 60*40*40cm Filter Belakang\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium Laut 70*40*40cm Filter Belakang\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"350000\",\"berat\":\"2000\",\"images\":\"1322059612_WhatsApp Image 2023-02-14 at 14.40.48 (2).jpeg\",\"jml_stok\":\"9\"},{\"id_detail_produk\":\"125\",\"id_pelanggan\":\"Gandos1111\",\"id_custom\":\"0\",\"id_produk\":\"41\",\"jumlah\":\"5\",\"tanggal\":\"2023-02-14\",\"nama_produk\":\"Aquarium ukuran 40*20*25cm background karang\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium Ukuran 40*20*25cm Background Karang\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"81000\",\"berat\":\"1600\",\"images\":\"234536487_WhatsApp Image 2023-02-14 at 14.40.45 (1).jpeg\",\"jml_stok\":\"13\"},{\"id_detail_produk\":\"124\",\"id_pelanggan\":\"Gandos1111\",\"id_custom\":\"0\",\"id_produk\":\"44\",\"jumlah\":\"5\",\"tanggal\":\"2023-02-14\",\"nama_produk\":\"Aquarium Ukuran 100*50*50cm Filter Samping\",\"jenis_pro\":\"Aquarium Besar\",\"diskripsi\":\"Aquarium Ukuran 100*50*50cm Filter Samping Kaca 7mm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"1250000\",\"berat\":\"6500\",\"images\":\"1556083890_WhatsApp Image 2023-02-14 at 16.16.50.jpeg\",\"jml_stok\":\"0\"}],\"custom\":[],\"berat\":50500,\"total_bayar\":8435000}', 1, 'Screenshot_2023-02-07-23-09-25-167_com_mobile_legends.jpg', '2023-02-14', ''),
('AQ1676377809', 'fery', '{\"almt\":{\"id_pelanggan\":\"fery\",\"nama_pelanggan\":\"Fery Romadhona\",\"images\":\"\",\"desa\":\"Mlatilor\",\"kodepos\":\"59312\",\"rt\":\"3\",\"rw\":\"4\",\"kecamatan\":\"Kota\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085800380312\",\"email\":\"feryromadhona@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"128\",\"id_pelanggan\":\"fery\",\"id_custom\":\"0\",\"id_produk\":\"24\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-14\",\"nama_produk\":\"Aquarium ukuran 60*40*40cm\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium persegi biasa tanpa gambar dan acc hanya aquarium dengan ukuran 60*40*40cm ketebalan kaca 3mm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"185000\",\"berat\":\"1950\",\"images\":\"1405877072_43C64EAE-A62E-46E8-929C-52AAB2D7E4C1.jpeg\",\"jml_stok\":\"11\"}],\"custom\":[],\"berat\":1950,\"total_bayar\":215000}', 1, 'B6CA0F1C-F5BF-4500-8A7B-3E520262B783.png', '2023-02-14', ''),
('AQ1676386039', 'Gandos1111', '{\"almt\":{\"id_pelanggan\":\"Gandos1111\",\"nama_pelanggan\":\"Gandos\",\"images\":\"\",\"desa\":\"Getas Pejaten\",\"kodepos\":\"9002\",\"rt\":\"05\",\"rw\":\"01\",\"kecamatan\":\"Kota Kudus\",\"kabupaten\":\"Kudus\",\"no_hp\":\"089671799613\",\"email\":\"gandhi.gandos@gmail.com\"},\"ongkir\":{\"id_ongkos\":6,\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"tiki\",\"biaya\":\"6000\"},\"keranjang\":[{\"id_detail_produk\":\"127\",\"id_pelanggan\":\"Gandos1111\",\"id_custom\":\"0\",\"id_produk\":\"31\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-14\",\"nama_produk\":\"Paket Lengkap Aquarium Ukuran 25*15*15cm\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Paket Lengkap Aquarium Ukuran 25*15*15cm dengan Aerator dan Bianglala\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"75000\",\"berat\":\"1200\",\"images\":\"340139542_WhatsApp Image 2023-02-14 at 14.40.48.jpeg\",\"jml_stok\":\"9\"}],\"custom\":[],\"berat\":1200,\"total_bayar\":81000}', 0, 'Screenshot_2023-02-07-23-09-25-167_com_mobile_legends2.jpg', '2023-02-14', '137766618881'),
('AQ1676446605', 'dian', '{\"almt\":{\"id_pelanggan\":\"dian\",\"nama_pelanggan\":\"Dian Novriansyah\",\"images\":\"\",\"desa\":\"Rendeng\",\"kodepos\":\"59312\",\"rt\":\"2\",\"rw\":\"4\",\"kecamatan\":\"Kota\",\"kabupaten\":\"Kudus\",\"no_hp\":\"081225444631\",\"email\":\"novriansyahdian@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"130\",\"id_pelanggan\":\"dian\",\"id_custom\":\"0\",\"id_produk\":\"28\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium ukuran 30*20*20cm\",\"jenis_pro\":\"Aquarium Kecil\",\"diskripsi\":\"Aquarium dengan ukuran 30*20*20cm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"55000\",\"berat\":\"1450\",\"images\":\"2009317755_FF2AF331-6405-46C3-B003-28E8096037B1.jpeg\",\"jml_stok\":\"17\"}],\"custom\":[],\"berat\":1450,\"total_bayar\":85000}', 0, 'E2744667-BDB7-4816-BC26-D0F2C824C1C7.png', '2023-02-15', ''),
('AQ1676446822', 'andika', '{\"almt\":{\"id_pelanggan\":\"andika\",\"nama_pelanggan\":\"Muhammad Andika\",\"images\":\"\",\"desa\":\"Slungkep\",\"kodepos\":\"59311\",\"rt\":\"3\",\"rw\":\"4\",\"kecamatan\":\"Kayen\",\"kabupaten\":\"Pati\",\"no_hp\":\"085443557888\",\"email\":\"muhammadandika555@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"344\",\"lokasi_tujuan\":\"Pati\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"131\",\"id_pelanggan\":\"andika\",\"id_custom\":\"0\",\"id_produk\":\"35\",\"jumlah\":\"2\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium Soliter Sekat 2 ukuran 20*10*25cm\",\"jenis_pro\":\"Aquarium Kecil\",\"diskripsi\":\"Aquarium cupang sekat 2 ukuran 20*10*25cm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"50000\",\"berat\":\"850\",\"images\":\"159665508_WhatsApp Image 2023-02-14 at 14.40.49 (2).jpeg\",\"jml_stok\":\"13\"}],\"custom\":[],\"berat\":1700,\"total_bayar\":150000}', 1, '7C605CDA-FFA2-4215-B2AB-6FF804A9756F.png', '2023-02-15', ''),
('AQ1676446872', 'andika', '{\"almt\":{\"id_pelanggan\":\"andika\",\"nama_pelanggan\":\"Muhammad Andika\",\"images\":\"\",\"desa\":\"Slungkep\",\"kodepos\":\"59311\",\"rt\":\"3\",\"rw\":\"4\",\"kecamatan\":\"Kayen\",\"kabupaten\":\"Pati\",\"no_hp\":\"085443557888\",\"email\":\"muhammadandika555@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"344\",\"lokasi_tujuan\":\"Pati\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"132\",\"id_pelanggan\":\"andika\",\"id_custom\":\"0\",\"id_produk\":\"40\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium Laut 60*40*40cm Filter Belakang\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium Laut 70*40*40cm Filter Belakang\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"350000\",\"berat\":\"2000\",\"images\":\"1322059612_WhatsApp Image 2023-02-14 at 14.40.48 (2).jpeg\",\"jml_stok\":\"8\"}],\"custom\":[],\"berat\":2000,\"total_bayar\":400000}', 1, 'C51E5900-C1B6-4A7D-A593-360830DE30DD.png', '2023-02-15', ''),
('AQ1676455510', 'fery', '{\"almt\":{\"id_pelanggan\":\"fery\",\"nama_pelanggan\":\"Fery Romadhona\",\"images\":\"\",\"desa\":\"Mlatilor\",\"kodepos\":\"59312\",\"rt\":\"3\",\"rw\":\"4\",\"kecamatan\":\"Kota\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085800380312\",\"email\":\"feryromadhona@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[],\"custom\":[{\"id_detail_produk\":\"133\",\"id_pelanggan\":\"fery\",\"id_custom\":\"19\",\"id_produk\":\"0\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"panjang\":\"20\",\"lebar\":\"10\",\"tinggi\":\"10\",\"ketebalan_kaca\":\"3\",\"harga_satuan\":\"5\",\"keterangan\":\"Aquarium kosong\"}],\"berat\":500,\"total_bayar\":40000}', 1, 'C550E39C-0A42-48DE-A565-E340B85E47F4.png', '2023-02-15', ''),
('AQ1676471347', 'Semar99', '{\"almt\":{\"id_pelanggan\":\"Semar99\",\"nama_pelanggan\":\"Ryno Alex\",\"images\":\"\",\"desa\":\"Barongan\",\"kodepos\":\"59312\",\"rt\":\"6\",\"rw\":\"3\",\"kecamatan\":\"Kota\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085848357556\",\"email\":\"rizadhona01@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"129\",\"id_pelanggan\":\"Semar99\",\"id_custom\":\"0\",\"id_produk\":\"24\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-14\",\"nama_produk\":\"Aquarium ukuran 60*40*40cm\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium persegi biasa tanpa gambar dan acc hanya aquarium dengan ukuran 60*40*40cm ketebalan kaca 3mm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"185000\",\"berat\":\"1950\",\"images\":\"1405877072_43C64EAE-A62E-46E8-929C-52AAB2D7E4C1.jpeg\",\"jml_stok\":\"10\"}],\"custom\":[],\"berat\":1950,\"total_bayar\":215000}', 1, 'image.jpg', '2023-02-15', ''),
('AQ1676471523', 'Semar99', '{\"almt\":{\"id_pelanggan\":\"Semar99\",\"nama_pelanggan\":\"Ryno Alex\",\"images\":\"\",\"desa\":\"Barongan\",\"kodepos\":\"59312\",\"rt\":\"6\",\"rw\":\"3\",\"kecamatan\":\"Kota\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085848357556\",\"email\":\"rizadhona01@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"134\",\"id_pelanggan\":\"Semar99\",\"id_custom\":\"0\",\"id_produk\":\"24\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium ukuran 60*40*40cm\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium persegi biasa tanpa gambar dan acc hanya aquarium dengan ukuran 60*40*40cm ketebalan kaca 3mm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"185000\",\"berat\":\"1950\",\"images\":\"1405877072_43C64EAE-A62E-46E8-929C-52AAB2D7E4C1.jpeg\",\"jml_stok\":\"9\"},{\"id_detail_produk\":\"135\",\"id_pelanggan\":\"Semar99\",\"id_custom\":\"0\",\"id_produk\":\"53\",\"jumlah\":\"2\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Batu Karang Jahe Media Filter 1kg\",\"jenis_pro\":\"Hiasan batu kerikil\",\"diskripsi\":\"Batu Karang Jahe Media Filter 1kg\",\"harga_belipro\":\"6500\",\"harga_jualpro\":\"10000\",\"berat\":\"1000\",\"images\":\"1053024620_12520011-AAE2-46A6-8A17-D12A3BB46A70.jpeg\",\"jml_stok\":\"5\"}],\"custom\":[],\"berat\":3950,\"total_bayar\":235000}', 1, 'image1.jpg', '2023-02-15', ''),
('AQ1676471656', 'yogi', '{\"almt\":{\"id_pelanggan\":\"yogi\",\"nama_pelanggan\":\"Yogi Indarto\",\"images\":\"\",\"desa\":\"Bancak\",\"kodepos\":\"59311\",\"rt\":\"4\",\"rw\":\"4\",\"kecamatan\":\"Welahan\",\"kabupaten\":\"Jepara\",\"no_hp\":\"085642886990\",\"email\":\"yogiindarto22@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"163\",\"lokasi_tujuan\":\"Jepara\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"137\",\"id_pelanggan\":\"yogi\",\"id_custom\":\"0\",\"id_produk\":\"26\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium ukuran 50*25*25cm filter samping\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium ukuran 50*25*25cm dengan filter samping. \",\"harga_belipro\":\"0\",\"harga_jualpro\":\"112000\",\"berat\":\"2050\",\"images\":\"920179743_9A9ACB53-0D2B-4E7A-A21F-3AD60B37DFC6.jpeg\",\"jml_stok\":\"14\"},{\"id_detail_produk\":\"136\",\"id_pelanggan\":\"yogi\",\"id_custom\":\"0\",\"id_produk\":\"55\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Busa Filter Wonder 3 Lapis\",\"jenis_pro\":\"Filter \",\"diskripsi\":\"Busa Filter Wonder 3 Lapis Aquascape Aquarium\",\"harga_belipro\":\"1000\",\"harga_jualpro\":\"2500\",\"berat\":\"200\",\"images\":\"256443131_E757AE68-1CCB-4671-94AD-D90A57A93319.jpeg\",\"jml_stok\":\"8\"}],\"custom\":[],\"berat\":2250,\"total_bayar\":164500}', 0, '34D30BBC-3E65-4E07-96F3-4A6AF7CF363C.png', '2023-02-15', ''),
('AQ1676471877', 'Riko88', '{\"almt\":{\"id_pelanggan\":\"Riko88\",\"nama_pelanggan\":\"Riko\",\"images\":\"\",\"desa\":\"Dukuh sekti\",\"kodepos\":\"511020\",\"rt\":\"3\",\"rw\":\"5\",\"kecamatan\":\"Dukuhsekti\",\"kabupaten\":\"Pati\",\"no_hp\":\"0858753199021\",\"email\":\"riko88@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"344\",\"lokasi_tujuan\":\"Pati\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"138\",\"id_pelanggan\":\"Riko88\",\"id_custom\":\"0\",\"id_produk\":\"41\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium ukuran 40*20*25cm background karang\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium Ukuran 40*20*25cm Background Karang\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"81000\",\"berat\":\"1600\",\"images\":\"234536487_WhatsApp Image 2023-02-14 at 14.40.45 (1).jpeg\",\"jml_stok\":\"12\"},{\"id_detail_produk\":\"139\",\"id_pelanggan\":\"Riko88\",\"id_custom\":\"0\",\"id_produk\":\"44\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium Ukuran 100*50*50cm Filter Samping\",\"jenis_pro\":\"Aquarium Besar\",\"diskripsi\":\"Aquarium Ukuran 100*50*50cm Filter Samping Kaca 7mm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"1250000\",\"berat\":\"6500\",\"images\":\"1556083890_WhatsApp Image 2023-02-14 at 16.16.50.jpeg\",\"jml_stok\":\"2\"}],\"custom\":[],\"berat\":8100,\"total_bayar\":1381000}', 1, 'image2.jpg', '2023-02-15', ''),
('AQ1676471995', 'Riko88', '{\"almt\":{\"id_pelanggan\":\"Riko88\",\"nama_pelanggan\":\"Riko\",\"images\":\"\",\"desa\":\"Dukuh sekti\",\"kodepos\":\"511020\",\"rt\":\"3\",\"rw\":\"5\",\"kecamatan\":\"Dukuhsekti\",\"kabupaten\":\"Pati\",\"no_hp\":\"0858753199021\",\"email\":\"riko88@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"344\",\"lokasi_tujuan\":\"Pati\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"140\",\"id_pelanggan\":\"Riko88\",\"id_custom\":\"0\",\"id_produk\":\"24\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium ukuran 60*40*40cm\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium persegi biasa tanpa gambar dan acc hanya aquarium dengan ukuran 60*40*40cm ketebalan kaca 3mm\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"185000\",\"berat\":\"1950\",\"images\":\"1405877072_43C64EAE-A62E-46E8-929C-52AAB2D7E4C1.jpeg\",\"jml_stok\":\"8\"},{\"id_detail_produk\":\"141\",\"id_pelanggan\":\"Riko88\",\"id_custom\":\"0\",\"id_produk\":\"27\",\"jumlah\":\"2\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium ukuran 60*20*20cm\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium dengan ukuran 60*20*20cm polos tanpa acc apapun.\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"80000\",\"berat\":\"1550\",\"images\":\"985569299_F7C6BDDC-E64D-4AC9-A018-0DE4624C3EAA.jpeg\",\"jml_stok\":\"19\"}],\"custom\":[],\"berat\":5050,\"total_bayar\":395000}', 1, 'image3.jpg', '2023-02-15', ''),
('AQ1676472619', 'dimas', '{\"almt\":{\"id_pelanggan\":\"dimas\",\"nama_pelanggan\":\"Dimas MCS\",\"images\":\"\",\"desa\":\"Temulus\",\"kodepos\":\"59310\",\"rt\":\"2\",\"rw\":\"4\",\"kecamatan\":\"Mejobo\",\"kabupaten\":\"Kudus\",\"no_hp\":\"085643333812\",\"email\":\"dimasmcs@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"142\",\"id_pelanggan\":\"dimas\",\"id_custom\":\"0\",\"id_produk\":\"41\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium ukuran 40*20*25cm background karang\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium Ukuran 40*20*25cm Background Karang\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"81000\",\"berat\":\"1600\",\"images\":\"234536487_WhatsApp Image 2023-02-14 at 14.40.45 (1).jpeg\",\"jml_stok\":\"11\"}],\"custom\":[],\"berat\":1600,\"total_bayar\":111000}', 1, '26B5DECE-283A-44F5-AB8B-47C45610241B.png', '2023-02-15', ''),
('AQ1676475989', 'rizan', '{\"almt\":{\"id_pelanggan\":\"rizan\",\"nama_pelanggan\":\"Rizan Nugraha\",\"images\":\"\",\"desa\":\"Gemiring Lor\",\"kodepos\":\"59310\",\"rt\":\"1\",\"rw\":\"4\",\"kecamatan\":\"Nalumsari\",\"kabupaten\":\"Jepara\",\"no_hp\":\"089666543212\",\"email\":\"rizannugraha@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"163\",\"lokasi_tujuan\":\"Jepara\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"143\",\"id_pelanggan\":\"rizan\",\"id_custom\":\"0\",\"id_produk\":\"27\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Aquarium ukuran 60*20*20cm\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium dengan ukuran 60*20*20cm polos tanpa acc apapun.\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"80000\",\"berat\":\"1550\",\"images\":\"985569299_F7C6BDDC-E64D-4AC9-A018-0DE4624C3EAA.jpeg\",\"jml_stok\":\"18\"},{\"id_detail_produk\":\"144\",\"id_pelanggan\":\"rizan\",\"id_custom\":\"0\",\"id_produk\":\"48\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-15\",\"nama_produk\":\"Pasir Malang Hitam Kasar 1kg\",\"jenis_pro\":\"Hiasan Pasir\",\"diskripsi\":\"Pasir malang kasar 1kg\",\"harga_belipro\":\"10000\",\"harga_jualpro\":\"15000\",\"berat\":\"1000\",\"images\":\"1188350087_B2CBB49A-0527-46F4-8188-FE5BF0FE5AD7.jpeg\",\"jml_stok\":\"7\"}],\"custom\":[],\"berat\":2550,\"total_bayar\":145000}', 1, '1.JPG', '2023-02-15', ''),
('AQ1676622465', 'hasan', '{\"almt\":{\"id_pelanggan\":\"hasan\",\"nama_pelanggan\":\"Muhammad Hasan\",\"images\":\"\",\"desa\":\"Bate\",\"kodepos\":\"59333\",\"rt\":\"1\",\"rw\":\"5\",\"kecamatan\":\"Batealit\",\"kabupaten\":\"Jepara\",\"no_hp\":\"089777234652\",\"email\":\"hasan4457@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"163\",\"lokasi_tujuan\":\"Jepara\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"145\",\"id_pelanggan\":\"hasan\",\"id_custom\":\"0\",\"id_produk\":\"43\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-17\",\"nama_produk\":\"Aquarium Ukuran 75*40*50cm  Filter Samping\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium Ukuran 75*40*50cm  Filter Samping\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"240000\",\"berat\":\"2500\",\"images\":\"362084848_WhatsApp Image 2023-02-14 at 16.07.28.jpeg\",\"jml_stok\":\"16\"},{\"id_detail_produk\":\"146\",\"id_pelanggan\":\"hasan\",\"id_custom\":\"0\",\"id_produk\":\"47\",\"jumlah\":\"2\",\"tanggal\":\"2023-02-17\",\"nama_produk\":\"Batu Kerikil Putih 1kg\",\"jenis_pro\":\"Hiasan batu kerikil\",\"diskripsi\":\"Batu Kerikil Alam warna putih berat 1kg\",\"harga_belipro\":\"5000\",\"harga_jualpro\":\"10000\",\"berat\":\"1000\",\"images\":\"2120807048_E928060D-6F8C-4F51-B403-47CF4202C13D.jpeg\",\"jml_stok\":\"3\"}],\"custom\":[],\"berat\":4500,\"total_bayar\":310000}', 0, '172E5C04-8DCB-4C89-A9AE-385940127CA8.png', '2023-02-17', ''),
('AQ1676622500', 'hasan', '{\"almt\":{\"id_pelanggan\":\"hasan\",\"nama_pelanggan\":\"Muhammad Hasan\",\"images\":\"\",\"desa\":\"Bate\",\"kodepos\":\"59333\",\"rt\":\"1\",\"rw\":\"5\",\"kecamatan\":\"Batealit\",\"kabupaten\":\"Jepara\",\"no_hp\":\"089777234652\",\"email\":\"hasan4457@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"163\",\"lokasi_tujuan\":\"Jepara\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[{\"id_detail_produk\":\"147\",\"id_pelanggan\":\"hasan\",\"id_custom\":\"0\",\"id_produk\":\"57\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-17\",\"nama_produk\":\"Pompa Celup Power Head Nikita Star NS-1200\",\"jenis_pro\":\"Aerator\",\"diskripsi\":\"Pompa Celup Power Head Nikita Star NS-1200\",\"harga_belipro\":\"28000\",\"harga_jualpro\":\"35000\",\"berat\":\"560\",\"images\":\"1466172563_F4E2916F-FC7A-470A-B44D-C0E15D9972D2.jpeg\",\"jml_stok\":\"4\"}],\"custom\":[],\"berat\":560,\"total_bayar\":85000}', 0, '07EAC850-231D-4CFE-9F3A-F5D1CF45F686.png', '2023-02-17', ''),
('AQ1677588883', 'charis', '{\"almt\":{\"id_pelanggan\":\"charis\",\"nama_pelanggan\":\"Charis Irwanto\",\"images\":\"\",\"desa\":\"Piji\",\"kodepos\":\"59312\",\"rt\":\"4\",\"rw\":\"4\",\"kecamatan\":\"Dawe\",\"kabupaten\":\"Kudus\",\"no_hp\":\"089222323454\",\"email\":\"charisirwanto@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"209\",\"lokasi_tujuan\":\"Kudus\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"30000\"},\"keranjang\":[{\"id_detail_produk\":\"148\",\"id_pelanggan\":\"charis\",\"id_custom\":\"0\",\"id_produk\":\"27\",\"jumlah\":\"1\",\"tanggal\":\"2023-02-28\",\"nama_produk\":\"Aquarium ukuran 60*20*20cm\",\"jenis_pro\":\"Aquarium Biasa\",\"diskripsi\":\"Aquarium dengan ukuran 60*20*20cm polos tanpa acc apapun.\",\"harga_belipro\":\"0\",\"harga_jualpro\":\"80000\",\"berat\":\"1550\",\"images\":\"985569299_F7C6BDDC-E64D-4AC9-A018-0DE4624C3EAA.jpeg\",\"jml_stok\":\"17\"}],\"custom\":[],\"berat\":1550,\"total_bayar\":110000}', 0, 'DNvcjOIVAAALwCT4.jpg', '2023-02-28', ''),
('AQ1678002453', 'lusi', '{\"almt\":{\"id_pelanggan\":\"lusi\",\"nama_pelanggan\":\"Safira Lusiana\",\"images\":\"\",\"desa\":\"Kuwu\",\"kodepos\":\"59132\",\"rt\":\"02\",\"rw\":\"04\",\"kecamatan\":\"Jakenan\",\"kabupaten\":\"Pati\",\"no_hp\":\"089441221333\",\"email\":\"safiralusiana@gmail.com\"},\"ongkir\":{\"id_ongkos\":\"344\",\"lokasi_tujuan\":\"Pati\",\"jarak\":\"0\",\"jenis\":\"JASA TOKO\",\"biaya\":\"50000\"},\"keranjang\":[],\"custom\":[{\"id_detail_produk\":\"149\",\"id_pelanggan\":\"lusi\",\"id_custom\":\"20\",\"id_produk\":\"0\",\"jumlah\":\"3\",\"tanggal\":\"2023-03-05\",\"panjang\":\"25\",\"lebar\":\"10\",\"tinggi\":\"12\",\"ketebalan_kaca\":\"3\",\"harga_satuan\":\"5\",\"keterangan\":\"-\"}],\"berat\":2250,\"total_bayar\":95000}', 1, 'DNvcjOIVAAALwCT4.jpg', '2023-03-05', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkos_kirim`
--

CREATE TABLE `ongkos_kirim` (
  `id_ongkos` int(11) NOT NULL,
  `lokasi_tujuan` varchar(50) NOT NULL,
  `jarak` int(11) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkos_kirim`
--

INSERT INTO `ongkos_kirim` (`id_ongkos`, `lokasi_tujuan`, `jarak`, `jenis`, `biaya`) VALUES
(163, 'Jepara', 0, 'JASA TOKO', 50000),
(344, 'Pati', 0, 'JASA TOKO', 50000),
(209, 'Kudus', 0, 'JASA TOKO', 30000),
(76, 'Blora', 0, 'Jasa Toko', 75000),
(380, 'Rembang', 0, 'JASA TOKO', 100000),
(6, '-', 0, 'jasa_lain', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `no_hp`, `email`) VALUES
(1, 'ani', '085643396361', 'sa@gmail.com'),
(2, 'Yoga Pratama', '085831225641', 'yogapratama@gmail.com'),
(3, 'Selamet Hariyanto', '085290919002', 'selamethariyanto@gmail.com'),
(4, 'Bima Yudha', '081290311411', 'bimayudha@gmail.com'),
(5, 'kiki', '089551827661', 'mail.kiki@gmail.com'),
(6, 'Wahyu Kusuma', '089661234441', 'wahyukusuma@gmail.com'),
(7, 'Muhammad Ridho', '088213333121', 'muhammadridho@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `images` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kodepos` int(5) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `images`, `desa`, `kodepos`, `rt`, `rw`, `kecamatan`, `kabupaten`, `no_hp`, `email`) VALUES
('ani', 'ani sa', '1674930487_.jpg', 'kudsua', 888, '9', '70', 'mergia', 'Blora', '8921333333333', 'sia@gmail.com'),
('adit', 'Muhammad Aditya Dwi', '', 'Mlati lor', 59312, '2', '4', 'Kota', 'Kudus', '085643396364', 'mada15@gmail.com'),
('riza', 'Chalim Riza', '', 'ploso', 59313, '3', '3', 'Jati', 'Kudus', '089713888646', 'chalimriza@gmail.com'),
('dita', 'Dita Mutiara', '', 'Jepon', 59213, '2', '3', 'Tunjungan', 'Blora', '081225644322', 'ditaimut22@gmail.com'),
('gandi', 'Gandi Setya', '', 'Robayan', 53462, '3', '2', 'Kalinyamatan', 'Jepara', '089644213321', 'gandisetya3@gmail.com'),
('laodri', 'Laodri Akbar', '', 'Purwosari', 59311, '2', '3', 'Kota', 'Kudus', '085641444621', 'laodriakbar30@gmail.com'),
('dimas', 'Dimas MCS', '', 'Temulus', 59310, '2', '4', 'Mejobo', 'Kudus', '085643333812', 'dimasmcs@gmail.com'),
('egy', 'Agusti Egy', '', 'brantak', 59320, '4', '4', 'Kalinyamat', 'Jepara', '089888098765', 'agustiegy122@gmail.com'),
('nafis', 'Ahmad Nafis', '', 'mlati lor', 59312, '2', '4', 'Kota', 'Kudus', '08122564089', 'nafisahmad@gmail.com'),
('Gandos1111', 'Gandos', '', 'Getas Pejaten', 9002, '05', '01', 'Kota Kudus', 'Kudus', '089671799613', 'gandhi.gandos@gmail.com'),
('rohman', 'Saifur Rohman', '', 'Purwosari', 59312, '1', '3', 'Kota', 'Kudus', '1', 'saifurrohman456@gmail.com'),
('fery', 'Fery Romadhona', '', 'Mlatilor', 59312, '3', '4', 'Kota', 'Kudus', '085800380312', 'feryromadhona@gmail.com'),
('Semar99', 'Ryno Alex', '', 'Barongan', 59312, '6', '3', 'Kota', 'Kudus', '085848357556', 'rizadhona01@gmail.com'),
('dian', 'Dian Novriansyah', '', 'Rendeng', 59312, '2', '4', 'Kota', 'Kudus', '081225444631', 'novriansyahdian@gmail.com'),
('andika', 'Muhammad Andika', '', 'Slungkep', 59311, '3', '4', 'Kayen', 'Pati', '085443557888', 'muhammadandika555@gmail.com'),
('yogi', 'Yogi Indarto', '', 'Bancak', 59311, '4', '4', 'Welahan', 'Jepara', '085642886990', 'yogiindarto22@gmail.com'),
('Riko88', 'Riko', '', 'Dukuh sekti', 511020, '3', '5', 'Dukuhsekti', 'Pati', '0858753199021', 'riko88@gmail.com'),
(' Abizar', ' Abizar Bahi ', '', 'lau', 59353, '1', '7', 'dawe', 'Kudus', '089117772112', 'qolbi026@gmail.com'),
('Adyatma', 'Adyatma Mahavir Bagaskara', '', 'gonndangmanis', 59353, '2', '1', 'bae', 'Kudus', '089776554332', 'qolbi026@gmail.com'),
('Aftbah', 'Aftbah Fathian', '', 'kauman', 59353, '2', '6', 'jekulo', 'Kudus', '085009887665', 'qolbi026@gmail.com'),
('Akmal', 'Akmal Atharrayhan', '', 'lau', 59353, '1', '2', 'dawe', 'Kudus', '085123456789', 'qolbi026@gmail.com'),
('Arkana', 'Arkana Qaid ', '', 'gondangmanis', 59353, '1', '9', 'bae', 'Kudus', '085664008997', 'qolbi026@gmail.com'),
('rizan', 'Rizan Nugraha', '', 'Gemiring Lor', 59310, '1', '4', 'Nalumsari', 'Jepara', '089666543212', 'rizannugraha@gmail.com'),
('hasan', 'Muhammad Hasan', '', 'Bate', 59333, '1', '5', 'Batealit', 'Jepara', '089777234652', 'hasan4457@gmail.com'),
('charis', 'Charis Irwanto', '', 'Piji', 59312, '4', '4', 'Dawe', 'Kudus', '089222323454', 'charisirwanto@gmail.com'),
('lusi', 'Safira Lusiana', '', 'Kuwu', 59132, '02', '04', 'Jakenan', 'Pati', '089441221333', 'safiralusiana@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `id_ongkos` int(11) NOT NULL,
  `status_kirim` int(1) NOT NULL COMMENT '0=pembayaran blm dikonfirmasi,\r\n1 = proses dikirim,\r\n2 = diterima\r\n',
  `nama_penerima` varchar(75) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `no_transaksi`, `id_ongkos`, `status_kirim`, `nama_penerima`, `keterangan`) VALUES
(11, 'AQ1674930656', 76, 2, 'ani sa', ''),
(12, 'AQ1675016899', 209, 2, 'Chalim Riza', '{\"courier\":\"pos\",\"ongkir\":\"20000\"}'),
(13, 'AQ1675150482', 163, 2, 'Gandi Setya', '{\"courier\":\"jne\",\"ongkir\":\"11000\"}'),
(14, 'AQ1675154008', 209, 1, '', ''),
(15, 'AQ1675155917', 209, 0, '', ''),
(16, 'AQ1676279987', 209, 1, '', ''),
(17, 'AQ1676281729', 209, 2, 'Dimas MCS', '{\"courier\":\"tiki\",\"ongkir\":null}'),
(18, 'AQ1676282386', 209, 2, 'Dimas MCS', '{\"courier\":\"pos\",\"ongkir\":\"10000\"}'),
(19, 'AQ1676300410', 163, 2, 'Agusti Egy', '{\"courier\":\"tiki\",\"ongkir\":\"50000\"}'),
(20, 'AQ1676300514', 163, 2, 'Agusti Egy', ''),
(21, 'AQ1676316738', 76, 1, '', '{\"courier\":\"tiki\",\"ongkir\":\"30000\"}'),
(22, 'AQ1676376607', 209, 1, '', ''),
(23, 'AQ1676377809', 209, 2, 'Fery Romadhona', ''),
(24, 'AQ1676386039', 209, 0, '', '{\"courier\":\"tiki\",\"ongkir\":\"6000\"}'),
(25, 'AQ1676446605', 209, 0, '', ''),
(26, 'AQ1676446822', 344, 2, 'Muhammad Andika', ''),
(27, 'AQ1676446872', 344, 2, 'Muhammad Andika', ''),
(28, 'AQ1676455510', 209, 2, 'Fery Romadhona', ''),
(29, 'AQ1676471347', 209, 1, '', ''),
(30, 'AQ1676471523', 209, 1, '', ''),
(31, 'AQ1676471656', 163, 0, '', ''),
(32, 'AQ1676471877', 344, 1, '', ''),
(33, 'AQ1676471995', 344, 1, '', ''),
(34, 'AQ1676472619', 209, 2, 'Dimas MCS', ''),
(35, 'AQ1676475989', 163, 2, 'Rizan Nugraha', ''),
(36, 'AQ1676622465', 163, 0, '', ''),
(37, 'AQ1676622500', 163, 0, '', ''),
(38, 'AQ1677588883', 209, 0, '', ''),
(39, 'AQ1678002453', 344, 1, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tgl_jual` date DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_pelanggan` varchar(30) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_jual`, `id_pegawai`, `id_pelanggan`, `no_transaksi`) VALUES
(4, '2023-01-29', 1, 'ani', 'AQ1674930656'),
(5, '2023-01-30', 2, 'riza', 'AQ1675016899'),
(6, '2023-01-31', 2, 'gandi', 'AQ1675150482'),
(7, NULL, 2, 'riza', 'AQ1676279987'),
(8, NULL, 2, 'riza', 'AQ1676279987'),
(9, NULL, 1, 'ani', 'AQ1676316738'),
(10, NULL, 1, 'ani', 'AQ1676316738'),
(11, '2023-02-15', 1, 'egy', 'AQ1676300514'),
(12, '2023-02-15', 2, 'egy', 'AQ1676300410'),
(13, NULL, 2, 'laodri', 'AQ1675154008'),
(14, NULL, 2, 'Gandos1111', 'AQ1676376607'),
(15, NULL, 2, 'Riko88', 'AQ1676471995'),
(16, NULL, 2, 'Riko88', 'AQ1676471877'),
(17, NULL, 2, 'Riko88', 'AQ1676471877'),
(18, NULL, 2, 'Semar99', 'AQ1676471523'),
(19, NULL, 2, 'Semar99', 'AQ1676471347'),
(20, '2023-02-15', 2, 'fery', 'AQ1676455510'),
(21, '2023-02-15', 2, 'fery', 'AQ1676377809'),
(22, '2023-02-15', 2, 'dimas', 'AQ1676472619'),
(23, '2023-02-15', 2, 'dimas', 'AQ1676282386'),
(24, '2023-02-15', 2, 'dimas', 'AQ1676281729'),
(25, '2023-02-15', 2, 'rizan', 'AQ1676475989'),
(26, '2023-02-15', 2, 'andika', 'AQ1676446872'),
(27, '2023-02-15', 2, 'andika', 'AQ1676446822'),
(28, NULL, 2, 'lusi', 'AQ1678002453');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jenis_pro` varchar(50) NOT NULL,
  `diskripsi` varchar(150) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga_belipro` double NOT NULL,
  `harga_jualpro` double NOT NULL,
  `images` varchar(70) NOT NULL,
  `jml_stok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jenis_pro`, `diskripsi`, `berat`, `harga_belipro`, `harga_jualpro`, `images`, `jml_stok`) VALUES
(41, 'Aquarium ukuran 40*20*25cm background karang', 'Aquarium Biasa', 'Aquarium Ukuran 40*20*25cm Background Karang', 1600, 0, 81000, '234536487_WhatsApp Image 2023-02-14 at 14.40.45 (1).jpeg', 11),
(40, 'Aquarium Laut 60*40*40cm Filter Belakang', 'Aquarium Biasa', 'Aquarium Laut 70*40*40cm Filter Belakang', 2000, 0, 350000, '1322059612_WhatsApp Image 2023-02-14 at 14.40.48 (2).jpeg', 8),
(24, 'Aquarium ukuran 60*40*40cm', 'Aquarium Biasa', 'Aquarium persegi biasa tanpa gambar dan acc hanya aquarium dengan ukuran 60*40*40cm ketebalan kaca 3mm', 1950, 0, 185000, '1405877072_43C64EAE-A62E-46E8-929C-52AAB2D7E4C1.jpeg', 8),
(27, 'Aquarium ukuran 60*20*20cm', 'Aquarium Biasa', 'Aquarium dengan ukuran 60*20*20cm polos tanpa acc apapun.', 1550, 0, 80000, '985569299_F7C6BDDC-E64D-4AC9-A018-0DE4624C3EAA.jpeg', 17),
(26, 'Aquarium ukuran 50*25*25cm filter samping', 'Aquarium Biasa', 'Aquarium ukuran 50*25*25cm dengan filter samping. ', 2050, 0, 112000, '920179743_9A9ACB53-0D2B-4E7A-A21F-3AD60B37DFC6.jpeg', 14),
(28, 'Aquarium ukuran 30*20*20cm', 'Aquarium Kecil', 'Aquarium dengan ukuran 30*20*20cm', 1450, 0, 55000, '2009317755_FF2AF331-6405-46C3-B003-28E8096037B1.jpeg', 17),
(29, 'Paket Hemat Aquarium 30*15*15cm ', 'Aquarium Biasa', 'Paket Hemat Aquarium 30*15*15cm  dengan paket berupa lampu led batu kerikil dan aerator', 2100, 0, 85000, '1676482414_E97702FC-08D8-4363-A722-23FE08F175B4.jpeg', 7),
(30, 'Paket Lengkap Aquarium 35*20*25cm', 'Aquarium Biasa', 'Aquarium ukuran 35*20*25cm lengkap dengan filter dan lampu led', 1950, 0, 135000, '844305423_WhatsApp Image 2023-02-14 at 14.40.44 (2).jpeg', 12),
(31, 'Paket Lengkap Aquarium Ukuran 25*15*15cm', 'Aquarium Biasa', 'Paket Lengkap Aquarium Ukuran 25*15*15cm dengan Aerator dan Bianglala', 1200, 0, 75000, '340139542_WhatsApp Image 2023-02-14 at 14.40.48.jpeg', 9),
(32, 'Paket Aquarium Ukuran 30*15*20cm', 'Aquarium Biasa', 'Paket Aquarium Ukuran 30*15*20cm dengan lampu led, aerator dan batu kerikil\r\n', 1250, 0, 105000, '60898457_WhatsApp Image 2023-02-14 at 14.40.48 (1).jpeg', 12),
(33, 'Aquarium Soliter Sekat 3 ukuran 40*12*12cm', 'Aquarium Kecil', 'Aquarium soliter sekat 3 ukuran 40*12*12cm untuk ikan cupang dan ikan kecil lainnya', 1000, 0, 70000, '1764647897_WhatsApp Image 2023-02-14 at 14.40.49.jpeg', 15),
(34, 'Aquarium Soliter Sekat 4 ukuran 32*11*8cm', 'Aquarium Kecil', 'Aquarium Soliter Sekat 4 ukuran 32*11*8cm Untuk Ikan Cupang dan Ikan Kecil Lainnya', 1000, 0, 85000, '1670003155_WhatsApp Image 2023-02-14 at 14.40.49 (1).jpeg', 12),
(35, 'Aquarium Soliter Sekat 2 ukuran 20*10*25cm', 'Aquarium Kecil', 'Aquarium cupang sekat 2 ukuran 20*10*25cm', 850, 0, 50000, '159665508_WhatsApp Image 2023-02-14 at 14.40.49 (2).jpeg', 13),
(36, 'Aquarium Soliter Ukuran 20*20*20cm', 'Aquarium Kecil', 'Aquarium Soliter Ukuran 20*20*20cm', 700, 0, 35000, '137602053_WhatsApp Image 2023-02-14 at 14.40.47.jpeg', 16),
(37, 'Aquarium Background Ukuran 30*15*15cm', 'Aquarium Biasa', 'Aquarium Dengan Background Ukuran 30*15*15cm ', 1200, 0, 55000, '2008318815_WhatsApp Image 2023-02-14 at 14.40.44 (3).jpeg', 7),
(38, 'Aquarium Ukuran 45*40*35cm Filter Belakang', 'Aquarium Biasa', 'Aquarium Ukuran 45*40*35cm Filter Belakang', 1300, 0, 175000, '1393993379_WhatsApp Image 2023-02-14 at 14.40.44 (4).jpeg', 10),
(39, 'Aquarium Besar Ukuran 120*50*50cm', 'Aquarium Besar', 'Aquarium Besar Ukuran 120*50*50cm untuk ikan arwana, chana, dan ikan besar lainnya maupun untuk aquascape.', 4000, 0, 800000, '1191556624_WhatsApp Image 2023-02-14 at 14.40.44 (5).jpeg', 4),
(42, 'Aquarium Besar Ukuran 170*60*60cm', 'Aquarium Besar', 'Aquarium Besar Ukuran 170*60*60cm ketebalan kaca 7cm', 70000, 0, 2850000, '261872863_WhatsApp Image 2023-02-14 at 15.58.24.jpeg', 3),
(43, 'Aquarium Ukuran 75*40*50cm  Filter Samping', 'Aquarium Biasa', 'Aquarium Ukuran 75*40*50cm  Filter Samping', 2500, 0, 240000, '362084848_WhatsApp Image 2023-02-14 at 16.07.28.jpeg', 16),
(44, 'Aquarium Ukuran 100*50*50cm Filter Samping', 'Aquarium Besar', 'Aquarium Ukuran 100*50*50cm Filter Samping Kaca 7mm', 6500, 0, 1250000, '1556083890_WhatsApp Image 2023-02-14 at 16.16.50.jpeg', 5),
(45, 'Batu Kerikil Warna 1kg', 'Hiasan batu kerikil', 'Hiasan batu kerikil warna 1kg', 1000, 20000, 25000, '979138944_66A07C92-3E64-4A3C-B3BC-CE96BE5D6C01.jpeg', 7),
(46, 'Batu Kerikil Hitam 1kg', 'Hiasan batu kerikil', 'Berat 1kg\r\nBatu koral atau batu kerikil adalah salah satu jenis batu alam yang memiliki berbagai variasi bentuk, warna dan ukuran. Pesona batu ini ter', 1000, 15000, 20000, '814949162_9C19ED19-58FF-44E3-AA8F-241C11B888BC.jpeg', 8),
(47, 'Batu Kerikil Putih 1kg', 'Hiasan batu kerikil', 'Batu Kerikil Alam warna putih berat 1kg', 1000, 5000, 10000, '2120807048_E928060D-6F8C-4F51-B403-47CF4202C13D.jpeg', 3),
(48, 'Pasir Malang Hitam Kasar 1kg', 'Hiasan Pasir', 'Pasir malang kasar 1kg', 1000, 10000, 15000, '1188350087_B2CBB49A-0527-46F4-8188-FE5BF0FE5AD7.jpeg', 7),
(49, 'Pasir Semut Aquarium 1kg', 'Hiasan Pasir', 'Pasir semut aquarium aquascape 1kg', 1000, 6000, 12000, '1082481713_40093266-E446-4437-8E65-5237220B75F5.jpeg', 10),
(50, 'Pasir Bali Aquascape 1kg', 'Hiasan Pasir', 'Pasir bali aquascape 1kg', 1000, 7000, 10000, '1011640895_4983B951-6F19-4AE5-9E92-A6EEA5A9502B.jpeg', 8),
(51, 'Pasir Malang Merah 1kg', 'Hiasan Pasir', 'Pasir Malang Merah 1kg', 1000, 7000, 10500, '1022139664_E85C2B67-CDC1-4DE6-98D3-BB0FD1B04FBA.jpeg', 9),
(52, 'Pasir Silika Hitam Halus 1kg', 'Hiasan Pasir', 'Pasir Silika Hitam Halus 1kg', 1000, 12500, 16000, '493310699_75AE5ADC-9524-4708-A276-4ACD96667A51.jpeg', 5),
(53, 'Batu Karang Jahe Media Filter 1kg', 'Hiasan batu kerikil', 'Batu Karang Jahe Media Filter 1kg', 1000, 6500, 10000, '1053024620_12520011-AAE2-46A6-8A17-D12A3BB46A70.jpeg', 5),
(54, 'Internal Filter Biofoam Bioball Aquarium', 'Filter ', 'Internal Filter Biofoam Bioball Aquarium', 780, 35000, 55000, '1426033027_D7A1034C-ADE4-43CD-AE9D-324A646A2E6A.jpeg', 4),
(55, 'Busa Filter Wonder 3 Lapis', 'Filter ', 'Busa Filter Wonder 3 Lapis Aquascape Aquarium', 200, 1000, 2500, '256443131_E757AE68-1CCB-4671-94AD-D90A57A93319.jpeg', 8),
(56, 'Air Pump 3 in 1 Nikita 666 Komplit + Box', 'Filter ', 'Air Pump 3 in 1 Nikita 666 Komplit + Box', 670, 45000, 60000, '1210108172_0D1D5620-C5DB-4B4B-B24A-812E55AA9698.jpeg', 4),
(57, 'Pompa Celup Power Head Nikita Star NS-1200', 'Aerator', 'Pompa Celup Power Head Nikita Star NS-1200', 560, 28000, 35000, '1466172563_F4E2916F-FC7A-470A-B44D-C0E15D9972D2.jpeg', 4),
(58, 'Power Head Kandila ECO Series', 'Aerator', 'Power head kandila eco series ', 650, 21500, 25000, '932038976_0B7DA30A-B32B-4873-AC41-8F4C66E3D5ED.jpeg', 4),
(59, 'Hiasan aquarium rumput plastik tinggi 30cm', 'Hiasan Tanaman Plastik', 'Hiasan aquarium rumput kerang tanaman aquascape tinggi 30cm', 250, 2500, 5000, '2106055442_972B20CE-A61A-471D-B8AF-3740EC54A62D.jpeg', 12),
(60, 'Tanaman plastik kerang hijau kuning ', 'Hiasan Tanaman Plastik', '￼Hiasan aquarium kerang hijau kuning lembut tinggi 30cm', 200, 3500, 4000, '498728627_03DD7086-E7EC-48B5-BBEA-B8FFE0070E38.jpeg', 5),
(61, 'Montecarlo Aquascape | tanaman karpet', 'Hiasan Tanaman Hidup', 'Montecarlo tanaman hias karpet aquarium aquascape', 100, 4500, 6000, '1728183492_09AF4A8B-D18E-4052-92AD-F564F65E34A3.jpeg', 7),
(62, 'Kadaka Mini Aquascape Aquarium', 'Hiasan Tanaman Hidup', 'Kadaka mini untuk aquascape dan aquarium', 100, 10000, 15000, '1490319496_9A878811-0918-48B9-A160-811D2ADC0470.jpeg', 3),
(63, 'Tanaman propit pot aquascape', 'Hiasan Tanaman Hidup', 'Tanaman pot mini aquascape propit', 200, 2500, 5000, '1771193282_4E903F10-99CB-404F-8EF8-96C129F9D9DC.jpeg', 6),
(64, 'Selang spiral air pump', 'Selang', 'Selang spiral air pump', 100, 3000, 5000, '19037382_3F14A8E8-6650-4927-8D2E-C8928D363685.jpeg', 8),
(65, 'Batu Angin Aerator Kecil', 'Aerator', 'Batu Angin Aerator Kecil ', 120, 1500, 2500, '424650586_438C373D-A1C1-4DDF-92FF-417073827D41.jpeg', 10),
(67, 'Anti Klorin Penjernih Air', 'Penjernih Air', 'Anti klorin untuk penjernih air dan mengurangi klorin dalam kandungan air', 500, 5000, 6000, '1330239275_C2A9AAF4-00EE-4A1A-9078-3B91E23FAAD6.jpeg', 5),
(68, 'Saringan Ikan Bulat Kecil', 'Saringan Ikan', 'Saringan untuk menangkap ikan rapat dan tidak mudah rusak', 100, 3500, 4000, '1648077228_D3D04A2F-676B-42D1-BCA7-6A4196E2AAA3.jpeg', 9),
(69, 'Lampu Led Celup Nikita Star NS-200', 'Hiasan Lampu Warna', 'Lampu celup nikita ns-200 20cm', 200, 30000, 35000, '1866508057_5FB80B7F-3DF9-406B-AED5-EDD07DB06F31.jpeg', 16),
(70, 'Lampu Aquarium Roxin 40cm', 'Hiasan Lampu Warna', 'Lampu Warna Aquarium Roxin 40cm', 250, 50000, 55000, '493558991_81D1C7B3-F5DA-424E-8C95-2A191620B80F.jpeg', 14),
(71, 'Wallpaper Aquarium Gambar ', 'Hiasan Wallpaper', 'Wallpaper aquarium', 80, 10000, 12000, '1111830251_42040834-AF0F-404E-8502-6CB34BCD3B97.jpeg', 5),
(72, 'Wallpaper Aquarium Polos', 'Hiasan Wallpaper', 'Wallpaper Polos', 80, 5000, 7000, '338065921_2BEFB26D-114A-4C82-BDA9-7101DBFE31B3.jpeg', 6),
(73, 'Thermometer Aquarium Nikita Star SW-05', 'Thermometer', 'Thermometer Aquarium Nikita Star SW-05 Pengukur suhu aquarium dan aquascape', 100, 5800, 10000, '1365185776_9FBD9D80-3ADC-457C-9FBB-A013ADC2A942.jpeg', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_custom`
--

CREATE TABLE `produk_custom` (
  `id_custom` int(11) NOT NULL,
  `panjang` int(3) NOT NULL,
  `lebar` int(3) NOT NULL,
  `tinggi` int(3) NOT NULL,
  `ketebalan_kaca` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_custom`
--

INSERT INTO `produk_custom` (`id_custom`, `panjang`, `lebar`, `tinggi`, `ketebalan_kaca`, `harga_satuan`, `keterangan`) VALUES
(4, 10, 10, 10, 0, 15, 'sasa'),
(5, 20, 10, 15, 0, 15, 'aquarium polosan'),
(6, 30, 10, 15, 0, 15, ''),
(7, 27, 14, 10, 0, 15, '-'),
(10, 20, 10, 7, 0, 15, ''),
(14, 10, 20, 20, 3, 5, 'ewew'),
(15, 10, 10, 10, 5, 7, 'qs'),
(19, 20, 10, 10, 3, 5, 'Aquarium kosong'),
(17, 120, 40, 30, 3, 5, 'hanya aquarium'),
(18, 1, 2, 2, 1, 3, 'swws'),
(20, 25, 10, 12, 3, 5, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis_aquarium` varchar(50) NOT NULL,
  `ketebalan_kaca` int(11) NOT NULL,
  `harga` double NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `jenis_aquarium`, `ketebalan_kaca`, `harga`, `nama_kategori`, `keterangan`) VALUES
(1, 'Aquarium Besar', 4, 7, 'aquarium', ''),
(2, 'Aquarium Kecil', 1, 3, 'aquarium', ''),
(3, 'Aquarium Biasa', 3, 5, 'aquarium', ''),
(11, 'Hiasan batu kerikil', 0, 0, 'hiasan', 'batu kerikil kecil untuk aquarium dan filter kotoran ikan'),
(12, 'Hiasan Lampu Warna', 0, 0, 'hiasan', 'lampu LED hemat daya dan awet'),
(19, 'Hiasan Tanaman Plastik', 0, 0, 'hiasan', 'Tanaman Rumput Laut Bahan Plastik Ramah Lingkungan'),
(20, 'Hiasan Wallpaper', 0, 0, 'hiasan', 'Wallpaper untuk aquarium'),
(21, 'Hiasan Pasir', 0, 0, 'hiasan', 'Pasir malang hitam dan merah'),
(22, 'Hiasan Tanaman Hidup', 0, 0, 'hiasan', 'Hiasan tanaman hidup berupa rumput ataupun tanaman hidup air untuk aquascape'),
(23, 'Filter ', 0, 0, 'aksesoris', 'Filter pembersih kotoran ikan '),
(24, 'Aerator', 0, 0, 'aksesoris', 'Aerator oksigen untuk membantu ikan bernafas lebih baik'),
(25, 'Selang', 0, 0, 'aksesoris', 'Selang penghubung filter pembersih'),
(26, 'Penjernih Air', 0, 0, 'aksesoris', 'Penjernih air agar ikan dan tanaman dapat hidup dengan sehat'),
(27, 'Saringan Ikan', 0, 0, 'aksesoris', 'Saringan penangkap ikan '),
(28, 'Thermometer', 0, 0, 'aksesoris', 'Thermometer pengukur suhu aquarium');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`username`, `password`, `level`, `status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 1),
('andi', '202cb962ac59075b964b07152d234b70', 'pelanggan', 1),
('ds', '522748524ad010358705b6852b81be4c', 'pelanggan', 1),
('ani', '202cb962ac59075b964b07152d234b70', 'pelanggan', 1),
('sa@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'karyawan', 0),
('adit', '486b6c6b267bc61677367eb6b6458764', 'pelanggan', 1),
('riza', 'd5f275885bd96778f7f01c814e405e7c', 'pelanggan', 1),
('yogapratama@gmail.com', '807659cd883fc0a63f6ce615893b3558', 'karyawan', 0),
('selamethariyanto@gmail.com', '58399557dae3c60e23c78606771dfa3d', 'pemilik', 0),
('gandi', 'a0c308fa53555d573a38809fb3cba564', 'pelanggan', 1),
('bimayudha@gmail.com', '7fcba392d4dcca33791a44cd892b2112', 'karyawan', 0),
('laodri', '926c03c1ecd1a183e82ea4ebcf530003', 'pelanggan', 1),
('dimas', '7d49e40f4b3d8f68c19406a58303f826', 'pelanggan', 1),
('mail.kiki@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'karyawan', 0),
('egy', '6a73901588db3d2eac37156006ceb546', 'pelanggan', 1),
('wahyukusuma@gmail.com', '32c9e71e866ecdbc93e497482aa6779f', 'karyawan', 0),
('Gandos1111', 'e807f1fcf82d132f9bb018ca6738a19f', 'pelanggan', 1),
('rohman', '0eecbebb12b5e6cc51fc2b1e71c4d508', 'pelanggan', 1),
('fery', 'dfd1f77aa12baacdba90554cc7cf4529', 'pelanggan', 1),
('Semar99', '2e5c48ac3c452e5038a4ce0d8ffdf46c', 'pelanggan', 1),
('dian', 'f97de4a9986d216a6e0fea62b0450da9', 'pelanggan', 1),
('andika', '7e51eea5fa101ed4dade9ad3a7a072bb', 'pelanggan', 1),
('yogi', '938e14c074c45c62eb15cc05a6f36d79', 'pelanggan', 1),
('Riko88', '260f5182bff1b17035e781494b8197a2', 'pelanggan', 1),
(' Abizar', '39de89da506803bf20cd5035c69023ca', 'pelanggan', 1),
('Adyatma', '9a40b1992d801b9df74cfb925d90a6a7', 'pelanggan', 1),
('Aftbah', '90c2095605eb66bb44ce19be81fa390f', 'pelanggan', 1),
('Akmal', '41db9a1d4dc07a89b43937f70b8df34a', 'pelanggan', 1),
('Arkana', '76c2e8edae7769d6c48ea2add70e38a9', 'pelanggan', 1),
('rizan', '50e0e2f952f687c93d6786d013d1e8e4', 'pelanggan', 1),
('hasan', 'fc3f318fba8b3c1502bece62a27712df', 'pelanggan', 1),
('charis', '5e9ce1d4c1987cf43e94f61fb2cfa71f', 'pelanggan', 1),
('muhammadridho@gmail.com', '926a161c6419512d711089538c80ac70', 'produksi', 1),
('lusi', 'c842ecc88a0ff8fd0105eaeabf71999d', 'pelanggan', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_beli_produk`
--
ALTER TABLE `detail_beli_produk`
  ADD PRIMARY KEY (`id_detail_produk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_custom` (`id_custom`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
  ADD PRIMARY KEY (`id_ongkos`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `no_resi` (`no_transaksi`),
  ADD KEY `id_ongkos` (`id_ongkos`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `no_resi` (`no_transaksi`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_custom`
--
ALTER TABLE `produk_custom`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_beli_produk`
--
ALTER TABLE `detail_beli_produk`
  MODIFY `id_detail_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `produk_custom`
--
ALTER TABLE `produk_custom`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
