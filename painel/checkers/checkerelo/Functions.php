<?php

namespace CHECKER\API\FUNCTIONS;

 use fopen;
   use fwrite;

class Functions{

    private static function randomProxyFile($List){
      $_List = file($List, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      return $_List[array_rand($_List)];
    }
#--
    public static function valueID($data, $id){
      $value = false;
      preg_match_all("~<(.*?)>~", $data, $_lines);
      foreach($_lines[0] as $line):
        if(strpos($line, $id)):
          preg_match('/value="(.*)"/', $line, $value);
        endif;
      endforeach;
      return $value[1];
    }
#--
    public static function PROXY_LUMINATI($TYPE=NULL){
    
      $FILE_CONTENT=file_get_contents("../../../ApiProxy_LUMINATI.php");
      
        $IP=SELF::value($FILE_CONTENT, 'LINK:', ';');
       
          $USERNAME=SELF::value($FILE_CONTENT, "USUARIO:", ";");
      
            $PASSWORD=SELF::value($FILE_CONTENT, "SENHA:", ";");
      
          $COUNTRY=SELF::value($FILE_CONTENT, "PAIS:", ";");
      
        $PROXYUSERPWD=$USERNAME."-country-".$COUNTRY."-session-".mt_rand().":".$PASSWORD;
        
      if($TYPE=="COMUM"):
      
        $PORT=22225;
          $SESSION=mt_rand();
            $LINK='zproxy.lum-superproxy.io';
          $PROXYUSERPWD="$USERNAME-country-br-session-".$SESSION.":$PASSWORD";
      
        return[
        
          "IP" => $LINK.":".$PORT,
        
            "PROXYUSERPWD" => $PROXYUSERPWD
        
        ];
      
      else:

        return[
        
          "IP" => $IP,
      
            "PROXYUSERPWD" => $PROXYUSERPWD
        
      ];
    endif;
    }
#--
  public static function PROXY_SMARTPROXY(){
  
    $FILE_CONTENT=file_get_contents("../../../ApiProxy_SMARTPROXY.php");
    
      $IP=SELF::value($FILE_CONTENT, 'LINK:', ';');
     
        $USERNAME=SELF::value($FILE_CONTENT, "USUARIO:", ";");
    
          $PASSWORD=SELF::value($FILE_CONTENT, "SENHA:", ";");
    
        $COUNTRY=SELF::value($FILE_CONTENT, "PAIS:", ";");
    
      $PROXYUSERPWD=$USERNAME.":".$PASSWORD;
  
    return [
    "IP" => $COUNTRY.".".$IP,
    
      "PROXYUSERPWD" => $PROXYUSERPWD
    
    ];
  }
#--
  public function DelCOOKIE($NAME){
  
      if(file_exists(getcwd().$NAME)):
  
        unlink(getcwd().$NAME);
    
    endif;
  
  }
#--
  public static function PROXY_GIMMEPROXY(){
    $FILE_CONTENT=file_get_contents("../../../ApiProxy_GIMMEPROXY.php");
        
      $LINK=SELF::value($FILE_CONTENT, "LINK:", ";");
      
        $OBJECT=file_get_contents($LINK);
        
          $LINK=json_decode($OBJECT)->ipPort;
        
      return [
        "LINK" => $LINK,
          
          "PROXYUSERPWD" => null
      ];
  }
#--
    public static function GET_METHOD_USE(){
      $LINES_POST = count($_POST);
      $LINES_GET = count($_GET);
        if($LINES_GET > $LINES_POST):
          $Array = ["USE" => "GET"];
        elseif($LINES_POST > $LINES_GET):
          $Array = ["USE" => "POST"];
        endif;
          return $Array;
    }
#--
    public static function value($string, $start, $end){
      return explode($end, explode($start, $string)[1])[0];
    }
#--
    public static function GENMAIL(){
      return "lotus.".substr(md5(uniqid("")),0,8)."%40gmail.com";
    }
#--
  public static function SGET($URL){
$CH=curl_init();
  $OPTIONS = [
    CURLOPT_URL => $URL,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_COOKIESESSION => 0,
    CURLOPT_COOKIEJAR => getcwd().'/biscoito.txt',
    CURLOPT_COOKIEFILE => getcwd().'/biscoito.txt',
    CURLOPT_ENCODING => 'gzip, deflate, br',
    CURLOPT_HEADER => 0
  ];
  curl_setopt_array($CH, $OPTIONS);
#--
  RETURN $BODY=(!empty($CH)) ? curl_exec($CH) : NULL;
  }
}