	
<?php

class MuroController extends Controller
{
    public function actionIndexProfesor()
    {
      	$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
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

	    //$list = Yii::app()->db->createCommand('select id_posteo,posteo where id_actividad =' . $_POST['id_actividad']')->queryAll()');

	   
        $this->render('indexProfesor');
        
  
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

