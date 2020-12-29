<?php  
require '../check.php';

?>
<?php
//by BlackStar©

  error_reporting(0);
  function Tokarev($string,$start,$end){

  $str = explode($start,$string);

  $str = explode($end,$str[1]);

  return $str[0];
  }
  
  $cpf = @$_POST["cpf"]; 
          

        $conteudo = xml_parser_create();
    xml_parse_into_struct($conteudo, file_get_contents("http://cep.republicavirtual.com.br/web_cep.php?cep=$cpf&format=query_string"), $valores, $conteudo1);
        
      $uf = $valores[5]['value'];
      $cidade = $valores[7]['value'];
      $bairro = $valores[9]['value'];
      $tipo = $valores[11]['value'];
      $nome = $valores[13]['value'];
        
        
            
  curl_close($ch);

?>




<!DOCTYPE html>
<html>

<head>
  <title>Consulta CEP</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.css">
<link rel="shortcut icon" href="icon.png" type="image/x-png"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div align="center">
<h1><font color="black">Consulta de CEP</font></h1>
<h3><font color="black">#PainelCheckers</font></h3>

  <form method="post" action="">
    <div align="center"><input name="cpf" rows="1" class="form-control" placeholder="00000-000" autocomplete="off" style="width:20%" value=""/><p><p>
    <input type="submit" id="enviar" name="enviar" class="btn btn-danger" value="Consultar"/><br><br>
  </div>
  </form>

  <table class="table table-striped" id="tabAprovadas" name="tabAprovadas">
    <thead>
      <tr>
        <th><center>CEP</center></th>
        <th><center>Estado</center></th>
        <th><center>Cidade</center></th>
        <th><center>Bairro</center></th>
        <th><center>Tipo</center></th>
        <th><center>Rua</center></th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <th><center><?php echo $cpf; ?></center></th>
        <th><center><?php echo $uf; ?></center></th>
        <th><center><?php echo $cidade; ?></center></th>
        <th><center><?php echo $bairro; ?></center></th>
        <th><center><?php echo $tipo; ?></center></th>
        <th><center><?php echo $nome; ?></center></th>
      </tr>
    </tbody>
  </table>
</form>
</div>
</body>
</html>