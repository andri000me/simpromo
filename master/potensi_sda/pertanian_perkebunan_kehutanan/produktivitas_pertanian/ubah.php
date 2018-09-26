<?php
include "../../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_p2k where idkat = '2' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tbproduktivitas_pertanian where tipe='1' order by posisi asc");
            while($d1 = mysql_fetch_array($s1)){
                
                $luaspangan = $_POST['luaspangan'.$d1['id']];
                $hasilpangan = $_POST['hasilpangan'.$d1['id']];

                if($luaspangan == "" && $hasilpangan == ""){
                    $val = "";
                }
                else{
                    $val = $luaspangan.",".$hasilpangan;
                }
                $q = mysql_query("update tbinput_p2k set nilai = '$val',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            $s2 = mysql_query("select * from tbproduktivitas_pertanian where tipe='2' order by posisi asc");
            while($d2 = mysql_fetch_array($s2)){
                $luasbuah = $_POST['luasbuah'.$d2['id']];
                $hasilbuah = $_POST['hasilbuah'.$d2['id']];

                if($luasbuah == "" && $hasilbuah == ""){
                    $val2 = "";
                }
                else{
                    $val2 = $luasbuah.",".$hasilbuah;
                }
                $q = mysql_query("update tbinput_p2k set nilai = '$val2',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d2[id]'");
            }
            $s3 = mysql_query("select * from tbproduktivitas_pertanian where tipe='3' order by posisi asc");
            while($d3 = mysql_fetch_array($s3)){
                $luasapotik = $_POST['luasapotik'.$d3['id']];
                $hasilapotik = $_POST['hasilapotik'.$d3['id']];

                if($luasapotik == "" && $hasilapotik == ""){
                    $val3 = "";
                }
                else{
                    $val3 = $luasapotik.",".$hasilapotik;
                }
               $q = mysql_query("update tbinput_p2k set nilai = '$val3',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d3[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tbproduktivitas_pertanian where tipe='1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
        
            $luaspangan = $_POST['luaspangan'.$d1['id']];
            $hasilpangan = $_POST['hasilpangan'.$d1['id']];

            if($luaspangan == "" && $hasilpangan == ""){
                $val = "";
            }
            else{
                $val = $luaspangan.",".$hasilpangan;
            }
            $q = mysql_query("update tbinput_p2k set nilai = '$val',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d1[id]'");
        }
        $s2 = mysql_query("select * from tbproduktivitas_pertanian where tipe='2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            $luasbuah = $_POST['luasbuah'.$d2['id']];
            $hasilbuah = $_POST['hasilbuah'.$d2['id']];

            if($luasbuah == "" && $hasilbuah == ""){
                $val2 = "";
            }
            else{
                $val2 = $luasbuah.",".$hasilbuah;
            }
            $q = mysql_query("update tbinput_p2k set nilai = '$val2',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d2[id]'");
        }
        $s3 = mysql_query("select * from tbproduktivitas_pertanian where tipe='3' order by posisi asc");
        while($d3 = mysql_fetch_array($s3)){
            $luasapotik = $_POST['luasapotik'.$d3['id']];
            $hasilapotik = $_POST['hasilapotik'.$d3['id']];

            if($luasapotik == "" && $hasilapotik == ""){
                $val3 = "";
            }
            else{
                $val3 = $luasapotik.",".$hasilapotik;
            }
           $q = mysql_query("update tbinput_p2k set nilai = '$val3',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d3[id]'");
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
                data:{idkat:2,mode:'ubah',tahun:<?php echo $tahun; ?>,tahun2:$tahun.val()},
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
            <th colspan='3'>TANAMAN PANGAN</th>
        </tr>
        <tr>
            <th>JENIS</th>
            <th>LUAS<br/>(Ha)</th>
            <th>HASIL<br/>(Ton/Ha)</th>
        </tr>";
$s1 = mysql_query("select * from tbproduktivitas_pertanian where tipe='1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_p2k where idkat = '2' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    
    $nilai = explode(",",$_d1['nilai']);
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td><input type='text' name ='luaspangan$d1[id]'  value='$nilai[0]'/></td>
                <td><input type='text' name ='hasilpangan$d1[id]' value='$nilai[1]'/></td>
            </tr>";
    }
}
echo    "<tr>
                <th colspan='3'>TANAMAN BUAH-BUAHAN</th>
            </tr>
            <tr>
                <th>JENIS</th>
                <th>LUAS<br/>(Ha)</th>
                <th>HASIL<br/>(Ton/Ha)</th>
            </tr>
        ";
$s2 = mysql_query("select * from tbproduktivitas_pertanian where tipe='2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    $_s2 = mysql_query("select * from tbinput_p2k where idkat = '2' and idsub = '$d2[id]' and tahun = '$tahun'");
    $_d2 = mysql_fetch_array($_s2);
    
    $nilai2 = explode(",",$_d2['nilai']);
    $_r2 = mysql_num_rows($_s2);
    if($_r2 != 0){
        echo "<tr>
                <td>$d2[nama]</td>
                <td><input type='text' name ='luasbuah$d2[id]' value='$nilai2[0]'/></td>
                <td><input type='text' name ='hasilbuah$d2[id]'  value='$nilai2[1]'/></td>
            </tr>";
    }
}   
echo        "<tr>
                <th colspan='3'>TANAMAN APOTIK HIDUP DAN SEJENISNYA</th>
            </tr>
            <tr>
                <th>JENIS</th>
                <th>LUAS<br/>(Ha)</th>
                <th>HASIL<br/>(Ton/Ha)</th>
            </tr>";
$s3 = mysql_query("select * from tbproduktivitas_pertanian where tipe='3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    $_s3 = mysql_query("select * from tbinput_p2k where idkat = '2' and idsub = '$d3[id]' and tahun = '$tahun'");
    $_d3 = mysql_fetch_array($_s3);
    
    $nilai3 = explode(",",$_d3['nilai']);
    $_r3 = mysql_num_rows($_s3);
    if($_r3 != 0){
        echo "<tr>
                <td>$d3[nama]</td>
                <td><input type='text' name ='luasapotik$d3[id]'  value='$nilai3[0]'/></td>
                <td><input type='text' name ='hasilapotik$d3[id]'  value='$nilai3[1]'/></td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>