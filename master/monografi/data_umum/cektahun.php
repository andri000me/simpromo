<?php
include "../../../config/koneksi.php";
include_once "../../../functions/bulanIndo.php";
include_once "../../../functions/cektahun2.php";

$mode = $_GET['mode'];
$bulan = $_GET['bulan'];
$bulan2 = $_GET['bulan2'];
$tahun = $_GET['tahun'];
$tahun2 = $_GET['tahun2'];
$idkat = $_GET['idkat'];
$table = "tbinput_monografi";

cekTahun($table,$idkat,$bulan,$bulan2,$tahun,$tahun2,$mode);
?>