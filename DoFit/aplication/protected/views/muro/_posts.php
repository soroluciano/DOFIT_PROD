

<?php
    if ($resultSet != null) {
      foreach($resultSet as $row) {
          echo "
      <div class='col-sm-8'>
        <div class='panel panel-white post panel-shadow'>
        
            <div class='post-heading'>
             
			  
              <div class='pull-left image'>
                <img src='".Yii::app()->request->baseUrl."/uploads/".$row['foto1']."' class='img-circle avatar' alt='user profile image'>
              </div>
			  
              <div class='pull-left meta'>
			  
                <div class='title h5'>
                  <a href=''><b>".$row['nombre']." ".$row['apellido']."</b></a>
                 <!-- made a post.-->
                </div>
				
                <!--<h6 class='text-muted time'>1 minute ago</h6>-->
              </div>
			  
			  <div class='pull-left edicion'>
				<!--agregar validacion ...si el usuario es el mismo permite editar y borrar -->
          <div class='dropdown'>
            <button class='btn-edit-post' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>...</button>
            <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
            <li><a href='javascript:editComment(".$row['id_posteo'].")'>Editar</a></li>
            <li><a href='' onclick='indicateIdPost(".$row['id_posteo'].")' data-toggle='modal' data-target='#popborrar')'>Eliminar</a></li>
            </ul>
          </div>
				
				
			  </div>
			  
			  
			  <div  class='modal fade' id='popborrar' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' data-backdrop='static' data-keyboard='true'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close' onclick=''><span aria-hidden='true'>&times;</span></button>
							<h4 class='modal-title' id='exampleModalLabel'><b>Eliminar publicaci&oacute;n</b></h4>
						</div>
						<div class='modal-body'>
						<p>¿Seguro que quieres eliminar esto?</p>
							<form name='formulario' id='formulario' class='formulario'>
							   <div class='modal-footer'>
									<button type='button'  class='btn btn-default' data-dismiss='modal'>Cerrar</button>
								    <button type='button'  onclick='deleteComent();' class='btn btn-success green' data-dismiss='modal'>Eliminar publicaci&oacute;n</button>	
							   </div>	
						  </form>
						</div>
					</div>
				</div>
			  </div>
			
			  

			  
            </div>

           <div class='post-description' id='post-description-".$row['id_posteo']."'> 
             <p class='details'>".$row['posteo']."</p>
			 <div class='div-ed-comment' style='display:none'>
			  <textarea class='edit-details-textarea' style='display:none'>".html_entity_decode($row['posteo'])."</textarea>
			  <div class='div-btns-comment'>  
				<input type='button' class='btn-ed-fin btn btn-success green' onclick='updateComent(".$row['id_posteo'].")' style='display:none;' value='Edicion terminada'/>
				<input type='button' class='btn-cancel-comment btn btn-default' onclick ='closeComment(".$row['id_posteo'].")' style='display:none;' value='Cancelar'/>
			  </div>
			</div>
             <!--
             <div class='stats'>
                 <a href='#' class='btn btn-default stat-item'>
                     <i class='fa fa-thumbs-up icon'></i>2
                 </a>
                 <a href='#' class='btn btn-default stat-item'>
                     <i class='fa fa-share icon'></i>12
                 </a>
             </div>-->
           </div>
           <!--<div class='btn-comment-open'>
            <input type='button' value='Comentar' class='btn-like-link' onclick='showComents(".$row['id_posteo'].");' />
           </div>-->
           <div class='post-footer' id='post-footer-".$row['id_posteo']."'>
             <div class='input-group'> 
                 <input class='form-control' placeholder='Escribe un comentario' type='text' id='txt_post_".$row['id_posteo']."'>
                 <span class='input-group-addon'>
                     <input type='submit' class='btn-comment' id='".$row['id_posteo']."' onclick='insertarRespuesta(this.id);' value='Comentar'/>
                 </span>
             </div>";
             
        echo  "<script>$('#post-footer-".$row['id_posteo']."').load(getComentsByPost(".$row['id_posteo']."));</script>
                <ul class='comments-list' id='post_coment_".$row['id_posteo']."'></br>
                
                </ul>
             </div>
             </div>
           </div>";
                       
      }
    }

        

?>