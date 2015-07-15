<html>
 <head>
 <style>
	body{
		color:#000000;
	}
	#content_perfil{
		height:300px;
	   /* border-style: solid;
		border-width: 1px;
		border-color: #212121;
		border-radius: 5px;*/
		padding-top:110px;
		padding-left:15%;
		padding-right:15%;
	}

	
	#perfil{
		height:250px;
	}
	
	.size_1{
		font-size: 14,5px;
	}
	.size_2{
		font-size: 2em;
	}
	.size_3{
		font-size: 18px;
		color:black;
	}
	.size_4{
		font-size: 4em;
	}
	.size_5{
		font-size: 5em;
	}

	#pop_up_form{
		display:hidden;

	}
	.navbar-wrapper{
	
		margin-bottom:30px;
	}
	#p_datos{
		float:left;
		width:60%;
		
	}
	#imagen_perfil{
		float:left;
		width:30%;
	}
	.img1{
		width:320px;
		height:320px;
	}
	.img2{
		width:320px;
		height:320px;
	}
	
	.img3{
		width:320px;
		height:320px;
	}
	
	.img4{
		width:320px;
		height:320px;
	}
	
	.img1:hover{
		opacity: 0.8;
	}
	.img2:hover{
		opacity: 0.8;
	}
	.img3:hover{
		opacity: 0.8;
	}
	.img4:hover{
		opacity: 0.8;
	}
	
	#seccion_imagenes{
		margin-top:80px;
	}
	.imagenes{
		float:left;
		padding-right:25px;
		padding-bottom:10px;
		padding-top:10px;
	}
	.img_p{
		width:60%;
		border:0.2;
		border-style:solid;
		border-color:
	}
	
	.italic{
		font-style:italic;
	}
	.text_left{
		text-align:left;
	}
	.text_right{
		text-align:right;
	}
	
	@media only screen and (max-width: 500px) {
		#content_perfil{
			padding-left:5%;
			padding-right:5%;
		}
		#imagen_perfil{
			float:left;
		}
		.img_p{
			width:60%;
		}
		.btn_pfl{
			width:60%;
		}
	
	}
	
	hr.fancy-line { 
		border: 0; 
		height: 2px;
		background-color:#80E680;

	}
	hr.fancy-line:before {
		top: -0.5em;
		height: 1em;
	}
	hr.fancy-line:after {
		content:'';
		height: 0.5em;
		top: 1px;
	}

	hr.fancy-line:before, hr.fancy-line:after {
		content: '';
		position: absolute;
		width: 100%;
	}

	hr.fancy-line, hr.fancy-line:before {
		background: radial-gradient(ellipse at center, rgba(0,0,0,0.1) 0%,rgba(0,0,0,0) 75%);
	}

	 hr.fancy-line:after {
		background: #f4f4f4;
	}
	#separador{
		padding-top:2%;
		padding-left:12.5%;
		padding-right:12.5%;
	}
	#seccion_botones{
		padding-top:2%;
		padding-left:12.4%;
		padding-right:12.5%;
	}
	#respuesta_ajax{
		padding-top:2%;
		padding-left:12.5%;
		padding-right:12.5%;
	}
	#loadingImage{
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	.td{
		width:100%;
		height:40px;
	/*	border-style:solid;
		border-bottom-width:1px;
		border-bottom-color:#CECEBF;*/
		text-align:left;
		vertical-align:middle;
		padding-top:10px;
		padding-left:10px;
		padding-right:10px;
	
	}
	.td_info{
		width:100%;
		height:40px;
		text-align:left;
		vertical-align:middle;
		padding-top:24px;
		padding-left:125px;
		padding-right:10px;
	}
	
	
	#info_table{
		padding-top:20px;
	}
	#descripcion:hover{
		background-color:#E6E6E6;
	}
	.bold {
		font-weight:bold;
	}
	.editar_datos{
		padding-top:20px;
	}

	.light_green{
		color:#5CE62E;
	}
	.grey_color{
		color:#afb2b5;
	}
	
 </style>
