<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sarpras where idkat='1' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='blue' border='1'>
            <tr>
                <th colspan='2'>PRASARANA DAN SARANA PEMERINTAH</th>
            </tr>
            <tr>
                <th colspan='2' align=left>Prasarana dan Sarana Pemerintah Desa/Kelurahan</th>
            </tr>";
    $s1 = mysql_query("select * from tbsarpras_desa where tipe='1' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sarpras where idkat='1' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$_d1[nilai]</td>
                </tr>"; 
        }
    }
    echo    "<tr>
                <th colspan='2' align=left>Inventaris dan Alat Turis Kantor</th>
            </tr>
            ";
    $s2 = mysql_query("select * from tbsarpras_desa where tipe='2' order by posisi asc");
    while($d2 = mysql_fetch_array($s2)){
        $_s2 = mysql_query("select * from tbinput_sarpras where idkat='1' and idsub = '$d2[id]' and tahun = '$tahun'");
        $_d2 = mysql_fetch_array($_s2);
        $_r2 = mysql_num_rows($_s2);
        
        if($_r2 != 0 && $_d2['nilai'] != ""){
            echo "<tr>
                    <td>$d2[nama]</td>
                    <td align=right>$_d2[nilai]</td>
                </tr>";
        }
    }
    echo    "<tr>
                <th colspan='2' align=left>Administrasi Pemerintahan Desa/Kelurahan</th>
            </tr>
            ";
    $s3 = mysql_query("select * from tbsarpras_desa where tipe='3' order by posisi asc");
    while($d3 = mysql_fetch_array($s3)){
        $_s3 = mysql_query("select * from tbinput_sarpras where idkat='1' and idsub = '$d3[id]' and tahun = '$tahun'");
        $_d3 = mysql_fetch_array($_s3);
        $_r3 = mysql_num_rows($_s3);
        $nilai = explode(",",$_d3['nilai']);
        if($_r3 != 0 && $_d3['nilai'] != ""){
            echo "<tr>
                    <td>$d3[nama]</td>
                    <td align=right>$nilai[0] , $nilai[1]</td>
                </tr>";
        }
    }
    echo "</table>";
}
?>