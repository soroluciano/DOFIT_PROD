<?php

class ActividadesController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
	public function actionInscripcion()
	{
	   $this->render('Inscripcion');
	}   

}