function validate_license(license_number) {
    // console.log(prueba, prueba.length);
    if (license_number.length == 17){
        var reg = /^([A-Za-z0-9]{17})$/;
        return reg.test(license_number);
    }
    return false;
}

function validate_brand(brand){
    if (brand.length > 0){
        var reg=/^[a-zA-Z]*$/;
        return reg.test(brand);
    }
    return false;
}

function validate_model(model){
    if (model.length > 0){
        return true;
    }
    return false;
}

function validate_carplate(car_plate){
    if (car_plate.length > 0){
        return true;
    }
    return false;
}

function validate_km(km){
    if (km.length > 0){
        return true;
    }
    return false;
}

function validate_category(category){
    if (category.length > 0){
        return true;
    }
    return false;
}

function validate_type(type){
    if (type.length > 0){
        return true;
    }
    return false;
}

function validate_date(date){
    if (date.length > 0){
        return true;
    }
    return false;
}

function validate_color(color){
    if (color.length > 0){
        return true;
    }
    return false;
}

function validate_extras(extras){
    if (extras.length > 0){
        return true;
    }
    return false;
}

function validate_comments(comments){
    if (comments.length > 0){
        return true;
    }
    return false;
}

function validate_price(price){
    if (price.length > 0){
        return true;
    }
    return false;
}

function validate_doors(doors){
    if (doors.length >= 0){
        return true;
    }
    return false;
}

function validate_city(city){
    if (city.length > 0){
        return true;
    }
    return false;
}

function validate_lat(lat){
    if (lat.length > 0){
        return true;
    }
    return false;
}

function validate_lng(lng){
    if (lng.length > 0){
        return true;
    }
    return false;
}


function validate(op){
    // console.log('hola validate js');
    // return true;

    var check=true;
    
    var v_license=document.getElementById('license_number').value;
    //console.log(document.getElementById('license_number').value);

    var v_brand=document.getElementById('brand').value;
    //console.log(document.getElementById('brand').value);


    var v_model=document.getElementById('model').value;
    //console.log(document.getElementById('model').value);

    var v_carplate=document.getElementById('car_plate').value;
    //console.log(document.getElementById('car_plate').value);

    var v_km=document.getElementById('km').value;
    //console.log(document.getElementById('km').value);

    var v_category=document.getElementById('category').value;
    //console.log(document.getElementById('category').value);

    var v_type=document.getElementById('type').value;
    //console.log(document.getElementById('type').value);

    var v_comments=document.getElementById('comments').value;
    //console.log(document.getElementById('comments').value);

    var v_date=document.getElementById('date').value;
    //console.log(document.getElementById('date').value);

    var v_color=document.getElementById('color').value;
    //console.log(document.getElementById('color').value);

    var v_extras=document.getElementById('extras').value;
    //console.log(document.getElementById('extras').value);

    var v_price=document.getElementById('price').value;
    //console.log(document.getElementById('price').value);

    var v_doors=document.getElementById('doors').value;
    //console.log(document.getElementById('doors').value);

    var v_city=document.getElementById('city').value;
    //console.log(document.getElementById('city').value);

    var v_lat=document.getElementById('lat').value;
    //console.log(document.getElementById('lat').value);

    var v_lng=document.getElementById('lng').value;
    //console.log(document.getElementById('lng').value);



    var r_license=validate_license(v_license);
    var r_brand=validate_brand(v_brand);
    var r_model=validate_model(v_model);
    var r_carplate=validate_carplate(v_carplate);
    var r_km=validate_km(v_km);
    //console.log(v_category);
    var r_category=validate_category(v_category);
    //console.log(r_category);
    var r_type=validate_type(v_type);
    var r_comments=validate_comments(v_comments);
    //console.log(r_comments);
    var r_date=validate_date(v_date);
    var r_color=validate_color(v_color);
    var r_extras=validate_extras(v_extras);
    var r_price=validate_price(v_price);
    var r_doors=validate_doors(v_doors);
    var r_city=validate_city(v_city);
    var r_lat=validate_lat(v_lat);
    var r_lng=validate_lng(v_lng);

    
    if(!r_license){
        document.getElementById('error_license').innerHTML = " * La licencia introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_license').innerHTML = "";
    }

    if(!r_brand){
        document.getElementById('error_brand').innerHTML = " * La marca introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_brand').innerHTML = "";
    }

    if(!r_model){
        document.getElementById('error_model').innerHTML = " * El modelo introducido no es valido";
        check=false;
    }else{
        document.getElementById('error_model').innerHTML = "";
    }

    if(!r_carplate){
        document.getElementById('error_carplate').innerHTML = " * La matricula introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_carplate').innerHTML = "";
    }

    if(!r_km){
        document.getElementById('error_km').innerHTML = " * El numero introducido no es valido";
        check=false;
    }else{
        document.getElementById('error_km').innerHTML = "";
    }

    if(!r_category){
        document.getElementById('error_category').innerHTML = " * La categoria introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_category').innerHTML = "";
    }

    if(!r_type){
        document.getElementById('error_type').innerHTML = " * El tipo introducudo no es valido";
        check=false;
    }else{
        document.getElementById('error_type').innerHTML = "";
    }

    if(!r_comments){
        document.getElementById('error_comments').innerHTML = " * No has escrito nada";
        check=false;
    }else{
        document.getElementById('error_comments').innerHTML = "";
    }

    if(!r_date){
        document.getElementById('error_date').innerHTML = " * La fecha introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_date').innerHTML = "";
    }

    if(!r_color){
        document.getElementById('error_color').innerHTML = " * No has seleccionado ningun color";
        check=false;
    }else{
        document.getElementById('error_color').innerHTML = "";
    }

    if(!r_extras){
        document.getElementById('error_extras').innerHTML = " * No has seleccionado ningun extra";
        check=false;
    }else{
        document.getElementById('error_extras').innerHTML = "";
    }

    if(!r_price){
        document.getElementById('error_price').innerHTML = " * No has introducido ningun precio";
        check=false;
    }else{
        document.getElementById('error_price').innerHTML = "";
    }

    if(!r_doors){
        document.getElementById('error_doors').innerHTML = " * No has introducido el numero de puertas deseado (3-5)";
        check=false;
    }else{
        document.getElementById('error_doors').innerHTML = "";
    }
    
    if(!r_city){
        document.getElementById('error_city').innerHTML = " * No has introducido ninguna ciudad";
        check=false;
    }else{
        document.getElementById('error_city').innerHTML = "";
    }

    if(!r_lat){
        document.getElementById('error_lat').innerHTML = " * La latitud introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_lat').innerHTML = "";
    }

    if(!r_lng){
        document.getElementById('error_lng').innerHTML = " * La longitud introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_lng').innerHTML = "";
    }

    if (check){
        if (op == 'create'){
            document.alta_user.submit();
            document.alta_user.action = "index.php?page=controller_cars&op=create";
        }
        if (op == 'update'){
            document.update_user.submit();
            document.update_user.action = "index.php?page=controller_cars&op=update";
        }
    }
}

