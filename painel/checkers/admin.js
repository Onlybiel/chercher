function editar(i){
	var usuario = document.getElementById("usuario_" + i).value;
	var senha = document.getElementById("senha_" + i).value;
	var rank = document.getElementById("rank_" + i).value;
	var creditos =  document.getElementById("creditos_" + i).value;
    var foto =  document.getElementById("foto_" + i).value;
    document.getElementById("btn_save_" + i).disabled =  true;
	$.post("checkers/api-admin.php" , "action=editar&posição=" + i + "&usuario=" + usuario + "&senha=" + senha + "&rank=" + rank + "&creditos=" + creditos + "&foto=" + foto , function(data){
   document.getElementById("btn_save_" + i).disabled =  false;
   refresh("admin.php");
	});

}
function apagar(i){
	var usuario = document.getElementById("usuario_" + i).value;
	document.getElementById("btn_apagar_" + i).disabled =  true;

	$.post("checkers/api-admin.php" , "action=apagar&posição=" + i + "&usuario=" + usuario , function(data){
   document.getElementById("btn_apagar_" + i).disabled =  false;
   refresh("admin.php");

	});

}

function add_usuario(){
	var usuario = document.getElementById("usuario").value;
	var senha = document.getElementById("senha").value;
	var rank = document.getElementById("rank_").value;
	var creditos =  document.getElementById("creditos").value;
    var foto =  document.getElementById("foto").value;

    $.post("checkers/api-admin.php" , "action=add_usuario&usuario=" + usuario + "&senha=" + senha + "&rank=" + rank + "&creditos=" + creditos + "&foto=" + foto , function(data){

   refresh("admin.php");

    });
}

/* Seleciona o rank */
function rank(type , id){

 document.getElementById("rank_" + id).value = type;
 var btn = "btn_hank|" + id;
 document.getElementById(btn).innerHTML = type;
  
}

