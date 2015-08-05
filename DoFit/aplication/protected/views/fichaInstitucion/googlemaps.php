<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<link href="css/screen.css" rel="stylesheet" type ="text/css" />
<script type="text/javascript">
  function initialize(address) {
	var geoCoder = new google.maps.Geocoder(address)
	var request = {address:address};
	geoCoder.geocode(request, function(result, status){
		var latlng = new google.maps.LatLng(result[0].geometry.location.lat(), result[0].geometry.location.lng());
		var myOptions = {
		  zoom: 15,
		  center: latlng,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
        var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
		var marker = new google.maps.Marker({position:latlng,map:map,title:'title'});
	})
  }
</script>

<script>
    /*$(document).ready(function(){
        initialize('Cordoba Argentina');
        $('#search').bind('click',function(){
            initialize($('#address').val());    
        })
    })
	*/
	function mostrarDireccion(val){
	  initialize($('#address').val());
	}
</script>
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px;}
  #map_canvas {
      width:529px; 
      height:400px;
  }
  .box{
      width:529px; 
      height:400px;
      border:1px solid #ccc;
      padding:10px;
      box-shadow: 1px 1px 3px #ccc;
  }
  .search input[type=text]{
      float:left;
      width:460px;
      padding:8px;
      border:1px solid #4B8EFA;
  }
  .search input[type=button]{
      margin-top: 7px;
      float:right;
      background-color:#4B8EFA;
      border:0;
      display:block;
      color:white;
      padding:8px;
      cursor: pointer;
  }
  h1{
      text-align: center;
      font-family: cursive;
      margin-top:15px;
      font-size: 45px;
  }
  h2{
      margin-top:15px;
  }
</style>
<title>jQueryLoad.com</title>
</head>
    <body onload="mostrarDireccion(this.value)">
        <div class="container">
            <div class="span-24">
                <div class="push-5 span-14">
				<?php
				 $nombre = $_POST['nombre'];
				 /*$localidad = $_GET['localidad'];
				 $direccion = $_GET['direccion'];
				 $provincia = $_GET['provincia'];
                 $locali = str_replace("+"," ",$localidad);
				 $direcc = str_replace("+"," ",$direccion);
				 $provin = str_replace("+"," ",$provincia);
				 $lugargimnasio = $direcc.", ".$localidad.", ".$provin;
				 */
		         ?>
                 <h2> Ubicaci&oacute;n en Google Maps de <?php echo $nombre ?></h2>
                </div>
            </div>
            <div class="push-5 span-14">
                <div class="search">			   
                   <input id="address" value="<?php //echo $lugargimnasio;?>"  placeholder="Ingrese su direccion" type ="text" />
                    <div class="clear"></div>
                </div>
                <div class="box">
                    <div id="map_canvas"></div> 
                </div>
            </div>
           
        </div>
    </body>
</html>