<?php
function cekTahun($table,$idkat,$tahun,$tahun2,$mode){
    if($mode == "input"){
        $s = mysql_query("select * from ".$table." where idkat = ".$idkat." and tahun = ".$tahun);
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "Input pada tahun $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk tahun tersebut.";
        }
    }
    else if($mode == "ubah"){
            if($tahun != $tahun2){
                $s = mysql_query("select * from ".$table." where idkat = ".$idkat." and tahun = ".$tahun2);
                $r = mysql_num_rows($s);
                if($r != 0){
                    echo "Tidak bisa mengubah data ke tahun $tahun2. Data pada tahun $tahun2 sudah ada pada database !";
                }
        }   
    }
}
?>