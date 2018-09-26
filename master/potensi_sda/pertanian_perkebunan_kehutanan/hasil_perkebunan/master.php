<?php
include "../../../../config/koneksi.php";
include_once "../../../../functions/urut.php";
include_once "../../../../master/header.php";
echo "<h2>LUAS DAN HASIL PERKEBUNAN</h2>";
$mod = $_GET['mod'];
if($mod == "tambah"){
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        
        $s = mysql_query("select max(posisi) as urut from tbhasil_perkebunan");
        $d = mysql_fetch_array($s);
        $posisi  = $d['urut']+1;
        
        for($i = 0;$i < sizeof($nama);$i++){
           if($nama[$i] != ""){
               $q = mysql_query("insert into tbhasil_perkebunan(nama,posisi) values('".mysql_real_escape_string($nama[$i])."','".($posisi+$i)."')");
           }
        }
        
        if($q){
            echo "<script>window.location='master.php';</script>";
        }
    }
    echo "<link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";
?>
<script type="text/javascript" src="../../../../lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var count = 0;
    $nama = $("#nama");
    $add = $("#add");
    $add.click(function(e){ 
        var countNext = count+1;
        $("#input"+count).append("<div>&nbsp;&nbsp;<input type='text' name='nama[]' id='nama"+count+"'/><div id='input"+countNext+"'></div></div>");
        $("#nama"+count).focus();
        count++;
    });
});
</script>
<form method="post">
    <table>
        <tr>
            <td>Jenis</td>
            <td id='nama'><div id='input0'> : <input type='text' name='nama[]' id='nama' required/><a class='btn' href='#' id='add'>+</a></div></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type='submit' name='simpan' value='Tambah'></td>
        </tr>
    </table>
</form>
<?php
}
else if($mod == "ubah"){
    $id = abs((int)$_GET['id']);
    $c = mysql_query("select * from tbhasil_perkebunan where id='$id'");
    $d = mysql_fetch_array($c);
    
    $nama = $d['nama'];
    
    if(isset($_POST['simpan'])){
        $nama = mysql_real_escape_string($_POST['nama']);
        
        $q = mysql_query("update tbhasil_perkebunan set nama = '$nama' where id = '$id'");
        if($q){
            echo "<script>window.location='master.php';</script>";
        }
    }
    echo "<link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";

?>
<form method="post">
    <table>
        <tr>
            <td>Jenis</td>
            <td><input type='text' name='nama' value='<?php echo $nama; ?>' required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='simpan' value='Ubah'></td>
        </tr>
    </table>
</form>
<?php
}
else if($mod == "urut"){
    $id = abs((int)$_GET['id']);
    $tipe = 0;
    $table = "tbhasil_perkebunan";
    $posisi = $_GET['posisi'];
    if($posisi == "up"){
        keAtas($table,$id,$tipe);
        echo "<script>window.location = 'master.php';</script>";
    }
    else
    {
       $act = keBawah($table,$id,$tipe);
       echo "<script>window.location = 'master.php';</script>";
    }
}
else if($mod == "hapus"){
    $id = abs((int)$_GET['id']);
    $q = mysql_query("delete from tbhasil_perkebunan where id='$id'");
    if($q){
        echo "<script>window.location='master.php';</script>";
    }
}
else
{
    echo "<link rel='stylesheet' type='text/css' href='../../../../lib/css/table.css'/>";
    echo "<script type='text/javascript' src='../../../../lib/js/confirmDelete.js'></script>";
    echo "<input type='reset' onclick=\"window.location='?mod=tambah';\" value='+ Tambah'/>";
    echo "<table>
            <tr>
                <th>#</th>
                <th align=left>Jenis</th>
                <th>Pilihan</th>
            </tr>";
    $n1 = 1;
    $s1= mysql_query("select * from tbhasil_perkebunan order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        echo "<tr>
                <td>$n1</td>
                <td>$d1[nama]</td>
                <td><a class='edit' href='?mod=urut&id=$d1[id]&tipe=1&posisi=up'>&#8593;</a> <a class='edit' href='?mod=urut&id=$d1[id]&tipe=1&posisi=down'>&#8595;</a> <a class='edit' href='?mod=ubah&id=$d1[id]'>Ubah</a> <a class='del' href='#' onclick='confirmDelete(\"?mod=hapus&id=$d1[id]\");'>Hapus</a></td>
            </tr>";
        $n1++;
    }
    echo "</table>";
}
include_once "../../../../master/footer.php";
?>