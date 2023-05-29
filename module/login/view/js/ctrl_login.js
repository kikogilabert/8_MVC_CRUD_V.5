// console.log('holaaa');
function login() {
    if (validate_login() != 0) {
        var id_car = localStorage.getItem('id_car');
        console.log(document.getElementById('username_log').value);
        let username = document.getElementById('username_log').value;
        let password = document.getElementById('passwd_log').value;

        ajaxPromise('?module=login&op=login', 'POST', 'JSON', {username, password})
            .then(function(result) {
                console.log(result);
                if (result == "error_user") {
                    document.getElementById('error_username_log').innerHTML = "El usario no existe,asegurase de que lo a escrito correctamente"
                } else if (result == "error_passwd") {
                    document.getElementById('error_passwd_log').innerHTML = "La contraseña es incorrecta"
                }else if (result == "error_activated") {
                    // document.getElementById('error_passwd_log').innerHTML = "La contraseña es incorrecta"
                    toastr.warning("You must verify your account before loging in");
                } else {
                    localStorage.setItem("token", result);
                    toastr.success("Loged succesfully");

                    if (id_car) {
                        window.location.href = "?module=shop&op=view";
                    } else {
                    window.location.href = friendlyURL("?module=home");
                    }
                }
            }).catch(function(textStatus) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus);
                }
            });
    }
}

function key_login() {
    $("#login").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            e.preventDefault();
            login();
        }
    });
}

function button_login() {
    $('#login').on('click', function(e) {
        e.preventDefault();
        login();
    });
}

function validate_login() {
    var error = false;

    if (document.getElementById('username_log').value.length === 0) {
        document.getElementById('error_username_log').innerHTML = "Tienes que escribir el usuario";
        error = true;
    } else {
        if (document.getElementById('username_log').value.length < 4) {
            document.getElementById('error_username_log').innerHTML = "El usuario tiene que tener 5 caracteres como minimo";
            error = true;
        } else {
            document.getElementById('error_username_log').innerHTML = "";
        }
    }

    if (document.getElementById('passwd_log').value.length === 0) {
        document.getElementById('error_passwd_log').innerHTML = "Tienes que escribir la contraseña";
        error = true;
    } else {
        document.getElementById('error_passwd_log').innerHTML = "";
    }

    if (error == true) {
        return 0;
    }
}
    

function load_content() {
    let path = window.location.pathname.split('/');
    console.log(path);
    // if(path[5] === 'recover'){
    //     //console.log(path[6]);
    //     window.location.href = friendlyURL("?module=login&op=recover_view");
    //     localStorage.setItem("token_email", path[6]);
    // }
    // else
     if (path[4] === 'verify') {
        console.log(path[4]);
        ajaxPromise('?module=login&op=verify_email', 'POST', 'JSON', {'token_email' : path[5]})
        .then(function(data) {
            console.log(data);
            toastr.options.timeOut = 3000;
            toastr.success('Email verified');
            setTimeout('window.location.href = friendlyURL("?module=home")', 1000);
        })
        .catch(function() {
        console.log('Error: verify email error');
        });
    }
    // else if (path[4] === 'view') {
    //     $(".login-wrap").show();
    //     $(".forget_html").hide();
    // }else if (path[4] === 'recover_view') {
    //     load_form_new_password();
    // }
}


$(document).ready(function() {
    load_content();
    key_login();
    button_login();
});