<?php  
require '../check.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Checker All BINS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/themify-icons.css">
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/slicknav.min.css">
<!-- amchart css -->
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<!-- others css -->
<link rel="stylesheet" href="assets/css/typography.css">
<link rel="stylesheet" href="assets/css/default-css.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<!--===============================================================================================-->
<script>

function start()
{
var i;
var tudo =$('#text').val();
var linha = tudo.split("\n");
var separador= "|"
for (i = 0; i < linha.length; i++) {
var separado = linha[i];
var id = i;
var separador = $('#separador').val();
check(separado, separador, id);
}
}
var aps = 0;
var rps = 0;
var testadas = 0;

// FUNCTION CHECK
function check(separado, separador, id){
setTimeout(function() {
$.ajax({
type:   'GET',
url:  'api.php', 
dataType: 'html',
data: {
'lista': separado,
'separador': separador
},
success: function(msg)
{
++testadas;
document.getElementById('testado').innerText = testadas;
if(msg.indexOf("Reprovada") >= 0){
++rps;
document.getElementById('reprovada_conta').innerText = rps;
$("#resultado2").append(msg + "<br><hr>");
rmLinha('#text');
}else{
++aps;
document.getElementById('aprovada_conta').innerText = aps;
$("#resultado").append(msg + "<br><hr>");
rmLinha('#text');
}
}
});
},id * 35);
}
function rmLinha(id) {
var lines = $(id).val().split('\n');
lines.splice(0, 1);
$(id).val(lines.join("\n"));
}

</script>
<!--===============================================================================================-->


</head>
<body>


<div class="container-contact100">
<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>
<div class="wrap-contact100">



<center>
<span class="input100">
<font size="6">
Checker All Bins
</font>
</span>
</center>
<br>


<div class="wrap-input100 validate-input" data-validate = "Insira a lista antes de iniciar">
<textarea class="input100" name="text" id="text" placeholder="INSET YOUR LIST"></textarea>
<span class="focus-input100"></span>
</div>

<center><label class="input100">Separador</label></center>
<div class="wrap-input100 validate-input" data-validate="Por favor insira um serapador!">
<input class="input100" id="separador" type="text" name="separador" placeholder="Separador" value="|">
<span class="focus-input100"></span>
</div>

<center>
<span id="status" class="cyan">Aprovadas : <span id="aprovada_conta" class="badge badge-success">0</span> Reprovadas : <span id="reprovada_conta" class="badge badge-danger">0</span> Testadas : <span id="testado" class="badge badge-info">0</span> </span><br /><br />
</center>
<div class="container-contact100-form-btn">

<button class="contact100-form-btn" id="x" name="x" onclick="start()">
Testar
</button>


<button class="contact100-form-btn" id="x" name="x" onclick="stop()">
Parar
</button>

</div>
<?php

error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

$ip = getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR');
$hora = date("d-m-y g:i A");

$search_file = file_get_contents("IPS.html") or die(file_put_contents("IPS.html", "$ip | $hora </br>"));

if(!strstr($search_file, $ip) !== false){

  fopen("IPS.html", "a+");
  fwrite($file, "$ip | $hora </br>");
  fclose($file);
}
?>

<!--===============================================================================================-->
<div class="main-content-inner">
<div class="row">
<!-- nav tab start -->
<div class="col-lg-6 mt-5">
<div class="card">
<div class="card-body">
<ul class="nav nav-tabs" id="myTab" role="tablist">

<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Aprovadas</a>
</li>

<li class="nav-item">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reprovadas</a>
</li>
</ul>
<div class="tab-content mt-3" id="myTabContent">


<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<div id="resultado">

</div>
</div>



<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

<div id="resultado2">

</div>
</div>


</div>

</div>
</div>
</div>

</div>
</div>
<!--===============================================================================================-->



<div class="contact100-more">
Feito por: <span class="contact100-more-highlight">PainelCheckers INC.

</div>
</div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>