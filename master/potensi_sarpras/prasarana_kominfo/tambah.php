<?php
include "../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_sarpras2 where idkat = '7'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbprasarana_kominfo where tipe = '1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            
            $telepon = $_POST['telepon'.$d1['id']];
                     
            $q = mysql_query("insert into tbinput_sarpras2(idkat,idunik,idsub,tipe,nilai,tahun) values('7','$idunik','$d1[id]','0','$telepon','$tahun')");
        }
        $s2 = mysql_query("select * from tbprasarana_kominfo where tipe = '2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            
            $pos = $_POST['pos'.$d2['id']];
           
            $q = mysql_query("insert into tbinput_sarpras2(idkat,idunik,idsub,tipe,nilai,tahun) values('7','$idunik','$d2[id]','0','$pos','$tahun')");
        }
        $s3 = mysql_query("select * from tbprasarana_kominfo where tipe = '3' order by posisi asc");
        while($d3 = mysql_fetch_array($s3)){
            
            $radio = $_POST['radio'.$d3['id']];
           
            $q = mysql_query("insert into tbinput_sarpras2(idkat,idunik,idsub,tipe,nilai,tahun) values('7','$idunik','$d3[id]','0','$radio','$tahun')");
        }
        $s4 = mysql_query("select * from tbprasarana_kominfo where tipe = '4' order by posisi asc");
        while($d4 = mysql_fetch_array($s4)){
            
            $majalah = $_POST['majalah'.$d4['id']];
           
            $q = mysql_query("insert into tbinput_sarpras2(idkat,idunik,idsub,tipe,nilai,tahun) values('7','$idunik','$d4[id]','0','$majalah','$tahun')");
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
                data:{idkat:7,mode:'input',tahun:$tahun.val(),tahun2:0},
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
            <th colspan ='2'>PRASARANA KOMUNIKASI DAN INFORMASI</th>
        </tr>
        <tr>
            <th colspan='2' align=left>TELEPON</th>
        </tr>";
$s1 = mysql_query("select * from tbprasarana_kominfo where tipe ='1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$d1[nama]</td>
            <td align=right><input type='text' name ='telepon$d1[id]'/></td>
        </tr>";
}
echo "  <tr>
            <th colspan='2' align=left>KANTOR POS</th>
        </tr>";
$s2 = mysql_query("select * from tbprasarana_kominfo where tipe ='2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    echo "<tr>
            <td>$d2[nama]</td>
            <td align=right><input type='text' name ='pos$d2[id]'/></td>
        </tr>";
}
echo "<tr>
        <th colspan='2' align=left>RADIO/TV</th>
        </tr>";
$s3 = mysql_query("select * from tbprasarana_kominfo where tipe ='3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    echo "<tr>
            <td>$d3[nama]</td>
            <td align=right><input type='text' name ='radio$d3[id]'/></td>
        </tr>";
}
echo "<tr>
        <th colspan='2' align=left>MAJALAH/KORAN/BULETIN</th>
        </tr>";
$s4 = mysql_query("select * from tbprasarana_kominfo where tipe ='4' order by posisi asc");
while($d4 = mysql_fetch_array($s4)){
    echo "<tr>
            <td>$d4[nama]</td>
            <td align=right><input type='text' name ='majalah$d4[id]'/></td>
        </tr>";
}
echo "<tr>
        <td colspan='3' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

?>