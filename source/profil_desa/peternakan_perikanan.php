<?php
include "../../config/koneksi2.php";
$tahun = abs((int)$_GET['id']);
?>


    <div class="masonry">
        <div class="item">
        <?php
            include "peternakan_perikanan/populasi_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "peternakan_perikanan/produksi_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "peternakan_perikanan/pakan_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "peternakan_perikanan/hasil_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "peternakan_perikanan/pemeliharaan_ternak.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "peternakan_perikanan/alat_produksi.php";
         ?>
        </div>
        <div class="item">
        <?php
            include "peternakan_perikanan/sarana_produksi.php";
         ?>
        </div>
        <div class="item">
        <?php
            include "peternakan_perikanan/jenis_ikan.php";
        ?>
        </div>
        
        <div class='item'>
        <?php
            include "peternakan_perikanan/mekanisme.php";
        ?>
        </div>
    </div>
