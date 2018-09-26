<?php
include "../../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_p2k where idkat = '1' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tbkepemilikan_lahan where tipe='1' order by posisi asc");
            while($d1 = mysql_fetch_array($s1)){
                $ada = $_POST['ada'.$d1['id']];
                $q = mysql_query("update tbinput_p2k set nilai = '$ada',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d1[id]'");
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
                $q = mysql_query("update tbinput_p2k set nilai = '$val',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d2[id]'");
            }
            $s3 = mysql_query("select * from tbkepemilikan_lahan where tipe='3' order by posisi asc");
            while($d3 = mysql_fetch_array($s3)){
               $luas = $_POST['luas'.$d3['id']];
               $q = mysql_query("update tbinput_p2k set nilai = '$luas',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d3[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tbkepemilikan_lahan where tipe='1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            $ada = $_POST['ada'.$d1['id']];
            $q = mysql_query("update tbinput_p2k set nilai = '$ada',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d1[id]'");
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
            
            $q = mysql_query("update tbinput_p2k set nilai = '$val',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d2[id]'");
        }
        $s3 = mysql_query("select * from tbkepemilikan_lahan where tipe='3' order by posisi asc");
        while($d3 = mysql_fetch_array($s3)){
           $luas = $_POST['luas'.$d3['id']];
           $q = mysql_query("update tbinput_p2k set nilai = '$luas',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d3[id]'");
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
        if(i == <?php echo $tahun; ?>){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    $tahun.change(function(){
        if($tahun.val() != ''){
            $.ajax({
                url:'cektahun.php',
                type:'GET',
                data:{idkat:1,mode:'ubah',tahun:<?php echo $tahun; ?>,tahun2:$tahun.val()},
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
    Tahun : <select name='tahun' id='tahun'>
    </select>
    <table border='1'>
        <tr>
            <th colspan='4'>KEPEMILIKAN LAHAN</th>
        </tr>";
$s1 = mysql_query("select * from tbkepemilikan_lahan where tipe='1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_p2k where idkat = '1' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td colspan='3'>$d1[nama]</td>
                <td><select name='ada$d1[id]'>
                        <option value=''>- Pilihan -</option>
                        <option value='Ada'";if($_d1['nilai'] == "Ada")echo "selected";echo">Ada</option>
                        <option value='Tidak Ada'";if($_d1['nilai'] == "Tidak Ada")echo "selected";echo">Tidak Ada</option>
                    </select>
                </td>
            </tr>";
    }
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
    $_s2 = mysql_query("select * from tbinput_p2k where idkat = '1' and idsub = '$d2[id]' and tahun = '$tahun'");
    $_d2 = mysql_fetch_array($_s2);
    
    $nilai = explode(",",$_d2['nilai']);
    $_r2 = mysql_num_rows($_s2);
    if($_r2 != 0){
        echo "<tr>
                <td>$d2[nama]</td>
                <td><input type='text' name='pangan$d2[id]' value='$nilai[0]'> Keluarga</td>
                <td><input type='text' name='buah$d2[id]'  value='$nilai[1]'> Keluarga</td>
                <td><input type='text' name='kebun$d2[id]'  value='$nilai[2]'> Keluarga</td>
            </tr>";
    }
}
$s3 = mysql_query("select * from tbkepemilikan_lahan where tipe='3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    $_s3 = mysql_query("select * from tbinput_p2k where idkat = '1' and idsub = '$d3[id]' and tahun = '$tahun'");
    $_d3 = mysql_fetch_array($_s3);
    $_r3 = mysql_num_rows($_s3);
    if($_r3 != 0){
        echo "<tr>
                <td colspan='2'>$d3[nama]</td>
                <td colspan='2'><input type='text' name='luas$d3[id]' value = '$_d3[nilai]'> Ha</td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>