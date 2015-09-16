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
    $(document).off('.alert.data-api');
    var cont = 0;
    if (email == "" || email == null){
        $('#div-email').addClass('has-error has-feedback');
        $('#div-email').append("<span class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span><span id='inputError2Status' class='sr-only'>(error)</span>");
        $('#erruser').html("<div class='arrow-up'></div><div class='tooltip-inner-login'>Por favor ingrese su e-mail</div>");
        cont++;
    }
    if (password == "" || password == null){
        $('#div-password').addClass('has-error has-feedback');
        $('#div-password').append("<span class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span><span id='inputError2Status' class='sr-only'>(error)</span>");
        $('#errpass').html("<div class='arrow-up'></div><div class='tooltip-inner-login'>Por favor ingrese su contraseña</div>");
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
                    $('#erruser').html("<div class='alert alert-danger alert-dismissible fade in' role='alert' id='alerta-1'>" +
                                       "<button class='close' aria-label='Close' data-dismiss='alert' type='button' id='alerta-2'>" +
                                                "</button>" +
                                                    "<h4>Error!</h4>" +
                                                        "<p>Datos incorrectos, por favor intenta de nuevo</p>" +
                                                            "<p>" +
                                                                "<button class='btn btn-danger' onclick='hiddenalert();' type='button'>Intentá de nuevo</button>" +
                                                                "</button>" +
                                                            "</p>" +
                                    "</div>");
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

