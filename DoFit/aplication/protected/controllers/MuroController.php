	
<?php

class MuroController extends Controller
{
    public function actionIndex()
    {	
			$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
			$resultSet = Yii::app()->db->createCommand("select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario =". $usuario->id_usuario ." order by pmp.fhcreacion desc,pmp.fhultmod desc")->queryAll();//.Yii::app()->user->id.''
			$this->render('indexProfesor',array('resultSet'=>$resultSet));
    }
	
	public function actionMensajes(){
		$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		$resultSet = Yii::app()->db->createCommand("select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario =". $usuario->id_usuario ." order by pmp.fhcreacion desc,pmp.fhultmod desc")->queryAll();//.Yii::app()->user->id.''
		$this->render('_mensajesProfesor',array('resultSet'=>$resultSet));
	}
	
	
	
	public function actionInsertarComentarioProfesor(){
		$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		$canal = Canal::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		
		
		//$muroProfesor = PerfilMuroProfesor::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		$actividad = $_POST['id_actividad'];
		$mensaje = $_POST['mensaje'];
		
		
		$muroProfesor = new PerfilMuroProfesor();
		$muroProfesor->posteo = $mensaje;
		$muroProfesor->id_actividad = $actividad;
		$muroProfesor->id_canal = $canal->id_canal;
		$muroProfesor->fhcreacion= new CDbExpression('NOW()');
		$muroProfesor->cusuario="juancito";
		$muroProfesor->save();
		
		echo "saved";
	}
	
	public function actionGetCanal(){
		//$usuario = Usuario::model()->findByPk(Yii::app()->user->id);		
		$canal = Canal::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		echo $canal->nombre;
		
	}
	
	public function actionGetIdCanal(){
		$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		$canal = Canal::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		echo $canal->id_canal;
		
	}
	
	
	public function actionInsertarRespuesta(){
		$comentario = $_POST['respuesta'];
		$id_posteo = $_POST['id_posteo'];
		$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		
		$topIdRespuesta;
		
		//if($id_posteo != null && $id_posteo != "" && $res != null && $res != ""){
		$listaRespuesta =  Yii::app()->db->createCommand("select r.id_respuesta from respuesta r where r.id_posteo=".$id_posteo)->queryAll();
		if($listaRespuesta!=null){
			foreach($listaRespuesta as $res ){
				$topIdRespuesta=$res['id_respuesta'];
			}
			$topIdRespuesta++;
		}else{
			$topIdRespuesta=1;
		}
		
		$respuesta = new Respuesta();
		$respuesta->id_posteo = $id_posteo;
		$respuesta->id_usuario  = $usuario->id_usuario;
		$respuesta->respuesta = $comentario;
		$respuesta->id_respuesta = $topIdRespuesta;
		$respuesta->fhcreacion= new CDbExpression('NOW()');
		$respuesta->cusuario="juancito";
		$respuesta->save();
		
		
	}
	
	public function actionIndexAlumno()
    {
		
    }

	public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }


}

