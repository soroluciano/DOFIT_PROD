<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <div class="container">	
	<!-- <p class="note">Campos con <span class="required">*</span> son requeridos.</p>  -->
			<div class="row">
				<div class="col-md-6">
					<h2 class="bs-docs-featurette-title">Login</h2>
	                <br>
						<div class="form-group">                     						
		                  <?php echo $form->labelEx($model,'username',array('for'=>"exampleInputEmail1")); ?>
		                  <?php echo $form->textField($model,'username',array('class'=>"form-control",'placeholder'=>"email",'id'=>"exampleInputEmail1")); ?>
		                  <?php echo $form->error($model,'username'); ?>
	                      <br>
					    </div>
	                   <div class="form-group"> 		  
                         <?php echo $form->labelEx($model,'password',array('for'=>"exampleInputPassword1")); ?>
		                 <?php echo $form->passwordField($model,'password',array('class'=>"form-control",'placeholder'=>"Password",'id'=>"exampleInputPassword1")); ?>
		                 <?php echo $form->error($model,'password'); ?>
                     </div>
                      <br> 
                      <div class="form-group">
					  <?php echo $form->checkBox($model,'rememberMe');?>
		              <?php echo "<b>No cerrar Sesi&oacute;n</b>"; ?>
		              <?php echo $form->error($model,'rememberMe'); ?>
                      </div> 
               
			      <?php echo CHtml::submitButton('Ingresar a Do Fit!',array("class"=>"btn btn-primary")); ?>
				  <br><br>
						<div>
							<a href="#">¿Olvidaste tu contraseña?</a>
						</div>

      <br>
	 <?php echo CHtml::link('Registrarse',array('usuario/create'));?><br/><br/>

<?php $this->endWidget(); ?>
        </div>
      </div>
 </div>
</div>

