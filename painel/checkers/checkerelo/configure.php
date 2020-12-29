<?php
//Vai usar o Sandbox, ou produção?
$sandbox = false;
 
//Baseado no ambiente, sandbox ou produção, definimos as credenciais
//e URLs da API.
if ($sandbox) {
    //credenciais da API para o Sandbox
    $user = 'carlossiqueira1504_api1.outlook.com';
    $pswd = 'LQCKAHP4KB5LYC63';
    $signature = 'AsIIUR8wSJg05fzKXTUCO0atWD0kAeE7gQqmVKMefidPGgez2F9PBiRI';
 
    //URL da PayPal para redirecionamento, não deve ser modificada
    $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
} else {
    //credenciais da API para produção
    $user = 'choraodevxit_api1.hotmail.com';
    $pswd = 'C8MDWCZGYUR4M72G';
    $signature = 'ApV.TKg645AF013D4.ZnodnMmCm-AU60qrvtW.jqc78W6ehW23oKQcyq';
 
    //URL da PayPal para redirecionamento, não deve ser modificada
    $paypalURL = 'https://www.paypal.com/cgi-bin/webscr';
}
