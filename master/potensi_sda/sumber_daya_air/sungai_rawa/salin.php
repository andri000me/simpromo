<?php
include "../../../../config/koneksi.php";
$tahun = abs((int)$_GET['tahun']);

if(isset($_POST['salin'])){
    $tahun2 = $_POST['tahun'];
    
    $c = mysql_query("select * from tbinput_sda where idkat = '5' and tahun ='$tahun2'");
    $r = mysql_num_rows($c);
    if($r != 0){
        echo "<script>alert('Input pada tahun $tahun2 sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.');</script>";
    }
    else{
        $s0 = mysql_query("select * from tbinput_sda where idkat = '5'");
        $d0 = mysql_fetch_array($s0);
        $idunik = $d0['idunik']+1;
        
        $s = mysql_query("select * from tbinput_sda where idkat='5' and tahun = '$tahun'");
        while($d = mysql_fetch_array($s)){
            $q = mysql_query("insert into tbinput_sda(idkat,idunik,idsub,tipe,nilai,tahun) values('5','$idunik','$d[idsub]','$d[tipe]','$d[nilai]','$tahun2')");
        }
        if($q){
            echo "<script>alert('Data berhasil disalin !');window.location='index.php';</script>";
        }
        else{
            echo "<script>alert('Gagal menyalin data !, pastikan data tersedia pada tahun yang ingin disalin.');window.location='index.php';</script>";
        }
    }
}

echo "<div class='well'>
        <form name='salin' method='post'>
            <table>
                <tr>
                    <td>Salin Data : <b>$tahun</b></td>
                </tr>
                <tr>
                    <td><br/>Ke : </select>
                    <select name='tahun' id='tahun' required>
                        <option value=''>- Pilih Tahun -</option>
                    </select> <input type='submit' id='salin' name='salin' value='Salin'/>
                    </td>
                </tr></table></form>
            </div>";
?>
<script type="text/javascript" src="../../../../lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $tampil = $("#tampil");
    $salin = $("#salin");
    
    //show tahun
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
                data:{idkat:5,mode:'input',tahun:$tahun.val(),tahun2:0},
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