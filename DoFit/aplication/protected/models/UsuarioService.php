<?php

class UsuarioService
{

	public function createPerfilVacio($UsuId){
		$perfil = new perfilSocial();
		$perfil->id_usuario = $UsuId;
		$perfil->foto1 = '1.png';
		$perfil->descripcion = '¡Escribe algo acerca de tí!';
		$perfil->fhcreacion = new CDbExpression('NOW()');
		$perfil->fhultmod = new CDbExpression('NOW()');
		$perfil->cusuario = $UsuId;
		$perfil->save();


	}


	public function getPerfilFoto1($UsuId){

		$Us = Usuario::model()->findByPk($UsuId);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));

		if($perfilSocial->foto1!=null){
			return $perfilSocial->foto1;
		}
		else{
			return null;
		}

	}

	public function getPerfilFoto2($UsuId){

		$Us = Usuario::model()->findByPk($UsuId);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));

		if($perfilSocial->foto2!=null){
			return $perfilSocial->foto2;
		}
		else{
			return null;
		}

	}

	public function getPerfilFoto3($UsuId){

		$Us = Usuario::model()->findByPk($UsuId);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));

		if($perfilSocial->foto3!=null){
			return $perfilSocial->foto3;
		}
		else{
			return null;
		}

	}

	public function getPerfilFoto4($UsuId){

		$Us = Usuario::model()->findByPk($UsuId);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));

		if($perfilSocial->foto4!=null){
			return $perfilSocial->foto4;
		}
		else{
			return null;
		}

	}

	public function getPerfilFoto5($UsuId){

		$Us = Usuario::model()->findByPk($UsuId);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));

		if($perfilSocial->foto5!=null){
			return $perfilSocial->foto5;
		}
		else{
			return null;
		}

	}

	public function CampoVacio($strcampnom)
	{
		if($strcampnom == ''){
			return true;
		}
		else{
			return false;
		}
	}

	public function validarexpregContraseña($password)
	{
		$expr_regular = "^(?=.*\d{2})(?=.*[A-Z]).{0,20}$^";
		if(strlen($password) < 6  || strlen($password) > 15){
			return 1;
		}

		if(!preg_match($expr_regular,$password)){
			return 2;
		}
	}
}
