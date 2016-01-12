 function getContactos() {
    
    debugger;
    var res = window.$saved_tokens;
    var re = new Array;
    
    for(var j=0; j<res.length; j++){
        re[j] = res[j].id; 
    }
    var delimiter = ",";
    
    //alert(resultado);
    //
    window.$res = null;
    window.$res = re.join(delimiter);
    $.ajax({
    url: baseurl+'/contact/getContactos',  
    type: 'POST',
    data: 'busqueda='+window.$res,
    success:function(response){
      //alert(response);
      alert(response);
          //$('#respuesta_ajax').html(response);          
    
    },
    error: function(e){
       alert(e);
    }
    });
}