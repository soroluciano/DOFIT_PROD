
    $(document).ready(function(){
        debugger;
         getPage(0);
         getLinks(0);
    });

    function getLinks(page) {
         $.ajax({
          url: baseurl+'/galeria/getLinks',  
          type: 'POST',
          data: 'page='+page,
          success:function(response){
             debugger;
             $('#menu-links').html(response);          
          },
          error: function(e){
             alert(e);
          }
        });
     
    }
    
    function getPage(page){
      debugger;
        $.ajax({
          url: baseurl+'/galeria/getPage', 
          type: 'POST',
          data: 'page='+page,
          success:function(response){
             debugger;
             $('#galeria-images').html(response);
             getLinks(page);
          },
          error: function(e){
             alert(e);
          }
        });
    }
    
    