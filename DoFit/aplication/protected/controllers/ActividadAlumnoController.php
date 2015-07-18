<?php

class ActividadAlumnoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public function actionAceptar($id)
    {
        $aa = ActividadAlumno::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$id));
        $aa->id_estado = 1;
        $aa->update();
        $this->redirect('../../institucion/home');
    }

    public function actionCancelar($id)
    {
        $aa = ActividadAlumno::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$id));
        $aa->delete();
        $this->redirect('../../institucion/home');
    }
}
