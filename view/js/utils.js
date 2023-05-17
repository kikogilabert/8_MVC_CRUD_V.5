function ajaxPromise(sUrl, sType, sTData, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: sUrl,
            type: sType,
            dataType: sTData,
            data: sData
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        }); 
    });
}
//================LOAD-MENU================
function load_menu() {
    $('<div></div>').appendTo('.new-menu')
    .html(
      '<div class="navbar-collapse collapse justify-content-center" id="navbarDefault">'+
      '<ul class="navbar-nav">'+
        '<div class="nav_list"></div>'+
       '<li class="nav-item">'+
          '<a class="nav-link" href="' + friendlyURL("?module=home") + '">Home</a>'+
        '</li>'+
        '<li class="nav-item">'+
          '<a class="nav-link" href="' + friendlyURL("?module=shop") + '" class="nav_link">Shop</a>'+
        '</li>'+
        '<li class="nav-item">'+
        '<a class="nav-link" href="' + friendlyURL("?module=contact") + '" class="nav_link">Contact</a>'+
        '</li>'+
        '</ul>'+
        '</div>'
        )

    var token = localStorage.getItem('token');
    if (token) {
        ajaxPromise('module/login/ctrl/ctrl_login.php?op=data_user', 'POST', 'JSON', { 'token': token })
            .then(function(data) {
                // console.log(data);
                if (data.type_user == "client") {
                    console.log("Client loged");
                    $('.opc_CRUD').empty();
                    $('.opc_exceptions').empty();
                } else {
                    console.log("Admin loged");
                    $('.opc_CRUD').show();
                    $('.opc_exceptions').show();
                }
                $('.log-icon').empty();
                $('#user_info').empty();
                $('.login-item').empty();

                $('<p></p>').attr({ 'id': 'user_info' }).appendTo('.logout-button')
                .html(
                    '<a id="logout"><i id="icon-logout" class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>'
                );

                $('<img class="avatar_picture"src="' + data.avatar + '"alt="Robot">').appendTo('.log-icon');
                $('<p></p>').attr({ 'id': 'user_info' }).appendTo('#des_inf_user')
                    .html(
                        '<a>' + data.username + '<a/>'
                    )
                    $('<a id="button_cart" href="index.php?page=ctrl_cart&op=view"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a>').appendTo('.cart-shop');
            }).catch(function() {
                console.log("Error al cargar los datos del user");
            });
    } else {
        console.log("No hay token disponible");
        $('.opc_CRUD').empty();
        $('.opc_exceptions').empty();
        $('#user_info').hide();
        $('.log-icon').empty();
        $('#des_inf_user').empty();
        // $('<a href="index.php?module=ctrl_login&op=list"><i id="col-ico" class="fa-solid fa-user fa-2xl"></i></a>').appendTo('.log-icon');


    }
}


// //================CLICK-LOGOUT================
function click_logout() {
    $(document).on('click', '#logout', function() {
        // localStorage.removeItem('total_prod');
        toastr.success("Logout succesfully");
        setTimeout('logout(); ', 1000);
    });
}

// //================LOG-OUT================
function logout() {

    ajaxPromise('module/login/ctrl/ctrl_login.php?op=logout', 'POST', 'JSON')
        .then(function(data) {
            // console.log(data);
            localStorage.removeItem('token');
            window.location.href = "index.php?page=ctrl_home&op=list";
        }).catch(function() {
            console.log('Something has occured');
        });

}

// // Remove localstorage('page') with click in shop
// function click_shop() {
//     $(document).on('click', '#opc_shop', function() {
//         localStorage.removeItem('page');
//         localStorage.removeItem('total_prod');
//         console.log("Se ha borrado la pagina");

//     });
// }

function friendlyURL(url) {
    var link = "";
    url = url.replace("?", "");
    url = url.split("&");
    cont = 0;
    for (var i = 0; i < url.length; i++) {
    	cont++;
        var aux = url[i].split("=");
        if (cont == 2) {
        	link += "/" + aux[1] + "/";	
        }else{
        	link += "/" + aux[1];
        }
    }
    // console.log(link);
    return "http://localhost/8_MVC_CRUD_V.5" + link;
}



$(document).ready(function() {
    load_menu();
    click_logout();
    // click_shop();
});