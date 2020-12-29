<?php
//Incluindo o arquivo que contém a função sendNvpRequest
require 'sendNvpRequest.php';

//Incluindo o arquivo que contém as credenciais e endpoints da API
require 'configure.php'; 
 
//Campos da requisição da operação SetExpressCheckout
$requestNvp = array(
    'USER' => $user,
    'PWD' => $pswd,
    'SIGNATURE' => $signature,
 
    'VERSION' => '108.0',
    'METHOD'=> 'SetExpressCheckout',
 
    'PAYMENTREQUEST_0_PAYMENTACTION' => 'Order',
    'PAYMENTREQUEST_0_AMT' => '20.00',
    'PAYMENTREQUEST_0_CURRENCYCODE' => 'BRL',
    'PAYMENTREQUEST_0_ITEMAMT' => '20.00',
    'PAYMENTREQUEST_0_INVNUM' => '1234',
 
    'RETURNURL' => 'http://localhost/retorno',
    'CANCELURL' => 'http://localhost/cancel'
);
 
//Envia a requisição e obtém a resposta da PayPal
$responseNvp = sendNvpRequest($requestNvp, $sandbox);
//print_R($responseNvp);
//die();
//Incluindo o arquivo responsável pelo redirecionamento
//require 'redirect.php';
