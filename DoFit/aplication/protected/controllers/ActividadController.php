<?php

class ActividadController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
        $this->render('view', array(
            'model' => $this->loadModel($id),
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


        if (isset($_POST['Actividad'])) {

            $actividad->attributes = $_POST['Actividad'];
            //$ficha_profesor = FichaUsuario::model()->findByAttributes(array('nombre' => $_POST['profesor']));
            //$deporte = Deporte::model()->findByAttributes(array('deporte' => $_POST['deporte']));
            //$actividad->id_usuario = $ficha_profesor->id_usuario;
            //$actividad->id_deporte = $deporte->id_deporte;
            $actividad->id_institucion = $usuarioins->id_institucion;
            $actividad->fhcreacion = new CDbExpression('NOW()');
            $actividad->fhultmod = new CDbExpression('NOW()');
            $actividad->cusuario = $usuarioins->email;
            $actividades = 0;
            if ($actividad->save()) {
                $cant = count($_POST['dia']);
                for ($i = 0; $i <= $cant - 1; $i++) {

                    $actividad_horario = new ActividadHorario;
                    $actividad_horario->id_actividad = $actividad->id_actividad;
                    $actividad_horario->id_dia = $_POST['dia'][$i];
                    $actividad_horario->hora = $_POST['hora'][$actividad_horario->id_dia - 1];
                    $actividad_horario->minutos = $_POST['minutos'][$actividad_horario->id_dia - 1];
                    $actividad_horario->fhcreacion = new CDbExpression('NOW()');
                    $actividad_horario->fhultmod = new CDbExpression('NOW()');
                    $actividad_horario->cusuario = $usuarioins->email;
                    if ($actividad_horario->save()) {
                        $actividades++;
                    }
                }
                if ($actividades = $cant) {
                    $this->redirect('CrearActividadOk');

                }
            }
        }

        $this->render('CrearActividad', array('deporte' => $deporte, 'actividad' => $actividad, 'actividad_horario' => $actividad_horario));
    }


    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Actividad'])) {
            $model->attributes = $_POST['Actividad'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_actividad));
        }

        $this->render('update', array(
            'model' => $model,
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
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {

        $this->render('index');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Actividad('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Actividad']))
            $model->attributes = $_GET['Actividad'];

        $this->render('admin', array(
            'model' => $model,
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
        $model = Actividad::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Actividad $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'actividad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionInscripcionActividad()
    {
        $deportes = new Deporte();
        $provincia = new Provincia();
        $localidad = new Localidad();
        // echo "error";
        if (isset($_POST['deporte']) && isset($_POST['provincia']) && isset($_POST['localidad'])) {
            $criteria = new CDbCriteria;
            $criteria->condition = 'id_localidad = :localidad and id_institucion IN (select id_institucion from actividad where id_deporte = :deporte)';
            $criteria->params = array(':localidad' => $_POST['localidad'], ':deporte' => $_POST['deporte']);
            $gimnasio = FichaInstitucion:: model()->findAll($criteria);
            //$locations = '[';
            $i = 1;
            $locations = "";
            foreach ($gimnasio as $gim) {
                $locations = $locations . '["Gimnasio: ' . $gim->nombre . ' Dirección: ' . $gim->direccion . ' Telefono: ' . $gim->telfijo . '"' . ',' . $gim->coordenada_x . ',' . $gim->coordenada_y . ',' . $i++ . ']';

            }
            //$locations = $locations . ']';
            if ($gimnasio == null) {
                echo "error";
            } else {
                echo $locations;
            }

        } else {
            $this->render('InscripcionActividad', array('deportes' => $deportes, 'provincia' => $provincia, 'localidad' => $localidad));

        }


    }


    public function actionListaDeInscripcion()
    {
        if (isset($_POST['deporte']) && isset($_POST['Localidad'])){
            //   $criteria = new CDbCriteria;
            //   $criteria->condition = 'id_localidad = :localidad and id_institucion IN (select id_institucion from actividad where id_deporte = :deporte)';
            //  $criteria->params = array(':localidad'=>$_POST['localidad'],'deporte'=>$_POST['deporte']);
            //  $gimnasio = FichaInstitucion:: model()->findAll($criteria);
            //print_r($_POST['Localidad']['id_localidad']);
            $list = Yii::app()->db->createCommand('select nombre,direccion,telfijo,CASE id_dia WHEN 1 THEN "Lunes" WHEN 2 THEN "Martes" WHEN 3 THEN "Miercoles" WHEN 4 THEN "Jueves" WHEN 5 THEN "Viernes" WHEN 6 THEN "Sábado" WHEN 7 THEN "Domingo" END as id_dia,lpad(hora,2,"0") as hora,lpad(minutos,2,"0") as minutos,actividad.id_actividad from ficha_institucion,actividad, actividad_horario where actividad.id_actividad not in (select id_actividad from actividad_alumno where id_usuario = '.Yii::app()->user->id.') and actividad.id_institucion = ficha_institucion.id_institucion and actividad.id_actividad = actividad_horario.id_actividad and ficha_institucion.id_institucion = (select id_institucion from ficha_institucion where id_localidad = ' . $_POST['Localidad']['id_localidad'] . ') and actividad.id_deporte = ' . $_POST['deporte'] . ' order by nombre')->queryAll();
            //print_r($list);
            // return $list;
            //$this->render('admin');
            $this->render('ListaDeInscripcion', array('list' => $list));
        }
        else{
            $this->render('admin');
        }



    }

    public function actionInscripcionFinal()
    {
        if(isset($_POST['actividad'])){
            $act_alum = new actividadAlumno();
            $act_alum->id_usuario = 1;
            $act_alum->id_estado = 0;
            $act_alum -> id_actividad =  $_POST['actividad'];
            $act_alum->fhcreacion = new CDbExpression('NOW()');
            $act_alum->fhultmod = new CDbExpression('NOW()');
            $act_alum->cusuario = 'sysadmin';
            if ($act_alum->save()){
                echo "error";
            }
            else {
                echo "lolo";
            }
        }
    }
    public function actionCrearActividadOk()
    {
        $deporte = new Deporte();
        $actividad = new Actividad();
        $actividad_horario = new ActividadHorario();
        $this->render('CrearActividadOk', array('deporte' => $deporte, 'actividad' => $actividad, 'actividad_horario' => $actividad_horario));
    }


}
