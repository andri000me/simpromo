<?php
include "../../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_p2k where idkat = '7' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tbmekanisme_pemasaran order by posisi asc");
            while($d1 = mysql_fetch_array($s1)){

                $pangan = $_POST['pangan'.$d1['id']];
                $buah = $_POST['buah'.$d1['id']];
                $apotik = $_POST['apotik'.$d1['id']];
                $kebun = $_POST['kebun'.$d1['id']];
                $hutan = $_POST['hutan'.$d1['id']];

                if($pangan == "" && $buah == "" && $apotik == "" && $kebun == "" && $hutan == ""){
                    $val = "";
                }
                else{
                    $val = $pangan.",".$buah.",".$apotik.",".$kebun.",".$hutan;
                }

                $q = mysql_query("update tbinput_p2k set nilai = '$val',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tbmekanisme_pemasaran order by posisi asc");
        
        while($d1 = mysql_fetch_array($s1)){
        
            $pangan = $_POST['pangan'.$d1['id']];
            $buah = $_POST['buah'.$d1['id']];
            $apotik = $_POST['apotik'.$d1['id']];
            $kebun = $_POST['kebun'.$d1['id']];
            $hutan = $_POST['hutan'.$d1['id']];
            
            if($pangan == "" && $buah == "" && $apotik == "" && $kebun == "" && $hutan == ""){
                $val = "";
            }
            else{
                $val = $pangan.",".$buah.",".$apotik.",".$kebun.",".$hutan;
            }
            
            $q = mysql_query("update tbinput_p2k set nilai = '$val',tahun='$tahun' where idkat = '7' and idunik = '$idunik' and idsub = '$d1[id]'");
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
            <th rowspan='3'>MEKANISME PEMASARAN</th>
            <th colspan='3'>HASIL PERTANIAN</th>
            <th rowspan='3'>HASIL PERKEBUNAN</th>
            <th rowspan='3'>HASIL HUTAN</th>
        <tr>
        <tr>
            <th>TANAMAN PANGGAN</th>
            <th>BUAH-BUAHAN</th>
            <th>TANAMAN APOTIK HIDUP</th>
        </tr>";
$s1 = mysql_query("select * from tbmekanisme_pemasaran order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_p2k where idkat = '7' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    
    $nilai = explode(",",$_d1['nilai']);
    
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td><select name='pangan$d1[id]'>
                    <option value=''>- Pilihan -</option>
                    <option value='Ada'";if($nilai[0] == "Ada")echo "selected";echo">Ada</option>
                    <option value='Tidak Ada'";if($nilai[0] == "Tidak Ada")echo "selected";echo">Tidak Ada</option>
                </select></td>
                <td><select name='buah$d1[id]'>
                        <option value=''>- Pilihan -</option>
                        <option value='Ada'";if($nilai[1] == "Ada")echo "selected";echo">Ada</option>
                        <option value='Tidak Ada'";if($nilai[1] == "Tidak Ada")echo "selected";echo">Tidak Ada</option>
                    </select></td>
                <td><select name='apotik$d1[id]'>
                        <option value=''>- Pilihan -</option>
                        <option value='Ada'";if($nilai[2] == "Ada")echo "selected";echo">Ada</option>
                        <option value='Tidak Ada'";if($nilai[2] == "Tidak Ada")echo "selected";echo">Tidak Ada</option>
                    </select></td>
                <td><select name='kebun$d1[id]'>
                        <option value=''>- Pilihan -</option>
                        <option value='Ada'";if($nilai[3] == "Ada")echo "selected";echo">Ada</option>
                        <option value='Tidak Ada'";if($nilai[3] == "Tidak Ada")echo "selected";echo">Tidak Ada</option>
                    </select></td>
                <td><select name='hutan$d1[id]'>
                        <option value=''>- Pilihan -</option>
                        <option value='Ada'";if($nilai[4] == "Ada")echo "selected";echo">Ada</option>
                        <option value='Tidak Ada'";if($nilai[4] == "Tidak Ada")echo "selected";echo">Tidak Ada</option>
                    </select></td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='6' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>