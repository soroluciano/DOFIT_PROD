	
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
}

