<?php
include "../config/koneksi2.php";
include "../functions/bulanIndo.php";

$s = mysql_query("select * from tbakun where id='1'");
$d = mysql_fetch_array($s);
if($d['desa'] == ""){
    $desa = "";
}
else{
    $desa = " Desa ".$d['desa'];
}
$req = $_GET['req'];
include "header.php";
if($req == "sda"){
    $m = "sda";
    echo "<h2>POTENSI SUMBER DAYA ALAM</h2>";
    echo "<div class='row'><div class='col-md-6'><select id='sda'>
                <option value=''>- Pilih Potensi -</option>
                <option value='1'>Pertanian, Perkebunan dan Kehutanan</option>
                <option value='2'>Peternakan dan Perikanan</option>
                <option value='3'>Sumber Daya lainnya</option>
            </select>
            Pilih Tahun : <select id='tahun'>
            </select></div><div class='col-md-6' style='text-align:right;'><button class='btn btn-success' id='pr'>Print</button></div></div>";
?>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $sda = $("#sda");
    $tampil = $("#tampil");
    
    $pr = $("#pr");
    $pr.click(function(){
        window.open('action.php?req=sda&pilih='+$sda.val()+'&tahun='+$tahun.val(),'_blank');
    });
    //show tahun
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        if(i == y){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
	
	$sda.change(function(){
		if($sda.val() == 1){
			$.ajax({
				url:'profil_desa/pertanian_perkebunan_kehutanan.php',
				type:'GET',
				data:{tahun:$tahun.val()},
				success:function(data){
					if(data != ''){
                        $tampil.hide();
						$tampil.html(data).slideDown();
					}
				}
			});
		}
        else if($sda.val() == 2){
            $.ajax({
				url:'profil_desa/peternakan_perikanan.php',
				type:'GET',
				data:{tahun:$tahun.val()},
				success:function(data){
					if(data != ''){
                        $tampil.hide();
						$tampil.html(data).slideDown();
					}
				}
			});
        }
        else if($sda.val() == 3){
            $.ajax({
				url:'profil_desa/potensi_sda.php',
				type:'GET',
				data:{tahun:$tahun.val()},
				success:function(data){
					if(data != ''){
                        $tampil.hide();
						$tampil.html(data).slideDown();
					}
				}
			});
        }
        else{
            $tampil.hide();
        }
	});
    $tahun.change(function(){
        if($sda.val() == 1){
			$.ajax({
				url:'profil_desa/pertanian_perkebunan_kehutanan.php',
				type:'GET',
				data:{tahun:$tahun.val()},
				success:function(data){
					if(data != ''){
                        $tampil.hide();
						$tampil.html(data).slideDown();
					}
				}
			});
		}
        else if($sda.val() == 2){
            $.ajax({
				url:'profil_desa/peternakan_perikanan.php',
				type:'GET',
				data:{tahun:$tahun.val()},
				success:function(data){
					if(data != ''){
                        $tampil.hide();
						$tampil.html(data).slideDown();
					}
				}
			});
        }
        else if($sda.val() == 3){
            $.ajax({
				url:'profil_desa/potensi_sda.php',
				type:'GET',
				data:{tahun:$tahun.val()},
				success:function(data){
					if(data != ''){
                        $tampil.hide();
						$tampil.html(data).slideDown();
					}
				}
			});
        }
        else{
            $tampil.hide();
        }
    });
    
});
</script>
<?php
}
else if($req == "sdm"){
    echo "<h2>POTENSI SUMBER DAYA MANUSIA</h2>";
    echo "<div class='row'><div class='col-md-6'>Pilih Tahun : <select id='tahun'>
            </select></div><div class='col-md-6' style='text-align:right;'><button class='btn btn-success' id='pr'>Print</button></div></div>";
?>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $tampil = $("#tampil");
    
    $pr = $("#pr");
    $pr.click(function(){
        window.open('action.php?req=sdm&tahun='+$tahun.val(),'_blank');
    });
    //show tahun
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        if(i == y){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    $tahun.change(function(){
        $.ajax({
            url:'profil_desa/potensi_sdm.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
    });
    $.ajax({
            url:'profil_desa/potensi_sdm.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
});
</script>
<?php
}
else if($req == "sarpras"){
    echo "<h2>POTENSI PRASARANA DAN SARANA BAG 1</h2>";
    echo "<div class='row'><div class='col-md-6'>Pilih Tahun : <select id='tahun'>
            </select></div><div class='col-md-6' style='text-align:right;'><button class='btn btn-success' id='pr'>Print</button></div></div>";
?>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $tampil = $("#tampil");
    
    $pr = $("#pr");
    $pr.click(function(){
        window.open('action.php?req=sarpras&tahun='+$tahun.val(),'_blank');
    });
    //show tahun
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        if(i == y){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    $tahun.change(function(){
        $.ajax({
            url:'profil_desa/potensi_sarpras.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
    });
    $.ajax({
            url:'profil_desa/potensi_sarpras.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
});
</script>
<?php
}
else if($req == "sarpras2"){
    echo "<h2>POTENSI PRASARANA DAN SARANA BAG 2</h2>";
    echo "<div class='row'><div class='col-md-6'>Pilih Tahun : <select id='tahun'>
            </select></div><div class='col-md-6' style='text-align:right;'><button class='btn btn-success' id='pr'>Print</button></div></div>";
?>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $tampil = $("#tampil");
    
    $pr = $("#pr");
    $pr.click(function(){
        window.open('action.php?req=sarpras2&tahun='+$tahun.val(),'_blank');
    });
    //show tahun
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        if(i == y){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    $tahun.change(function(){
        $.ajax({
            url:'profil_desa/potensi_sarpras2.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
    });
    $.ajax({
            url:'profil_desa/potensi_sarpras2.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
});
</script>
<?php
}
else if($req == "le"){
echo "<h2>LEMBAGA EKONOMI</h2>";
    echo "<div class='row'><div class='col-md-6'>Pilih Tahun : <select id='tahun'>
            </select></div><div class='col-md-6' style='text-align:right;'><button class='btn btn-success' id='pr'>Print</button></div></div>";
?>
<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $tampil = $("#tampil");
    
    $pr = $("#pr");
    $pr.click(function(){
        window.open('action.php?req=le&tahun='+$tahun.val(),'_blank');
    });
    //show tahun
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        if(i == y){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    $tahun.change(function(){
        $.ajax({
            url:'profil_desa/lembaga_ekonomi.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
    });
    $.ajax({
            url:'profil_desa/lembaga_ekonomi.php',
            type:'GET',
            data:{tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
});
</script>
<?php
}
else if($req == "mono"){
echo "<h2>MONOGRAFI DESA</h2>";
?>
<div class='row'><div class='col-md-6'>Lihat Data : <select name='bulan' id='bulan'>
<?php
  for($i = 1;$i<=12;$i++){
      if(date('m') == $i){
        echo "<option value='$i' selected>".getBulan($i)."</option>";
      }
      else{
        echo "<option value='$i'>".getBulan($i)."</option>";  
      }
  }  
?>
</select>
<?php
    echo "<select id='tahun'>
            </select></div><div class='col-md-6' style='text-align:right;'><button class='btn btn-success' id='pr'>Print</button></div></div>";
?>

<script type="text/javascript">
$(document).ready(function(){
    $tahun = $("#tahun");
    $bulan = $("#bulan");
    $tampil = $("#tampil");
    
    $pr = $("#pr");
    $pr.click(function(){
        window.open('action.php?req=mono&bulan='+$bulan.val()+'&tahun='+$tahun.val(),'_blank');
    });
    //show tahun
    var d = new Date();
    var y = d.getFullYear();
    for(var i = y;i >= 2014;i--){
        if(i == y){
            $tahun.append("<option value='"+i+"' selected>"+i+"</option>");
        }
        else{
            $tahun.append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    $bulan.change(function(){
        $.ajax({
            url:'monografi/index.php',
            type:'GET',
            data:{bulan:$bulan.val(),tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
    });
    $tahun.change(function(){
        $.ajax({
            url:'monografi/index.php',
            type:'GET',
            data:{bulan:$bulan.val(),tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
    });
    $.ajax({
            url:'monografi/index.php',
            type:'GET',
            data:{bulan:$bulan.val(),tahun:$tahun.val()},
            success:function(data){
                if(data != ''){
                    $tampil.hide();
                    $tampil.html(data).slideDown();
                }
            }
        });
});
</script>
<?php    
}
else{
?>
    <div class='row'>
            <div class='col-md-5'>
              <img class="media-object" src="../lib/img/papan.png" alt="Papan"/>
          </div>
          <div class="col-md-7">
            <h1>PROMODES<?php echo $desa; ?></h1>
            <p>Selamat datang di PROMODES (Papan Profil dan Monografi Desa).<br/>Untuk melihat Papan silahkan gunakan menu di atas.<br/><br/>
              - Profil Desa dibuat sesuai dengan Permendagri No. 22 Tahun 2007<br/>
            - Monografi Desa dibuat sesuai dengan Permendagri No. 13 Tahun 2012</p>
          </div>
        </div>
<?php
}
echo "<br/><br/>
<div id='tampil' style='display:none;'></div>";
include "footer.php";
?>
<link rel="stylesheet" type='text/css' href="../lib/css/table.main.css"/>