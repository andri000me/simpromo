<?php
include "../../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_sda where idkat = '4' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tbsumber_air order by posisi asc");
            while($d1 = mysql_fetch_array($s1)){

                $jumlah = $_POST['jumlah'.$d1['id']];
                $pemanfaatan = $_POST['pemanfaatan'.$d1['id']];
                $kondisi = $_POST['kondisi'.$d1['id']];
                $kualitas = $_POST['kualitas'.$d1['id']];

                if($jumlah == "" && $pemanfaatan == "" && $kondisi == "" && $kualitas == ""){
                    $val = "";
                }
                else{
                    $val = $jumlah.",".$pemanfaatan.",".$kondisi.",".$kualitas;
                }

                $q = mysql_query("update tbinput_sda set nilai = '$val',tahun='$tahun' where idkat = '4' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tbsumber_air order by posisi asc");
        
        while($d1 = mysql_fetch_array($s1)){
        
            $jumlah = $_POST['jumlah'.$d1['id']];
            $pemanfaatan = $_POST['pemanfaatan'.$d1['id']];
            $kondisi = $_POST['kondisi'.$d1['id']];
            $kualitas = $_POST['kualitas'.$d1['id']];

            if($jumlah == "" && $pemanfaatan == "" && $kondisi == "" && $kualitas == ""){
                $val = "";
            }
            else{
                $val = $jumlah.",".$pemanfaatan.",".$kondisi.",".$kualitas;
            }
            
            
            $q = mysql_query("update tbinput_sda set nilai = '$val',tahun='$tahun' where idkat = '4' and idunik = '$idunik' and idsub = '$d1[id]'");
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
                data:{idkat:4,mode:'ubah',tahun:<?php echo $tahun; ?>,tahun2:$tahun.val()},
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
            <th colspan='5'>SUMBER AIR DAN KUALITAS AIR MINUM</th>
        </tr>
        <tr>
            <th rowspan='3'>JENIS</th>
            <th rowspan='3'>JUMLAH (UNIT)</th>
            <th rowspan='3'>PEMANFAATAN (KK)</th>
            <th rowspan='3'>KONDISI BAIK/RUSAK</th>
            <th>KUALITAS AIR MINUM</th>
        <tr>
        <tr>
            <th>(Berbau)/(Berwarna)/(Berasa)/(Baik)</th>
        </tr>";
$s1 = mysql_query("select * from tbsumber_air order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_sda where idkat = '4' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    
    $nilai = explode(",",$_d1['nilai']);
    
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td><input type='text' name ='jumlah$d1[id]' value='$nilai[0]'/></td>
                <td><input type='text' name ='pemanfaatan$d1[id]' value='$nilai[1]'/></td>
                <td><select name='kondisi$d1[id]'>
                    <option value=''>- Pilihan -</option>
                    <option value='Baik'";if($nilai[2] == "Baik")echo"selected";echo">Baik</option>
                    <option value='Rusak'";if($nilai[2] == "Rusak")echo"selected";echo">Rusak</option>
                </select></td>
                <td><input type='text' name ='kualitas$d1[id]' value='$nilai[3]'/></td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='5' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>