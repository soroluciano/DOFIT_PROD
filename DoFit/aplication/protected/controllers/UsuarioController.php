<?php


class UsuarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */


	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','SeleccionarLocalidad','Recuperarpassword','Recuperarpassword2','Recuperarpassword3','ActivarUsuario'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				/*'actions'=>array('create','update'),*/
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			)
		);
	}

	/**
	 * Displays a particular usuario.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$model= new Usuario;
		$send = new SendEmailService;
		$userv = new UsuarioService;
		$profesor = new FichaUsuario;
		$localidad = new Localidad;
		$estado = new Estado;

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation(array($model,$profesor));
		if(isset($_POST['enviar'])){
			$valexito = 1; // si las validaciones se realizaron con exito.
			$model->email = $_POST['email'];
			$usuario = Yii::app()->db->createCommand("SELECT id_usuario FROM usuario where email = '$model->email'")->queryRow();
			if($usuario['id_usuario'] != ''){
				echo "err_mail_dup/";
				$valexito = 0;
			}
			else{
				echo "/";
			}
			$model->password = $_POST['password'];
			$model->id_perfil = $_POST['id_perfil'];
			$profesor->nombre = $_POST['nombre'];
			$profesor->apellido = $_POST['apellido'];
			$profesor->dni = $_POST['dni'];
			$usuario = Yii::app()->db->createCommand("SELECT id_usuario FROM ficha_usuario where dni = '$profesor->dni'")->queryRow();
			if($usuario['id_usuario'] != ''){
				echo "err_dni_dupl/";
				$valexito = 0;
			}
			else {
				echo "/";
			}
			$profesor->sexo = $_POST['sexo'];
			$profesor->fechanac = $_POST['fechanac'];
			$profesor->telfijo = $_POST['telfijo'];
			$profesor->conemer = $_POST['conemer'];
			$profesor->telemer = $_POST['telemer'];
			$profesor->direccion = $_POST['direccion'];
			$profesor->piso = $_POST['piso'];
			$profesor->depto = $_POST['depto'];

			$model->fhcreacion = new CDbExpression('NOW()');
			$model->fhultmod = new CDbExpression('NOW()');
			$model->cusuario = $model->email;
			$passencr = md5($model->password); // encripto la password en MD5
			$estado = Estado::model()->findByPk(0);
			$model->id_estado = $estado->id_estado;

			$localidad->id_provincia = $_POST['provincia'];
			$localidad->fhcreacion = new CDbExpression('NOW()');
			$localidad->fhultmod = new CDbExpression('NOW()');
			$localidad->cusuario = $model->email;
			$profesor->fhcreacion = new CDbExpression('NOW()');
			$profesor->fhultmod = new CDbExpression('NOW()');
			$profesor->cusuario = $model->email;
			$profesor->id_localidad = $_POST['localidad'];
			$mail = $model->email;

			if($valexito == 1){
				if($model->save()){
					Usuario::model()->updateAll(array('password'=>$passencr),'email="'.$mail.'"');
					$usuario = Usuario::model()->findByAttributes(array('email'=>$mail));
					$profesor->id_usuario = $usuario->id_usuario;
					if($profesor->save()){
						$send->Send($model->email);
						echo "actusuok";
					}
				}
			}

		}
		else{
			$this->render('create',array(
				'model'=>$model,
				'ficha_usuario'=>$profesor,
				'localidad'=>$localidad
			));
		}
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_usuario));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionSeleccionarLocalidad()
	{

		$id_provincia = $_POST['Localidad']['id_provincia'];
		$localidades = Localidad::model()->findAll('id_provincia= :id_provincia',array(':id_provincia'=>$id_provincia));
		$localidades = CHtml::listData($localidades,'id_localidad','localidad');

		echo CHtml::tag('option',array('value'=>''),'Seleccione una localidad',true);

		foreach ( $localidades as $valor=>$localidadessel){

			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($localidadessel),true);
		}

	}

	public function actionRecuperarpassword()
	{

		if(!isset($_POST['email'])){
			$this->render("Recuperarpassword");
		}
		if(isset($_POST['email'])){
			$email = $_POST['email'];
			if($email == ''){
				echo "emailblanco";
			}
			else{
				$encontro = 0;
				$usuario = new Usuario;
				$send = new SendEmailService;
				$usuarios = Usuario::model()->findAll();
				foreach($usuarios as $user){
					if($user->email == $email){
						$send->Reestablecerpassword($email);
						$encontro = 1;
						echo "exitoso";
					}
				}
				if($encontro == 0){
					echo "error";
				}

			}
		}
	}

	public function actionRecuperarpassword2()
	{
		if(isset($_GET['email'])){
			$this->render("Recuperarpassword2");
		}

		if(isset($_POST['pass'])){
			$email = $_POST['email'];
			$pass  = $_POST['pass'];
			$expr_regular = "^(?=.*\d{2})(?=.*[A-Z]).{0,20}$^";

			if(isset($pass)){
				if($pass == ''){
					echo "passblanco";
				}
				else{
					if(strlen($pass) < 6 || strlen($pass) > 15){
						echo "longerronea";
					}
					else{
						if(!preg_match($expr_regular, $pass)){
							echo "expregerronea";
						}
						else{
							$passencr = md5($pass);
							Usuario::model()->updateAll(array('password'=>$passencr),'email="'.$email.'"');
							echo "ok";
						}
					}
				}
			}
		}
	}// fin de la funcion


	public function actionActivarUsuario()
	{
		$this->render('ActivarUsuario');
	}


}
?>
