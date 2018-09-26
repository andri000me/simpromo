<?php
include "../../../config/koneksi.php";
include "../../../master/header2.php";
echo "<h2>PRASARANA DAN SARANA PENDIDIKAN</h2>";

$mod = $_GET['mod'];
if($mod == "hapus"){
    $tahun = abs((int)$_GET['tahun']);
    $q = mysql_query("delete from tbinput_sarpras2 where idkat = '6' and tahun = '$tahun'");
    if($q){
        echo "<script>window.location = 'index.php';</script>";
    }
}
else if($mod == "tambah"){
    include "tambah.php";
}
else if($mod == "ubah"){
    include "ubah.php";
}
else if($mod == "salin"){
    include "salin.php";
}
else
{
    echo "<input type='reset' onclick='window.location=\"?mod=tambah\"' value='+ Tambah'/>";
?>
<script type="text/javascript" src="../../../lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../../../lib/js/confirmDelete.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $tampil = $("#tampil");
    
    //show tahun
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        if(i == y){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    
    $tahun.change(function(){
        $.ajax({
            url:'lihat.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                $tampil.html(data);
            }
        });
    });
    
    $.ajax({
        url:'lihat.php',
        type:'GET',
        data:{tahun:$tahun.val()},
        success:function(data){
            $tampil.html(data);
        }
    });
    
});
</script>
Lihat Data : <select id='tahun'>
</select>
<div id="tampil"></div>
<?php
}
include "../../../master/footer.php";
?>