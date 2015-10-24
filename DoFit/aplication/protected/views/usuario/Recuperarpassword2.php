<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../../"><img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
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
                <div class="form-group">
                    <div> Ingrese la contraseña que desea establecer para su cuenta</div>
                    <br/>
                    <?php $email = $_GET['email'];?>
                    <form action="">
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="password"></input>
                        <input type="hidden" id="email" value="<?php echo $email?>"></input>
                        <br>
                        <br>
                        <input type="button" value="Enviar" id="recuperarpass" name="recpass" class="btn btn-primary"></input>
                    </form>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
echo "<div class='modal fade'  id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
								    <div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close' onClick='location.reload();'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title' id='myModalLabel'>Recuperar contraseña</h4>
											</div>
											<div class='modal-body'>
											Se actualizo correctamente la contraseña de su cuenta.
											</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-primary' data-dismiss='modal'>Aceptar</button>
										</div>
										</div>
									</div>
								</div>
								</div>";
?>
<script type="text/javascript">
    $("#recuperarpass").on("click",function(){
        var pass = $('#pass').val();
        var email = $('#email').val();
        var data = {'pass':pass,'email':email};
        $.ajax({
            url :  baseurl + '/usuario/Recuperarpassword2',
            type: "POST",
            dataType : "html",
            data : data,
            cache: false,
            success: function (response) {
                if(response == "ok"){
                    $('#myModal').modal('show');
                }
            } ,
            error: function (e) {
                console.log(e);
            }
        });
    })
</script>