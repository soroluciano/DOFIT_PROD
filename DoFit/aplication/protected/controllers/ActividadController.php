<?php

class ActividadController extends Controller
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
	 * Displays a particular model.
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
	public function actionCrearActividad()
	{
        $usuarioins = Institucion::model()->findByPk(Yii::app()->user->id);
        $actividad = new Actividad;
	    $deporte = new Deporte;
	    $actividad_horario = new ActividadHorario;   
   	
        if(isset($_POST['Actividad'],$_POST['ActividadHorario'])){
            
			$actividad->attributes = $_POST['Actividad'];
            //$actividad_horario->attributes = $_POST['ActividadHorario'];
            $actividad->id_institucion = $usuarioins->id_institucion;
            $actividad->fhcreacion = new CDbExpression('NOW()');
            $actividad->fhultmod = new CDbExpression('NOW()');
            $actividad->cusuario = $usuarioins->email;
            if($actividad->save()){ 
			    
				$dias = implode(",",$_POST['ActividadHorario']);
				$actividad_horario->attributes = $_POST['ActividadHorario'];
		
				$actividad_horario->id_dia = $dias;
                echo $actividad_horario->id_dia;

                $actividad_horario->id_actividad = $actividad->id_actividad;
                $actividad_horario->fhcreacion = new CDbExpression('NOW()');
                $actividad_horario->fhultmod = new CDbExpression('NOW()');
                $actividad_horario->cusuario = $usuarioins->email;
                if($actividad_horario->save()){
                    echo "Se creo la actividad correctamente";
		 }		  
	   }
    }
	    $this->render('CrearActividad',array('deporte'=>$deporte,'actividad'=>$actividad,'actividad_horario'=>$actividad_horario));
	   
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

		if(isset($_POST['Actividad']))
		{
			$model->attributes=$_POST['Actividad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_actividad));
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
		$dataProvider=new CActiveDataProvider('Actividad');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Actividad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Actividad']))
			$model->attributes=$_GET['Actividad'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Actividad the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Actividad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Actividad $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='actividad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionInscripcionActividad()
	{
	  if(!Yii::app()->user->isGuest){
	   //Es un usuario logueado.
        $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
      }
	   if(isset($_GET['id_actividad'])){
		$actialum = new ActividadAlumno;
	    $id_actividad = $_GET['id_actividad'];
		$id_usuario = $usuario->id_usuario;
		$actialum->id_usuario = $id_usuario;
		$actialum->id_actividad = $id_actividad;
		$actialum->id_estado = 0;
		$actialum->fhcreacion = new CDbExpression('NOW()'); 
		$actialum->fhultmod = new CDbExpression('NOW()');
		$actialum->cusuario = $usuario->email;
	    if($actialum->validate()){
			 if($actialum->save()){
				 ?><script> alert("Se inscribio a la actividad correctamente");</script><?php
			}
		 }		
      }
	  $criteria = new CDbCriteria;
      $criteria->select = 't.id_actividad,t.id_deporte,t.id_institucion,t.id_usuario,t.valor_actividad';
      $criteria->condition = 't.id_actividad NOT IN (SELECT id_actividad FROM actividad_alumno WHERE id_usuario ='.$usuario->id_usuario.')';
	  $actividades = Actividad::model()->findAll($criteria);
	  $this->render('InscripcionActividad',array('actividades'=>$actividades,));
	}	 
}
