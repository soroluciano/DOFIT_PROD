<?php

class DeporteController extends Controller
{
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
	public function actionCreate()
	{
		$model=new Deporte;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        if (!isset(Yii::app()->session['admin'])){
            if (isset(Yii::app()->session['id_usuario'])) {
                $this->redirect('../site/index');
            }
            else{
                $this->redirect('../site/loginadmin');
            }


         }
		if(isset($_POST['Deporte']))
		{
			$model->attributes=$_POST['Deporte'];
            $model->cusuario = "sysadmin";
            $model->fhcreacion = new CDbExpression('NOW()');
            $model->fhultmod = new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
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

        if ( !isset(Yii::app()->session['admin'])){
            if (isset(Yii::app()->session['id_usuario'])) {
                $this->redirect('../site/index');
            }
            else{
                $this->redirect('loginadmin');
            }
        }

        // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Deporte']))
		{
			$model->attributes=$_POST['Deporte'];
            $model->cusuario = "sysadmin";
            $model->fhcreacion = new CDbExpression('NOW()');
            $model->fhultmod = new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('index'));
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
        if ( !isset(Yii::app()->session['admin'])){
            if (isset(Yii::app()->session['id_usuario'])) {
                $this->redirect('../site/index');
            }
            else{
                $this->redirect('loginadmin');
            }
        }

        $this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        if ( !isset(Yii::app()->session['admin'])){
            if (isset(Yii::app()->session['id_usuario'])) {
                $this->redirect('../site/index');
            }
            else{
                $this->redirect('loginadmin');
            }
        }
        $deporte =Deporte::model()->findAll();

        $this->render('index',array(
            'deporte'=>$deporte,
		));
	}



	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Deporte('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Deporte']))
			$model->attributes=$_GET['Deporte'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Deporte the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Deporte::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Deporte $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='deporte-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
