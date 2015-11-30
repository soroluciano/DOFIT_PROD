
<?php
		if ($respuestas != null) {
		foreach ($respuestas as $respuesta) {
				
				
		    $fhultmod = strtotime($respuesta['fhultmod']);
		    $fhcreacion = strtotime($respuesta['fhcreacion']);
			$fhultmodFormated = date('d/m/Y g:i A', $fhultmod);
			$fhcreacionFormated = date('d/m/Y g:i A', $fhcreacion);
			$timeInZero = date('d/m/Y g:i A', strtotime('0000-00-00 00:00:00'));
			$finaltime;
		    if($fhultmodFormated == $timeInZero){$finaltime=$fhcreacionFormated;}else{$finaltime=$fhultmodFormated;}
		
				
			echo "
			<li class='comment'>
			<a class='pull-left' href='#'>
			<img src='".Yii::app()->request->baseUrl."/uploads/".$respuesta['foto1']."' class='avatar' alt='avatar'>
			</a>
			<div class='comment-body'>
			<div class='comment-heading'>
			<h4 class='user'>".$respuesta['nombre']." ".$respuesta['apellido']."</h4>
			<h5 class='time'>".$finaltime."</h5>
			</div>
			<p>".$respuesta['respuesta']."</p>
			</div>
			</li>";
		}
			if($show){
				echo "<input type='hidden' value='$position' id='position_post_$idposteo'/>";
				echo "<input type='button' class='btn-like-link' onclick='getComentsByPost($idposteo);' value='Ver mas comentarios'/>";  
			}
		}
        
?> 