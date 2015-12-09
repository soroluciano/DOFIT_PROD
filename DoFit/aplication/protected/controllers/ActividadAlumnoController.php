<?php
require('protected/extensions/apimercadopago/lib/mercadopago.php');

class ActividadAlumnoController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public function actionAceptarAlumno($id)
    {
        $aa = ActividadAlumno::model()->find('id_usuario=:id_usuario', array(':id_usuario' => $id));
        $aa->id_estado = 1;
        $aa->update();
        $this->redirect('../../institucion/home');
    }

    public function actionCancelarAlumno($id)
    {
        $aa = ActividadAlumno::model()->find('id_usuario=:id_usuario', array(':id_usuario' => $id));
        $aa->delete();
        $this->redirect('../../institucion/home');
    }

    public function actionVeractividades($id)
    {
        $id_usuario = $id;
        $id_institucion = Yii::app()->user->id;
        $actividades_alumno = ActividadAlumno::model()->findAllByAttributes(array('id_usuario' => $id_usuario,'id_estado'=>1));
        if ($actividades_alumno != null) {
            $this->render('Veractividades', array('actividades_alumno' => $actividades_alumno));
        }
    }

    public function actionDesafectarActividad()
    {

        $idactividad = $_POST['idactividad'];
        $idusuario = $_POST['idalumno'];
        $pago = Pago::model()->findByAttributes(array('id_actividad'=>$idactividad, 'id_usuario'=>$idusuario));
        $act_alum = ActividadAlumno::model()->findByAttributes(array('id_actividad'=>$idactividad, 'id_usuario'=>$idusuario));
        if($act_alum != null){
            if($pago != null){
                $pago->delete();
            }
            $act_alum->delete();
            echo "ok";
        }
    }

    // Consulto las instituciones a la que esta inscripto el alumno
    public function actionListadoActividades()
    {
        $id_usuario = Yii::app()->user->id;
        $criteria = new CDbCriteria;
        if(isset(Yii::app()->session['id_usuario'])){
            $instituciones = Yii::app()->db->createCommand('select id_institucion,nombre from ficha_institucion WHERE id_institucion IN(SELECT id_institucion from actividad where id_actividad IN(SELECT id_actividad from actividad_alumno WHERE id_usuario ='.$id_usuario.' AND id_estado = 1 ))')->queryAll();
            $this->render('ListadoActividadesAlumno',array('instituciones'=>$instituciones));
        }
        else{
            $this->redirect(array(Yii::app()->homeUrl));
        }
    }

    // Consulto las actividades que esta inscripto el alumno según la institución
    public function actionConsultarActividades()
    {
        $id_institucion = $_POST['idinstitucion'];
        $ficha_institucion = FichaInstitucion::model()->findByAttributes(array('id_institucion'=>$id_institucion));
        $id_usuario = Yii::app()->user->id;
        $actividadesalumno = ActividadAlumno::model()->findAllByAttributes(array('id_usuario'=>$id_usuario,'id_estado'=>1));
        if($actividadesalumno != NULL){
            echo "<br/>";
            echo "<br/>";
            echo "<table class='table table-hover'>
			       <thead>
				     <tr>
					 <td><b>Deporte</b></td><td><b>Días y Horarios</b></td><td><b>Profesor</b></td><td><b>Valor Mensual</b></td><td><b>Mercado Pago</b></td>
					 </tr>
				   </thead>
			      <tbody>";
            foreach($actividadesalumno as $actalum){
                $mp = new MP('5074134695637543', 'JBGhJiQy7dn5BOUzIH2jNYEpQiY3L1hB');
                $diashorarios = array();
                $cont = 0;
                echo "<tr>";
                $act = Actividad::model()->findByAttributes(array('id_actividad'=>$actalum->id_actividad,'id_institucion'=>$id_institucion));
                if( $act != NULL){
                    $diashorariosact = "";
                    $deporte = Deporte::model()->findByAttributes(array('id_deporte'=>$act->id_deporte));
                    $diashorarios = ActividadHorario::model()->findAllByAttributes(array('id_actividad'=>$act->id_actividad));
                    $fichausuario = FichaUsuario::model()->findByAttributes(array('id_usuario'=>$act->id_usuario));
                    echo "<td id='deporte'>".$deporte->deporte ."</td>";
                    echo "<td id='diahor'>";
                    foreach($diashorarios as $diashor){
                        $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
                        $id_dia = $diashor->id_dia-1;
                        echo $dias[$id_dia]."&nbsp;".$diashor->hora .':'.($diashor->minutos == '0' ? '0'.$diashor->minutos : $diashor->minutos)."&nbsp&nbsp";
                        $diashorariosact = $diashorariosact . $dias[$id_dia]."&nbsp;".$diashor->hora .':'.($diashor->minutos == '0' ? '0'.$diashor->minutos : $diashor->minutos). "&nbsp";
                    }
                    echo "</td>";
                    echo "<td id='prof'>".$fichausuario->nombre ." ".$fichausuario->apellido ."</td>";
                    echo "<td id='valoract'>". $act->valor_actividad ."</td>";
                    $deporte = $ficha_institucion->nombre . "&nbsp-&nbsp" . $deporte->deporte . " (". $diashorariosact . ")";
                    $datosactividadmp = array(
                        "items" => array(
                            array(
                                "title" =>$deporte,
                                "quantity" => 1,
                                "currency_id" => "ARS",
                                "unit_price" =>intval($act->valor_actividad)
                            )
                        )
                    );
                    $botonactividadmp = $mp->create_preference($datosactividadmp);
                    echo "<td><a href=". $botonactividadmp['response']['init_point']." class='btn btn-primary'>Pagar con Mercado Pago </a></td>";
                }
                echo "</tr>";
            }
            echo "</tbody>
			     </table>";
        }
    }
}
?>
