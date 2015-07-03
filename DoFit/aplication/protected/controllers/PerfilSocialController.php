<?php

class PerfilSocialController extends Controller
{

	public $layout='//layouts/column2';
/*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/



    public function actionPerfilSocialA()
    {



    }

    public function actionPerfilSocialIndex(){
        $this->render('indexA');
    }


    public function actionUpdatePerfilSocial(){
            echo "hola yo soy el callback de perfil social";

    }

    public function actionUpdateImages(){


    }


}
