<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_lembaga where idkat='1' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='purple' border='1'>
            <tr>
                <th rowspan='2'>NAMA LEMBAGA EKONOMI</th>
                <th rowspan='2'>JUMLAH</th>
                <th rowspan='2'>JUMLAH KEGIATAN</th>
                <th colspan='2'>JUMLAH</th>
            </tr>
            <tr>
                <th>PENGURUS</th>
                <th>ANGGOTA</th>
            <tr>
            <tr>
                <th align=left colspan='5'>LEMBAGA EKONOMI DAN UNIT USAHA DESA/KELURAHAN</th>
            </tr>";
    $j1 = 0;
    $j2 = 0;
    $j3 = 0;
    $j4 = 0;
    $s1 = mysql_query("select * from tblembaga_ekonomi where tipe = '1' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_lembaga where idkat='1' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(',',$_d1['nilai']);
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0] Unit</td>
                    <td align=right>$nilai[1]</td>
                    <td align=right>$nilai[2] Orang</td>
                    <td align=right>$nilai[3] Orang</td>
                </tr>"; 
            $j1+=$nilai[0];
            $j2+=$nilai[1];
            $j3+=$nilai[2];
            $j4+=$nilai[3];
        }
    }
    echo "<tr><td>Jumlah</td><td align=right>$j1 Unit</td><td align=right>$j2</td><td align=right>$j3 Orang</td><td align=right>$j4 Orang</td></tr>";
    echo "<tr>
                <th align=left colspan='5'>JASA LEMBAGA KEUANGAN</th>
            </tr>";
    $k1 = 0;
    $k2 = 0;
    $k3 = 0;
    $k4 = 0;
    $s2 = mysql_query("select * from tblembaga_ekonomi where tipe = '2' order by posisi asc");
    while($d2 = mysql_fetch_array($s2)){
        $_s2 = mysql_query("select * from tbinput_lembaga where idkat='1' and idsub = '$d2[id]' and tahun = '$tahun'");
        $_r2 = mysql_num_rows($_s2);
        $_d2 = mysql_fetch_array($_s2);
        $nilai2 = explode(',',$_d2['nilai']);
        if($_r2 != 0 && $_d2['nilai'] != ""){
            echo "<tr>
                    <td>$d2[nama]</td>
                    <td align=right>$nilai2[0] Unit</td>
                    <td align=right>$nilai2[1]</td>
                    <td align=right>$nilai2[2] Orang</td>
                    <td align=right>$nilai2[3] Orang</td>
                </tr>"; 
            $k1+=$nilai2[0];
            $k2+=$nilai2[1];
            $k3+=$nilai2[2];
            $k4+=$nilai2[3];
        }
    }
    echo "<tr><td>Jumlah</td><td align=right>$k1 Unit</td><td align=right>$k2</td><td align=right>$k3 Orang</td><td align=right>$k4 Orang</td></tr>";
    echo "<tr>
                <th align=left colspan='5'>INDUSTRI KECIL DAN MENENGAH</th>
            </tr>";
    $l1 = 0;
    $l2 = 0;
    $l3 = 0;
    $l4 = 0;
    $s3 = mysql_query("select * from tblembaga_ekonomi where tipe = '3' order by posisi asc");
    while($d3 = mysql_fetch_array($s3)){
        $_s3 = mysql_query("select * from tbinput_lembaga where idkat='1' and idsub = '$d3[id]' and tahun = '$tahun'");
        $_r3 = mysql_num_rows($_s3);
        $_d3 = mysql_fetch_array($_s3);
        $nilai3 = explode(',',$_d3['nilai']);
        if($_r3 != 0 && $_d3['nilai'] != ""){
            echo "<tr>
                    <td>$d3[nama]</td>
                    <td align=right>$nilai3[0] Unit</td>
                    <td align=right>$nilai3[1]</td>
                    <td align=right>$nilai3[2] Orang</td>
                    <td align=right>$nilai3[3] Orang</td>
                </tr>"; 
            $l1+=$nilai3[0];
            $l2+=$nilai3[1];
            $l3+=$nilai3[2];
            $l4+=$nilai3[3];
        }
    }
    echo "<tr><td>Jumlah</td><td align=right>$l1 Unit</td><td align=right>$l2</td><td align=right>$l3 Orang</td><td align=right>$l4 Orang</td></tr>";
    echo "</table>";
}
?>