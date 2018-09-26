<?php
$host = $_SERVER["SERVER_NAME"];
$base = "";
$server = "https://".$host;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PAPAN INFORMASI MUKIM</title>

    <!-- Bootstrap -->
    <link href="<?php echo $server; ?>/lib/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $server; ?>/lib/css/style2.css" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href="<?php echo $server; ?>/lib/css/jquery.navgoco.css"/>
    <script src="<?php echo $server; ?>/lib/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $server; ?>/lib/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                 <div class="navbar-brand">PAPAN PROFIL DAN MONOGRAFI MUKIM (PROMODES)</div>
                <button class="navbar-toggle" data-toggle="collapse" data-target=".menutop">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            </div>
            
            <div class="collapse navbar-collapse menutop">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href='index.php'>Beranda</a></li>
                    <li class='dropdown'><a href='#' data-toggle="dropdown" class="dropdown-toggle">Profil Mukim <b class="caret"></b></a>
                        <ul class='dropdown-menu'>
                            <li><a href='?req=sda'>Potensi Sumber Daya Alam</a></li>
                            <li><a href='?req=sdm'>Potensi Sumber Daya Manusia</a></li>
                            <li><a href='?req=sarpras'>Potensi Prasarana Dan Sarana Bag. 1</a></li>
                            <li><a href='?req=sarpras2'>Potensi Prasarana Dan Sarana Bag. 2</a></li>
                            <li><a href='?req=le'>Lembaga Ekonomi</a></li>
                        </ul>
                    </li>
                    <li><a href='?req=mono'>Monografi Mukim</a></li>
                    <li class='active'><a href='../master/login.php'>ADMINISTRATOR</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">