<script type="text/javascript">
	var showLoader;
	$(window).load(function(){
		
		galeria();
		
		
	});

	function galeria(){
		debugger;
		showLoader = setTimeout("$('#loadingImage').show()", 300);
		$("#btn_galeria").addClass("active");
		$("#btn_info").removeClass("active");
		
		$.ajax({
			url: '<?php echo Yii::app()->request->baseUrl;echo'/perfilSocial/galeria ';?>', 
			type: 'post', 
			data: { /*raza: valor, sexo: sx */},
			success:function(response){
				$('#respuesta_ajax').html(response);
			
			}, 
			error: function(e){
				$('#logger').html(e.responseText);
			}
		});    
	}
	
	function info(){
		debugger;
		showLoader = setTimeout("$('#loadingImage').show()", 300);
		$("#btn_galeria").removeClass("active");
		$("#btn_info").addClass("active");
		$.ajax({
			url: '<?php echo Yii::app()->request->baseUrl;echo'/perfilSocial/informacion ';?>', 
			type: 'post', 
			data: { /*raza: valor, sexo: sx */},
			success:function(response){
				$('#respuesta_ajax').html(response);
			
			}, 
			error: function(e){
				$('#logger').html(e.responseText);
			}
		});    
	}
	function edicion(){
		debugger;
		showLoader = setTimeout("$('#loadingImage').show()", 300);
		$.ajax({
			url: '<?php echo Yii::app()->request->baseUrl;echo'/perfilSocial/edicion ';?>', 
			type: 'post', 
			data: { /*raza: valor, sexo: sx */},
			success:function(response){
				$('#respuesta_ajax').html(response);
			
			}, 
			error: function(e){
				$('#logger').html(e.responseText);
			}
		});   
	}
	function edicionInfo(){
		debugger;
		showLoader = setTimeout("$('#loadingImage').show()", 300);
		$.ajax({
			url: '<?php echo Yii::app()->request->baseUrl;echo'/perfilSocial/edicionInfo ';?>', 
			type: 'post', 
			data: { /*raza: valor, sexo: sx */},
			success:function(response){
				$('#respuesta_ajax').html(response);
			
			}, 
			error: function(e){
				$('#logger').html(e.responseText);
			}
		});   
	}
	
	
</script>	
	
 
 </head>
<body> 
	 <div class="navbar-wrapper">
		<div class="container">
			<nav class="navbar navbar-inverse navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">DoFit!</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<div class="navbar-form navbar-right">
							<ul class="nav navbar-nav">
								<li class="active"><a>Hola!  <?php echo Yii::app()->user->getName(); ?></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraci&oacute;n <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Home</a></li>
										<li><a href="#">Anotarme en actividades</a></li>
										<li><a href="#">Ver mis actividades</a></li>
										<li role="separator" class="divider"></li>
										<li class="dropdown-header">Privacidad</li>
										<li><a href="#">Configuraci&oacute;n</a></li>
										<li><a href="#"><?php echo CHtml::link('Salir', array('site/logout')); ?></a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</div>

<!--content header--> 
 <?php 
	$nombre = $fichaUsuario->nombre;
	$apellido = $fichaUsuario->apellido;
/*	$dni = $fichaUsuario->dni;
	$sexo = $fichaUsuario->sexo;
	$fechanac = $fichaUsuario->fechanac;
	$telfijo = $fichaUsuario->telfijo;
	$celular = $fichaUsuario->celular;
	$contactoEmergencia = $fichaUsuario->conemer;
	$telefonoEmergencia = $fichaUsuario->telemer;
	$localidad = $localidad->localidad;
	//falta la provincia
	$direccion = $fichaUsuario->direccion;
	$piso = $fichaUsuario->piso;
	$depto = $fichaUsuario->depto;
 */
 ?>
 
    <div id="content_perfil">
		<div id="perfil">			
			<div id="imagen_perfil">
				<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$model->foto1 ?>" class="img-circle img_p">
			</div>	
				
			<div id="p_datos"> 
				<p><span class='size_2'><?php echo $nombre." ".$apellido; ?></span>, <span class='size_1'>25</span>&nbsp;&nbsp;</p>
				
				<p><span class='size_2'>2 </span><span class='size_1'>Deportes</span></p>	
				
				<div id="descripcion" class="size_3 italic">
					<?php echo $model->descripcion;?>
				</div>
				<div style="text-align:right">
					<input type="button" class="btn btn-info" value="Editar"/>
				</div>
								
				
			</div>
		</div>
	</div>	
<!--<div id="separador">
		<hr class="fancy-line"/>
	</div>-->
	<div id="seccion_botones">	
		
			<input type="button" class="btn btn-success active" id ="btn_galeria" onclick="galeria();" value="Mis Fotos"><i class=icon-home></i></input> 
			<input type="button" class="btn btn-success" id ="btn_info" onclick="info();" value="Informaci&oacute;n"><i class=icon-home></i></input> 
		
	</div>

	<div id="respuesta_ajax">
		<div id="loadingImage" style="display:none;"><img src="<?php echo Yii::app()->request->baseUrl;echo "/img/722.GIF" ?>"</div>
	</div>
		

</body>
</html>

