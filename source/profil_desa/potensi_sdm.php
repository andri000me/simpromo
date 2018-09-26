<?php
include "../../config/koneksi2.php";
$tahun = abs((int)$_GET['id']);
?>

    <div class="masonry">
        
        <div class="item">
        <?php
            include "potensi_sdm/kepadatan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sdm/perkembangan_usia.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sdm/tingkat_pendidikan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sdm/mata_pencarian.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sdm/aliran_kepercayaan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sdm/kewarganegaraan.php";
       ?>
        </div>
        <div class="item">
        <?php

            include "potensi_sdm/etnis.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sdm/cacat_mental.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sdm/tenaga_kerja.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sdm/kualitas_angker.php";
        ?>
        </div>
    </div>
