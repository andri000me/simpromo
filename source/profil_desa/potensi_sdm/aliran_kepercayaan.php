<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sdm where idkat = '5' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='yellow' border='1'>
            <tr>
                <th colspan='3'>AGAMA/ALIRAN KEPERCAYAAN</th>
            </tr>
            <tr>
                <th>AGAMA</th>
                <th>LAKI-LAKI</th>
                <th>PEREMPUAN</th>
            </tr>";
    $s1 = mysql_query("select * from tbaliran_kepercayaan order by posisi asc");
    $l = 0;
    $p = 0;
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sdm where idkat = '5' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(",",$_d1['nilai']);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0] Orang</td>
                    <td align=right>$nilai[1] Orang</td>
                </tr>"; 
            $l+=$nilai[0];
            $p+=$nilai[1];       
        }
    }
    echo "<tr><td>Jumlah</td><td align=right>$l Orang</td><td  align=right>$p Orang</td></tr>";
    echo "</table>";
}
?>