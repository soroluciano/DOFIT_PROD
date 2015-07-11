<?php

class InstitucionController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

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
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $model= new Institucion;
        $send = new SendEmailService;
        $ficha_institucion = new FichaInstitucion;
        $localidad = new Localidad;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model,$ficha_institucion));

        if(isset($_POST['Institucion'],$_POST['FichaInstitucion'],$_POST['Localidad'])) {
            $model->attributes = $_POST['Institucion'];
            $ficha_institucion->attributes = $_POST['FichaInstitucion'];
            $localidad->attributes = $_POST['Localidad'];

            $model->fhcreacion = new CDbExpression('NOW()');
            $model->fhultmod = new CDbExpression('NOW()');
            $model->cusuario = "sysadmin";
            $passencr = md5($model->password); // encripto la password en MD5
            
			$localidad->fhcreacion = new CDbExpression('NOW()');
            $localidad->fhultmod = new CDbExpression('NOW()');
            $localidad->cusuario = $model->email;

            $ficha_institucion->fhcreacion = new CDbExpression('NOW()');
            $ficha_institucion->fhultmod = new CDbExpression('NOW()');
            $ficha_institucion->cusuario = $model->email;
            $ficha_institucion->id_localidad = $_POST['Localidad']['id_localidad'];
            $mail = $model->email;


            if ($model->validate() && $ficha_institucion->validate())
            {
                if($model->save()){
                    Institucion::model()->updateAll(array('password'=>$passencr),'email="'.$mail.'"');
					$institucion = Institucion::model()->findByAttributes(array('email'=>$mail));
                    $ficha_institucion->id_institucion = $institucion->id_institucion;
                    if($ficha_institucion->save()){
                      $send->Send($model->email);
			          $this->redirect(array('view','id'=>$model->id_institucion));
                }
            }

        }
	}	
        $this->render('create',array(
            'model'=>$model,
            'ficha_institucion'=>$ficha_institucion,
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
        $ficha_institucion = new FichaInstitucion;
        $ficha_institucion = FichaInstitucion::model()->find('id_institucion=:id_institucion',array(':id_institucion'=>$id));
        $localidad = new Localidad;
        $localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$ficha_institucion->id_localidad));
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if(isset($_POST['Institucion'],$_POST['FichaInstitucion'],$_POST['Localidad']))
        {
            $model->attributes = $_POST['Institucion'];
            $ficha_institucion->attributes = $_POST['FichaInstitucion'];
            if($model->save()){
                if($ficha_institucion->save()){
                    $this->redirect('../index');
                }
            }
        }

        $this->render('update',array(
            'model'=>$model,'ficha_institucion'=>$ficha_institucion,'localidad'=>$localidad
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
        $institucion =Institucion::model()->findAll();
        $this->render('index',array(
            'institucion'=>$institucion,
        ));

    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Institucion('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Institucion']))
            $model->attributes=$_GET['Institucion'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Institucion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Institucion::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Institucion $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='institucion-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
