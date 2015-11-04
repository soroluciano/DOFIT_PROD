
<?php



$query_post_profesor = "select pmp.id_posteo,pmp.posteo,ps.foto1,fu.nombre,fu.apellido
from Perfil_Muro_Profesor pmp 
inner join Actividad ac 
on pmp.id_actividad=ac.id_actividad
inner JOIN Perfil_Social ps
on ps.id_usuario = ac.id_usuario
inner join Usuario usu 
on usu.id_usuario = ac.id_usuario
inner join Ficha_Usuario fu 
on fu.id_usuario= usu.id_usuario
where usu.id_usuario = 5
order by pmp.fhcreacion desc,pmp.fhultmod desc

";


/*
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id_posteo"]. " - Post: " . $row["posteo"]."<br>";
    }
} else {
    echo "0 results";
}
*/



//$conn->close();
?>



            <?php
                $result = $conn->query($query_post_profesor);
                
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "
                  <div class='col-sm-8'>
                    <div class='panel panel-white post panel-shadow'>
                    
                        <div class='post-heading'>
                          <div class='pull-left image'>
                            <img src='images/1.jpg' class='img-circle avatar' alt='user profile image'>
                          </div>
                          <div class='pull-left meta'>
                            <div class='title h5'>
                              <a href='#'><b>".$row["nombre"]." ".$row["apellido"]."</b></a>
                              made a post.
                            </div>
                            <h6 class='text-muted time'>1 minute ago</h6>
                          </div>
                        </div>
                      
                      
                      
                       <div class='post-description'> 
                         <p>.". $row["posteo"]."</p>
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
  
  
                        $query_respuestas_alumnos = "select res.respuesta from Respuesta res left join Perfil_Muro_Profesor pm on res.id_posteo = pm.id_posteo where pm.id_posteo =".$row["id_posteo"];
                        $resultB = $conn->query($query_respuestas_alumnos);
                        
                        if ($resultB->num_rows > 0) {
                            while($rowB = $resultB->fetch_assoc()) {
                              echo "
                                  <li class='comment'>
                                    <a class='pull-left' href='#'>
                                        <img class='avatar' src='http://bootdey.com/img/Content/user_1.jpg' alt='avatar'>
                                    </a>
                                      <div class='comment-body'>
                                          <div class='comment-heading'>
                                              <h4 class='user'>Gavino Free</h4>
                                              <h5 class='time'>5 minutes ago</h5>
                                          </div>
                                          <p>".$rowB['respuesta']."</p>
                                      </div>
                                  </li>";
                        
                            }
                        }   
                        echo "</ul></div></div></div>";
                  }
                }

                    
                
                $conn->close();
            ?>