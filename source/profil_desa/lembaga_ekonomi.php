<?php
include "../../config/koneksi2.php";
$tahun = abs((int)$_GET['id']);
?>

    <div class="masonry">
        
        <div class="item">
        <?php
            include "lembaga_ekonomi/lembaga_ekonomi.php";
         ?>
        </div>
        <div class="item">
        <?php
            include "lembaga_ekonomi/jasa_pengangkutan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "lembaga_ekonomi/jasa_hiburan.php";
       ?>
        </div>
        <div class="item">
        <?php
            include "lembaga_ekonomi/jasa_perdagangan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "lembaga_ekonomi/jasa_gas.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "lembaga_ekonomi/jasa_keterampilan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "lembaga_ekonomi/jasa_hukum.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "lembaga_ekonomi/jasa_penginapan.php";
        ?>
        </div>
    </div>
