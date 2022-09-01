-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 09:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsga_finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `telp`, `password`, `foto`) VALUES
(1, 'admin', 'admin@gmail.com', '08787978652', '5f4dcc3b5aa765d61d8327deb882cf99', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `kode_anggota` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `kode_anggota`, `nama`, `email`, `telp`, `alamat`, `foto`, `jenis_kelamin`) VALUES
(1, 'M-01', 'Brianna Perkins', 'blandit.nam@gmail.com', '39-348-535-760', '168-2015 Duis St.', NULL, 'P'),
(2, 'M-02', 'Wang Le', 'egestas@gmail.com', '06-784-636-794', '623-8088 Et Street', NULL, 'L'),
(3, 'M-03', 'Kato Mathis', 'non.ante.bibendum@gmail.com', '93-573-525-648', 'P.O. Box 599, 681 Dis Avenue', NULL, 'L'),
(4, 'M-04', 'Kimberley Waters', 'sed@gmail.com', '62-557-398-553', 'Ap #126-9715 Montes, Avenue', NULL, 'P'),
(5, 'M-05', 'Rhoda Wooten', 'pharetra.nam@gmail.com', '72-456-868-878', 'Ap #129-2675 Sollicitudin St.', NULL, 'P'),
(6, 'M-06', 'Ezra Boyle', 'rutrum.urna.nec@gmail.com', '23-830-461-756', '677-4726 Lectus Av.', NULL, 'P'),
(7, 'M-07', 'Noble Haney', 'magna.nam@gmail.com', '82-485-213-382', '6023 In, Rd.', NULL, 'P'),
(8, 'M-08', 'Gannon Mccray', 'aliquam.ultrices@gmail.com', '48-418-680-298', 'Ap #876-398 Et, Rd.', NULL, 'L'),
(9, 'M-09', 'Olga Ochoa', 'nisi.cum@gmail.com', '56-698-568-752', 'P.O. Box 569, 3408 Porttitor Rd.', NULL, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(15) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` enum('Available','Booked','Archived') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul`, `keterangan`, `pengarang`, `penerbit`, `tahun`, `status`) VALUES
(1, 'B-01', 'Beautiful World, Where Are You', 'Beautiful World, Where Are You is a new novel by Sally Rooney, the bestselling author of Normal People and Conversations with Friends.Alice, a novelist, meets Felix, who works in a warehouse, and asks him if hed like to travel to Rome with her. In Dublin, her best friend, Eileen, is getting over a break-up and slips back into flirting with Simon, a man she has known sinceBeautiful World, Where Are You is a new novel by Sally Rooney, the bestselling author of Normal People and Conversations with Friends.Alice, a novelist, meets Felix, who works in a warehouse, and asks him if hed like to travel to Rome with her. In Dublin, her best friend, Eileen, is getting over a break-up and slips back into flirting with Simon, a man she has known since childhood. Alice, Felix, Eileen, and Simon are still young—but life is catching up with them. They desire each other, they delude each other, they get together, they break apart. They have sex, they worry about sex, they worry about their friendships and the world they live in. Are they standing in the last lighted room before the darkness, bearing witness to something? Will they find a way to believe in a beautiful world?', 'Sally Rooney', 'Faber', 2021, 'Available'),
(2, 'B-02', 'Harry Potter and the Half-Blood Prince (Harry Potter #6)', 'The war against Voldemort is not going well; even Muggle governments are noticing. Ron scans the obituary pages of the Daily Prophet, looking for familiar names. Dumbledore is absent from Hogwarts for long stretches of time, and the Order of the Phoenix has already suffered losses.And yet . . .As in all wars, life goes on. The Weasley twins expand their business. Sixth-yeaThe war against Voldemort is not going well; even Muggle governments are noticing. Ron scans the obituary pages of the Daily Prophet, looking for familiar names. Dumbledore is absent from Hogwarts for long stretches of time, and the Order of the Phoenix has already suffered losses.And yet . . .As in all wars, life goes on. The Weasley twins expand their business. Sixth-year students learn to Apparate - and lose a few eyebrows in the process. Teenagers flirt and fight and fall in love. Classes are never straightforward, through Harry receives some extraordinary help from the mysterious Half-Blood Prince.So its the home front that takes center stage in the multilayered sixth installment of the story of Harry Potter. Here at Hogwarts, Harry will search for the full and complete story of the boy who became Lord Voldemort - and thereby find what may be his only vulnerability.', 'J.K. Rowling', 'Bloomsbury', 2006, 'Available'),
(3, 'B-03', 'Harry Potter and the Order of the Phoenix (Harry Potter #5)', 'There is a door at the end of a silent corridor. And its haunting Harry Potters dreams. Why else would he be waking in the middle of the night, screaming in terror?Harry has a lot on his mind for this, his fifth year at Hogwarts: a Defense Against the Dark Arts teacher with a personality like poisoned honey; a big surprise on the Gryffindor Quidditch team; and the loominThere is a door at the end of a silent corridor. And its haunting Harry Potters dreams. Why else would he be waking in the middle of the night, screaming in terror?Harry has a lot on his mind for this, his fifth year at Hogwarts: a Defense Against the Dark Arts teacher with a personality like poisoned honey; a big surprise on the Gryffindor Quidditch team; and the looming terror of the Ordinary Wizarding Level exams. But all these things pale next to the growing threat of He-Who-Must-Not-Be-Named - a threat that neither the magical government nor the authorities at Hogwarts can stop.As the grasp of darkness tightens, Harry must discover the true depth and strength of his friends, the importance of boundless loyalty, and the shocking price of unbearable sacrifice.His fate depends on them all.', 'J.K. Rowling & Mary GrandPré', 'Bloomsbury', 2004, 'Available'),
(4, 'B-04', 'Simply Beautiful Beading: 53 Quick and Easy Projects', 'Blend your creative spirit with the quick and easy projects found inside Simply Beautiful Beading.From casual to sophisticated, and everything in between, youll find beading designs to fit your personal style. Inside, youll discover 53 simple yet stylish beading projects for exquisite jewelry, accessories and home decor, including: •modern glass bead chokers•semipreciousBlend your creative spirit with the quick and easy projects found inside Simply Beautiful Beading.From casual to sophisticated, and everything in between, youll find beading designs to fit your personal style. Inside, youll discover 53 simple yet stylish beading projects for exquisite jewelry, accessories and home decor, including: •modern glass bead chokers•semiprecious stone set•charm bracelets•wired-pearl barrettes•wineglass charms•hanging votive candle holder•and more than 35 variation projects for even more simply beautiful ideas!', 'Heidi Boyd', 'David & Charles', 2004, 'Available'),
(5, 'B-05', 'The Subtle Art of Not Giving a F*ck: A Counterintuitive Approach to Living a Good Life', 'a superstar blogger cuts through the crap to show us how to stop trying to be positive all the time so that we can truly become better, happier people.For decades, weve been told that positive thinking is the key to a happy, rich life. F**k positivity, Mark Manson says. Lets be honest, shit is f**ked and we have to live with it. In his wildly popular Internet blog, Manson doesnt sugarcoat or equivocate. He tells it like it is—a dose of raw, refreshing, honest truth that is sorely lacking today. The Subtle Art of Not Giving a F**k is his antidote to the coddling, lets-all-feel-good mindset that has infected American society and spoiled a generation, rewarding them with gold medals just for showing up.Manson makes the argument, backed both by academic research and well-timed poop jokes, that improving our lives hinges not on our ability to turn lemons into lemonade, but on learning to stomach lemons better. Human beings are flawed and limited—not everybody can be extraordinary, there are winners and losers in society, and some of it is not fair or your fault. Manson advises us to get to know our limitations and accept them. Once we embrace our fears, faults, and uncertainties, once we stop running and avoiding and start confronting painful truths, we can begin to find the courage, perseverance, honesty, responsibility, curiosity, and forgiveness we seek.There are only so many things we can give a f**k about so we need to figure out which ones really matter, Manson makes clear. While money is nice, caring about what you do with your life is better, because true wealth is about experience. A much-needed grab-you-by-the-shoulders-and-look-you-in-the-eye moment of real-talk, filled with entertaining stories and profane, ruthless humor, The Subtle Art of Not Giving a F**k is a refreshing slap for a generation to help them lead contented, grounded lives.', 'Mark Manson', 'HarperCollins', 2016, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembali_asli` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_anggota` (`id_anggota`),
  ADD KEY `fk_transaksi_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transaksi_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
