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
        $('#erruser').html("<div class='arrow-up'></div><div class='tooltip-inner-login'>Por favor ingrese su e-mail</div>");
        cont++;
    }
    if (password == "" || password == null){
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
                    $('#errpass').alert('asd');
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
