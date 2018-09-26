<?php
include "../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_sdm where idkat = '8' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_sdm where idkat = '8'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbcacat_mental where tipe = '1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            
            $lakilaki = $_POST['lakilaki'.$d1['id']];
            $perempuan = $_POST['perempuan'.$d1['id']];
            
            if($lakilaki == "" && $perempuan == ""){
                $val = "";
            }
            else{
                $val = $lakilaki.",".$perempuan;
            }
                            
            $q = mysql_query("insert into tbinput_sdm(idkat,idunik,idsub,tipe,nilai,tahun) values('8','$idunik','$d1[id]','0','$val','$tahun')");
        }
        $s2 = mysql_query("select * from tbcacat_mental where tipe = '2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            
            $lakilaki2 = $_POST['lakilaki2'.$d2['id']];
            $perempuan2 = $_POST['perempuan2'.$d2['id']];
            
            if($lakilaki2 == "" && $perempuan2 == ""){
                $val2 = "";
            }
            else{
                $val2 = $lakilaki2.",".$perempuan2;
            }
                            
            $q = mysql_query("insert into tbinput_sdm(idkat,idunik,idsub,tipe,nilai,tahun) values('8','$idunik','$d2[id]','0','$val2','$tahun')");
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
                data:{idkat:8,mode:'input',tahun:$tahun.val(),tahun2:0},
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
            <th colspan='3'>CACAT MENTAL DAN FISIK</th>
        </tr>
        <tr>
            <th>FISIK</th>
            <th>LAKI-LAKI</th>
            <th>PEREMPUAN</th>
        </tr>";
$s1 = mysql_query("select * from tbcacat_mental where tipe = '1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$d1[nama]</td>
            <td align=right><input type='text' name ='lakilaki$d1[id]'/> Orang</td>
            <td align=right><input type='text' name ='perempuan$d1[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
            <th>MENTAL</th>
            <th>LAKI-LAKI</th>
            <th>PEREMPUAN</th>
        </tr>";
$s2 = mysql_query("select * from tbcacat_mental where tipe = '2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    echo "<tr>
            <td>$d2[nama]</td>
            <td align=right><input type='text' name ='lakilaki2$d2[id]'/> Orang</td>
            <td align=right><input type='text' name ='perempuan2$d2[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

?>