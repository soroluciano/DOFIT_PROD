<?php
    $baseUrl = Yii::app()->baseUrl; 
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl.'/js/perfil.js');
?>
<style type="text/css">
	.messages {
			float: left;
			width: 85%;
	}
	.showImage{
		width:15%;float:left;
	}
	.showImage img{
		width:100%;
	}
	#upload-file-container{
		cursor: pointer;
		font-size: 14px;
		height: 30px;
		text-shadow: 0 1px rgba(0, 0, 0, 0.1);
		text-transform: uppercase;
		background-image:url('<?php echo Yii::app()->request->baseUrl; ?>/img/subir.png');
		width:100px;
		float:left;
		margin-top:4px;
		margin-right:6px;
		border:1px solid #4a8bf5;
	}
	
	#imagen{
	   filter: alpha(opacity=0);
	   opacity: 0;
	}
	
	.info{
		width: 100%; font-size: 12px; color: rgb(0, 0, 0); height: 30px;
	}
	
	.messages span {
		color: #4a8bf5 !important;
		font-size: 12px !important;
		width: 100% !important;
	}
</style>

<div id="alert">
    <h1>soy un alert</h1>
    <br>
    <p>este alert no se debe ver a menos que se toque el botón</p>
</div>
<input type="button" id="openAlert" oncliclick="openAlert();"/>