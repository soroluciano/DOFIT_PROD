<div class="container">
	<div class='row'>
		<?php
		$idusuario = $_GET['idusuario'];
		$idinstitucion = Yii::app()->user->id;
		if(isset($_GET['tel'])){
			$telefono = $_GET['tel'];
			echo "<div><h2>Datos Tel&eacute;fonicos de&nbsp;";
		}
		if(isset($_GET['dir'])){
			$direccion = $_GET['dir'];
			echo "<div><h2>Datos domiciliarios de&nbsp;";
		}
		if(isset($_GET['act'])){
			echo "<div><h2>Actividades que enseña&nbsp;";
		}
		$fichausuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$idusuario));
		echo $fichausuario->nombre."&nbsp".$fichausuario->apellido."</h2></div>";
		if(isset($_GET['tel'])){
			?>
			<table class="table table-hover">
				<thead>
				<tr><th>Tel&eacute;fono Fijo</th><th>Celular</th><th>Contacto Emergencia</th><th>Tel&eacute;fono Emergencia</th></tr>
				</thead>
				<tbody>
				<tr>
					<td id="telfijo"><?php echo substr($fichausuario->telfijo,0,4)."-".substr($fichausuario->telfijo,0,4);?></td>
					<td id="celular"><?php echo $fichausuario->celular;?></td>
					<td id="conemer"><?php echo $fichausuario->conemer;?></td>
					<td id="telemer"><?php echo substr($fichausuario->telemer,0,4)."-".substr($fichausuario->telemer,-4);?></td>
				</tr>
				</tbody>
			</table>
			<?php
		}
		if(isset($_GET['dir'])){
			?>
			<table class="table table-hover">
				<thead>
				<tr><th>Direcci&oacute;n</th><th>Piso</th><th>Departamento</th><th>Localidad</th><th>Provincia</th></tr>
				</thead>
				<tbody>
				<tr>
					<td id="direccion"><?php echo $fichausuario->direccion;?></td>
					<td id="piso"><?php echo $fichausuario->piso;?></td>
					<td id="depto"><?php echo $fichausuario->depto;?></td>
					<td id="loca"><?php $localidad = Localidad::model()->findByAttributes(array('id_localidad'=>$fichausuario->id_localidad));
						echo $localidad->localidad;?></td>
					<td id="prov"><?php $provincia = Provincia::model()->findByAttributes(array('id_provincia'=>$localidad->id_provincia));
						echo $provincia->provincia;?></td>
				</tr>
				</tbody>
			</table>
			<?php
		}
		if(isset($_GET['act'])){
			?>
			<table class="table table-hover">
				<thead>
				<tr><th>Deporte</th><th>Día</th><th>Hora</th><th>Valor actividad</th></tr>
				</thead>
				<tbody>
				<?php // busco la actividad para luego encnotrar el Deporte, día y horario que las dicta el profesor.
				$queryact = Yii::app()->db->createCommand('SELECT id_actividad,valor_actividad FROM actividad where id_institucion= '.$idinstitucion.' and id_usuario = '.$idusuario)->queryAll();
				foreach($queryact as $act){
					?>
					<tr>
						<td id='depo'>
							<?php $dep = Yii::app()->db->createCommand('SELECT deporte FROM deporte where id_deporte IN(SELECT id_deporte FROM actividad where id_actividad= '.$act['id_actividad'].')')->queryRow();
							echo $dep['deporte'];?>
						</td>
						<?php $dia = Yii::app()->db->createCommand('SELECT id_dia,hora,minutos FROM actividad_horario WHERE id_actividad IN(SELECT id_actividad FROM actividad where id_actividad= '.$act['id_actividad'].')')->queryRow();
						$dias = array('Lunes','Martes','Miercoles','Jueves', 'Viernes','Sábado', 'Domingo');
						$diasel = $dia['id_dia']-1;
						?>

						<td id="dia"><?php echo $dias["$diasel"];?></td>
						<td id="hora"><?php echo $dia['hora'].':'.($dia['minutos'] == '0' ? '0'.$dia['minutos'] : $dia['minutos']);?></td>
						<?php $valoract = Yii::app()->db->createCommand('SELECT valor_actividad  FROM  actividad WHERE id_actividad='.$act['id_actividad'])->queryRow();?>
						<td id="valor"><?php echo $valoract['valor_actividad'];?></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
			<?php
		}
		?>
			