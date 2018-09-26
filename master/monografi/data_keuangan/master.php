<?php
include "../../../config/koneksi.php";
include_once "../../../functions/urut2.php";
include_once "../../../master/header.php";
echo "<h2>DATA KEUANGAN</h2>";

$mod = $_GET['mod'];
$tipe = $_GET['tipe'];
if($mod == "tambah"){
    
    echo "<link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";
    if($tipe == "main"){
        if(isset($_POST['simpan'])){
            $nama = $_POST['nama'];
            $pengurutan = $_POST['pengurutan'];
            
            $s = mysql_query("select max(posisi) as urut from tbmonografi_keuangan where tipe='main'");
            $d = mysql_fetch_array($s);
            $posisi  = $d['urut']+1;

            for($i = 0;$i < sizeof($nama);$i++){
               if($nama[$i] != ""){
                   $q = mysql_query("insert into tbmonografi_keuangan(idsub,tipe,nama,pengurutan,posisi) values('0','main','".mysql_real_escape_string($nama[$i])."','".$pengurutan[$i]."','".($posisi+$i)."')");
               }
            }

            if($q){
                echo "<script>window.location='master.php';</script>";
            }
        } 
?>
<script type="text/javascript" src="../../../lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var count = 0;
    $nama = $("#nama");
    $add = $("#add");
    $add.click(function(e){ 
        var countNext = count+1;
        $("#input"+count).append("<div>&nbsp;&nbsp;<input type='text' name='nama[]' id='nama"+count+"'/> Pengurutan Sub : <select name='pengurutan[]' id='pengurutan"+count+"'><option value='1'>Numerik (1,2,3,..)</option><option value='a'>Alfabet (a-z)</option><option value='A'>Alfabet (A-Z)</option><option value='-'>Strip (-)</option></select><div id='input"+countNext+"'></div></div>");
        $("#nama"+count).focus();
        count++;
    });
});
</script>
<form method="post">
    <table>
        <tr>
            <td>Data Keuangan</td>
            <td id='nama'><div id='input0'> : <input type='text' name='nama[]' id='nama' required/> Pengurutan Sub : <select name='pengurutan[]' id='pengurutan'><option value='1'>Numerik (1,2,3,..)</option><option value='a'>Alfabet (a-z)</option><option value='A'>Alfabet (A-Z)</option><option value='-'>Strip (-)</option></select><a class='btn' href='#' id='add'>+</a></div></td>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td><input type='submit' name='simpan' value='Tambah'></td>
        </tr>
    </table>
</form>
<?php
    }
    else if($tipe == "sub"){
        $idsub = abs((int)$_GET['id']);
        if(isset($_POST['simpan'])){
            $nama = $_POST['nama'];
            $pengurutan = $_POST['pengurutan'];
            
            $s = mysql_query("select max(posisi) as urut from tbmonografi_keuangan where tipe='sub' and idsub='$idsub'");
            $d = mysql_fetch_array($s);
            $posisi  = $d['urut']+1;

            for($i = 0;$i < sizeof($nama);$i++){
               if($nama[$i] != ""){
                   $q = mysql_query("insert into tbmonografi_keuangan(idsub,tipe,nama,pengurutan,posisi) values('$idsub','sub','".mysql_real_escape_string($nama[$i])."','".$pengurutan[$i]."','".($posisi+$i)."')");
               }
            }

            if($q){
                echo "<script>window.location='master.php';</script>";
            }
        } 
?>
<script type="text/javascript" src="../../../lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var count = 0;
    $nama = $("#nama");
    $add = $("#add");
    $add.click(function(e){ 
        var countNext = count+1;
        $("#input"+count).append("<div>&nbsp;&nbsp;<input type='text' name='nama[]' id='nama"+count+"'/> Pengurutan Sub : <select name='pengurutan[]' id='pengurutan"+count+"'><option value='1'>Numerik (1,2,3,..)</option><option value='a'>Alfabet (a-z)</option><option value='A'>Alfabet (A-Z)</option><option value='-'>Strip (-)</option></select><div id='input"+countNext+"'></div></div>");
        $("#nama"+count).focus();
        count++;
    });
});
</script>
<form method="post">
    <table>
        <tr>
            <td>Nama Sub</td>
            <td id='nama'><div id='input0'> : <input type='text' name='nama[]' id='nama' required/> Pengurutan Sub : <select name='pengurutan[]' id='pengurutan'><option value='1'>Numerik (1,2,3,..)</option><option value='a'>Alfabet (a-z)</option><option value='A'>Alfabet (A-Z)</option><option value='-'>Strip (-)</option></select><a class='btn' href='#' id='add'>+</a></div></td>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td><input type='submit' name='simpan' value='Tambah'></td>
        </tr>
    </table>
