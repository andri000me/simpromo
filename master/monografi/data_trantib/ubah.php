<?php
include "../../../config/koneksi.php";
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $bulan2 = $_POST['bulan'];
    $tahun2 = $_POST['tahun'];
    if($bulan != $bulan2 && $tahun != $tahun2){
        $s = mysql_query("select * from tbinput_monografi where idkat = '7' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $bulan = $bulan2;
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tbmonografi_trantib order by posisi asc");
            while($d1 = mysql_fetch_array($s1)){
                $trantib = $_POST['trantib'.$d1['id']];
                $q = mysql_query("update tbinput_monografi set nilai = '$trantib',bulan = '$bulan',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tbmonografi_trantib order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            $trantib = $_POST['trantib'.$d1['id']];
            $q = mysql_query("update tbinput_monografi set nilai = '$trantib',bulan = '$bulan',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d1[id]'");
        }
        if($q){
            echo "<script>window.location='index.php';</script>";
        }
    }
}
?>
<script type="text/javascript" src="../../../lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $bulan = $("#bulan");
    $tampil = $("#tampil");
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        if(i == <?php echo $tahun; ?>){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    $tahun.change(function(){
        if($bulan.val() != '' && $tahun.val() != ''){
            $.ajax({
                url:'cektahun.php',
                type:'GET',
                data:{idkat:7,mode:'ubah',bulan:<?php echo $bulan; ?>,bulan2:$bulan.val(),tahun:<?php echo $tahun; ?>,tahun2:$tahun.val()},
                success:function(data){
                    if(data != ""){
                        alert(data);
                        window.location.reload();
                    }
                }
            });
        }
    });
    $bulan.change(function(){
        if($tahun.val() != '' && $bulan.val() != ''){
            $.ajax({
                url:'cektahun.php',
                type:'GET',
                data:{idkat:7,mode:'ubah',bulan:<?php echo $bulan; ?>,bulan2:$bulan.val(),tahun:<?php echo $tahun; ?>,tahun2:$tahun.val()},
                success:function(data){
                    if(data != ""){
                        alert(data);
                        window.location.reload();
                    }
                }
            });
        }
    });
});
</script>

<?php
echo "<form method='post'>
    Bulan : <select name='bulan' id='bulan' required>
                <option value=''>- Pilih Bulan -</option>";
                for($i = 1;$i<=12;$i++){
                    if($bulan == $i){
                        echo "<option value='$i' selected>".getBulan($i)."</option>";
                    }
                    else{
                        echo "<option value='$i'>".getBulan($i)."</option>";
                    }
                }
echo "      </select>Tahun : <select name='tahun' id='tahun'>
    </select>
    <table border='1'>
        <tr>
            <th colspan='3' align=left>DATA TRANTIB DAN BENCANA</th>
        </tr>";
$n1 = 1;
$s1= mysql_query("select * from tbmonografi_trantib where tipe='main' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_monografi where idkat = '7' and idsub = '$d1[id]' and bulan = '$bulan' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$n1</td>
                <td>$d1[nama]</td>
                <td><input type='text' name='trantib$d1[id]' value='$_d1[nilai]'></td>
            </tr>";
        $urut = $d1['pengurutan'];
        if($d1['pengurutan'] != '-'){
                $titik = ".";
        }
        else{
            $titik = "";
        }
        $s2 = mysql_query("select * from tbmonografi_trantib where tipe='sub' and idsub='$d1[id]' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            $_s2 = mysql_query("select * from tbinput_monografi where idkat = '7' and idsub = '$d2[id]' and bulan = '$bulan' and tahun = '$tahun'");
            $_d2 = mysql_fetch_array($_s2);
            $_r2 = mysql_num_rows($_s2);
            if($_r2 != 0){
                echo "<tr>
                    <td></td>
                    <td>$urut$titik $d2[nama]</td>
                    <td><input type='text' name='trantib$d2[id]' value='$_d2[nilai]'></td>";
                if($urut != '-'){
                        $urut++;
                }
                $urut2 = $d2['pengurutan'];
                if($d2['pengurutan'] != '-'){
                    $titik2 = ".";
                }
                else{
                    $titik2 = "";
                }
                $s3 = mysql_query("select * from tbmonografi_trantib where tipe='sub2' and idsub='$d2[id]' order by posisi asc");
                while($d3 = mysql_fetch_array($s3)){
                    $_s3 = mysql_query("select * from tbinput_monografi where idkat = '7' and idsub = '$d3[id]' and bulan = '$bulan' and tahun = '$tahun'");
                    $_d3 = mysql_fetch_array($_s3);
                    $_r3 = mysql_num_rows($_s3);
                    if($_r3 != 0){
                        echo "<tr>
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$urut2$titik2 $d3[nama]</td>
                            <td><input type='text' name='trantib$d3[id]' value='$_d3[nilai]'></td>";
                        if($urut2 != '-'){
                                $urut2++;
                        }
                    }
                }
            }
        }
        $n1++;
    }
}
echo "<tr>
        <td colspan='3' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

?>
<style>
tr td{
    min-width:10px;
}
td:first-child{
    width:10px;
}
</style>