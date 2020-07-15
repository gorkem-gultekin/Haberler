<?php
           session_start();
           if (isset($_SESSION["kullanici_id"]) != true) 
           {                
                header("Location: giris.php");
           }
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
            echo "<font color=white><center>"."Kullanıcı Adı:  ".$_SESSION["kullanici_adi"]."  "."</font>";
            echo "<a href='cikis.php' class='btn btn-primary my-2'>Çıkış</a>";
            ?>
        </div>
    </div>
</nav>
<section class="jumbotron text-center">
    <div class="container">
        <h1>HABER GİRİŞİ</h1>        
    </div>
</section>
<div class="container">
   <div class="row">
    <form action="haber_kaydetme.php" method="post">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Haber Başlığı</label>
                <input type="text" required="" class="form-control col-12" name="haber_baslik"><br>
                <label for="name">Kategori</label>                
                <select name=kategoriler>
                    <option value='Spor'> Spor</option>
                    <option value='Finans'> Finans </option>
                    <option value='Magazin'> Magazin </option>
                    <option value='Sinema'> Sinema </option>
                    <option value='Teknoloji'> Teknoloji </option>
                </select>                
                <label for="name">Fotoğraf Linki</label>                
                <input type="text" required="" name="resim" id="image">                                
            </div>
        </div>       
        <div class="col-md-12">
            <div class="form-group">
                <label for="message">Mesaj İçeriği</label>
                <textarea  name="haber_icerik" required="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Onayla</button>
        </div>
</form>
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