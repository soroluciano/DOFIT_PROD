<?php

class PagoController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionVerificarActividad()
    {
        $var = "";
        //list = Yii::app()->db->createCommand('select deporte as deporte,CASE id_dia WHEN 1 THEN "Lunes" WHEN 2 THEN "Martes" WHEN 3 THEN "Miercoles" WHEN 4 THEN "Jueves" WHEN 5 THEN "Viernes" WHEN 6 THEN "Sábado" WHEN 7 THEN "Domingo" END as id_dia,lpad(hora,2,"0") as hora,lpad(minutos,2,"0") as minutos,actividad.id_actividad from deporte,actividad, actividad_horario where actividad.id_actividad = 126 and actividad.id_actividad = actividad_horario.id_actividad and actividad.id_deporte = deporte.id_deporte');

        $actividad = Actividad::model()->findbyPk('id_actividad = 126');
        //$deporte = Deporte::model()->findByPk('id_deporte= :id_deporte', array(':id_deporte' => $actividad->id_deporte));

        echo $actividad->id_actividad;

    }

    public function actionCrearPago()
    {
        $fu = new FichaUsuario();
        $ac = new Actividad();
        $pa = new Pago();

        IF(isset($_POST['id_usuario']) && isset($_POST['actividad']) && isset($_POST['anio']) && isset($_POST['meses'])){
            $pa->anio = $_POST['anio'];
            $pa->cusuario = 'sysadmin';
            $pa->id_usuario = $_POST['id_usuario'];
            $pa->id_actividad = $_POST['actividad'];
            $pa->fhcreacion =  new CDbExpression('NOW()');
            $pa->fhultmod =  new CDbExpression('NOW()');
            $pa->mes = $_POST['meses'];
            $pa->monto = $_POST['monto'];

            $criteria = new CDbCriteria;
            $criteria->condition = 'id_usuario = :id_usuario and id_actividad = :id_actividad and anio = :anio and mes = :meses';
            $criteria->params = array(':id_usuario' => $_POST['id_usuario'], ':id_actividad' => $_POST['actividad'], ':anio'=> $_POST['anio'], ':meses'=> $_POST['meses']);
            $Actividad = Pago:: model()->findAll($criteria);

            if($Actividad != null){
                echo "duplicado";
            }
            else{
                if($pa->save()){
                    echo "ok";
                }
                else{
                    echo "error";
                }

            }


        }
        else{
            $this->render('CrearPago', array('ficha_usuario' => $fu, 'actividad' => $ac, 'pago' => $pa));
        }


    }

    public function actionSeleccionarActividad()
    {

        $id_usuario = $_POST['FichaUsuario']['id_usuario'];
        $actividades = ActividadAlumno::model()->findAll('id_usuario= :id_usuario', array(':id_usuario' => $id_usuario));
        $actividades = CHtml::listData($actividades, 'id_actividad', 'id_actividad');

        echo CHtml::tag('option', array('value' => ''), 'Seleccione una actividad', true);

        //$deporte = Deporte::model()->findByPk('id_deporte= :id_deporte', array(':id_deporte' => 1));
        //$pepe = $deporte->deporte;
        foreach ($actividades as $valor => $act) {

            echo CHtml::tag('option', array('value' => $valor), 'Actividad número: '.CHtml::encode($act), true);
        }


    }
}

