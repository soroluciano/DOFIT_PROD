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

    public function actionAceptar($id)
    {
        if(!isset(Yii::app()->session['id_institucion'])){
            if (isset(Yii::app()->session['id_usuario'])) {
                $this->redirect('../site/index');
            }
            else{
                $this->redirect('../site/loginadmin');
            }
        }
        $pi = ProfesorInstitucion::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$id));
        $pi->id_estado = 1;
        $pi->update();
        $this->redirect('../home');
    }

    public function actionCancelar($id)
    {

        $pi = ProfesorInstitucion::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$id));
        $pi->delete();
        $this->redirect('../home');
    }

    public function actionAceptarAlumno($id)
    {

        $pi = ProfesorInstitucion::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$id));
        $pi->id_estado = 1;
        $pi->update();
        $this->redirect('../home');
    }

    public function actionHome()
    {
        $profesor_pen =ProfesorInstitucion::model()->findAll('id_estado = 0 and id_institucion = :id_institucion',array(':id_institucion'=>Yii::app()->user->id));
        $actividades_pen = ActividadAlumno::model()->findAll('id_estado = 0 and id_actividad in (select id_actividad from actividad where id_institucion = :id_institucion)',array(':id_institucion'=>Yii::app()->user->id));
        $this->render('home',array('profesor_pen'=>$profesor_pen,'actividades_pen'=>$actividades_pen));
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

    public function actionListadoAlumnosxInstitucion()
    {
        $this->render('ListadoAlumnosxInstitucion');
    }

    public function actionMostrarTelefonosAlumno()
    {
        $idusuario = $_POST['idusuario'];
        $fichausuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$idusuario));
        echo "<h3>Datos Tel&eacute;fonicos de&nbsp" . $fichausuario->nombre."&nbsp".$fichausuario->apellido."</h3><br/>";
        echo "<table class='table table-hover'>
				<thead>
				<tr><th>Tel&eacute;fono Fijo</th><th>Celular</th><th>Contacto Emergencia</th><th>Tel&eacute;fono Emergencia</th></tr>
				</thead>
				<tbody>
				<tr>";
        echo "<td id='telfijo'>" . substr($fichausuario->telfijo,0,4)."-".substr($fichausuario->telfijo,0,4) . "</td>";
        echo "<td id='celular'>" . $fichausuario->celular . "</td>";
        echo "<td id='conemer'>" . $fichausuario->conemer . "</td>";
        echo "<td id='telemer'>" . substr($fichausuario->telemer,0,4)."-".substr($fichausuario->telemer,-4) . "</td>";
        echo "</tr>
				</tbody>
			</table>";

    }

    public function actionMostrarDireccionAlumno()
    {
        $idusuario = $_POST['idusuario'];
        $fichausuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$idusuario));
        echo "<h3>Datos de domiciliarios de&nbsp;". $fichausuario->nombre."&nbsp".$fichausuario->apellido."</h3><br/>";
        echo "<table class='table table-hover'>
				<thead>
				<tr><th>Direcci&oacute;n</th><th>Piso</th><th>Departamento</th><th>Localidad</th><th>Provincia</th></tr>
				</thead>
				<tbody>
				<tr>";
        echo	"<td id='direccion'>" .  $fichausuario->direccion . "</td>";
        echo	"<td id='piso'>".  $fichausuario->piso . "</td>";
        echo	"<td id='depto'>" . $fichausuario->depto . "</td>";
        echo	"<td id='loca'>";
        $localidad = Localidad::model()->findByAttributes(array('id_localidad'=>$fichausuario->id_localidad));
        echo $localidad->localidad . "</td>";
        echo	"<td id='prov'>";
        $provincia = Provincia::model()->findByAttributes(array('id_provincia'=>$localidad->id_provincia));
        echo $provincia->provincia . "</td>";
        echo "</tr>
				</tbody>
			</table>";
    }
}