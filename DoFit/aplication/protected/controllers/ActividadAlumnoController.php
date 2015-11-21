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
        $instituciones = Yii::app()->db->createCommand('select id_institucion,nombre from ficha_institucion WHERE id_institucion IN(SELECT id_institucion from actividad where id_actividad IN(SELECT id_actividad from actividad_alumno WHERE id_usuario ='.$id_usuario.'))')->queryAll();
        if($instituciones != NULL){
            $this->render('ListadoActividadesAlumno',array('instituciones'=>$instituciones));
        }
    }

    // Consulto las actividades que esta inscripto el alumno según la institución
    public function actionConsultarActividades()
    {
        $id_institucion = $_POST['idinstitucion'];
        $id_usuario = Yii::app()->user->id;
        $actividadesalumno = ActividadAlumno::model()->findAllByAttributes(array('id_usuario'=>$id_usuario,'id_estado'=>1));
        if($actividadesalumno != NULL){
            echo "<br/>";
            echo "<br/>";
            echo "<table class='table table-hover'>
			       <thead>
				     <tr>
					 <td><b>Deporte</b></td><td><b>Días y Horarios</b></td><td><b>Profesor</b></td><td><b>Pagar con Mercado Pago</b></td>
					 </tr>
				   </thead>
			      <tbody>";
            foreach($actividadesalumno as $actalum){
                echo "<tr>";
                $act = Actividad::model()->findByAttributes(array('id_actividad'=>$actalum->id_actividad,'id_institucion'=>$id_institucion));
                if( $act != NULL){
                    $deporte = Deporte::model()->findByAttributes(array('id_deporte'=>$act->id_deporte));
                    $diashorarios = ActividadHorario::model()->findAllByAttributes(array('id_actividad'=>$act->id_actividad));
                    $fichausuario = FichaUsuario::model()->findByAttributes(array('id_usuario'=>$act->id_usuario));
                    echo "<td id='deporte'>".$deporte->deporte ."</td>";
                    echo "<td id='diahor'>";
                    foreach($diashorarios as $diashor){
                        $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
                        $id_dia = $diashor->id_dia-1;
                        echo $dias[$id_dia]."&nbsp;".$diashor->hora .':'.($diashor->minutos == '0' ? '0'.$diashor->minutos : $diashor->minutos)." - ";
                    }
                    echo "</td>";
                    echo "<td id='prof'>".$fichausuario->nombre ." ".$fichausuario->apellido ."</td>";

                }
                echo "</tr>";
            }
            echo "</tbody>
			     </table>";
        }
    }
}
?>
