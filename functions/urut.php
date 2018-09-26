<?php
    function keAtas($table,$id,$tipe){
        if($tipe != 0)
        {
            $a = "and tipe = '$tipe'";
        }
        else
        {
            $a = "";
        }
        $s1 = mysql_query("select posisi from ".$table." where id='$id' $a");
        $d1 = mysql_fetch_array($s1);
        $s2 = mysql_query("select * from ".$table." where posisi < $d1[posisi] $a order by posisi desc limit 1");
        $d2 = mysql_fetch_array($s2);
        if($d2 != "")
        {
            $awal = $d1['posisi'];
            $target = $d2['posisi'];
            $idtarget = $d2['id'];
            $q = mysql_query("update ".$table." set posisi = '$awal' where id='$idtarget'");
            $q = mysql_query("update ".$table." set posisi = '$target' where id='$id'");
        }
    }
    function keBawah($table,$id,$tipe){
        if($tipe != 0)
        {
            $a = "and tipe = '$tipe'";
        }
        else
        {
            $a = "";
        }
        $s1 = mysql_query("select posisi from ".$table." where id='$id' $a");
        $d1 = mysql_fetch_array($s1);
        $s2 = mysql_query("select * from ".$table." where posisi > $d1[posisi] $a  order by posisi asc limit 1");
        $d2 = mysql_fetch_array($s2);
        if($d2 != ""){
            $awal = $d1['posisi'];
            $target = $d2['posisi'];
            $idtarget = $d2['id'];
            $q = mysql_query("update ".$table." set posisi = '$awal' where id='$idtarget'");
            $q = mysql_query("update ".$table." set posisi = '$target' where id='$id'");
        }
    }
?>