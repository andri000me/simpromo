<?php
include "../../config/koneksi2.php";
$tahun = abs((int)$_GET['id']);
?>

    <div class="masonry">
        <div class="item">
        <?php
            include "pertanian_perkebunan_kehutanan/kepemilikan_lahan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "pertanian_perkebunan_kehutanan/produktivitas_pertanian.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "pertanian_perkebunan_kehutanan/hasil_perkebunan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "pertanian_perkebunan_kehutanan/hasil_hutan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "pertanian_perkebunan_kehutanan/kondisi_hutan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "pertanian_perkebunan_kehutanan/dampak_pengolahan.php";
        ?>
        </div> 
        <div class='item'>
        <?php
            include "pertanian_perkebunan_kehutanan/mekanisme.php";
        ?>
        </div>
    </div>


