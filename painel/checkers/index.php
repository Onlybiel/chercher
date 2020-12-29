<?php 
error_reporting(0);
session_start();

if($_SESSION['logado'] !== "ok"){
 	exit(header("Location: error.php"));
}
?>