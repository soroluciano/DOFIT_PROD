<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../"><img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
            <a href="../" class="navbar-brand"></a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../getting-started/"></a>
                </li>
                <li>
                    <a href="../css/"></a>
                </li>
                <li>
                    <a href="../components/"></a>
                </li>
                <li>
                    <a href="../javascript/"></a>
                </li>
                <li>
                    <a href="../customize/"></a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href='../../'>Principal</a></li>
            </ul>
        </nav>
    </div>
</header>


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel_min slide" data-ride="carousel">
    <div class="carousel-inner_min" role="listbox">
        <div class="item active">
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/8.jpg" alt="First slide">
        </div>
    </div>
</div>
<div class="container">
    <?php
    if(!Yii::app()->user->isGuest){
        //Es un usuario logueado.
        $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
    }else{
        //No está logueado.
        if(isset($_GET['email'])){
            $usuarios = Usuario::model()->findAll();
            foreach($usuarios as $usu){
                if(md5($usu->email) == $_GET['email']){
                    $usuario = $usu;
                    $ficusuario = FichaUsuario::model()->findByAttributes(array('id_usuario'=>$usuario->id_usuario));

                }
            }
        }
        if($usuario){
            //Existe el objeto usuario y lo activo.
            $usuario->id_estado = 1;
            $usuario->saveAttributes(array('id_estado'=>$usuario->id_estado));

            ?>
            <div class="containleft left">
                <div class="table">
                    <div class="tr">
                        <h3 class="sombra">
                            Bienvenido a <b>Do fit!</b>, <?php echo $ficusuario->nombre."&nbsp".$ficusuario->apellido; ?>.<br />
                            Tu cuenta está activada.<br />
                            Ya puedes iniciar sesión en el sitio.
                        </h3>
                    </div>
                </div>
            </div>


            <?php
        }else{
            //No existe el código.
            ?>
            <div class="containleft left">
                <div class="table">
                    <div class="tr">
                        <h3 class="sombra">
                            Asegurate de haber copiado correctamente el link<br />
                            para activar tu cuenta.
                        </h3>
                    </div>
                </div>
            </div>
            <div class="containright right">
                <div class="table">
                    <div class="tr">
                        <div class="login">
                            <?php echo CHtml::link('Volver al Login de DoFit!',array('../aplication'));?><br/><br/>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>