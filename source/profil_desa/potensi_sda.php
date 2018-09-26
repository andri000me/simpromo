<?php
include "../../config/koneksi2.php";
$tahun = abs((int)$_GET['id']);
?>

    <div class="masonry">
        
        <div class="item">
        <?php
            include "potensi_sda/jenis_bahan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/pemasaran_galian.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/potensi_air.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/sumber_air.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/sungai_rawa.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/pemanfaatan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/air_panas.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/kebisingan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/ruang_publik_taman.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sda/potensi_wisata.php";
        ?>
        </div>
        <div class='item'>
        <?php
            include "potensi_sda/kualitas_udara.php";
        ?>
        </div>
    </div>
