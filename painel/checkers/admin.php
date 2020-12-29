<?php
error_reporting(0);
set_time_limit(0);
session_start();

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
$rank = $_SESSION['rank'];
$creditos = $_SESSION['creditos'];
$foto = $_SESSION['foto'];

if($rank  !== "Administrador"){
	echo "<center><h3>Voce nao tem permissão para acessar essa area</h3></center>";
die();
}

$arquivo_usuarios = "../../usuarios.txt";


$array = file($arquivo_usuarios);


if($_POST['action']){

}

function carregar_rank_dropdown($rank , $i){
	$rank = '
        <div class="btn-group">
         <button id="btn_hank|'.$i.'" type="button" class="btn btn-primary dropdown-toggle " data-toggle="dropdown" aria-expanded="false">'.$rank.'
                      <span class="caret"></span>
         </button>
 <ul class="dropdown-menu animate" aria-labelledby="exampleAnimationDropdown1" role="menu">
<li role="presentation"  ><a  href="javascript:rank(\'Administrador\' , \''.$i.'\')" role="menuitem" class=" waves-effect waves-classic " id="Administrador">Administrador</a></li>
<li role="presentation"  ><a  href="javascript:rank(\'Usuario Free\'  , \''.$i.'\')" role="menuitem" class=" waves-effect waves-classic " id="Usuario Free">Usuario Free</a></li>
<li role="presentation"  ><a  href="javascript:rank(\'Usuario Vip\'  , \''.$i.'\')" role="menuitem" class=" waves-effect waves-classic " id="Usuario Vip">Usuario Vip</a></li>
                    </ul>
            <input type="hidden" id="rank_'.$i.'" value="'.$rank.'">
                  </div>
                ';
                return $rank;
}


?>


<script src="checkers/admin.js"></script>
<h3>Painel de administração </h3>


              <table class="table table-striped">
                <thead>
                  <tr>
                    <td>ID</td>
                    <td>Usuario</td>
                    <td>Senha</td>
                    <td>Rank</td>
                    <td>Creditos</td>
                    <td>Fotos</td>
                    <td>Editar Usuario</td>
                    <td>Apagar Usuario</td>
                  </tr>
                </thead>
            <tbody>
<tr>
<td><input type="text" class="form-control has-value" readonly="" id="id" placeholder="" value="Auto"></td>
<td><input type="text" class="form-control has-value" id="usuario" placeholder="Usuario" value=""></td>
<td><input type="text" class="form-control has-value" id="senha" placeholder="Senha" value=""></td>


<td>
<div class="btn-group">
<button id="btn_hank|" type="button" class="btn btn-primary dropdown-toggle " data-toggle="dropdown" aria-expanded="false">Administrador
<span class="caret"></span>
</button>
 <ul class="dropdown-menu animate" aria-labelledby="exampleAnimationDropdown1" role="menu">
<li role="presentation"  ><a  href="javascript:rank('Administrador' , '' )" role="menuitem" class=" waves-effect waves-classic " id="Administrador">Administrador</a></li>
<li role="presentation"  ><a  href="javascript:rank('Usuario Free'  , '' )" role="menuitem" class=" waves-effect waves-classic " id="Usuario Free">Usuario Free</a></li>
<li role="presentation"  ><a  href="javascript:rank('Usuario Vip'  , '' )" role="menuitem" class=" waves-effect waves-classic " id="Usuario Vip">Usuario Vip</a></li>
                    </ul>
            <input type="hidden" id="rank_" value="Administrador">
                  </div>
</td>


<td><input type="text" class="form-control has-value" id="creditos" placeholder="Creditos" value=""></td>
<td><input type="text" class="form-control has-value" id="foto" placeholder="Foto" value=""></td>
<td><button  onclick="add_usuario()" class="md-btn md-raised m-b- blue"> Adicionar <i class="fa fa-plus" aria-hidden="true"></i></button></td>
<td>DESABILITADO</td>
</tr>
<?php

for($i=0; $i< count($array);$i++){
$explode = explode("|" , $array[$i]);
$botão_salvar = '<button id="btn_save_'.$i.'" onclick="editar(\''.$i.'\');" class="md-btn md-raised m-b- blue"> Editar <i class="fa fa-floppy-o fa-2" aria-hidden="true"></i></button>';

$botão_apagar = '<button id="btn_apagar_'.$i.'" onclick="apagar(\''.$i.'\');" class="md-btn md-raised m-b- blue ">  Apagar <i class="fa fa-close fa-2" aria-hidden="true"></i></button>';

if($explode[0] == $usuario){
	$botão_apagar = '<button onclick=\'swal( "erro" ,"voce nao pode apagar o usuario que esta sendo usado" , "error")\' class="md-btn md-raised m-b- blue" > Apagar <i class="fa fa-close fa-2" aria-hidden="true"></i></button>';
  $botão_salvar = '<button onclick=\'swal( "erro" ,"voce nao pode editar o usuario que esta sendo usado" , "error")\' class="md-btn md-raised m-b- blue"> Editar <i class="fa fa-floppy-o fa-2" aria-hidden="true"></i></button>';
}

$user = $explode[0];
$senha = $explode[1];
$rank = $explode[2];
$rank = carregar_rank_dropdown($rank , $i);

$creditos = $explode[3];
$foto = $explode[4];

	echo "
  <tr>
  <td><input type=\"text\" class=\"form-control has-value\" readonly=\"\" id=\"id\" placeholder=\"\" value=\"$i\"></td>
	<td><input type=\"text\" class=\"form-control\" id='usuario_".$i."' name=\"usuario\" placeholder=\"Usuario\" value=\"$user\"></td>
	<td><input type=\"text\" class=\"form-control\" id='senha_".$i."' name=\"senha\" placeholder=\"Senha\" value=\"$senha\"></td>
	<td>$rank</td>
	<td><input type=\"text\" class=\"form-control\" id='creditos_".$i."' name=\"creditos\" placeholder=\"Creditos\" value=\"$creditos\"></td>
	<td><input type=\"text\" class=\"form-control\" id='foto_".$i."' name=\"foto\" placeholder=\"Foto\" value=\"$foto\"></td>
	<td>$botão_salvar</td>
	<td>$botão_apagar</td>
  </tr>
  ";

}

?>
</tbody>
</table>