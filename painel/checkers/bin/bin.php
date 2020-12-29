<?php  
require '../check.php';

?>
<?php
//by PandaOficial
// ALL RIGHTS RESERVED 2019

  error_reporting(0);
  function Tokarev($string,$start,$end){

  $str = explode($start,$string);

  $str = explode($end,$str[1]);

  return $str[0];
  }
  
$cc = $_POST['bin'];
        
  // by Fenrir
  if(isset($_POST['enviar'])){
  $script = $_POST['enviar'];
  $six = $_POST['bin'];
  // AQUI TA O CURL
  function curl($url, $var = null) {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_TIMEOUT, 25);
      if ($var != null) {
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
      }
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($curl);
      curl_close($curl);
      return $result;
  }
  // PEGAR 6 PRIMEIROS DIGITOS
  function defineNUM($bin) {
      return substr($bin,0,6);
  }

  function GetStr($string,$start,$end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

  // PARTE DO JSON
    $bin = defineNUM($six);
    $curl = curl("https://lookup.binlist.net/".$bin); // Obrigado a API =)
    $json = json_decode($curl);
    $brand = $json->scheme ? $json->scheme : "error";
    $cardType = $json->type ? $json->type : "error";

    $banco = GetStr($curl, '"bank":{"name":"','"');

    $countryName = $json->country ? $json->country : "error";
    $countryCode = $json->country ? $json->country : "error";
    $details = '<p>BIN: '.$bin.'</br>Brand: '.$brand.'</br>Type: '.$cardType.'</br>Country Name: '.$countryName->name.'</br>Country Code: '.$countryCode->alpha2.'</p>';
    
     if($banco == ""){ $banco = "N/A"; }
     if($cardType == "error"){ $cardType = "N/A"; }

    if ($six == null) {
    die('error!');

}


    $cbin = substr($six, 0,1);
if($cbin == "5"){
$cbin = "fa fa-cc-mastercard";
}else if($cbin == "4"){
$cbin = "fa fa-cc-visa";
}



    $binresult = $details;

}
?>




<!DOCTYPE html>
<html>

<head>
  <title>Bin Checker</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="../../css/plugins.css">


        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        
        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="../../css/themes.css">
        <!-- END Stylesheets -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div align="center">
<h1>Checker - BIN</h1>
<h1>#PainelCheckers©</h1>

  <form method="post" action="">
    <div align="center"><input name="bin" rows="1" class="form-control" placeholder="xxxxxx" autocomplete="off" style="width:20%" value=""/><p><p>
    <input type="submit" id="enviar" name="enviar" class="btn btn-danger" value="Consultar"/><br><br>
  </div>
  </form>

  <table class="table table-striped" id="tabAprovadas" name="tabAprovadas">
    <thead>
      <tr>
        <th><center>BIN</center></th>
        <th><center>Banco</center></th>
        <th><center>Bandeira</center></th>
        <th><center>Tipo</center></th>
        <th><center>País</center></th>
        <th><center>Codigo do país</center></th>

      </tr>
    </thead>
    <tbody>

      <tr>
        <th><center><?php echo $bin; ?></center></th>
        <th><center><?php echo $banco; ?></center></th>
        <th><center><?php echo '<i class="'.$cbin.'" aria-hidden="true"></i>'; ?></center></th>
        <th><center><?php echo $cardType; ?></center></th>
        <th><center><?php echo $countryName->name; ?></center></th>
        <th><center><?php echo $countryCode->alpha2; ?></center></th>
      </tr>
    </tbody>
  </table>
</form>
</div>
</body>
</html>