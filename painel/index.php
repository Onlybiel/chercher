<?php 
//error_reporting(0);
set_time_limit(0);
session_start();

require 'check.php';

if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])){
  echo '<script language= "JavaScript">location.href="/painel/error.php"</script><br>';
  die();
}

$array_usuarios = file("../pandatabacosssIuserss.txt");
$total_usuarios_registrados = count($array_usuarios);

$continuar = false;
for($i=0;$i<count($array_usuarios);$i++){
  $explode = explode("|" , $array_usuarios[$i]);
  if($_SESSION['usuario'] == $explode[0]){


    $_SESSION['senha'] = $explode[1];
    $_SESSION['rank'] = $explode[2];
    $_SESSION['creditos'] = $explode[3];
    $_SESSION['foto'] = $explode[4];
    $continuar = true;
  }
}

if(!$continuar){
echo '<script language= "JavaScript">location.href="error.php"</script><br>';
die();
}

?>
<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
  <title>Painel Checkers© | Central</title>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- para ios 7 style, 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Painel Checkers©">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="../assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css ../assets/styles/app.min.css -->
  <link rel="stylesheet" href="../assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../assets/styles/font.css" type="text/css" />
    <script src="scripts/sweetalert2.js"></script>
  <link rel="stylesheet" href="scripts/sweetalert3.css">
</head>
<body onload="refresh('dashboard.php')">
  <div class="app" id="app">

