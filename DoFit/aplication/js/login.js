/**
 * Created by Damián on 12/09/2015.
 */

function login(){
    debugger;
    //var algo = baseurl;
    var email = $('#email').val();
    var password = $('#password').val();
  //concateno los datos a enviar por ajax
    var data = {'email':email,'password':password};

    $.ajax({
        url: baseurl+'/site/prueba',
        type: "POST",
        data: data,
        dataType: "html",
        cache: false,
        success:function(response){
            if(response=="error"){
                alert(error);
            }
            else{
                window.location.replace(response);
            }

        },
        error: function(e){
            console.log(e);
        }
    });


}
