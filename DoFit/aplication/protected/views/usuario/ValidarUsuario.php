<?php 
if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
	$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
}else{
	//No está logueado.
	$usuario = Usuario::model()->findByAttributes(array('email'=>$_GET['email']));
	if($usuario){
		
		//Existe el código, activo el usuario.
		$usuario->id_estado = 1;
	    $usuario->saveAttributes(array('id_estado'=>$usuario->id_estado));

?>
   <div class="containleft left">
        <div class="table">
            <div class="tr">
           
                <h3 class="sombra">
                   Bienvenido a <b>Do fit!</b>, <?php echo $usuario->email; ?>.<br />
                   Tu cuenta está activada.<br />
                   Ya puedes iniciar sesión en el sitio.
                </h3>
            </div>
        </div>
    </div>
    <div class="containright right">
        <div class="table">
            <div class="tr">
                <div class="login">
                  <?php echo CHtml::link('Volver al Login de DoFit!',array('../aplication'));?><br/><br/>
                </div>
            </div>
        </div>
    </div>
    
<?php
	}else{
		//No existe el código.
?>
	 <div class="containleft left">
        <div class="table">
            <div class="tr">
                <h3 class="sombra">
                   Asegurate de haber copiado correctamente el link<br />
                   para activar tu cuenta.
                </h3>
            </div>
        </div>
    </div>
    <div class="containright right">
        <div class="table">
            <div class="tr">
                <div class="login">
                     
                </div>
            </div>
        </div>
    </div>
<?php
	}
}
?>