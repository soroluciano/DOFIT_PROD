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

	public function actionBorrarProfesor()
	{
		$idprofesor = $_POST['idprofesor'];
		$idinstitucion = Yii::app()->user->id;
		$del_act_hor = Yii::app()->db->createCommand('DELETE from actividad_horario where id_actividad IN(SELECT id_actividad from actividad where id_usuario='.$idprofesor.' and id_institucion='.$idinstitucion.')')->execute();
		if($del_act_hor or $del_act_hor == 0){
			$del_act_pago = Yii::app()->db->createCommand('DELETE from pago where id_actividad IN(SELECT id_actividad from actividad where id_usuario='.$idprofesor.' and id_institucion='.$idinstitucion.')')->execute();
			if($del_act_pago or $del_act_pago == 0){
				$del_resp = Yii::app()->db->createCommand('DELETE from respuesta where id_posteo IN (SELECT id_posteo from perfil_muro_profesor where id_actividad IN (SELECT id_actividad from actividad where id_usuario='.$idprofesor.' and id_institucion='.$idinstitucion.'))')->execute();
				if($del_resp or $del_resp == 0){
					$del_per_muro = Yii::app()->db->createCommand('DELETE from perfil_muro_profesor where id_actividad IN(SELECT id_actividad from actividad where id_usuario='.$idprofesor.' and id_institucion='.$idinstitucion.')')->execute();
					if($del_per_muro or $del_per_muro == 0){
						$del_act_alumn = Yii::app()->db->createCommand('DELETE from actividad_alumno where id_actividad IN(SELECT id_actividad from actividad where id_usuario='.$idprofesor.' and id_institucion='.$idinstitucion.')')->execute();
						if($del_act_alumn or $del_act_alumn == 0){
							$del_act = Yii::app()->db->createCommand('DELETE from actividad where id_institucion='.$idinstitucion.' and id_usuario='.$idprofesor)->execute();
						}
					}
				}
			}
		}
		$del_ins_prof = Yii::app()->db->createCommand('DELETE from profesor_institucion where id_usuario='.$idprofesor.' and id_institucion='.$idinstitucion)->execute();
		if($del_ins_prof){
			echo "ok";
			//$this->redirect('../profesorInstitucion/ListadoProfesores');
		}
		else
		{
			echo "error";
		}
	}
}
?>
