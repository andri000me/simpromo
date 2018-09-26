<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sda where idkat='9' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='yellow' border='1'>
            <tr>
                <th colspan='4'>RUANG PUBLIK/TAMAN</th>
            </tr>
            <tr>
                <th>RUANG PUBLIK/TAMAN</th>
                <th>KEBERADAAN</th>
                <th>LUAS</th>
                <th>TINGKAT PEMANFAATAN</th>
            <tr>
           ";
    $s1 = mysql_query("select * from tbruang_publik order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sda where idkat='9' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(',',$_d1['nilai']);
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0]</td>
                    <td align=right>$nilai[1] M2</td>
                    <td align=right>$nilai[2]</td>
                </tr>"; 
        }
    }
    echo "</table>";
}
?>