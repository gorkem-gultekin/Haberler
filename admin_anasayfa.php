<?php
        session_start();
        if ($_SESSION["yetki"]!= 1) 
        {           
            header("Location: index.php");
        }
?>
<!doctype html>
<html lang="en">
<head>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <a href="index.php"><title>haberiniz.com</title></a>
    <!--styles-->
    <link rel="stylesheet" href="admin_assets/styles/main.css">
    <!--scripts-->
    <script src="admin_assets/scripts/jquery-1.12.2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
    <script src="admin_assets/scripts/admin.js"></script>
</head>
<body>
<!--navbar-->
<div class="navbar">
    <ul dropdown>
        <li>
            <a href="index.php">
                <span class="fa fa-home"></span>
                <span class="title">
                    haberiniz.com
                </span>
            </a>        
    </ul>
</div>
<!--sidebar-->
<div class="sidebar">
    <ul>        
        <li class="active">
            <a href="admin_anasayfa.php">
                <span class="fa fa-thumb-tack"></span>
                <span class="title">
                    Bekleyen Haberler
                </span>
            </a>
        </li>            
               
        <li class="line">
            <span></span>
        </li>
    </ul>
    <a href="#" class="collapse-menu">
        <span class="fa fa-arrow-circle-left"></span>
        <span class="title">
            GİZLE
        </span>
    </a>
</div>
<!--content-->
<div class="content">
    <div class="box-">
        <h1>
            TÜM HABERLER
        </h1>
    </div>
    <div class="clear" style="height: 10px;"></div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Haber Başlığı</th>
                    <th class="hide">Yazar</th>
                    <th class="hide">Kategori</th>    
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    require_once("vtbaglan.php");                      
                    $haber = mysqli_query($baglanti, "select icerik.haber_baslik,icerik.kategori ,icerik.tarih,kullanicilar.kullanici_adi,icerik.haber_id, icerik.resim from icerik INNER JOIN kullanicilar on kullanicilar.kullanici_id=icerik.yazan_kullanici_id where icerik.onay='0' order by icerik.tarih desc ")or die("Sorgu hatasi");
                    $satirSayisi = mysqli_num_rows($haber);
                    for ($i=0; $i<$satirSayisi; $i++)
                        {
                            $bekleyen_haber = mysqli_fetch_row($haber);
                            $baslik = $bekleyen_haber[0];
                            $kategori = $bekleyen_haber[1];
                            $tarih = $bekleyen_haber[2];
                            $kullanici_adi=$bekleyen_haber[3];
                            $admin_haber_id=$bekleyen_haber[4];
                            $resim=$bekleyen_haber[5];
    echo "<td> <a href='admin_onay.php?admin_haber_id=$admin_haber_id' class='title'> $baslik </a>";
    echo "<div class='magic-links'> </div> </td> <td class='hide'> <a href='admin_onay.php?admin_haber_id=$admin_haber_id'>$kullanici_adi</a> </td";
    echo "<td></td><td class='hide'><a href='#'>$kategori</a></td> <td> <span class='date'> $tarih</span>";
    echo "</td></tr>";
                        }
                    ?>               
             </tbody>
        </table>
    </div>
</div>
</body>
</html>