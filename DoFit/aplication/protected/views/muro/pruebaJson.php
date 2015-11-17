<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/muro.js');
?>

<div id="respuesta">
  
  algo
  
</div><br>
<input type='button' onclick='recuperarJson();' value='buscar'/>




