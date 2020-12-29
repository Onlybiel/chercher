<?php  
require '../check.php';

?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Localizar IP</title>

<link rel="shortcut icon" href="icon.png" type="image/x-png"/>
<link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.css">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

				
<body style="
background: url(files/img.jpg) no-repeat center center fixed; 
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;">
<form method="POST">
<center>
<br>
<br>


<div align="center"><textarea type="text" name="bin" rows="1" class="form-control" placeholder="Exemplo : 181.125.22.125" style="width:50%"></textarea>
            <br />
            <center>
<input type="submit" class="btn btn-success" value="Localizar" style="width:30%;" name="enviar" />
</center>	
</form>
</body>
</html>
<?php
 error_reporting(0);
 if ($_POST['bin']) {
$ccbin =  substr($_POST['bin'], 0, 17);
		$sitedechecarabin = file_get_contents("http://ip-api.com/json/".$ccbin);
		
		$bin1 = explode('{"as":"', $sitedechecarabin);
		$bin2 = explode('",',$bin1[1]);
		$bin = $bin2[0];
		$banco1 = explode('"region":"', $sitedechecarabin);
		$banco2 = explode('",',$banco1[1]);
		$banco = $banco2[0];
		$reg1 = explode('"regionName":"', $sitedechecarabin);
		$reg2 = explode('",',$reg1[1]);
		$reg = $reg2[0];
		$tipodecc1 = explode('"country":"', $sitedechecarabin);
		$tipodecc2 = explode('",',$tipodecc1[1]);
		$tipodecc = $tipodecc2[0];
		$city1 = explode('"city":"', $sitedechecarabin);
		$city2 = explode('",',$city1[1]);
		$city = $city2[0];
		$net1 = explode('"isp":"', $sitedechecarabin);
		$net2 = explode('",',$net1[1]);
		$net = $net2[0];
		$categoria1 = explode('"isp":"', $sitedechecarabin);
		$categoria2 = explode('",',$categoria1[1]);
		$categoria = $categoria2[0];
		$pais1 = explode('"country_name":"', $sitedechecarabin);
		$pais2 = explode('",',$pais1[1]);
		$pais = $pais2[0];
		$bandeira1 = explode('"query":"', $sitedechecarabin);
		$bandeira2 = explode('",',$bandeira1[1]);
		$bandeira = $bandeira2[0];
		$bandeira = strtoupper($bandeira);
		
		$infos = "[".$bandeira." | ".$banco." | ".$city." | ".$reg." | ".$pais." | ".$tipodecc." | ".$net."]";
            $binchecker = " <b style=\"color:white\">IP: <b style=\"color:blue\">".$bandeira." <b style=\"color:white\"><br> CIDADE: <b style=\"color:blue\">".$city."<b style=\"color:white\"><br> ESTADO:<b style=\"color:blue\">".$reg."-".$banco."<b style=\"color:white\"><br> PAIS: <b style=\"color:blue\">".$pais." ".$tipodecc." <br><b style=\"color:white\">PROVEDOR: <b style=\"color:blue\">".$net.". <br><b style=\"color:yellow\"> #BLACKSTAR</b> ";

            echo "</b><br><br><center>".$binchecker."</center>";

   }else{}
?>
<?php

include("bawue.php")

?>