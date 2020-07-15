 <?php
 	require_once("vtbaglan.php");	
	$kullanici_adi=$_POST["kullanici_adi"];
	$mail=$_POST["mail"];
	$parola=$_POST["parola"];
	$parola_tekrar=$_POST["parola_tekrar"];
	
	//form elemanları eksiksiz doldurulmuş mu?
	$kullanici_isim_kontrol = mysqli_query($baglanti,"select kullanici_adi from kullanicilar where kullanici_adi='$kullanici_adi'");
	$kullanici_mail_kontrol=mysqli_query($baglanti,"select mail from kullanicilar where mail='$mail'");	
		if ((mysqli_num_rows($kullanici_isim_kontrol) > 0)||(mysqli_num_rows($kullanici_mail_kontrol) > 0))
			{
				echo "<script>alert('BU KULLANICI ADI VEYA MAİL ALINMIŞTIR.TEKRAR DENEYİNİZ..')</script>";
				header("Refresh: 0; url=kayit_ol.php");
			}
		else
		{
			if(empty($kullanici_adi)||empty($mail)||empty($parola)||empty($parola_tekrar))
				{
					echo "<script>alert('LÜTFEN BOŞ ALAN BIRAKMAYINIZ..')</script>";
					header("Refresh: 0; url=kayit_ol.php");
				}
			else
				{
					if($parola!=$parola_tekrar)
					{
						echo "<script>alert('PAROLALAR UYUŞMUYOR.TEKRAR DENEYİNİZ..')</script>";
						header("Refresh: 0; url=kayit_ol.php");
					}
					else
					{$parola=md5($parola);
						mysqli_query($baglanti, "insert into kullanicilar (kullanici_adi, mail, parola) values ('$kullanici_adi', '$mail', '$parola')") or die("Sorgu calistirilamadi.");
						echo "<script>alert('KAYDINIZ BAŞARILI..')</script>";
						header("Refresh: 0; url=giris.php");
					}
				}
		}	
	
		
	//html etiketlerinin temizlenmesi. Her biri için strip_tags kullanilmali.
	strip_tags($kullanici_adi);
	strip_tags($mail);
	strip_tags($parola);
	strip_tags($parola_tekrar);	
	//veritabanına yönelik saldırı kontrolü.

	//parola-->md5	
	$kullanici_adi=mysqli_real_escape_string($baglanti, $kullanici_adi);
	$mail=mysqli_real_escape_string($baglanti, $mail);
	$parola=mysqli_real_escape_string($baglanti, $parola);
	$parola_tekrar=mysqli_real_escape_string($baglanti, $parola_tekrar);

	//mail adresi veya kullanıcı adı daha önce alınmış mı?
	
	

 ?>
 