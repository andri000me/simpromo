<?php
include "../../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_sda where idkat = '5' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_sda where idkat = '5'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbsungai_rawa where tipe='1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            
            $sungai = $_POST['sungai'.$d1['id']];
            
            if($sungai == ""){
                $val = "";
            }
            else{
                $val = $sungai;
            }
                            
            $q = mysql_query("insert into tbinput_sda(idkat,idunik,idsub,tipe,nilai,tahun) values('5','$idunik','$d1[id]','1','$val','$tahun')");
        }
        $s2 = mysql_query("select * from tbsungai_rawa  where tipe='2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            
            echo $rawa = $_POST['rawa'.$d2['id']];
            
            if($rawa == ""){
                $val2 = "";
            }
            else{
                $val2 = $rawa;
            }
            echo $val2;                
            $q = mysql_query("insert into tbinput_sda(idkat,idunik,idsub,tipe,nilai,tahun) values('5','$idunik','$d2[id]','2','$val2','$tahun')");
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
                data:{idkat:5,mode:'input',tahun:$tahun.val(),tahun2:0},
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
            <th colspan=2>SUNGAI DAN RAWA</th>
        </tr>
        <tr>
            <th colspan=2  align='left'>SUNGAI</th>
        </tr>";
$s1 = mysql_query("select * from tbsungai_rawa where tipe='1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$d1[nama]</td>
            <td><input type='text' name='sungai$d1[id]'/></td>
        </tr>";
}
echo "<tr>
            <th colspan=2  align='left'>RAWA</th>
        </tr>";
$s2 = mysql_query("select * from tbsungai_rawa where tipe='2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    echo "<tr>
            <td>$d2[nama]</td>
            <td><input type='text' name='rawa$d2[id]'/></td>
        </tr>";
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>