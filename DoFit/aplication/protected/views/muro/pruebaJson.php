<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/muro.js');
?>
<script>
      //  $(function(){
      //  debugger;
      //  $.ajax({
      //          url:  '/muro/pruebaJson',
      //          dataType: "json",
      //          data: {},
      //          success:function(response){
      //            debugger;
      //              crearTabla(response);
      //                  //debugger;
      //                  //$('#respuesta').html(response);
      //          
      //  },
      //  error: function(e){
      //          $('#logger').html(e.responseText);
      //  }});
      //
      //});
      //
      //function crearTabla(response){
      //    $.each(response, function(i,item){
      //      
      //      ('#respuesta').append("<br>"+i+" - "+posteo[i].nombre+" - "+foto1[i].apellido);
      //  
      //    })
      //
      //}
      //
  
</script>


<div id="respuesta">
  
  algo
  
</div><br>
<input type='button' onclick='recuperarJson();' value='buscar'/>




