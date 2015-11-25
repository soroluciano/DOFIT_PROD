	
<?php

class MuroController extends Controller
{
	
    public function actionIndex()
    {	
			$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
			$resultSet = Yii::app()->db->createCommand("select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario =".$usuario->id_usuario." order by pmp.fhcreacion desc,pmp.fhultmod desc")->queryAll();
			
			
			if($usuario->id_perfil == 1){
				$this->render('indexAlumno',array('resultSet'=>$resultSet));
			}else{
				$this->render('indexProfesor',array('resultSet'=>$resultSet));
			}
			
			
			
			
    
			//if(){ TODO AGREGAR VALIDACION POR TIPO DE USUARIO
			//	
			//}
		
		
		
		} 
	
		public function actionMensajes()
		{
			$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
			$resultSet = Yii::app()->db->createCommand("select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario =". $usuario->id_usuario ." order by pmp.fhcreacion desc,pmp.fhultmod desc")->queryAll();
			$this->renderPartial('_posts',array('resultSet'=>$resultSet));
		}
	
		public function actionInsertarComentarioProfesor(){
			$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
			$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
			$canal = Canal::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
			$actividad = $_POST['id_actividad'];
			
			$mensaje = $_POST['mensaje'];
						
			if($actividad !=null && $mensaje != null){
				if(is_numeric($actividad)){
		
					$mensajeFilter = mysql_real_escape_string(htmlentities($mensaje));			//le quito las etiquetas html
					//si la persona puede guardar utilizando esa actividad lo dejo guardar	
					$actividadBusqueda  = Yii::app()->db->createCommand("select act.id_actividad from actividad act where act.id_usuario=".$usuario->id_usuario." and act.id_actividad=".$actividad)->queryAll();
				
					if($actividadBusqueda != null){
									
						$muroProfesor = new PerfilMuroProfesor();
						$muroProfesor->posteo = $mensajeFilter;
						$muroProfesor->id_actividad = $actividad;
						$muroProfesor->id_canal = $canal->id_canal;
						$muroProfesor->fhcreacion= new CDbExpression('NOW()');
						$muroProfesor->cusuario="juancito";
						$muroProfesor->save();
						echo "saved";			
					}else{
						throw new ExceptionClass('No se ha podido guardar el comentario');
					}
				
				}else{
						echo "error de actividad";
				}
			}
			
	}
	
	public function actionGetCanales(){
			$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
			$resultSet = Yii::app()->db->createCommand("select c.id_canal,c.nombre,c.id_usuario from canal c join actividad a on c.id_usuario = a.id_usuario join actividad_alumno au on a.id_actividad = au.id_actividad where au.id_usuario =".$usuario->id_usuario." or c.id_usuario=".$usuario->id_usuario)->queryAll();
			
			echo CJSON::encode($resultSet);
			Yii::app()->end();
	
	
	}
	
	
	public function actionGetCanal()
	{
		//$usuario = Usuario::model()->findByPk(Yii::app()->user->id);		
		$canal = Canal::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		echo $canal->nombre;
		
	}
	
	public function actionGetIdCanal()
	{
		$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		$canal = Canal::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		echo $canal->id_canal;
		
	}
	
	
	public function actionInsertarRespuesta()
	{	
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
		
		echo "saved";
		
	}
	
	public function actionGetComentarios()
	{
		$idposteo = $_POST['idposteo'];
		$position = $_POST['position'];
		$response;
		if($position == "" || $position == null){
			$position = 4;
		}else{
			$position+= 4;
		}
		
		$show = false;
		$cantidad_respuestas = Yii::app()->db->createCommand("select count(res.id_respuesta) from respuesta res left join perfil_muro_profesor pm on res.id_posteo = pm.id_posteo left join ficha_usuario fu on res.id_usuario=fu.id_usuario left join perfil_social ps on ps.id_usuario=fu.id_usuario where pm.id_posteo =".$idposteo)->queryAll();
		if($cantidad_respuestas>$position){
			$show=true;
		}
		
		/*falta contar las posiciones para seguir avanzando de acuerdo*/
		
		$respuestas = Yii::app()->db->createCommand("select res.respuesta,fu.nombre,fu.apellido,ps.foto1 from respuesta res left join perfil_muro_profesor pm on res.id_posteo = pm.id_posteo left join ficha_usuario fu on res.id_usuario=fu.id_usuario left join perfil_social ps on ps.id_usuario=fu.id_usuario where pm.id_posteo =".$idposteo." order by res.fhcreacion desc, res.fhultmod desc limit ".$position)->queryAll();
		
		$this->renderPartial('_respuestas',array('respuestas'=>$respuestas,'show'=>$show,'idposteo'=>$idposteo,'position'=>$position));
				
	}
		
		
		
		

	
	
	public function actionPruebaJson() {
			$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
			$resultSet = Yii::app()->db->createCommand("select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario =". $usuario->id_usuario ." order by pmp.fhcreacion desc,pmp.fhultmod desc")->queryAll();
			echo CJSON::encode($resultSet);
			Yii::app()->end();
	}
	
	public function actionPruebaVista()
	{
		$this->render('pruebaJson');
	}

	
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


}

