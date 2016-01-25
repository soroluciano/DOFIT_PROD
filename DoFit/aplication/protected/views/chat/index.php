<html>
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
								  echo $ficha->nombre."&nbsp".$ficha->apellido;
								  
								} ?></a></li>
                <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
            </ul>
        </nav>
    </div>
</header>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
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
                            if(isset(Yii::app()->session['id_usuario'])){
                                if($usuario->id_perfil == 1){
                                    $actividades_alumno = ActividadAlumno::model()->findAllByAttributes(array('id_usuario'=>Yii::app()->user->id,'id_estado'=>1));
                                    if($actividades_alumno != NULL){
                                        echo "<label for='user'>Profesores</label>";
                                        $id_prof_ant = array();
                                        $cant = 0;
                                        $id_prof_ant[0] = 0;
                                        foreach($actividades_alumno as $actalu){
                                            $actividad = Actividad::model()->findByAttributes(array('id_actividad'=>$actalu->id_actividad));
                                            if($actividad != NULL) {
                                                $usuarioprof = Usuario::model()->findByAttributes(array('id_perfil'=>2,'id_usuario'=>$actividad->id_usuario,'id_estado'=>1));
                                                if($usuarioprof != NULL && !(in_array($usuarioprof->id_usuario,$id_prof_ant))){
                                                    $cant++;
                                                    $id_prof_ant[$cant] = $usuarioprof->id_usuario;
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
                                    $actividadesalumno = ActividadAlumno::model()->findAllByAttributes(array('id_usuario'=>Yii::app()->user->id,'id_estado'=>1));
                                    if($actividadesalumno != NULL){
                                        echo "<label for='user'>Alumnos</label>";
                                        $id_alum_ant = array();
                                        $cant = 0;
                                        $id_alum_ant[0] = 0;
                                        foreach($actividadesalumno as $actialum){
                                            $criteria = new CDbCriteria;
                                            $criteria->condition = 'id_actividad =:idactividad AND id_usuario !=:idusuario AND id_estado=:idestado';
                                            $criteria->params = array(':idactividad'=>$actialum->id_actividad,':idusuario'=>Yii::app()->user->id,':idestado'=>1);
                                            $alumnos = ActividadAlumno::model()->findAll($criteria);
                                            if($alumnos != NULL){
                                                foreach($alumnos as $alum){
                                                    if(!(in_array($alum->id_usuario,$id_alum_ant))){
                                                        $cant++;
                                                        $id_alum_ant[$cant] = $alum->id_usuario;
                                                        $fichaalum = FichaUsuario::model()->findByAttributes(array('id_usuario'=>$alum->id_usuario));
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
                                        }
                                    }
                                } // llave final para ver el perfil de chat del alumno

                                if($usuario->id_perfil == 2) {
                                    // Profesor : Traigo todos los compañeros de las instituciones donde esta inscripto.
                                    $profesor_institucion = ProfesorInstitucion::model()->findAllByAttributes(array('id_usuario'=>Yii::app()->user->id,'id_estado'=>1));
                                    if($profesor_institucion != NULL){
                                        echo "<label for='user'>Profesores</label>";
                                        $idprofant = array();
                                        $cant = 0;
                                        $idprofant[0] = 0;
                                        foreach($profesor_institucion as $prof_ins){
                                            $criteria = new CDbCriteria;
                                            $criteria->condition = 'id_institucion =:idinstitucion AND id_usuario !=:idusuario AND :idestado = 1';
                                            $criteria->params = array(':idinstitucion'=>$prof_ins->id_institucion,':idusuario'=>Yii::app()->user->id,':idestado'=>1);
                                            $profesores = ProfesorInstitucion::model()->findAll($criteria);
                                            if($profesores != NULL){
                                                foreach($profesores as $prof){
                                                    if(!in_array($prof->id_usuario, $idprofant)){
                                                        $cant++;
                                                        $idprofant[$cant] = $prof->id_usuario;
                                                        $datosprofesor = FichaUsuario::model()->findByAttributes(array('id_usuario'=>$prof->id_usuario));
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
                                        }
                                    }
                                    // Profesor : Traigo todos los alumnos de las actividades que enseña.
                                    $actividad = Actividad::model()->findAllByAttributes(array('id_usuario'=>Yii::app()->user->id));
                                    if($actividad != NULL){
                                        echo "<label for='user'>Alumnos</label>";
                                        $idalumant = array();
                                        $cant = 0;
                                        $idalumant[0] = 0;
                                        foreach($actividad as $act){
                                            $actividad_alumno = ActividadAlumno::model()->findAllByAttributes(array('id_actividad'=>$act->id_actividad,'id_estado'=>1));
                                            if($actividad_alumno != NULL){
                                                foreach($actividad_alumno as $actalum){
                                                    $usuarioalumno = Usuario::model()->findByAttributes(array('id_perfil'=>1,'id_usuario'=>$actalum->id_usuario,'id_estado'=>1));
                                                    if($usuarioalumno != NULL && !(in_array($usuarioalumno->id_usuario,$idalumant))){
                                                        $cant++;
                                                        $idalumant[$cant] = $usuarioalumno->id_usuario;
                                                        $datosalumno =  FichaUsuario::model()->findByAttributes(array('id_usuario'=>$usuarioalumno->id_usuario));
                                                        if($datosalumno != NULL){
                                                            ?>
                                                            <form action="../chat/Chat" name="formu" id="formu" method="post">
                                                                <input type="hidden" value="<?php echo $datosalumno->id_usuario;?>" name="idusuario"></input>
                                                                <input type="hidden" value="<?php echo $datosalumno->nombre;?>" name="nombre"></input>
                                                                <input type="hidden" value="<?php echo $datosalumno->apellido;?>" name="apellido"></input>
                                                                <input type="submit" id="chat" value="<?php echo $datosalumno->nombre .' '. $datosalumno->apellido;?>"></input>
                                                            </form>
                                                            <br/>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }// llave final del chat para ver perfil del profesor
                            }
                            else
                            {
                                $this->redirect('../site/index');
                            }
                            ?>
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