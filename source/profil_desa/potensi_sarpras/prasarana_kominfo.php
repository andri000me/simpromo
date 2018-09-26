<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='blue' border='1'>
            <tr>
                <th colspan ='2'>PRASARANA KOMUNIKASI DAN INFORMASI</th>
            </tr>
            <tr>
                <th colspan='2' align=left>TELEPON</th>
            </tr>";
    $s1 = mysql_query("select * from tbprasarana_kominfo where tipe = '1' order by posisi asc");

    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$_d1[nilai]</td>
                </tr>";    
        }
    }
    echo "<tr>
                <th colspan='2' align=left>KANTOR POS</th>
            </tr>";
    $s2 = mysql_query("select * from tbprasarana_kominfo where tipe = '2' order by posisi asc");

    while($d2 = mysql_fetch_array($s2)){
        $_s2 = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and idsub = '$d2[id]' and tahun = '$tahun'");
        $_r2 = mysql_num_rows($_s2);
        $_d2 = mysql_fetch_array($_s2);
        
        if($_r2 != 0 && $_d2['nilai'] != ""){
            echo "<tr>
                    <td>$d2[nama]</td>
                    <td align=right>$_d2[nilai]</td>
                </tr>";    
        }
    }
    echo "<tr>
                <th colspan='2' align=left>RADIO/TV</th>
            </tr>";
    $s3 = mysql_query("select * from tbprasarana_kominfo where tipe = '3' order by posisi asc");

    while($d3 = mysql_fetch_array($s3)){
        $_s3 = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and idsub = '$d3[id]' and tahun = '$tahun'");
        $_r3 = mysql_num_rows($_s3);
        $_d3 = mysql_fetch_array($_s3);
        
        if($_r3 != 0 && $_d3['nilai'] != ""){
            echo "<tr>
                    <td>$d3[nama]</td>
                    <td align=right>$_d3[nilai]</td>
                </tr>";    
        }
    }
    echo "<tr>
                <th colspan='2' align=left>KORAN/MAJALAH/BULETIN</th>
            </tr>";
    $s4 = mysql_query("select * from tbprasarana_kominfo where tipe = '4' order by posisi asc");

    while($d4 = mysql_fetch_array($s4)){
        $_s4 = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and idsub = '$d4[id]' and tahun = '$tahun'");
        $_r4 = mysql_num_rows($_s4);
        $_d4 = mysql_fetch_array($_s4);
        
        if($_r4 != 0 && $_d4['nilai'] != ""){
            echo "<tr>
                    <td>$d4[nama]</td>
                    <td align=right>$_d4[nilai]</td>
                </tr>";    
        }
    }
    echo "</table>";
}
?>