<?php
include "../../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_sda where idkat = '5' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tbsungai_rawa where tipe = '1' order by posisi asc");
            while($d1 = mysql_fetch_array($s1)){
                
                $sungai = $_POST['sungai'.$d1['id']];

                if($sungai == ""){
                    $val = "";
                }
                else{
                    $val = $sungai;
                }
                $q = mysql_query("update tbinput_sda set nilai = '$val',tahun='$tahun' where idkat = '5' and tipe ='1' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            $s2 = mysql_query("select * from tbsungai_rawa where tipe = '2' order by posisi asc");
            while($d2 = mysql_fetch_array($s2)){

                $rawa = $_POST['rawa'.$d2['id']];

                if($rawa == ""){
                    $val2 = "";
                }
                else{
                    $val2 = $rawa;
                }
                $q = mysql_query("update tbinput_sda set nilai = '$val2',tahun='$tahun' where idkat = '5' and tipe ='2' and idunik = '$idunik' and idsub = '$d2[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tbsungai_rawa where tipe = '1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
        
            $sungai = $_POST['sungai'.$d1['id']];

            if($sungai == ""){
                $val = "";
            }
            else{
                $val = $sungai;
            }
            $q = mysql_query("update tbinput_sda set nilai = '$val',tahun='$tahun' where idkat = '5' and tipe ='1' and idunik = '$idunik' and idsub = '$d1[id]'");
        }
        $s2 = mysql_query("select * from tbsungai_rawa where tipe = '2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
        
            echo $rawa = $_POST['rawa'.$d2['id']];

            if($rawa == ""){
                $val2 = "";
            }
            else{
                $val2 = $rawa;
            }
            echo $val2;
            $q = mysql_query("update tbinput_sda set nilai = '$val2',tahun='$tahun' where idkat = '5' and tipe ='2' and idunik = '$idunik' and idsub = '$d2[id]'");
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
                data:{idkat:5,mode:'ubah',tahun:<?php echo $tahun; ?>,tahun2:$tahun.val()},
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
            <th colspan=2>SUNGAI DAN RAWA</th>
        </tr>
        <tr>
            <th colspan=2 align='left'>SUNGAI</th>
        </tr>";
$s1 = mysql_query("select * from tbsungai_rawa where tipe = '1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_sda where idkat = '5' and  tipe = '1' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td><input type='text' name='sungai$d1[id]' value='$_d1[nilai]'></td>
            </tr>";
    }
}
echo "<tr>
            <th colspan=2 align='left'>RAWA</th>
        </tr>";
$s2 = mysql_query("select * from tbsungai_rawa where tipe = '2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    $_s2 = mysql_query("select * from tbinput_sda where idkat = '5' and  tipe = '2' and idsub = '$d2[id]' and tahun = '$tahun'");
    $_d2 = mysql_fetch_array($_s2);
    
    $_r2 = mysql_num_rows($_s2);
    if($_r2 != 0){
        echo "<tr>
                <td>$d2[nama]</td>
                <td><input type='text' name='rawa$d2[id]' value='$_d2[nilai]'></td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='4' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>