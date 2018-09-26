<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sda where idkat='4' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='red' border='1'>
            <tr>
                <th colspan='5'>SUMBER AIR DAN KUALITAS AIR MINUM</th>
            </tr>
            <tr>
                <th rowspan='3'>JENIS</th>
                <th rowspan='3'>JUMLAH (UNIT)</th>
                <th rowspan='3'>PEMANFAATAN (KK)</th>
                <th rowspan='3'>KONDISI BAIK/RUSAK</th>
                <th>KUALITAS AIR MINUM</th>
            <tr>
            <tr>
                <th><small>(Berbau)/(Berwarna)/<br/>(Berasa)/(Baik)</small></th>
            </tr>";
    $s1 = mysql_query("select * from tbsumber_air order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sda where idkat='4' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(',',$_d1['nilai']);
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0]</td>
                    <td align=right>$nilai[1]</td>
                    <td align=right>$nilai[2]</td>
                    <td align=right>$nilai[3]</td>
                </tr>"; 
        }
    }
    echo "</table>";
}
?>