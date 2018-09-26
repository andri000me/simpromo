<?php
include "../config/koneksi.php";
$host = $_SERVER["SERVER_NAME"];
$base = "";
$server = "https://".$host."/".$base;

$s = mysql_query("select * from tbakun where username = '$_SESSION[nami]' and id = '$_SESSION[nomor]'");
$d = mysql_fetch_array($s);

if($d['desa'] == "" || $d['kec'] == ""){
    echo "<script>alert('Selamat Datang ! Silahkan lengkapi data Desa Anda.');window.location='akun.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PAPAN INFORMASI DESA</title>

    <!-- Bootstrap -->
    <link href="<?php echo $server; ?>/lib/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $server; ?>/lib/css/style.css" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href="<?php echo $server; ?>/lib/css/jquery.navgoco.css"/>

  </head>
  <body>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                 <div class="navbar-brand">PAPAN PROFIL DAN MONOGRAFI DESA (PROMODES)</div>
                <button class="navbar-toggle" data-toggle="collapse" data-target=".menutop">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            </div>
            
            <div class="collapse navbar-collapse menutop">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo $server; ?>/master/">Beranda</a></li>
                    <li><a href="<?php echo $server; ?>/master/master.php">Master Data</a></li>
                    <li><a href="<?php echo $server; ?>/master/input.php">Input Data</a></li>
                    <li><a href="<?php echo $server; ?>/master/akun.php">Akun</a></li>
                    <li><a href="<?php echo $server; ?>/master/logout.php">Keluar</a></li>
                    <li class='active'><a href="<?php echo $server; ?>/" target="_blank">LIHAT PAPAN</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class='row'>
            <div class='col-md-4'>
              <img class="media-object" src="../lib/img/admin.ico" alt="Administrator"/>
          </div>
          <div class="col-md-8">
            <h1>HALAMAN ADMINISTRATOR</h1>
            <p>Selamat datang di PROMODES (Papan Profil dan Monografi Desa).<br/>Untuk mengelola silahkan gunakan Menu yang berada di sudut kanan atas.<br/><br/>
              - Profil Desa dibuat sesuai dengan Permendagri No. 22 Tahun 2007<br/>
            - Monografi Desa dibuat sesuai dengan Permendagri No. 13 Tahun 2012</p>
          </div>
        </div>
        <div class="footer">
            &copy; 2015 Masagi Solusi
        </div>
    </div>
    <script src="<?php echo $server; ?>/lib/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $server; ?>/lib/js/bootstrap.min.js"></script>