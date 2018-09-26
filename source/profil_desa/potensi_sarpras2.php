<?php
include "../../config/koneksi2.php";
$tahun = abs((int)$_GET['id']);
?>

    <div class="masonry">
        
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_darat.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/sarana_darat.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/sarpras_laut.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_udara.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/sarpras_kebersihan.php";
        ?>
        </div>
        <div class="item">
        <?php

            include "potensi_sarpras/sarpras_pendidikan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_kominfo.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_air.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_irigasi.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_peribadatan.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_olga.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_energi.php";
        ?>
        </div>
        <div class="item">
        <?php
            include "potensi_sarpras/prasarana_hiburan.php";
        ?>
        </div>
    </div>
