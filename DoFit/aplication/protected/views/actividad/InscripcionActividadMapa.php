<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(!Yii::app()->user->isGuest){
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
                    <a href='../site/index'><img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Hola!  <?php echo $ficha->nombre."&nbsp".$ficha->apellido; ?></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraci�n <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Anotarme en actividades</a></li>
                                    <li><a href="#">Ver mis actividades</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Privacidad</li>
                                    <li><a href="#">Configuraci�n</a></li>
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/16.jpg" alt="First slide">
        </div>
    </div>
</div>

<div class="container">
    <div class="form">
        <?php echo Yii::import('application.extensions.EGMap.*');
        $gMap = new EGMap();
        $gMap->zoom = 10;
        $mapTypeControlOptions = array(
            'position'=> EGMapControlPosition::LEFT_BOTTOM,
            'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
        );

        $gMap->mapTypeControlOptions= $mapTypeControlOptions;

        $gMap->setCenter(39.721089311812094, 2.91165944519042);

        // Create GMapInfoWindows
        $info_window_a = new EGMapInfoWindow('<div>I am a marker with custom image!</div>');
        $info_window_b = new EGMapInfoWindow('Hey! I am a marker with label!');

        $icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/gazstation.png");

        $icon->setSize(32, 37);
        $icon->setAnchor(16, 16.5);
        $icon->setOrigin(0, 0);

        // Create marker
        $marker = new EGMapMarker(39.721089311812094, 2.91165944519042, array('title' => 'Marker With Custom Image','icon'=>$icon));
        $marker->addHtmlInfoWindow($info_window_a);
        $gMap->addMarker($marker);

        // Create marker with label
        $marker = new EGMapMarkerWithLabel(39.821089311812094, 2.90165944519042, array('title' => 'Marker With Label'));

        $label_options = array(
            'backgroundColor'=>'yellow',
            'opacity'=>'0.75',
            'width'=>'100px',
            'color'=>'blue'
        );

        // SECOND WAY:
        $marker->labelContent= '$425K';
        $marker->labelStyle=$label_options;
        $marker->draggable=true;
        $marker->labelClass='labels';
        $marker->raiseOnDrag= true;

        $marker->setLabelAnchor(new EGMapPoint(22,0));

        $marker->addHtmlInfoWindow($info_window_b);

        $gMap->addMarker($marker);

        // enabling marker clusterer just for fun
        // to view it zoom-out the map
        $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());

        $gMap->renderMap();
        ?>
        <style type="text/css">
            .labels {
                color: red;
                background-color: white;
                font-family: "Lucida Grande", "Arial", sans-serif;
                font-size: 10px;
                font-weight: bold;
                text-align: center;
                width: 40px;
                border: 2px solid black;
                white-space: nowrap;
            }
        </style>
    </div>
</div>
