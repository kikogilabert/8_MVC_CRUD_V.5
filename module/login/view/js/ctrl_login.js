// console.log('holaaa');
function login() {
    if (validate_login() != 0) {
        var id_car = localStorage.getItem('id_car');
        let username = document.getElementById('username_log').value;
        let password = document.getElementById('passwd_log').value;

        ajaxPromise('?module=login&op=login', 'POST', 'JSON', {username, password})
            .then(function(result) {
                if (result == "error_user") {
                    document.getElementById('error_username_log').innerHTML = "El usario no existe,asegurase de que lo a escrito correctamente"
                } else if (result == "error_passwd") {
                    document.getElementById('error_passwd_log').innerHTML = "La contraseña es incorrecta"
                }else if (result == "error_activated") {
                    toastr.warning("You must verify your account before loging in");
                } else {
                    localStorage.setItem("token", result);
                    toastr.success("Loged succesfully");

                    if (id_car) {
                        window.location.href = friendlyURL("?module=shop");
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

function clicks() {
    $('#login').on('click', function(e) {
        e.preventDefault();
        login();
    });

    $('#recover').on('click', function(e) {
        e.preventDefault();
        load_form_recover_password();
    });

    $('#login').on('click', function(e) {
        e.preventDefault();
        login();
    });


    $('#google').on('click', function(e) {
        social_login('google');

}); 

    $('#github').on('click', function(e) {
        social_login('github');

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
    


// ------------------- RECOVER PASSWORD ------------------------ //

function load_form_recover_password(){
    $(".sign-in-htm").hide();
    $(".sign-up-htm").hide();
    $(".forget_html").show();
    $('html, body').animate({scrollTop: $(".forget_html")});
    click_recover_password();

}

function click_recover_password(){
    $("#button_recover").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
        	e.preventDefault();
            send_recover_password();
        }
    });
    $('#button_recover').on('click', function(e) {
        e.preventDefault();
        send_recover_password();
    }); 
}


function validate_recover_password(){
    var mail_exp = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var error = false;
    if(document.getElementById('email_forg').value.length === 0){
		document.getElementById('error_email_forg').innerHTML = "Tienes que escribir un correo";
		error = true;
	}else{
        if(!mail_exp.test(document.getElementById('email_forg').value)){
            document.getElementById('error_email_forg').innerHTML = "El formato del mail es invalido"; 
            error = true;
        }else{
            document.getElementById('error_email_forg').innerHTML = "";
        }
    }
	
    if(error == true){
        return 0;
    }
}

function send_recover_password(){
    if(validate_recover_password() != 0){
        var data = document.getElementById('email_forg').value;
        ajaxPromise('?module=login&op=send_recover_email', 'POST', 'JSON', {data})
        .then(function(data) {
            if(data == "error"){		
                $("#error_email_forg").html("The email doesn't exist");
            } else{
                toastr.options.timeOut = 3000;
                toastr.success("Email sended");
                setTimeout('window.location.href = friendlyURL("?module=login")', 1000);
            } 
        })
    } 
}

function load_form_new_password(){
    
    token_email = localStorage.getItem('token_email');
    localStorage.removeItem('token_email');
    ajaxPromise(friendlyURL('?module=login&op=verify_token'), 'POST', 'JSON', {token_email})
    .then(function(data) {
        if(data == "verified"){
            click_new_password(token_email);
        }else {
            console.log("error");
        }
    })
}

function  click_new_password(token_email){
    $(".recover_html").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
        	e.preventDefault();
            send_new_password(token_email);
        }
    });

    $('#button_set_pass').on('click', function(e) {
        e.preventDefault();
        send_new_password(token_email);
    }); 
}

function validate_new_password(){

    var error = false;

    if(document.getElementById('passwd1_reg').value.length === 0){
		document.getElementById('error_passwd1_reg').innerHTML = "You have to write a password";
		error = true;
	}else{
        if(document.getElementById('passwd1_reg').value.length < 8){
            document.getElementById('error_passwd1_reg').innerHTML = "The password must be longer than 8 characters";
            error = true;
        }else{
            document.getElementById('error_passwd1_reg').innerHTML = "";
        }
    }

    if(document.getElementById('passwd2_reg').value != document.getElementById('passwd1_reg').value){
		document.getElementById('error_passwd2_reg').innerHTML = "Passwords don't match";
		error = true;
	}else{
        document.getElementById('error_passwd2_reg').innerHTML = "";
    }

    if(error == true){
        return 0;
    }
}

function send_new_password(token_email){
    if(validate_new_password() != 0){
        let password = 0;
        password =  document.getElementById('passwd1_reg').value;
        ajaxPromise(friendlyURL("?module=login&op=new_password"), 'POST', 'JSON', {token_email, password})
    .then(function(data) {
        if(data == "done"){
            toastr.options.timeOut = 3000;
            toastr.success('New password changed');
            setTimeout('window.location.href = friendlyURL("?module=login&op=view")', 1000);
        //YOLANDAAAAA MIRA ESTA MILLORA EN EL BLL(la contraseña te que ser diferent a la anterior)
        }else if (data == "same"){
            toastr.options.timeOut = 2000;
            toastr.warning("New password can't be the same as the old one");

        } else {
            toastr.options.timeOut = 3000;
            toastr.error('Error seting new password');
        }
    })    
    }
}


//  LOAD CONTENT
function load_content() {
    let path = window.location.pathname.split('/');
    if(path[4] === 'recover'){
        localStorage.setItem("token_email", path[5]);
        load_form_new_password();
    }
    else if (path[4] === 'verify') {
        ajaxPromise(friendlyURL('?module=login&op=verify_email'), 'POST', 'JSON', {'token_email' : path[5]})
        .then(function(data) {
            toastr.options.timeOut = 3000;
            toastr.success('Email verified');
            setTimeout('window.location.href = friendlyURL("?module=home")', 1000);
        })
        .catch(function() {
        console.log('Error: verify email error');
        });
    }else if (path[3] === 'recover_view') {
        load_form_new_password();
    }
}


///////////////////////SOCIAL-LOGIN///////////////////////////

function social_login(param){
    authService = firebase_config();
    authService.signInWithPopup(provider_config(param))
    .then(function(result) {
        email_name = result.user.email;
        let username = email_name.split('@');

        social_user = {id: result.user.uid, username: username[0], email: result.user.email, avatar: result.user.photoURL};

        if (result) {
            ajaxPromise(friendlyURL("?module=login&op=social_login"), 'POST', 'JSON', {social_user})
            .then(function(data) {
                localStorage.setItem("token", data);
                toastr.options.timeOut = 3000;
                toastr.success("Inicio de sesión realizado");
                if(localStorage.getItem('id_car') == null) {
                    setTimeout('window.location.href = friendlyURL("?module=home")', 1000);
                } else {
                    setTimeout('window.location.href = friendlyURL("?module=shop")', 1000);
                }   
            })
            .catch(function() {
                console.log('Error: Social login error');
            });
        }
    })
    .catch(function(error) {
        var errorCode = error.code;
        console.log(errorCode);
        var errorMessage = error.message;
        console.log(errorMessage);
        var email = error.email;
        console.log(email);
        var credential = error.credential;
        console.log(credential);
    });
}

function firebase_config(){
    var config = {
        apiKey: "AIzaSyDiTxpeBQ7i0N2Ghjyb4_g22j4lUCKLASw",
        authDomain: "test-firebase-egocars.firebaseapp.com",
        projectId: "test-firebase-egocars",
        // storageBucket: "test-firebase-egocars.appspot.com",
        messagingSenderId: "495514694215",
        appId: "1:495514694215:web:b183cd7f513ce8b0d6f762",
        measurementId: "G-JXEGLTGLTC"
    };
    if(!firebase.apps.length){
        firebase.initializeApp(config);
    }else{
        firebase.app();
    }
    return authService = firebase.auth();
}

function provider_config(param){
    if(param === 'google'){
        var provider = new firebase.auth.GoogleAuthProvider();
        provider.addScope('email');
        return provider;
    }else if(param === 'github'){
        return provider = new firebase.auth.GithubAuthProvider();

    }
}



$(document).ready(function() {
    load_content();
    clicks();
    $(".forget_html").hide();
});