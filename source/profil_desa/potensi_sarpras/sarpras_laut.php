<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sarpras2 where idkat = '3' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='green' border='1'>
            <tr>
                <th>PRASARANA TRANSPORTASI LAUT/SUNGAI</th>
                <th>KEBERADAAN</th>
                <th>JUMLAH</th>
            </tr>";
    $s1 = mysql_query("select * from tbsarpras_laut where tipe = '1' order by posisi asc");

    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sarpras2 where idkat = '3' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(",",$_d1['nilai']);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0]</td>
                    <td align=right>$nilai[1]</td>
                </tr>";    
        }
    }
    echo "<tr>
                <th>SARANA TRANSPORTASI LAUT/SUNGAI</th>
                <th>KEBERADAAN</th>
                <th>JUMLAH</th>
            </tr>";
    $s2 = mysql_query("select * from tbsarpras_laut where tipe = '2' order by posisi asc");

    while($d2 = mysql_fetch_array($s2)){
        $_s2 = mysql_query("select * from tbinput_sarpras2 where idkat = '3' and idsub = '$d2[id]' and tahun = '$tahun'");
        $_r2 = mysql_num_rows($_s2);
        $_d2 = mysql_fetch_array($_s2);
        $nilai2 = explode(",",$_d2['nilai']);
        
        if($_r2 != 0 && $_d2['nilai'] != ""){
            echo "<tr>
                    <td>$d2[nama]</td>
                    <td align=right>$nilai2[0]</td>
                    <td align=right>$nilai2[1]</td>
                </tr>";    
        }
    }
    echo "</table>";
}
?>