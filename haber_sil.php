<?php
session_start();
require_once("vtbaglan.php");
$haber_id=$_GET["haber_id"];

if($_SESSION["yetki"]==1 or $_SESSION["yetki"]==0)
{
mysqli_query($baglanti, "delete from icerik where haber_id='$haber_id'");
mysqli_query($baglanti, "delete from yorumlar where haber_id='$haber_id'");
header("Location: index.php");
}
else
{	
	header("Location: haber_detay.php?id=$haber_id");
}
?>