

<?php
    if ($resultSet != null) {
      foreach($resultSet as $row) {
          echo "
      <div class='col-sm-8'>
        <div class='panel panel-white post panel-shadow'>
        
            <div class='post-heading'>
              <div></div>
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
           <div class='btn-comment-open'>
            <input type='button' value='Comentar' class='btn-like-link' onclick='showComents(".$row['id_posteo'].");' />
           </div>
           <div class='post-footer' id='post-footer-".$row['id_posteo']."'>
             <div class='input-group'> 
                 <input class='form-control' placeholder='Add a comment' type='text' id='txt_post_".$row['id_posteo']."'>
                 <span class='input-group-addon'>
                     <input type='submit' class='btn-comment' id='".$row['id_posteo']."' onclick='insertarComent(this.id);' value='Comentar'/>
                 </span>
             </div>";
             
        echo  "<script>$('#post-footer-".$row['id_posteo']."').load(getComentsByPost(".$row['id_posteo']."));</script>
                <ul class='comments-list' id='post_coment_".$row['id_posteo']."'></br>
                <!--<input type='button' value='Mostrar respuestas' class='btn-like-link' onclick='getComentsByPost(".$row['id_posteo'].")'/>-->
                </ul>
             </div>
             </div>
           </div>";
                       
      }
    }

        

?>