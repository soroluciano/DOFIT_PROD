      
      function showComents(idpost){
        $("#post-footer-"+idpost).removeAttr("style");
      }
      
      /*RESPUESTAS*/
      
      function getComentsByPost(idpost){
        var position = $("#position_post_"+idpost).val();
        debugger;
        $.ajax({
                url:  baseurl+'/muro/getComentarios',
                type: 'POST',
                data: 'idposteo='+idpost+'&position='+position,
                success:function(response){
                        debugger;
                        $('#post_coment_'+idpost).html(response);
                
        },
        error: function(e){
                $('#logger').html(e.responseText);
        }});
     
      }
      
       function insertarComent(a) {
          debugger;
          var _a = a;
          var comment = $("#txt_post_"+_a).val();
          
          var pusher = new Pusher('c48d59c4cb61c7183954');    
          var canalnom = $('#canal').val();
          var canal  = pusher.subscribe(canalnom);
                       
            canal.bind(comment, function(respuesta){
          });
            
          debugger;
          $.ajax({
              url:  baseurl+'/muro/insertarRespuesta',
              type: 'POST',
              data: 'respuesta='+comment+'&id_posteo='+_a,
              success:function(response){
                  alert( "Data Saved: " + response );
              },
              error: function(e){
              $('#logger').html(e.responseText);
              }
          });
          
          $.post(baseurl+'/php/ajax.php', {
              msj : this.comment,
              canal : $('#canal').val(),
              socket_id : pusher.connection.socket_id
          }
          ,function(respuesta){
            showComents(this._a);
              //getMensajesFromBase();
          });
             
       }

       
        
        /*POSTEOS*/
       
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
                    data: 'mensaje='+$('#input_mensaje').val()+'&id_actividad='+$('#id_actividad_selected').val(),
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
     
      $(function(){
        debugger;
          $( "#sel1" ).change(function() {

            var id = $(this).children(":selected").attr("id");
            $("#id_actividad_selected").val(id);
            
          });
          
        }).trigger( "change" );
     
       function getMensajesFromBase(){
                $.ajax({
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
        
        
        
        function recuperarJson(){
            debugger;
          $.ajax({
                  url:  baseurl+'/muro/pruebaJson',
                  dataType: "json",
                  data: {},
                  success:function(response){
                    debugger;
                      crearTabla(response);
                          //debugger;
                          //$('#respuesta').html(response);
                  
          },
          error: function(e){
                  $('#logger').html(e.responseText);
          }});
     
      }
      
      function crearTabla(response){
          $.each(response, function(i,item){
            
            $('#respuesta').append("<br>"+i+" - "+response[i].posteo+" - "+response[i].foto1);
        
          })

      }
      
      function editComment(idcoment) {
        debugger;
        $valor = $("#post-description-"+idcoment+" .details").html();
        
        alert($valor);
        
        
      }
      
      /*
        Lista de tareas profesor
        * edicion de posts
        * edicion de respuestas
        * elimiacion de comentarios si me pertenecen -> eliminacion de respuestas asociados
        
        Seccion de alumnos con posts
        * edicion de respuestas
        * eliminacion de respuestas si me pertenecen
        * 
      
      
      
      
      
      
      
      */
      
      
      
      
      
      
      
      
      
      
        
        
