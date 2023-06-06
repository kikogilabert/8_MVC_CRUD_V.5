function protecturl() {

    var token = localStorage.getItem('token');
    ajaxPromise(friendlyURL('?module=login&op=controluser'), 'POST', 'JSON', { 'token': token })
        .then(function(data) {
            if (data == "Correct_User") {
                console.log("CORRECTO-->El usario coincide con la session");
            } else if (data == "Wrong_User") {
                console.log("INCORRCTO--> Estan intentando acceder a una cuenta");
                logout_auto();
            }
        })
        .catch(function() { console.log("ANONYMOUS_user") });
}

function control_activity() {
    var token = localStorage.getItem('token');
    if (token) {
        ajaxPromise(friendlyURL('?module=login&op=actividad'), 'POST', 'JSON')
            .then(function(response) {
                if (response == "inactivo") {
                    console.log("usuario INACTIVO");
                    logout_auto();
                } else {
                    console.log("usuario ACTIVO")
                }

            });
    } else {
        console.log("No hay usario logeado");
    }

}

function refresh_token() {
    var token = localStorage.getItem('token');
    if (token) {
        ajaxPromise(friendlyURL('?module=login&op=refresh_token'), 'POST', 'JSON', { 'token': token })
            .then(function(data_token) {
                console.log("Refresh token correctly");
                localStorage.setItem("token", data_token);
                load_menu();
            });
    }

}

function refresh_cookie() {
    ajaxPromise(friendlyURL('?module=login&op=refresh_cookie'), 'POST', 'JSON')
        .then(function(response) {
            console.log("Refresh cookie correctly");
        });
}

function logout_auto() {
        ajaxPromise(friendlyURL('?module=login&op=logout'), 'POST', 'JSON')
        .then(function(data) {
            console.log(data);
            localStorage.removeItem('token');
            toastr.warning("Se ha cerrado la cuenta por seguridad!!");
            setTimeout( window.location.href = friendlyURL("?module=home"), 2000);
        }).catch(function() {
            console.log('Something has occured');
        });
    }


$(document).ready(function() {
    // setInterval(function() { control_activity() }, 60000); //10min= 600000
    // protecturl();
    // setInterval(function() { refresh_token() }, 60000);
    // setInterval(function() { refresh_cookie() }, 60000);
});