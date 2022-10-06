-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220624.eb939d71e5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 06:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_sivue`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_agenda` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_agenda` date NOT NULL,
  `waktu` time NOT NULL,
  `lokasi_agenda` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `nama_agenda`, `slug`, `tgl_agenda`, `waktu`, `lokasi_agenda`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Menghadiri Acara Makan Malam dengan Yayasan WWF Indonesia', 'menghadiri-acara-makan-malam-dengan-yayasan-wwf-indonesia', '2022-09-27', '17:00:00', 'Restoran Bumi Aki Bogor', '<p>Menghadiri Acara Makan Malam dengan Yayasan WWF Indonesia</p>', '2022-09-05 00:20:24', '2022-10-03 00:12:04'),
(3, 'Mengikuti Acara Jalan Jalan Pagi dengan Komunitas Alumni IPB', 'mengikuti-acara-jalan-jalan-pagi-dengan-komunitas-alumni-ipb', '2022-09-28', '06:00:00', 'Vimala Hills (Jl. Raya Puncak Simpang Raya Gadog, Ciawi Bogor)', '<p>Mengikuti Acara Jalan Jalan Pagi dengan Komunitas Alumni IPB</p>', '2022-09-05 00:20:32', '2022-10-03 00:25:33'),
(4, 'Menghadiri Acara Penyerahan Sertifikat PTSL dalam rangka Memperingati Hari Agraria dan Tata Ruang (Hantaru) Tahun 2022', 'menghadiri-acara-penyerahan-sertifikat-ptsl-dalam-rangka-memperingati-hari-agraria-dan-tata-ruang-hantaru-tahun-2022', '2022-09-28', '10:00:00', 'Mall Boxies 123', '<p>Menghadiri Acara Penyerahan Sertifikat PTSL dalam rangka Memperingati Hari Agraria dan Tata Ruang (Hantaru) Tahun 2022</p>', '2022-10-03 01:35:46', '2022-10-03 01:35:46'),
(5, 'Rapat Pembahasan Program Kota Pusaka Kota Bogor', 'rapat-pembahasan-program-kota-pusaka-kota-bogor', '2022-09-28', '12:00:00', 'Ruang Paseban Surawisesa', '<p>Rapat Pembahasan Program Kota Pusaka Kota Bogor</p>', '2022-10-03 01:44:51', '2022-10-03 01:44:51'),
(6, 'Rapat Lanjutan Pembahasan Raperda Perubahan APBD Tahun Anggaran 2022', 'rapat-lanjutan-pembahasan-raperda-perubahan-apbd-tahun-anggaran-2022', '2022-09-28', '14:00:00', 'Ruang Rapat Banggar', '<p>Rapat Lanjutan Pembahasan Raperda Perubahan APBD Tahun Anggaran 2022</p>', '2022-10-03 01:46:27', '2022-10-03 01:46:27'),
(7, 'Rapat Paripurna', 'rapat-paripurna', '2022-09-28', '19:30:00', 'Ruang Rapat Paripurna', '<p>Rapat Paripurna</p>', '2022-10-03 02:02:52', '2022-10-03 02:02:52'),
(8, 'Membuka Acara Implementasi Sistem Kerja dalam Pelaksanaan Tugas Perangkat Daerah Pasca Penyederhanaan Birokrasi', 'membuka-acara-implementasi-sistem-kerja-dalam-pelaksanaan-tugas-perangkat-daerah-pasca-penyederhanaan-birokrasi', '2022-10-03', '08:45:00', 'Zoom Meeting', '<p>Membuka Acara Implementasi Sistem Kerja dalam Pelaksanaan Tugas Perangkat Daerah Pasca Penyederhanaan Birokrasi</p>', '2022-10-03 02:03:39', '2022-10-03 02:03:39'),
(9, 'Membuka Acara FGD Penataan Batas Wilayah', 'membuka-acara-fgd-penataan-batas-wilayah', '2022-10-03', '09:00:00', 'Universitas Pakuan', '<p>Membuka Acara FGD Penataan Batas Wilayah</p>', '2022-10-03 02:04:20', '2022-10-03 02:04:20'),
(10, 'Audiensi dengan Komisi Penanggulangan Aids Daerah (KPA)', 'audiensi-dengan-komisi-penanggulangan-aids-daerah-kpa', '2022-10-03', '11:30:00', 'Ruang Rapat Sekda', '<p>Audiensi dengan Komisi Penanggulangan Aids Daerah (KPA)</p>', '2022-10-03 02:05:59', '2022-10-03 02:05:59'),
(11, 'Audiensi dengan Panitia Festival Bunga dan Buah Nusantara', 'audiensi-dengan-panitia-festival-bunga-dan-buah-nusantara', '2022-10-03', '13:00:00', 'Ruang Paseban Surawisesa', '<p>Audiensi dengan Panitia Festival Bunga dan Buah Nusantara</p>', '2022-10-03 02:06:30', '2022-10-03 02:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `album_foto`
--

CREATE TABLE `album_foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_album` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album_foto`
--

