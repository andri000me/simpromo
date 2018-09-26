<?php
include "../../config/koneksi2.php";
$tahun = abs((int)$_GET['id']);
?>

    <div class="masonry">
        
        <div class="item">
        <?php
            include "data_dasar.php";
         ?>
        </div>
        <div class="item">
        <?php
            include "data_umum.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "data_personil.php";
       ?>
        </div>
         <div class="item">
        <?php
            include "data_kewenangan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "data_keuangan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "data_kelembagaan.php";
        ?>
        </div>
       
        <div class="item">
        <?php
            include "data_trantib.php";
        ?>
        </div>
    </div>
