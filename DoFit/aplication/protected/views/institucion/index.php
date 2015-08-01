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
                            <li class="active"><a href="#">Index</a></li>
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
    <?php
    if($institucion != null){
        echo  "<div><h2>Gimnasios</h2></div>";
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>.</th>
                                <th>.</th>
                            </tr>
                        </thead>";
        foreach($institucion as $d){
            echo "<tbody>
                                <tr>
                                    <td>$d->id_institucion</td>
                                    <td>$d->email</td>
                                    <td><a href='../institucion/update/$d->id_institucion' class='btn btn-default'>Modificar<a/></td>
                                    <td><a href='../institucion/delete/$d->id_institucion' class='btn btn-default'>Borrar<a/></td>";
        }
        echo "</tr></tbody></table>";

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
    <a href="../institucion/create" class="btn btn-primary btn-lg">
        Crear institución
    </a>
</div>
