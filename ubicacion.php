<?php 
# CDN de MDB 4.19.0
require_once 'cdn.html';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Geolocalización</title>
  <link rel="icon" type="text/css" href="img/dos.png">

</head>
<body>

  <div class="container-fluid">
    <nav class="navbar navbar-dark black">

      <form class="form-inline my-2 my-lg-0 ml-auto">
        <button type="button" class="btn btn-outline-primary btn-rounded text-primary"><a  href="que.php">¿QuÉ es Geolocalización?</a></button>
        <button type="button" class="btn btn-outline-primary btn-rounded text-primary"><a  href="apli.php">Aplicaciones</a>
        <button type="button" class="btn btn-outline-primary btn-rounded text-primary"><a  href="api.php">Que es API</a></button>
        <button type="button" class="btn btn-outline-primary btn-rounded text-primary"><a  href="como.php">Como se genera una API</a></button>
        <button type="button" class="btn btn-outline-primary btn-rounded text-primary"><a  href="ubicacion.php">Mi Ubicación</a>

        </button>
        <button type="button" class="btn btn-outline-primary btn-rounded text-primary"><a  href="index.php">Portafolio</a>
        </button>
      </form>
    </nav>
<div class="jumbotron card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">
  <div class="text-black text-center py-5 px-4">
    <div>
      <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>Sitio de Geolocalización</strong></h2>
      
  
<div id='ubicacion'></div>

<script type="text/javascript">
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(mostrarUbicacion);
  } else {
    alert("¡Error! Este navegador no soporta la Geolocalización.");
  }
  
  function mostrarUbicacion(position)
  {
    var times = position.timestamp;
    var latitud = position.coords.latitude;
    var longitud = position.coords.longitude;
    var altitud = position.coords.altitude; 
    var exactitud = position.coords.accuracy; 
    var div = document.getElementById("ubicacion");
    div.innerHTML = "Timestamp: " + times + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud + "<br>Altura en metros: " + altitud + "<br>Exactitud: " + exactitud;
  }  
  
  function refrescarUbicacion()
  { 
    navigator.geolocation.watchPosition(mostrarUbicacion);
  } 

</script>
    <br> <center>
    <div id="demo"></div>
    <div id="mapholder"></div>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <br>
    <button class="btn btn-outline-black btn-md" onclick="cargarmap()">Mostrar Mi Ubicación</button>
     
<script type="text/javascript">
      var x=document.getElementById("demo");
      function cargarmap()
      {
        navigator.geolocation.getCurrentPosition(showPosition,showError);
        
        function showPosition(position)
        {
          lat=position.coords.latitude;
          lon=position.coords.longitude;
          latlon=new google.maps.LatLng(lat, lon)
          mapholder=document.getElementById('mapholder')
          mapholder.style.height='600px';
          mapholder.style.width='800px';
          var myOptions={
            center:latlon,zoom:10,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            mapTypeControl:false,
            navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
          };
          var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
          var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
        }

        function showError(error)
        {
          switch(error.code) 
          {
            case error.PERMISSION_DENIED:
            x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
            break;
            case error.POSITION_UNAVAILABLE:
            x.innerHTML="La información de la localización no esta disponible."
            break;
            case error.TIMEOUT:
            x.innerHTML="El tiempo de petición ha expirado."
            break;
            case error.UNKNOWN_ERROR:
            x.innerHTML="Ha ocurrido un error desconocido."
            break;
          }
        }
      }
</script> 
</div>    
 
    </div>
  </div>
</div>

</body>
</html>

   