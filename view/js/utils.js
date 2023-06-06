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
        '<li class="nav-item login-item">'+
            '<a class="nav-link" href="' + friendlyURL("?module=login") + '" class="nav_link">Login</a>'+
        '</li>'+
        '<li class="nav-item">'+
            '<div class="logout-button nav-link"> </div>'+  
        '</li>'+
        '<li class="nav-item">'+
        '<div class="log-icon"> </div>'+ 
        '</li>'+
    
        '<li class="nav-item">'+
        '<div id="des_inf_user"></div>'+
        '</li>'+

        '<li class="nav-item">'+
        '<div class="cart-shop">'+
        '</div>'+
        '</li>'+
        '</div>'+
        '</ul>'
        )


    var token = localStorage.getItem('token');
    if (token) {
        ajaxPromise(friendlyURL('?module=login&op=data_user'), 'POST', 'JSON', {token})
            .then(function(data) {
                if (data[0].type_user == "client") {
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

                $('<img class="avatar_picture"src="' + data[0].avatar + '"alt="Robot">').appendTo('.log-icon');
                $('<p></p>').attr({ 'id': 'user_info' }).appendTo('#des_inf_user')
                    .html(
                        '<a>' + data[0].username + '<a/>'
                    )
                    $('<a id="button_cart" href="' + friendlyURL("?module=cart") + '"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a>').appendTo('.cart-shop');
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

    }
}


// //================CLICK-LOGOUT================
function click_logout() {
    $(document).on('click', '#logout', function() {
        ajaxPromise('?module=login&op=logout', 'POST', 'JSON')
        .then(function(data) {
            console.log(data);
            localStorage.removeItem('token');
            toastr.success("Logout succesfully");
            setTimeout( window.location.href = friendlyURL("?module=home"), 2000);
        }).catch(function() {
            console.log('Something has occured');
        });
    });
}

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
    return "http://localhost/8_MVC_CRUD_V.5" + link;
}



$(document).ready(function() {
    load_menu();
    click_logout();
});