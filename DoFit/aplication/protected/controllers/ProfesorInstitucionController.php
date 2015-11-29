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

	public function actionMostrarTelefonos()
	{
		$idusuario = $_POST['idusuario'];
		$fichausuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$idusuario));
		echo "<h3>Datos Tel&eacute;fonicos de&nbsp;" .$fichausuario->nombre."&nbsp".$fichausuario->apellido."</h3></div><br/>";
		echo "<table class='table table-hover'>
			    <thead>
			      <tr><th>Tel&eacute;fono Fijo</th><th>Celular</th><th>Contacto Emergencia</th><th>Tel&eacute;fono Emergencia</th></tr>
			    </thead>
				<tbody>
				<tr>";
		echo "<td id='telfijo'>" . substr($fichausuario->telfijo,0,4)."-".substr($fichausuario->telfijo,0,4) . "</td>";
		echo "<td id='celular'>" . $fichausuario->celular . "</td>";
		echo "<td id='conemer'>" . $fichausuario->conemer ."</td>";
		echo "<td id='telemer'>" . substr($fichausuario->telemer,0,4)."-".substr($fichausuario->telemer,-4) . "</td>";
		echo "</tr>
				</tbody>
		    </table>";
	}

	public function actionMostrarDireccion()
	{
		$idusuario = $_POST['idusuario'];
		$fichausuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$idusuario));
		echo "<h3>Datos domiciliarios de&nbsp;" .$fichausuario->nombre."&nbsp".$fichausuario->apellido."</h3></br>";
		echo "<table class='table table-hover'>
	         <thead>
			   <tr><th>Direcci&oacute;n</th><th>Piso</th><th>Departamento</th><th>Localidad</th><th>Provincia</th></tr>
			 </thead>
			 <tbody>
				<tr>";
		echo "<td id='direccion'>" . $fichausuario->direccion . "</td>";
		echo "<td id='piso'>". $fichausuario->piso . "</td>";
		echo "<td id='depto'>" . $fichausuario->depto ."</td>";
		echo "<td id='loca'>";
		$localidad = Localidad::model()->findByAttributes(array('id_localidad'=>$fichausuario->id_localidad));
		echo  $localidad->localidad . "</td>";
		echo "<td id='prov'>";
		$provincia = Provincia::model()->findByAttributes(array('id_provincia'=>$localidad->id_provincia));
		echo $provincia->provincia . "</td>";
		echo "</tr>
				</tbody>
			</table>";
	}

	public function actionMostrarActividades()
	{
		$idusuario = $_POST['idusuario'];
		$idinstitucion = Yii::app()->user->id;
		$fichausuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$idusuario));
		echo "<h3>Actividades que enseña&nbsp;" .$fichausuario->nombre."&nbsp".$fichausuario->apellido."</h3></div><br/>";
		echo "<table class='table table-hover'>
				<thead>
				<tr><th>Deporte</th><th>Día</th><th>Hora</th><th>Valor actividad</th></tr>
				</thead>
				<tbody>";
		// busco la actividad para luego encnotrar el Deporte, día y horario que las dicta el profesor.
		$queryact = Yii::app()->db->createCommand('SELECT id_actividad,valor_actividad FROM actividad where id_institucion= '.$idinstitucion.' and id_usuario = '.$idusuario)->queryAll();
		foreach($queryact as $act){
			echo "<tr>
						<td id='depo'>";
			$dep = Yii::app()->db->createCommand('SELECT deporte FROM deporte where id_deporte IN(SELECT id_deporte FROM actividad where id_actividad= '.$act['id_actividad'].')')->queryRow();
			echo $dep['deporte'];
			echo "</td>";
			$dia = Yii::app()->db->createCommand('SELECT id_dia,hora,minutos FROM actividad_horario WHERE id_actividad IN(SELECT id_actividad FROM actividad where id_actividad= '.$act['id_actividad'].')')->queryRow();
			$dias = array('Lunes','Martes','Miercoles','Jueves', 'Viernes','Sábado', 'Domingo');
			$diasel = $dia['id_dia']-1;
			echo	"<td id='dia'>" .$dias["$diasel"] . "</td>";
			echo "<td id='hora'>" . $dia['hora'].':'.($dia['minutos'] == '0' ? '0'.$dia['minutos'] : $dia['minutos']) . "</td>";
			$valoract = Yii::app()->db->createCommand('SELECT valor_actividad  FROM  actividad WHERE id_actividad='.$act['id_actividad'])->queryRow();
			echo  "<td id='valor'>" . $valoract['valor_actividad'] . "</td>";
			echo "</tr>";
		}
		echo"</tbody>
			</table>";
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
				echo "<td><input type='button' class='btn btn-primary' value='Ver alumnos Inscriptos' onclick='javascript:AlumnosInscriptos($act->id_actividad)'></input></td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
		else {
			echo "error";
		}
	}

	public function actionAlumnosInscriptosActividad()
	{
		$idactividad = $_POST['idactividad'];
		$actividadalumno = ActividadAlumno::model()->findAllByAttributes(array('id_actividad'=>$idactividad,'id_estado'=>1));
		if($actividadalumno != NULL){
			echo "<table class='table table-hover'>
	         <td><b>Nombre y Apellido</b></td><td><b>DNI</b></td><td><b>E-mail</b></td><td><b>Sexo</b></td><td><b>Fecha Nacimiento</b></td><td><b>Direcci&oacute;n</b></td><td><b>Localidad</b></td><td><b>Provincia</b></td><td><b>Tel&eacute;fonos</b></td>
	         </tr></thead>
	         <tbody>";
			foreach($actividadalumno as $actalum){
				$fichausuario = FichaUsuario::model()->findByAttributes(array('id_usuario'=>$actalum->id_usuario));
				$usuario = Usuario::model()->findByAttributes(array('id_usuario'=>$actalum->id_usuario));
				echo "<tr>";
				echo "<td id='nomyape'>".$fichausuario->nombre ."&nbsp".$fichausuario->apellido ."</td>";
				echo "<td id='dni'>". $fichausuario->dni."</td>";
				echo "<td id='mail'>" .$usuario->email . "</td>";
				echo "<td id='sexo'>";
				if($fichausuario->sexo == 'M'){
					echo "Masculino";
				}
				if($fichausuario->sexo == 'F'){
					echo "Femenino";
				}
				echo "</td>";
				$fechanac = date("d-m-Y",strtotime($fichausuario->fechanac));
				echo "<td id='fecnac'>". $fechanac ."</td>";
				echo "<td id='dire'>" . $fichausuario->direccion . "</td>";
				$localidad = Localidad::model()->findByAttributes(array('id_localidad'=>$fichausuario->id_localidad));
				echo "<td id='loca'>". $localidad->localidad ."</td>";
				$provincia = Provincia::model()->findByAttributes(array('id_provincia'=>$localidad->id_provincia));
				echo "<td id='prov'>". $provincia->provincia ."</td>";
				echo "<td id='telefonos'>". $fichausuario->telfijo . "&nbsp" . $fichausuario->celular . "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
		}
	}
}
?>
