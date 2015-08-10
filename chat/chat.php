<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<title>Do Fit!!</title>
	</head>
	<body>
		<div  class="container-fluid">
			<section  style="padding: 3%;">			
				<div class="row">				
					<h1 class="text-center">Chat: <small>Do Fit!!</small></h1>	
					<hr>
				</div>	
				<div class="row">
					<form id="formChat" role="form">
						<div class="form-group">
							<label for="user">Usuario</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="Ingrese Usuario">
						</div>
						<div class="form-group">							
							<div class="row">
								<div class="col-md-12" >
									<div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">				
							<label for="message">Mensaje</label>
							<textarea id="message" name="message" placeholder="Ingrese Mensaje"  class="form-control" rows="3"></textarea>
						</div>
						<input type="button" id="send" class="btn btn-primary" value="Enviar"></input>
                        <input type="button" id="borrarmensajes" class="btn btn-primary" value="Borrar Mensajes"></input>  						   
					</form>
				</div>
			</section>	
		</div>	
		<script src="js/jquery-2.1.4.min.js"></script>		
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
		
			$(document).on("ready", function(){				
			  registerMessages();
			  $.ajaxSetup({"cache":false});
              setInterval("cargarMensajesAntiguos()",500); 			  
			});
			var registerMessages = function(){
			  $("#send").on("click",function(e){
				   e.preventDefault();
				   var frm = $("#formChat").serialize();
				   console.log(frm);
				   $.ajax({
					   type : "POST",
					   url : "register.php",
					   data: frm
				   }).done(function(info){ 
                      $("#message").val("");
					  var altura =$("#conversation").prop("scrollHeight");
                      $("#conversation").scrollTop(altura);		
					  console.log(info);  				   
				   }) 
			  });
            }

          var cargarMensajesAntiguos = function() {
               $.ajax({
                      type : "POST",
                      url : "conversacion.php",
			   }).done(function(info){
				  $("#conversation").html(info);
				  $("#conversation p:last-child").css({"background-color": "lightgreen",
				                       				  "padding-bottom": "20px"});
                  var altura =$("#conversation").prop("scrollHeight");
                  $("#conversation").scrollTop(altura);				  
			   });
		   }
      
			  $("#borrarmensajes").on("click",function(){
              $.ajax({
                      type : "POST",
                      url : "borrarmensajes.php",
                 })
              });			   
		</script>
	</body>
</html>