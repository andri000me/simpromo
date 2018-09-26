<?php
include "../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $s = mysql_query("select * from tbinput_monografi where idkat = '4' and bulan = '$bulan' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada bulan ".getBulan($bulan)." $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk bulan tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_monografi where idkat = '4'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbmonografi_kewenangan order by id asc");
        while($d1 = mysql_fetch_array($s1)){
            if($d1['tipe'] == "sub2"){
                $s = mysql_query("select * from tbmonografi_kewenangan where id = '$d1[idsub]'");
                $d = mysql_fetch_array($s);
                $idsub = $d['idsub'];
                $idsub2 = $d1['idsub'];
            }
            else{
                $idsub = $d1['idsub'];
                $idsub2 = 0;
            }
            $kewenangan = $_POST['kewenangan'.$d1['id']];
            $q = mysql_query("insert into tbinput_monografi(idkat,idunik,idsub,idmain,idsub2,nilai,bulan,tahun) values('4','$idunik','$d1[id]','$idsub','$idsub2','$kewenangan','$bulan','$tahun')");
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
        $tahun.append("<option value='"+i+"'>"+i+"</option>");
    }
    
    $tahun.change(function(){
        if($tahun.val() != '' && $bulan.val() != ''){
            $.ajax({
                url:'cektahun.php',
                type:'GET',
                data:{idkat:4,mode:'input',bulan:$bulan.val(),bulan2:0,tahun:$tahun.val(),tahun2:0},
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
        if($bulan.val() != '' && $tahun.val() != ''){
            $.ajax({
                url:'cektahun.php',
                type:'GET',
                data:{idkat:4,mode:'input',bulan:$bulan.val(),bulan2:0,tahun:$tahun.val(),tahun2:0},
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
                    echo "<option value='$i'>".getBulan($i)."</option>";
                }
echo "      </select>
    Tahun : <select name='tahun' id='tahun' required>
        <option value=''>- Pilih Tahun -</option>
    </select>
    <table border='1'>
        <tr>
            <th colspan='3' align=left>DATA KEWENANGAN</th>
        </tr>";
$n1 = 1;
$s1= mysql_query("select * from tbmonografi_kewenangan where tipe='main' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$n1</td>
            <td>$d1[nama]</td>
            <td><input type='text' name='kewenangan$d1[id]'></td>
        </tr>";
    $urut = $d1['pengurutan'];
    if($d1['pengurutan'] != '-'){
            $titik = ".";
    }
    else{
        $titik = "";
    }
    $s2 = mysql_query("select * from tbmonografi_kewenangan where tipe='sub' and idsub='$d1[id]' order by posisi asc");
    while($d2 = mysql_fetch_array($s2)){
        echo "<tr>
            <td></td>
            <td>$urut$titik $d2[nama]</td>
            <td><input type='text' name='kewenangan$d2[id]'></td>";
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
        $s3 = mysql_query("select * from tbmonografi_kewenangan where tipe='sub2' and idsub='$d2[id]' order by posisi asc");
        while($d3 = mysql_fetch_array($s3)){
            echo "<tr>
                <td></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$urut2$titik2 $d3[nama]</td>
                <td><input type='text' name='kewenangan$d3[id]'></td>";
            if($urut2 != '-'){
                    $urut2++;
            }
        }
    }
    $n1++;
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