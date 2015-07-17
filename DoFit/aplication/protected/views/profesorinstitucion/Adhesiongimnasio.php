<?php
if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
	 $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
    }
   /*  $insti = FichaInstitucion::model()->findAll();
	  foreach($insti as $ins){
		      echo $insti->nombre;
     }  
  */
?>