<?php

class ActividadesController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
	public function actionInscripcion()
	{
	   $actividad = new Actividad;
	   $deporte = new Deporte;
	   $actividad_horario = new ActividadHorario;
	    if(isset($_POST['Actividad'])){	   
	    $actividadsel = $_POST['Actividad']['id_deporte'];
		echo $actividadsel;
	   }
	   $this->render('Inscripcion',array('deporte'=>$deporte,'actividad'=>$actividad,'actividad_horario'=>$actividad_horario));
      
	}
  
}