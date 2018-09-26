<?php
include "../../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sda where idkat='5' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "Tidak ada data pada tahun ini.";
}
else{
    $d = mysql_fetch_array($s);
    echo "<div align='right'><input type='reset' onclick='window.location=\"?mod=salin&bulan=$bulan&tahun=$tahun\"' id='salin' value='Salin'/> <input type='reset' onclick='window.location=\"?mod=ubah&idunik=$d[idunik]&tahun=$tahun\"' value='Ubah'/> ";
    echo "<input type='button' onclick='confirmDelete(\"?mod=hapus&tahun=$tahun\");' value='Hapus'/></div>";
    echo "<table border='1'>
            <tr>
                <th colspan=2>SUNGAI DAN RAWA</th>
            </tr>
            <tr>
                <th colspan=2 align='left'>SUNGAI</th>
            </tr>";
    $s1 = mysql_query("select * from tbsungai_rawa where tipe='1' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sda where idkat='5' and tipe='1' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td>$_d1[nilai]</td>
                </tr>"; 
        }
    }
    echo "  <tr>
                <th colspan=2 align='left'>RAWA</th>
            </tr>";
    $s2 = mysql_query("select * from tbsungai_rawa where tipe='2' order by posisi asc");
    while($d2 = mysql_fetch_array($s2)){
        $_s2 = mysql_query("select * from tbinput_sda where idkat='5' and tipe='2' and idsub = '$d2[id]' and tahun = '$tahun'");
        $_r2 = mysql_num_rows($_s2);
        $_d2 = mysql_fetch_array($_s2);
        
        if($_r2 != 0 && $_d2['nilai'] != ""){
            echo "<tr>
                    <td>$d2[nama]</td>
                    <td>$_d2[nilai]</td>
                </tr>"; 
        }
    }
    echo "</table><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";
}
?>