<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sdm where idkat = '4' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='green' border='1'>
            <tr>
                <th colspan='3'>MATA PENCARIAN POKOK</th>
            </tr>
            <tr>
                <th>JENIS PEKERJAAN</th>
                <th>LAKI-LAKI</th>
                <th>PEREMPUAN</th>
            </tr>";
    $s1 = mysql_query("select * from tbmata_pencarian order by posisi asc");
    $l = 0;
    $p = 0;
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sdm where idkat = '4' and idsub = '$d1[id]' and tahun = '$tahun'");
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
    $t = $l+$p;
    echo "<tr><td>Jumlah Total Penduduk</td><td colspan=2 align=right>$t Orang</td></tr>";
    echo "</table>";
}
?>