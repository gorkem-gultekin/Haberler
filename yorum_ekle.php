<?php
session_start();
require_once("vtbaglan.php");
$yorum=$_POST["yorum"];
$id=$_POST["haber_id"];
$yorumcu=$_SESSION["kullanici_id"];
           if (isset($yorumcu) != true) 
           {               
                header("Location: giris.php");
           }
           else
           {
mysqli_query($baglanti,"insert into yorumlar(yorumcu_kullanici_id,yorum,haber_id) values ('$yorumcu','$yorum','$id')") or die("sorgu hatasi");
			header("Location: haber_detay.php?id=$id");
			}
?>