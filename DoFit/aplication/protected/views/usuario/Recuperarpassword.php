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
            <img class="first-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/nadar.jpg" alt="First slide">
        </div>
    </div>
</div>


<div class="form">
 <div class="container">	
	<!-- <p class="note">Campos con <span class="required">*</span> son requeridos.</p>  -->
			<div class="row">
				<div class="col-md-6">
					<h2 class="bs-docs-featurette-title">Recuperar contraseña</h2>
	                <br>
					<div> Ingrese el mail de cual desea recuperar la contraseña</div>
					<br>
                   <div class="form-group">
                       <?php echo CHtml::beginForm('Recuperarpassword2','post'); ?>
					  <?php echo CHtml::activeTextField($usuario,'email',array('class'=>"form-control",'placeholder'=>"email",'id'=>"exampleInputEmail1")); ?>
					    <?php echo CHtml::error($usuario,'email'); ?> 
					  <?php echo CHtml::submitButton('Enviar'); ?>                     
					 <?php echo CHtml::endForm(); ?>      					  
                   </div>
				</div> 
		</div>		
</div>				
			