<?php


class UsuarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','SeleccionarLocalidad'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				/*'actions'=>array('create','update'),*/
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular usuario.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	  date_default_timezone_set('America/Argentina/Buenos_Aires');
		$model= new Usuario;
        $send = new SendEmailService;
        $ficha_usuario = new FichaUsuario;
	    $localidad = new Localidad;
	    $estado = new Estado;
		
		// Uncomment the following line if AJAX validation is needed
	    $this->performAjaxValidation(array($model,$ficha_usuario));

		if(isset($_POST['Usuario'],$_POST['FichaUsuario'],$_POST['Localidad'])){
		   $model->attributes = $_POST['Usuario'];
		   $ficha_usuario->attributes = $_POST['FichaUsuario'];
		   $localidad->attributes = $_POST['Localidad'];

		   $passoriginal = $_POST['Usuario']['password'];
		   $_SESSION['passoriginal'] = $passoriginal;

		   $model->password = md5($model->password);
		   $model->fhcreacion = new CDbExpression('NOW()');
	       $model->fhultmod = new CDbExpression('NOW()');
		   $model->cusuario = $model->email;
		   
		   $estado = Estado::model()->findByPk(0);
           $model->id_estado = $estado->id_estado;
           
		   $localidad->fhcreacion = new CDbExpression('NOW()');          
		   $localidad->fhultmod = new CDbExpression('NOW()');
           $localidad->cusuario = $model->email;	
		   
		   $ficha_usuario->fhcreacion = new CDbExpression('NOW()');           
	       $ficha_usuario->fhultmod = new CDbExpression('NOW()');
           $ficha_usuario->cusuario = $model->email;
           $ficha_usuario->id_localidad = $_POST['Localidad']['id_localidad']; 	   
	       $mail = $model->email;
		   
			// valido los modelos
			$validarusuario = $model->validate();			
		    $validarficha = $ficha_usuario->validate();
		
	    if($validarusuario && $validarficha){		 
		    if($model->save()){
	      	   $usuario = Usuario::model()->findByAttributes(array('email'=>$mail));		 
			   $ficha_usuario->id_usuario = $usuario->id_usuario;
			  if($ficha_usuario->save())
				  unset($_SESSION['passoriginal']);
                  $send->Send($model->email);
			      $this->redirect(array('view','id'=>$model->id_usuario));
		    }	
		}

	  }
	 
    	 
		$this->render('create',array(
			'model'=>$model,
			'ficha_usuario'=>$ficha_usuario,
			'localidad'=>$localidad
		));
	
  }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_usuario));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSeleccionarLocalidad()
	{

	 $id_provincia = $_POST['Localidad']['id_provincia'];
	 $localidades = Localidad::model()->findAll('id_provincia= :id_provincia',array(':id_provincia'=>$id_provincia));
	 $localidades = CHtml::listData($localidades,'id_localidad','localidad');
	  
	  echo CHtml::tag('option',array('value'=>''),'Seleccione una localidad',true);
	 
	 foreach ( $localidades as $valor=>$localidadessel){
		 
		 echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($localidadessel),true);
	  }	 
	
    } 
	
	
}
