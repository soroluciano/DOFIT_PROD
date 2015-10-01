<script type="text/javascript">
    function Mostrartelefonos(idusuario){
        var idusuario = idusuario;
        var tel = "tel";
        window.open("../profesorinstitucion/Mostrardatos?idusuario="+idusuario+"&tel="+tel+"",'','width=800, height=200');
    }

    function Mostrardireccion(idusuario){
        var idusuario = idusuario;
        var dir = "dir";
        window.open("../profesorinstitucion/Mostrardatos?idusuario="+idusuario+"&dir="+dir+"",'','width=800, height=200');
    }
    
   function Mostraractividad(idusuario){
        var idusuario = idusuario;
        var act = "act";
        window.open("../profesorinstitucion/Mostrardatos?idusuario="+idusuario+"&act="+act+"",'','width=800, height=200');
   }  		
</script>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    $ins = Institucion::model()->findByPk(Yii::app()->user->id);
    $fichains = FichaInstitucion::model()->find('id_institucion=:id_institucion',array(':id_institucion'=>$ins->id_institucion));
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
                    <a href='../institucion/home'> <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Bienvenido! <?php echo $fichains->nombre;?></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraci&oacute;n <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="../ProfesorInstitucion/ListadoProfesores">Ver listado de Profesores</a></li>
                                    <li><a href="../institucion/ListadoAlumnosxInstitucion">Ver listado de Alumnos</a></li>
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/17.jpg" alt="First slide">
        </div>
    </div>
</div>
<div class="container">
    <div class='row'>
        <?php
        $idinstitucion = Yii::app()->user->id;
        $profesores = ProfesorInstitucion::model()->findAll('id_institucion=:id_institucion',array(':id_institucion'=>$idinstitucion));
        if($profesores !=null){
            echo "<div><h2>Profesores inscriptos en la instituci&oacute;n</h2></div>";
            echo "<table class='table table-hover'>
           <thead>
            <tr>
             <tr><th>Nombre</th><th>Apellido</th><th>Dni</th><th>Email</th><th>Sexo</th><th>Fecha Nacimiento</th><th>Tel&eacute;fonos</th><th>Direcci&oacute;n</th><th>Actividades</th><th>Eliminar Profesor</th></tr></thead>";
            foreach($profesores as $prof){
                $profesor = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$prof->id_usuario));
                ?>
                <tbody>
                <tr>
                    <input type="hidden" value="<?php echo $prof->id_usuario?>" name="idprofesor" id="idprofesor"></input>
                    <input type="hidden" name="valor" id="valor"></input>
                    <td id="nombre"><?php echo $profesor->nombre;?></td>
                    <td id="apellido"><?php echo $profesor->apellido;?></td>
                    <td id="dni"><?php echo $profesor->dni; ?></td>
                    <td id="email">
                        <?php
                        $usuario = Usuario::model()->findByAttributes(array('id_usuario'=>$prof->id_usuario));
                        echo $usuario->email;?></td>
                    <td id="sexo">
                        <?php
                        if($profesor->sexo == 'M'){
                            echo "Masculino";
                        }
                        if($profesor->sexo == 'F'){
                            echo "Femenino";
                        }
                        ?>
                    </td>
                    <td id="fecnac">
                        <?php $fechanac = date("d-m-Y",strtotime($profesor->fechanac));
                        echo $fechanac;?>
                    </td>
                    <td><a id="tel" href="" onClick="javascript:Mostrartelefonos(<?php echo $prof->id_usuario;?>);">Ver tel&eacute;fonos</a></td>
                    <td><a id="dir" href="" onClick="javascript:Mostrardireccion(<?php echo $prof->id_usuario;?>);")>Ver direcci&oacute;n</a></td>
                    <td><a id="act" href="" onClick="javascript:Mostraractividad(<?php echo $prof->id_usuario;?>);")>Ver Actividades</td>
					<td><a href="" data-toggle="modal" data-target="#myModal" >Eliminar de la institución</a></td>
                </tr>
                </tbody>
                <?php
                echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close' onClick='location.reload();'><span aria-hidden='true'>&times;</span></button>
                      <h4 class='modal-title' id='myModalLabel'>Inscripción</h4>
                  </div>
                  <div class='modal-body'>
                   ¿Estas seguro que desea elimnar al profesor de la insituci&oacute;n?
                  </div>
                 <div class='modal-footer'>
                  <button type='button' class='btn btn-primary' onclick='Borrarprofesor($prof->id_usuario);'>Si</button>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                </div>
              </div>
            </div>
         </div>";
            }
            echo "</table>";
        }
        else
        {
            echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No hay Profesores asociados a la instituci&oacute;n</h2>
                        </div>
                    </div>";
        }
        ?>
    </div>
</div>

<script type="text/javascript">
    function Borrarprofesor(idprofesor)
    {
        var idprofesor = idprofesor;
        var data = {"idprofesor":idprofesor};
        $.ajax({
            url :  baseurl + "/ProfesorInstitucion/BorrarProfesor",
            type: "POST",
            dataType : "json",
            data : data,
            cache: false
        });

    }
</script>	
	
