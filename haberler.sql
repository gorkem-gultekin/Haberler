-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 May 2019, 09:10:00
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `haberler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `icerik`
--

CREATE TABLE `icerik` (
  `haber_id` int(11) NOT NULL,
  `haber_baslik` varchar(255) CHARACTER SET utf8 NOT NULL,
  `haber_icerik` text CHARACTER SET utf8 NOT NULL,
  `yazan_kullanici_id` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `onay` int(1) NOT NULL,
  `kategori` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `icerik`
--

INSERT INTO `icerik` (`haber_id`, `haber_baslik`, `haber_icerik`, `yazan_kullanici_id`, `tarih`, `onay`, `kategori`, `resim`) VALUES
(44, 'Austria Wien 1 - 2 Salzburg', 'Avusturya\'da Salzburg, deplasmanda Austria Wien\'i 2-1 yenerek şampiyonluğa ulaştı.Austria Wien, 71. dakikada Dominik Prokop\'un attığı golle 1-0 öne geçmesine rağmen üstünlüğünü koruyamadı. Salzburg, 81. dakikada Xaver Schlager ve 86. dakikada Hannes Wolf\'un kaydettiği gollerle 2-1 galip geldi.', 84, '2019-05-06 06:29:38', 0, 'Spor', 'https://imgrosetta.mynet.com.tr/file/10630370/10630370-728xauto.jpg'),
(45, 'Chelsea 3 - 0 Watford', 'İngiltere Premier Lig\'de Chelsea, sahasında Watford\'u 3-0 yenerek gelecek sezon UEFA Şampiyonlar Ligi\'ne katılmayı garantiledi.Premier Lig\'in 37. haftasında Chelsea, Stamford Bridge Stadı\'nda ağırladığı Watford\'u 48. dakikada Ruben Loftus-Cheek, 51. dakikada David Luiz ve 75. dakikada Gonzalo Higuain\'in attığı gollerle 3-0 yendi.', 84, '2019-05-06 06:31:23', 1, 'Spor', 'https://imgrosetta.mynet.com.tr/file/10630350/10630350-728xauto.jpg'),
(46, 'Bankacılık sektörünün mevduatı arttı', 'Sektörün toplam mevduatı, geçen hafta 33,7 milyar lira artarak 2 trilyon 329,8 milyar liraya çıktı.Bankalarda bulunan yabancı para mevduatı, geçen hafta 667 milyon dolar azalarak 211 milyar 559 milyon dolara indi.', 84, '2019-05-06 06:32:17', 0, 'Finans', 'https://imgrosetta.mynet.com.tr/file/10173030/10173030-728xauto.jpg'),
(47, 'Merkez Bankası rezervleri geriledi', 'Türkiye Cumhuriyet Merkez Bankası (TCMB) toplam rezervleri, geçen hafta 2 milyar 230 milyon dolar azalarak 93 milyar 716 milyon dolara geriledi.\r\n\r\n\r\nTCMB Haftalık Para ve Banka İstatistikleri\'ne göre, 26 Nisan\'da Merkez Bankası brüt döviz rezervleri, 2 milyar 281 milyon dolar azalışla 73 milyar 284 milyon dolar olarak gerçekleşti. Brüt döviz rezervleri, 19 Nisan ile biten haftada 75 milyar 565 milyon dolar seviyesindeydi.', 84, '2019-05-06 06:33:01', 1, 'Finans', 'https://imgrosetta.mynet.com.tr/file/2564120/2564120-728xauto.jpg'),
(48, 'Eşkıya Dünyaya Hükümdar Olmaz\'a flaş transfer! Mehmet Çepiç hangi rolde?', 'Eşkıya Dünyaya Hükümdar Olmaz dizisinin merakla beklenen 136. yeni bölüm fragmanı yayınlandı. EDHO yeni bölümde istihbarat başkanı rolünde usta oyuncu Mehmet Çepiç diziye katılıyor. Ünal, istihbaratın başına gelecek kişi için dostlarıyla anlaştıklarını Hızır ve Alpaslan\'a söylüyor. Mehmet Çepiç\'in canlandırdığı yeni başkan ise Ünal\'a Çakırbeyli ailesi hakkında tereddütleri olduğunu söylüyor. Peki EDHO\'da yeni istihbarat başkanı rolündeki Mehmet Çepiç kimdir? İşte EDHO 136. yeni bölüm fragmanı.', 84, '2019-05-06 06:33:58', 1, 'Magazin', 'https://imgrosetta.mynet.com.tr/file/10629977/10629977-728xauto.jpg'),
(49, 'Adana\'da Sıla rüzgarı esti!', 'Kerki ve Solfej ile birlikte gerçekleştirdiği Türkiye turnesine devam eden Sıla\'nın son durağı Adana oldu. Adana Çukurova Üniversitesi Açıkhava Tiyatrosu\'nda sahneye çıkan Sıla, dinleyicilerine yine unutulmaz bir akşam yaşattı.', 84, '2019-05-06 06:34:35', 0, 'Magazin', 'https://imgrosetta.mynet.com.tr/file/10629540/10629540-728xauto.jpg'),
(50, 'Efsane yönetmen Jean-Luc Godard\'dan yeni film sürprizi!', 'The Image Book filmiyle Cannes Film Festivali\'nde iki ayrı ödüle layık görülen efsanevi yönetmen Jean-Luc Godard, gelecek filmiyle ilgili ilk detayları paylaştı. Fransız Yeni Dalgası\'nın usta isimlerinden olan Godard, yeni filminin isminin henüz belli olmadığını ifade etti.', 84, '2019-05-06 06:35:58', 0, 'Sinema', 'http://img.sinema.mynet.com/haber/47613_efsane-yonetmen-jean-luc-godarddan-yeni-film-surprizi_original.jpg'),
(51, 'Avengers: Endgame Türkiye\'de rekor kırdı', 'Yılın en çok beklenen filmlerinden biri olan “Avengers: Endgame”, 25 Nisan’da beyaz perdedeki yerini aldı. Marvel hayranları tarafından büyük ilgi gösterilen film, vizyondaki ilk gününü de rekor bir açılış ile tamamladı. “Avengers: Endgame” yaptığı 6.082.094 TL’lik hasılat ile Türkiye’de, tüm zamanların en iyi açılış rekorunu kırdı. Film ilk gününde 352.089 kişi tarafından izlendi.', 84, '2019-05-06 06:37:13', 1, 'Sinema', 'http://img.sinema.mynet.com/haber/47608_avengers-endgame-turkiyede-rekor-kirdi_original.jpg'),
(52, 'BMW M8 Competition ortaya çıktı!', 'BMW’nin en hızlı otomobili olması beklenen BMW M8 Competition modeline ait olduğu iddia edilen bir görüntü, geçtiğimiz günlerde sızdırıldı.\r\n\r\nBMW kullanıcılarının yoğunlukta olduğu popüler bir forum sitesi üzerinden yayınlanan görüntü, gerçekten de lüks otomobile ait olabilir.', 84, '2019-05-06 06:38:03', 1, 'Teknoloji', 'https://i0.wp.com/ares.shiftdelete.net/580x330/original/2019/05/BMW-M8-Competition-sdn.jpg'),
(53, 'YouTube kullanıcı sayısı verilerini açıkladı!', 'Ünlü Video içerik platformu YouTube, ülkemizde de oldukça aktif ve yoğun olarak kullanılmakta. Şirket açıkladığı yeni verilerle birlikte, platformun ne kadar hızlı büyüdüğünü de gözler önüne serdi. Şirket CEO’su açıkladığı raporlarda aylık oturum ve izlenme sayıları gibi bilgilere yer verdi. Raporlara göre YouTube kullanıcı sayısı hızla yükselmeye devam ediyor.', 84, '2019-05-06 06:38:47', 0, 'Teknoloji', 'https://shiftdelete.net/wp-content/uploads/2019/02/youtube-dusuk-aboneli-kanallari-on-plana-c%C4%B1kartacak-shiftdelete.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `parola` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(75) CHARACTER SET utf8 NOT NULL,
  `yetki` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_adi`, `parola`, `mail`, `yetki`) VALUES
(83, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1),
(84, 'bote', '202cb962ac59075b964b07152d234b70', 'bote@gmail.com', 0),
(85, 'burkay', '202cb962ac59075b964b07152d234b70', 'burkay@gmail.com', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorumcu_kullanici_id` int(11) NOT NULL,
  `yorum` text CHARACTER SET utf8 NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `haber_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `icerik`
--
ALTER TABLE `icerik`
  ADD PRIMARY KEY (`haber_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `icerik`
--
ALTER TABLE `icerik`
  MODIFY `haber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
