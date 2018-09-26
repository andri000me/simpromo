<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sda where idkat='11' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='purple' border='1'>
            <tr>
                <th colspan='6'>KUALITAS UDARA</th>
            </tr>
            <tr>
                <th rowspan='3'>SUMBER</th>
                <th rowspan='3'>JUMLAH LOKASI<br/>SUMBER PENCEMAR</th>
                <th rowspan='3'>POLUTAN PENCEMAR</th>
                <th rowspan='3'>EFEK TERHADAP KESEHATAN (Gangguan, kebut, ISPA, dll)</th>
                <th colspan='2'>KEPEMILIKAN</th>
            <tr>
            <tr>
                <th>Pemda</th>
                <th>Swasta</th>
            </tr>";
    $s1 = mysql_query("select * from tbkualitas_udara order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sda where idkat='11' and idsub = '$d1[id]' and tahun = '$tahun'");
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
                    <td align=right>$nilai[4]</td>
                </tr>"; 
        }
    }
    echo "</table>";
}
?>