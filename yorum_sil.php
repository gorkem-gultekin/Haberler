<?php
session_start();
require_once("vtbaglan.php");
$yorum_id = $_GET["yorum_id"];
$haber_id=$_GET["haber_id"];
$yorumcu_id=$_GET["yorumcu_id"];

if($_SESSION["kullanici_id"]==$yorumcu_id||$_SESSION["yetki"]==1)
{
mysqli_query($baglanti, "delete from yorumlar where yorum_id='$yorum_id'");
header("Location: haber_detay.php?id=$haber_id");
}
else
{	
	header("Location: haber_detay.php?id=$haber_id");
}
?>