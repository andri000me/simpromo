<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sda where idkat='6' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='red' border='1'>
            <tr>
                <th colspan=2>PEMANFAATAN DAN KONDISI DANAU/SITU/WADUK</th>
            </tr>";
    $s1 = mysql_query("select * from tbpemanfaatan order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sda where idkat='6' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td>$_d1[nilai]</td>
                </tr>"; 
        }
    }
    echo "</table>";
}
?>