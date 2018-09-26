<?php
include "../../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_sarpras2 where idkat = '3' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_sarpras2 where idkat = '3'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbsarpras_laut where tipe = '1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            
            $keberadaan = $_POST['keberadaan'.$d1['id']];
            $jumlah = $_POST['jumlah'.$d1['id']];
            
            if($keberadaan == "" && $jumlah == ""){
                $val = "";
            }
            else{
                $val = $keberadaan.",".$jumlah;
            }
                            
            $q = mysql_query("insert into tbinput_sarpras2(idkat,idunik,idsub,tipe,nilai,tahun) values('3','$idunik','$d1[id]','0','$val','$tahun')");
        }
        $s2 = mysql_query("select * from tbsarpras_laut where tipe = '2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            
            $keberadaan2 = $_POST['keberadaan2'.$d2['id']];
            $jumlah2 = $_POST['jumlah2'.$d2['id']];
            
            if($keberadaan2 == "" && $jumlah2 == ""){
                $val2 = "";
            }
            else{
                $val2 = $keberadaan2.",".$jumlah2;
            }
                            
            $q = mysql_query("insert into tbinput_sarpras2(idkat,idunik,idsub,tipe,nilai,tahun) values('3','$idunik','$d2[id]','0','$val2','$tahun')");
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
            <th>PRASARANA TRANSPORTASI LAUT/SUNGAI</th>
            <th>KEBERADAAN</th>
            <th>JUMLAH</th>
        </tr>";
$s1 = mysql_query("select * from tbsarpras_laut where tipe ='1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$d1[nama]</td>
            <td align=right><input type='text' name ='keberadaan$d1[id]'/></td>
            <td align=right><input type='text' name ='jumlah$d1[id]'/></td>
        </tr>";
}
echo "<tr>
            <th>SARANA TRANSPORTASI LAUT/SUNGAI</th>
            <th>KEBERADAAN</th>
            <th>JUMLAH</th>
        </tr>";
$s2 = mysql_query("select * from tbsarpras_laut where tipe ='2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    echo "<tr>
            <td>$d2[nama]</td>
            <td align=right><input type='text' name ='keberadaan2$d2[id]'/></td>
            <td align=right><input type='text' name ='jumlah2$d2[id]'/></td>
        </tr>";
}
echo "<tr>
        <td colspan='3' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>