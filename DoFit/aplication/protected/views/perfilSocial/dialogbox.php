<?php echo CHtml::link('Modificar imagen', "",  // the link for open the dialog
    array(
        'style'=>'cursor: pointer; text-decoration: underline;',
        'onclick'=>"{addFoto(); $('#dialogClassroom').dialog('open');}"));?>
 
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogClassroom',
    'options'=>array(
        'title'=>'Create classroom',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
    ),
));?>
<div class="divForForm">

	<?php
	$this->pageTitle=Yii::app()->name . ' - Subir Imagen';
	$this->breadcrumbs=array(
		'Subir Imagen',
	);
	?>

	<h1>¿Como subir una Imagen con Yii?</h1>
	<?php if(Yii::app()->user->hasFlash("error_imagen")){?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash("error_imagen"); ?>   
	</div>
	<?php }?>
	<?php if(Yii::app()->user->hasFlash("noerror_imagen")){?>
	<div class="flash-success">    
		<?php echo Yii::app()->user->getFlash("noerror_imagen"); ?>    
	</div>
	<?php }?>

	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'imagen-form',
		'enableClientValidation'=>true,
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

		<p class="note">Los Campos con<span class="required">*</span> Son Boligatorios.</p>

		<div class="row">
			<?php echo $form->labelEx($model,'foto'); ?>
			<?php echo $form->fileField($model,'foto'); ?>
			<?php echo $form->error($model,'foto'); ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('Subir Imagen'); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
	<?php if(Yii::app()->user->hasFlash("imagen")){?>
	<div class="flash-success">    
		<?php echo CHtml::image(Yii::app()->request->baseUrl."".Yii::app()->user->getFlash("imagen"));?>    
	</div>
	<?php }?>

</div>
 
<?php $this->endWidget();?>
 
<script type="text/javascript">
// here is the magic
function addFoto()
{
	debugger;
    <?php echo CHtml::ajax(array(
            'url'=>array('perfilSocial/prueba'),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
					debugger;
				 $('#dialogClassroom div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    $('#dialogClassroom div.divForForm form').submit(addClassroom);
                }
                else
                {
					debugger;
                    $('#dialogClassroom div.divForForm').html(data.div);
                   /* setTimeout(\"$('#dialogClassroom').dialog('close') \",3000);*/
                }
 
            } ",
            ))?>;
    return false; 
 
}
 
</script>