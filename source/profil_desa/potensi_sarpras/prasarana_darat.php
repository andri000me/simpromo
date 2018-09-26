<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sarpras2 where idkat = '1' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);

    echo "<table class='red' border='1'>
            <tr>
                <th rowspan = '2'>PRASARANA TRANSPORTASI DARAT</th>
                <th colspan = '2'>KONDISI</th>
            </tr>
            <tr>
                <th>BAIK<br/>(Km atau Unit)</th>
                <th>RUSAK<br/>(Km atau Unit)</th>
            </tr>";
    $s1 = mysql_query("select * from tbprasarana_darat where tipe='main' order by posisi asc");

    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sarpras2 where idkat = '1' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(",",$_d1['nilai']);

        $_s11 = mysql_query("select * from tbinput_sarpras2 where idkat='1' and  idmain = '$d1[id]' and nilai != '' and tahun ='$tahun'");
        $_r11 = mysql_num_rows($_s11);

        if(($_r1 != 0 && $_r11 != 0) || ($_r1 != 0 && $_d1['nilai'] != "")){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0]</td>
                    <td align=right>$nilai[1]</td>
                </tr>";
            $s2 = mysql_query("select * from tbprasarana_darat where tipe='sub' and idsub='$d1[id]' order by posisi asc");
            while($d2 = mysql_fetch_array($s2)){
                $_s2 = mysql_query("select * from tbinput_sarpras2 where idkat = '1' and idsub = '$d2[id]' and tahun = '$tahun'");
                $_r2 = mysql_num_rows($_s2);
                $_d2 = mysql_fetch_array($_s2);
                $nilai2 = explode(",",$_d2['nilai']);

                if($_r2 != 0 && $_d2['nilai'] != ""){
                    echo "<tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$d2[nama]</td>
                        <td align=right>$nilai2[0]</td>
                        <td align=right>$nilai2[1]</td>";
                }
            }
        }
    }
    echo "</table>";
}
?>
