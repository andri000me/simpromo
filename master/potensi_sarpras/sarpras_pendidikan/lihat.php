<?php
include "../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$s = mysql_query("select * from tbinput_sarpras2 where idkat = '6' and tahun ='$tahun'");
$r = mysql_num_rows($s);
if($r == 0){
    echo "Tidak ada data pada tahun ini.";
}
else{
    $d = mysql_fetch_array($s);
    echo "<div align='right'><input type='reset' onclick='window.location=\"?mod=salin&bulan=$bulan&tahun=$tahun\"' id='salin' value='Salin'/> <input type='reset' onclick='window.location=\"?mod=ubah&idunik=$d[idunik]&tahun=$tahun\"' value='Ubah'/> ";
    echo "<input type='button' onclick='confirmDelete(\"?mod=hapus&tahun=$tahun\");' value='Hapus'/></div>";
    echo "<table border='1'>
            <tr>
                <th colspan='3'>PRASARANA DAN SARANA PENDIDIKAN</th>
            </tr>";
    $s1 = mysql_query("select * from tbsarpras_pendidikan order by posisi asc");

    while($d1 = mysql_fetch_array($s1)){
        $_s1 = mysql_query("select * from tbinput_sarpras2 where idkat = '6' and idsub = '$d1[id]' and tahun = '$tahun'");
        $_r1 = mysql_num_rows($_s1);
        $_d1 = mysql_fetch_array($_s1);
        $nilai = explode(",",$_d1['nilai']);
        
        if($_r1 != 0 && $_d1['nilai'] != ""){
            echo "<tr>
                    <td>$d1[nama]</td>
                    <td align=right>Sewa $nilai[0] Buah</td>
                    <td align=right>Milik Sendiri $nilai[1] Buah</td>
                </tr>";    
        }
    }
    echo "</table><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";
}
?>