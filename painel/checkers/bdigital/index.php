<?php  
require '../check.php';

?>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
textarea:hover, input:hover, textarea:active, input:active, textarea:focus, input:focus {
        outline:0px !important;
    }
button:focus {outline:0;}

::-webkit-scrollbar {
    width: 5px;
}


::-webkit-scrollbar-track {
    background: black; 
}


::-webkit-scrollbar-thumb {
    background: blue; 
}


::-webkit-scrollbar-thumb:hover {
    background: blue; 
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
                            if(msg.indexOf("DIE") >= 0){
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
   <font size="7">Checker - Bilheteria Digital</font> <br />
   <font size="3" class="afs">#PainelCheckers</font>
   <br /><br />
      <textarea class="panel panel-primary" cols="90" rows="10" id="text" name="text" placeholder=" Email|Senha "></textarea>
      <br /><div class="afs">
           <font size="2">
                      <span id="status" class="cyan">Aprovadas : <span id="aprovada_conta" class="green">0</span> - Reprovadas : <span id="reprovada_conta" class="red">0</span> -Testadas : <span id="testado" class="check">0</span>             <br /><br />
            <button type="submit" id="x" name="x" class="btn btn-success" onclick="start()">Testar</button>
            <button type="submit" id="x" name="x" class="btn btn-danger" onclick="stop()">Parar</button>
<font></font>
 <br /><br />

<div class="test">
  <div class="espaco">

<div class="test2">

</div> 
</div>


 <textarea class="panel panel-primary" id="resultado" style="width: 527px; height: 195px;"></textarea>
 <textarea class="panel panel-primary" id="resultado2" style="width: 527px; height: 195px;"></textarea>
</center>
</body>
</html>
