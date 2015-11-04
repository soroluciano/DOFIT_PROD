	
<?php

class MuroController extends Controller
{
    public function actionIndexProfesor()
    {
			
		/*
				$queryPrueba = "select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido
		from Perfil_Muro_Profesor pmp 
		inner join Actividad ac 
		on pmp.id_actividad=ac.id_actividad
		inner JOIN Perfil_Social ps
		on ps.id_usuario = ac.id_usuario
		inner join Usuario usu 
		on usu.id_usuario = ac.id_usuario
		inner join Ficha_Usuario fu 
		on fu.id_usuario= usu.id_usuario
		where usu.id_usuario = 5
		order by pmp.fhcreacion desc,pmp.fhultmod desc
		";
		*/
		

		
//		http://www.yiiframework.com/forum/index.php/topic/47668-join-query-in-yii-framework/page__view__findpost__p__223069
				$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
				$criteria = new CDbCriteria;
        $criteria->select = 't.id_posteo,t.posteo,perfil_social.foto1,ficha_usuario.nombre,ficha_usuario.apellido';
        $criteria->join .='INNER JOIN actividad on t.id_actividad=actividad.id_actividad INNER JOIN perfil_social on perfil_social.id_usuario = actividad.id_usuario inner join usuario on usuario.id_usuario = actividad.id_usuario INNER JOIN ficha_usuario on ficha_usuario.id_usuario = usuario.id_usuario';
        $criteria->condition = 'usuario.id_usuario = :value';
				$criteria->params = array(":value" => $usuario->id_usuario);
				$criteria->order = 't.fhcreacion DESC,t.fhultmod desc';
			  $resultSet = PerfilMuroProfesor::model()->findAll($criteria);

	   
        $this->render('indexProfesor',array('resultSet'=>$resultSet));
        
  
    }
		
	
	public function actionIndexAlumno()
    {
		
		
      	$Us = Usuario::model()->findByPk(Yii::app()->user->id);
				$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
        $actividad = Actividad::model()->find('id_actividad:=id_actividad',array(':id_actividad'=>$perfilSocial->id_actividad));
		
		//$dataProvider = new CArrayDataProvider($arrayData);
        
			$this->render('indexAlumno',array(
					'Us'=>$Us,
					'perfilSocial'=>$perfilSocial,
					'actividad'=>$actividad,
					'muroProfesor'=>$muroProfesor,
					'fichaUsuario'=>$fichaUsuario
				));	
		
  
        /*
            $criteria = new CDbCriteria;
            $total = Post::model()->count();
 
            $pages = new CPagination($total);
            $pages->pageSize = 20;
            $pages->applyLimit($criteria);
 
            $posts = Post::model()->findAll($criteria);
 
            $this->render('index', array(
                'posts' => $posts,
                'pages' => $pages,
            ));*/
    }



}

