<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <a href="index.php"><title>haberiniz.com</title></a>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="kullanici_assets/styles/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">haberiniz.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="haber_girisi.php">Haber Girişi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategoriler
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="spor.php">Spor</a>
                        <a class="dropdown-item" href="finans.php">Finans</a>
                        <a class="dropdown-item" href="magazin.php">Magazin</a>
                        <a class="dropdown-item" href="sinema.php">Sinema</a>
                        <a class="dropdown-item" href="teknoloji.php">Teknoloji</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_anasayfa.php">Admin Panel</a>
                </li>
            </ul>
            <?php
           session_start();
           if (isset($_SESSION["kullanici_id"]) != true) 
           {
                echo "<div class='dropdown'>";
               echo "<button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                 echo "Giriş Yap";
                echo "</button>";
                echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                    echo "<a class='dropdown-item' href='giris.php'>Giriş Yap</a>";
                    echo "<a class='dropdown-item' href='kayit_ol.php'>Kayıt Ol</a>";
                echo "</div>";
            echo "</div>";
           }
            else
            {
            echo "<font color=white><center>"."Kullanıcı Adı:  ".$_SESSION["kullanici_adi"]."  "."</font>";
            echo "<a href='cikis.php' class='btn btn-primary my-2'>Çıkış</a>";
            }
           ?>
        </div>
    </div>
</nav>
<section class="jumbotron text-center">
    <div class="container">
        <h1>HABERLER</h1>        
    </div>
</section>
        <?php
                    require_once("vtbaglan.php");                  
                    $onayli_icerik = mysqli_query($baglanti, "select haber_baslik,kategori,tarih,haber_icerik,haber_id,resim from icerik where onay ='1' and kategori='Spor'order by tarih desc");
                    $onayli_satirsayisi = mysqli_num_rows($onayli_icerik);
                    for ($i=0; $i<$onayli_satirsayisi; $i++)
                        {
                            $onayli_haber = mysqli_fetch_row($onayli_icerik);
                            $baslik = $onayli_haber[0];
                            $kategori = $onayli_haber[1];
                            $tarih = $onayli_haber[2];
                            $haber_icerik=$onayli_haber[3];
                            $haber_id =$onayli_haber[4];
                            $resim=$onayli_haber[5];                         
        echo "<div class='container'><div class='row'><div class='col-md-8'><div class='card mb-3'>";
        echo "<div class='card-header'>$kategori<div class='date'>$tarih</div></div><div class='card-body'>";
        echo "<h5 class='card-title'>$baslik </h5><p class='card-text'><img style='float:left' src='$resim' width='200px' height='150px'>&emsp;$haber_icerik</p><a href='haber_detay.php?id=$haber_id' class='btn btn-dark'>Görüntüle</a></div></div></div>";        
                        }
        ?>
        <div class="col-md-4">
            <h4 class="pb-3">
                <i class="fa fa-folder"></i>
                Kategoriler
            </h4>
            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <a href="spor.php" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        SPOR
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="finans.php" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        FİNANS
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="magazin.php" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        MAGAZİN                       
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="sinema.php" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        SİNEMA                        
                    </a>
                </li>
                 <li class="list-group-item">
                    <a href="teknoloji.php" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        TEKNOLOJİ                        
                    </a>
                </li>
            </ul>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
               <center>
                <div class="row">
                    <div class="col-12 col-md">
                        <h5>Haberiniz.com</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="index.php">Anasayfa</a></li>
                            <li><a class="text-muted" href="haber_girisi.php">Haber Girişi</a></li>                          
                        </ul>
                    </div> 
                    <div class="col-12 col-md">
                        <h5>Sosyal Medya</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#"><i class="fab fa-facebook-square"></i> haberiniz</a>
                            </li>
                            <li><a class="text-muted" href="#"><i class="fab fa-twitter-square"></i> haberiniz</a>
                            </li>
                            <li><a class="text-muted" href="#"><i class="fab fa-instagram"></i> haberiniz</a></li>
                        </ul>
                    </div>
                </div>
                <center><small class="d-block mb-3 text-muted">© 2019</small></center>
            </center>
            </footer>
        </div>
    </div>   
</body>
</html>