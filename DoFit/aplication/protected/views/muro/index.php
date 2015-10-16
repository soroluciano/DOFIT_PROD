
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

				<div class="sidebar-nav">
            <div class="well" style="width:300px; padding: 8px 0;">
        		<ul class="nav nav-list"> 
        		  <li class="nav-header">Main</li>        
        		  <li class="active"><a href="index"><i class="icon-home"></i> Dashboard</a></li>
        		  <li><a href="#"><i class="icon-edit"></i> Add Blog Post</a></li>
                  <li><a href="#"><i class="icon-calendar"></i> Calendar</a></li>
        		  <li><a href="#"><i class="icon-user"></i> Members</a></li>
        		  <li><a href="#"><i class="icon-comment"></i> Comments</a></li>
        		  <li><a href="#"><i class="icon-picture"></i> Gallery</a></li>
        		</ul>
        	</div>
        </div>
		
		
			<div class="row">
			<!--	<div class="col-lg-3 col-sm-6">
			<!--
					<div class="card hovercard">
						<div class="cardheader">
						</div>
						<div class="avatar">
							<img alt="" src="http://lorempixel.com/100/100/people/9/">
						</div>
						<div class="info">
							<div class="title">
								<a target="_blank" href="http://scripteden.com/">Script Eden</a>
							</div>
							<div class="desc">Passionate designer</div>
							<div class="desc">Curious developer</div>
							<div class="desc">Tech geek</div>
						</div>
						<div class="bottom">
							<a class="btn-soc btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
								<i class="fa fa-twitter"></i>
							</a>
							<a class="btn-soc btn-danger btn-sm" rel="publisher"
							   href="https://plus.google.com/+ahmshahnuralam">
								<i class="fa fa-google-plus"></i>
							</a>
							<a class="btn-soc btn-primary btn-sm" rel="publisher"
							   href="https://plus.google.com/shahnuralam">
								<i class="fa fa-facebook"></i>
							</a>
							<a class="btn-soc btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
								<i class="fa fa-behance"></i>
							</a>
						</div>
					</div>

				</div>-->

			
			<?php $this->renderPartial('_posts', array('perfilSocial'=>$perfilSocial)); ?>
			</div>
		</div>			
	</div>
  



