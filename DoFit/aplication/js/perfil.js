    function galeria(){        debugger;        var algo = baseurl;        showLoader = setTimeout("$('#loadingImage').show()", 300);        $("#btn_galeria").addClass("active");        $("#btn_info").removeClass("active");        $.ajax({            url: baseurl+'/perfilSocial/galeria',            type: 'post',            //data: { },            success:function(response){                $('#respuesta_ajax').html(response);            },            error: function(e){                $('#logger').html(e.responseText);            }        });    }	    function info(){        debugger;        showLoader = setTimeout("$('#loadingImage').show()", 300);        $("#btn_galeria").removeClass("active");        $("#btn_info").addClass("active");        $.ajax({            url: baseurl+'/perfilSocial/informacion',            type: 'post',            data: { /*raza: valor, sexo: sx */},            success:function(response){                $('#respuesta_ajax').html(response);            },            error: function(e){                $('#logger').html(e.responseText);            }        });    }    function edicion(){        debugger;        showLoader = setTimeout("$('#loadingImage').show()", 300);        $.ajax({            url: baseurl+'/perfilSocial/edicion',            type: 'post',            data: { /*raza: valor, sexo: sx */},            success:function(response){                $('#respuesta_ajax').html(response);            },            error: function(e){                $('#logger').html(e.responseText);            }        });    }    function edicionInfo(){        debugger;        showLoader = setTimeout("$('#loadingImage').show()", 300);        $.ajax({            url: baseurl+'/perfilSocial/edicionInfo',            type: 'post',            data: { /*raza: valor, sexo: sx */},            success:function(response){                $('#respuesta_ajax').html(response);            },            error: function(e){                $('#logger').html(e.responseText);            }        });    }	function uploaderMax(){		debugger;	var file = {};	var file = $('#FileUpload_foto')[0];		var formData = new FormData(file);		 $.ajax({            url: baseurl+'/perfilSocial/prueba2',            type: 'POST',            data:  formData,            success:function(response){                $('#respuesta_ajax').html(response);            },            error: function(e){                $('#logger').html(e.responseText);            },			cache: false,			contentType: false,			processData: false        });		return false;	}	function nuevaImagen(){		  $.ajax({            url: baseurl+'/perfilSocial/nuevaImagen',            type: 'post',            data: { },            success:function(response){                $('#respuesta_ajax').html(response);            },            error: function(e){                $('#logger').html(e.responseText);            }        });	}	    /*cristian*/        function isImage(extension)    {        switch(extension.toLowerCase())        {            case 'jpg': case 'gif': case 'png': case 'jpeg':                return true;            break;            default:                return false;            break;        }    }                $(document).ready(function(){        debugger;        //queremos que esta variable sea global        var fileExtension = "";        //función que observa los cambios del campo file y obtiene información        $(':file').change(function()        {            debugger;            //obtenemos un array con los datos del archivo            var file = $("#imagen")[0].files[0];            //obtenemos el nombre del archivo            var fileName = file.name;            //obtenemos la extensión del archivo            fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);            //obtenemos el tamaño del archivo            var fileSize = file.size;            //obtenemos el tipo de archivo image/png ejemplo            var fileType = file.type;            //mensaje con la información del archivo            showMessage("<span class='info'>"+fileName+".</span>");        });             //al enviar el formulario        $('#subirimagenbutton').click(function(){            debugger;            //información del formulario            var formData = new FormData($(".formulario")[0]);            var message = "";            //hacemos la petición ajax              $.ajax({                url: baseurl+'/php/upload.php',                  type: 'POST',                // Form data                //datos del formulario                data: formData,                //necesario para subir archivos via ajax                cache: false,                contentType: false,                processData: false,                //mientras enviamos el archivo                beforeSend: function(){                    message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");                    showMessage(message)                        },                //una vez finalizado correctamente                success: function(data){                    message = $("<span class='success'>La imagen ha subido correctamente.</span>");                    showMessage(message);                                                                               if(isImage(fileExtension))                    {                        debugger;                        alert(data);                        $(".showImage").html("<img src='uploads/"+data+"' />");                        $("#imagendeperfil").val(data);                                                                    }                },                //si ha ocurrido un error                error: function(){                    message = $("<span class='error'>Ha ocurrido un error.</span>");                    showMessage(message);                }            });        });    })        function showMessage(message){        $(".messages").html("").show();        $(".messages").html(message);    }    	