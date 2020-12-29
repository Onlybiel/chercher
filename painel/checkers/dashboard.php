<?php
error_reporting(0);
set_time_limit(0);
session_start();

if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])){
echo '<script language= "JavaScript">location.href="/"</script><br>';
  die();
}

$array_usuarios = file("../../usuarios.txt");
$total_usuarios_registrados = count($array_usuarios);

for($i=0;$i<count($array_usuarios);$i++){
  $explode = explode("|" , $array_usuarios[$i]);
  if($_SESSION['usuario'] == $explode[0]){


    $_SESSION['senha'] = $explode[1];
    $_SESSION['rank'] = $explode[2];
    $_SESSION['creditos'] = $explode[3];
    $_SESSION['foto'] = $explode[4];
  }
}


$array_ccs_aprovadas = file_get_contents("../includes/ccs_aprovadas.txt");
$total_ccs_aprovadas = strlen($array_ccs_aprovadas);

$array_logins_aprovados = file_get_contents("../includes/logins_aprovados.txt");
$total_logins_aprovados = strlen($array_logins_aprovados);

$files_checkers = scandir(getcwd()."/");
$total_checkers = 32;

for($i=0;$i<count($files_checkers);$i++){
if(strpos($files_checkers[$i] , ".php") !== false){
	$total_checkers++;
}
}
$total_checkers--;

$usuario = $_SESSION['usuario'];
$creditos = $_SESSION['creditos'];
$rank = $_SESSION['rank'];
$foto = $_SESSION['foto'];

?>

<div class="padding">
	<div class="margin">
		<h5 class="m-b-0 _300">Olá usúario <?=$usuario ?>, Bem-vindo (a)
		<font color="goldenrod"> <i class="fa fa-smile-o"></i></font></h5>
		<small class="text-muted">Painel Checkers© - Version 6.0</small>		
		
		
	</div>
	<div class="row">
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box p-a">
          <div class="pull-left m-r">
            <span class="w-40 warn text-center rounded">
              <i class="material-icons">person_add</i>
            </span>
          </div>
          <div class="clear">
            <h4 class="m-a-0 text-md"><a href=""> <?php echo $total_usuarios_registrados; ?> <span class="text-sm"></span></a></h4>
            <small class="text-muted">Usuarios Pendentes</small>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box-color p-a primary">
          <div class="pull-right m-l">
            <span class="w-40 dker text-center rounded">
              <i class="fa fa-thumbs-o-up"></i>
            </span>
          </div>
          <div class="clear">
            <h4 class="m-a-0 text-md"><a href=""><?php echo $total_logins_aprovados ?><span class="text-sm"></span></a></h4>
            <small class="text-muted">Logins aprovados</small>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box p-a">
          <div class="pull-right m-l">
            <span class="w-40 accent text-center rounded">
              <i class="fa fa-spin fa fa-gear"></i>
            </span>
          </div>
          <div class="clear">
            <h4 class="m-a-0 text-md"><a href=""><?php echo $total_checkers ?> <span class="text-sm"> Checkers</span></a></h4>
            <small class="text-muted">Funcionando &amp; Online</small>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box-color p-a accent">
          <div class="pull-left m-r">
            <span class="w-40 dker text-center rounded">
              <i class="fa fa-thumbs-o-up"></i>
            </span>
          </div>
          <div class="clear">
            <h4 class="m-a-0 text-md"><a href=""><?php echo $total_ccs_aprovadas ?> <span class="text-sm"></span></a></h4>
            <small class="text-muted">CCs aprovadas</small>
          </div>
        </div>
      </div>
	</div>
	<div class="row-col box">
        <div class="col-sm-8">
    		<div class="box-header">
	          <h3>[AVISOS]</h3>	          
	        </div>
	        <div class="box-body">
	            <div style="height:150px">
	            

                                    <li>
                                            <a href="https://t.me/painelcheckers">
                                                </i> A melhor central de utilidades de ferramentas online<i class="fa fa-check text-success"></i></a><div class="control-group"><a href="https://t.me/painelcheckers">
 
                                            </a>
                                            <p>
                                            <li>
                                            <a href="https://t.me/painelcheckers">
                                                <i class="fa fa-check text-success"></i> [Noticias] Checker adcionados!</a><div class="control-group"><a href="#">
 
                                            </a>
                                             <li>
                                            <a href="https://t.me/painelcheckers">
                                                <i class="fa fa-check text-success"></i> [Noticias] Ferramentas adcionadas!</a><div class="control-group"><a href="https://t.me/painelcheckers">
 
                                            </a>
                                             <li>
                                            <a href="https://t.me/painelcheckers">
                                                <i class="fa fa-check text-success"></i> [Noticias] Consultas adcionadas!</a><div class="control-group"><a href="https://t.me/painelcheckers">
 
                                            </a>
                                              <p></p>
                                              </a>
                                             <li>
                                            <a href="https://t.me/pandaoficial">
                                                <i class="fa fa-check text-success"></i> [CEO] PandaOficial</a><div class="control-group"><a href="https://t.me/pandaoficial">
 
                                              <li>
                                            <a href="https://t.me/LuffyAproved">
                                                <i class="fa fa-check text-success"></i> [DEV] Luffy</a><div class="control-group"><a href="https://t.me/LuffyAproved">
 
                                            </a>
                                            </a>
                                        </div></li>

	            </div>
	        </div>
        </div>
        
			
       


	
	          
	               
	    </div>
	    <div class="col-md-6 col-xl-4">
	    	<div class="box">
	          <div class="box-header">
	            <h3>Rank</h3>
	            <small>Rank Atual: <strong> <?=$rank ?></strong></small>
	          </div>
	          <div class="box-tool">
		        <ul class="nav">
		          <li class="nav-item inline">
		            <a class="nav-link">
		              <i class="fa fa-check"></i>
		            </a>
		          </li>
		          <li class="nav-item inline dropdown">
		            <a class="nav-link" data-toggle="dropdown">
		              <i class="material-icons md-18"></i>
		            </a>
		            <div class="dropdown-menu dropdown-menu-scale pull-right">
		              <a class="dropdown-item" href="#">Usuario: <?=$usuario ?> </a>
		              <div class="dropdown-divider"></div>
		              <a class="dropdown-item">Atualizar Plano</a>
		            </div>
		          </li>
		        </ul>
		      </div>
		      
		          </div>

		      </div>
	    <div class="col-md-6 col-xl-4">
	    	<div class="box">
	          <div class="box-header">
	            <h3>Creditos</h3>
	            
	            <small>
	            
	            	              
	         Total em creditos:  <?=$creditos ?>	              
	              	            
	            </small> 
	          </div>
	          
	          
	          <div class="box-tool">
		        <ul class="nav">
		          <li class="nav-item inline">
		            <a class="nav-link">
		              <i class="fa fa-money"></i>
		            </a>
		          </li>
		          <li class="nav-item inline dropdown">
		            <a class="nav-link" data-toggle="dropdown">
		              <i class="material-icons md-18"></i>
		            </a>
		            <div class="dropdown-menu dropdown-menu-scale pull-right">
		              <a class="dropdown-item" href="">Usuario: <?=$usuario ?></a>
		              <div class="dropdown-divider"></div>
		              <a class="dropdown-item">Comprar Credito</a>
		            </div>
		          </li>
		        </ul>
		      </div>
		      
		      </div>

		      
		      </div>

</div>