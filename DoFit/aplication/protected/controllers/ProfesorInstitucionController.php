<?php

class ProfesorInstitucionController extends Controller
{

	public function actionAdhesiongimnasio()
	{
		if(!Yii::app()->user->isGuest){
			//Es un usuario logueado.
			$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
		}
		if(isset($_GET['id_institucion'])){
			$profins = new ProfesorInstitucion;
			$id_institucion = $_GET['id_institucion'];
			$id_usuario = $usuario->id_usuario;
			$profins->id_usuario = $id_usuario;
			$profins->id_institucion = $id_institucion;
			$profins->id_estado = 0;
			$profins->fhcreacion = new CDbExpression('NOW()');
			$profins->fhultmod = new CDbExpression('NOW()');
			$profins->cusuario = $usuario->email;
			if($profins->validate()){
				if($profins->save()){?>
					<script>alert("Se envio la solicitud para adherirse correctamente");</script>
					<?php
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->select = 't.id_institucion,t.nombre,t.cuit,t.direccion,t.id_localidad,t.telfijo,t.celular,t.depto,t.piso';
		$criteria->condition = 't.id_institucion NOT IN (SELECT id_institucion FROM profesor_institucion WHERE id_usuario ='.$usuario->id_usuario.')';
		$ficinstituciones = FichaInstitucion::model()->findAll($criteria);
		$this->render('Adhesiongimnasio',array('ficinstituciones'=>$ficinstituciones,));
	}

	public function actionListadoProfesores()
	{
		$this->render('ListadoProfesores');
	}
	public function actionMostrardatos()
	{
		$this->render('Mostrardatos');
	}
	public function actionEditarProfesor()
	{

		if(isset($_GET['idprofesor'])){
			$idprofesor = $_GET['idprofesor'];
		}
		if(isset($_POST['idprofesor'])){
			$idprofesor = $_POST['idprofesor'];
		}
		$ficha_profesor = new FichaUsuario;
		$ficha_profesor = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$idprofesor));
		$localidad = new Localidad;
		$localidad = Localidad::model()->findByAttributes(array('id_localidad'=>$ficha_profesor->id_localidad));
		$provincia = Provincia::model()->findByAttributes(array('id_provincia'=>$localidad->id_provincia));

		// veo las actividades que dicta 
		$actividad = Actividad::model()->findAllByAttributes(array('id_institucion'=>Yii::app()->user->id,'id_usuario'=>$idprofesor));

		if(isset($_POST['FichaUsuario'], $_POST['Localidad'])){
			$ficha_profesor->attributes = $_POST['FichaUsuario'];
			$ficha_profesor->id_localidad = $_POST['Localidad']['id_localidad'];
			if( $ficha_profesor->save()){
				$this->redirect('../profesorInstitucion/ListadoProfesores');
			}
		}

		$this->render('EditarProfesor',array('idprofesor'=>$idprofesor,'ficha_profesor'=>$ficha_profesor,'localidad'=>$localidad,'provincia'=>$provincia,'actividad'=>$actividad));
	}
}
