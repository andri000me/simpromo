<?php
$tahun = $_GET['tahun'];
$bulan = $_GET['bulan'];
$s = mysql_query("select * from tbinput_monografi where idkat = '5' and bulan ='$bulan' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
}
else{
    $d = mysql_fetch_array($s);
   
    echo "<table class='orange' border='1'>
            <tr>
                <th colspan='3' align=left>DATA KEUANGAN</th>
            </tr>";
    $n1 = 1;

    $s1= mysql_query("select * from tbmonografi_keuangan where tipe='main' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        
        $_s1 = mysql_query("select * from tbinput_monografi where idkat = '5' and idsub = '$d1[id]' and bulan = '$bulan' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        
        $_s11 = mysql_query("select * from tbinput_monografi where idkat='5' and  idmain = '$d1[id]' and nilai != '' and bulan = '$bulan' and tahun ='$tahun'");
        $_r11 = mysql_num_rows($_s11);
        
        if(($_r1 != 0 && $_r11 != 0) || ($_r1 != 0 && $_d1['nilai'] != "")){
            echo "<tr>
                    <td>$n1. $d1[nama]</td>
                    <td align=right>$_d1[nilai]</td>
                </tr>";
            $urut = $d1['pengurutan'];
            if($d1['pengurutan'] != '-'){
                $titik = ".";
            }
            else{
                $titik = "";
            }
            $s2 = mysql_query("select * from tbmonografi_keuangan where tipe='sub' and idsub='$d1[id]' order by posisi asc");
            while($d2 = mysql_fetch_array($s2)){
                $_s2 = mysql_query("select * from tbinput_monografi where idkat = '5' and idsub = '$d2[id]' and bulan = '$bulan' and tahun = '$tahun'");
                $_r2 = mysql_num_rows($_s2);
                $_d2 = mysql_fetch_array($_s2);
                
                $_s12 = mysql_query("select * from tbinput_monografi where idkat='5' and  idsub2 = '$d2[id]' and nilai != '' and bulan = '$bulan' and tahun ='$tahun'");
                $_r12 = mysql_num_rows($_s12);
                
                if(($_r2 != 0 && $_r12 != 0) || ($_r2 != 0 && $_d2['nilai'] != "")){
                    echo "<tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;$urut$titik $d2[nama]</td>
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
                    $s3 = mysql_query("select * from tbmonografi_keuangan where tipe='sub2' and idsub='$d2[id]' order by posisi asc");
                    while($d3 = mysql_fetch_array($s3)){
                        $_s3 = mysql_query("select * from tbinput_monografi where idkat = '5' and idsub = '$d3[id]' and bulan = '$bulan' and tahun = '$tahun'");
                        $_r3 = mysql_num_rows($_s3);
                        $_d3 = mysql_fetch_array($_s3);

                        if($_r3 != 0 && $_d3['nilai'] != ""){
                            echo "<tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$urut2$titik2 $d3[nama]</td>
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
    echo "</table>";
}
?>