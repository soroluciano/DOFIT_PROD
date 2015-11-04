
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/muro.css" rel="stylesheet">

<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/muro.js');
?>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php 

if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
     $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
     $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
  }
  ?>
	<?php $this->renderPartial('_menu'); ?>
  
	<div class="posts">
		<div class="container">		
		
			<div class="row">

			<?php
			echo	$_POST['lista']

			?>
			
			<?php $this->renderPartial('_posts', array('perfilSocial'=>$perfilSocial)); ?>
			</div>
		</div>			
	</div>
  



