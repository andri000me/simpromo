<?php
include "../config/koneksi.php";
$host = $_SERVER["SERVER_NAME"];
$base = "";
$server = "http://".$host."/".$base;

$_s = mysql_query("select * from tbakun where id='$_SESSION[nomor]'");
$_d = mysql_fetch_array($_s);
$desa = $_d['desa'];
$kec = $_d['kec'];
$user = $_d['username'];
$password = $_d['password'];

if(isset($_POST['simpan'])){
    $desa = mysql_real_escape_string(trim($_POST['desa']));
    $kec = mysql_real_escape_string(trim($_POST['kec']));
    $user = mysql_real_escape_string(trim($_POST['user']));
    $pass = mysql_real_escape_string(trim($_POST['pass']));
    $pass2 = mysql_real_escape_string(trim($_POST['pass2']));
    
    if($desa == "" || $kec == "" || $user == ""){
        echo "<script>alert('Field tidak boleh kosong, Kecuali Password dan Konfirmasi Password !');window.location='akun.php';</script>";
    }
    else{
        if($pass != ""){
            if($pass2 == ""){
                echo "<script>alert('Konfirmasi Password tidak boleh kosong !');window.location='akun.php';</script>";
            }
            else if($pass != $pass2){
                echo "<script>alert('Password dan Konfirmasi Password harus sama !');window.location='akun.php';</script>";
            }
            else{
                $str = "ABCDEFGH123456789";
                $password = md5($str.md5($pass).md5($str));
                $q = mysql_query("update tbakun set username='$user',password='$password',desa='$desa',kec = '$kec' where id='$_SESSION[nomor]'");
                if($q){
                    echo "<script>alert('Akun berhasil di ubah !');window.location='akun.php';</script>";
                }
            }
        }
        else
        {
            $q = mysql_query("update tbakun set username='$user',password='$password',desa='$desa',kec = '$kec' where id='$_SESSION[nomor]'");
            if($q){
                echo "<script>alert('Akun berhasil di ubah !');window.location='akun.php';</script>";
            }
        }
    }
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
    <link href="<?php echo $server; ?>/lib/css/table2.css" rel="stylesheet">
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
        <h1>UBAH AKUN</h1>
        <div class='alert alert-warning'>Password dan Konfirmasi Password boleh dikosongkan jika tidak ingin diubah.</div>
        <form method = "POST">
            <table style='border:none;'>
                <tr style='border-bottom:2px solid #27ae60'><td colspan='2'><h4>Informasi Desa</h4></td></tr>
                <tr>
                    <td>Nama Desa</td>
                    <td><input type='text' name='desa' value='<?php echo $desa; ?>'  required/></td>
                </tr>
                <tr>
                    <td>Nama Kecamatan</td>
                    <td><input type='text' name='kec' value='<?php echo $kec; ?>'  required /></td>
                </tr>
                <tr style='border-bottom:2px solid #27ae60'><td colspan='2'><h4>Informasi Akun</h4></td></tr>
                <tr>
                    <td>Username</td>
                    <td><input type='text' name='user' required value='<?php echo $user; ?>'/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type='password' name='pass'/></td>
                </tr>
                <tr>
                    <td>Konfirmasi Password</td>
                    <td><input type='password' name='pass2'/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' name='simpan' value='Simpan'/></td>
                </tr>
            </table>
        </form>
        <div class="footer">
            &copy; 2015 Masagi Solusi
        </div>
    </div>
    <script src="<?php echo $server; ?>/lib/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $server; ?>/lib/js/bootstrap.min.js"></script>