INSERT INTO `album_foto` (`id`, `judul`, `slug`, `foto`, `tgl_album`, `created_at`, `updated_at`) VALUES
(3, 'Sosialisasi PPK dan PP', 'sosialisasi-ppk-dan-pp', 'qPlizL079ldwWCVQy1v2jZb8jf032aji2mzutPmO.jpg', '2022-09-08', '2022-09-01 23:41:26', '2022-10-04 19:56:40'),
(4, 'Kegiatan Sekretariat Daerah', 'kegiatan-sekretariat-daerah', 'plgOGkhJh64o9KHgY6xIK7Gm3aTZSDQ8lohYaw3l.png', '2022-09-09', '2022-09-01 23:41:54', '2022-10-04 20:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_publish` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `judul`, `slug`, `kategori_id`, `gambar`, `tgl_publish`, `status`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Testing Upload File', 'testing-upload-file', 1, 'pN0qqjMZF8NJHIVog9iNFZVDSl6kSIuGyzG6uztv.jpg', '2022-08-18', '0', '', '2022-08-25 23:59:12', '2022-08-25 23:59:12'),
(2, 'PERUBAHAN RENSTRA SETDA 2020-2024', 'perubahan-renstra-setda-2020-2024', 2, 'T7jySHwTuLJ1hpUGImD2Rh2xJmQYH2YrQeON1bzU.jpg', '2022-08-25', '0', '', '2022-08-29 23:32:42', '2022-08-29 23:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `kategori_id`, `foto`, `isi`, `tgl`, `created_at`, `updated_at`) VALUES
(2, 'Jaga Stabilitas Harga, Pemkot Bogor Gelar Pasar Murah', 'jaga-stabilitas-harga-pemkot-bogor-gelar-pasar-murah', 1, 'W8FsASpFWv2pu972iM35Q1NN7u9bPC2x7Dpdgaom.jpg', '<p>Pemerintah Kota (Pemkot) Bogor ketiga kalinya menggelar Pasar Murah di Tahun 2022.</p>\r\n<p>Halaman Kantor Kelurahan Genteng, Kecamatan Bogor Selatan, dipilih sebagai lokasi dalam kegiatan yang secara langsung dibuka Sekretaris Daerah (Sekda) Kota Bogor, Syarifah Sofiah.</p>\r\n<p>Dalam pelaksanaan Pasar Murah, Pemkot Bogor melalui Dinas KUKM, Perdagangan dan Perindustrian (DinKUKM Dagin) Kota Bogor berkolaborasi dan bekerjasama dengan Warung Kumpulan (Warkum) dalam penyediaan kebutuhan pokok dan kebutuhan rumah tangga dengan harga terjangkau.</p>\r\n<p>&ldquo;Alhamdulillah ini kegiatan Pasar Murah yang ketiga kali. Semoga berkelanjutan mengingat animo masyarakat yang luar biasa karena harga kebutuhan pokok yang disediakan jauh lebih rendah dari retail,&rdquo; kata Sekda di Kantor Kelurahan Genteng, Kecamatan Bogor Selatan, Kota Bogor, Kamis (29/9/2022).</p>\r\n<p>Selaku Ketua TPID Kota Bogor, penyelenggaraan Pasar Murah tidak terlepas dari ikhtiar Pemkot Bogor dalam penanganan inflasi di samping upaya lain, diantaranya terus memonitor harga-harga bahan pokok di pasar.</p>\r\n<p>Ke depan Pemkot Bogor akan banyak hal-hal yang dilakukan terkait merespon kenaikan harga BBM sebagai pengendalian untuk menjaga stabilitas harga agar tidak terjadi gejolak dengan adanya subsidi.</p>\r\n<p>Selain pasar murah, langkah yang diambil untuk menangani potensi gejolak yang hadir kata Syarifah, akan dialokasikan sebesar 2 persen dari Dana Transfer Umum (DTU) untuk diberikan kepada masyarakat dengan tujuan menjaga peningkatan pendapatan masyarakat sehingga proses kehidupan rumah tangganya berjalan normal.</p>\r\n<p>\"Yang 2 persen akan kita berikan untuk para ojek online sekitar 1.000 orang dan pengemudi (sopir) sekitar 1.350-an orang. Sistemnya diberikan dalam voucher BBM tapi masih dalam kajian, jadi tidak dalam bentuk uang. Kegiatan lainnya adalah padat karya bagi warga yang tidak memiliki penghasilan tetap,\" tuturnya.</p>\r\n<p>Syarifah melanjutkan, berdasarkan pengesahan RAPBD untuk DTU akan ditambah sebesar Rp 2 miliar yang diperuntukkan untuk padat karya masyarakat, dimana sebesar Rp 1 miliar khusus diperuntukkan bagi perempuan yang menjadi kepala rumah tangga yang sudah tidak memiliki suami dan harus menghidupkan anaknya.</p>\r\n<p>\"Khusus padat karya para perempuan kepala keluarga, kegiatannya diserahkan kepada aparatur wilayah,\" ujarnya.</p>\r\n<p>Kepala DinKUKM Dagin Kota Bogor, Ganjar Gunawan&nbsp; menambahkan, kegiatan pasar murah bukan Operasi Pasar Murah (OPM) yang merupakan kegiatan subsidi. Kegiatan pasar akan dilaksanakan setiap kamis secara bergilir di setiap kecamatan. Pertama Pasar Murah digelar di Kecamatan Tanah Sareal, kemudian di kecamatan Bogor Utara.</p>\r\n<p>\"Kolaborasi Warkum sebagai mitra kami sebagai wujud komitmennya untuk menyiapkan barang kebutuhan pokok dan kebutuhan rumah tangga dengan harga dibawah retail dimana ini juga dikaitkan&nbsp; dalam usaha kami menangani inflasi daerah Kota Bogor,\" kata Ganjar.</p>\r\n<p>Camat Bogor Selatan, Hidayatullah menambahkan, kegiatan pasar murah yang digagas DinKUKM Dagin Kota Bogor bertujuan memberikan akses bagi warga mendapatkan produk untuk memenuhi kebutuhannya dengan harga terjangkau. Pemilihan Kelurahan Genteng sebagai lokasi pasar murah sesuai dengan masukan warga.</p>\r\n<p>\"Jadi ini dalam rangka pemerataan akses bagi warga untuk memenuhi kebutuhannya. Kurang lebih ada 400 kebutuhan bahan pokok yang disediakan,\" katanya.(Prokompim).</p>', '2022-10-01', '2022-08-23 00:31:39', '2022-10-02 21:35:11'),
(3, 'Minta Percepatan Capaian Imunisasi, Bima Arya Tugaskan Gencarkan Sosialisasi dan Edukasi', 'minta-percepatan-capaian-imunisasi-bima-arya-tugaskan-gencarkan-sosialisasi-dan-edukasi', 2, '4wtMStSRFUlakzIWKIUiCT8ZNu9adYY6RC4pzJXs.jpg', '<p>Wali Kota Bogor Bima Arya Sugiarto meminta agar capaian target imunisasi di Kota Bogor dipercepat. Saat ini Bulan Imunisasi Anak Nasional (BIAN) masih terus berlangsung dan dilaksanakan di posyandu, puskesmas serta fasilitas pelayanan kesehatan atau rumah sakit. Imunisasi untuk anak usia 9 - 59 bulan ini gratis, aman dan berkualitas.</p>\r\n<p>Bima meminta kepada apratur wilayah, Dinas Kesehatan serta para asisten ikut membantu proses percepatan target imunisasi. Ia menugaskan agar aparatur wilayah melakukan edukasi, sosialisasi untuk mengajak masyarakat melakukan imunisasi.</p>\r\n<p>Mengenai capaian vaksinasi kata dia beberapa kecamatan dan kelurahan yang mencapai capaian tertinggi diantaranya Kecamatan Bogor Timur, Kecamatan Bogor Barat dan Kecamatan Tanah Sareal.</p>\r\n<p>Sedangkan di kelurahan yang mendapat capaian tertinggi adalah Kelurahan Situ Gede, Margajaya, Kayu Manis dan Sukadamai yang mencapai target lebih dari 100 persen. \"Jadi ini harus terus dikejar. Lakukan pencatatan, pendataan kemudian pendaftaran semua anak-anak usia 9 - 59 bulan harus dimunisasi,\" ujarnya saat brifing staf, Selasa (27/9/2022).</p>\r\n<p>Pada BIAN bulan ini sasaran imunisasi MR (Campak-Rubela) ada sebanyak 71.206 anak dengan target 95 persen sasaran.</p>\r\n<p>Dari target tersebut realisasi tingkat kota per 26 September baru 77,65% atau masih tersisa : 17,35% hingga Jumat, 30 September.</p>\r\n<p>Dilokasi terpisah Sekretaris Dinas Kesehatan (Dinkes) Kota Bogor, Erna Nuraena mengatakan BIAN melindungi anak Indonesia dari penyakit-penyakit yang dapat dicegah dengan Imunisasi. BIAN adalah pemberian imunisasi tambahan Campak-Rubela serta melengkapi dosis Imunisasi Polio dan DPT-HB-Hib yang terlewat.</p>\r\n<p>Manfaat BIAN dapat mencegah kesakitan dan kecacatan akibat Campak, Polio, Pertusis (batuk rejan), Rubela, Difteri, Hepatitis B, Pneumonia (radang paru), Meningitis (radang selaput otak).</p>\r\n<p>\"Sasarannya yaitu imunisasi tambahan campak-rubela yaitu anak usia 9 - 59 bulan tanpa melihat status imunisasi campak-rubela sebelumnya. Sasaran imunisasi kejar yaitu anak usia 12-59 bulan untuk melengkapi status imunisasi yang terlewat/belum lengkap,\" katanya.</p>\r\n<p>Pelaksanaan ini diperpanjang hingga 30 September 2022 di Posyandu, Puskesmas serta rumah sakit.(Prokompim).</p>', '2022-10-01', '2022-08-23 02:14:03', '2022-10-02 23:57:57'),
(4, 'Bima Arya Pimpin Upacara Hari Kesaktian Pancasila di Bantaran Sungai, Ajak Bebersih Lingkungan', 'bima-arya-pimpin-upacara-hari-kesaktian-pancasila-di-bantaran-sungai-ajak-bebersih-lingkungan', 4, 'XfDX6xQPKwWeHTC7FAiBhaiGAjHrcR1hS289Kecw.jpg', '<p>Wali Kota Bogor, Bima Arya menjadi inspektur upacara Hari Kesaktian Pancasila yang dilakukan di bantaran Sungai Ciliwung, Jalan Sukamulya, RT02/03, Kelurahan Sukasari, Kecamatan Bogor Timur, Kota Bogor, Sabtu (1/10/2022).&nbsp;</p>\r\n<p>Pada peringatan Hari Kesaktian Pancasila 2022 dengan tema \'Bangkit Bergerak Bersama Pancasila\', Bima Arya mengajak jajarannya di Lingkungan Pemerintah Kota (Pemkot) Bogor, warga, serta berbagai elemen masyarakat membumikan Pancasila untuk Bumi yang lestari.</p>\r\n<p>Untuk itu pelaksanaan peringatan upacara Hari Kesaktian Pancasila tingkat Kota Bogor dilaksanakan di bantaran sungai yang dilanjutkan dengan aksi nyata bebersih sungai dan gerakan pungut sampah.</p>\r\n<p>Upacara yang berlangsung sejak pukul 08.00 WIB ini juga dihadiri Wakil Ketua 1 DPRD Kota Bogor, Jenal Mutaqin, Forum Komunikasi Pimpinan Daerah (Forkompinda) Kota Bogor, Sekretaris Daerah (Sekda) Kota Bogor, Syarifah Sofiah, penggiat lingkungan, Basolia dan warga.</p>\r\n<p>Petugas upacara Hari Kesaktian Pancasila sebagai perwira upacara oleh Camat Bogor Timur, Rena Da frina, Komandan upacara Lurah Sukasari, Surya Hasan, pembaca teks Pancasila Ketua RT02 Djamaluddin, Pembukaan UUD 1945 oleh Ketua LPM Iskandar, Ikra Kesaktian Pancasila oleh Ketua RW 05 Wiwi Windarsih.</p>\r\n<p>Dalam amanatnya, Bima Arya mengingatkan bahwa Pancasila bukan hanya slogan melainkan sebagai pandangan hidup dan pedoman untuk berbangsa dan berperilaku. Ia mengingatkan agar tidak banyak berbicara dan beretorika karena seringkali apa yang diucapkan berbeda dengan yang dilakukan, sehingga tidak akan sesuai dengan apa yang dicita-citakan oleh pendiri bangsa.</p>\r\n<p>Pada kesempatan itu Bima Arya juga menyoroti beberapa kasus dan kerusakan lingkungan.</p>\r\n<p>\"Kalau lima sila itu kita selalu ingat dan selalu kita pegang, tidak akan ada persoalan sampah, tidak ada persoalan lingkungan yang disebabkan oleh keteledoran manusia. Kita akan ingat bahwa Tuhan menciptakan ini untuk semua, bukan untuk satu kelompok saja,\" ujarnya.</p>\r\n<p>Sebagai manusia, lanjut dia seharusnya setiap orang bisa bersikap adil dan bertindak secara beradab, bergotong royong sehingga banyak persoalan lingkungan yang bisa diselesaikan</p>\r\n<p>\"Kalau kita gemar bermusyawarah, mencari titik temu, mencari rumusan yang ideal untuk mengawasi lingkungan maka persoalannya tidak akan menggunung seperti ini,\" katanya.</p>\r\n<p>Untuk itu kata dia, upacara peringatan Hari Kesaktian Pancasila tingkat Kota Bogor dilaksanakan di bantaran Sungai Ciliwung dengan aksi dan tindakan untuk terus membumikan pancasila, menyatukan antara kata dan tindakan.</p>\r\n<p>\"Insya Allah kita tidak akan kendor untuk berbicara membuat bumi ini lestari. Baik urusan sampah disungai, baik persoalan limbah di berbagai tempat, baik juga di bidang edukasi. Kita harus terus mengingatkan kepada warga,\" katanya.</p>\r\n<p>Ia menyadari bahwa perbaikan lingkungan harus dilakukan serentak oleh lintas instansi, lintas sektor dan warga. Kendalanya adalah ketika wilayah ingin memperbaiki lingkungan, namun tersendat oleh adanya kewenangan dan perizinan birokrasi yang membuat perbaikan lingkungan juga menghadapi tantangan.</p>\r\n<p>\"Jadi ini juga kita sampaikan pesan kepada semua instansi untuk kembali lagi kepada Pancasila. Kalau kita berpegang pada sila ke empat, maka persoalan ini akan selesai, kita tidak akan kesulitan untuk menata sungai kita sendiri, untuk menata rumah kita sendiri, untuk menata lingkungan kita sendiri. Semoga lurah camat dan aparatur akan selalu ingat apa yang dilakukan bukan untuk wali kota, tapi untuk kepentingan semua.&nbsp;<br />Untuk menciptakan keadilan bagi seluruh rakyat Indonesia. Mari kira turun bersama-sama, kita bumikan pancasila bersama untuk bumi yang lestari,\" ujarnya.</p>\r\n<p>Sementara itu Ketua RW 5, Wiwi Windarsih merasa sangat bangga bisa terlibat dan diikutsertakan dalam Peringatan Hari Kesaktian Pancasila.</p>\r\n<p>Ia pun pertama kali bertugas menjadi petugas upacara sehingga bisa menjadi semangat bagi pengurus ataupun warga di wilayah untuk turut serta membumikan Pancasila.</p>\r\n<p>\"Harapan saya, &nbsp;khususnya untuk masyarakat di kami dan umumnya Indonesia agar lebih baik bisa bersinergi bekerja sama membangun wilayah, menjaga wilayah untuk menciptakan suasana yang aman nyaman dan kondusif,\" ujarnya.</p>\r\n<p>Mengenai arahan untuk menjaga lingkungan kata Wiwi, sejak adanya program naturalisasi Ciliwung yang digagas Pemkot Bogor dirinya rutin melakukan edukasi dan sosialisasi serta mengajak warga kerja bakti satu minggu sekali untuk membersihkan lingkungan.</p>\r\n<p>Usai melaksanakan upacara, Bima Arya, bersama peserta upacara dan warga berkeliling di bantaran sungai membersihkan sampah yang dipungut karena terbawa luapan air sungai ketika pasang. Dalam kegiatan itu terkumpul banyak karung sampah hasil dari bebersih sungai.</p>\r\n<p>Selanjutnya Bima Arya pun melakukan pemantauan wilayah dengan menyusuri pemukiman padat dan fasilitas umum yang ada di tengah pemukiman warga.(Prokompim).</p>', '2022-10-03', '2022-08-23 02:14:43', '2022-10-05 19:44:27'),
(5, 'Meriahkan WWD dan Hari Batik, Ibu-ibu Jalan Kaki Kenakan Kain Batik', 'meriahkan-wwd-dan-hari-batik-ibu-ibu-jalan-kaki-kenakan-kain-batik', 2, 'lVEFOKUtzhvtg3kEXyVeKPJIjcdBC5O0iY2cXn89.jpg', '<p>Peringatan World Walking Day (WWD) atau Hari berjalan Kaki Sedunia pertama di Indonesia sukses digelar di Kota Bogor, Minggu (2/10/2022).&nbsp;</p>\r\n<p>Event Nasional yang diikuti ribuan peserta dari semua elemen masyarakat ini tidak hanya sekedar berjalan kaki dari GOR Pajajaran ke Lapangan Sempur. Lebih dari itu, ribuan peserta WWD dari berbagai komunitas juga turut merayakan Hari Batik Nasional dengan memakai kain batik dan aksesoris batik.&nbsp;</p>\r\n<p>\"Kami ibu-ibu dari Komunitas Perempuan Berkebaya Indonesia Cabang Bogor sangat senang bisa bergabung di acara ini. Hari ini kami memakai kebaya dan karena bertepatan dengan Hari Batik kami memakai kain batik,\" ujar Ketua Perempuan Berkebaya Indonesia (PBI) Cabang Bogor, Sitawati Ken Utami.</p>\r\n<p>Sita akrab disapa mengatakan, 50 anggota PBI yang ikut berpartisipasi di WWD memakai kain batik yang nyaman untuk kondisi di lapangan dan sepatu olahraga. Pihaknya memang sudah terbiasa berkegiatan dan berpartisipasi di berbagai kegiatan dengan memakai kebaya dan kain batik.&nbsp;</p>\r\n<p>\"Di acara ini kami sekaligus mengajak masyarakat dan anak muda bisa lebih sering memakai kebaya, karena berjalan kaki dengan kebaya masih tetap nyaman,\" tuturnya.</p>\r\n<p>PBI kata Sita, baru saja mengadakan acara Kebaya Goes to Campus di Fisip UI dan berencana akan membuat acara serupa di Bogor.&nbsp;</p>\r\n<p>Tak hanya itu, di momentum hari batik Nasional ini pihaknya semakin gencar untuk membawa kebaya ke UNESCO untuk ditetapkan sebagai warisan kemanusiaan untuk budaya lisan dan nonbendawi seperti halnya UNESCO menetapkan Batik sebagai warisan budaya Indonesia pada 2009 silam.</p>\r\n<p>\"Berbagai kegiatan sudah kami laksanakan mulai dari event, kajian dan meminta dukungan kebijakan pemerintah. Saat ini sudah tahap pembahasan di Kemendikbud Ristek. Jadi semakin banyak warga yang pakai kebaya akan jadi penilaian juga dari UNESCO,\" tegasnya.</p>\r\n<p>Di tempat yang sama, Ketua Koalisi Pejalan Kaki Bogor (KPKB) Irma Kusumawati mengatakan, pihaknya sangat antusias sekaligus bangga dengan kegiatan WWD. Selain karena kegiatan seperti ini sudah cukup lama tidak ada, juga karena bisa berjalan kaki jarak terpendek bersama-sama dengan memakai aksesoris batik di hari Batik Nasional.</p>\r\n<p>\"Rutenya kan tidak terlalu jauh, banyak warga yang antusias ikut, ini jadi permulaan dan momentum yang baik, karena kami di WWD tidak hanya berjalan kaki saja tapi juga melakukan sosialisasi dan edukasi ke warga,\" jelasnya.</p>\r\n<p>Ia menuturkan, sejauh ini berdasarkan pengamatannya, warga Bogor semangat berjalan kakinya baru terbatas di Sabtu dan Minggu saja. Sementara untuk berjalan kaki dari rumah ke kantor atau di hari kerja belum banyak yang melakukan karena berbagai hal.</p>\r\n<p>\"Jadi kondisi jalan di Kota Bogor ini serba nanggung, kalau jalan kaki lumayan jauh tapi kalau naik angkot terlalu dekat ditambah Bogor kota hujan, jadi kalau jalan kaki saat hujan susah cari tempat teduhnya,\" katanya.</p>\r\n<p>Meski begitu, ia mengakui infrastruktur pedestrian yang ada di Kota Bogor sudah jauh lebih baik dan lebih nyaman. Ia pun berharap sebagai warga Bogor siapapun nanti pemimpinnya tetap melanjutkan pembangunan pedestrian dan warga bisa memelihara pedestrian.</p>\r\n<p>\"Harus bisa memelihara infrastrukturnya, yang tidak berhak di trotoar jangan malah menempati trotoar, sementara kenyamanan pejalan kaki jadi diabaikan,\" katanya.(Prokompim).</p>', '2022-10-03', '2022-10-05 19:33:27', '2022-10-05 19:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `berita_tag`
--

CREATE TABLE `berita_tag` (
  `berita_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita_tag`
--

INSERT INTO `berita_tag` (`berita_id`, `tag_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Testing 00', 'Testing-001', '2022-08-01 07:00:20', '2022-08-01 07:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `data_statis`
--

CREATE TABLE `data_statis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_statis`
--

INSERT INTO `data_statis` (`id`, `judul`, `slug`, `kategori_id`, `file`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Testing Upload File', 'testing-upload-file', 1, 'V6a1XE1H4JCIGwYc2pGIdujI6WVQquZTN6AC32ra.jpg', '<p>Testing Upload File</p>', '2022-08-23 02:01:19', '2022-08-23 02:01:19'),
(2, 'PERUBAHAN RENSTRA SETDA 2020-2024', 'perubahan-renstra-setda-2020-2024', 1, '6kRS8equivaqgzg75sbV22lCqQ75HegVhweN0xVK.pdf', '<p>PERUBAHAN RENSTRA SETDA 2020-2024</p>', '2022-08-23 02:01:49', '2022-08-23 02:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumens`
--

INSERT INTO `dokumens` (`id`, `judul`, `slug`, `kategori_id`, `file`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'PERUBAHAN RENSTRA SETDA 2020-2024', 'perubahan-renstra-setda-2020-2024', 1, 'pbyqqTHXXmexDavqqUbmmzulOq9NWLmmXvQq67lC.pdf', '<p>asd</p>', '2022-09-05 00:34:50', '2022-09-05 00:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `content`, `location`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Testing Programming', 'testing-programming', '<p>Contoh Isi Agneda</p>', 'Contoh Lokasi Agenda', '2022-08-24', '2022-08-19 00:09:09', '2022-08-19 00:09:09'),
(2, 'Testing Aja', 'testing-aja', '<p>public_html/labkesda2022/application/third_party/MX</p>', 'public_html/labkesda2022/application/third_party/MX', '2022-08-25', '2022-08-23 00:26:53', '2022-08-23 00:26:53'),
(3, 'Contoh Data Statis 001', 'contoh-data-statis-001', '<p>Contoh Data Statis 001</p>', 'public_html/labkesda2022/application/third_party/MX', '2022-08-09', '2022-08-23 00:59:23', '2022-08-23 00:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri_foto`
--

CREATE TABLE `galeri_foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(11) NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri_foto`
--

INSERT INTO `galeri_foto` (`id`, `album_id`, `slug`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 3, 'sosialisasi-ppk-dan-pp-1', 'hUwQD7ftvoaS2KdL6ck6zRvPbBsgmOH7AYSgfkUa.jpg', 'Sosialisasi PPK dan PP 1', '2022-10-04 20:14:26', '2022-10-04 20:14:26'),
(3, 4, 'paripurna-pemkot-bogor-serahkan-tiga-draft-raperda', 'uQuH0ULbronpT6iZ6vRReHkx6yZaWEb4YWLk33nr.png', 'Paripurna, Pemkot Bogor Serahkan Tiga Draft Raperda', '2022-10-04 20:30:45', '2022-10-04 20:30:45'),
(4, 4, 'sosialisasi-perundingan-perdagangan-internasional-kota-bogor-siap-jadi-hub-rcep', '3AdCjuPYPhhfoIFhhmXGcrF0wKpXFZYM0IGKkC2H.png', 'Sosialisasi Perundingan Perdagangan Internasional, Kota Bogor Siap jadi Hub RCEP', '2022-10-04 20:31:52', '2022-10-04 20:31:52'),
(5, 4, 'sekda-syarifah-tinjau-tes-cpns-pemkot-bogor-hari-pertama', '7icOd5kMjM6gegrVbnpJ2L5I2zt9AkvpzoAfpdgD.png', 'Sekda Syarifah Tinjau Tes CPNS Pemkot Bogor Hari Pertama', '2022-10-04 20:37:24', '2022-10-04 20:37:24'),
(6, 4, 'sekda-syarifah-resmikan-masjid-an-naba-pwi-kota-bogor', '8BFiCIvIZVAzfUszJgy6ahW8ASsQAxVvhHkREW83.png', 'Sekda Syarifah Resmikan Masjid An-Naba PWI Kota Bogor', '2022-10-04 20:42:37', '2022-10-04 20:42:37'),
(7, 4, 'sekda-dan-wakil-ketua-tp-pkk-olah-tempe-jadi-kerupuk-rosta-di-bojongkerta', '3s4CNviBdKSlAz4iSYGqE4lPrqExy34MvmXNScOZ.jpg', 'Sekda dan Wakil Ketua TP PKK Olah Tempe Jadi Kerupuk Rosta di Bojongkerta', '2022-10-04 20:43:10', '2022-10-04 20:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_vidio`
--

CREATE TABLE `galeri_vidio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed_vidio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_banners`
--

CREATE TABLE `kategori_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_banners`
--

INSERT INTO `kategori_banners` (`id`, `kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kategori Banner 01', 'kategori-banner-01', '2022-08-25 23:57:03', '2022-08-25 23:58:53'),
(2, 'Kategoru Banner 02', 'kategoru-banner-02', '2022-08-29 23:30:09', '2022-08-29 23:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pemerintah, Peraturan, dan Pembangunan', 'pemerintah-peraturan-dan-pembangunan', '2022-08-22 23:58:35', '2022-10-04 01:29:36'),
(2, 'Ekonomi, Wisata, dan Sosial Masyarakat', 'ekonomi-wisata-dan-sosial-masyarakat', '2022-08-22 23:58:55', '2022-10-04 01:29:40'),
(3, 'Kesehatan dan Olahraga', 'kesehatan-dan-olahraga', '2022-08-22 23:59:04', '2022-10-04 01:28:38'),
(4, 'Pendidikan', 'pendidikan', '2022-10-02 21:22:54', '2022-10-04 01:28:15'),
(5, 'Umum', 'umum', '2022-10-03 00:02:33', '2022-10-04 01:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_data`
--

CREATE TABLE `kategori_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_id` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_data`
--

INSERT INTO `kategori_data` (`id`, `kategori`, `slug`, `isi`, `data_id`, `created_at`, `updated_at`) VALUES
(1, 'testing', 'testing', 'testing', '0', '2022-08-01 09:00:20', '2022-08-01 09:00:20'),
(2, 'Testing Kategori 01', 'testing-kategori-01', '<p>Testing Kategori 01</p>', '0', '2022-08-24 18:48:08', '2022-08-24 18:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_15_005324_create_permission_tables', 1),
(6, '2022_05_15_011629_create_tags_table', 1),
(7, '2022_05_15_011755_create_categories_table', 1),
(8, '2022_05_15_011848_create_posts_table', 1),
(9, '2022_05_15_012230_create_events_table', 1),
(10, '2022_05_15_012427_create_photos_table', 1),
(11, '2022_05_15_012552_create_videos_table', 1),
(12, '2022_05_15_012649_create_sliders_table', 1),
(13, '2022_06_07_074718_create_kategori_data_table', 1),
(14, '2022_06_09_064618_create_data_statis_table', 1),
(15, '2022_06_22_082012_create_kategori_berita_table', 1),
(16, '2022_06_22_082156_create_berita_table', 1),
(17, '2022_06_24_015830_create_tag_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'posts.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(2, 'posts.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(3, 'posts.edit', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(4, 'posts.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(5, 'tags.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(6, 'tags.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(7, 'tags.edit', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(8, 'tags.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(9, 'categories.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(10, 'categories.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(11, 'categories.edit', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(12, 'categories.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(13, 'events.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(14, 'events.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(15, 'events.edit', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(16, 'events.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(17, 'photos.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(18, 'photos.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(19, 'photos.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(20, 'videos.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(21, 'videos.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(22, 'videos.edit', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(23, 'videos.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(24, 'sliders.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(25, 'sliders.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(26, 'sliders.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(27, 'roles.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(28, 'roles.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(29, 'roles.edit', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(30, 'roles.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(31, 'permissions.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(32, 'users.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(33, 'users.create', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(34, 'users.edit', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(35, 'users.delete', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(36, 'dokumens.index', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55'),
(37, 'dokumens.create', 'web', '2022-08-22 04:49:39', '2022-08-22 04:49:39'),
(38, 'dokumens.edit', 'web', '2022-08-22 04:49:39', '2022-08-22 04:49:39'),
(39, 'dokumens.delete', 'web', '2022-08-22 04:50:17', '2022-08-22 04:50:17'),
(40, 'beritas.index', 'web', '2022-08-17 06:42:43', '2022-08-09 06:42:47'),
(41, 'beritas.create', 'web', '2022-08-01 06:42:49', '2022-08-01 06:42:52'),
(42, 'beritas.edit', 'web', '2022-08-01 06:42:54', '2022-08-01 06:42:56'),
(43, 'beritas.delete\n', 'web', '2022-08-01 06:43:01', '2022-08-01 06:43:03'),
(44, 'katberitas.index', 'web', '2022-08-01 06:54:12', '2022-08-01 06:54:12'),
(45, 'katberitas.create', 'web', '2022-08-01 06:54:12', '2022-08-01 06:54:12'),
(46, 'katberitas.edit', 'web', '2022-08-01 06:54:12', '2022-08-01 06:54:12'),
(47, 'katberitas.delete', 'web', '2022-08-01 06:54:12', '2022-08-01 06:54:12'),
(48, 'datastatis.index', 'web', '2022-08-01 07:46:00', '2022-08-01 07:46:00'),
(49, 'datastatis.create', 'web', '2022-08-01 07:46:00', '2022-08-01 07:46:00'),
(50, 'datastatis.edit', 'web', '2022-08-01 07:46:31', '2022-08-01 07:46:31'),
(51, 'datastatis.delete', 'web', '2022-08-01 07:46:31', '2022-08-01 07:46:31'),
(52, 'katdatas.index', 'web', '2022-08-01 07:46:31', '2022-08-01 07:46:31'),
(53, 'katdatas.create', 'web', '2022-08-01 07:46:31', '2022-08-01 07:46:31'),
(54, 'katdatas.edit', 'web', '2022-08-01 07:46:31', '2022-08-01 07:46:31'),
(55, 'katdatas.delete', 'web', '2022-08-01 07:46:31', '2022-08-01 07:46:31'),
(56, 'banners.index', 'web', '2022-08-01 03:19:48', '2022-08-01 03:19:48'),
(57, 'banners.create', 'web', '2022-08-01 03:19:48', '2022-08-01 03:19:48'),
(58, 'banners.edit', 'web', '2022-08-01 03:20:33', '2022-08-01 03:20:33'),
(59, 'banners.delete', 'web', '2022-08-01 03:20:33', '2022-08-01 03:20:33'),
(60, 'katbanners.index', 'web', '2022-08-01 04:29:37', '2022-08-01 04:29:37'),
(61, 'katbanners.create', 'web', '2022-08-01 04:29:37', '2022-08-01 04:29:37'),
(62, 'katbanners.edit', 'web', '2022-08-01 04:30:11', '2022-08-01 04:30:11'),
(63, 'katbanners.delete', 'web', '2022-08-01 04:30:11', '2022-08-01 04:30:11'),
(64, 'albums.index', 'web', '2022-09-01 04:25:44', '2022-09-01 04:25:44'),
(65, 'albums.create', 'web', '2022-09-01 04:25:44', '2022-09-01 04:25:44'),
(66, 'albums.edit', 'web', '2022-09-01 04:26:37', '2022-09-01 04:26:37'),
(67, 'albums.delete', 'web', '2022-09-01 04:26:37', '2022-09-01 04:26:37'),
(68, 'galeriphotos.index', 'web', '2022-09-15 06:46:08', '2022-09-05 06:46:08'),
(69, 'galeriphotos.create', 'web', '2022-09-14 06:46:08', '2022-09-08 06:46:08'),
(70, 'galeriphotos.edit', 'web', '2022-09-11 06:46:42', '2022-09-11 06:46:42'),
(71, 'galeriphotos.delete', 'web', '2022-09-14 06:46:42', '2022-09-07 06:46:42'),
(72, 'fotos.index', 'web', '2022-09-04 02:48:44', '2022-09-04 02:48:44'),
(73, 'fotos.create', 'web', '2022-09-04 02:48:44', '2022-09-04 02:48:44'),
(74, 'fotos.edit', 'web', '2022-09-04 02:49:30', '2022-09-04 02:49:30'),
(75, 'fotos.delete', 'web', '2022-09-04 02:49:30', '2022-09-04 02:49:30'),
(76, 'agendas.index', 'web', '2022-09-04 06:50:22', '2022-09-04 06:50:22'),
(77, 'agendas.create', 'web', '2022-09-04 06:50:22', '2022-09-04 06:50:22'),
(78, 'agendas.edit', 'web', '2022-09-04 06:50:49', '2022-09-04 06:50:49'),
(79, 'agendas.delete', 'web', '2022-09-04 06:50:49', '2022-09-04 06:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `image`, `caption`, `created_at`, `updated_at`) VALUES
(1, 'TYn6pkQ1o9KevtDgEtdgUfH3rOJep66Q7F9wpyKp.jpg', 'FOTO RAPAT', '2022-08-22 00:01:07', '2022-08-22 00:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-07-24 03:21:55', '2022-07-24 03:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_publish` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `judul`, `slug`, `gambar`, `tgl_publish`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SETDA KOTA BOGOR', 'setda-kota-bogor', '7WrRHqdyIYFShFk22vPJraJbFDd6zAxRgAihoaWW.jpg', '2022-08-14', '1', '2022-09-19 20:33:43', '2022-09-27 01:25:53'),
(2, 'SEKRETARIAT DAERAH KOTA BOGOR', 'sekretariat-daerah-kota-bogor', '1BS9Nc2Q0DQBVzZ5Bv2bgVuTlI1CfjotxQyY86z7.jpg', '2022-08-28', '1', '2022-09-19 23:11:22', '2022-09-27 01:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pemerintah', 'pemerintah', '2022-08-22 23:41:27', '2022-08-22 23:41:27'),
(2, 'Setda', 'setda', NULL, NULL),
(3, 'Kota Bogor', 'kota-bogor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fika Ridaul Maulayya', 'admin@gmail.com', NULL, '$2y$10$03dv0g1Xg99kHbS40Qy.0OXR3vwCwawl7hZoRqh03IRHeCyasQ/FS', NULL, '2022-07-24 03:21:55', '2022-07-24 03:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `embed`, `created_at`, `updated_at`) VALUES
(1, 'PENGADAAN LANGSUNG SPSE 4.3 (Transaksional & Pencatatan)', 'https://www.youtube.com/embed/LCEOLH2RPDE', '2022-09-27 01:31:18', '2022-09-27 20:45:10'),
(2, 'Ibu Sekda Kota Bogor Tentang Teras Surken Pusat Kuliner Bogor', 'https://www.youtube.com/embed/4n3j0fyzvE4', '2022-09-27 20:46:58', '2022-09-27 20:46:58'),
(3, 'Sekretaris Daerah (SEKDA) Kota Bogor, Syarifah Sofiah Bersilaturahmi dengan Pengurus PWI Kota Bogor', 'https://www.youtube.com/embed/A_wuDuD8cyA', '2022-09-27 20:51:07', '2022-09-27 20:51:07'),
(4, 'Mengenal Lebih Dekat DR. Ir. Hj. syarifah Sofiah Dwikrowati, M,Si (Sekda Kota Bogor) | B.Talk - #1', 'https://www.youtube.com/embed/8knDpb4odcY', '2022-09-27 20:55:15', '2022-09-27 20:55:15'),
(5, 'Pengalaman Covid-19 Sekda Kota Bogor | B.Talk - #2', 'https://www.youtube.com/embed/oBU3mJafI2I', '2022-09-28 20:33:44', '2022-09-28 20:33:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_foto`
--
ALTER TABLE `album_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_statis`
--
ALTER TABLE `data_statis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_statis_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_statis_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_vidio`
--
ALTER TABLE `galeri_vidio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_banners`
--
ALTER TABLE `kategori_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_data`
--
ALTER TABLE `kategori_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `album_foto`
--
ALTER TABLE `album_foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_statis`
--
ALTER TABLE `data_statis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galeri_vidio`
--
ALTER TABLE `galeri_vidio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_banners`
--
ALTER TABLE `kategori_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_data`
--
ALTER TABLE `kategori_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
