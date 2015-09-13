<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    public function actionIndexAdmin()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        // IF(!isset($_SESSION['admin'])){
        if (!isset(Yii::app()->session['admin'])) {
            $this->redirect('loginadmin');
        } else {
            $this->render('indexAdmin');
        }
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionLoginAdmin()
    {
        $model = new LoginFormAdmin;
        $session = new CHttpSession;
        $errorCode = "";

        if (isset(Yii::app()->session['admin'])) {
            $this->redirect('indexAdmin');
        }


        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // validate user input and redirect to the previous page if valid
        if (isset($_POST['LoginFormAdmin'])) {
            $model->attributes = $_POST['LoginFormAdmin'];
            if ($model->login() && $model->validate()) {
                Yii::app()->session->open();
                Yii::app()->session['admin'] = 'admin';
                $this->redirect(array('/site/indexAdmin'));
            } else {
                echo "Datos incorrectos";
            }

        } else {
            $this->render('loginAdmin', array('model' => $model));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }


    /**
     * Displays the login page
     */
    public function actionPrueba()
    {
        $model = new LoginForm;
        if (isset($_POST['email']) && isset($_POST['password']))// && $_POST['email']<>'' && $_POST['password']<>''
        {

            $model->username = $_POST['email'];
            $model->password = $_POST['password'];

            // validate user input and redirect to the previous page if valid
            if ($model->login()) {
                // ...log in the user and redirect
                Yii::app()->session->open();
                Yii::app()->session['id_usuario'] = Yii::app()->user->id;

                $perfil = PerfilSocial::model()->findByPk(Yii::app()->user->id);
                if ($perfil == null) {
                    $usu = new UsuarioService();
                    $usu->createPerfilVacio(Yii::app()->user->id);
                    // $this->redirect(array('/perfilSocial/index'));
                    echo $errorCode = "2";
                } else {
                    //$this->redirect(array('/site/index'));
                    echo $errorCode = "1";
                }
            }
        } else {
            echo $this->render('login', array('model' => $model));
        }


    }


    public function actionLoginInstitucion()
    {
        $model = new LoginFormInstitucion;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginFormInstitucion'])) {
            $model->attributes = $_POST['LoginFormInstitucion'];

            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                // ...log in the user and redirect
                $this->redirect(array('/institucion/home'));
            }
        }
        // display the login form
        $this->render('/site/logininstitucion', array('model' => $model));
    }


    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionLogin()
    {

        $model = new LoginForm();

        if (isset($_POST['email']) && isset($_POST['password']))// && $_POST['email']<>'' && $_POST['password']<>''
        {
            $model->username = $_POST['email'];
            $model->password = $_POST['password'];

            // validate user input and redirect to the previous page if valid

            if ($model->login()) {
                // ...log in the user and redirect
                Yii::app()->session->open();
                Yii::app()->session['id_usuario'] = Yii::app()->user->id;

                $perfil = PerfilSocial::model()->findByPk(Yii::app()->user->id);
                if ($perfil == null) {
                    $usu = new UsuarioService();
                    $usu->createPerfilVacio(Yii::app()->user->id);
                    // $this->redirect(array('/perfilSocial/index'));
                    echo Yii::app()->request->baseUrl . "/perfilSocial/index";
                } else {
                    //$this->redirect(array('/site/index'));
                    echo Yii::app()->request->baseUrl . "/site/index";
                }
            } else {
                echo "error";
            }
        } else {
            $this->render('/site/login', array('model' => $model));
        }

    }
}