	
<?php
	/*
        http://ingenierojhonperez.blogspot.com.ar/2013/09/subir-imagen-al-servidor-con-yii.html
        http://www.yiiframework.com/extension/array-data-provider/
    
    */
    




class MuroController extends Controller
{
    public function actionIndexAlumno()
    {
      	$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
        //$dataProvider = new CArrayDataProvider($arrayData);
        
		//$list = Yii::app()->db->createCommand('select nombre,direccion,telfijo,CASE id_dia WHEN 1 THEN "Lunes" WHEN 2 THEN "Martes" WHEN 3 THEN "Miercoles" WHEN 4 THEN "Jueves" WHEN 5 THEN "Viernes" WHEN 6 THEN "Sábado" WHEN 7 THEN "Domingo" END as id_dia,lpad(hora,2,"0") as hora,lpad(minutos,2,"0") as minutos,actividad.id_actividad from ficha_institucion,actividad, actividad_horario where actividad.id_actividad not in (select id_actividad from actividad_alumno where id_usuario = '.Yii::app()->user->id.') and actividad.id_institucion = ficha_institucion.id_institucion and actividad.id_actividad = actividad_horario.id_actividad and ficha_institucion.id_institucion = (select id_institucion from ficha_institucion where id_localidad = ' . $_POST['Localidad']['id_localidad'] . ') and actividad.id_deporte = ' . $_POST['deporte'] . ' order by nombre')->queryAll();
        $list = Yii::app()->db->createCommand('select id_posteo,posteo where id_actividad =' . $_POST['id_actividad']')->queryAll();
       
        $this->render('indexAlumno',array('usuario'=>$Us,'perfilSocial'=>$perfilSocial,'listPosts'=>$list));
        
  
    }
	
	    public function actionIndexProfesor()
    {
      	$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
        //$dataProvider = new CArrayDataProvider($arrayData);
        
        
        $this->render('index',array('usuario'=>$Us,'perfilSocial'=>$perfilSocial));
        
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
				
				
				//$Us = Usuario::model()->findByPk(Yii::app()->user->id);
        //$query = PerfilMuroProfesor:model()->find    
						
						
						
						
        //$this->render('prueba',array('posts'=>$Us));
        
				
				
		}
		
		
		
		
		
		
		
		
		
}