</form>
<?php
    }
    else if($tipe == "sub2"){
        $idsub = abs((int)$_GET['id']);
        if(isset($_POST['simpan'])){
            $nama = $_POST['nama'];
            
            $s = mysql_query("select max(posisi) as urut from tbmonografi_keuangan where tipe='sub2'  and idsub='$idsub'");
            $d = mysql_fetch_array($s);
            $posisi  = $d['urut']+1;

            for($i = 0;$i < sizeof($nama);$i++){
               if($nama[$i] != ""){
                   $q = mysql_query("insert into tbmonografi_keuangan(idsub,tipe,nama,posisi) values('$idsub','sub2','".mysql_real_escape_string($nama[$i])."','".($posisi+$i)."')");
               }
            }

            if($q){
                echo "<script>window.location='master.php';</script>";
            }
        } 
?>
<script type="text/javascript" src="../../../lib/js/jquery-1.9.1.min.js"></script>
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
            <td>Nama Sub</td>
            <td id='nama'><div id='input0'> : <input type='text' name='nama[]' id='nama' required/><a class='btn' href='#' id='add'>+</a></div></td>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td><input type='submit' name='simpan' value='Tambah'></td>
        </tr>
    </table>
</form>
<?php
    }
    else{
        echo "<script>window.location='master.php';</script>";   
    }
}
else if($mod == "ubah"){

    echo "<link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";

    $id = abs((int)$_GET['id']);
    $c = mysql_query("select * from tbmonografi_keuangan where id='$id'");
    $d = mysql_fetch_array($c);
    
    $nama = $d['nama'];
    $pengurutan = $d['pengurutan'];
    
    if($tipe == "main"){
        if(isset($_POST['simpan'])){
            if(isset($_POST['simpan'])){
                $nama = mysql_real_escape_string($_POST['nama']);
                $pengurutan = $_POST['pengurutan'];
                
                $q = mysql_query("update tbmonografi_keuangan set nama = '$nama', pengurutan = '$pengurutan' where id = '$id'");
                if($q){
                    echo "<script>window.location='master.php';</script>";
                }
            }
        }
?>
<form method="post">
    <table>
        <tr>
            <td>Data Keuangan</td>
            <td><input type='text' name='nama' value='<?php echo $nama; ?>' required></td>
        </tr>
        <tr>
            <td>Pengurutan Sub</td>
            <td><select name='pengurutan' id='pengurutan'>
                    <option value='1' <?php if($pengurutan == '1')echo "selected"; ?>>Numerik (1,2,3,..)</option>
                    <option value='a' <?php if($pengurutan == 'a')echo "selected"; ?>>Alfabet (a-z)</option>
                    <option value='A' <?php if($pengurutan == 'A')echo "selected"; ?>>Alfabet (A-Z)</option>
                    <option value='-' <?php if($pengurutan == '-')echo "selected"; ?>>Strip (-)</option>
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
    else if($tipe == "sub"){
        
        $idsub = $d['idsub'];
        
        if(isset($_POST['simpan'])){
            $nama = mysql_real_escape_string($_POST['nama']);
            $data = $_POST['data'];
            $pengurutan = $_POST['pengurutan'];

            if($data != $d['idsub']){
                $s = mysql_query("select max(posisi) as urut from tbmonografi_keuangan where idsub = '$data'");
                $d = mysql_fetch_array($s);
                $posisi  = $d['urut']+1;
            }
            else
            {
                $posisi = $d['posisi'];
            }
            $q = mysql_query("update tbmonografi_keuangan set nama = '$nama',
                                                            idsub = '$data',
                                                            pengurutan = '$pengurutan',
                                                            posisi = '$posisi'
                                                            where id = '$id'");
            $s2 = mysql_query("select * from tbmonografi_keuangan where tipe='sub2' and idsub = '$id'");
            while($d2 = mysql_fetch_array($s2)){
                $q = mysql_query("update tbinput_monografi set idmain = '$data' where idsub = '$d2[id]'");
            }
            $q = mysql_query("update tbinput_monografi set idmain = '$data' where idkat = '1' and idsub = '$id'");
            if($q){
                echo "<script>window.location='master.php';</script>";
            }
        }
        echo "<link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";
?>
<form method="post">
    <table>
        <tr>
            <td>Data Keuangan</td>
            <td><select name='data' required>
                    <?php
                        $s = mysql_query("select * from tbmonografi_keuangan where tipe='main'");
                        while($dd = mysql_fetch_array($s)){
                            if($dd[id] == $idsub){
                                echo "<option value='$dd[id]' selected>$dd[nama]</option>";
                            }
                            else{
                                echo "<option value='$dd[id]'>$dd[nama]</option>";
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama Sub</td>
            <td><input type='text' name='nama' value='<?php echo $nama; ?>' required></td>
        </tr>
        <tr>
            <td>Pengurutan Sub</td>
            <td><select name='pengurutan' id='pengurutan'>
                    <option value='1' <?php if($pengurutan == '1')echo "selected"; ?>>Numerik (1,2,3,..)</option>
                    <option value='a' <?php if($pengurutan == 'a')echo "selected"; ?>>Alfabet (a-z)</option>
                    <option value='A' <?php if($pengurutan == 'A')echo "selected"; ?>>Alfabet (A-Z)</option>
                    <option value='-' <?php if($pengurutan == '-')echo "selected"; ?>>Strip (-)</option>
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
    else if($tipe == "sub2"){
        
        $idsub = $d['idsub'];
        
        if(isset($_POST['simpan'])){
            $nama = mysql_real_escape_string($_POST['nama']);
            $data = $_POST['data'];

            if($data != $d['idsub']){
                $s = mysql_query("select max(posisi) as urut from tbmonografi_keuangan where idsub = '$data'");
                $d = mysql_fetch_array($s);
                $posisi  = $d['urut']+1;
            }
            else
            {
                $posisi = $d['posisi'];
            }
            $q = mysql_query("update tbmonografi_keuangan set nama = '$nama',
                                                            idsub = '$data',
                                                            posisi = '$posisi'
                                                            where id = '$id'");
            
            $q = mysql_query("update tbinput_monografi set idsub2 = '$data' where idkat = '1' and idsub = '$id'");

            if($q){
                echo "<script>window.location='master.php';</script>";
            }
        }
        echo "<link rel='stylesheet' type='text/css' href='../../../lib/css/table2.css'/>";
?>
<form method="post">
    <table>
        <tr>
            <td>Data Keuangan</td>
            <td><select name='data' required>
                    <?php
                        $s = mysql_query("select * from tbmonografi_keuangan where tipe='sub'");
                        while($dd = mysql_fetch_array($s)){
                            if($dd[id] == $idsub){
                                echo "<option value='$dd[id]' selected>$dd[nama]</option>";
                            }
                            else{
                                echo "<option value='$dd[id]'>$dd[nama]</option>";
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama Sub</td>
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
    else{
        echo "<script>window.location='master.php';</script>";
    } 
}
else if($mod == "hapus"){
    $id = abs((int)$_GET['id']);
    $q = mysql_query("delete from tbmonografi_keuangan where id='$id'");
    $q = mysql_query("delete from tbmonografi_keuangan where idsub='$id'");
    if($q){
        echo "<script>window.location='master.php';</script>";
    }
}
else if($mod == "urut"){
    $id = abs((int)$_GET['id']);
    $idsub = abs((int)$_GET['idsub']);
    $tipe = $_GET['tipe'];
    $table = "tbmonografi_keuangan";
    $posisi = $_GET['posisi'];
    if($posisi == "up"){
        keAtas($table,$id,$idsub,$tipe);
        echo "<script>window.location = 'master.php';</script>";
    }
    else
    {
       $act = keBawah($table,$id,$idsub,$tipe);
       echo "<script>window.location = 'master.php';</script>";
    }
}
else{
    echo "<link rel='stylesheet' type='text/css' href='../../../lib/css/table.css'/>";
    echo "<script type='text/javascript' src='../../../lib/js/confirmDelete.js'></script>";
    echo "<input type='reset' onclick=\"window.location='?mod=tambah&tipe=main';\" value='+ Tambah'/>";
    echo "<table>
            <tr>
                <th>#</th>
                <th align=left>DATA KEUANGAN</th>
                <th>Pilihan</th>
            </tr>";
    $n1 = 1;
    $s1= mysql_query("select * from tbmonografi_keuangan where tipe='main' order by posisi asc");
    while($d1 = mysql_fetch_array($s1)){
        echo "<tr>
                <td>$n1</td>
                <td>$d1[nama]</td>
                <td><a class='edit' href='?mod=tambah&tipe=sub&id=$d1[id]'>+ Sub</a> <a class='edit' href='?mod=urut&id=$d1[id]&tipe=main&posisi=up'>&#8593;</a> <a class='edit' href='?mod=urut&id=$d1[id]&tipe=main&posisi=down'>&#8595;</a> <a class='edit' href='?mod=ubah&id=$d1[id]&tipe=main'>Ubah</a> <a class='del' href='#' onclick='confirmDelete(\"?mod=hapus&id=$d1[id]\");'>Hapus</a></td>
            </tr>";
        $urut = $d1['pengurutan'];
        if($d1['pengurutan'] != '-'){
                $titik = ".";
        }
        else{
            $titik = "";
        }
        $s2 = mysql_query("select * from tbmonografi_keuangan where tipe='sub' and idsub='$d1[id]' order by posisi asc");
        while($d2 = mysql_fetch_array($s2)){
            echo "<tr>
                <td></td>
                <td>$urut$titik $d2[nama]</td>
                <td><a class='edit' href='?mod=tambah&tipe=sub2&id=$d2[id]'>+ Sub</a> <a class='edit' href='?mod=urut&id=$d2[id]&idsub=$d1[id]&tipe=sub&posisi=up'>&#8593;</a> <a class='edit' href='?mod=urut&id=$d2[id]&idsub=$d1[id]&tipe=sub&posisi=down'>&#8595;</a> <a class='edit' href='?mod=ubah&id=$d2[id]&tipe=sub'>Ubah</a> <a class='del' href='#' onclick='confirmDelete(\"?mod=hapus&id=$d2[id]\");'>Hapus</a></td>
            </tr>";
            if($urut != '-'){
                $urut++;
            }
            $urut2 = $d2['pengurutan'];
            if($d2['pengurutan'] != '-'){
                $titik2 = ".";
            }
            else{
                $titik2 = "";
            }
            $s3 = mysql_query("select * from tbmonografi_keuangan where tipe='sub2' and idsub='$d2[id]' order by posisi asc");
            while($d3 = mysql_fetch_array($s3)){
                echo "<tr>
                    <td></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$urut2$titik2 $d3[nama]</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='edit' href='?mod=urut&id=$d3[id]&idsub=$d2[id]&tipe=sub2&posisi=up'>&#8593;</a> <a class='edit' href='?mod=urut&id=$d3[id]&idsub=$d2[id]&tipe=sub2&posisi=down'>&#8595;</a> <a class='edit' href='?mod=ubah&id=$d3[id]&tipe=sub2'>Ubah</a> <a class='del' href='#' onclick='confirmDelete(\"?mod=hapus&id=$d3[id]\");'>Hapus</a></td>
                </tr>";
                if($urut2 != '-'){
                    $urut2++;
                }
            }
        }
        $n1++;
    }
    echo "</table>";
}
include "../../../master/footer.php";
?>