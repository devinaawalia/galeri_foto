-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2025 pada 05.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_galeri_foto_devina`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `AlbumID` int(100) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserID` int(100) NOT NULL,
  `Konfirmasi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserID`, `Konfirmasi`) VALUES
(10, 'Langit', 'Langit yang indah', '2025-01-20', 8, 2),
(11, 'Pemandangan', 'Pemandangan yang indah', '2025-02-15', 9, 2),
(12, 'Keluargaku', 'Dengan adanya keluarga kecilku aku merasa bahagia', '2025-02-04', 8, 2),
(13, 'sekolah', 'tempat untuk menuntut ilmu', '2025-02-22', 9, 2),
(14, 'olahraga', 'olahraga', '2025-02-22', 12, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `FotoID` int(100) NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` varchar(255) NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) NOT NULL,
  `AlbumID` int(100) NOT NULL,
  `UserID` int(100) NOT NULL,
  `Konfirmasi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`FotoID`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumID`, `UserID`, `Konfirmasi`) VALUES
(9, 'Langitt', 'Suatu tempat yang indahh', '2025-02-18', '530613620-gambar3.jpeg', 10, 8, 2),
(12, 'Keindahan', 'Suatu hal yang paling di nanti', '2025-02-20', '1600962213-197560573-1157490841-1839417218-gambar2.jpeg', 11, 9, 2),
(13, ' Keluarga kecilku', 'Suatu hal yang paling di harapkan bagi banyak orang', '2025-02-15', '1062697601-583061808-gambar6.jpeg', 12, 8, 2),
(14, 'Sekolah', 'Tempat untuk menuntut ilmu', '2025-02-17', '1089861578-slider-img.png', 13, 9, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `KomentarID` int(100) NOT NULL,
  `FotoID` int(100) NOT NULL,
  `UserID` int(100) NOT NULL,
  `IsiKomentar` varchar(255) NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`KomentarID`, `FotoID`, `UserID`, `IsiKomentar`, `TanggalKomentar`) VALUES
(28, 12, 7, 'Cantik sekali', '2025-02-11'),
(30, 13, 7, 'Iyaa betul aku juga sangat ingin', '2025-02-17'),
(31, 14, 9, 'Aku ingin menjadi juara', '2025-02-17'),
(32, 9, 12, 'bagus sekali', '2025-02-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int(100) NOT NULL,
  `FotoID` int(100) NOT NULL,
  `UserID` int(100) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`LikeID`, `FotoID`, `UserID`, `TanggalLike`) VALUES
(21, 9, 7, '2025-02-03'),
(22, 12, 7, '2025-02-11'),
(23, 13, 7, '2025-02-11'),
(24, 14, 9, '2025-02-17'),
(25, 14, 7, '2025-02-17'),
(26, 9, 9, '2025-02-17'),
(27, 12, 9, '2025-02-17'),
(28, 13, 9, '2025-02-17'),
(29, 9, 12, '2025-02-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(100) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Level` enum('admin','pengguna','','') NOT NULL,
  `Konfirmasi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `Level`, `Konfirmasi`) VALUES
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'bdg', 'admin', 2),
(8, 'nana', '518d5f3401534f5c6c21977f12f60989', 'nana@gmail.com', 'nana a', 'bdg', 'pengguna', 2),
(9, 'vinaa', 'e581eb5ccadd77c4bbc86099c1b68b48', 'vinaa@gmail.com', 'vinaa', 'bdg', 'pengguna', 2),
(12, 'aswid', '202cb962ac59075b964b07152d234b70', 'vina@gmail.com', 'asep widiana', 'bandung', 'pengguna', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `id_user` (`UserID`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `id_album` (`AlbumID`),
  ADD KEY `id_user` (`UserID`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`KomentarID`),
  ADD KEY `id_foto` (`FotoID`),
  ADD KEY `id_user` (`UserID`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`),
  ADD KEY `id_foto` (`FotoID`),
  ADD KEY `id_user` (`UserID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `KomentarID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`AlbumID`) REFERENCES `album` (`AlbumID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
