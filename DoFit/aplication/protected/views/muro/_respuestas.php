
<?php
		if ($respuestas != null) {
		foreach ($respuestas as $respuesta) {
			echo "
			<li class='comment'>
			<a class='pull-left' href='#'>
			<img src='".Yii::app()->request->baseUrl."/uploads/".$respuesta['foto1']."' class='avatar' alt='avatar'>
			</a>
			<div class='comment-body'>
			<div class='comment-heading'>
			<h4 class='user'>".$respuesta['nombre']." ".$respuesta['apellido']."</h4>
			<!--<h5 class='time'>5 minutes ago</h5>-->
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