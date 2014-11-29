

//   function mapa(){
// 	if(activos.length>0){

// 	var t=1;
// 	if(activos[0]=="una"){
// 		t=2;
// 	}else if(activos[0]=="dos"){
// 		t=2;
// 	}
// 	var query= "SELECT * from navi.locations WHERE  tipo="+t;
// 	for(var i=1;i<activos.length;i++){

// 			t=1;
// 		if(activos[i]=="una"){
// 			t=2;
// 		}else if(activos[i]=="tres"){
// 			t=3;
// 		}

// 		query=query+" OR tipo="+t;
// 	}
	

// 	$.ajax({
// 			type: "POST",
// 			url: "mapaDatos.php",
// 			data: {query: query}
// 		}).done(function(){
// 			console.log("Solicitud enviada al API");
// 		}).success(function(result){
// 			var re=result.split(";;;");

// 				if(re[2]=="0"){
// 					$("#mapa").replaceWith('<div id="mapa"> </div>');
// 				}else{
// 				$("#mapa").replaceWith('<div id="mapa"> '+re[1]+'</div>');
// 				}	
// 				document.getElementById('mapa').setAttribute("src",re[0]);
				
// 			console.log("Resultado: "+result);
// 		}).error(function(error){
// 			console.log("Error: "+error);
// 		});


// }