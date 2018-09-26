<?php
function cekTahun($table,$idkat,$bulan,$bulan2,$tahun,$tahun2,$mode){
    if($mode == "input"){
        $s = mysql_query("select * from ".$table." where idkat = ".$idkat." and bulan = ".$bulan." and tahun = ".$tahun);
        $r = mysql_num_rows($s);
        if($r != 0){
            echo "Input pada bulan ".getBulan($bulan)." $tahun sudah ada pada database !, anda tidak perlu menginput lagi untuk bulan tersebut.";
        }
    }
    else if($mode == "ubah"){
            if($bulan != $bulan2 || $tahun != $tahun2){
                $s = mysql_query("select * from ".$table." where idkat = ".$idkat." and bulan = ".$bulan2." and tahun = ".$tahun2);
                $r = mysql_num_rows($s);
                if($r != 0){
                    echo "Tidak bisa mengubah data ke bulan ".getBulan($bulan)." $tahun2. Data pada bulan ".getBulan($bulan)." $tahun2 sudah ada pada database !";
                }
        }   
    }
}
?>