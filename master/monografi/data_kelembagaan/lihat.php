<?php
include "../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$bulan = $_GET['bulan'];
$s = mysql_query("select * from tbinput_monografi where idkat = '6' and bulan ='$bulan' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "Tidak ada data pada tahun ini.";
}
else{
    $d = mysql_fetch_array($s);
    echo "<div align='right'><input type='reset' onclick='window.location=\"?mod=salin&bulan=$bulan&tahun=$tahun\"' id='salin' value='Salin'/> <input type='reset' onclick='window.location=\"?mod=ubah&idunik=$d[idunik]&bulan=$bulan&tahun=$tahun\"' value='Ubah'/> ";
    echo "<input type='button' onclick='confirmDelete(\"?mod=hapus&bulan=$bulan&tahun=$tahun\");' value='Hapus'/></div>";
    echo "<table border='1'>
            <tr>
                <th colspan='3' align=left>DATA KELEMBAGAAN</th>
            </tr>";
    $n1 = 1;

    $s1= mysql_query("select * from tbmonografi_kelembagaan where tipe='main' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        
        $_s1 = mysql_query("select * from tbinput_monografi where idkat = '6' and idsub = '$d1[id]' and bulan = '$bulan' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        
        $_s11 = mysql_query("select * from tbinput_monografi where idkat='6' and  idmain = '$d1[id]' and nilai != '' and bulan = '$bulan' and tahun ='$tahun'");
        $_r11 = mysql_num_rows($_s11);
        
        if(($_r1 != 0 && $_r11 != 0) || ($_r1 != 0 && $_d1['nilai'] != "")){
            echo "<tr>
                    <td>$n1</td>
                    <td>$d1[nama]</td>
                    <td align=right>$_d1[nilai]</td>
                </tr>";
            $urut = $d1['pengurutan'];
            if($d1['pengurutan'] != '-'){
                $titik = ".";
            }
            else{
                $titik = "";
            }
            $s2 = mysql_query("select * from tbmonografi_kelembagaan where tipe='sub' and idsub='$d1[id]' order by posisi asc");
            while($d2 = mysql_fetch_array($s2)){
                $_s2 = mysql_query("select * from tbinput_monografi where idkat = '6' and idsub = '$d2[id]' and bulan = '$bulan' and tahun = '$tahun'");
                $_r2 = mysql_num_rows($_s2);
                $_d2 = mysql_fetch_array($_s2);
                
                $_s12 = mysql_query("select * from tbinput_monografi where idkat='6' and  idsub2 = '$d2[id]' and nilai != '' and bulan = '$bulan' and tahun ='$tahun'");
                $_r12 = mysql_num_rows($_s12);
                
                if(($_r2 != 0 && $_r12 != 0) || ($_r2 != 0 && $_d2['nilai'] != "")){
                    echo "<tr>
                        <td></td>
                        <td>$urut$titik $d2[nama]</td>
                        <td align=right>$_d2[nilai]</td>";
                    if($urut != '-'){
                        $urut++;
                    }
                    $urut2 = $d2['pengurutan'];
                    if($d2['pengurutan'] != '-'){
                        $titik2 = ".";
                    }
                    else{
                        $titik2 = "";
                    }
                    $s3 = mysql_query("select * from tbmonografi_kelembagaan where tipe='sub2' and idsub='$d2[id]' order by posisi asc");
                    while($d3 = mysql_fetch_array($s3)){
                        $_s3 = mysql_query("select * from tbinput_monografi where idkat = '6' and idsub = '$d3[id]' and bulan = '$bulan' and tahun = '$tahun'");
                        $_r3 = mysql_num_rows($_s3);
                        $_d3 = mysql_fetch_array($_s3);

                        if($_r3 != 0 && $_d3['nilai'] != ""){
                            echo "<tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$urut2$titik2 $d3[nama]</td>
                                <td align=right>$_d3[nilai]</td>";
                            if($urut2 != '-'){
                                $urut2++;
                            }
                        }
                    }
                }
            }
            $n1++;
        }
    }
    echo "</table><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";
}
?>
<style>
tr td{
    min-width:10px;
}
td:first-child{
    width:10px;
}
</style>