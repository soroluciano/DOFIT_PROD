
            <div class="panel modified col-md-8 col-xs-8">
<!--                <div class="panel-heading c-list">

                </div>-->
                
				 <ul class="list-group" id="contact-list">
						<?php
								$val = new ArrayObject();
								foreach($contactos as $cn){
										$ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$cn['id_usuario']));
									echo"<li class='list-group-item'>
										<div class='col-xs-4 col-sm-3'>";
										//$imagen = Imagen::model()->find('id_usuario=id_usuario',array(':id_usuario'=>$cn['id_usuario']));
										$perfil = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$cn['id_usuario']));
										if($perfil->fotoperfil!=null){
												echo "<img src='".Yii::app()->request->baseUrl."/uploads/".$perfil->fotoperfil."' onclick='getProfileFriend(".$cn['id_usuario'].")' width='120px' height='120px' class='img-circle' style='cursor:pointer' />";
										}else{
												echo "<img src='".Yii::app()->request->baseUrl."/images/profile_defect_picture.png'  width='120px' height='120px' class='img-circle' style='cursor:pointer' />";
										}
										
									echo"</div>
										<div class='col-xs-12 col-sm-9'>
										<span class='name'>".$ficha->nombre." ".$ficha->apellido."</span><br/>
										<span class='fa fa-comments text-muted c-info' data-toggle='tooltip' title='scott.stevens@example.com'></span>
										<span class='visible-xs'> <span class='text-muted'>scott.stevens@example.com</span><br/></span>
										</div>
										<div class='clearfix'></div>
										</li>";
						
								}
						?>

                </ul>
            </div>

	</div>

    <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
    
</div>
