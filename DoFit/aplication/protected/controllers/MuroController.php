	
<?php
	/*
        http://ingenierojhonperez.blogspot.com.ar/2013/09/subir-imagen-al-servidor-con-yii.html
        http://www.yiiframework.com/extension/array-data-provider/
    
    */
    




class MuroController extends Controller
{
    public function actionIndex()
    {
      	$Us = Usuario::model()->findByPk(Yii::app()->user->id);
        
        
        
        
        //$dataProvider = new CArrayDataProvider($arrayData);
        
        
        $this->render('index',array('posts'=>$Us));
        
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
		
		public function actionPrueba()
    {
		/*		$user = Yii::app()->db->createCommand()
				->select('id, username, profile')
				->from('tbl_user u')
				->join('tbl_profile p', 'u.id=p.user_id')
				->where('id=:id', array(':id'=>$id))
				->queryRow();
		*/
			/* index de todos  los posts ordenados que un usuario puede ver al pertenecer a una actividad*/
    /*
		 *actividad
			respuesta
			usuario
			perfil_social
			perfil_muro_profesor
			
			EJEMPLO
            $criteria = new CDbCriteria;
            $criteria->condition = 'id_localidad = :localidad and id_institucion IN (select id_institucion from actividad where id_deporte = :deporte)';
            $criteria->params = array(':localidad' => $_POST['localidad'], 'deporte' => $_POST['deporte']);
            $gimnasio = FichaInstitucion:: model()->findAll($criteria);
			EJEMPLO
			
			
      */	
				
				
				$Us = Usuario::model()->findByPk(Yii::app()->user->id);
        $query = PerfilMuroProfesor:model()->find    
						
						
						
						
        $this->render('prueba',array('posts'=>$Us));
        
				
				
		}
}

