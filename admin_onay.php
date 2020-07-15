<?php
        require_once("vtbaglan.php"); 
        session_start();
        if ($_SESSION["yetki"]!= 1) 
        {               
          header("Location: index.php");
        }        
        $admin_haber_id = $_GET["admin_haber_id"];               
        $admin_haber_sorgu = mysqli_query($baglanti, "select haber_baslik,kategori,tarih,haber_icerik,haber_id,resim from icerik where haber_id=$admin_haber_id");    
        $admin_haber_detay = mysqli_fetch_row($admin_haber_sorgu);
        $baslik = $admin_haber_detay[0];
        $kategori = $admin_haber_detay[1];
        $tarih = $admin_haber_detay[2];
        $haber_icerik=$admin_haber_detay[3];
        $haber_id =$admin_haber_detay[4];
        $resim=$admin_haber_detay[5];
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
        </li>       
    </ul>
</div>
<!--sidebar-->
<div class="sidebar">
    <ul>        
        <li class="active">
            <a href="admin_anasayfa.php">
                <span class="fa fa-thumb-tack"></span>
                <span class="title">
                    <?php echo $kategori;?>
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
    <div class="box-container">
        <div class="box" id="div-0">
            <h3><?php echo $baslik."        "."Tarih: ".$tarih;?></h3>
            <div class="box-content">
                <p><?php echo "<img src='$resim' width='225px' height='150px'>&emsp;".$haber_icerik;?></p>
            </div>
        </div>
    </div>           
        <center>
          	<li>
                <form action='haber_onay.php' method='POST' style='float:left; margin-left:45%'>
                    <input type="hidden" name='haber_id' value='<?php echo $haber_id; ?>' >
            	    <button type="submit">Onayla</button>
                </form>
                <form action='haber_ret.php' method='POST' style='float:left; margin-left: 10px'>      
                    <input type="hidden" name='haber_id' value='<?php echo $haber_id; ?>' >
                    <button type="submit">Reddet</button>
                </form>
            </li>
        </center>  
</div>
</body>
</html>