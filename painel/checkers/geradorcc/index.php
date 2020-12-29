<?php  
require '../check.php';

?>
<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml" hola_ext_inject="disabled"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Painel Checkers© Gerador De CC</title><meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"><meta name="description" content="Credit Card Generator.">
<meta name="keywords" content="namso,ccgen,ccgen online,namso online, card, cc, bin,generador tarjetas,tarjetas,generador, bin check, bin search, bin find, find bin, check bin, search bin, bank identification number, bin, iin, issuer identification number, check iin, find iin, search iin, iin check, iin search, iin find, bank, card search, card check, card find, merchant bin, merchant, bin lookup, bin checker, bin list, carding, carder, generate cc, namso, ccgen, credit card, infocc, bin, gerador de cartões de créditos, tarjetas, generator, darkside, checker cc, gerador, bins, gerar cc, mastercard, visa, amex, discover, diners club">
<meta name="author" content="PandaOficial">
<meta name="google" content="notranslate">
<meta name="og:description" content="Credit Card Generator.">
<meta name="og:url" content="https://darksidecc.com">
<meta name="og:title" content="DARKSIDE CCGen">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<meta name="og:image" content=""><meta name="theme-color" content="#2f323b">
<link rel="apple-touch-icon" sizes="120x120" href="https://darksidecc.com/">
<link rel="apple-touch-icon" sizes="152x152" href="./files/favicon.png">
<link rel="shortcut icon" href="./files/favicon.png">
<link href="./files/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./files/style.css">
<link rel="stylesheet" type="text/css" href="./files/font-awesome.min.css">
<script async="" src="./files/analytics.js"></script><script type="text/javascript" src="./files/jquery-1.11.2.min.js">
</script><script type="text/javascript" src="./files/f4k010999.js">
</script>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-81402023-1', 'auto');ga('send', 'pageview');</script>
</head>
<body onload="namsoG();" style="
background: url(files/img.jpg) no-repeat center center fixed; 
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;">
<header>
<br>
<section class="title"><img src="./files/favicon.png" alt="Icon"> Painel Checkers© </section><div class="hh-title">Gerador de Cartão</div></header><div class="hh-title"></div></header>
<br>
<br>
<form name="console" id="console" class="form-horizontal" role="form" method="POST">
	<div class="p"><div class="Ilabel"><i class="fa fa-gg"></i> Insira sua BIN</div><input type="text" class="input_text" id="ccpN" name="ccp" value="" style="width: 175px" placeholder="xxxx xxxx xxxx xxxx" maxlength="19"></div>
	<br>
	<select name="ccnsp" class="input_text" style="display:none;"><option selected="selected">Nenhum</option></select>
	<div class="p"><div class="Ilabel"><i class="fa fa-plus-square"></i> Incluir</div>		
	<div class="input_text s"><label>Data<input type="checkbox" id="ccexpdat" name="ccexpdat"></label>
	<label>CCV2<input type="checkbox" id="ccvi" name="ccvi"></label>
	<label>Tipo Banco<input type="checkbox" id="ccbank" name="ccbank"></label></div></div><br>
	<div class="p"><div class="Ilabel"><i class="fa fa-codepen"></i> Quantidade</div><input class="input_text" type="number" name="ccghm" style="width: 40px" maxlength="4" value="10"></div>
	<div class="p"><div class="Ilabel"><i class="fa fa-connectdevelop"></i> Formato</div>		<select name="ccoudatfmt" class="input_text"><option value="CHECKER" selected="selected">CHECKER</option><option value="CSV">CSV</option><option value="XML">XML</option><option value="JSON">JSON</option></select></div>
	<br><div class="p"><div class="Ilabel"><i class="fa fa-connectdevelop"></i> CCV2</div><input type="text" id="eccv" maxlength="4" style="width: 40px" value="rnd" class="input_text" name="eccv"></div>
	<div class="p"><div class="Ilabel"><i class="fa fa-calendar" aria-hidden="true"></i> Mês</div>	<select name="emeses" class="input_text"><option value="rnd">Rnd</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select></div>
	<div class="p"><div class="Ilabel"><i class="fa fa-calendar" aria-hidden="true"></i> Ano</div><select name="eyear" class="input_text"><option value="rnd">Rnd</option><option value="2016">16</option><option value="2017">17</option><option value="2018">18</option><option value="2019">19</option><option value="2020">20</option><option value="2021">21</option><option value="2022">22</option><option value="2023">23</option><option value="2024">24</option><option value="2025">25</option></select></div>
	<input type="hidden" name="tr" value="1000"><input type="hidden" name="L" style="width: 20px" value="1L"><br><br>	<a class="Lbutton" name="generar" id="generar"><i class="fa fa-code"></i> Gerar Cartões</a><br><br><center><div class="eighty">		<div><div class="clean" id="cleanText"></div></div>		<textarea class="textarea" name="output2" id="output2" rows="15" readonly=""></textarea></div></center><br></form><footer><i class="fa fa-credit-card-alt" aria-hidden="true"></i>
	<strong> Black Star© - CCGen 2.3 </strong><i class="fa fa-credit-card-alt" aria-hidden="true"></i><br><i class="fa fa-user-secret" aria-hidden="true"></i> Powered by <a href="http://t.me/centralblackstar"><font color="#00FFFF">Black Star©</font></a><br>©2019 Black Star©</footer><script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
	</body>
	</html>