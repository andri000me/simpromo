<?php
include "../../../../config/koneksi.php";
include_once "../../../../functions/urut.php";
include_once "../../../../master/header.php";
echo "<h2>SUNGAI DAN RAWA</h2>";

$mod = $_GET['mod'];
if($mod == "tambah"){
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $tipe = $_POST['tipe'];
        
        $s = mysql_query("select max(posisi) as urut from tbsungai_rawa where tipe = '$tipe'");
        $d = mysql_fetch_array($s);
        $posisi  = $d['urut']+1;
        
        for($i = 0;$i < sizeof($nama);$i++){
           if($nama[$i] != ""){
               $q = mysql_query("insert into tbsungai_rawa(nama,tipe,posisi) values('".mysql_real_escape_string($nama[$i])."','$tipe','".($posisi+$i)."')");
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
            <td>Tipe Kategori</td>
            <td> : <select name='tipe' required>
                    <option value=''>- Pilih Tipe</option>
                    <option value='1'>Sungai</option>
                    <option value='2'>Rawa</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama Kategori</td>
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
    $c = mysql_query("select * from tbsungai_rawa where id='$id'");
    $d = mysql_fetch_array($c);
    
    $nama = $d['nama'];
    $tipe = $d['tipe'];
    
    if(isset($_POST['simpan'])){
        $nama = mysql_real_escape_string($_POST['nama']);
        $tipe = $_POST['tipe'];
        
        if($tipe != $d['tipe']){
            $s = mysql_query("select max(posisi) as urut from tbsungai_rawa where tipe = '$tipe'");
            $d = mysql_fetch_array($s);
            $posisi  = $d['urut']+1;
        }
        else
        {
            $posisi = $d['posisi'];
        }
        
        $q = mysql_query("update tbsungai_rawa set nama = '$nama',
                                                            tipe = '$tipe',
                                                            posisi = '$posisi'
                                                            where id = '$id'");
        if($q){
            echo "<script>window.location='master.php';</script>";
        }
    }
    echo "<link rel='stylesheet' type='text/css' href='../../../../lib/css/table2.css'/>";
?>
<form method="post">
    <table>
        <tr>
            <td>Nama Kategori</td>
            <td><input type='text' name='nama' value='<?php echo $nama; ?>' required></td>
        </tr>
        <tr>
            <td>Tipe Kategori</td>
            <td><select name='tipe' required>
                    <option value=''>- Pilih Tipe</option>
                    <option value='1' <?php if($tipe == 1) echo "selected";?>>Sungai</option>
                    <option value='2' <?php if($tipe == 2) echo "selected";?>>Rawa</option>
                </select>
            </td>
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
    $tipe = abs((int)$_GET['tipe']);
    $table = "tbsungai_rawa";
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
    $q = mysql_query("delete from tbsungai_rawa where id='$id'");
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
                <th align=left>SUNGAI</th>
                <th>Pilihan</th>
            </tr>";
    $n1 = 1;
    $s1= mysql_query("select * from tbsungai_rawa where tipe='1' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        echo "<tr>
                <td>$n1</td>
                <td>$d1[nama]</td>
                <td><a class='edit' href='?mod=urut&id=$d1[id]&tipe=1&posisi=up'>&#8593;</a> <a class='edit' href='?mod=urut&id=$d1[id]&tipe=1&posisi=down'>&#8595;</a> <a class='edit' href='?mod=ubah&id=$d1[id]'>Ubah</a> <a class='del' href='#' onclick='confirmDelete(\"?mod=hapus&id=$d1[id]\");'>Hapus</a></td>
            </tr>";
        $n1++;
    }
    echo "<tr>
            <th>#</th>
            <th align=left>RAWA</th>
            <th>Pilihan</th>
        </tr>";
    $n2 = 1;
    $s2= mysql_query("select * from tbsungai_rawa where tipe='2' order by posisi asc");
    while($d2 = mysql_fetch_array($s2)){
        echo "<tr>
                <td>$n2</td>
                <td>$d2[nama]</td>
                <td><a class='edit' href='?mod=urut&id=$d2[id]&tipe=2&posisi=up'>&#8593;</a> <a class='edit' href='?mod=urut&id=$d2[id]&tipe=2&posisi=down'>&#8595;</a> <a class='edit' href='?mod=ubah&id=$d2[id]'>Ubah</a> <a class='del' href='#' onclick ='confirmDelete(\"?mod=hapus&id=$d2[id]\");'>Hapus</a></td>
            </tr>";
        $n2++;
    }
    echo "</table>";
}
include_once "../../../../master/footer.php";
?>