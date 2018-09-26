<?php
include "../../../../config/koneksi.php";
include_once "../../../../functions/urut.php";
include_once "../../../../master/header.php";
echo "<h2>POTENSI AIR DAN SUMBER DAYA AIR</h2>";

$mod = $_GET['mod'];
if($mod == "tambah"){
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $satuan = $_POST['satuan'];
        
        $s = mysql_query("select max(posisi) as urut from tbpotensi_air");
        $d = mysql_fetch_array($s);
        $posisi  = $d['urut']+1;
        
        for($i = 0;$i < sizeof($nama);$i++){
           if($nama[$i] != ""){
               $q = mysql_query("insert into tbpotensi_air(nama,satuan,posisi) values('".mysql_real_escape_string($nama[$i])."','".$satuan[$i]."','".($posisi+$i)."')");
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
        $("#input"+count).append("<div>&nbsp;&nbsp;<input type='text' name='nama[]' id='nama"+count+"'/><input type='text' name='satuan[]' placeholder='Satuan' id='satuan"+count+"'/><div id='input"+countNext+"'></div></div>");
        $("#nama"+count).focus();
        count++;
    });
});
</script>
<form method="post">
    <table>
        <tr>
            <td>Jenis Potensi Air dan Sumber Daya Air</td>
            <td id='nama'><div id='input0'> : <input type='text' name='nama[]' id='nama' required/><input type='text' name='satuan[]' id='satuan' placeholder="Satuan" required/><a class='btn' href='#' id='add'>+</a></div></td>
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
    $c = mysql_query("select * from tbpotensi_air where id='$id'");
    $d = mysql_fetch_array($c);
    
    $nama = $d['nama'];
    $satuan = $d['satuan'];
    
    if(isset($_POST['simpan'])){
        $nama = mysql_real_escape_string($_POST['nama']);
        $satuan = mysql_real_escape_string($_POST['satuan']);
        $q = mysql_query("update tbpotensi_air set nama = '$nama',satuan = '$satuan' where id = '$id'");
        if($q){
            echo "<script>window.location='master.php';</script>";
        }
    }
    echo "<link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";
?>
<form method="post">
    <table>
        <tr>
            <td>Jenis Potensi Air dan Sumber Daya Air</td>
            <td><input type='text' name='nama' value='<?php echo $nama; ?>' required></td>
        </tr>
        <tr>
            <td>Satuan</td>
            <td><input type='text' name='satuan' value='<?php echo $satuan; ?>' required></td>
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
    $table = "tbpotensi_air";
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
    $q = mysql_query("delete from tbpotensi_air where id='$id'");
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
                <th align=left>POTENSI AIR DAN SUMBER DAYA AIR</th>
                <th>Satuan</th>
                <th>Pilihan</th>
            </tr>";
    $n1 = 1;
    $s1= mysql_query("select * from tbpotensi_air order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        echo "<tr>
                <td>$n1</td>
                <td>$d1[nama]</td>
                <td>$d1[satuan]</td>
                <td><a class='edit' href='?mod=urut&id=$d1[id]&tipe=1&posisi=up'>&#8593;</a> <a class='edit' href='?mod=urut&id=$d1[id]&tipe=1&posisi=down'>&#8595;</a> <a class='edit' href='?mod=ubah&id=$d1[id]'>Ubah</a> <a class='del' href='#' onclick='confirmDelete(\"?mod=hapus&id=$d1[id]\");'>Hapus</a></td>
            </tr>";
        $n1++;
    }
    echo "</table>";
}
include_once "../../../../master/footer.php";
?>