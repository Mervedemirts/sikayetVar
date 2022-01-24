-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Oca 2022, 15:23:37
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sikayetvar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cominication`
--

CREATE TABLE `cominication` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `reportid` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`id`, `userid`, `reportid`, `comment`) VALUES
(1, 1, 9, 'loremloremloremloremloremloremlorem loremloremloremloremloremlorem loremloremlorem lorem'),
(2, 1, 9, 'loremloremloremloremloremloremlorem emlorem loremloremlorem loremasdas'),
(3, 1, 9, 'ben asdasddasDASDAS Ğ'),
(4, 1, 9, 'ben asdasddasDASDAS Ğ'),
(5, 1, 9, 'asadssaddasdasadsdasd'),
(6, 1, 9, 'sen çok biliyon'),
(7, 1, 8, 'eqwwqwqeeqwwqeewqwqe'),
(8, 1, 8, 'abi site bozdu şirketle alakası yok yhaaaa'),
(10, 1, 1, 'ghftjfgjyj');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `company`
--

INSERT INTO `company` (`id`, `companyname`, `categoryid`) VALUES
(1, 'Ket Development', 1),
(2, 'Demirtas Development', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `issue` text NOT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `report`
--

INSERT INTO `report` (`id`, `userid`, `companyid`, `issue`, `active`) VALUES
(1, 1, 1, 'Şikayetim var bu zalim kadere', 1),
(2, 1, 1, 'Aynen Kanks', 1),
(3, 1, 1, 'Alpakalar Günde 1 saat uyur', 1),
(5, 1, 1, 'Aydın merkezdeki firma çok kötü', 1),
(6, 1, 1, 'Kurucuları Hiç Bizimlen İlgilenmiyor', 1),
(7, 1, 1, 'Yaptırdıgım uygulama bozuk', 1),
(8, 1, 1, 'Çocugum çok ağlıyor çocugumdan şikayetçiyim', 1),
(9, 1, 1, 'Yeter Baaaaaaa', 1),
(10, 1, 1, 'Site yapmaktan şikayetçiyim', 1),
(11, 1, 1, 'mükkemmel', 1),
(13, 1, 2, 'sadsadsad', 1),
(14, 1, 2, 'sadsadsadsadasd', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `photourl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `mail`, `photourl`) VALUES
(1, 'Merve', 'Demirtaş', '26991', 'mervedmrts.99@gmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD5esY9SJKBIUwj2OekN7adKZjq78dTTlT4A&usqp=CAU');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cominication`
--
ALTER TABLE `cominication`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `cominication`
--
ALTER TABLE `cominication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
