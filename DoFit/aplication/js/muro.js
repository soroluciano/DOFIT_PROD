
        $(function(){
            var pusher = new Pusher('c48d59c4cb61c7183954');
            
            var canalnom = $('#canal').val();
          
            var canal  = pusher.subscribe(canalnom);
            
         
                      
            canal.bind('nuevo_comentario', function(respuesta){
				getMensajesFromBase();
            });
    
            
            $('form').submit(function(){
            debugger;
                $.ajax({
                
                    url:  baseurl+'/muro/insertarComentarioProfesor',
                    type: 'POST',
                    data: 'mensaje='+$('#input_mensaje').val()+'&id_actividad='+4,
                    success:function(response){
                        alert( "Data Saved: " + response );
                    },
                    error: function(e){
                    $('#logger').html(e.responseText);
                    }
                });
                
                $.post(baseurl+'/php/ajax.php', {
                    msj : $('#input_mensaje').val(),
                    canal : $('#canal').val(),
                    socket_id : pusher.connection.socket_id
                }
                ,function(respuesta){
                    getMensajesFromBase();
                });
                return false;
            });
     });
     
        $(function(){
        
            var pusher = new Pusher('c48d59c4cb61c7183954');
            var canalnom = $('#canal').val();
            debugger;
            var canal  = pusher.subscribe(canalnom);
            
            var url = baseurl;
        
            canal.bind('nuevo_comentario', function(){
                getMensajesFromBase();
               
            });
            
            $('form').submit(function(){
                $.post(url+'/php/ajax.php', { msj : $('#input_mensaje').val(),canal:$('#canal').val(), socket_id : pusher.connection.socket_id }, function(respuesta){
                  getMensajesFromBase();
                }, 'json');
        
                return false;
            });
        });
     
     
     
       function getMensajesFromBase(){
            // $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
                $.ajax({
                    //url: "mensajes.php",
                    url: baseurl+"/muro/mensajes",
                    type: 'POST',
                    data: {},
                    success:function(response){
                        $('#comentarios').html(response);
                    },
                    error: function(e){
                    $('#logger').html(e.responseText);
                    }
                });
       }
        
        $(document).ready(function(){    
                $("[data-toggle=tooltip]").tooltip();
        });