<!-- ############ INICIO DA PAGINA -->

  <!-- aside -->
  <div id="aside" class="app-aside box-shadow-z3 modal fade lg nav-expand">
    <div class="left navside white dk" layout="column">
      <div class="navbar navbar-md info no-radius box-shadow-z4">
        <!-- brand -->
        <a class="navbar-brand">
        	<img src="../assets/images/logo.png">
        	<img src="../assets/images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">Painel Checkers©</span>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll">
          <div ui-include="'views/aside-top.php'"></div>
          
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">INICIO</small>
              </li>
              
              <li>
                <a href="javascript:refresh('dashboard.php')" >
                  <span class="nav-icon">
                    <i class="fa fa-fire"></i>
                  </span>
                  <span class="nav-text">INICIO</span>
                </a>
              </li>
          
            
          
          <li>
                <a href="checkers/dorks/dorks.php">
                  <span class="nav-icon">
                     <i class="fa fa-hdd-o"></i>
                  </span>
                  <span class="nav-text">Gerador Dorks</span>
                </a>
              </li>        
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label rounded label-sm primary">4</b>
                  </span>
                  <span class="nav-icon">
                    <i class="fa fa-wrench"></i>
                  </span>
                  <span class="nav-text">Ferramentas</span>
                </a>
                <ul class="nav-sub">
                   <li>
                    <a href="checkers/bin/bin.php">
                      <span class="nav-text">Bin checker</span>
                    </a>
                    <li>
                    <a href="checkers/geradordadosbr/geradorbr.php">
                      <span class="nav-text">Gerador dados 1</span>
                    </a>
                    <li>
                    <a href="checkers/localizadordeip/index.php" >
                      <span class="nav-text">Localizador IP</span>
                    </a>
                     <li>
                    <a href="checkers/geradorus.php">
                      <span class="nav-text">Gerador dados 2</span>
                    </a>
                    <li>
                </ul>
              </li>
          
          
          <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label rounded label-sm red">3</b>
                  </span>
                  <span class="nav-icon">
                    <i class="fa fa-search"></i>
                  </span>
                  <span class="nav-text">Consultas</span>
                </a>
                <ul class="nav-sub">
                   <li>
                    <a href="checkers/cep/cep.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Cep</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="https://www.situacaocadastral.com.br/">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Cpf</span>
                    </a>
                  </li>
                    
                    <li>
                    <a href="https://consultacnpj.com/cnpj/">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Cnpj</span>
                    </a>
                  </li>
                </ul>
              </li>
          
                     
           
           
          
          
          
                
                  
                  
               
           
          
             <li>
                <a href="checkers/termosdeuso/termosdeuso/index.html">
                  <span class="nav-icon">
                    <i class="fa fa-money"></i>
                  </span>
                  <span class="nav-text">Termos de uso</span>
                </a>
              </li>
        
            
          
              <li class="nav-header hidden-folded">
                <small class="text-muted">Checkers</small>
              </li>
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label label-sm accent">26</b>
                  </span>
                  <span class="nav-icon">
                    <i class="fa fa-dollar"></i>
                  </span>
                  <span class="nav-text">Logins</span>
                </a>
                <ul class="nav-sub nav-mega nav-mega-3">
                
                
                  <li>
                    <a href="checkers/gearbest/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Gearbest</span>
                    </a>
                  </li>
                  
                   <li>
                    <a href="checkers/bdigital/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Bilheteria digital</span>
                    </a>
                  </li>

                  <li>
                    <a href="checkers/tufos/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Tufos</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="checkers/globomail/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Globomail</span>
                    </a>
                  </li>
                  
                  <li>
                  
                    <a href="http://191.235.93.59/WISH/" >
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Wish 2</span>
                    </a>
                  </li>
                   
                   <li>
                    <a href="checkers/centauro/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Centauro</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="checkers/descomplica/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Descomplica</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="checkers/netshoes/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Netshoes</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="checkers/acessocard/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Acesso card</span>
                    </a>
                  </li>
                   
                   <li>
                    <a href="checkers/marisa/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Marisa</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="checkers/facebook/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Facebook</span>
                    </a>
                  </li>
                   
                   <li>
                    <a href="checkers/bol/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Bol</span>
                    </a>
                  </li>
                   
                  <li>
                    <a href="checkers/posthaus/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Posthaus</span>
                    </a>
                  </li>
                   
                  <li>
                    <a href="checkers/spotify/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Spotify</span>
                    </a>
                  </li>
                   
                   <li>
                    <a href="checkers/globoplay/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Globo play</span>
                    </a>
                  </li>
                   
                   <li>
                    <a href="checkers/telecine/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Telecine</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="checkers/estante/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Estante virtual</span>
                    </a>
                  </li>
                   </li>
                  
                  <li>
                    <a href="checkers/ticket/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Ticket 360</span>
                    </a>
                  </li>
                   
                   <li>
                    <a href="checkers/camera/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Camera prive</span>
                    </a>
                  </li>
                  </li>
                   
                   <li>
                    <a href="http://seasyvendas.com/Sky/">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Sky</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="checkers/wish/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Wish</span>
                    </a>
                  </li>
                   
                   <li>
                    <a href="checkers/cruchyroll/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Crunchyroll</span>
                    </a>
                  </li>
                    
                    </li>
                   
                   <li>
                    <a href="checkers/adfocus/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Adfocus</span>
                    </a>
                  </li>
                   
                   <li>
                    <a href="checkers/drogasil/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Drogasil</span>
                    </a>
                  </li>
                  
				   </li>
                   
                   <li>
                    <a href="checkers/pichau/index.php">
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Pichau</span>
                    </a>
                  </li>
				</ul>
              </li>
          
              
              
              
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label label-sm warning">8</b>
                  </span>
                  <span class="nav-icon">
                    <i class="fa fa-credit-card"></i>
                  </span>
                  <span class="nav-text">Credit Card</span>
                </a>
                <ul class="nav-sub nav-mega nav-mega-3">
                  <li>
                  
                    <a href="checkers/geradorcc/index.php">
                    <span class="nav-label">
                    <b class="label label-sm success ">ON</b>
                  </span>
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Gerador de cc</span>
                    </a>
                  </li>
                   
                   <li>
                  
                    <a href="checkers/checkerelo/index.php">
                    <span class="nav-label">
                    <b class="label label-sm success ">ON</b>
                  </span>
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Elo</span>
                    </a>
                  </li>
                  <li>
                  
                    <a href="checkers/checkerbb/index.php">
                    <span class="nav-label">
                    <b class="label label-sm success ">ON</b>
                  </span>
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> BB</span>
                    </a>
                  </li>
                   
                   <li>
                  
                    <a href="checkers/checkerbb2/index.php">
                    <span class="nav-label">
                    <b class="label label-sm success ">ON</b>
                  </span>
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> BB 2</span>
                    </a>
                  </li>
                   
                   <li>
                  
                    <a href="checkers/hiper/index.php">
                    <span class="nav-label">
                    <b class="label label-sm success ">ON</b>
                  </span>
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Hiper</span>
                    </a>
                  </li>
                   
                   <li>
                  
                    <a href="checkers/hiper/index.php">
                    <span class="nav-label">
                    <b class="label label-sm success ">ON</b>
                  </span>
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Hiper 2</span>
                    </a>
                  </li>
                   
                   <li>
                  
                    <a href="checkers/checkerelo/index.php">
                    <span class="nav-label">
                    <b class="label label-sm success ">ON</b>
                  </span>
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Elo 2</span>
                    </a>
                  </li>
                  <li>
                  
                    <a href="checkers/checkerfinder/index.php">
                    <span class="nav-label">
                    <b class="label label-sm success ">ON</b>
                  </span>
                      <span class="nav-text"><i class="fa fa-hand-o-right"></i> Finder</span>
                    </a>
                  </li>
                </ul>
              </li>
              
              
          
              <li class="nav-header hidden-folded">
                <small class="text-muted">Outros</small>
              </li>
          
              <li>
                <a href="checkers/checkerbonus/index.php">
                  <span class="nav-icon">
                    <i class="fa fa-sitemap"></i>
                  </span>
                  <span class="nav-text">Checker diário</span>
                </a>
              </li>
              
              
              <li>
                <a href="#">
                 <span class="nav-label">
                    <b class="label label-sm success">100%</b>
                  </span>
                  <span class="nav-icon">
                    <i class="fa fa-bar-chart"></i>
                  </span>
                  <span class="nav-text">Suporte</span>
                </a>
              </li>
              
  
          
            </ul>
        </nav>
      </div>
      <div flex-no-shrink>
    <nav ui-nav>
  <ul class="nav">
    <li class="no-bg">
      <a href="deslogar.php" >
        <span class="nav-icon">
         <i class="material-icons">&#xe8ac;</i>
        </span>
        <span class="nav-text">Deslogar</span>
      </a>
    </li>
  </ul>
