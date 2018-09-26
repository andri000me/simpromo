<?php
include "../../../config/koneksi.php";
$tahun = $_GET['tahun'];
$idunik = $_GET['idunik'];
if(isset($_POST['simpan'])){
    $tahun2 = $_POST['tahun'];
    if($tahun != $tahun2){
        $s = mysql_query("select * from tbinput_lembaga where idkat = '2' and tahun ='$tahun2'");
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "<script>alert('Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !');</script>";
        }
        else
        {
            $tahun = $tahun2;
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


                $q = mysql_query("update tbinput_lembaga set nilai = '$val',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d1[id]'");
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


                $q = mysql_query("update tbinput_lembaga set nilai = '$val2',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d2[id]'");
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


                $q = mysql_query("update tbinput_lembaga set nilai = '$val3',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d3[id]'");
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


                $q = mysql_query("update tbinput_lembaga set nilai = '$val4',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d4[id]'");
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


                $q = mysql_query("update tbinput_lembaga set nilai = '$val5',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d5[id]'");
            }
            if($q){
                echo "<script>window.location='index.php';</script>";
            }
        }
    }
    else
    {
        $tahun = $_POST['tahun'];
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
            
            
            $q = mysql_query("update tbinput_lembaga set nilai = '$val',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d1[id]'");
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
            
            
            $q = mysql_query("update tbinput_lembaga set nilai = '$val2',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d2[id]'");
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
            
            
            $q = mysql_query("update tbinput_lembaga set nilai = '$val3',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d3[id]'");
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
            
            
            $q = mysql_query("update tbinput_lembaga set nilai = '$val4',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d4[id]'");
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
            
            
            $q = mysql_query("update tbinput_lembaga set nilai = '$val5',tahun='$tahun' where idkat = '2' and idunik = '$idunik' and idsub = '$d5[id]'");
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
                data:{idkat:2,mode:'ubah',tahun:<?php echo $tahun; ?>,tahun2:$tahun.val()},
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
    $_s1 = mysql_query("select * from tbinput_lembaga where idkat = '2' and idsub = '$d1[id]' and tahun = '$tahun'");
    $_d1 = mysql_fetch_array($_s1);
    
    $nilai = explode(",",$_d1['nilai']);
    
    $_r1 = mysql_num_rows($_s1);
    if($_r1 != 0){
        echo "<tr>
                <td>$d1[nama]</td>
                <td><input type='text' name ='jumlah$d1[id]' value='$nilai[0]'/> Unit</td>
                <td><input type='text' name ='pemilik$d1[id]' value='$nilai[1]'/></td>
                <td><input type='text' name ='kapasitas$d1[id]' value='$nilai[1]'/> Orang</td>
                <td><input type='text' name ='tenaga$d1[id]' value='$nilai[3]'/> Orang</td>
            </tr>";
    }
}
echo "<tr>
            <th align=left colspan='5'>ANGKUTAN SUNGAI</th>
        </tr>";
$s2 = mysql_query("select * from tbjasa_pengangkutan where tipe = '2' order by posisi asc");
while($d2 = mysql_fetch_array($s2)){
    $_s2 = mysql_query("select * from tbinput_lembaga where idkat = '2' and idsub = '$d2[id]' and tahun = '$tahun'");
    $_d2 = mysql_fetch_array($_s2);
    
    $nilai2 = explode(",",$_d2['nilai']);
    
    $_r2 = mysql_num_rows($_s2);
    if($_r2 != 0){
        echo "<tr>
                <td>$d2[nama]</td>
                <td><input type='text' name ='jumlah2$d2[id]' value='$nilai2[0]'/> Unit</td>
                <td><input type='text' name ='pemilik2$d2[id]' value='$nilai2[1]'/></td>
                <td><input type='text' name ='kapasitas2$d2[id]' value='$nilai2[2]'/> Orang</td>
                <td><input type='text' name ='tenaga2$d2[id]' value='$nilai2[3]'/> Orang</td>
            </tr>";
    }
}
echo "<tr>
            <th align=left colspan='5'>ANGKUTAN LAUT</th>
        </tr>";
$s3 = mysql_query("select * from tbjasa_pengangkutan where tipe = '3' order by posisi asc");
while($d3 = mysql_fetch_array($s3)){
    $_s3 = mysql_query("select * from tbinput_lembaga where idkat = '2' and idsub = '$d3[id]' and tahun = '$tahun'");
    $_d3 = mysql_fetch_array($_s3);
    
    $nilai3 = explode(",",$_d3['nilai']);
    
    $_r3 = mysql_num_rows($_s3);
    if($_r3 != 0){
        echo "<tr>
                <td>$d3[nama]</td>
                <td><input type='text' name ='jumlah3$d3[id]' value='$nilai3[0]'/> Unit</td>
                <td><input type='text' name ='pemilik3$d3[id]' value='$nilai3[1]'/></td>
                <td><input type='text' name ='kapasitas3$d3[id]' value='$nilai3[2]'/> Orang</td>
                <td><input type='text' name ='tenaga3$d3[id]' value='$nilai3[3]'/> Orang</td>
            </tr>";
    }
}
echo "<tr>
            <th align=left colspan='5'>ANGKUTAN UDARA</th>
        </tr>";
$s4 = mysql_query("select * from tbjasa_pengangkutan where tipe = '4' order by posisi asc");
while($d4 = mysql_fetch_array($s4)){
    $_s4 = mysql_query("select * from tbinput_lembaga where idkat = '2' and idsub = '$d4[id]' and tahun = '$tahun'");
    $_d4 = mysql_fetch_array($_s4);
    
    $nilai4 = explode(",",$_d4['nilai']);
    
    $_r4 = mysql_num_rows($_s4);
    if($_r4 != 0){
        echo "<tr>
                <td>$d4[nama]</td>
                <td><input type='text' name ='jumlah4$d4[id]' value='$nilai4[0]'/> Unit</td>
                <td><input type='text' name ='pemilik4$d4[id]' value='$nilai4[1]'/></td>
                <td><input type='text' name ='kapasitas4$d4[id]' value='$nilai4[2]'/> Orang</td>
                <td><input type='text' name ='tenaga4$d4[id]' value='$nilai4[3]'/> Orang</td>
            </tr>";
    }
}
echo "<tr>
            <th align=left colspan='5'>EKSPEDISI DAN PENGIRIMAN</th>
        </tr>";
$s5 = mysql_query("select * from tbjasa_pengangkutan where tipe = '5' order by posisi asc");
while($d5 = mysql_fetch_array($s5)){
    $_s5 = mysql_query("select * from tbinput_lembaga where idkat = '2' and idsub = '$d5[id]' and tahun = '$tahun'");
    $_d5 = mysql_fetch_array($_s5);
    
    $nilai5 = explode(",",$_d5['nilai']);
    
    $_r5 = mysql_num_rows($_s5);
    if($_r5 != 0){
        echo "<tr>
                <td>$d5[nama]</td>
                <td><input type='text' name ='jumlah5$d5[id]' value='$nilai5[0]'/> Unit</td>
                <td><input type='text' name ='pemilik5$d5[id]' value='$nilai5[1]'/></td>
                <td><input type='text' name ='kapasitas5$d5[id]' value='$nilai5[2]'/> Orang</td>
                <td><input type='text' name ='tenaga5$d5[id]' value='$nilai5[3]'/> Orang</td>
            </tr>";
    }
}
echo "<tr>
        <td colspan='5' align='right'><input type='submit' name='simpan' value='Simpan'/></td>
    </tr>";
echo "</table></form><link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

?>