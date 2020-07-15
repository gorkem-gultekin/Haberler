<?php
require_once("vtbaglan.php");
$id = $_POST["haber_id"];
mysqli_query($baglanti, "delete from icerik where haber_id='$id'") or die("Sorgu hatasi");
echo "<script>alert('Haber Silindi..')</script>";
header("Refresh: 0;url=admin_anasayfa.php");
?>