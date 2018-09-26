<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sdm where idkat = '10' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='red' border='1'>
            <tr>
                <th colspan='4'>KUALITAS ANGKATAN KERJA</th>
            </tr>
            <tr>
                <th>ANGKATAN KERJA</th>
                <th>LAKI-LAKI</th>
                <th>PEREMPUAN</th>
                <th>JUMLAH</th>
            </tr>";
    $s1 = mysql_query("select * from tbkualitas_angker order by posisi asc");
    $t = 0;

    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sdm where idkat = '10' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(",",$_d1['nilai']);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            
            $t = $nilai[0]+$nilai[1];
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0] Orang</td>
                    <td align=right>$nilai[1] Orang</td>
                    <td align=right>$t Orang</td>
                </tr>"; 
                   
        }
    }
    
    echo "</table>";
}
?>