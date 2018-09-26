<?php
include "../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tbprasarana_kominfo where tipe = '1' order by posisi asc");
            while($d1 = mysql_fetch_array($s1)){

                $telepon = $_POST['telepon'.$d1['id']];

                $q = mysql_query("update tbinput_sarpras2 set nilai = '$telepon',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            $s2 = mysql_query("select * from tbprasarana_kominfo where tipe = '2' order by posisi asc");
            while($d2 = mysql_fetch_array($s2)){

                $pos = $_POST['pos'.$d2['id']];

                $q = mysql_query("update tbinput_sarpras2 set nilai = '$pos',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d2[id]'");
            }
            $s3 = mysql_query("select * from tbprasarana_kominfo where tipe = '3' order by posisi asc");
            while($d3 = mysql_fetch_array($s3)){

                $radio = $_POST['radio'.$d3['id']];

                $q = mysql_query("update tbinput_sarpras2 set nilai = '$radio',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d3[id]'");
            }
            $s4 = mysql_query("select * from tbprasarana_kominfo where tipe = '4' order by posisi asc");
            while($d4 = mysql_fetch_array($s4)){

                $majalah = $_POST['majalah'.$d4['id']];

                $q = mysql_query("update tbinput_sarpras2 set nilai = '$majalah',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d4[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tbprasarana_kominfo where tipe = '1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
        
            $telepon = $_POST['telepon'.$d1['id']];
            
            $q = mysql_query("update tbinput_sarpras2 set nilai = '$telepon',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d1[id]'");
        }
        $s2 = mysql_query("select * from tbprasarana_kominfo where tipe = '2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
        
            $pos = $_POST['pos'.$d2['id']];

            $q = mysql_query("update tbinput_sarpras2 set nilai = '$pos',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d2[id]'");
        }
        $s3 = mysql_query("select * from tbprasarana_kominfo where tipe = '3' order by posisi asc");
        while($d3 = mysql_fetch_array($s3)){
        
            $radio = $_POST['radio'.$d3['id']];

            $q = mysql_query("update tbinput_sarpras2 set nilai = '$radio',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d3[id]'");
        }
        $s4 = mysql_query("select * from tbprasarana_kominfo where tipe = '4' order by posisi asc");
        while($d4 = mysql_fetch_array($s4)){
        
            $majalah = $_POST['majalah'.$d4['id']];

            $q = mysql_query("update tbinput_sarpras2 set nilai = '$majalah',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d4[id]'");
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
                data:{idkat:7,mode:'ubah',tahun:<?php echo $tahun; ?>,tahun2:$tahun.val()},
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
            <th colspan ='2'>PRASARANA KOMUNIKASI DAN INFORMASI</th>
        </tr>
        <tr>
            <th colspan='2' align=left>TELEPON</th>
        </tr>";
$s1 = mysql_query("select * from tbprasarana_kominfo where tipe = '1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);

    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td align=right><input type='text' name ='telepon$d1[id]'  value='$_d1[nilai]'/></td>
            </tr>";
    }
}
echo "<tr>
            <th colspan='2' align=left>KANTOR POS</th>
        </tr>";
$s2 = mysql_query("select * from tbprasarana_kominfo where tipe = '2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    $_s2 = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and idsub = '$d2[id]' and tahun = '$tahun'");
    $_d2 = mysql_fetch_array($_s2);

    $_r2 = mysql_num_rows($_s2);
    if($_r2 != 0){
        echo "<tr>
                <td>$d2[nama]</td>
                <td align=right><input type='text' name ='pos$d2[id]'  value='$_d2[nilai]'/></td>
            </tr>";
    }
}
echo "<tr>
            <th colspan='2' align=left>RADIO/TV</th>
        </tr>";
$s3 = mysql_query("select * from tbprasarana_kominfo where tipe = '3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    $_s3 = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and idsub = '$d3[id]' and tahun = '$tahun'");
    $_d3 = mysql_fetch_array($_s3);

    $_r3 = mysql_num_rows($_s3);
    if($_r3 != 0){
        echo "<tr>
                <td>$d3[nama]</td>
                <td align=right><input type='text' name ='radio$d3[id]'  value='$_d3[nilai]'/></td>
            </tr>";
    }
}
echo "<tr>
            <th colspan='2' align=left>MAJALAH/KORAN/BULETIN</th>
        </tr>";
$s4 = mysql_query("select * from tbprasarana_kominfo where tipe = '4' order by posisi asc");
while($d4 = mysql_fetch_array($s4)){
    $_s4 = mysql_query("select * from tbinput_sarpras2 where idkat = '7' and idsub = '$d4[id]' and tahun = '$tahun'");
    $_d4 = mysql_fetch_array($_s4);

    $_r4 = mysql_num_rows($_s4);
    if($_r4 != 0){
        echo "<tr>
                <td>$d4[nama]</td>
                <td align=right><input type='text' name ='majalah$d4[id]'  value='$_d4[nilai]'/></td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='3' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

?>