<?php
include "../../../config/koneksi.php";
$bulan = abs((int)$_GET['bulan']);
$tahun = abs((int)$_GET['tahun']);

if(isset($_POST['salin'])){
    $bulan2 = $_POST['bulan'];
    $tahun2 = $_POST['tahun'];
    
    $c = mysql_query("select * from tbinput_monografi where idkat = '7' and bulan = '$bulan2' and tahun ='$tahun2'");
    $r = mysql_num_rows($c);
    if($r != 0){
        echo "<script>alert('Input pada bulan ".getBulan($bulan2)." $tahun2 sudah ada pada database !, anda tidak perlu menginput lagi untuk bulan tersebut.');</script>";
    }
    else{
        $s0 = mysql_query("select * from tbinput_monografi where idkat = '7'");
        $d0 = mysql_fetch_array($s0);
        $idunik = $d0['idunik']+1;
        $s = mysql_query("select * from tbinput_monografi where idkat='7' and bulan = '$bulan' and tahun = '$tahun'");
        while($d = mysql_fetch_array($s)){
            $q = mysql_query("insert into tbinput_monografi(idkat,idunik,idsub,idmain,idsub2,nilai,bulan,tahun) values('7','$idunik','$d[idsub]','$d[idmain]','$d[idsub2]','$d[nilai]','$bulan2','$tahun2')");
        }
        if($q){
            echo "<script>alert('Data berhasil disalin !');window.location='index.php';</script>";
        }
        else{
            echo "<script>alert('Gagal menyalin data !, pastikan data tersedia pada bulan yang ingin disalin.');window.location='index.php';</script>";
        }
    }
}

echo "<div class='well'>
        <form name='salin' method='post'>
            <table>
                <tr>
                    <td>Salin Data : <b>".getBulan($bulan)." $tahun</b></td>
                </tr>
                <tr>
                    <td><br/>Ke : <select name='bulan' id='bulan' required>
                        <option value=''>- Pilih Bulan -</option>";
                        for($i = 1;$i<=12;$i++){
                            echo "<option value='$i'>".getBulan($i)."</option>";
                        }
                    echo "</select>
                    <select name='tahun' id='tahun' required>
                        <option value=''>- Pilih Tahun -</option>
                    </select> <input type='submit' id='salin' name='salin' value='Salin'/>
                    </td>
                </tr></table></form>
            </div>";
?>
<script type="text/javascript" src="../../../lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $bulan = $("#bulan");
    $tampil = $("#tampil");
    $salin = $("#salin");
    
    //show tahun
    var d = new Date();
    var y = d.getFullYear();

    for(var i = y;i >= 2014;i--){
         $tahun.append("<option value='"+i+"'>"+i+"</option>");
    }
    
    $tahun.change(function(){
        if($tahun.val() != '' && $bulan.val() != ''){
            $.ajax({
                url:'cektahun.php',
                type:'GET',
                data:{idkat:7,mode:'input',bulan:$bulan.val(),bulan2:0,tahun:$tahun.val(),tahun2:0},
                success:function(data){
                    if(data != ""){
                        alert(data);
                        window.location.reload();
                    }
                }
            });
        }
    });
    $bulan.change(function(){
        if($bulan.val() != '' && $tahun.val() != ''){
            $.ajax({
                url:'cektahun.php',
                type:'GET',
                data:{idkat:7,mode:'input',bulan:$bulan.val(),bulan2:0,tahun:$tahun.val(),tahun2:0},
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