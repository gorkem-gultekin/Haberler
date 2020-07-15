<?php	
	$kullanici_adi=$_POST["kullanici_adi"];
	$parola=md5($_POST["parola"]);
	// güvenlik kontrolleri...	
	require_once("vtbaglan.php");
		$kullanici_kontrol=mysqli_query($baglanti, "select kullanici_id,kullanici_adi,yetki from kullanicilar where kullanici_adi='$kullanici_adi' and parola='$parola'") or die("Sorgu hatasi");	
	if(mysqli_num_rows($kullanici_kontrol)==0)
	{
		echo "<script>alert('KULLANICI ADI VEYA ŞİFRENİZ YANLIŞ.TEKRAR DENEYİNİZ..')</script>";	
		header("Refresh: 0; url=giris.php");
		exit;
	}
		session_start();	
		$satir=mysqli_fetch_row($kullanici_kontrol);	
		$_SESSION["kullanici_id"]=$satir[0];
		$_SESSION["kullanici_adi"]=$satir[1];
		$_SESSION["yetki"]=$satir[2];
		if($_SESSION["yetki"]==0)
		{
		echo "<script>alert('GİRİŞ BAŞARILI..')</script>";	
		header("Refresh: 0; url=index.php");
		}
		else if($_SESSION["yetki"]==1)
		{	
			header("Location: admin_anasayfa.php");
		}
?>