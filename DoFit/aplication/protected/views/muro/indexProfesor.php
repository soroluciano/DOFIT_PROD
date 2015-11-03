
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/muro.css" rel="stylesheet">
<script type="text/javascript">
	$(function(){
            var pusher = new Pusher('c48d59c4cb61c7183954');
            var canal  = pusher.subscribe('canalo');
            
            canal.bind('nuevo_comentario', function(respuesta){
                $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
            });

            $('form').submit(function(){
            
                $.ajax({
                    url: "insertar.php",
                    type: 'post',
                    data: { input_mensaje: $('#input_mensaje').val() },
                    success:function(response){
                        //alert( "Data Saved: " + response );
                    },
                    error: function(e){
                    $('#logger').html(e.responseText);
                    }
                });
                
                
                
                $.post('ajax.php', {
                    msj : $('#input_mensaje').val(),
                    socket_id : pusher.connection.socket_id
                }
                , function(respuesta){
                        $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
                }, 'json');

                return false;
            });
        });
     
     
       function getMensajesFromBase(){
            // $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
                $.ajax({
                    //url: "mensajes.php",
                    url: "muroProfesor.php",
                    type: 'post',
                    data: {},
                    success:function(response){
                        $('#comentarios').html(response);
                    },
                    error: function(e){
                    $('#logger').html(e.responseText);
                    }
                });
       }
        
        
        $(function(){
        
            var pusher = new Pusher('c48d59c4cb61c7183954');
            var canal  = pusher.subscribe('canalo');

            canal.bind('nuevo_comentario', function(){
                getMensajesFromBase();
               
            });

            $('form').submit(function(){
                $.post('ajax.php', { msj : $('#input_mensaje').val(), socket_id : pusher.connection.socket_id }, function(respuesta){
                    $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
                }, 'json');

                return false;
            });
        });
        
      $(document).ready(function(){    
        $("[data-toggle=tooltip]").tooltip();
    });
      
     function load() {
       var loadedWindow = 0;
          debugger;
          if (loadedWindow == 0) {
            getMensajesFromBase();
            loadedWindow = 1;
          }
                  
      }
      window.onload = load;  

</script>


<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/muro.js');
?>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php 

	if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
     $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
     $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
  }
?>
  
  
  
  
	<?php $this->renderPartial('_menu'); ?>
  
  
  

			<?php // $this->renderPartial('_posts', array('perfilSocial'=>$perfilSocial)); ?>
<body>
  <div id="container" class="container">
    <div>
        <h1>Soy Profesor</h1>
    </div>

    <div class="row">
      <div class="col-md-8 contenedor-espaciado">
                  <div class="widget-area no-padding blank">
                  <div class="status-upload">
                    <form action="" method="post">
                      <textarea placeholder="What are you doing right now?" id="input_mensaje"></textarea>
                      <ul>
                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
                      </ul>
                      <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Publicar</button>
                    </form>
                  </div><!-- Status Upload  -->
                </div><!-- Widget Area -->
        </div>
    </div>

    <div id="comentarios" class="row">

    </div>
</div>   
</body>


