 <?php

// include_once("database.php");

// if(isset($_POST)){

// 	if($_POST["query"]<>""){

// 		$rutaImagenes=array("../Taller3/img/res.png","../Taller3/img/mus.png","../Taller3/img/aer.png");

// 		$mapa="http://maps.google.com/maps/api/staticmap?center=3,420555600000000000,-76,522222199999990000&zoom=13&size=700x400&sensor=false";
// 		$marcadores="";
	
// 		$cantidad=0;


// 		$resultado=mysqli_query($conexion,$_POST["query"]);

// 		if($resultado<>""){
// 		while ($row = mysqli_fetch_array($resultado)) {
// 			$cantidad++;
// 			                "
// 							<figure>
// 								<img src='".$rutaImagenes[($row["tipo"]-1)]."'> 
// 							</figure>
// 						</div> 
// 				";
// 			$marcadores.="&markers=".$row["lat"].",".$row["lng"];
// 		}
// 		}
		
// 		echo $mapa.$marcadores.";;;".$cantidad;
// 	}

// }

// ?>