<?php
include "../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_lembaga where idkat = '1' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
            $s1 = mysql_query("select * from tblembaga_ekonomi where tipe = '1' order by posisi asc");
        
            while($d1 = mysql_fetch_array($s1)){

                $jumlah = $_POST['jumlah'.$d1['id']];
                $kegiatan = $_POST['kegiatan'.$d1['id']];
                $pengurus = $_POST['pengurus'.$d1['id']];
                $anggota = $_POST['anggota'.$d1['id']];

                if($jumlah == "" && $kegiatan == "" && $pengurus == "" && $anggota == ""){
                    $val = "";
                }
                else{
                    $val = $jumlah.",".$kegiatan.",".$pengurus.",".$anggota;
                }


                $q = mysql_query("update tbinput_lembaga set nilai = '$val',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d1[id]'");
            }
            $s2 = mysql_query("select * from tblembaga_ekonomi where tipe = '2' order by posisi asc");

            while($d2 = mysql_fetch_array($s2)){

                $jumlah2 = $_POST['jumlah2'.$d2['id']];
                $kegiatan2 = $_POST['kegiatan2'.$d2['id']];
                $pengurus2 = $_POST['pengurus2'.$d2['id']];
                $anggota2 = $_POST['anggota2'.$d2['id']];

                if($jumlah2 == "" && $kegiatan2 == "" && $pengurus2 == "" && $anggota2 == ""){
                    $val2 = "";
                }
                else{
                    $val2 = $jumlah2.",".$kegiatan2.",".$pengurus2.",".$anggota2;
                }


                $q = mysql_query("update tbinput_lembaga set nilai = '$val2',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d2[id]'");
            }
            $s3 = mysql_query("select * from tblembaga_ekonomi where tipe = '3' order by posisi asc");

            while($d3 = mysql_fetch_array($s3)){

                $jumlah3 = $_POST['jumlah3'.$d3['id']];
                $kegiatan3 = $_POST['kegiatan3'.$d3['id']];
                $pengurus3 = $_POST['pengurus3'.$d3['id']];
                $anggota3 = $_POST['anggota3'.$d3['id']];

                if($jumlah3 == "" && $kegiatan3 == "" && $pengurus3 == "" && $anggota3 == ""){
                    $val3 = "";
                }
                else{
                    $val3 = $jumlah3.",".$kegiatan3.",".$pengurus3.",".$anggota3;
                }


                $q = mysql_query("update tbinput_lembaga set nilai = '$val3',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d3[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
        $s1 = mysql_query("select * from tblembaga_ekonomi where tipe = '1' order by posisi asc");
        
        while($d1 = mysql_fetch_array($s1)){
        
            $jumlah = $_POST['jumlah'.$d1['id']];
            $kegiatan = $_POST['kegiatan'.$d1['id']];
            $pengurus = $_POST['pengurus'.$d1['id']];
            $anggota = $_POST['anggota'.$d1['id']];

            if($jumlah == "" && $kegiatan == "" && $pengurus == "" && $anggota == ""){
                $val = "";
            }
            else{
                $val = $jumlah.",".$kegiatan.",".$pengurus.",".$anggota;
            }
            
            
            $q = mysql_query("update tbinput_lembaga set nilai = '$val',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d1[id]'");
        }
        $s2 = mysql_query("select * from tblembaga_ekonomi where tipe = '2' order by posisi asc");
        
        while($d2 = mysql_fetch_array($s2)){
        
            $jumlah2 = $_POST['jumlah2'.$d2['id']];
            $kegiatan2 = $_POST['kegiatan2'.$d2['id']];
            $pengurus2 = $_POST['pengurus2'.$d2['id']];
            $anggota2 = $_POST['anggota2'.$d2['id']];

            if($jumlah2 == "" && $kegiatan2 == "" && $pengurus2 == "" && $anggota2 == ""){
                $val2 = "";
            }
            else{
                $val2 = $jumlah2.",".$kegiatan2.",".$pengurus2.",".$anggota2;
            }
            
            
            $q = mysql_query("update tbinput_lembaga set nilai = '$val2',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d2[id]'");
        }
        $s3 = mysql_query("select * from tblembaga_ekonomi where tipe = '3' order by posisi asc");
        
        while($d3 = mysql_fetch_array($s3)){
        
            $jumlah3 = $_POST['jumlah3'.$d3['id']];
            $kegiatan3 = $_POST['kegiatan3'.$d3['id']];
            $pengurus3 = $_POST['pengurus3'.$d3['id']];
            $anggota3 = $_POST['anggota3'.$d3['id']];

            if($jumlah3 == "" && $kegiatan3 == "" && $pengurus3 == "" && $anggota3 == ""){
                $val3 = "";
            }
            else{
                $val3 = $jumlah3.",".$kegiatan3.",".$pengurus3.",".$anggota3;
            }
            
            
            $q = mysql_query("update tbinput_lembaga set nilai = '$val3',tahun='$tahun' where idkat = '1' and idunik = '$idunik' and idsub = '$d3[id]'");
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
            <th rowspan='2'>NAMA LEMBAGA EKONOMI</th>
            <th rowspan='2'>JUMLAH</th>
            <th rowspan='2'>JUMLAH KEGIATAN</th>
            <th colspan='2'>JUMLAH</th>
        </tr>
        <tr>
            <th>PENGURUS</th>
            <th>ANGGOTA</th>
        <tr>
        <tr>
            <th align=left colspan='5'>LEMBAGA EKONOMI DAN UNIT USAHA DESA/KELURAHAN</th>
        </tr>";
$s1 = mysql_query("select * from tblembaga_ekonomi where tipe = '1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    $_s1 = mysql_query("select * from tbinput_lembaga where idkat = '1' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    
    $nilai = explode(",",$_d1['nilai']);
    
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td><input type='text' name ='jumlah$d1[id]' value='$nilai[0]'/> Unit</td>
                <td><input type='text' name ='kegiatan$d1[id]' value='$nilai[1]'/></td>
                <td><input type='text' name ='pengurus$d1[id]' value='$nilai[1]'/> Orang</td>
                <td><input type='text' name ='anggota$d1[id]' value='$nilai[3]'/> Orang</td>
            </tr>";
    }
}
echo "<tr>
            <th align=left colspan='5'>JASA LEMBAGA KEUANGAN</th>
        </tr>";
$s2 = mysql_query("select * from tblembaga_ekonomi where tipe = '2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    $_s2 = mysql_query("select * from tbinput_lembaga where idkat = '1' and idsub = '$d2[id]' and tahun = '$tahun'");
    $_d2 = mysql_fetch_array($_s2);
    
    $nilai2 = explode(",",$_d2['nilai']);
    
    $_r2 = mysql_num_rows($_s2);
    if($_r2 != 0){
        echo "<tr>
                <td>$d2[nama]</td>
                <td><input type='text' name ='jumlah2$d2[id]' value='$nilai2[0]'/> Unit</td>
                <td><input type='text' name ='kegiatan2$d2[id]' value='$nilai2[1]'/></td>
                <td><input type='text' name ='pengurus2$d2[id]' value='$nilai2[2]'/> Orang</td>
                <td><input type='text' name ='anggota2$d2[id]' value='$nilai2[3]'/> Orang</td>
            </tr>";
    }
}
echo "<tr>
            <th align=left colspan='5'>INDUSTRI KECIL DAN MENENGAH</th>
        </tr>";
$s3 = mysql_query("select * from tblembaga_ekonomi where tipe = '3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    $_s3 = mysql_query("select * from tbinput_lembaga where idkat = '1' and idsub = '$d3[id]' and tahun = '$tahun'");
    $_d3 = mysql_fetch_array($_s3);
    
    $nilai3 = explode(",",$_d3['nilai']);
    
    $_r3 = mysql_num_rows($_s3);
    if($_r3 != 0){
        echo "<tr>
                <td>$d3[nama]</td>
                <td><input type='text' name ='jumlah3$d3[id]' value='$nilai3[0]'/> Unit</td>
                <td><input type='text' name ='kegiatan3$d3[id]' value='$nilai3[1]'/></td>
                <td><input type='text' name ='pengurus3$d3[id]' value='$nilai3[2]'/> Orang</td>
                <td><input type='text' name ='anggota3$d3[id]' value='$nilai3[3]'/> Orang</td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='5' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

?>