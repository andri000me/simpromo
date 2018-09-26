<?php
include "../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_lembaga where idkat = '1' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_lembaga where idkat = '1'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
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
                            
            $q = mysql_query("insert into tbinput_lembaga(idkat,idunik,idsub,tipe,nilai,tahun) values('1','$idunik','$d1[id]','0','$val','$tahun')");
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
                            
            $q = mysql_query("insert into tbinput_lembaga(idkat,idunik,idsub,tipe,nilai,tahun) values('1','$idunik','$d2[id]','0','$val2','$tahun')");
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
                            
            $q = mysql_query("insert into tbinput_lembaga(idkat,idunik,idsub,tipe,nilai,tahun) values('1','$idunik','$d3[id]','0','$val3','$tahun')");
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
    echo "<tr>
            <td>$d1[nama]</td>
            <td><input type='text' name ='jumlah$d1[id]'/> Unit</td>
            <td><input type='text' name ='kegiatan$d1[id]'/></td>
            <td><input type='text' name ='pengurus$d1[id]'/> Orang</td>
            <td><input type='text' name ='anggota$d1[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
            <th align=left colspan='5'>JASA LEMBAGA KEUANGAN</th>
        </tr>";
$s2 = mysql_query("select * from tblembaga_ekonomi where tipe = '2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    echo "<tr>
            <td>$d2[nama]</td>
            <td><input type='text' name ='jumlah2$d2[id]'/> Unit</td>
            <td><input type='text' name ='kegiatan2$d2[id]'/></td>
            <td><input type='text' name ='pengurus2$d2[id]'/> Orang</td>
            <td><input type='text' name ='anggota2$d2[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
            <th align=left colspan='5'>INDUSTRI KECIL DAN MENENGAH</th>
        </tr>";
$s3 = mysql_query("select * from tblembaga_ekonomi where tipe = '3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    echo "<tr>
            <td>$d3[nama]</td>
            <td><input type='text' name ='jumlah3$d3[id]'/> Unit</td>
            <td><input type='text' name ='kegiatan3$d3[id]'/></td>
            <td><input type='text' name ='pengurus3$d3[id]'/> Orang</td>
            <td><input type='text' name ='anggota3$d3[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
        <td colspan='5' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

?>