<?php
include "../../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_sarpras2 where idkat = '1' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
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
                $q = mysql_query("update tbinput_sarpras2 set nilai = '$val',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
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
            $q = mysql_query("update tbinput_sarpras2 set nilai = '$val',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d1[id]'");
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
            <th rowspan = '2'>PRASARANA TRANSPORTASI DARAT</th>
            <th colspan = '2'>KONDISI</th>
        </tr>
        <tr>
            <th>BAIK<br/>(Km atau Unit)</th>
            <th>RUSAK<br/>(Km atau Unit)</th>
        </tr>";
$s1 = mysql_query("select * from tbprasarana_darat where tipe='main'  order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_sarpras2 where idkat = '1' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    $nilai = explode(",",$_d1['nilai']);
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td align=right><input type='text' name ='baik$d1[id]'  value='$nilai[0]'/></td>
                <td align=right><input type='text' name ='rusak$d1[id]'  value='$nilai[1]'/></td>
            </tr>";
      $s2 = mysql_query("select * from tbprasarana_darat where tipe='sub' and idsub='$d1[id]' order by posisi asc");
      while($d2 = mysql_fetch_array($s2)){
          $_s2 = mysql_query("select * from tbinput_sarpras2 where idkat = '1' and idsub = '$d2[id]' and tahun = '$tahun'");
          $_d2 = mysql_fetch_array($_s2);
          $nilai2 = explode(",",$_d2['nilai']);
          $_r2 = mysql_num_rows($_s2);
          if($_r2 != 0){
              echo "<tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$d2[nama]</td>
                      <td align=right><input type='text' name ='baik$d2[id]'  value='$nilai2[0]'/></td>
                      <td align=right><input type='text' name ='rusak$d2[id]'  value='$nilai2[1]'/></td>
                  </tr>";
          }
      }
    }
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>
