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
                    <a class="navbar-brand" href="#">DoFit!</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/estadio-futbol.jpg" alt="First slide">
        </div>
    </div>
</div>

<div class="container">	
	<!-- <p class="note">Campos con <span class="required">*</span> son requeridos.</p>  -->
			<div class="row">
				<div class="col-md-6">
					<h2 class="bs-docs-featurette-title">Recuperar contraseña</h2>
	                <br>
                   <div class="form-group">
				     <div> Ingrese la contraseña que desea establecer para su cuenta</div>
					<?php $email = $_GET['email'];?>
					<form action="../Recuperarpassword3?email=<?php echo $email;?>" method="post">
                         <input type="password" id="pass" name="pass" class="form-control" placeholder="password"></input>  
					   <br>
					   <br>
                      <input type="submit" value="Enviar" class="btn btn-primary"></input>					
					<br/>
				  </div>
			</div>	  
</div>					
</div>
</div>