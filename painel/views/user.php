<?php


session_start();
error_reporting(0);
if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])){
  die();
}


?>


<div class="dropdown-menu pull-right dropdown-menu-scale">
   <a class="dropdown-item">
    <span> <?php echo $_SESSION['usuario']; ?> </span>
    <span class="label danger m-l-xs"> Rank <?php echo $_SESSION['rank']?> </span>
  </a>
  <div class="dropdown-divider"></div>
  <?php
if($_SESSION['rank'] == "Administrador"){
    ?>

  <a class="dropdown-item" href="javascript:refresh('admin.php')">
    <span>Administração</span>
  </a>

    <?php }?>
  <a class="dropdown-item" href="config">
    <span>Configurações</span>
  </a>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="deslogar.php">Deslogar</a>
</div>
