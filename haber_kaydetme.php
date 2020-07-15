<?php	
   	$haber_baslik=$_POST["haber_baslik"];
	$kategoriler=$_POST["kategoriler"];
	$haber_icerik=$_POST["haber_icerik"];
	$resim = $_POST["resim"];
	$haber_baslik=addslashes(strip_tags($haber_baslik));
	$kategoriler=addslashes(strip_tags($kategoriler));
	$haber_icerik=addslashes(strip_tags($haber_icerik));
	$resim = addslashes(strip_tags($resim));
	session_start();
	$kullanici_id=$_SESSION["kullanici_id"];
    require_once("vtbaglan.php");
 	mysqli_query($baglanti,"insert into icerik(haber_baslik,kategori,haber_icerik,yazan_kullanici_id, resim) values('$haber_baslik','$kategoriler','$haber_icerik','$kullanici_id', '$resim')")or die("Sorgu hatasi");
 	echo "<script>alert('HABER GİRİŞİ BAŞARILI..')</script>";	
	header("Refresh: 0; url=haber_girisi.php");
?>