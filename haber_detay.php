<?php
session_start();
require_once("vtbaglan.php"); 
$haber_id = $_GET["id"];               
        $haber_sorgu = mysqli_query($baglanti, "select haber_baslik,kategori,tarih,haber_icerik,haber_id,resim from icerik where haber_id=$haber_id");                    
        $haber_detay = mysqli_fetch_row($haber_sorgu);
        $baslik = $haber_detay[0];
        $kategori = $haber_detay[1];
        $tarih = $haber_detay[2];
        $haber_icerik=$haber_detay[3];
        $haber_id =$haber_detay[4];
        $resim=$haber_detay[5];        
?>
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
    <script src="assets/scripts/main.js"></script>
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
        <H1><?php echo $baslik; ?></h1>       
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <?php echo "Kategori: ".$kategori; ?>
                    <div class="date">
                        <?php echo $tarih. "&emsp;<a href='haber_sil.php?haber_id=$haber_id' class='active'>Haber Sil</a>;" ?>
                    </div>
                </div>
                <div class="card-body">
                    <p><?php echo "<br><center><img src='$resim'width='450px' height='300px'>&emsp;<br><br>". $haber_icerik; ?></p>
                </div>
            </div>
            <div class="card text-center mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" >Yorumlar</a>
                        </li>                        
                    </ul>
                </div>
                <?php
                $yorum_sorgu=mysqli_query($baglanti,"select yorumlar.yorumcu_kullanici_id,yorumlar.yorum,yorumlar.tarih,yorumlar.yorum_id from yorumlar INNER JOIN icerik on icerik.haber_id=yorumlar.haber_id where icerik.haber_id='$haber_id'");
                
                $yorum_sayisi=mysqli_num_rows($yorum_sorgu);
                for ($i=0; $i <$yorum_sayisi ; $i++) 
                {
                    $yorum_dizi=mysqli_fetch_row($yorum_sorgu);
                    $yorumcu_id=$yorum_dizi[0];
                    $yorum=$yorum_dizi[1];
                    $yorum_tarih=$yorum_dizi[2];
                    $yorum_id=$yorum_dizi[3];

                    //yorum yapan kişinin isim dizisi  
                    $yorum_yapan=mysqli_fetch_row(mysqli_query($baglanti,"select kullanici_adi from kullanicilar where kullanici_id='$yorumcu_id'"));                  
                    $yorumcu_ismi=$yorum_yapan[0];
                echo "<div class='card-body'><div class='tab-content' id='myTabContent'><div class='tab-pane fade show active' id='comments' role='tabpanel' aria-labelledby='home-tab'>";                      
                echo "<div class='media comment-box'><div class='media-left'><a href='#'><img class='img-responsive user-photo' src='https://ssl.gstatic.com/accounts/ui/avatar_2x.png'></a></div>";                                                  
                echo "<div class='media-body'><h6 class='media-heading'>$yorumcu_ismi<div class='date'> $yorum_tarih &emsp;<a href='yorum_sil.php?yorum_id=$yorum_id&haber_id=$haber_id&yorumcu_id=$yorumcu_id' class='active'>Yorumu Sil</a>&emsp;</div></h6><p>$yorum</p></div></div></div>";              

                }              
                ?>
                                <form action='yorum_ekle.php' method='POST'>
                <input type='hidden' name='haber_id' value='<?php echo $haber_id;?>'>
                <textarea class='form-control' placeholder='Yorumunuzu yazın' name='yorum' rows='5'></textarea>
                <center><br><button class='btn btn-primary' type='submit'>Yorum Yaz</button></center>
                </form>
                        <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="share mb-4">
                                <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook'da Paylaş">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                                <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Tweet at">
                                    <span class="fab fa-twitter"></span>
                                </a>
                                <a href="#" class="gplus" data-toggle="tooltip" data-placement="top" title="Google+'da Paylaş">
                                    <span class="fab fa-google-plus-g"></span>
                                </a>
                                <a href="#" class="linkedin" data-toggle="tooltip" data-placement="top" title="Linkedin'de Paylaş">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                                <a href="#" class="whatsapp" data-toggle="tooltip" data-placement="top" title="Whatsapp'dan Gönder">
                                    <span class="fab fa-whatsapp"></span>
                                </a>
                                <a href="mailto:tayfunerbilen" class="mail" data-toggle="tooltip" data-placement="top" title="E-posta olarak Gönder">
                                    <span class="fa fa-envelope"></span>
                                </a>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bağlantı Linki</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" onclick="this.select()" value="http://localhost/test-konu-bla-bla">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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