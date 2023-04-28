// console.log('dentro de cart js');
function load_cart(){
    var token = localStorage.getItem('token');
    // console.log('holaaaaa load cart');
        ajaxPromise("module/cart/ctrl/ctrl_cart.php?op=load_cart", 'POST', 'JSON', {'token': token})
        .then(function(data) {
            console.log(data);
            var total_price_cars = 0;
            for (row in data) {
                var total_price = 0;
                var total_price = total_price + (data[row].price)*(data[row].qty);
                    $(".shopping-cart").append(
                        '<br/>'+
                        '<br/>'+
                        '<br/>'+
                        '<br/>'+
                        '<br/>'+
                        '<br/>'+
                        '<div class="basket">'+
                        '<div class="product-image">'+
                            "<img src= '" + data[row].img_car + "'" + "</img>" +
                        '</div>'+
                        '<div class="product-details">'+
                            "<h3><b class='product-title'>" + data[row].cod_brand + " " + data[row].name_model + "</b></h3>" +
                            "<table class='product-description'>"+
                                "<tr>"+
                                    "<td>" + "Main Color:   "+ "<span class='semibold'>"+ data[row].color +"</span>" +"</td>" + 
                                    "<td>"+ "Car Plate:   "  + "<span class='semibold'>"+ data[row].car_plate +"</span>" +"</td>"+
                                "</tr>" +
                                "<tr>"+
                                "<td >" + "Engine Type:"+"<span class='semibold'>"+ data[row].desc_type +"&nbsp;</span>" + "</td>" + 
                                "<td >"  + "Category: "  + "<span class='semibold'>"+ data[row].category +" </span>" +  "</td>"+
                            "</tr>" +
                            "</table>"+
                        '</div>'+
                        '<div class="product-price">'+ data[row].price +'€' +'</div>'+
                        '<div class="product-quantity">'+
                            '<input type="number" value="'+ data[row].qty + '" min="1">'+
                        '</div>'+
                        '<div class="product-removal">'+
                            "<button id='" + data[row].car_plate + "' class='remove-product'>Remove</button>"+
                        '</div>'+
                        '<div class="product-line-price">' + total_price +' €' +'</div>'+
                        '</div>'
                        ) 
                        // console.log(total_price);
                        var total_price_cars = total_price_cars + total_price;
                    }  

                
                
                        // console.log(total_price_cars);
            $(".total-prices").append(
                '<div class="totals">'+
                    '<div class="totals-item">'+
                    '<label>Subtotal</label>'+
                    '<div class="totals-value" id="cart-subtotal">' + total_price_cars + '</div>'+
                    '</div>'+
                    '<div class="totals-item">'+
                    '<label>Tax (5%)</label>'+
                    '<div class="totals-value" id="cart-tax">3.60</div>'+
                    '</div>'+
                    '<div class="totals-item">'+
                    '<label>Shipping</label>'+
                    '<div class="totals-value" id="cart-shipping">15.00</div>'+
                    '</div>'+
                    '<div class="totals-item totals-item-total">'+
                    '<label>Grand Total</label>'+
                    '<div class="totals-value" id="cart-total">90.57</div>'+
                    '</div>'+
                    '</div>'
            )

            $(".cart-labels").append(
            '<div class="column-labels">'+
            '<label class="product-image">Image</label>'+
            '<label class="product-details">Product</label>'+
            '<label class="product-price">Price</label>'+
            '<label class="product-quantity">Quantity</label>'+
            '<label class="product-removal">Remove</label>'+
            '<label class="product-line-price">Total</label>'+
        '</div>'
            )



                $(".subtotal-value").append(total_price);
                $(".total-value").append(total_price);
            }).catch(function() {
                window.location.href = 'index.php?page=error503'
                console.log('esto es el catch del cart');
            });   
    }



function change_qty(){
    $(document).on('input','.quantity-field',function () {
        var codigo_producto =  this.getAttribute('id');
        var qty = $(".quantity-field").val();
            ajaxPromise("module/cart/controller/controller_cart.php?op=update_qty&user=" + localStorage.getItem('token') + "&id=" + codigo_producto + "&qty=" + qty, 'GET', 'JSON')
            .then(function() { 
                location.reload();
            }).catch(function() {
                window.location.href = 'index.php?page=error503'
            });   
        });
}

function checkout(){
    $(document).on('click','.checkout-cta',function () {
            ajaxPromise("module/cart/controller/controller_cart.php?op=checkout&user=" + localStorage.getItem('token'), 'GET', 'JSON')
            .then(function(data) { 
                window.location.href = 'index.php?page=controller_home&op=homepage'
            }).catch(function() {
                window.location.href = 'index.php?page=error503'
            });   
        });
}




/* Set rates + misc */
    var taxRate = 0.05;
    var shippingRate = 15.00; 
    var fadeTime = 300;


    /* Assign actions */
    $('.product-quantity input').change( function() {
    updateQuantity(this);
    });



    /* Recalculate cart */
    function recalculateCart()
    {
    var subtotal = 0;

    /* Sum up row totals */
    $('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
    });

    /* Calculate totals */
    var tax = subtotal * taxRate;
    var shipping = (subtotal > 0 ? shippingRate : 0);
    var total = subtotal + tax + shipping;

    /* Update totals display */
    $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
        $('.checkout').fadeOut(fadeTime);
    }else{
        $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
    });
    }


    /* Update quantity */
    function updateQuantity(quantityInput)
    {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.product-price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;

    /* Update line price display and recalc cart totals */
    productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
        $(this).text(linePrice.toFixed(2));
        recalculateCart();
        $(this).fadeIn(fadeTime);
    });
    });  
    }




// REMOVE   

    /* Remove item from cart */

        $(document).on("click",".remove-product", function() {
            var car_plate = this.getAttribute('id');
            remove_cart(car_plate);
        });
                function remove_cart(id_car){
                        var token = localStorage.getItem('token');
                        ajaxPromise("module/cart/ctrl/ctrl_cart.php?op=delete_cart", 'POST', 'JSON', { 'token' : token , 'id_car' : id_car})
                        .then(function(data) { 
                            console.log(data);
                            // $('div.basket-product#'+ id_car).slideUp(); DE ESTAS FORMAS NO HACE EL SLIDE |_|
                            // $("#" + id_car + ".basket").slideUp();  //ASI tampoco
                                // $(".basket-product").slideUp();   CON ESTO FUNCIONA EL SLIDE PERO NO SABE EL ID, POR LO QUE SE LO HACE A TODOS LOS QUE TIENEN ESA CLASS
                                $("#" + id_car + ".basket").empty();
                                    recalculateCart();
                                    location.reload(); //con esto queda mas o menos aseao
                                }).catch(function() {
                                console.log('catchhhhh');
                            window.location.href = 'index.php?page=error503';
                    }
                )};
                
$(document).ready(function(){
    // console.log('dentro de cart js1');
    load_cart();
    // remove_cart();
    // change_qty();
    // checkout();
});