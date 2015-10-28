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
        $dia = "";
        IF(isset($_POST['valor'])){
            $actividad = Actividad::model()->findByPk($_POST['valor']);
            $id_deporte = $actividad->id_deporte;
            $deporte = Deporte::model()->findByPk($id_deporte);
            $actividad_horario = ActividadHorario::model()->findAll('id_actividad = :id',array(':id'=>126));
            $var = 'Deporte: '.$deporte->deporte.' ';
            foreach($actividad_horario as $ah){
                if($ah->id_dia == 1){$dia = "Lunes";};
                if($ah->id_dia == 2){$dia = "Martes";};
                if($ah->id_dia == 3){$dia = "Miercoles";};
                if($ah->id_dia == 4){$dia = "Jueves";};
                if($ah->id_dia == 5){$dia = "Viernes";};
                if($ah->id_dia == 6){$dia = "Sabado";};
                if($ah->id_dia == 7){$dia = "Domingo";};

                $var = $var . ' Dia: '.$dia. ' Horario: '.str_pad($ah->hora,2,'0',STR_PAD_LEFT).':'.str_pad($ah->minutos,2,'0',STR_PAD_LEFT);
            }
            echo $var;

        }

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