</nav>

      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z3" role="main">
    <div class="app-header info box-shadow-z4 navbar-md">
      <div class="navbar">
          <!-- Open side - Naviation on mobile -->
          <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
            <i class="material-icons">&#xe5d2;</i>
          </a>
          <!-- / -->
      
          <!-- titulo da pagina -->
          <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>

        <!-- navbar right -->
          <ul class="nav navbar-nav pull-right">
            <li class="nav-item dropdown pos-stc-xs">
              <a class="nav-link" href data-toggle="dropdown">
                <i class="material-icons">&#xe7f5;</i>
                
                
                <span class="label label-sm up danger">1</span>           
              </a>
              <div ui-include="'views/notification.php'"></div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link clear" href data-toggle="dropdown">
                <span class="avatar w-32">
                  <img src="<?php echo $_SESSION['foto']?> " alt="<?php echo $_SESSION['usuario'];?>">
                  <i class="on b-white bottom"></i>
                </span>
              </a>
              <div ui-include="'views/user.php'"></div>
            </li>
            <li class="nav-item hidden-md-up">
              <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                <i class="material-icons">&#xe5d4;</i>
              </a>
            </li>
          </ul>
          <!-- / navbar right -->
      
      
          <!-- navbar collapse -->
          <div class="collapse navbar-toggleable-sm" id="collapse">
            <!-- link and dropdown -->
            <ul class="nav navbar-nav">
                                

            </ul>
            <!-- / -->
          </div>
          <!-- / navbar collapse -->
      </div>
    </div>

    <div class="app-body" id="view2">




<div class="padding" id="pagina">


