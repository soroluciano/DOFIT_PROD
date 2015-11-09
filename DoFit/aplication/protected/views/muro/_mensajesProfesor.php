
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
                  <a href='#'><b>".$row['nombre']." ".$row['apellido']."</b></a>
                 <!-- made a post.-->
                </div>
                <!--<h6 class='text-muted time'>1 minute ago</h6>-->
              </div>
            </div>

           <div class='post-description'> 
             <p>".$row['posteo']."</p>
             <div class='stats'>
                 <a href='#' class='btn btn-default stat-item'>
                     <i class='fa fa-thumbs-up icon'></i>2
                 </a>
                 <a href='#' class='btn btn-default stat-item'>
                     <i class='fa fa-share icon'></i>12
                 </a>
             </div>
           </div>
           <div class='post-footer'>
             <div class='input-group'> 
                 <input class='form-control' placeholder='Add a comment' type='text'>
                 <span class='input-group-addon'>
                     <a href='#'><i class='fa fa-edit'></i></a>  
                 </span>
             </div>";

            echo "<ul class='comments-list'>";

            $respuestas_alumnos = Yii::app()->db->createCommand("select res.respuesta,fu.nombre,fu.apellido,ps.foto1 from respuesta res left join perfil_muro_profesor pm on res.id_posteo = pm.id_posteo left join ficha_usuario fu on res.id_usuario=fu.id_usuario left join perfil_social ps on ps.id_usuario=fu.id_usuario where pm.id_posteo =".$row['id_posteo']."")->queryAll();

            if ($respuestas_alumnos != null) {
                foreach ($respuestas_alumnos as $respuesta) {
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
            }   
            echo "</ul></div></div></div>";
      }
    }

        

?>