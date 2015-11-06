	
<?php

class MuroController extends Controller
{
    public function actionIndexProfesor()
    {
			
		//$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		//$criteria = new CDbCriteria;
		//$criteria->select = 't.id_posteo,t.posteo,perfil_social.foto1,ficha_usuario.nombre,ficha_usuario.apellido';
		//$criteria->join .='INNER JOIN actividad on t.id_actividad=actividad.id_actividad INNER JOIN perfil_social on perfil_social.id_usuario = actividad.id_usuario inner join usuario on usuario.id_usuario = actividad.id_usuario INNER JOIN ficha_usuario on ficha_usuario.id_usuario = usuario.id_usuario';
		//$criteria->condition = 'usuario.id_usuario = :value';
		//$criteria->params = array(":value" => 5);
		//$criteria->order = 't.fhcreacion DESC,t.fhultmod desc';
		//$resultSet = PerfilMuroProfesor::model()->findAll($criteria);

	    $resultSet = Yii::app()->db->createCommand('select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario = 5 order by pmp.fhcreacion desc,pmp.fhultmod desc')->queryAll();//.Yii::app()->user->id.''
        $this->render('indexProfesor',array('resultSet'=>$resultSet));

    }
	
	public function actionMensajes(){
		
		$resultSet = Yii::app()->db->createCommand('select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario = 5 order by pmp.fhcreacion desc,pmp.fhultmod desc')->queryAll();//.Yii::app()->user->id.''
		$this->render('_mensajesProfesor',array('resultSet'=>$resultSet));
	}
	
	
	
	public function actionInsertarComentarioProfesor(){
		$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		//$muroProfesor = PerfilMuroProfesor::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		$actividad = $_POST['id_actividad'];
		$mensaje = $_POST['mensaje'];
		
		$muroProfesor = new PerfilMuroProfesor();
		$muroProfesor->posteo = $mensaje;
		$muroProfesor->id_actividad = $actividad;
		
		$muroProfesor->fhcreacion= new CDbExpression('NOW()');
		$muroProfesor->cusuario="juancito";
		$muroProfesor->save();
		
		echo "saved";
	}	
	
	public function actionInsertarRespuestaAlumno(){
		
	}	
	
	public function actionInsertarRespuestaProfesor(){
		
		
	}
	
	public function actionIndexAlumno()
    {
		
    }



}

