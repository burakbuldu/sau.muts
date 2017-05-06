-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 03 May 2017, 20:47:40
-- Sunucu sürümü: 5.5.54-cll
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `buldu_imis`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `akademik`
--

CREATE TABLE `akademik` (
  `id` int(50) NOT NULL,
  `kullaniciadi` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `isim` varchar(50) NOT NULL,
  `soyisim` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `akademik`
--

INSERT INTO `akademik` (`id`, `kullaniciadi`, `sifre`, `isim`, `soyisim`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Sistem', 'YÃ¶neticisi', 'admin@test.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aktivasyon`
--

CREATE TABLE `aktivasyon` (
  `id` int(50) NOT NULL,
  `ogrenci_no` varchar(100) NOT NULL,
  `aktivasyon_kodu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci_bilgileri`
--

CREATE TABLE `ogrenci_bilgileri` (
  `id` int(50) NOT NULL,
  `ogrenci_no` varchar(100) NOT NULL,
  `sifre` varchar(100) NOT NULL,
  `isim` varchar(100) NOT NULL,
  `soyisim` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(100) NOT NULL,
  `cinsiyet` varchar(100) NOT NULL,
  `memleket` varchar(100) NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `bolum` varchar(100) NOT NULL,
  `denetmen_adi` varchar(100) NOT NULL,
  `denetmen_soyadi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sirket_bilgileri`
--

CREATE TABLE `sirket_bilgileri` (
  `id` int(50) NOT NULL,
  `sirket_adi` varchar(100) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `sehir` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `ogrenci_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staj_bilgileri`
--

CREATE TABLE `staj_bilgileri` (
  `id` int(50) NOT NULL,
  `ogrenci_no` varchar(100) NOT NULL,
  `staj_birimi` varchar(100) NOT NULL,
  `staj_baslama` date NOT NULL,
  `staj_bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staj_birimleri`
--

CREATE TABLE `staj_birimleri` (
  `id` int(50) NOT NULL,
  `ogrenci_no` varchar(100) NOT NULL,
  `sirket_adi` varchar(100) NOT NULL,
  `staj_birimi` varchar(100) NOT NULL,
  `kontakt_adi` varchar(100) NOT NULL,
  `kontakt_soyadi` varchar(100) NOT NULL,
  `kontakt_unvan` varchar(100) NOT NULL,
  `kontakt_tel` varchar(100) NOT NULL,
  `kontakt_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staj_degerlendirme`
--

CREATE TABLE `staj_degerlendirme` (
  `id` int(50) NOT NULL,
  `ogrenci_no` varchar(100) NOT NULL,
  `isletme_puani` tinyint(4) NOT NULL,
  `birim_puani` tinyint(4) NOT NULL,
  `staj_puani` tinyint(4) NOT NULL,
  `toplam_puan` double NOT NULL,
  `ise_devam` tinyint(1) NOT NULL DEFAULT '0',
  `staj_yorumu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullaniciadi` (`kullaniciadi`);

--
-- Tablo için indeksler `aktivasyon`
--
ALTER TABLE `aktivasyon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ogrenci_no` (`ogrenci_no`),
  ADD UNIQUE KEY `aktivasyon_kodu` (`aktivasyon_kodu`);

--
-- Tablo için indeksler `ogrenci_bilgileri`
--
ALTER TABLE `ogrenci_bilgileri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ogrenci_no` (`ogrenci_no`);

--
-- Tablo için indeksler `sirket_bilgileri`
--
ALTER TABLE `sirket_bilgileri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sirket_adi` (`sirket_adi`),
  ADD KEY `ogrenci_no` (`ogrenci_no`);

--
-- Tablo için indeksler `staj_bilgileri`
--
ALTER TABLE `staj_bilgileri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ogrenci_no` (`ogrenci_no`);

--
-- Tablo için indeksler `staj_birimleri`
--
ALTER TABLE `staj_birimleri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ogrenci_no` (`ogrenci_no`),
  ADD KEY `staj_birimi` (`staj_birimi`);

--
-- Tablo için indeksler `staj_degerlendirme`
--
ALTER TABLE `staj_degerlendirme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ogrenci_no` (`ogrenci_no`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `aktivasyon`
--
ALTER TABLE `aktivasyon`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `ogrenci_bilgileri`
--
ALTER TABLE `ogrenci_bilgileri`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `sirket_bilgileri`
--
ALTER TABLE `sirket_bilgileri`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `staj_bilgileri`
--
ALTER TABLE `staj_bilgileri`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `staj_birimleri`
--
ALTER TABLE `staj_birimleri`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `staj_degerlendirme`
--
ALTER TABLE `staj_degerlendirme`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `sirket_bilgileri`
--
ALTER TABLE `sirket_bilgileri`
  ADD CONSTRAINT `sirket_bilgileri_ibfk_1` FOREIGN KEY (`ogrenci_no`) REFERENCES `staj_birimleri` (`ogrenci_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `staj_bilgileri`
--
ALTER TABLE `staj_bilgileri`
  ADD CONSTRAINT `staj_bilgileri_ibfk_1` FOREIGN KEY (`ogrenci_no`) REFERENCES `ogrenci_bilgileri` (`ogrenci_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `staj_birimleri`
--
ALTER TABLE `staj_birimleri`
  ADD CONSTRAINT `staj_birimleri_ibfk_1` FOREIGN KEY (`ogrenci_no`) REFERENCES `staj_bilgileri` (`ogrenci_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `staj_degerlendirme`
--
ALTER TABLE `staj_degerlendirme`
  ADD CONSTRAINT `staj_degerlendirme_ibfk_1` FOREIGN KEY (`ogrenci_no`) REFERENCES `ogrenci_bilgileri` (`ogrenci_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;