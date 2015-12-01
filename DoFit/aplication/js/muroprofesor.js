        
  
  $(function(){
    $( "#sel1" ).change(function() {
      var id = $(this).children(":selected").attr("id");
      $("#id_actividad_selected").val(id);
    });
  }).trigger( "change" );
  
  function showComents(idpost){
    $("#post-footer-"+idpost).removeAttr("style");
  }
  
  /* function pusher para enviar los mensajes a todos los contactos  */
  
 
  function pushearMensaje(a){
    var _a = a;
    var pusher = new Pusher('c48d59c4cb61c7183954');    
    var canalnom = $('#canal').val();
    var canal  = pusher.subscribe(canalnom);
    canal.bind(_a, function(respuesta){
    });
    
    $.post(baseurl+'/php/ajax.php', {
      msj : this._a,
      canal : $('#canal').val(),
      socket_id : pusher.connection.socket_id
      },function(respuesta){
        debugger;
          getMensajesFromBase();
    });
    
      pusher.disconnect();
  }
  
  /*Traer las respuestas/comentarios por el id del post*/

  function getComentsByPost(idpost){  // trae los comentarios por id de post
    debugger;
    var position = $("#position_post_"+idpost).val();
    $.ajax({
      url:  baseurl+'/muro/getComentarios',
      type: 'POST',
      data: 'idposteo='+idpost+'&position='+position,
      success:function(response){
        $('#post_coment_'+idpost).html(response);
      },
    error: function(e){
      $('#logger').html(e.responseText);
    }});
  }
  
  
  /*RESPUESTAS*/
  
  function insertarRespuesta(a) {  //insertar las respuestas en los comentarios
    var _a = a;
    var comment = $("#txt_post_"+_a).val();
    var pusher = new Pusher('c48d59c4cb61c7183954');    
    var canalnom = $('#canal').val();
    var canal  = pusher.subscribe(canalnom);
    canal.bind(comment, function(respuesta){
    });
  
  
    $.ajax({
      url:  baseurl+'/muro/insertarRespuesta',
      type: 'POST',
      data: 'respuesta='+comment+'&id_posteo='+_a,
      success:function(response){
           window.$isNewMsg.value='true';
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
    },function(respuesta){
      showComents(this._a);
    });
      pusher.disconnect();
    }

  
  $(function(){
      window.$postValue={}
      window.$isNewMsg={}
      var pusher = new Pusher('c48d59c4cb61c7183954');    
      var canalnom = $('#canal').val();
      var canal  = pusher.subscribe(canalnom);
      
      //if(window.$isNewMsg.value =='true') {
          canal.bind('nuevo_comentario', function(respuesta){
              debugger;
               if(window.$isNewMsg.value =='true') {
                  getMensajesFromBase();
               }else{
                  getMensajesConDelay();
               }
          });
      //}else{
      //  getMensajesConDelay();
      //}


    $('form').submit(function(){
      $.ajax({
        url:  baseurl+'/muro/insertarComentarioProfesor',
        type: 'POST',
        data: 'mensaje='+$('#input_mensaje').val()+'&id_actividad='+$('#id_actividad_selected').val(),
        success:function(response){
        alert( "Data Saved: " + response );
        window.$isNewMsg.value='true';
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
      debugger;
      getMensajesFromBase();
    });
      pusher.disconnect();
      return false;
    });
  });
  
  
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
  
  
  function editComment(idcoment) //funcion de la seleccion de edicion de comentario
  {
    debugger;
    $("#post-description-"+idcoment+" .edit-details-textarea").css("display","block");
    $("#post-description-"+idcoment+" .details").css("display","none");
    $("#post-description-"+idcoment+" .btn-ed-fin").css("display","block");
    $("#post-description-"+idcoment+" .btn-cancel-comment").css("display","block");
    $("#post-description-"+idcoment+" .div-ed-comment").css("display","block");
    $valor = ($("#post-description-"+idcoment+" .details").html());
    
    //$res = getHtmlDecoded($valor);
  
    $("#post-description-"+idcoment+" .edit-details-textarea").html($valor);
  }
  
  function closeComment(idcoment) //funcion para el cierre de comentario en seleccion
  {
    //$("#post-description-"+idcoment+" .edit-details-textarea").val($postValue.valor);
    $("#post-description-"+idcoment+" .edit-details-textarea").css("display","none");
    $("#post-description-"+idcoment+" .details").css("display","block");
    $("#post-description-"+idcoment+" .btn-ed-fin").css("display","none");
    $("#post-description-"+idcoment+" .btn-cancel-comment").css("display","none");
    $("#post-description-"+idcoment+" .div-ed-comment").css("display","none");
  }
  
  function updateComent(idposteo)
  {
    debugger;
    alert($("#post-description-"+idposteo+" .edit-details-textarea").val());
    $.ajax({
      url:  baseurl+'/muro/updateComentarioProfesor',
      type: 'POST',
      data: 'mensaje='+$("#post-description-"+idposteo+" .edit-details-textarea").val()+'&id_posteo='+idposteo,
      success:function(response){
      alert( "Data Saved: " + response );
      pushearMensaje();
      window.$isNewMsg.value='true';
    },
      error: function(e){
        $('#logger').html(e.responseText);
      }
    });
  
  }
  
  function  indicateIdPost(args) {
    $postValue.valor=args;
  }
  
  
  
  function deleteComent(){
    debugger;
    $idposteo = $postValue.valor;
      $.ajax({
        url:  baseurl+'/muro/deleteComentarioProfesor',
        type: 'POST',
        data: 'id_posteo='+$idposteo,
        success:function(response){
          alert( "Data deleted: " + response );
          window.$isNewMsg.value='true';
          pushearMensaje('deleted');
      },
        error: function(e){
          $('#logger').html(e.responseText);
        }
     });
    
  }

   
   function getMensajesConDelay(){
       setInterval("getMensajesFromBase()",50000);
   }
   
   
    //function rechargeTimePusher(){
    //    debugger;
    //    alert("recargando...")
    //    var pusher = new Pusher('c48d59c4cb61c7183954');    
    //    var canalnom = $('#canal').val();
    //    var canal  = pusher.subscribe(canalnom);
    //    
    //    canal.bind('nuevo_comentario', function(respuesta){
    //      debugger;
    //     getMensajesFromBase();
    //  });
    //    pusher.disconnect();
    //}   
      

      
      
      
      
      
      
      
      
      
        
        
