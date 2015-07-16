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
                            <li class="active"><a>Hola! Admin</a></li>
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/10.jpg" alt="First slide">
        </div>
    </div>
</div>

<div class="container">
    <div class='row'>
        <div class=".col-md-6 .col-md-offset-3">
            <a href="../deporte/create" class="btn btn-default text-center">
                Crear deporte
            </a>
        </div>
    </div>

    <?php
    if($deporte != null){
        echo  "<div><h2>Deportes</h2></div>";
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>.</th>
                                <th>.</th>
                            </tr>
                        </thead>";
        foreach($deporte as $d){
            echo "<tbody>
                                <tr>
                                    <td>$d->id_deporte</td>
                                    <td>$d->deporte</td>
                                    <td><a href='../deporte/update/$d->id_deporte' class='btn btn-default'>Modificar<a/></td>
                                    <td><a href='../deporte/delete/$d->id_deporte' class='btn btn-default'>Borrar<a/></td>";
        }
        echo "</tr></tbody>";

    }
    else
    {
        echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No hay gimnasios creados aun</h2>
                        </div>
                    </div>";
    }
    ?>
    <div class="form-group">
        <a href="../site/indexAdmin">Volver</a>
    </div>
</div>