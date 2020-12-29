<?php


/* Criado por Thiagão-carder */

error_reporting(0);
set_time_limit(0);
session_start();

extract($_POST);

if($_SESSION['rank'] !== "Administrador"){
	die("vai tomar no cu");
}




if($action == "editar"){
	$array = file("../../usuarios.txt");

	for($i=0;$i<count($array);$i++){
     $explode = explode("|" , $array[$i]);

     if($i == $posição){
        
     $explode[0] = $usuario;
     $explode[1] = $senha;
     $explode[2] = $rank;
     $explode[3] = $creditos;
     $explode[4] = $foto;

     $junto = implode("|" , $explode);
     echo $junto;
     $get = file_get_contents("../../usuarios.txt");
     $str = str_replace($array[$i],$junto, $get);
     unlink("../../usuarios.txt");
     $hanlde = fopen("../../usuarios.txt" , "a+");
     fwrite($hanlde, $str);
     fclose($hanlde);
     }


	}

}elseif($action== "apagar"){

	$array = file("../../usuarios.txt");

	for($i=0;$i<count($array);$i++){
		$explode = explode("|" , $array[$i]);
		if($i == $posição){
			$junto = implode("|", $explode);
			$get = file_get_contents("../../usuarios.txt");
			$str =  str_replace($junto, "" , $get);
            unlink("../../usuarios.txt");
            $hanlde = fopen("../../usuarios.txt" , "a+");
            fwrite($hanlde, $str);
            fclose($hanlde);
		}
	}

}elseif($action == "add_usuario"){
    $fp = fopen("../../usuarios.txt" , "a+");
    fwrite($fp, "$usuario|$senha|$rank|$creditos|$foto\n");
    fclose($fp);
}

?>