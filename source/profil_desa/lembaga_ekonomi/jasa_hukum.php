<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_lembaga where idkat='7' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='green' border='1'>
            <tr>
                <th colspan='4'>USAHA JASA HUKUM DAN KONSULTASI</th>
            </tr>
            <tr>
                <th>NAMA USAHA</th>
                <th>JUMLAH</th>
                <th>JENIS PRODUK</th>
                <th>JML. TENAGA KERJA</th>
            </tr>";

    $s1 = mysql_query("select * from tbjasa_hukum order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_lembaga where idkat='7' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(',',$_d1['nilai']);
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0] Unit</td>
                    <td align=right>$nilai[1] Jenis</td>
                    <td align=right>$nilai[2] Orang</td>
                </tr>"; 
        }
    }
    echo "</table>";
}
?>