		<div class="cabecera-perfil">
		<?php if($perfil->fotoperfil){ ?>
				<div class="profile_img">
				<img src="<?php echo Yii::app()->request->baseUrl;echo "/uploads/".$perfil->fotoperfil; ?>" alt="Generic placeholder image" width="80" height="80" class="img-circle">
			<!--	<input type="button" value="Cambiar foto"/>-->
				</div>
		<?php } else{ ?>
				<div class="profile_img">
				<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/profile_defect_picture.png"; ?>" alt="Generic placeholder image" width="80" height="80" class="img-circle profile_img">
				<!--<input type="button" value="Cambiar foto"/>-->
				</div>	
		<?php } ?>

				<div class="profile_info">
					<span class="nombre"><?php echo $nombre." ".$apellido; ?></span>
					<span>Profesor y deportista</span>
					<span><a href="javascript:info();" >Edita tu perfil</a></span>
				</div>
				<div class='profile_friends_fotos'>
						<ul>
						<li><?php echo "60"?><a onclick="getContactos()"; style="cursor:pointer;"> Contactos</a>. Contacta con ellos</li>		
						<li><a onclick="galeria();" style="cursor:pointer;"> Fotografías.</a></li>
						</ul>
				</div>
<!--				<div class='sports'>
						<span class="enseno">Profesor en <?php // echo "10";?> deportes</span>		
						<span class="hago">Alumno en <?php // echo "12";?> deportes</span>
				</div>-->
		</div>	<!-- fin cabecera perfil -->	
       </div>
       <div>