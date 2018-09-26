<?php
include "../../config/koneksi2.php";
$tahun = abs((int)$_GET['id']);
?>

    <div class="masonry">
        
        <div class="item">
        <?php
            include "potensi_sarpras/sarpras_pemerintah_desa.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/sarpras_pemerintah_badan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/sarpras_pemerintah_dusun.php";
       ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/sarpras_lembaga.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/sarpras_kesehatan.php";
        ?>
        </div>
    </div>
