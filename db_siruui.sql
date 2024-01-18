-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2023 at 04:57 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siruui`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nama` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telpon` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `no_telpon`, `gambar`) VALUES
(1, 'Super Admin', 'admin', '$2y$10$j5LlSIrI9HDJ5j82GYPrBeBZJcLLpa0QmgZwNInrSHLvVX.4Bvvl2', '082215514446', 'PIA24794-MarsIngenuityHelicopter-Logbook-Flt910-20210816.jpg'),
(5, 'Muhammad Mirza', 'za', '$2y$10$yYkHXwxQ3ypVpMGfbBrxQuClT7GqnmXNxNIpr2/XJlSulEar2SMsi', '082215514446', 'logo_departemen_agama.png');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int NOT NULL,
  `nim` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `id_prodi` int NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telpon` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `nim`, `nama`, `id_prodi`, `username`, `password`, `no_telpon`, `gambar`) VALUES
(1, '171041020019', 'Zhafran Mauliddin', 6, '171041020019', '$2y$10$L..PzAcXQc6u5Cq1CLPk4.4FTaF2nG9mOu8U.I.BSkU5k3Ow3TFou', '085280526206', 'ZHAFRAN_MAULIDDIN.jpg'),
(4, '171041020024', 'Dwiandri Ilham Maula', 6, '171041020024', '$2y$10$F3jh9KHcb6iRSI6uDtU4LeRwMflU7texxJ3ZsMLjDOyNlkeaV0Tbi', '082304417331', 'dwiandri_ilham_maulana.jpg'),
(5, '171041020023', 'Muhammad Hadi Asy\'ar', 6, '171041020023', '$2y$10$qEScde2u0vcaxmbXMqsanOgbO2H84s9pFeZlS2fGazrGYMqL2zPQC', '081290501465', 'MUHAMMAD_HADI_ASYARI.jpg'),
(6, '171010600011', 'Salmiati', 10, '171010600011', '$2y$10$S3RziBB4qhK4OIerGv465uJJyqjLWYn.8TYMoTF1MCNDpruk7I0eK', '082366308004', 'SALMIATI.jpg'),
(7, '171041120012', 'Risfan Nazar Saputra', 7, '171041120012', '$2y$10$QiUydZXmQtVHeHQJ8mDpJOQQNaqxLoGAQN5Iwm/SvADEFxSCXgwgC', '082262472727', 'Risfan_Nazar_Saputra.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `count_donwload_jurnal`
--

CREATE TABLE `count_donwload_jurnal` (
  `ip` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `id_tugas_akhir` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `count_donwload_jurnal`
--

INSERT INTO `count_donwload_jurnal` (`ip`, `id_tugas_akhir`) VALUES
('::1', 1),
('10.140.159.247', 1),
('10.140.213.9', 1),
('10.140.156.215', 1),
('10.115.187.233', 1),
('10.115.187.233', 2),
('::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `count_donwload_ta`
--

CREATE TABLE `count_donwload_ta` (
  `ip` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `id_tugas_akhir` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `count_donwload_ta`
--

INSERT INTO `count_donwload_ta` (`ip`, `id_tugas_akhir`) VALUES
('::1', 1),
('10.140.159.247', 1),
('10.140.156.215', 1),
('10.115.187.233', 2),
('::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `count_view`
--

CREATE TABLE `count_view` (
  `ip` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `count_view`
--

INSERT INTO `count_view` (`ip`) VALUES
('::1'),
('10.140.156.215'),
('10.115.187.233');

-- --------------------------------------------------------

--
-- Table structure for table `count_view_ta`
--

CREATE TABLE `count_view_ta` (
  `ip` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `id_tugas_akhir` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `count_view_ta`
--

INSERT INTO `count_view_ta` (`ip`, `id_tugas_akhir`) VALUES
('::1', 1),
('::1', 2),
('10.140.130.140', 1),
('10.140.159.247', 1),
('10.140.213.9', 1),
('10.140.213.9', 2),
('10.140.156.215', 1),
('10.115.187.233', 1),
('10.115.187.233', 2),
('::1', 3),
('::1', 4),
('::1', 5),
('::1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int NOT NULL,
  `nama` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(1, 'Fakultas Sosial Sains dan Ilmu Pendidikan'),
(2, 'Fakultas Sains dan Teknologi'),
(3, 'Fakultas Ilmu Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id` int NOT NULL,
  `nama` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `id_prodi` int NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kaprodi`
--

INSERT INTO `kaprodi` (`id`, `nama`, `id_prodi`, `username`, `password`, `gambar`) VALUES
(23, 'Ridwal Kamil', 5, 'as', '$2y$10$pWMwjbvVXIZ1RIa9.4Gad.LoHdWX5jBuAvF0gr05Z8hLGwAjDPqei', 'PIA24794-MarsIngenuityHelicopter-Logbook-Flt910-20210816.jpg'),
(24, 'Zulkarnaini', 7, 'si', '$2y$10$u.032AiWwNWGDhZCLA80uu7SnDb35Q7iCup4xW4PU9OrJS/XwnRwy', 'no_image'),
(25, 'Farras Akram. M.SI', 6, 'ti', '$2y$10$deTvea9zFVu1cWUfQG605Okt4ZGJd3DEpI8CcP3/msq1KbavVD/nq', 'PIA24794-MarsIngenuityHelicopter-Logbook-Flt910-202108161.jpg'),
(26, 'Ulfa', 10, 'bidan d4', '$2y$10$7cHHRmFuEgZkH3lR6Co7Aeq1b7pu0bIuPZqbW6gE8iWxvyHcSKghC', 'no_image');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int NOT NULL,
  `id_fakultas` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `id_fakultas`, `nama`) VALUES
(1, 1, 'Program Studi S-1 PGSD'),
(2, 1, 'Program Studi S-1 Pendidkan Komputer'),
(3, 1, 'Program Studi S-1 Hukum'),
(4, 1, 'Program Studi S-1 Manajemen'),
(5, 1, 'Program Studi S-1 Akuntansi'),
(6, 2, 'Program Studi S-1 Informatika'),
(7, 2, 'Program Studi S-1 Sistem Informasi'),
(8, 2, 'Program Studi S-1 Arsitektur'),
(9, 3, 'Program Studi D-III Kebidanan'),
(10, 3, 'Program Studi D-IV Kebidanan'),
(11, 3, 'Program Studi S-1 Kesehatan Masyarakat'),
(12, 3, 'Program Studi S-1 Farmasi'),
(13, 3, 'Program Studi S-1 Ilmu Gizi'),
(14, 3, 'Program Studi S-1 Psikologi');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhir`
--

CREATE TABLE `tugas_akhir` (
  `id` int NOT NULL,
  `id_alumni` int NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abstrak` text COLLATE utf8mb4_general_ci NOT NULL,
  `keyword` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_terbit` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `referensi` text COLLATE utf8mb4_general_ci NOT NULL,
  `file_jurnal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_tugas_akhir` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_modifikasi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas_akhir`
--

INSERT INTO `tugas_akhir` (`id`, `id_alumni`, `judul`, `abstrak`, `keyword`, `tahun_terbit`, `referensi`, `file_jurnal`, `file_tugas_akhir`, `date_modifikasi`) VALUES
(1, 1, 'ANALISIS PENGGUNAAN BANDWIDTH PADA APLIKASI ZOOM MEETING DAN GOOGLE MEET MENGGUNAKAN WIRESHARK PADA NETWORK', 'Pada saat ini kegiatan yang di lakukan secara tatap muka seperti belajar dan mengajar maupun pertemuan pada organisasi harus di lakukan secara daring. Melakukan kegiatan daring perlu adanya jaringan internet yang optimal agar mendapatkan kenyamanan saat menggunakan sarana Video Conference untuk melakukan pertemuan. Video Conference sendiri merupakan layanan multimedia yang dapat di lakukannya komunikasi dua arah berupa data, suara, dan gambar bersifat real time. Saat ini aplikasi Video Conference yang paling banyak di gunakan adalah aplikasi Zoom Meet dan Google Meet. Namun kendala yang sering dialami pada saat menggunakan aplikasi tersebut sering terjadi kualitas gambar maupun suara yang tidak stabil pada saat menggunakan jaringan internet. Agar aplikasi ini berjalan dengan optimal diperlukan sebuah pengukuran Quality of Service (QoS) di jaringan internet pada saat menggunakan aplikasi video conference. QoS didefinisikan sebagai teknik mengelola throughput, jitter, packet loss. Hasil dari penelitian ini dapat', 'networking, QoS, WiFi', '2022', 'Arif, M. (2019). Sejarah wifi dan perkembangan wifi. Haqien, D., & Rahman, A. A. (2020). Pemanfaatan zoom meeting untuk proses pembelajaran pada masa pandemi covid-19. SAP (Susunan Artikel Pendidikan), 5(1). Mahfuzhi, A. W., Soedijono, B., & Pramono, E. (2017). Analisis Kualitas Layanan Internet Kampus Menggunakan Metode HTB (Hierarchical Token Bucket). Informasi Interaktif, 2(1), 66-75. Misinem, M., & Mukti, G. P. (2021). ANALISIS KUALITAS JARINGAN NIRKABEL DENGAN METODE QUALITY OF SERVICE (Studi Kasus: BAPEDA PROVINSI SUMATERA SELATAN). Jurnal Bina Komputer, 3(1), 1-7. Muqorobin, M., & Rais, N. A. R. (2020, November). Analisis Peran Teknologi Sistem Informasi Dalam Pembelajaran Kuliah Dimasa Pandemi Virus Corona. In Prosiding Seminar Nasional & Call for Paper STIE AAS (pp. 157-168). NUGROHO, K., & KURNIAWAN, A. Y. (2017). Uji performansi jaringan menggunakan kabel UTP dan STP. ELKOMIKA: Jurnal Teknik Energi Elektrik, Teknik Telekomunikasi, & Teknik Elektronika, 5(1), 48. Pranindi', '171041020019-jurnal.pdf', 'skripsi-prek.pdf', 1692628761),
(3, 4, 'IMPLEMENTASI METODE CERTAINTY FACTOR UNTUK MENDIAGNOSA PENYAKIT AYAM BERBASIS WEB STUDI KASUS PT INDOJAYA AGRUNISA', 'Sistem pakar yang mampu mendiagnosa penyakit pada ayam berdasarkan pengetahuan yang diberikan langsung dari pakar/ahlinya dan melalui studi literatur. Penelitian ini menggunakan metode perhitungan Certainty Factor (CF) dalam menghitung tingkat kepakaran. Data Penelitian ini terdiri dari data gejala dan data penyakit ayam, serta data aturan. Sistem pakar pada organisasi ditujukan untuk menambah value, peningkatan produktivitas serta area manajerial yang dapat mengambil kesimpulan dengan cepat. Manfaat yang diperoleh dari sistem pakar yang mampu melakukan diagnosa dengan cepat, tepat dan akurat terhadap gejala penyakit yang ditimbulkan mampu membantu para peternak dalam mengantisipasi kerugian yang diakibatkan serangan penyakit. Pengujian aplikasi menggunakan metode User Acceptance Tes Dan dari hasil implementasi aplikasi pakar ini didapati dapat mengurangi dampak kematian pada ayam dari 46% menjadi 10%, tingkat ayam yang sakit dari 54% menjadi 30% dan ayam yang sembuh meningkat menjadi 82%. dikatakan layak oleh pakar untuk digunakan.', 'CERTAINTY FACTOR, SISTEM PAKAR', '2021', '\r\nade hendini (2016) “pengertian use case diagram,” use case diagram.d\r\nAisyah, S. (2015) “Metode Certainty Factor,” yogyakarta, Andi Offet Yogyakarta.\r\nAnggrawan, A., Satuang, S. dan Abdillah, M. N. (2020) “Sistem Pakar Diagnosis Penyakit Ayam Broiler Menggunakan Forward Chaining dan Certainty Factor,” MATRIK : Jurnal Manajemen, Teknik Informatika dan Rekayasa Komputer, 20(1), hal. 97–108. doi: 10.30812/matrik.v20i1.847.\r\nArhami, M (2015) “konsep dasar sistem pakar,” yogyakarta, Andi Offet Yogyakarta,.\r\nbudhi, Gregorius S, dan Intan, R. (2008) “penerapan probalitas penggunaan fakta guna menentukan certainty factor sebuah rule pada ruse base expert system. Uk Petra Surabaya Jurusan Teknik Informatika\r\nHaviluddin (2014) “Unified modeling Language ( UML,” yogyakarta, Andi Offet Yogyakarta.\r\nkartasudjana dan suprijana (2015) “Konsep dasar Ayam,” Teori ayam.\r\nkusrini (2014) “aplikasi sistem pakar,” yogyakarta, Andi Offet Yogyakarta.\r\nKusumadewi,S (2016) “Artificial intellegence (teknik dan aplikasinya),” yogyakarta, Graha Ilmu.\r\nMaghfirah (2018) “sistem pakar diagnosa penyakit akbat gigitan nyamuk dengan metode certainty factor (CF) berbasis web.,” Jurnal, hal. 121.\r\nNugroho, Bunafit (2016) “Trik dan rahasia membuat aplikasi web dengan PHP,” yogyakarta, gaya media.\r\nRiyadi, L. (2016) “Sistem Pakar Diagnosa Penyakit Ayam Berbasis Web Menggunakan Metode Forward Dan Backword Chaining,” Jurnal SISTEMASI, 5(3), hal. 29–35.\r\nSimarmata, janner dan paryudi, imam (2015) “basis data,” yogyakarta, Andi Offet Yogyakarta.\r\nStudi, P., Sistem, S. dan Sains, F. (2017) “Skripsi perancangan sistem pakar ... bagus fery yanto,” hal. 2017.\r\nSunyoto, A. (2016) “Pemograman Database dengan visual basic dan microsoft. SQL,” yogyakarta, Andi Offet Yogyakarta.\r\nSuprianto, Dodit (2015) “buku pintar pemrograman PHP,” Bandung, OASE Media.\r\nYakub (2014) “pengantar sistem informasi,” yogyakarta, Graha Ilmu.', 'no_upload', 'no_upload', 1692276026),
(4, 5, 'PERANCANGAN E-MARKETPLACE PENJUALAN SOUVENIR ACEH BERBASIS WEB', 'Saat ini wabah COVID-19 memiliki jumlah kasus yang terus bertambah di Indonesia yang berdampak pada banyak sektor diantaranya sektor ekonomi. Para pelaku usaha ekonomi dituntut untuk dapat menemukan strategi marketing terbaru agar tetap dapat bertahan di situasi pandemi seperti saat ini khususnya bagi para pelaku usaha souvenir dan oleh-oleh khas Aceh. Para pengrajin souvenir saat ini masih menggunakan sistem marketing yang masih tradisional dimana para pengrajin menjual produk mereka secara offline. Pada masa pandemic saat ini mereka mengalami kesulitan dalam memasarkan produk mereka sehingga berdampak pada omset penjualan yang menurun. Oleh karena itu sangat diperlukan untuk membuat sebuah sistem e-marketplace untuk memberi wadah bagi pengrajin souvenir untuk mempromosikan dan menjual produk yang ditawarkan secara online tanpa harus memiliki tempat berjualan yang tetap seperti toko ataupun kedai dan memudahkan pengrajin dalam memasarkan produknya pada masa pandemic ini tanpa dibatasi oleh jarak dan waktu. Sistem e-marketplace ini dibuat dengan metode waterfall, menggunakan Bahasa pemograman PHP dengan database MySQL, menggunakan Framework Codeigniter serta berbasis website. Hasil dari penelitian ini adalah menghasilkan sebuah aplikasi e-marketplace penjualan souvenir Aceh berbasis web yang digunakan untuk menjual dan mempromosikan produk serta meningkatkan omset penjualan bagi para pelaku usaha souvenir di Aceh pada masa pandemi hingga seterusnya.', ' E-Marketplace, Penjualan Souv', '2021', 'Adhi Prasetio. 2015 . Buku Pintar Webmaster untuk Pemula .\r\nAfdi, Z., &amp; Purwanggono, B. (2017). Perancangan strategi berbasis metodologi lean startup untuk mendorong pertumbuhan perusahaan rintisan berbasis teknologi di Indonesia. Industrial Engineering Online Jurnal, Vol. 6, No. 4.\r\nAndrean, Muhammad. Et all. 2017 . Perancangan Dan Implementasi Sistem Informasi E-Marketplace Untuk Katering .\r\nAris, Mohammad. Et all. 2017 . Sistem Informasi Penjualan Produk Benang Pada PT.Central Geogrette Nusantara Cimahi .\r\nAryani. Et all. 2019 . Perancangan Sistem Rekomendasi Pemilihan Cindermata Khas Bengkulu Berbasis E-Marketplace .\r\nA.S, Rosa. Salahuddin. 2014 . Rekayasa Perangkat Lunak Struktur dan Berorientasi Objek .\r\nBekti, Bintu Humairah. 2015 . Mahir Membuat Website Dengan Adobe Dreamweaver CS6, CSS dan JQuery .\r\nHasugian, Penda Sudarto. 2018 . Perancangan Website Sebagai Media Promosi Dan Informasi.\r\nIrviani, Rita. Et all. 2018 . Perancangan Aplikasi E-commerce Berbasis Android Pada Kelompok Swadaya Masyarakat Margakaya Pringsewu .\r\n\r\nLaudon. Kenneth C. 2017 . E-commerce – Business, Technologi, Society, (13th Edition) .\r\nMadcom. 2016 . Pemograman PHP dan MySQL Untuk Pemula .\r\nMulyadi. 2016 . Evaluasi SIstem Informasi Akuntansi Penjualan Tunai.\r\nMansur, Mukhamad. 2016 . Pemograman Web Dinamis Menggunakan Java Server Pages Dengan Database Relasional MySQL .\r\nNur Cholifah Wahyu, Yulianingsih. 2018. “ Pengujian Black Box Testing Pada\r\nApliaksi Action &amp; Strategy Berbasis Android Dengan Teknologi\r\nPhonegap”. Jurnal String, Informatika, Universitas Indraprasata PGRI.\r\nPutra, et al. 2017 . “Rancang Bangun Aplikasi Marketplace Penyedia Jasa Les Private Di Kota Pontianak Berbasis Web,” J. Sist. dan Teknol. Inf., 2017, vol. 2, no. 1, pp. 1–5.\r\nRoby, Yanto. 2016 . Manajemen Basis Data Menggunakan MySQL .\r\nRudianto, Arief M. 2011 . Pemograman Web Dinamis Menggunakan PHP dan MySQL. CV Andi OFFSET. Yogyakarta .\r\nStartup Ranking, (n.d), Countries - With the top startups worldwide, Startup Rangking, Dilihat dari , Akses 28 September 2018.\r\nSuryanto, Tommy. 2018 . Penerapan E-Marketplace pada Distro Silver Squad .\r\nTim EMS. 2016 . PHP 5 dari Nol.\r\nTurban, Efraim. Et all. 2015 . Electronic Commerce – A Managerial And Social Perspective .\r\nUntari, Rustina. Et all. 2020 . Penggunan E-Marketplace untuk Pengrajin Tenun Sumba .\r\nYakub. 2016 . Pengantar Sistem Informasi .', 'no_upload', 'no_upload', 1692277210),
(5, 6, 'ASUHAN KEBIDANAN KOMPREHENSIF PADA IBU DAN BAYI NY. W DI GAMPONG BAET KECAMATAN BAITUSSALAM ACEH BESAR', 'ASUHAN KEBIDANAN KOMPREHENSIF PADA IBU DAN BAYI NY. W DI GAMPONG BAET KECAMATAN BAITUSSALAM ACEH BESAR Salmiati1, Nuzulul Rahmi2 1Program Studi Diploma III Kebidanan Fakultas Ilmu Kesehatan Universitas Ubudiyah Indonesia Jalan Alue Naga Desa Tibang Banda Aceh – Indonesia Angka kematian ibu dan bayi merupakan tolak ukur dalam menilai derajat kesehatan suatu bangsa, oleh karena itu, pemerintah sangat menekankan untuk menurunkan angka kematian ibu dan bayi melalui program-program kesehatan. Bidan sebagai salah satu sumber daya manusia bidang kesehatan merupakan ujung tombak yang berhubungan langsung dengan wanita sebagai sasaran program. Dengan peran yang cukup besar ini maka sangat penting bagi bidan untuk senantiasa meningkatkan kompetensinya melalui pemahaman mengenai asuhan kebidanan mulai dari wanita hamil sampai konseling untuk Keluarga Berencana. Metode asuhan kebidanan kehamilan sampai masa antara dilaksanakan dengan cara observasi dan home visit. Asuhan kebidanan ini bertujuan untuk melaksanakan pemantauan pada Ny.W pada masa kehamilan sampai masa antara di Praktik Mandiri Bidan Yusniar Kecamatan Baitussalam Aceh Besar Tahun 2020. Hasil yang didapat melalui asuhan kebidanan kehamilan pada Ny.W dilakukan sebanyak 3 kali sebanyak 3 kali dengan standar 14T. Asuhan persalinan normal dilakukan pada tanggal 04 Juni 2020. Pada Ny.W saat usia gestasi 39 Minggu, saat persalinan tidak ditemukan penyulit. Asuhan masa nifas yaitu dari 1 hari post partum sampai 14 hari post partum, selama pemantauan masa nifas berlangsung dengan baik dan tidak ditemukan tanda bahaya atau komplikasi. Asuhan bayi baru lahir kepada bayi Ny. W yang berjenis kelamin perempuan, BB 3000 gram, PB 54 cm, tidak ditemukan adanya cacat serta tanda bahaya. Asuhan pada masa antara pad ny.W, pada pemeriksaan fisik tidak ditemukan kelainan. Setelah diberikan penyuluhan, ibu yakin memilih kontrasepsi hormonal yaitu Kondom. Kesimpulan asuhan kebidanan yang dilaksanan pada masa kehamilan sampai masa antara tidak ditemukan masalah atau penyulit pada responden. Diharapkan bagi lahan praktek asuhan yang sudah diberikan pada klien sudah cukup baik dan hendaknya lebih meningkatkan mutu pelayanan agar dapat memberikan asuhan yang lebih baik sesuai dengan standar asuhan kebidanan serta dapat mengikuti perkembangan ilmu pengetahuan kesehatan agar dapat menerapkan setiap asuhan kebidanan sesuai dengan teori dari mulai kehamilan, persalinan, BBL, nifas dan masa antara.', 'persalinan, BBL, nifas dan mas', '2021', 'Asuhan Persalinan Normal, 2016. Asuhan Esensial Persalinan. Jakarta: JNPK-KR/POGI\r\nAsrinah, Dkk, 2014. Asuhan Kebidanan Masa Kehamilan. Yogyakarta : Graha Ilmu.\r\nJNPK KR, 2016. Pelatihan Klinik Asuhan Persalinan Normal. Jakarta.\r\nKemenkes RI. 2018. Profil Kesehatan Republik Indonesia.\r\nManuaba, 2015. Ilmu Kebidanan Penyakit Kandungan Dan KB. Jakarta ; EGC\r\nMochtar, Rustam, 2015. Obstetri Fisiologi, Obstetri Patologi. Jakarta: EGC\r\nNugroho, T, dkk. 2014. Buku Ajar Asuhan Kebidanan Nifas. Yogyakarta: Nuha Medika\r\nPuspita, Eka, 2014. Asuhan Kebidanan Masa Nifas. Jakarta: Buku Kesehatan.\r\nProverawati, dkk, 2015. Panduan Memilih Kontrasepsi. Muha Medika, Yogyakarta.\r\nPinem, S, 2015. Kesehatan Reproduksi dan Kontrasepsi, CV. Trans Info Media, Jakarta.\r\nSaifuddin, A.B, 2016. Buku Panduan Praktis Pelayanan Kesehatan Maternal. Jakarta: Yayasan Bina Pustaka Sarwono Prawirohardjo.\r\nSarwono, P, 2015. Ilmu Kebidanan.Jakarta: Bina Pustaka\r\nRohani, dkk. 2015. Asuhan Kebidanan pada Persalinan. Jakarta: Salemba Medika\r\nRukiyah, A,Y. 2015. Asuhan Neonatus. Jakarta. CV Trans Info Media', 'no_upload', 'no_upload', 1692277528),
(6, 7, 'MONITORING KUALITAS AIR TERHADAP PERKEMBANGAN UDANG VANAME DI DESA BUKIT SELAMAT BERBASIS IOT', 'Udang vaname (Litopenaeus Vannamei) merupakan jenis udang alternatif yang dapat dibudidayakan di Indonesia, disamping udang windu (Litopenaeus monodon) dan udang putih (Litopenaeus merguensis) dikarenakan udang vaname tergolong lebih efisien untuk dibudidayakan. Kualitas air ialah salah satu faktor yang mempengaruhi budidaya udang vaname. Perkembangan udang yang sehat sangat ditentukan dari kualitas air tambak. Oleh karena itu dibutuhkan monitoring kualitas air secara berkala. selama masa pembudidayaan udang vaname. Sering ditemukan kegagalan dalam perkembangan udang vaname yaitu buruknya kualitas air terutama suhu, salinitas (TDS) dan pH air. Tujuan dari penelitian ini adalah membangun sistem monitoring kualitas air yang dapat memantau suhu, pH dan salinitas agar perkembangan udang yang terhambat akibat perubahan kualitas air yang buruk dapat di minimalisir. Dalam penelitian ini menggunakan ESP32 sebagai sentral alat dan modul penghubung alat dengan internet, sensor ds18b20 sebagai pembaca suhu, sensor PH-4502C sebagai pembaca pH, sensor TDS meter v1 sebagai pembaca salinitas (TDS), LCD sebagai penampil suhu, pH dan salinitas. Berdasarkan dari hasil pengujian sensor, tingkat keakuratan dari embeded system ialah 98% dan menurut dari hasil pengujian yang dilakukan langsung pada tambak tradisional, maka dapat diambil kesimpulan bahwa pH dan suhu pada siang hari lebih tinggi daripada malam hari, dan untuk TDS tergolong stabil begitu pula ketika cuaca hujan maka pH, suhu dan TDS akan turun akan tetapi apabila air tidak diganti lebih dari seminggu maka menyebabkan suhu dan pH diatas batas normal sehingga bisa menyebabkan pertumbuhan udang terhambat dan bisa mati.', 'Monitoring, Kualitas Air, Udan', '2021', 'Arafat. 2016. Sistem Pengamanan Pintu Rumah Berbasis Internet of Things (IoT)\r\nDengan Esp8266. Technologia, vol. 7, no. 4, pp. 262– 268.\r\nBoyd, C. E. 1990. Water Quality in Ponds for Aquaculture. Birmingham Publishing\r\nco. Birmingham, Alabama.\r\nD. A. A. Novitasari, D. Triyanto, and I. Nirmala. 2018. Rancang Bangun Sistem\r\nMonitoring Pada Limbah Cair Industri Berbasis Mikrokontroler Dengan\r\nAntarmuka Website. Jurnal Komputer dan Aplikasi, vol. 06, no. 3.\r\nIqbal, Mohammad. 2014. Rancang Bangun monitoring volume air menggunakan\r\nmikrokontroler atmega 8535 berbasis Borland DelpHi 7. Semarang: Universitas\r\nDiponegoro.\r\nM. Yusuf. 2018. Perancangan Alat Pemantau Kualitas Air (ATAIR) Berbasis Internet\r\nof Things Dengan Parameter Kekeruhan, Oksigen Terlarut, Suhu dan pH.\r\nUniversitas Pasundan Bandung.\r\nP. Kusrini, G. Wiranto, I. Syamsu, and L. Hasanah. 2016. Sistem Monitoring Online\r\nKualitas Air Akuakulturuntuk Tambak Udang Menggunakan Aplikasi Berbasis\r\nAndroid. J. Elektron. dan Telekomun., vol. 16, no. 2, p. 25.\r\nPramana, R. 2018. Perancangan Sistem Kontrol dan Monitoring Kualitas Air dan\r\nSuhu Air Pada Kolam Budidaya Ikan. Jurnal Sustainable, Vol. 7, No. 1, Hal. 13\r\n– 23\r\nPratiwi, P. E., Isnawati, A. F., Hikmaturokhman, A. 2012. Analisis QoS pada\r\nJaringan Multi Protokol Label Switching (MPLS). Studi Kasus Di Pelabuhan\r\nIndonesia III Cabang Tanjung Intan Cilacap.\r\nRometdo Muzawi, dkk. 2019. sistem monitoring ketersediaan bahan baku cor beton\r\nmenggunakan metode market basket analysis. Prodi Sistem Informasi\r\nUniversitas Dharma Andalas. Jurnal Teknologi Dan Sistem Informasi Bisnis\r\nVol. 1 No. 2.\r\nS. Bahri and K. Fikriyah. 2018. Prototype Monitoring Penggunan dan Kualiatas Air\r\nBerbasis Web Menggunakan Rapberry PI. Jurnal Teknik Elektro\r\n(eLEKTRUM), vol. 15, no. 2.\r\nSupito. 2017. Teknik Budidaya Udang Vaname (Litopenaeus vannamei). Balai Besar\r\nPerikanan Budidaya Air Payau (BBPBAP). Jepara', 'no_upload', 'no_upload', 1692278481);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
