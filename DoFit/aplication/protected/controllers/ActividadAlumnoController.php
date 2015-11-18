<?php

class ActividadAlumnoController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public function actionAceptar($id)
    {
        $aa = ActividadAlumno::model()->find('id_usuario=:id_usuario', array(':id_usuario' => $id));
        $aa->id_estado = 1;
        $aa->update();
        $this->redirect('../../institucion/home');
    }

    public function actionCancelar($id)
    {
        $aa = ActividadAlumno::model()->find('id_usuario=:id_usuario', array(':id_usuario' => $id));
        $aa->delete();
        $this->redirect('../../institucion/home');
    }

    public function actionVeractividades($id)
    {
        $id_usuario = $id;
        $id_institucion = Yii::app()->user->id;
        $actividades_alumno = ActividadAlumno::model()->findAllByAttributes(array('id_usuario' => $id_usuario));
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
	
	// Listado de actividades por Alumno
	public function actionListadoActividades()
   	{
	  $id_usuario = Yii::app()->user->id;
	  $criteria = new CDbCriteria;
	  $instituciones = Yii::app()->db->createCommand('select id_institucion,nombre from ficha_institucion WHERE id_institucion IN(SELECT id_institucion from actividad where id_actividad IN(SELECT id_actividad from actividad_alumno WHERE id_usuario ='.$id_usuario.'))')->queryAll();	  
	  if($instituciones != NULL){
          $this->render('ListadoActividadesAlumno',array('instituciones'=>$instituciones));
	  } 
	}  
}
?>
