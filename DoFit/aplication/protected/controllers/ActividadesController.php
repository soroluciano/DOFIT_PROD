<?php

class ActividadesController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
	public function actionInscripcion()
	{
	   $deporte = new Deporte;
	   $this->render('Inscripcion',array('deporte'=>$deporte));
	}   

}