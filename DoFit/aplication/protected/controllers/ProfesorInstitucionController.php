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

	public function actionListadoActividades()
	{
		$id_usuario = Yii::app()->user->id;
		$criteria = new CDbCriteria;
		$instituciones = Yii::app()->db->createCommand('select id_institucion,nombre FROM ficha_institucion WHERE id_institucion IN(SELECT id_institucion FROM profesor_institucion WHERE id_usuario = '.$id_usuario.' AND id_estado = 1)')->queryAll();
		if($instituciones != NULL){
			$this->render('ListadoActividadesProfesor',array('instituciones'=>$instituciones));
		}
	}

	public function actionConsultarActividadesInscripto()
	{
		$id_usuario = Yii::app()->user->id;
		$id_institucion = $_POST['idinstitucion'];
		$actividades = Actividad::model()->findAllByAttributes(array('id_usuario'=>$id_usuario,'id_institucion'=>$id_institucion));
		if($actividades != NULL){
			echo "<table class='table table-hover'>
	         <td><b>Deporte</b></td><td><b>Días y Horarios</b></td><td><b>Alumnos Inscriptos</b></td>
	         </tr></thead>
	         <tbody>";
			foreach($actividades as $act){
				echo "<tr>";
				$deporte = Deporte::model()->findByAttributes(array('id_deporte'=>$act->id_deporte));
				echo "<td id='deporte'>" . $deporte->deporte . "</td>";
				$diashorarios = ActividadHorario::model()->findAllByAttributes(array('id_actividad'=>$act->id_actividad));
				echo "<td id='diahor'>";
				foreach($diashorarios as $diashor){
					$dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
					$id_dia = $diashor->id_dia-1;
					echo $dias[$id_dia]."&nbsp;".$diashor->hora .':'.($diashor->minutos == '0' ? '0'.$diashor->minutos : $diashor->minutos)."&nbsp&nbsp";
				}
				echo "</td>";
				echo "<td><a href='../veralumnos'>Ver alumnos Inscriptos</a></td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
		else {
	      echo "error";
        }		  
	}
}
?>
