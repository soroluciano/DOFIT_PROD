<div class="container">
	<div class='row'>
		<?php
		$idusuario = $_GET['idusuario'];
		if(isset($_GET['tel'])){
			$telefono = $_GET['tel'];
			echo "<div><h2>Datos Tel&eacute;fonicos de&nbsp;";
		}
		if(isset($_GET['dir'])){
			$direccion = $_GET['dir'];
			echo "<div><h2>Datos de direcci&oacute;n de&nbsp;";
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
					<td id="telfijo"><?php echo $fichausuario->telfijo;?></td>
					<td id="celular"><?php echo $fichausuario->celular;?></td>
					<td id="conemer"><?php echo $fichausuario->conemer;?></td>
					<td id="telemer"><?php echo $fichausuario->telemer;?></td>
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
		?>
	 