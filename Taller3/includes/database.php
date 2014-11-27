<?php 

	function conectarse(){
		if (!($link=mysqli_connect("localhost", "root", ""))) {
			echo "Error .";
			exit();
		}

		if (!mysqli_select_db("NAVI",$link)){
			echo "Error al seleccionar BD.";
			exit();
		}
		return $link;
	}

	$link = conectarse();
	
?>