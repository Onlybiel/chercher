<?php
//Incluindo o arquivo que contém a função sendNvpRequest
require_once 'sendNvpRequest.php';

//Incluindo o arquivo que contém as credenciais e endpoints da API
require_once 'configure.php';

$token = 'VALOR-DO-TOKEN';
$payerid = 'ID-DO-COMPRADOR';

//Campos da requisição da operação DoExpressCheckoutPayment
$requestNvp = array(
    'USER' => $user,
    'PWD' => $pswd,
    'SIGNATURE' => $signature,
 
    'VERSION' => '108.0',
    'METHOD'=> 'DoExpressCheckoutPayment',

    'TOKEN' => $token,
    'PAYERID' => $payerid,

    'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
    'PAYMENTREQUEST_0_AMT' => '22.00',
    'PAYMENTREQUEST_0_CURRENCYCODE' => 'BRL',
    'PAYMENTREQUEST_0_ITEMAMT' => '22.00',
    'PAYMENTREQUEST_0_INVNUM' => '1234',
 
    'L_PAYMENTREQUEST_0_NAME0' => 'Item A',
    'L_PAYMENTREQUEST_0_DESC0' => 'Produto A – 110V',
    'L_PAYMENTREQUEST_0_AMT0' => '11.00',
    'L_PAYMENTREQUEST_0_QTY0' => '1',
    'L_PAYMENTREQUEST_0_ITEMAMT' => '11.00',
    'L_PAYMENTREQUEST_0_NAME1' => 'Item B',
    'L_PAYMENTREQUEST_0_DESC1' => 'Produto B – 220V',
    'L_PAYMENTREQUEST_0_AMT1' => '11.00',
    'L_PAYMENTREQUEST_0_QTY1' => '1',
);
 
//Envia a requisição e obtém a resposta da PayPal
$responseNvp = sendNvpRequest($requestNvp, $sandbox);

echo 'O ID da transação é: ' . $responseNvp['PAYMENTINFO_0_TRANSACTIONID'];
