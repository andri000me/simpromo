<?php
include "../../../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $s = mysql_query("select * from tbinput_lembaga where idkat = '2' and tahun ='$tahun'");
    $r = mysql_num_rows($s);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else
    {
        $s0 = mysql_query("select * from tbinput_lembaga where idkat = '2'");
        $d = mysql_fetch_array($s0);
        $idunik = $d['idunik']+1;
        $s1 = mysql_query("select * from tbjasa_pengangkutan where tipe = '1' order by posisi asc");
        while($d1 = mysql_fetch_array($s1)){
            
            $jumlah = $_POST['jumlah'.$d1['id']];
            $pemilik = $_POST['pemilik'.$d1['id']];
            $kapasitas = $_POST['kapasitas'.$d1['id']];
            $tenaga = $_POST['tenaga'.$d1['id']];
            
            if($jumlah == "" && $pemilik == "" && $kapasitas == "" && $tenaga == ""){
                $val = "";
            }
            else{
                $val = $jumlah.",".$pemilik.",".$kapasitas.",".$tenaga;
            }
                            
            $q = mysql_query("insert into tbinput_lembaga(idkat,idunik,idsub,tipe,nilai,tahun) values('2','$idunik','$d1[id]','0','$val','$tahun')");
        }
        $s2 = mysql_query("select * from tbjasa_pengangkutan where tipe = '2' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            
            $jumlah2 = $_POST['jumlah2'.$d2['id']];
            $pemilik2 = $_POST['pemilik2'.$d2['id']];
            $kapasitas2 = $_POST['kapasitas2'.$d2['id']];
            $tenaga2 = $_POST['tenaga2'.$d2['id']];
            
            if($jumlah2 == "" && $pemilik2 == "" && $kapasitas2 == "" && $tenaga2 == ""){
                $val2 = "";
            }
            else{
                $val2 = $jumlah2.",".$pemilik2.",".$kapasitas2.",".$tenaga2;
            }
                            
            $q = mysql_query("insert into tbinput_lembaga(idkat,idunik,idsub,tipe,nilai,tahun) values('2','$idunik','$d2[id]','0','$val2','$tahun')");
        }
        $s3 = mysql_query("select * from tbjasa_pengangkutan where tipe = '3' order by posisi asc");
        while($d3 = mysql_fetch_array($s3)){
            
            $jumlah3 = $_POST['jumlah3'.$d3['id']];
            $pemilik3 = $_POST['pemilik3'.$d3['id']];
            $kapasitas3 = $_POST['kapasitas3'.$d3['id']];
            $tenaga3 = $_POST['tenaga3'.$d3['id']];
            
            if($jumlah3 == "" && $pemilik3 == "" && $kapasitas3 == "" && $tenaga3 == ""){
                $val3 = "";
            }
            else{
                $val3 = $jumlah3.",".$pemilik3.",".$kapasitas3.",".$tenaga3;
            }
                            
            $q = mysql_query("insert into tbinput_lembaga(idkat,idunik,idsub,tipe,nilai,tahun) values('2','$idunik','$d3[id]','0','$val3','$tahun')");
        }
        $s4 = mysql_query("select * from tbjasa_pengangkutan where tipe = '4' order by posisi asc");
        while($d4 = mysql_fetch_array($s4)){
            
            $jumlah4 = $_POST['jumlah4'.$d4['id']];
            $pemilik4 = $_POST['pemilik4'.$d4['id']];
            $kapasitas4 = $_POST['kapasitas4'.$d4['id']];
            $tenaga4 = $_POST['tenaga4'.$d4['id']];
            
            if($jumlah4 == "" && $pemilik4 == "" && $kapasitas4 == "" && $tenaga4 == ""){
                $val4 = "";
            }
            else{
                $val4 = $jumlah4.",".$pemilik4.",".$kapasitas4.",".$tenaga4;
            }
                            
            $q = mysql_query("insert into tbinput_lembaga(idkat,idunik,idsub,tipe,nilai,tahun) values('2','$idunik','$d4[id]','0','$val4','$tahun')");
        }
        $s5 = mysql_query("select * from tbjasa_pengangkutan where tipe = '5' order by posisi asc");
        while($d5 = mysql_fetch_array($s5)){
            
            $jumlah5 = $_POST['jumlah5'.$d5['id']];
            $pemilik5 = $_POST['pemilik5'.$d5['id']];
            $kapasitas5 = $_POST['kapasitas5'.$d5['id']];
            $tenaga5 = $_POST['tenaga5'.$d5['id']];
            
            if($jumlah5 == "" && $pemilik5 == "" && $kapasitas5 == "" && $tenaga5 == ""){
                $val5 = "";
            }
            else{
                $val5 = $jumlah5.",".$pemilik5.",".$kapasitas5.",".$tenaga5;
            }
                            
            $q = mysql_query("insert into tbinput_lembaga(idkat,idunik,idsub,tipe,nilai,tahun) values('2','$idunik','$d5[id]','0','$val5','$tahun')");
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
                data:{idkat:2,mode:'input',tahun:$tahun.val(),tahun2:0},
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
                <th colspan='5'>USAHA JASA PENGANGKUTAN</th>
            <tr>
                <th>JENIS pemilik</th>
                <th>JUMLAH</th>
                <th>JUMLAH PEMILIK</th>
                <th>KAPASITAS ANGKUT</th>
                <th>JML. TENAGA KERJA</th>
            </tr>
            <tr>
                <th align=left colspan='5'>ANGKUTAN DARAT</th>
            </tr>";
$s1 = mysql_query("select * from tbjasa_pengangkutan where tipe = '1' order by posisi asc");
while($d1 = mysql_fetch_array($s1)){
    echo "<tr>
            <td>$d1[nama]</td>
            <td><input type='text' name ='jumlah$d1[id]'/> Unit</td>
            <td><input type='text' name ='pemilik$d1[id]'/></td>
            <td><input type='text' name ='kapasitas$d1[id]'/> Orang</td>
            <td><input type='text' name ='tenaga$d1[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
            <th align=left colspan='5'>ANGKUTAN SUNGAI</th>
        </tr>";
$s2 = mysql_query("select * from tbjasa_pengangkutan where tipe = '2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    echo "<tr>
            <td>$d2[nama]</td>
            <td><input type='text' name ='jumlah2$d2[id]'/> Unit</td>
            <td><input type='text' name ='pemilik2$d2[id]'/></td>
            <td><input type='text' name ='kapasitas2$d2[id]'/> Orang</td>
            <td><input type='text' name ='tenaga2$d2[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
            <th align=left colspan='5'>ANGKUTAN LAUT</th>
        </tr>";
$s3 = mysql_query("select * from tbjasa_pengangkutan where tipe = '3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    echo "<tr>
            <td>$d3[nama]</td>
            <td><input type='text' name ='jumlah3$d3[id]'/> Unit</td>
            <td><input type='text' name ='pemilik3$d3[id]'/></td>
            <td><input type='text' name ='kapasitas3$d3[id]'/> Orang</td>
            <td><input type='text' name ='tenaga3$d3[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
            <th align=left colspan='5'>ANGKUTAN UDARA</th>
        </tr>";
$s4 = mysql_query("select * from tbjasa_pengangkutan where tipe = '4' order by posisi asc");
while($d4 = mysql_fetch_array($s4)){
    echo "<tr>
            <td>$d4[nama]</td>
            <td><input type='text' name ='jumlah4$d4[id]'/> Unit</td>
            <td><input type='text' name ='pemilik4$d4[id]'/></td>
            <td><input type='text' name ='kapasitas4$d4[id]'/> Orang</td>
            <td><input type='text' name ='tenaga4$d4[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
            <th align=left colspan='5'>EKSPEDISI DAN PENGIRIMAN</th>
        </tr>";
$s5 = mysql_query("select * from tbjasa_pengangkutan where tipe = '5' order by posisi asc");
while($d5 = mysql_fetch_array($s5)){
    echo "<tr>
            <td>$d5[nama]</td>
            <td><input type='text' name ='jumlah5$d5[id]'/> Unit</td>
            <td><input type='text' name ='pemilik5$d5[id]'/></td>
            <td><input type='text' name ='kapasitas5$d5[id]'/> Orang</td>
            <td><input type='text' name ='tenaga5$d5[id]'/> Orang</td>
        </tr>";
}
echo "<tr>
        <td colspan='5' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

?>