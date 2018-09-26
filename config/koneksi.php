<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "infodesa";

$con = mysql_connect($host,$user,$pass) or die("Koneksi Gagal !");
mysql_select_db($db,$con);

//cek session
$host = $_SERVER["SERVER_NAME"];
$base = "promodes";

define("BASE","http://".$host."/".$base);

if(!isset($_SESSION['nami']) && !isset($_SESSION['nomor'])){
    header("location:".BASE."/master/login.php");
}
else{
    echo "";
}
?>