<?php
include "../../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_p2k where idkat = '1' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_p2k where idkat = '1'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbkepemilikan_lahan where tipe='1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            $ada = $_POST['ada'.$d1['id']];
            $q = mysql_query("insert into tbinput_p2k(idkat,idunik,idsub,tipe,nilai,tahun) values('1','$idunik','$d1[id]','1','$ada','$tahun')");
        }
        $s2 = mysql_query("select * from tbkepemilikan_lahan where tipe='2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            $pangan = $_POST['pangan'.$d2['id']];
            $buah = $_POST['buah'.$d2['id']];
            $kebun = $_POST['kebun'.$d2['id']];
            
            if($pangan == "" && $buah == "" && $kebun == ""){
                $val = "";
            }
            else
            {
                $val = $pangan.",".$buah.",".$kebun;
            }
            $q = mysql_query("insert into tbinput_p2k(idkat,idunik,idsub,tipe,nilai,tahun) values('1','$idunik','$d2[id]','2','$val','$tahun')");
        }
        $s3 = mysql_query("select * from tbkepemilikan_lahan where tipe='3' order by posisi asc");
        while($d3 = mysql_fetch_array($s3)){
           $luas = $_POST['luas'.$d3['id']];
           $q = mysql_query("insert into tbinput_p2k(idkat,idunik,idsub,tipe,nilai,tahun) values('1','$idunik','$d3[id]','3','$luas','$tahun')");
        }
        if($q){
            echo "<script>window.location='index.php';</script>";
        }
    }
}
?>
<script type="text/javascript" src="../../../../lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $tampil = $("#tampil");
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        $tahun.append("<option value='"+i+"'>"+i+"</option>");
    }
    $tahun.change(function(){
        if($tahun.val() != ''){
            $.ajax({
                url:'cektahun.php',
                type:'GET',
                data:{idkat:1,mode:'input',tahun:$tahun.val(),tahun2:0},
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
    Tahun : <select name='tahun' id='tahun' required>
        <option value=''>- Pilih Tahun -</option>
    </select>
    <table border='1'>
        <tr>
            <th colspan='4'>KEPEMILIKAN LAHAN</th>
        </tr>";
$s1 = mysql_query("select * from tbkepemilikan_lahan where tipe='1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td colspan='3'>$d1[nama]</td>
            <td><select name='ada$d1[id]'>
                    <option value=''>- Pilihan -</option>
                    <option value='Ada'>Ada</option>
                    <option value='Tidak Ada'>Tidak Ada</option>
                </select>
            </td>
        </tr>";
}
echo    "<tr>
            <th rowspan='4'>LUAS LAHAN YANG DIMILIKI</th>
            <th colspan='3'>JUMLAH KELUARGA YANG MEMILIKI TANAH/LAHAN</th>
        <tr>
        <tr>
            <th colspan='2'>PERTANIAN</th>
            <th rowspan='2'>PERKEBUNAN</th>
        <tr>
            <th>TANAMAN PANGAN</th>
            <th>TANAMAN BUAH</th>
        </tr>
        ";
$s2 = mysql_query("select * from tbkepemilikan_lahan where tipe='2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    echo "<tr>
            <td>$d2[nama]</td>
            <td><input type='text' name='pangan$d2[id]'> Keluarga</td>
            <td><input type='text' name='buah$d2[id]'> Keluarga</td>
            <td><input type='text' name='kebun$d2[id]'> Keluarga</td>
        </tr>";
}
$s3 = mysql_query("select * from tbkepemilikan_lahan where tipe='3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    echo "<tr>
            <td colspan='2'>$d3[nama]</td>
            <td colspan='2'><input type='text' name='luas$d3[id]'> Ha</td>
        </tr>";
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>