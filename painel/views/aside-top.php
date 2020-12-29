<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])){
  die();
}

?>

<div class="item">
  <div class="item-bg hidden-folded">
    <img src="<?php echo $_SESSION['foto']; ?>"  class="opacity-3">
  </div>
  <div class="pos-rlt">
    <div class="nav-fold">
    	<a href="#" ui-sref="app.page.profile" >
        <span class="pull-right m-v-sm hidden-folded">
        </span>
        <span class="block">
          <img src="<?php echo $_SESSION['foto']; ?>" alt="" class="w-40 img-circle">
        </span>
        <span class="clear hidden-folded m-t-sm">
          <span class="block _500"><i class="fa fa-check-circle text-success m-r-sm"></i><?php echo $_SESSION['usuario']; ?> </span>
          <small class="block text-muted"> <?php echo $_SESSION['rank']; ?> </small>
        </span>
      </a>
    </div>   
  </div>
</div>
