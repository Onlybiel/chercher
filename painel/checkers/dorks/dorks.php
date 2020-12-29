<?php  
require '../check.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<center>
    <title>Gerador de Dorks</title>
	<style type="text/css">
		body {
    background: #C33764;
    /* fallback for old browsers */
    
    background: -webkit-linear-gradient(to right, #de6262, #ffb88c);
    /* Chrome 10-25, Safari 5.1-6 */
    
    background: linear-gradient(to right, #de6262, #ffb88c);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    
    overflow: auto;

    font-family: "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: #EBEBEB;
  }
		h1 {
			font-family: "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
			color: white;
			font-size: 15pt;
			text-shadow: black 0 0 5px;
		}
		h3 {
			font-family: "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
			color: white;
			font-weight: 400;
            line-height: 1.5;
            color: #EBEBEB;
		}
		p {
			font-family: "Poiret One";
			color: white;
			font-size: 25pt;
			text-shadow: black 0 0 5px;
		}

textarea.panel-primary {
    display: inline-block;
    filter: alpha(opacity=50);
    opacity: 0.5;
    -moz-opacity: 0.5;
    -webkit-opacity: 0.5;
}
textarea {
    overflow: auto;
    resize: vertical;
}
.btn-primary {
    color: #fff;
    background-color: #DF691A;
    border-color: #DF691A;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0;
    -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}

.btn-primary2 {
    color: #fff;
    background-color: #5b86e5;
    border-color: #5b86e5;
}
.btn2 {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0;
    -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
	</style>
	<body style="
background: url(files/img.jpg) no-repeat center center fixed; 
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;">
        <form action="" method="post">
		<h3><center>*Gerador de dorks*<br></center></h3>
		<h1><center>#PainelCheckers </center></h1>
		<h1><center>Numero de dorks: </center></h1>
        
	<textarea class="panel panel-primary" id="text" name="text" cols="20" rows="2" maxlength="2" style="color: black;"></textarea><br><br>
	<input type="submit" class="btn btn-primary btn-xs" name="att" value="Gerar">
	
</form> 
</center>
</body>
</html>
<?php

error_reporting(0);

if(isset($_POST['att'])){

$quant = $_POST['text'];

//Palavras Chave
$name = array('pagina','index','carrinho','cadastro','login','produto','detalhes','loja','pagamento','pagar','formas-de-pagamento','produtos-detalhes','categoria','colunas','noticias','emprego','galerias','produtos_ver','home','detalhesproduto','viagem','revista','tempo','imoveis','comprar','visualizar','restaurante','roupas','hoteis','exibirmarca','evento_detalhe','boutique', 'shopping'); 
$params = array('id','cat');


for ($i=0; $i < $quant; $i++) {
	$dork = 'inurl: '.$name[rand(0, count($name))].'.php?'.$params[rand(0, 2)].'=';
	echo '<center>'.$dork.' <br>';
}

}


?>
