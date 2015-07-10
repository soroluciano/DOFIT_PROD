<?php

class ActividadesController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
	public function actionInscripcion()
	{
	  if(!Yii::app()->user->isGuest){
	  //Es un usuario logueado.
     	$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
       echo "3";
     }

  	  $actividad = new Actividad;
	   $deporte = new Deporte;
	   $actividad_horario = new ActividadHorario;
	    if(isset($_POST['Actividad'],$_POST['ActividadHorario'])){	   
	    $actividad_alumno = new ActividadAlumno;
		
		$deportesel = $_POST['Actividad']['id_deporte'];
		$institucionsel = $_POST['Actividad']['id_institucion'];
		$horasel = $_POST['ActividadHorario']['hora'];
		$minutosel = $_POST['ActividadHorario']['minutos'];
		
		$actividad->id_deporte = $deportesel;
		$actividad->id_institucion = $institucionsel;
		$actividad->id_usuario = $usuario->id_usuario;
	    $actividad->fhcreacion = new CDbExpression('NOW()');
	    $actividad->fhultmod = new CDbExpression('NOW()');
	    $actividad->cusuario = $usuario->email;
		
        /*if($actividad->save()){
         echo "1";
		}		 
	     */
	   }
	   $this->render('Inscripcion',array('deporte'=>$deporte,'actividad'=>$actividad,'actividad_horario'=>$actividad_horario));
      
	}
  
}