function validate_others(op){

    if (op == 'delete'){
        document.delete_user.submit();
        document.delete_user.action = "index.php?page=controller_cars&op=delete";
    }
    if (op == 'delete_all'){
        document.delete_all.submit();
        document.delete_all.action = "index.php?page=controller_cars&op=delete_all";
    }

    if (op == 'dummies'){
        document.dummies.submit();
        document.dummies.action = "index.php?page=controller_cars&op=dummies";
    }
}

function showModal(title_Car, id) {
    $("#details_car").show();
    $("#car_modal").dialog({
        title: title_Car,
        width : 850,
        height: 500,
        resizable: "false",
        modal: "true",
        hide: "fold",
        show: "fold",
        buttons : {
            Update: function() {
                        window.location.href = 'index.php?page=controller_cars&op=update&car_plate=' + id;
                    },
            Delete: function() {
                        window.location.href = 'index.php?page=controller_cars&op=delete&car_plate=' + id;
                    }
        }
    });
}

function loadContentModal() {
    $('.coche').click(function () {

        var id = this.getAttribute('car_plate');
        ajaxPromise('module/user/controller/controller_cars.php?op=read_modal&modal=' + id, 'GET', 'JSON')
        .then(function(data) {


            // var data = JSON.parse(data);
            $('<div></div>').attr('id', 'details_car', 'type', 'hidden').appendTo('#car_modal');
            $('<div></div>').attr('id', 'container').appendTo('#details_car');
            $('#container').empty();
            $('<div></div>').attr('id', 'car_content').appendTo('#container');
            $('#car_content').html(function() {
                var content = "";
                for (row in data) {
                    content += '<br><span>' + row + ': <span id =' + row + '>' + data[row] + '</span></span>';
                }
                return content;
                });
                showModal(title_car = data.brand + " " + data.model, data.id);
        })
        .catch(function() {
            window.location.href = 'index.php?module=errors&op=503&desc=List error';
        });
    });
 }

 $(document).ready(function() {
    // console.log('hola');
    loadContentModal();
});

// $(document).ready(function () {

//     $('.coche').click(function () {
//         var id = this.getAttribute('car_plate');
//         //alert(id);
//         console.log(id);

//         ajaxPromise('module/user/controller/controller_cars.php?op=read_modal&modal=' + id, 'GET', 'JSON')
//         .then(function(json) {
//             //var json = JSON.parse(data);
//             //console.log(json);
            
//             if(json === 'error') {
//                 //console.log(json);
//                 //pintar 503
//                 window.location.href='index.php?page=503';
//             }else{
//                 console.log(json.user);
//                 $("#license_number").html(json.license_number);
//                 $("#brand").html(json.brand);
//                 $("#model").html(json.model);
//                 $("#car_plate").html(json.car_plate);
//                 $("#km").html(json.km);
//                 $("#category").html(json.category);
//                 $("#type").html(json.type);
//                 $("#comments").html(json.comments);
//                 $("#discharge_date").html(json.discharge_date);
//                 $("#color").html(json.color);
//                 $("#extras").html(json.extras);
//                 $("#price").html(json.price);
//                 $("#doors").html(json.doors);
//                 $("#city").html(json.city);
//                 $("#lat").html(json.lat);
//                 $("#lng").html(json.lng);
                
//                 $("#details_user").show();
//                 $("#user_modal").dialog({
//                     width: 850, //<!-- ------------- ancho de la ventana -->
//                     height: 500, //<!--  ------------- altura de la ventana -->
//                     //show: "scale", <!-- ----------- animación de la ventana al aparecer -->
//                     //hide: "scale", <!-- ----------- animación al cerrar la ventana -->
//                     resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
//                     //position: "down",<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
//                     modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
//                     buttons: {
//                         Ok: function () {
//                             $(this).dialog("close");
//                         }
//                     },
//                     show: {
//                         effect: "blind",
//                         duration: 1000
//                     },
//                     hide: {
//                         effect: "explode",
//                         duration: 1000
//                     }
//                 });
//             }//end-else
//         });
//     });
// });




