<?php
include "../config/koneksi2.php";
include "../functions/bulanIndo.php";
$bulan = abs((int)$_GET['bulan']);
$tahun = abs((int)$_GET['tahun']);
$req = $_GET['req'];
$pilih = abs((int)$_GET['pilih']);
$s = mysql_query("select * from tbakun where id='1'");
$d = mysql_fetch_array($s);

echo "<script>window.print();</script>";
echo "<div class='heading'><div class='bborder'>";
if($req == "mono"){
    echo "<center><h1>MONOGRAFI DESA</h2></center>";
    echo "<center>( Sesuai Dengan Permendagri No. 13 Tahun 2012 )</center>";
}else{
    echo "<center><h1>PROFIL DESA</h2></center>";
    echo "<center>( Sesuai Dengan Permendagri No. 12 Tahun 2007 )</center>";     
}
echo "<center>DESA : ".strtoupper($d['desa'])."&nbsp;&nbsp; KEC. : ".strtoupper($d['kec'])."&nbsp;&nbsp; TAHUN : $tahun</center></div></div>";

if($req == "sda"){
    echo "<center><h3>POTENSI SUMBER DAYA ALAM</h3></center>";
    if($pilih == 1){
?>
<center>Pertanian Perkebunan dan Kehutanan</center><br/>
    <div class="masonry">
        <div class="item">
        <?php
            include "profil_desa/pertanian_perkebunan_kehutanan/kepemilikan_lahan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/pertanian_perkebunan_kehutanan/produktivitas_pertanian.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/pertanian_perkebunan_kehutanan/hasil_perkebunan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/pertanian_perkebunan_kehutanan/hasil_hutan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/pertanian_perkebunan_kehutanan/kondisi_hutan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/pertanian_perkebunan_kehutanan/dampak_pengolahan.php";
        ?>
        </div> 
        <div class='item'>
        <?php
            include "profil_desa/pertanian_perkebunan_kehutanan/mekanisme.php";
        ?>
        </div>
    </div>
<?php
    }
    else if($pilih == 2){
?>
<center>Peternakan dan Perikanan</center><br/>
    <div class="masonry">
        <div class="item">
        <?php
            include "profil_desa/peternakan_perikanan/populasi_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/peternakan_perikanan/produksi_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/peternakan_perikanan/pakan_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/peternakan_perikanan/hasil_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/peternakan_perikanan/pemeliharaan_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/peternakan_perikanan/alat_produksi.php";
         ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/peternakan_perikanan/sarana_produksi.php";
         ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/peternakan_perikanan/jenis_ikan.php";
        ?>
        </div>
        
        <div class='item'>
        <?php
            include "profil_desa/peternakan_perikanan/mekanisme.php";
        ?>
        </div>
    </div>
<?php
    }
    else{
?>
    <center>Sumber Daya Lain</center><br/>
    <div class="masonry">
        
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/jenis_bahan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/pemasaran_galian.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/potensi_air.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/sumber_air.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/sungai_rawa.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/pemanfaatan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/air_panas.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/kebisingan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/ruang_publik_taman.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sda/potensi_wisata.php";
        ?>
        </div>
        <div class='item'>
        <?php
            include "profil_desa/potensi_sda/kualitas_udara.php";
        ?>
        </div>
    </div>
<?php
    }
}
else if($req == "sdm"){
    echo "<center><h3>POTENSI SUMBER DAYA MANUSIA</h3></center><br/>";
?>
<div class="masonry">
        
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/kepadatan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/perkembangan_usia.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/tingkat_pendidikan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/mata_pencarian.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/aliran_kepercayaan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/kewarganegaraan.php";
       ?>
        </div>
        <div class="item">
        <?php

            include "profil_desa/potensi_sdm/etnis.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/cacat_mental.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/tenaga_kerja.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sdm/kualitas_angker.php";
        ?>
        </div>
    </div>
<?php
}
else if($req == "sarpras"){
    echo "<center><h3>POTENSI PRASARANA DAN SARANA BAG 1</h3></center><br/>";
?>
<div class="masonry">
        
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/sarpras_pemerintah_desa.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/sarpras_pemerintah_badan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/sarpras_pemerintah_dusun.php";
       ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/sarpras_lembaga.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/sarpras_kesehatan.php";
        ?>
        </div>
    </div>
<?php
}
else if($req == "sarpras2"){
    echo "<center><h3>POTENSI PRASARANA DAN SARANA BAG 2</h3></center><br/>";
?>
<div class="masonry">
        
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_darat.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/sarana_darat.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/sarpras_laut.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_udara.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/sarpras_kebersihan.php";
        ?>
        </div>
        <div class="item">
        <?php

            include "profil_desa/potensi_sarpras/sarpras_pendidikan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_kominfo.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_air.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_irigasi.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_peribadatan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_olga.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_energi.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/potensi_sarpras/prasarana_hiburan.php";
        ?>
        </div>
    </div>
<?php
}
else if($req == "le"){
    echo "<center><h3>LEMBAGA EKONOMI</h3></center><br/>";
?>
<div class="masonry">
        
        <div class="item">
        <?php
            include "profil_desa/lembaga_ekonomi/lembaga_ekonomi.php";
         ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/lembaga_ekonomi/jasa_pengangkutan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/lembaga_ekonomi/jasa_hiburan.php";
       ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/lembaga_ekonomi/jasa_perdagangan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/lembaga_ekonomi/jasa_gas.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/lembaga_ekonomi/jasa_keterampilan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/lembaga_ekonomi/jasa_hukum.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "profil_desa/lembaga_ekonomi/jasa_penginapan.php";
        ?>
        </div>
    </div>
<?php
}
else if($req == "mono"){
?>
<div class="masonry">
        
        <div class="item">
        <?php
            include "monografi/data_dasar.php";
         ?>
        </div>
        <div class="item">
        <?php
            include "monografi/data_umum.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "monografi/data_personil.php";
       ?>
        </div>
         <div class="item">
        <?php
            include "monografi/data_kewenangan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "monografi/data_keuangan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "monografi/data_kelembagaan.php";
        ?>
        </div>
       
        <div class="item">
        <?php
            include "monografi/data_trantib.php";
        ?>
        </div>
    </div>
<?php
}
else{
    echo "<script>history.back();</script>";
}

?>
<link rel="stylesheet" type='text/css' href="../lib/css/table.main.css"/>
<style>
.heading{
   border-bottom:2px solid #000; 
    margin-bottom:10px;
}
.bborder{
    border-bottom:1px solid #000;
    margin-bottom:2px;
}
h1,h2,h3,h4{
    line-height:normal;
    margin:0;
}
</style>
