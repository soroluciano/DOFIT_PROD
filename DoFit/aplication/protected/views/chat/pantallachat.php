<html>
<head>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/chat.css"></link>
</head>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
            <a href="../" class="navbar-brand"></a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                  <li><a href="">Bienvenido! <?php 
				                  if(!Yii::app()->user->isGuest){
	                                  //Es un usuario logueado.
	                                  $Us = Usuario::model()->findByPk(Yii::app()->user->id); 
	                                 $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
                                    }
								  echo $ficha->nombre."&nbsp".$ficha->apellido; ?></a></li>
                <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
            </ul>
        </nav>
    </div>
</header>
<br/>
<br/>
<br/>
<div>
	<body>
	<div  class="container-fluid">
		<section  style="padding: 3%;">
			<div class="row" id="centrado">
				<img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" alt="First slide">
				<img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/chat.jpg" alt="First slide">
			</div>
			<br/>
			<div class="row">
				<form id="formChat" role="form">
					<div class="form-group">
						<label for="user"><?php echo $ficha->nombre.'&nbsp'.$ficha->apellido;?> esta en chat con
							<?php
							$nombre = $_POST['nombre'];
							$apellido = $_POST['apellido'];
							$idusuario = $_POST['idusuario'];

							echo "<input type='hidden'  id='idusuario' value='$idusuario' name='idusuario'></input>";

							if(isset($nombre) && isset($apellido)){
								echo $nombre.'&nbsp'.$apellido;
							}
							?>
						</label>
						<input type="hidden" id="usuario" name="user" value="<?php echo $ficha->nombre;?>"></input>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-9" >
								<div id="conversacion" class="pantalla">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="message">Mensaje</label>
						<textarea id="mensaje" name="mensaje" placeholder="Ingrese Mensaje"  class="form-control" rows="3"></textarea>
					</div>
					<input type="hidden"  name="valor" id="valor"></input>
					<input type="button" id="enviar" class="btn btn-primary" value="Enviar"></input>
					<input type="button" id="borrarmensajes" class="btn btn-primary" value="Borrar Mensajes"></input>
				</form>
			</div>
		</section>
	</div>
	<script>

		$(document).on("ready", function(){
			registerMessages();
			$.ajaxSetup({"cache":false});
			setInterval("cargarMensajesAntiguos()",500);
		});
		var registerMessages = function(){
			$("#enviar").on("click",function(e){
				e.preventDefault();
				var frm = $("#formChat").serialize();
				$.ajax({
					type : "POST",
					url : 'Registrarmensaje',
					data: frm
				}).done(function(info){
					$("#mensaje").val("");
					var altura =$("#conversacion").prop("scrollHeight");
					$("#conversacion").scrollTop(altura);
				})
			});
		}
		var cargarMensajesAntiguos = function() {
			var idusuario = $("#idusuario").val();
			$.ajax({
				type : "POST",
				url : 'MostrarConversaciones',
				data : {idusuario:idusuario}
			}).done(function(info){
				$("#conversacion").html(info);
				$("#conversacion p:last-child").css({"background-color": "lightgreen",
					"padding-bottom": "20px"});
				var altura =$("#conversacion").prop("scrollHeight");
				$("#conversacion").scrollTop(altura);
			});
		}
		$("#borrarmensajes").on("click",function(){

			var valor = $("#valor").val(0);
			var idusuarioborr = $("#idusuario").val();
			confirmar=confirm("¿Esta seguro que desea borrar todos los mensajes?");
			if (confirmar) {
				valor.val(1);
			}
			var valorcar = valor.val();
			var data = { "idusuario":idusuarioborr,"valor":valorcar};
			$.ajax({
				url : "BorrarMensajes",
				type: "POST",
				dataType : "json",
				data : data
			})

		});
	</script>
	</body>
</div>
</html>
