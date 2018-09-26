<?php
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_lembaga where idkat='2' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "";
}
else{
    $d = mysql_fetch_array($s);
    
    echo "<table class='purple' border='1'>
            <tr>
                <th colspan='5'>USAHA JASA PENGANGKUTAN</th>
            <tr>
                <th>JENIS KEGIATAN</th>
                <th>JUMLAH</th>
                <th>JUMLAH PEMILIK</th>
                <th>KAPASITAS ANGKUT</th>
                <th>JML. TENAGA KERJA</th>
            </tr>
            <tr>
                <th align=left colspan='5'>ANGKUTAN DARAT</th>
            </tr>";
    
    $s1 = mysql_query("select * from tbjasa_pengangkutan where tipe = '1' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_lembaga where idkat='2' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(',',$_d1['nilai']);
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>$nilai[0] Unit</td>
                    <td align=right>$nilai[1]</td>
                    <td align=right>$nilai[2] Orang</td>
                    <td align=right>$nilai[3] Orang</td>
                </tr>"; 
        }
    }
    echo "<tr>
                <th align=left colspan='5'>ANGKUTAN SUNGAI</th>
            </tr>";

    $s2 = mysql_query("select * from tbjasa_pengangkutan where tipe = '2' order by posisi asc");
    while($d2 = mysql_fetch_array($s2)){
        $_s2 = mysql_query("select * from tbinput_lembaga where idkat='2' and idsub = '$d2[id]' and tahun = '$tahun'");
        $_r2 = mysql_num_rows($_s2);
        $_d2 = mysql_fetch_array($_s2);
        $nilai2 = explode(',',$_d2['nilai']);
        if($_r2 != 0 && $_d2['nilai'] != ""){
            echo "<tr>
                    <td>$d2[nama]</td>
                    <td align=right>$nilai2[0] Unit</td>
                    <td align=right>$nilai2[1]</td>
                    <td align=right>$nilai2[2] Orang</td>
                    <td align=right>$nilai2[3] Orang</td>
                </tr>"; 
            
        }
    }
    echo "<tr>
                <th align=left colspan='5'>ANGKUTAN LAUT</th>
            </tr>";
   
    $s3 = mysql_query("select * from tbjasa_pengangkutan where tipe = '3' order by posisi asc");
    while($d3 = mysql_fetch_array($s3)){
        $_s3 = mysql_query("select * from tbinput_lembaga where idkat='2' and idsub = '$d3[id]' and tahun = '$tahun'");
        $_r3 = mysql_num_rows($_s3);
        $_d3 = mysql_fetch_array($_s3);
        $nilai3 = explode(',',$_d3['nilai']);
        if($_r3 != 0 && $_d3['nilai'] != ""){
            echo "<tr>
                    <td>$d3[nama]</td>
                    <td align=right>$nilai3[0] Unit</td>
                    <td align=right>$nilai3[1]</td>
                    <td align=right>$nilai3[2] Orang</td>
                    <td align=right>$nilai3[3] Orang</td>
                </tr>"; 
        }
    }
    echo "<tr>
                <th align=left colspan='5'>ANGKUTAN UDARA</th>
            </tr>";
   
    $s4 = mysql_query("select * from tbjasa_pengangkutan where tipe = '4' order by posisi asc");
    while($d4 = mysql_fetch_array($s4)){
        $_s4 = mysql_query("select * from tbinput_lembaga where idkat='2' and idsub = '$d4[id]' and tahun = '$tahun'");
        $_r4 = mysql_num_rows($_s4);
        $_d4 = mysql_fetch_array($_s4);
        $nilai4 = explode(',',$_d4['nilai']);
        if($_r4 != 0 && $_d4['nilai'] != ""){
            echo "<tr>
                    <td>$d4[nama]</td>
                    <td align=right>$nilai4[0] Unit</td>
                    <td align=right>$nilai4[1]</td>
                    <td align=right>$nilai4[2] Orang</td>
                    <td align=right>$nilai4[3] Orang</td>
                </tr>"; 
        }
    }
    echo "<tr>
                <th align=left colspan='5'>EKSPEDISI DAN PENGIRIMAN</th>
            </tr>";
   
    $s5 = mysql_query("select * from tbjasa_pengangkutan where tipe = '5' order by posisi asc");
    while($d5 = mysql_fetch_array($s5)){
        $_s5 = mysql_query("select * from tbinput_lembaga where idkat='2' and idsub = '$d5[id]' and tahun = '$tahun'");
        $_r5 = mysql_num_rows($_s5);
        $_d5 = mysql_fetch_array($_s5);
        $nilai5 = explode(',',$_d5['nilai']);
        if($_r5 != 0 && $_d5['nilai'] != ""){
            echo "<tr>
                    <td>$d5[nama]</td>
                    <td align=right>$nilai5[0] Unit</td>
                    <td align=right>$nilai5[1]</td>
                    <td align=right>$nilai5[2] Orang</td>
                    <td align=right>$nilai5[3] Orang</td>
                </tr>"; 
        }
    }
    echo "</table>";
}
?>