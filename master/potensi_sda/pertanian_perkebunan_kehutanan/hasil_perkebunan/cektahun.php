<?php
include "../../../../config/koneksi.php";
include_once "../../../../functions/cektahun.php";

$mode = $_GET['mode'];
$tahun = $_GET['tahun'];
$tahun2 = $_GET['tahun2'];
$idkat = $_GET['idkat'];
$table = "tbinput_p2k";

cekTahun($table,$idkat,$tahun,$tahun2,$mode);
?>