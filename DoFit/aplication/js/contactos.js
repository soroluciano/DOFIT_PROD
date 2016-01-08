

   function getSearcherContactos(busqueda) {
           
            $.ajax({
            url: baseurl+'/red/getSearcherContactos',  
            type: 'POST',
            data: 'busqueda='+busqueda,
            dataType: "json",
            success:function(response){
                debugger;
                this.resultado="";
                for(var i=0;i<response.length;i++){
                  this.resultado+=response[i].nombre + response[i].apellido + "<br>";
                }
                  alert (this.resultado);
                  this.resultado = "";
                  this.busqueda = "";
            },
            error: function(e){
               alert(e);
            }
            });
            
            
   }
   
  