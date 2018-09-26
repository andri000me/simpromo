<?php
include "../../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_p2 where idkat = '1' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tbpopulasi_ternak order by posisi asc");
            while($d1 = mysql_fetch_array($s1)){
                
                $pemilik = $_POST['pemilik'.$d1['id']];
                $populasi = $_POST['populasi'.$d1['id']];

                if($pemilik == "" && $populasi == ""){
                    $val = "";
                }
                else{
                    $val = $pemilik.",".$populasi;
                }
                $q = mysql_query("update tbinput_p2 set nilai = '$val',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tbpopulasi_ternak order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
        
            $pemilik = $_POST['pemilik'.$d1['id']];
            $populasi = $_POST['populasi'.$d1['id']];

            if($pemilik == "" && $populasi == ""){
                $val = "";
            }
            else{
                $val = $pemilik.",".$populasi;
            }
            $q = mysql_query("update tbinput_p2 set nilai = '$val',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d1[id]'");
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
            <th colspan='3'>JENIS DAN POPULASI TERNAK</th>
        </tr>
        <tr>
            <th>JENIS TERNAK</th>
            <th>JUMLAH PEMILIK</th>
            <th>PERKIRAAN JUMLAH POPULASI</th>
        </tr>";
$s1 = mysql_query("select * from tbpopulasi_ternak order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_p2 where idkat = '1' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    
    $nilai = explode(",",$_d1['nilai']);
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td><input type='text' name ='pemilik$d1[id]'  value='$nilai[0]'/></td>
                <td><input type='text' name ='populasi$d1[id]' value='$nilai[1]'/></td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>