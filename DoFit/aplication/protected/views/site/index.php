<html>
<head>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet"></link>
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
                <li><a href="">Bienvenido!  
	               <?php if(!Yii::app()->user->isGuest){
	                         //Es un usuario logueado.
	                         $Us = Usuario::model()->findByPk(Yii::app()->user->id); 
	                         $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
                                  echo $ficha->nombre."&nbsp".$ficha->apellido; 
                                }?></a></li>
                <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
            </ul>
        </nav>
    </div>
</header>	
<br>
<br>
<br>
<br>
<br>
<body>
<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
		<div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/1.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2><a href="../actividad/InscripcionActividad" class="btn btn-primary">Inscribite a una actividad</a></h2>
            <p>Inscribite a las actividades que te ofrece DoFit!</p>
        </div>	
        <?php if($Us->id_perfil == 1){
               echo "<div class='col-lg-4'>
                </div>"; 
              }?>  
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/2.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2><a href="../actividadalumno/ListadoActividades" class="btn btn-primary">Actividades que estoy inscripto</a></h2>
            <p>Consulta el estado de tus actividades y pagalas con Mercado Pago. </p>
        </div>
   
        <?php if($Us->id_perfil == 2){ ?>
	    <div class="col-lg-4">
           <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/1.jpg" alt="Generic placeholder image" width="140" height="140">
           <h2><a href="../ProfesorInstitucion/Adhesiongimnasio" class="btn btn-primary">Asociate a una Institución</a></h2>
           <p>Anotate como profesor a una Institución para dictar clases.</a></p>
        </div>
        <div class="col-lg-4">
           <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/1.jpg" alt="Generic placeholder image" width="140" height="140">
           <h2><a href="../ProfesorInstitucion/ListadoActividades" class="btn btn-primary">Actividades que dicto</a></h2>
           <p>Consulta las actividades que das clases y el detalle de los alumnos inscriptos.</a></p>
        </div>     
  <?php } ?>
	    <div class="col-lg-4">
          <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/1.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2><a href="../perfilSocial/" class="btn btn-primary">Red Social de DoFit.</a></h2>
          <p>Ir a la red social de DoFit!</a></p>
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/1.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2><a href="<?php echo Yii::app()->request->baseUrl; ?>/chat/index" class="btn btn-primary">Chat</a></h2>
          <p>Chatea con tus compañeros de clases o con tus profesores y/o alumnos.</a></p>
        </div>  		
    </div>
</div>	
<br/>
<br/>
<br/>
<br/>
</body>
<footer class="footer">
    <div class="container">
        <p>
            &copy; 2015 DoFit.
            &middot;
            <a href="#">Privacidad</a>
            &middot;
            <a href="#">Terminos</a>
        </p>
    </div>
</footer>
</html>
