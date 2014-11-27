<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>NAVI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">

 
    
  </head>

  <header>  <div class="navbar navbar-inverse navbar-fixed-top head" role="navigation">
      <div class="container">
        <div class="4">
     
         <h1> <a class="navbar-brand head" href="#"> NAVI</a></h1>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
          <!--   <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button> -->
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div></header>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

   <body>
<br><br><br><br>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron col-lg-12 ">
      <div id= "mapa"  height="100" class="container col-md-12">  
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row col-md-12">
        <div class="col-md-3">
          <h2>Restaurante</h2>
          <img  src="img/res.png" class="col-md-6  "></img>
          
        </div>
        <div class="col-md-3">
          <h2>Museo</h2>
              <img  src="img/mus.png" class="col-md-6 " ></img>
       </div>
        <div class="col-md-3">
          <h2>Aeropuerto</h2>
          <img  src="img/aer.png" class="col-md-6 "></img>
      </div>

<div  class="container drag  col-md-3">
   <p>Arrastra los íconos al recuadro</p>
   <div id="lleva">
       <figure  class="col-md-12">
    <img id="una" src="img/res.png" draggable="true" ondragstart="drag(event)" class="col-md-4"></img>
    <img id="dos" src="img/mus.png" draggable="true" ondragstart="drag(event)"class="col-md-4 " ></img>               
    <img id="tres" src="img/aer.png" draggable="true" ondragstart="drag(event)"class="col-md-4 "></img>
      </figure>

      <canvas id="myCanvas" ondrop="drop(event) " ondragover="allowDrop(event)"height="90">
      </canvas>  
      
      </div>
</div>

      <hr>


   <!--  <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>&copy; 2014 Copyright. Todos los derechos reservados.</p>
          </div>
        </div>
      </div>
    </footer>
 -->

 <!-- sacado de http://marcgrabanski.com/jquery-google-maps-tutorial-ajax-php-mysql/ -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
 <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>


    <script src="js/main.js">//VIsualización mapa de google maps</script>

    <script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAZBe7uHI90ESk2XAmWRL3RxR6u04U0tImA3bfwZ3-HKdEno7z2xRk2YE6OkudtBX5qy0vLrgbf1DUCg"></script>
    <script type="text/javascript">
      google.load("jquery", '1.2.6');
      google.load("maps", "2.x");
    </script>
<script type="text/javascript" charset="utf-8">
      $(function(){
        var map = new GMap2(document.getElementById('mapa'));
        var cali = new GLatLng(3.4535662,-76.5335048);
        map.setCenter(cali, 16);
        var bounds = new GLatLngBounds();
        var geo = new GClientGeocoder(); 
        
        var reasons=[];
        reasons[G_GEO_SUCCESS]            = "Success";
        reasons[G_GEO_MISSING_ADDRESS]    = "Missing Address";
        reasons[G_GEO_UNKNOWN_ADDRESS]    = "Unknown Address.";
        reasons[G_GEO_UNAVAILABLE_ADDRESS]= "Unavailable Address";
        reasons[G_GEO_BAD_KEY]            = "Bad API Key";
        reasons[G_GEO_TOO_MANY_QUERIES]   = "Too Many Queries";
        reasons[G_GEO_SERVER_ERROR]       = "Server error";
        
        
        $.getJSON("php/map-service.php?action=listpoints", function(json) {
          if (json.Locations.length > 0) {
            for (i=0; i<json.Locations.length; i++) {
              var location = json.Locations[i];
              addLocation(location);
            }
            zoomToBounds();
          }
        });
        
        $("#add-point").submit(function(){
          geoEncode();
          return false;
        });
        
        function savePoint(geocode) {
          var data = $("#add-point :input").serializeArray();
          data[data.length] = { name: "lng", value: geocode[0] };
          data[data.length] = { name: "lat", value: geocode[1] };
          $.post($("#add-point").attr('action'), data, function(json){
            $("#add-point .error").fadeOut();
            if (json.status == "fail") {
              $("#add-point .error").html(json.message).fadeIn();
            }
            if (json.status == "success") {
              $("#add-point :input[name!=action]").val("");
              var location = json.data;
              addLocation(location);
              zoomToBounds();
            }
          }, "json");
        }
        
        function geoEncode() {
          var address = $("#add-point input[name=address]").val();
          geo.getLocations(address, function (result){
            if (result.Status.code == G_GEO_SUCCESS) {
              geocode = result.Placemark[0].Point.coordinates;
              savePoint(geocode);
            } else {
              var reason="Code "+result.Status.code;
              if (reasons[result.Status.code]) {
                reason = reasons[result.Status.code]
              } 
              $("#add-point .error").html(reason).fadeIn();
              geocode = false;
            }
          });
        }
        
        function addLocation(location) {
          var point = new GLatLng(location.lat, location.lng);    
          var marker = new GMarker(point);
          map.addOverlay(marker);
          bounds.extend(marker.getPoint());
          
          $("<li />")
            .html(location.name)
            .click(function(){
              showMessage(marker, location.name);
            })
            .appendTo("#list");
          
          GEvent.addListener(marker, "click", function(){
            showMessage(this, location.name);
          });
        }
        
        function zoomToBounds() {
          map.setCenter(bounds.getCenter());
          map.setZoom(map.getBoundsZoomLevel(bounds)-1);
        }
        
        $("#message").appendTo( map.getPane(G_MAP_FLOAT_SHADOW_PANE) );
        
        function showMessage(marker, text){
          var markerOffset = map.fromLatLngToDivPixel(marker.getPoint());
          $("#message").hide().fadeIn()
            .css({ top:markerOffset.y, left:markerOffset.x })
            .html(text);
        }
      });
    </script>


 <script>//Drag and drop
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("image", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("image");
    ev.target.appendChild(document.getElementById(data));
}

//
function canvas(ev) {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("una");
    ctx.drawImage(img,100,100);
}



</script>
   


    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>
