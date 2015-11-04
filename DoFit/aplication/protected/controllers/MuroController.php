	
<?php

class MuroController extends Controller
{
    public function actionIndexProfesor()
    {
      	$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		
		
//		http://www.yiiframework.com/forum/index.php/topic/47668-join-query-in-yii-framework/page__view__findpost__p__223069
//		$criteria = new CDbCriteria;
//        $criteria->select = 't.*';
//        $criteria->join ='LEFT JOIN products_categories ON products_categories.products_id = t.products_id';
//        $criteria->condition = 'products_categories.categories_id = :value';
//        $criteria->params = array(":value" => "C1");
//
//
//
//        Product::model()->findAll($criteria);
		
		
	//	$actividad = Actividad::model()->findAll('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
		
	//	$muroProfesor = PerfilMuroProfesor::model()->findAll('id_actividad=:id_actividad',array(':id_actividad'=>$usuario->id_usuario));
		
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
		";*/

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

