<html>
<head>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/chat.css"></link>
</head>

<?php
if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
    $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
}
?>

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
                    <a href='../'> <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Hola!  <?php echo $ficha->nombre."&nbsp".$ficha->apellido; ?></a></li>
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
<body>
<div class="container-fluid">
    <section  style="padding: 3%;">
        <div class="row" id="centrado">
            <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" alt="First slide">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/img/chat.jpg" id="example2"><img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/chat.jpg" alt="First slide"></img></a>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label for="user"> Seleccione el usuario con el que desea chatear</label>
                <div class="row">
                    <div class="col-md-9">
                        <div class="pantalla">
                            <?php
				        $usuario = Usuario::model()->findByAttributes(array('id_usuario'=>Yii::app()->user->id));
						// Alumno : traigo todos los profesores de las actividades donde esta isncripto.
				if($usuario->id_perfil == 1){							
				       echo "<label for='user'>Profesores</label>";
					   $actividades_alumno = ActividadAlumno::model()->findAllByAttributes(array('id_usuario'=>Yii::app()->user->id));
					    if($actividades_alumno != NULL){
						    $id_usuario_ant_prof = array();
							$cant = 0;
							$id_usuario_ant_prof[0] = 0;						
						foreach($actividades_alumno as $actalu){
							   $actividad = Actividad::model()->findByAttributes(array('id_actividad'=>$actalu->id_actividad)); 
							    if($actividad != NULL) {  
								   $usuarioprof = Usuario::model()->findByAttributes(array('id_perfil'=>2,'id_usuario'=>$actividad->id_usuario));
									if($usuarioprof != NULL && !(in_array($usuarioprof->id_usuario,$id_usuario_ant_prof))){
								       $cant++;
									   $id_usuario_ant_prof[$cant] = $usuarioprof->id_usuario;
									   $fichaprof = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuarioprof->id_usuario));   
								       if($fichaprof!= NULL){
                                           ?>
                                           <form action="../chat/Chat" name="formu" id="formu" method="post">
                                              <input type="hidden" value="<?php echo $usuarioprof->id_usuario;?>" name="idusuario"></input>
                                              <input type="hidden" value="<?php echo $fichaprof->nombre;?>" name="nombre"></input>
                                              <input type="hidden" value="<?php echo $fichaprof->apellido;?>" name="apellido"></input>
                                              <input type="submit" id="chat" value="<?php echo $fichaprof->nombre .' '. $fichaprof->apellido;?>"></input>
                                           </form>
                                    <br/>
                                    <?php
								        }   	
                                    } // llave del if $usuarioprof
                                }
                            }
                        }	
                     // Alumno: traigo todos los compañeros de las actividades donde esta inscripto.
					    $actividadesalumno = ActividadAlumno::model()->findAllByAttributes(array('id_usuario'=>Yii::app()->user->id));
					if($actividadesalumno != NULL){
					    echo "<label for='user'>Alumnos</label>";	
					    $idusuarioant = array();
						$cant = 0;
					    $idusuarioant[0] = 0;
					    foreach($actividadesalumno as $actialum){
                           $alumnos = Yii::app()->db->createCommand('SELECT id_usuario FROM actividad_alumno WHERE id_actividad = '. $actialum->id_actividad . ' AND id_usuario <> ' . Yii::app()->user->id .'')->queryRow();
                            if($alumnos != NULL && !(in_array($alumnos['id_usuario'],$idusuarioant))){						
                                $cant++;
								$idusuarioant[$cant] = $alumnos['id_usuario'];
								$fichaalum = FichaUsuario::model()->findByAttributes(array('id_usuario'=>$alumnos['id_usuario']));
                                if($fichaalum != NULL){
                                       ?>
                                       <form action="../chat/Chat" name="formu" id="formu" method="post">
                                         <input type="hidden" value="<?php echo $fichaalum->id_usuario;?>" name="idusuario"></input>
                                         <input type="hidden" value="<?php echo $fichaalum->nombre;?>" name="nombre"></input>
                                         <input type="hidden" value="<?php echo $fichaalum->apellido;?>" name="apellido"></input>
                                         <input type="submit" id="chat" value="<?php echo $fichaalum->nombre .' '. $fichaalum->apellido;?>"></input>
                                       </form>
                                        <br/>
                                    <?php
                                }
							}						
					    }
				    }  	
			    }  // llave final para ver el perfil de chat del alumno
                
                if($usuario->id_perfil == 2) {
                   // Profesor : Traigo todos los compañeros de las instituciones donde esta inscripto. 					
					echo "<label for='user'>Profesores</label>";
                    $profesor_institucion = ProfesorInstitucion::model()->findAllByAttributes(array('id_usuario'=>Yii::app()->user->id));
                    if($profesor_institucion != NULL){					
					    $idprofant = 0; 
						 foreach($profesor_institucion as $prof_ins){
							$profesor = Yii::app()->db->createCommand('SELECT id_usuario FROM profesor_institucion WHERE id_institucion = '.$profins->id_institucion . 'AND id_usuario <> '. Yii::app()->user->id .';')->queryRow();
                            if($profesor != NULL && $profesor['id_usuario'] != $idprofant){
                                $idprofant = $profesor['idusuario'];
                                $datosprofesor = FichaUsuario::model()->findByAttributes(array('id_usuario'=>$profesor['id_usuario']));
                                if($datosprofesor != NULL){
                                    ?>
                                    <form action="../chat/Chat" name="formu" id="formu" method="post">
                                       <input type="hidden" value="<?php echo $datosprofesor->id_usuario;?>" name="idusuario"></input>
                                       <input type="hidden" value="<?php echo $datosprofesor->nombre;?>" name="nombre"></input>
                                       <input type="hidden" value="<?php echo $datosprofesor->apellido;?>" name="apellido"></input>
                                       <input type="submit" id="chat" value="<?php echo $datosprofesor->nombre .' '. $datosprofesor->apellido;?>"></input>
                                       </form>
                                        <br/>
                                    <?php									
					            }
							}
						 }
					}
					// Profesor : Traigo todos los alumnos de las actividades que enseña.
					$actividad = Actividad::model()->findAllByAttributes(array('id_usuario'=>Yii::app()->user->id));
					if($actividad != NULL){
						$idalumant = 0;
					    foreach($actividad as $act){
						   $actividad_alumno = ActividadAlumno::model()->findByAttributes(array('id_actividad'=>$act->id_actividad));
                           if($actividad_alumno != NULL){
                              $usuarioalumno = Usuario::model()->findByAttributes(array('id_perfil'=>1,'id_usuario'=>$actividad_alumno->id_usuario));							   
					            if($usuarioalumno != NULL && $usuarioalumno->id_usuario != $idalumant){  
					                $idalumant = $usuarioalumno->id_usuario;
                                    $datosalumno =  FichaUsuario::model()->findByAttributes(array('id_usuario'=>$usuarioalumno->id_usuario));
                                    if($datosalumno != NULL){
                                       ?>
                                       <form action="../chat/Chat" name="formu" id="formu" method="post">
                                          <input type="hidden" value="<?php echo $datosalumno->id_usuario;?>" name="idusuario"></input>
                                          <input type="hidden" value="<?php echo $datosalumno->nombre;?>" name="nombre"></input>
                                          <input type="hidden" value="<?php echo $datosalumno->apellido;?>" name="apellido"></input>
                                          <input type="submit" id="chat" value="<?php echo $datosalumno->nombre .' '. $datosprofesor->apellido;?>"></input>
                                        </form>
                                        <br/>
                                    <?php
                                    }
                                }
						    }
                      	}	
                    }						
				}// llave final del chat para ver perfil del profesor ?>  
                        </div>
                    </div>
                </div>
                <br/>
            </div>
        </div>
    </section>
</div>
</div>
</body>
</html>  