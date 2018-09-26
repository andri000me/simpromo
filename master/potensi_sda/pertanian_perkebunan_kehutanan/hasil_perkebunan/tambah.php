<?php
include "../../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_p2k where idkat = '3' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_p2k where idkat = '3'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbhasil_perkebunan order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            
            $lswasta = $_POST['lswasta'.$d1['id']];
            $hswasta = $_POST['hswasta'.$d1['id']];
            $lrakyat = $_POST['lrakyat'.$d1['id']];
            $hrakyat = $_POST['hrakyat'.$d1['id']];
            
            if($lswasta == "" && $hswasta == "" && $lrakyat == "" && $hrakyat == ""){
                $val = "";
            }
            else{
                $val = $lswasta.",".$hswasta.",".$lrakyat.",".$hrakyat;
            }
                            
            $q = mysql_query("insert into tbinput_p2k(idkat,idunik,idsub,tipe,nilai,tahun) values('3','$idunik','$d1[id]','0','$val','$tahun')");
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
                data:{idkat:3,mode:'input',tahun:$tahun.val(),tahun2:0},
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
            <th rowspan='3'>JENIS</th>
            <th colspan='2'>SWASTA NEGARA</th>
            <th colspan='2'>RAKYAT</th>
        <tr>
        <tr>
            <th>LUAS (Ha)</th>
            <th>HASIL (kw/ha)</th>
            <th>LUAS (Ha)</th>
            <th>HASIL (kw/ha)</th>
        </tr>";
$s1 = mysql_query("select * from tbhasil_perkebunan order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$d1[nama]</td>
            <td><input type='text' name ='lswasta$d1[id]'/></td>
            <td><input type='text' name ='hswasta$d1[id]'/></td>
            <td><input type='text' name ='lrakyat$d1[id]'/></td>
            <td><input type='text' name ='hrakyat$d1[id]'/></td>
        </tr>";
}
echo "<tr>
        <td colspan='5' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>