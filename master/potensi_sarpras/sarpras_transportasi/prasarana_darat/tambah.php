<?php
include "../../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_sarpras2 where idkat = '1' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_sarpras2 where idkat = '1'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbprasarana_darat order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){

            $baik = $_POST['baik'.$d1['id']];
            $rusak = $_POST['rusak'.$d1['id']];

            if($baik == "" && $rusak == ""){
                $val = "";
            }
            else{
                $val = $baik.",".$rusak;
            }

            $q = mysql_query("insert into tbinput_sarpras2(idkat,idunik,idsub,idmain,tipe,nilai,tahun) values('1','$idunik','$d1[id]','$d1[idsub]','0','$val','$tahun')");
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
            <th rowspan = '2'>PRASARANA TRANSPORTASI DARAT</th>
            <th colspan = '2'>KONDISI</th>
        </tr>
        <tr>
            <th>BAIK<br/>(Km atau Unit)</th>
            <th>RUSAK<br/>(Km atau Unit)</th>
        </tr>";
$s1 = mysql_query("select * from tbprasarana_darat where tipe='main' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$d1[nama]</td>
            <td align=right><input type='text' name ='baik$d1[id]'/></td>
            <td align=right><input type='text' name ='rusak$d1[id]'/></td>
        </tr>";
    $s2 = mysql_query("select * from tbprasarana_darat where tipe='sub' and idsub='$d1[id]' order by posisi asc");
    while($d2 = mysql_fetch_array($s2)){
      echo "<tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$d2[nama]</td>
              <td align=right><input type='text' name ='baik$d2[id]'/></td>
              <td align=right><input type='text' name ='rusak$d2[id]'/></td>
          </tr>";
    }
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>
