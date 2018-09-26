<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_p2k where idkat='3' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    echo "<table class='red' border='1'>
            <tr>
                <th colspan='5'>LUAS DAN HASIL PERKEBUNAN</th>
            </tr>
            <tr>
                <th rowspan='3'>JENIS</th>
                <th colspan='2'>SWASTA NEGARA</th>
                <th colspan='2'>RAKYAT</th>
            <tr>
            <tr>
                <th>LUAS (Ha)</th>
                <th>HASIL (kw/ha)</th>
                <th>LUAS (Ha)</th>
                <th>HASIL (kw/ha)</th>
            </tr>";
    $s1 = mysql_query("select * from tbhasil_perkebunan order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_p2k where idkat='3' and idsub = '$d1[id]' and tahun = '$tahun'");
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