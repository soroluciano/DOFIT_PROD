

function getStringIds(){
  debugger;
   var res = window.$saved_tokens;
    var re = new Array ;
   for(var j=0; j<res.length; j++){
    re[j]=res[j].id; 
   }
  return re;
}

 function getContactos() {
      $.ajax({
      url: baseurl+'/contact/getContactos',  
      type: 'POST',
      data: 'busqueda='+getStringIds(),
      success:function(response){
        //alert(response);
            $('#respuesta_ajax').html(response);          
      },
      error: function(e){
         alert(e);
      }
    });
}