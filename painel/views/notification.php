<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])){
  die();
}

?>
<!-- dropdown -->
<div class="dropdown-menu pull-right w-xl animated fadeInUp no-bg no-border no-shadow">
    <div class="scrollable" style="max-height: 220px">
      <ul class="list-group list-group-gap m-a-0">
      
       			
			
			
			 			
        
          <li class="list-group-item dark-white text-color box-shadow-z0 b">
          <span class="pull-left m-r">
          </span>
          <span class="clear block">
            <a href class="text-primary"></a> <span class="label success"><font size=2>AVISO:<br> UPDATE REALIZADO!</span> <br>
            <small class="text-muted"></small>
          </span>
        </li>
          
        </li>
      </ul>
    </div>
</div>

		