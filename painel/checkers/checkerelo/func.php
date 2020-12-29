<?php

function dadosgen(){
   
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
    
    return $dados1 = json_decode($dados, true);
}

function getStr($string, $start, $end)
{
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

function cctype($numero){
    $re = array(
        "visa" => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex" => "/^3[47][0-9]{13}$/",
        "diners" => "/^3(?:0[0-5]|[68][0-9])[0-9]{11}/",
        "discover" => "/^6(?:011|5[0-9]{2})[0-9]{12}/",
        "jcb" => "/^(?:2131|1800|35\d{3})\d{11}/",
        "elo" => "/^(40117[8-9]|431274|438935|451416|457393|45763[1-2]|506(699|7[0-6][0-9]|77[0-8])|509\d{3}|504175|627780|636297|636368|65003[1-3]|6500(3[5-9]|4[0-9]|5[0-1])|6504(0[5-9]|[1-3][0-9])|650(4[8-9][0-9]|5[0-2][0-9]|53[0-8])|6505(4[1-9]|[5-8][0-9]|9[0-8])|6507(0[0-9]|1[0-8])|65072[0-7]|6509(0[1-9]|1[0-9]|20)|6516(5[2-9]|[6-7][0-9])|6550([0-1][0-9]|2[1-9]|[3-4][0-9]|5[0-8]))/",
        'maestro' => '/^(?:5[0678]\d\d|6304|6390|67\d\d)\d{8,15}$/',
        'hipercard' => '/^(606282\d{10}(\d{3})?)|(3841\d{15})$/',
    );
    if (preg_match($re['visa'], $numero)) {
        $type = "VISA";
    } else
        if (preg_match($re['mastercard'], $numero)) {
        $type = "MASTERCARD";
    } else
        if (preg_match($re['amex'], $numero)) {
        $type = "AMEX";
    } else
        if (preg_match($re['discover'], $numero)) {
        $type = "DISCOVER";
    } else
        if (preg_match($re['diners'], $numero)) {
        $type = "DINERS";
    } else
        if (preg_match($re['jcb'], $numero)) {
        $type = "JCB";
    } else
        if (preg_match($re['elo'], $numero)) {
        $type = "ELO";
    } else
        if (preg_match($re['hipercard'], $numero)) {
        $type = "HIPERCARD";
    } else
        if (preg_match($re['maestro'], $numero)) {
        $type = "MAESTRO";
    } else {
        $type = "BANDEIRA DESCONHECIDA";
    }

    return $type;
}