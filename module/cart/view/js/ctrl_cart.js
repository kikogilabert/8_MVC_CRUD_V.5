function load_cart(){
    var token = localStorage.getItem('token');
        ajaxPromise(friendlyURL("?module=cart&op=load_cart"), 'POST', 'JSON', {'token': token})
        .then(function(data) {
            var total_price_cars = 0;
            var taxRate = 0.05;
            var shippingRate = 15.00; 
            var fadeTime = 300;
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
                        '<div id="' + data[row].car_plate + '" class="product-cart">' +
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
                            '<input type="number" class="quantity-field" value="'+ data[row].qty +'" id="'+ data[row].car_plate + '" min="1">'+
                        '</div>'+
                        '<div class="product-removal">'+
                            "<button id='" + data[row].car_plate + "' class='remove-product'>Remove</button>"+
                        '</div>'+
                        '<div class="product-line-price">' + total_price +' €' +'</div>'+
                        '</div>'
                        ) 
                        var total_price_cars = total_price_cars + total_price;
                        
                    }  
                    var tax = total_price_cars * taxRate;
                        var shipping = (total_price_cars > 0 ? shippingRate : 0);
                        var total = total_price_cars + tax + shipping;
                    
            $(".total-prices").append(
                '<div class="totals">'+
                    '<div class="totals-item">'+
                    '<label>Subtotal</label>'+
                    '<div class="totals-value" id="cart-subtotal">' + total_price_cars + '</div>'+
                    '</div>'+
                    '<div class="totals-item">'+
                    '<label>Tax (5%)</label>'+
                    '<div class="totals-value" id="cart-tax">' + taxRate + '</div>'+
                    '</div>'+
                    '<div class="totals-item">'+
                    '<label>Shipping</label>'+
                    '<div class="totals-value" id="cart-shipping">' + shipping +'</div>'+       
                    '</div>'+
                    '<div class="totals-item totals-item-total">'+
                    '<label>Grand Total</label>'+
                    '<div class="totals-value" id="cart-total">' + total + '</div>'+
                    '</div>'+
                    '</div>'+
                    '<button id="checkout-button" class="checkout">Checkout</button>'
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
    
    /////////////////////REMOVE/////////////////////////////

        $(document).on("click",".remove-product", function() {
            var car_plate = this.getAttribute('id');
            remove_cart(car_plate);
        });
                function remove_cart(id_car){
                        var token = localStorage.getItem('token');
                        ajaxPromise(friendlyURL("?module=cart&op=remove_product"), 'POST', 'JSON', {'token' : token ,'id_car' : id_car})
                        .then(function(data) { 
                            $("#" + id_car + ".product-cart").slideUp(); 
                            $("#" + id_car + ".product-cart").remove();
                            setTimeout(location.reload(), 3000);
                                }).catch(function() {
                                console.log('catchhhhh');
                            window.location.href = 'index.php?page=error503';
                    }
                )};

    
    function change_qty(){
        $(document).on('input','.quantity-field',function () {
            var token = localStorage.getItem('token');
            var car_plate =  this.getAttribute('id');
            var qty = $("#" + car_plate + ".quantity-field").val();
                ajaxPromise(friendlyURL("?module=cart&op=update_qty"),  'POST', 'JSON', { 'token' : token, 'id_car': car_plate, 'qty': qty})
                .then(function(data) {
                    location.reload();
                }).catch(function() {
                    window.location.href = 'index.php?page=error503'
                });   
            });
    }


//CHECKOUT
function checkout(){
    var token =  localStorage.getItem('token');
    $(document).on('click','#checkout-button',function () {
        ajaxPromise(friendlyURL("?module=cart&op=checkout"), 'POST', 'JSON', {'token' : token})
            .then(function(data) {
                toastr.sucesss("Checkout Completed");
                location.reload();
            }).catch(function() {
                console.log('DENTR0 DEL CATCH');
            });   
        });
}

$(document).ready(function(){
    load_cart();
    change_qty();
    checkout();
});