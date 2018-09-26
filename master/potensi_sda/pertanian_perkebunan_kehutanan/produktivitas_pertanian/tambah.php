<?php
include "../../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_p2k where idkat = '2' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_p2k where idkat = '2'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
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
                            
            $q = mysql_query("insert into tbinput_p2k(idkat,idunik,idsub,tipe,nilai,tahun) values('2','$idunik','$d1[id]','1','$val','$tahun')");
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
            $q = mysql_query("insert into tbinput_p2k(idkat,idunik,idsub,tipe,nilai,tahun) values('2','$idunik','$d2[id]','2','$val2','$tahun')");
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
           $q = mysql_query("insert into tbinput_p2k(idkat,idunik,idsub,tipe,nilai,tahun) values('2','$idunik','$d3[id]','3','$val3','$tahun')");
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
                data:{idkat:2,mode:'input',tahun:$tahun.val(),tahun2:0},
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
            <th colspan='3'>TANAMAN PANGAN</th>
        </tr>
        <tr>
            <th>JENIS</th>
            <th>LUAS<br/>(Ha)</th>
            <th>HASIL<br/>(Ton/Ha)</th>
        </tr>";
$s1 = mysql_query("select * from tbproduktivitas_pertanian where tipe='1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$d1[nama]</td>
            <td><input type='text' name ='luaspangan$d1[id]'/></td>
            <td><input type='text' name ='hasilpangan$d1[id]'/></td>
        </tr>";
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
    echo "<tr>
            <td>$d2[nama]</td>
            <td><input type='text' name ='luasbuah$d2[id]'/></td>
            <td><input type='text' name ='hasilbuah$d2[id]'/></td>
        </tr>";
}
echo    "<tr>
                <th colspan='3'>TANAMAN APOTIK HIDUP DAN SEJENISNYA</th>
            </tr>
            <tr>
                <th>JENIS</th>
                <th>LUAS<br/>(Ha)</th>
                <th>HASIL<br/>(Ton/Ha)</th>
            </tr>
        ";
$s3 = mysql_query("select * from tbproduktivitas_pertanian where tipe='3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    echo "<tr>
            <td>$d3[nama]</td>
            <td><input type='text' name ='luasapotik$d3[id]'/></td>
            <td><input type='text' name ='hasilapotik$d3[id]'/></td>
        </tr>";
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>