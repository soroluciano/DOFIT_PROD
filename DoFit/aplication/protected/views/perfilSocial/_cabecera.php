		<div class="col-lg-4" style="background-color: black; color:white;width:30%;margin-left:15px;">
		<?php if($model->foto1){ ?>
				<div class="profile_img">
				<img src="<?php echo Yii::app()->request->baseUrl;echo "/uploads/".$model->foto1 ?>" alt="Generic placeholder image" width="140" height="140" class="img-circle">
				<input type="button" value="Cambiar foto"/>
				</div>
		<?php } else{ ?>
				<div class="profile_img">
				<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/profile_defect_picture.png"; ?>" alt="Generic placeholder image" width="140" height="140" class="img-circle profile_img">
				<input type="button" value="Cambiar foto"/>
				</div>	
		<?php } ?>
			<h2><?php echo $nombre." ".$apellido; ?></span></h2>
			<h3>25 a&ntilde;os</h3>
			<h3>Practico 2 deportes</h3>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-8">
			<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/default_cover.jpg" ?>" alt="Generic placeholder image" width="100%" height="340px" >
		</div>