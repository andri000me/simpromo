<?php
session_start();
include "../config/koneksi2.php";
if(isset($_POST['lebet'])){
    $user = mysql_real_escape_string(trim($_POST['nami']));
    $pass = mysql_real_escape_string(trim($_POST['konci']));
    
    if($user == "" || $pass == ""){
        echo "<script>alert('Field tidak boleh kosong !');window.location='login.php';</script>";
    }
    else{
        $str = "ABCDEFGH123456789";
        $password = md5($str.md5($pass).md5($str));
        $s = mysql_query("select * from tbakun where username = '$user' and password = '$password'");
        $r = mysql_num_rows($s);
        
        if($r == 0){
            echo "<script>alert('Maaf, Username atau Password yang anda masukan salah !');window.location='login.php';</script>";
        }
        else{
            $d =  mysql_fetch_array($s);
            $_SESSION['nami'] = $d['username'];
            $_SESSION['nomor'] = $d['id'];
            header("location:index.php");
        }
    }
}

?>
<link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css"/>
<style>
body{
    background:#ecf0f1;
    margin-top:10%;
}
.panel-title{
    color:#27ae60;
    font-size:1.5em;
    text-align:center;
}
</style>
<title>ADMINISTRATOR LOGIN (PROMODES)</title>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">ADMINISTRATOR</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form method = "post" accept-charset="UTF-8" role="form">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Username" name="nami" type="text" required/>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="konci" type="password" value="" required/>
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" name='lebet' type="submit" value="Masuk">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>