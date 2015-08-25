<div id="modificacion">
    
      <?php $this->renderPartial('_ajaxContent', array('myValue'=>$myValue)); ?>
    
</div>
 
<?php echo CHtml::ajaxButton ("Update data",
                              CController::createUrl('perfilSocial/UpdateAjax'), 
                              array('update' => '#modificacion'));
?>



     