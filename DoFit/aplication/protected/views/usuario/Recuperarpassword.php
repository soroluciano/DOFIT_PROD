<script type="text/javascript">

    $( window ).load(function() {
        info();
    });
</script>

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
                    <a href="../getting-started/">Getting started</a>
                </li>
                <li>
                    <a href="../css/">CSS</a>
                </li>
                <li>
                    <a href="../components/">Components</a>
                </li>
                <li>
                    <a href="../javascript/">JavaScript</a>
                </li>
                <li>
                    <a href="../customize/">Customize</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://themes.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Themes');">Themes</a></li>
                <li><a href="http://expo.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Expo');">Expo</a></li>
                <li><a href="http://blog.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Blog');">Blog</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="form">
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- <p class="note">Campos con <span class="required">*</span> son requeridos.</p>  -->
        <div class="row">
            <div class="col-md-6">
                <h2 class="bs-docs-featurette-title">Recuperar contraseña</h2>
                <br>
                <div> Ingrese el mail de cual desea recuperar la contraseña</div>
                <br>
                <?php
                ?>
                <div class="form-group">
                    <form action="">
                        <input type="text" name="email" id="email" class="form-control" placeholder="email"></input>
                        <br/>
                        <input type="button" value="Enviar" class="btn btn-primary" id="enviardatos" name="Enviar"></input>
                    </form>
                    <?php
                    echo "<div class='modal fade'  id='usuarioerroneo' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
								    <div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close' onClick='location.reload();'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title' id='myModalLabel'>Recuperar contraseña</h4>
											</div>
											<div class='modal-body'>
											El usuario ingresado no est&aacute; registrado.
											</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-primary' data-dismiss='modal'>Aceptar</button>
										</div>
										</div>
									</div>
								</div>
								</div>";


                    echo "<div class='modal fade'  id='usuarioexitoso' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
								    <div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title' id='myModalLabel'>Recuperar contraseña</h4>
											</div>
											<div class='modal-body'>
											Se envió un mail a su cuenta para recueperar su contraseña.
											</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-primary' data-dismiss='modal'>Aceptar</button>
										</div>
										</div>
									</div>
								</div>";

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#enviardatos").on("click",function(){
        var email = $('#email').val();
        var data = {'email':email};
        $.ajax({
            url :  baseurl + '/usuario/Recuperarpassword',
            type: "POST",
            dataType : "html",
            data : data,
            cache: false,
            success: function (response) {
                if(response == "error"){
                    $('#usuarioerroneo').modal('show');
                }
                if(response == "exitoso") {
                    $('#usuarioexitoso').modal('show');
                }
            } ,
            error: function (e) {
                console.log(e);
            }
        });
    })
</script>