/**
 * Created by Damián on 12/09/2015.
 */

function login() {
    debugger;
    //var algo = baseurl;
    var email = $('#email').val();
    var password = $('#password').val();
    $('#erruser').html("");
    $('#errpass').html("");
    var cont = 0;
    if (email == "" || email == null){
        $('#erruser').html("Ingrese su email");
        cont++;
    }
    if (password == "" || password == null){
        $('#errpass').html("Ingrese su contraseña");
        cont++;
    }
    if(cont == 0) {
        //concateno los datos a enviar por ajax
        var data = {'email': email, 'password': password};
        $.ajax({
            url: baseurl + '/site/login',
            type: "POST",
            data: data,
            dataType: "html",
            cache: false,
            success: function (response) {
                if (response == "error") {
                    alert("Datos incorrectos");
                }
                else {
                    window.location.replace(response);
                }

            },
            error: function (e) {
                console.log(e);
            }
        });
    }



}
