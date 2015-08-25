<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" rel="stylesheet">
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.1/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.1/jquery.uploadfile.min.js"></script>
<script type="text/javascript">
    var showLoader;
	var i = 0;
    $(window).load(function(){

        info();
		
		$(function() {
			$('#activator').click(function(){
			$('#overlay').fadeIn(200,function(){
				$('#box').animate({'top':'20px'},200);
			});
			return false;
		});
		$('#boxclose').click(function(){

			});
 
		});




    });

	function activator(){
		$('#overlay').fadeIn(200,function(){
				$('#box').animate({'top':'20px'},200);
		});
	}
	function boxclose(){
		$('#box').animate({'top':'-200px'},500,function(){
			$('#overlay').fadeOut('fast');
		});
	}


    function galeria(){
        debugger;
        showLoader = setTimeout("$('#loadingImage').show()", 300);
        $("#btn_galeria").addClass("active");
        $("#btn_info").removeClass("active");

        $.ajax({
            url: '<?php echo Yii::app()->request->baseUrl;echo'/perfilSocial/galeria ';?>',
            type: 'post',
            //data: { },
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

	function edicionDescripcionForm(){	
       <?php
			$Us = Usuario::model()->findByPk(Yii::app()->user->id);
			$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		?>
		$("#descripcion").html("<form><textarea id='descripcion_inpt' maxlength='500'><?php echo $perfilSocial->descripcion;?></textarea><br><input type='button' class='btn btn-default' id ='btn_save_edicion' value='Guardar' onclick='saveEdicionInfo();'/><input type='button' id='btn_close' class='btn btn-warning' value='Cancelar' onclick='cancelEdit();'/></form>");

	} 
	
	function saveEdicionInfo(){
		debugger;
		var descripcion = $("#descripcion_inpt").val();
		
		showLoader = setTimeout("$('#loadingImage').show()", 300);
        $.ajax({
            url: '<?php echo Yii::app()->request->baseUrl;echo'/perfilSocial/saveInfo ';?>',
            type: 'post',
            data: { descripcion:descripcion},
            success:function(response){
	
				$("#descripcion").html("<div id='descripcion_inpt' onclick='edicionDescripcionForm();'>"+response+"</div>");
				
				//$("#descripcion_inpt").append(res);
            },
            error: function(e){
                $('#logger').html(e.responseText);
            }
        });
		
		
	
	}
	
	function cancelEdit(){
		$("#descripcion").html("<div id='descripcion_inpt' onclick='edicionDescripcionForm();'><?php echo $model->descripcion; ?></div>");	
	}
		
	function saveFotos(){
	
		/*$.ajax({
            url: '<?php echo Yii::app()->request->baseUrl;echo'/perfilSocial/saveInfo ';?>',
            type: 'post',
            data: { descripcion:descripcion},
            success:function(response){
	
				//$("#descripcion").html("<div id='descripcion_inpt' onclick='edicionDescripcionForm();'>"+response+"</div>");
				
				//$("#descripcion_inpt").append(res);
            },
            error: function(e){
                $('#logger').html(e.responseText);
            }
        });
	*/
		
	}
		
	function indexSaveFotos(){
		debugger;
		$.ajax({
            url: '<?php echo Yii::app()->request->baseUrl;echo'/perfilSocial/indexSaveFotos ';?>',
            type: 'post',
            data:{},
            success:function(response){
				$('#subir_foto').html(response);
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
	function addBtn(idbtn){
		debugger;
		if(idbtn!=null){
			opcion = '#im'+idbtn;
			append = '<button id="op'+idbtn+'" class="btn btn-default elevateButton">Modificar Imagen</button>';
			$(opcion).append(append);
		}
	}
	function delbtn(id){
			if(id!=null){
				opcion = '#im'+id+'>#op'+id;
				$(opcion).remove();
		}
		
	}
	function addEdBtn(idbtn,im){
		debugger;
		if (idbtn!=null) {
					imres = '#im'+im;
					append = '<button id = '+idbtn+' class="btn btn-default elevateButton" onmouseout="showHovered('+im+');"" onclick="showHovered('+im+');""  onmousehover="showHovered('+im+');"" >Cargar imagen</button>';
					$(imres).append(append);	
					
		}
	}
	function showHovered(id){
		debugger;
		hovered = "#im"+id;
		$(hovered).toggleClass("hovered");
	}


</script>


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
                    <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Hola! </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Anotarme en actividades</a></li>
                                    <li><a href="#">Ver mis actividades</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Privacidad</li>
                                    <li><a href="#">Configuración</a></li>
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

<!-- Carousel
================================================== -->

<div id="myCarousel" class="carousel_min slide" data-ride="carousel">
    <div class="carousel-inner_min" role="listbox">
        <div class="item active">
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/8.png" alt="First slide">
        </div>
    </div>
</div>

<!--content header--> 
 <?php 
	if(!Yii::app()->user->isGuest){
	    $Us = Usuario::model()->findByPk(Yii::app()->user->id); 
	    $fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
	} 
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
					<?php echo "<div id='descripcion_inpt' onclick='edicionDescripcionForm();'>";
						  echo $model->descripcion; 
						  echo  "</div>"; 
					?>
				</div>

				<br>
				<a href="../site/index" class="btn btn-default text-center">
					Continuar
				</a>
			</div>

		</div>
		
	</div>	
	<div id="seccion_botones">	
			<input type="button" class="btn btn-success active" id ="btn_galeria" onclick="galeria();" value="Mis Fotos"><i class=icon-home></i></input> 
			<input type="button" class="btn btn-success" id ="btn_info" onclick="info();" value="Informaci&oacute;n"><i class=icon-home></i></input> 	
	         
	</div>
	<div id="respuesta_ajax">
		<div id="loadingImage" style="display:none;"><img src="<?php echo Yii::app()->request->baseUrl;echo "/img/722.GIF" ?>"</div>
	</div>
      


