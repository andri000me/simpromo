<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_p2k where idkat='2' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    echo "<table class='blue' border='1'>
            <tr>
                <th colspan='3'>LUAS LAHAN DAN PRODUKTIVITAS PERTANIAN</th>
            </tr>
            <tr>
                <th colspan='3'>TANAMAN PANGAN</th>
            </tr>
            <tr>
                <th>JENIS</th>
                <th>LUAS<br/>(Ha)</th>
                <th>HASIL<br/>(Ton/Ha)</th>
            </tr>";
    $s1 = mysql_query("select * from tbproduktivitas_pertanian where tipe='1' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_p2k where idkat='2' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(',',$_d1['nilai']);
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0]</td>
                    <td align=right>$nilai[1]</td>
                </tr>"; 
        }
    }
    echo    "
            <tr>
                <th colspan='3'>TANAMAN BUAH-BUAHAN</th>
            </tr>
            <tr>
                <th>JENIS</th>
                <th>LUAS<br/>(Ha)</th>
                <th>HASIL<br/>(Ton/Ha)</th>
            </tr>";

    $s2 = mysql_query("select * from tbproduktivitas_pertanian where tipe='2' order by posisi asc");
    while($d2 = mysql_fetch_array($s2)){
        $_s2 = mysql_query("select * from tbinput_p2k where idkat='2' and idsub = '$d2[id]' and tahun = '$tahun'");
        $_d2 = mysql_fetch_array($_s2);
        $_r2 = mysql_num_rows($_s2);
        $nilai2 = explode(',',$_d2['nilai']);
        if($_r2 != 0 && $_d2['nilai'] != ""){
            echo "<tr>
                    <td>$d2[nama]</td>
                    <td align=right>$nilai2[0]</td>
                    <td align=right>$nilai2[1]</td>
                </tr>";
        }
    }
    echo    "</table><table class='green'>
            <tr>
                <th colspan='3'>TANAMAN APOTIK HIDUP DAN SEJENISNYA</th>
            </tr>
            <tr>
                <th>JENIS</th>
                <th>LUAS<br/>(Ha)</th>
                <th>HASIL<br/>(Ton/Ha)</th>
            </tr>";
    $s3 = mysql_query("select * from tbproduktivitas_pertanian where tipe='3' order by posisi asc");
    while($d3 = mysql_fetch_array($s3)){
        $_s3 = mysql_query("select * from tbinput_p2k where idkat='2' and idsub = '$d3[id]' and tahun = '$tahun'");
        $_d3 = mysql_fetch_array($_s3);
        $nilai3 = explode(',',$_d3['nilai']);
        $_r3 = mysql_num_rows($_s3);
        if($_r3 != 0 && $_d3['nilai'] != ""){
            echo "<tr>
                    <td>$d3[nama]</td>
                    <td align=right>$nilai3[0]</td>
                    <td align=right>$nilai3[1]</td>
                </tr>";
        }
    }
    echo "</table>";
}
?>