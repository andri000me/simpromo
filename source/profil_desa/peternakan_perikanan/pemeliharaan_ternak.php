<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_p2 where idkat = '5' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='yellow' border='1'>
            <tr>
                <th colspan='2'>KETERSEDIAAN LAHAN PEMELIHARAAN TERNAK/PADANG PENGGEMBALAAN</th>
            </tr>";
    $s1 = mysql_query("select * from tbpemeliharaan_ternak order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_p2 where idkat = '5' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$_d1[nilai] Ha</td>
                </tr>"; 
        }
    }
    echo "</table>";
}
?>