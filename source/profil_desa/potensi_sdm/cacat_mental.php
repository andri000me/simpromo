<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sdm where idkat = '8' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='red' border='1'>
            <tr>
                <th colspan='3'>CACAT MENTAL DAN FISIK</th>
            </tr>
            <tr>
                <th>FISIK</th>
                <th>LAKI-LAKI</th>
                <th>PEREMPUAN</th>
            </tr>";
    
    $t = 0;
    $t1 = 0;
    $t2 = 0;
    $l1 = 0;
    $l2 = 0;
    $p1 = 0;
    $p2 = 0;
    $s1 = mysql_query("select * from tbcacat_mental where tipe='1' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sdm where idkat = '8' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(",",$_d1['nilai']);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0] Orang</td>
                    <td align=right>$nilai[1] Orang</td>
                </tr>"; 
            $l1+=$nilai[0];
            $p1+=$nilai[1];       
        }
    }
    $t1 = $l1+$p1;
    
    echo "<tr><td>Jumlah</td><td align=right>$l1 Orang</td><td align=right>$p1 Orang</td></tr>";
    echo "<tr>
                <th>MENTAL</th>
                <th>LAKI-LAKI</th>
                <th>PEREMPUAN</th>
            </tr>";
    $s2 = mysql_query("select * from tbcacat_mental  where tipe='2' order by posisi asc");
    
    while($d2 = mysql_fetch_array($s2)){
        $_s2 = mysql_query("select * from tbinput_sdm where idkat = '8' and idsub = '$d2[id]' and tahun = '$tahun'");
        $_r2 = mysql_num_rows($_s2);
        $_d2 = mysql_fetch_array($_s2);
        $nilai2 = explode(",",$_d2['nilai']);
        
        if($_r2 != 0 && $_d2['nilai'] != ""){
            echo "<tr>
                    <td>$d2[nama]</td>
                    <td align=right>$nilai2[0] Orang</td>
                    <td align=right>$nilai2[1] Orang</td>
                </tr>"; 
            $l2+=$nilai2[0];
            $p2+=$nilai2[1];       
        }
    }
    $t2 = $l2+$p2;
    $t = $t1+$t2;
    echo "<tr><td>Jumlah</td><td align=right>$l2 Orang</td><td align=right>$p2 Orang</td></tr>";
    echo "<tr><td>Jumlah Total Cacat Mental dan Fisik</td><td colspan='2' align=right>$t Orang</td></tr>";
    echo "</table>";
}
?>