</div>




    </div>
  </div>
  <!-- / -->

  <!-- TEMA E CORES -->
  <div id="switcher">
    <div class="switcher box-color dark-white text-color" id="sw-theme">
      <a href ui-toggle-class="active" target="#sw-theme" class="box-color dark-white text-color sw-btn">
        <i class="fa fa-gear"></i>
      </a>
      <div class="box-header">
        <h2>Temas & Cores</h2>
      </div>
      <div class="box-divider"></div>
      <div class="box-body">
        <p class="hidden-md-down">
          <label class="md-check m-y-xs"  data-target="folded">
            <input type="checkbox">
            <i class="green"></i>
            <span class="hidden-folded">Esconder Menu</span>
          </label>
          <label class="md-check m-y-xs" data-target="boxed">
            <input type="checkbox">
            <i class="green"></i>
            <span class="hidden-folded">Estilo Encaixotado</span>
          </label>
          <label class="m-y-xs pointer" ui-fullscreen>
            <span class="fa fa-expand fa-fw m-r-xs"></span>
            <span>Tela Cheia</span>
          </label>
        </p>
        <p>Cores:</p>
        <p data-target="themeID">
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'primary', accent:'accent', warn:'warn'}">
            <input type="radio" name="color" value="1">
            <i class="primary"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'accent', accent:'cyan', warn:'warn'}">
            <input type="radio" name="color" value="2">
            <i class="accent"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'warn', accent:'light-blue', warn:'warning'}">
            <input type="radio" name="color" value="3">
            <i class="warn"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'success', accent:'teal', warn:'lime'}">
            <input type="radio" name="color" value="4">
            <i class="success"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'info', accent:'light-blue', warn:'success'}">
            <input type="radio" name="color" value="5">
            <i class="info"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'blue', accent:'indigo', warn:'primary'}">
            <input type="radio" name="color" value="6">
            <i class="blue"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'warning', accent:'grey-100', warn:'success'}">
            <input type="radio" name="color" value="7">
            <i class="warning"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'danger', accent:'grey-100', warn:'grey-300'}">
            <input type="radio" name="color" value="8">
            <i class="danger"></i>
          </label>
        </p>
        <p>Temas:</p>
        <div data-target="bg" class="text-u-c text-center _600 clearfix">
          <label class="p-a col-xs-6 light pointer m-a-0">
            <input type="radio" name="theme" value="" hidden>
            Claro
          </label>
          <label class="p-a col-xs-6 grey pointer m-a-0">
            <input type="radio" name="theme" value="grey" hidden>
            Cinza
          </label>
          <label class="p-a col-xs-6 dark pointer m-a-0">
            <input type="radio" name="theme" value="dark" hidden>
            Escuro
          </label>
          <label class="p-a col-xs-6 black pointer m-a-0">
            <input type="radio" name="theme" value="black" hidden>
            Preto
          </label>
        </div>
      </div>
    </div>
    
    <div class="switcher box-color black lt" id="sw-demo">
      <a href ui-toggle-class="active" target="#sw-demo" class="box-color black lt text-color sw-btn">
        <i class="fa fa-list text-white"></i>
      </a>
      <div class="box-header">
        <h2>All rights reserved 2019</h2>
      </div>
      <div class="box-divider"></div>
      <div class="box-body">
        <div class="text-u-c text-center _600 clearfix">
          
          </a>
          <div 
            <span class="text">PainelCheckers©</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / -->

<!-- ############ LAYOUT END-->

<!-- footer -->

    <div class="app-footer">
      <div class="p-a text-xs">
        <div class="pull-right text-muted">
          &copy; Copyright <strong>Painel Checkers</strong> <span class="hidden-xs-down">- <font color=Red><i class="fa fa-heart"></i></font> Version 6.0  <font color=Red> <i class="fa fa-heart"></i> </font color> </span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
   
        </div>
      </div>
    </div>

    <!-- Fotter end -->

<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
  <script src="../libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="../libs/jquery/underscore/underscore-min.js"></script>
  <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="../libs/jquery/PACE/pace.min.js"></script>

  <script src="scripts/config.lazyload.js"></script>

  <script src="scripts/palette.js"></script>
  <script src="scripts/ui-load.js"></script>
  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>
  <script src="scripts/ui-form.js"></script>
  <script src="scripts/ui-nav.js"></script>
  <script src="scripts/ui-screenfull.js"></script>
  <script src="scripts/ui-scroll-to.js"></script>
  <script src="scripts/ui-toggle-class.js"></script>

  <script src="scripts/app.js"></script>

  <!-- ajax -->
  <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
  <script src="scripts/ajax.js"></script>
  <script src="scripts/central.js"></script>
<!-- endbuild -->
</body>
</html>