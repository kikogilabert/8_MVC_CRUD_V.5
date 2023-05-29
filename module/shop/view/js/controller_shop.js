function loadCars(total_prod = 0, items_page = 3) {
//  //FILTERS-HOME  

var brand_filter =  JSON.parse(localStorage.getItem('filter_brand')) || false;
  var category_filter =  JSON.parse(localStorage.getItem('filter_category')) || false;
  var motor_filter =  JSON.parse(localStorage.getItem('filter_motortype')) || false;
  //NORMAL-FILTERS FROM SHOP
  var filter = JSON.parse(localStorage.getItem('filter')) || false;
  //FILTERS-SEARCH
  var search_filter =  JSON.parse(localStorage.getItem('filters_search')) || false;
  //FILTERS-TRENDING CARS HOME
  var car_carrusel =  JSON.parse(localStorage.getItem('filter_car')) || false;
  //REDIRECT LIKE
  var id_car  =  localStorage.getItem('id_car') || false;
  // console.log(redirect);

  if(brand_filter != false) {
    ajaxForSearch("?module=shop&op=filters", brand_filter, total_prod, items_page );
  } else if (car_carrusel != false) {
    loadDetails(car_carrusel[1]);
  } else if (category_filter != false) {
    ajaxForSearch("?module=shop&op=filters",  category_filter, total_prod, items_page);
  } else if (motor_filter != false) {
    ajaxForSearch("?module=shop&op=filters", motor_filter, total_prod, items_page );
  } else if (search_filter != false) {
    ajaxForSearch("?module=shop&op=filters",  search_filter, total_prod, items_page );
  }else if (filter != false) {
    ajaxForSearch("?module=shop&op=filters", filter,  total_prod, items_page );
  } else if (id_car) {
    console.log('elseif');
    loadDetails(id_car);
    visitor_counter(id_car);
  }else {
    // console.log('holaaaaa');
    ajaxForSearch("?module=shop&op=allcars", undefined, total_prod, items_page );
  } 
}

function ajaxForSearch(url, filters, total_prod = 0, items_page = 3) {
// console.log(filters, total_prod, items_page);
  ajaxPromise(friendlyURL(url), 'POST', 'JSON', {'filter': filters, 'total_prod': total_prod, 'items_page': items_page })
    .then(function (data){
      console.log(data);

      $('#all_maps').empty();
      $('#content_shop_cars').empty();
      $('#content_shop_cars').empty();
      $('.date_car' && '.date_img').empty();
      //
      //MEJORA SEPARACION DE MAPAS PARA HACER DIFERENTE CSS A CADA UNO
      //
      $('<div></div>').appendTo('#all_maps')
          .html(
            // '<hr class=hr-shop>'+
            '<br/>'+
            '<h2>FIND OUR BEST RATED CARS</h2>' + 
                '<br/>' + 
            '<div class="div-maps">' +
                '<br/>' +
                '<br/>' + 
                '<br/>' +
            '<div id="map" class="mapas"></div>' +
            '<div class="info-map">'+
            '<ol>'+
              '<h4>Some reasons to trust in EGOCARS:</h4>'+
                  '<li class="map-list">Excellence and Prestige on the road </li>'+
                  '<li class="map-list">Our nearest dealerships are available to help you at 0 cost</li>'+
                  '<li class="map-list">Personalised Advice </li>'+
                  '<li class="map-list">Outstanding quality </li>'+
            '</ol>'+
            '</div>'+
            '</div>'
            )

      //YOLANDA Mejora para que cuando no hayan resultados en los filtros aplicados
      if (data == "error") {
        $('<div></div>').appendTo('#content_shop_cars')
          .html(
            '<h3>¡No se encuentarn resultados con los filtros aplicados!</h3>'
          )
      } else {
        for (row in data) {
          $('<div></div>').attr({ 'id': data[row].car_plate, 'class': 'list_content_shop' }).appendTo('#content_shop_cars')
            .html(
              "<div class='page'>"+
              "<br>"+
              "<br>"+
              "<br>"+
              "<body>"+
              "<div class='product-container'>" +
              
              "<div class='list_product'>" +
              "<div class='img-container'>" +
              "<img src= '" + data[row].img_car + "'" + "</img>" +
              "<h1><b class='placement'>" + data[row].cod_brand + " " + data[row].name_model +"<div id='" + data[row].car_plate + "' class='list_heart'></div>"+ "</b></h1>" +
              "</div>" +
              "<div class='product-info'>" +
              "<div class='product-content'>" +
              
              // "<p>Up-to-date maintenance and revisions</p>" +
              "<ul class='derecha'>" +
              "<li>" + "CAR PLATE:   " + data[row].car_plate  + "</li>" +
              "<li>" + "LICENSE NUM:   " + data[row].license_number + "</li>" +
              "<li>" + data[row].km + " KM" + "</li>" +
              "<li>" + "ENGINE TYPE:   " + data[row].desc_type + "</li>" +
              "<li>" + "COLOR:   "  + data[row].color + "</li>" +
              "<li>" + "PRICE:   "  + data[row].price + '€' + "</li>" +
              "<li class='botones'>" +"<div>" +
              "<a class='button-85' id='" + data[row].car_plate +"'> Add to Cart</a>" + "&nbsp; &nbsp;" +
              "<button id='" + data[row].car_plate + "' class='more_info_list' >More Info</button>" +
              // "<button class='button buy' >Buy</button>" +
              "</div>" +
              "</ul>" +
              "</div>" +
              "</div>" +
              "</div>" +
              "</div>"+
              "</div>"+
              // "<div id='pagination'></div>"+
              "</body>"
            )}
        load_likes_user();
      }
      data[row].car_plate;
      mapBox_all(data);
    }).catch(function () {
      $("#content_shop_cars").empty();
      $('<div></div>').appendTo('#content_shop_cars').html('<h1>No hay coches con estos holaaa</h1>');
    });
}

function clicks() {
  $(document).on("click", ".more_info_list", function () {
    var car_plate = this.getAttribute('id');
    loadDetails(car_plate);
    visitor_counter(car_plate);
  });
  $(document).on("click", ".button_pagination", function () {
    var num = this.getAttribute('id');
    total_prod = 3 * (num - 1);
    // console.log(total_prod);
    loadCars(total_prod, 3);
    // console.log('botonazo')
  });

  $(document).on("click",".list_heart", function() {
    var car_plate = this.getAttribute('id');
    click_like(car_plate, "list_all");
    // console.log(car_plate);
  });

  $(document).one( "click",".details_heart", function() {
      var car_plate = this.getAttribute('id');
        // console.log('dentro details');
      click_like(car_plate, "details");
      loadDetails(car_plate);
      // console.log(car_plate);
    // $(this).off('click'); 
});

$(document).on("click", ".button-85", function () {
  var car_plate = this.getAttribute('id');
  add_cart(car_plate);
});


}

function visitor_counter(car_plate){
  ajaxPromise('?module=shop&op=visitor_counter', 'POST', 'JSON', {'id_car' : car_plate})
  .then(function (data) {
  }).catch(function () {
      
    });
}



function loadDetails(car_plate){
  $('#content_shop_cars').empty();
  ajaxPromise(friendlyURL('?module=shop&op=details_car'), 'POST', 'JSON', {'car_plate' : car_plate}) 
    .then(function (data) {
      // console.log(data);
      $('.filter_car').empty();
      $('.div-maps').empty();
      $('#content_shop_cars').empty();
      $('.date_img_dentro').empty();
      $('.date_car_dentro').empty();
      $('.filters').empty();
      $('.paginationcss').empty();
      //
      //MEJORA SEPARACION DE MAPAS PARA HACER DIFERENTE CSS A CADA UNO (no mha donat molt de temps a retocar-ho)
      //

      $('<div></div>').appendTo('#all_maps')
      .html(
        '<div class="div-maps2">' +
            '<h2>Where you can find the  '+ data[0][0].cod_brand + " " + data[0][0].name_model  +  '</h2>' +   
            '<br/>' + 
        '<div id="map2" class="mapas"></div>' +
        '</div>'
        )
      for (row in data[1][0]) {
        $('<div></div>').attr({ 'id': data[0][0].car_plate, class: 'date_img_dentro' }).appendTo('.date_img')
          .html(
            "<div class='content-img-details'>" +
            "<img src= '" + data[1][0][row].img + "'" + "</img>" +
            "</div>"
          )
      }
      $('<div></div>').attr({ 'id': data[0][0].car_plate, class: 'date_car_dentro' }).appendTo('.date_car')
        .html(
          "<div class='list_product_details'>" +
          "<div class='product-info_details'>" +
          "<div class='product-content_details'>" +
          "<h1><b class='placement'>" + data[0][0].cod_brand + " " + data[0][0].name_model +"<div id='" + data[0][0].car_plate + "' class='details_heart'></div>"+ "</b></h1>" +
          "<hr class=hr-shop>" +
          "<table class='details_table'> <tr>" +
          "<td>" + "CAR PLATE:   " + data[0][0].car_plate + "</td>"+ "</tr>"  +
          "<td> " + "KILOMETRAJE: " + data[0][0].km + "KM" + "</td>" + "</tr>" +
          "<td>" + "LICENSE NUM: " +  data[0][0].license_number + "</td>" + "</tr>" +
          "<td>" + "DOORS: " +  data[0][0].doors + "</td>"+ "</tr>"  +
          "<td>" + "ENGINE: " +  data[0][0].desc_type + "</td>"+ "</tr>"  +
          "<td>" + "COLOR: " +  data[0][0].color + "</td>"+ "</tr>" +
          "<td>" + "CONTADOR: " +  data[0][0].visit_count + "</td>"+ "</tr>" +
          "</table>" +
          "<hr class=hr-shop>" +
          "<h3><b>" + "More Information:" + "</b></h3>" +
          "<p>This vehicle has a 2-year warranty and reviews during the first 6 months from its acquisition.</p>" +
          "<div class='buttons_details'>" +
          "<a class='button add' href='#'>Add to Cart</a>" +
          "<a class='button buy' href='#'>Buy</a>" +
          "<span class='button' id='price_details'>" + data[0][0].price + "<i class='fa-solid fa-euro-sign'></i> </span>" +
          // "<a class='details_heart' id='" + data[0].car_plate +"'><i id=" + data[0].car_plate + " class='fa-solid fa-heart fa-lg'></i></a>" +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>"+
          "<br></br>"+
          "<hr class=hr-shop>" +
          "<div class='results'></div>"
        )
      new Glider(document.querySelector('.date_img'), {
        slidesToShow: 1,
        dots: '#dots',
        draggable: true,
        arrows: {
          prev: '.glider-prev',
          next: '.glider-next'
        }
      });
       
      setTimeout(function(){
        localStorage.removeItem('filter_car')
      }, 2000); 
    
      id_car = localStorage.getItem('id_car') || false;
      // console.log(id_car);
      if (id_car){
          click_like(car_plate, "details");
          load_likes_user();
          setTimeout(function(){
            localStorage.removeItem('id_car')
          }, 2000); 
      }
          load_likes_user();
      
      
      mapBox(data);
      more_cars_related(data[0][0].motor_type);
      
    }).catch(function () {
      console.log('catch');
    });
}


function print_filters() {
  // $('.mierda').empty();
  $('<div class="div-filters"></div>').appendTo('.filters')
      .html('<select class="filter_type">' +
      "<form>" +
      "<input type='text' class='mierda' placeholder='hola'</form>" +
      "<div class='col-md-6 mb-2'>" +
      "<div class='form-group'>" +
      "<label for='motor_type'>Motor Type</label>" +
      "<select class='form-control form-control-lg form-control-a filter_motortype_shop' id='motortype'>" +
      "<option disabled selected>Select a Type</option>" +
      "<option value='diesel'>Diesel</option>" +
      "<option value='gasoline'>Gasoline</option>" +
      "<option value='electric'>Electric</option>" +
      "<option value='hybrid'>Hybrid</option>" +
      "</select>" +
      "</div>" +
      "</div>" +
      "<div class='col-md-6 mb-2'>" +
      "<div class='form-group'>" +
      "<label for='category'>Category</label>" +
      "<select class='form-control form-control-lg form-control-a filter_category_shop' id='category'>" +
      "<option disabled selected>Select a category</option>" +
      "<option value='Km0'>KM0</option>" +
      "<option value='Pre-Owned'>Pre Owned</option>" +
      "<option value='Renting'>Renting</option>" +
      "<option value='Offer'>Offer</option>" +
      "<option value='New'>New</option>" +
      "</select>" +
      "</div>" +
      "</div>" +
      "<div class='col-md-6 mb-2'>" +
      "<div class='form-group'>" +
      "<label for='brand'>Brand</label>" +
      "<select class='form-control form-control-lg form-control-a filter_brand_shop' id='brand'>" +
      "<option disabled selected>Select a brand</option>"+
      "<option value='Audi'>Audi</option>" +
      "<option value='Mercedes'>Mercedes</option>" +
      "<option value='BMW'>BMW</option>" +
      "<option value='Seat'>Seat</option>" +
      "</select>" +
      "</div>" +
      "</div>" +
      "<div class='col-md-6 mb-2'>" +
      "<div class='form-group'>" +
      "<label for='order'>Order by</label>" +
      "<select class='form-control form-control-lg form-control-a filter_order' id='order'>" +
      "<option disabled selected>Order by:</option>"+
      "<option value='km'>More KM</option>" +
      "<option value='price'>Highest Price</option>" +
      "<option value='visit_count'>Most visited</option>" +
      "</select>" +
      "</div>" +
      "</div>" +
      '<button class="filter_button Button_green" id="Button_filter">Filter</button>' +
      '<button class="filter_remove Button_brown" id="filter_remove">Remove</button>'+
      "</form>");
}

function filter_button() {
  //Filtro motor_type
  $(function(){
  $('.filter_motortype_shop').change(function () {
    localStorage.setItem('filter_motortype_shop', this.value);
  });
  if (localStorage.getItem('filter_motortype_shop')) {
    $('.filter_motortype_shop').val(localStorage.getItem('filter_motortype_shop'));
  }
});
//ORDER BY:
$(function(){
  $('.filter_order').change(function () {
    localStorage.setItem('filter_order', this.value);
  });
  if (localStorage.getItem('filter_order')) {
    $('.filter_order').val(localStorage.getItem('filter_order'));
  }
});

  //Filtro category
  $(function(){
  $('.filter_category_shop').change(function () {
    localStorage.setItem('filter_category_shop', this.value);
  });
  if (localStorage.getItem('filter_category_shop')) {
    $('.filter_category_shop').val(localStorage.getItem('filter_category_shop'));
  }
});

  //Filtro order
  $(function(){
    $('.filter_order').change(function () {
      localStorage.setItem('filter_order', this.value);
    });
    if (localStorage.getItem('filter_order')) {
      $('.filter_order').val(localStorage.getItem('filter_order'));
    }
  });

  //Filtro de brand
  $(function(){
  $('.filter_brand_shop').change(function () {
    localStorage.setItem('filter_brand_shop', this.value);
  });
  if (localStorage.getItem('filter_brand_shop')) {
    $('.filter_brand_shop').val(localStorage.getItem('filter_brand_shop'));
  }
});

  $(document).on('click', '.filter_button', function () {
    var filter = [];

    if (localStorage.getItem('filter_motortype_shop')) {
        filter.push(['desc_type', localStorage.getItem('filter_motortype_shop')])
    }
    if (localStorage.getItem('filter_category_shop')) {
      filter.push(['name_cat', localStorage.getItem('filter_category_shop')])
    }
    if (localStorage.getItem('filter_brand_shop')) {
      filter.push(['cod_brand', localStorage.getItem('filter_brand_shop')])
    }
    if (localStorage.getItem('filter_order')) {
      filter.push(['order', localStorage.getItem('filter_order')])
    }

    localStorage.setItem('filter', JSON.stringify(filter));
    var filter = JSON.parse(localStorage.getItem('filter')) || false;
    
    // console.log(filter);
    if (filter) {
      // console.log(filter);
      ajaxForSearch("?module=shop&op=filters",  filter);
      pagination(filter);
    }
    else {
      ajaxForSearch("?module=shop&op=allcars");
    }

  });
}

function load_details() {
  $(document).on('click', '.link', function () {
    var id = this.getAttribute('id');
    loadDetails(id);
    console.log('detalles: ', id);
  })
}

function remove_filters(){
  $(document).on('click', '.filter_remove', function() {
    //FILTERS-SHOP
    localStorage.removeItem('filter_motortype_shop');
    localStorage.removeItem('filter_category_shop');
    localStorage.removeItem('filter_brand_shop');
    //FILTERS-HOME
    localStorage.removeItem('filter_motortype');
    localStorage.removeItem('filter_category');
    localStorage.removeItem('filter_brand');
    //FILTERS-SEARCH
    localStorage.removeItem('filters_search');
    //OTHER-FILTERS
    localStorage.removeItem('filter');
    localStorage.removeItem('filter_car');
    localStorage.removeItem('filter_order');
    location.reload();
  })
}

function mapBox_all(data) {
  mapboxgl.accessToken = 'pk.eyJ1IjoiMjBqdWFuMTUiLCJhIjoiY2t6eWhubW90MDBnYTNlbzdhdTRtb3BkbyJ9.uR4BNyaxVosPVFt8ePxW1g';
  const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v12',
      center: ['-1.005300392580198', '40.02804327191509'], // starting position [lng, lat] , 
      zoom: 4 // starting zoom
  });

  for (row in data) {
      // console.log('holaaa');
      const marker = new mapboxgl.Marker()
      const minPopup = new mapboxgl.Popup()
      minPopup.setHTML('<h3 style="text-align:center;">' + data[row].cod_brand + '</h3><p style="text-align:center;">Modelo: <b>' + data[row].name_model + '</b></p>' +
          '<p style="text-align:center;">Precio: <b>' + data[row].price + '€</b></p>' +
          '<img class="fotillo" src=" ' + data[row].img_car + '"/>'+
          '<button id="' + data[row].car_plate + '" class="more_info_list" >More Info</button>' ) 
      marker.setPopup(minPopup)
          .setLngLat([data[row].lon, data[row].lat])
          .addTo(map);
  }
}

function mapBox(data) {
  // console.log(id);
  // console.log(id.lon, id.lat);
  mapboxgl.accessToken = 'pk.eyJ1IjoiMjBqdWFuMTUiLCJhIjoiY2t6eWhubW90MDBnYTNlbzdhdTRtb3BkbyJ9.uR4BNyaxVosPVFt8ePxW1g';
  const map = new mapboxgl.Map({
      container: 'map2',
      style: 'mapbox://styles/mapbox/streets-v12',
      center: [data[0][0].lon, data[0][0].lat], // starting position [lng, lat] , 
      zoom: 6// starting zoom
  });
  const marker = new mapboxgl.Marker()
  const minPopup = new mapboxgl.Popup()
  minPopup.setHTML('<h4>' + data[0][0].cod_brand + '</h4><p>Modelo: ' + data[0][0].name_model + '</p>' +
      '<p>Precio: ' + data[0][0].price + '€</p>' +
      '<img class="fotillo" src=" ' + data[0].img_car + '"/>')
  marker.setPopup(minPopup)
      .setLngLat([data[0][0].lon, data[0][0].lat])
      .addTo(map);
      
      
}

function highlightFilters() {
  var all_filters = JSON.parse(localStorage.getItem('filters'));

  if (all_filters[1].Num_doors[0] != '*') {
      document.getElementById(all_filters[1].Num_doors[0]).setAttribute('checked', true);
  }
  if (all_filters[2].category[0] != '*') {
      document.getElementById('select_cat').value = all_filters[2].category[0];
  }
  if (all_filters[0].Color[0] != '*') {
      for (row in all_filters[0].Color) {
          document.getElementById(all_filters[0].Color[row]).setAttribute('checked', true);
      }
  }
}

function cars_related(loadeds = 0, type_car, total_items) {
  let items = 3;
  let loaded = loadeds;
  let type = type_car;
  let total_item = total_items;
  ajaxPromise(friendlyURL('?module=shop&op=cars_related'), 'POST', 'JSON', {'type': type, 'loaded': loaded, 'items': items })
      .then(function(data) {
        // console.log(data);
          if (loaded == 0) {
              $('<div></div>').attr({ 'id': 'title_content', class: 'title_content' }).appendTo('.results')
                  .html(
                      '<h2 class="cat">Cars related</h2>'
                  )
              for (row in data) {
                $('<div></div>').attr('class', "more_related_list").attr({ 'id': data[row].car_plate }).appendTo(".title_content").html(
                    " <div>" +
                    "<p>" + data[row].cod_brand +"  " +data[row].name_model  +  "</p>" +
                    "</div>"+
                    "<div>" +
                    "<img src= " + data[row].img_car + " />" +
                    "</div>"
                  
                    )
                
            }
              $('<div></div>').attr({ 'id': 'more_car__button', 'class': 'more_car__button' }).appendTo('.title_content')
                  .html(
                      '<button class="load_more_button" id="load_more_button">LOAD MORE</button>'
                  )
          }
          if (loaded >= 3) {
                for (row in data) {
                  $('<div></div>').attr('class', "more_related_list").attr({ 'id': data[row].car_plate }).appendTo(".title_content").html(
                      " <div>" +
                      "<p>" + data[row].cod_brand +"  " +data[row].name_model  +  "</p>" +
                      "</div>"+
                      "<div>" +
                      "<img src= " + data[row].img_car + " />" +
                      "</div>"
                    
                      )
                  
              }
              var total_cars = total_item - 3;
              if (total_cars <= loaded) {
                  $('.more_car__button').empty();
                  $('<div></div>').attr({ 'id': 'more_car__button', 'class': 'more_car__button' }).appendTo('.title_content')
                      .html(
                        "<h3>¡THERE ARE NOT MORE CARS AVAILABLE!</h3>"+
                          "</br><button class='btn-notexist' id='btn-notexist'></button>"
                      )
              } else {
                  $('.more_car__button').empty();
                  $('<div></div>').attr({ 'id': 'more_car__button', 'class': 'more_car__button' }).appendTo('.title_content')
                      .html(
                          '<button class="load_more_button" id="load_more_button">LOAD MORE</button>'
                      )
              }
          }
      }).catch(function() {
          console.log("error cars_related");
      });
}

function more_cars_related(type_car) {
  // console.log('hola cars related');
  var type_car = type_car;
  var items = 0;
  ajaxPromise(friendlyURL('?module=shop&op=count_cars_related'), 'POST', 'JSON',{'type_car': type_car})
      .then(function(data) {
        // console.log(data);
          var total_items = data[0].n_prod;
          cars_related(0, type_car, total_items);
          $(document).on("click", '.load_more_button', function() {
              items = items + 3;
              $('.more_car__button').empty();
              cars_related(items, type_car, total_items);
          });
      }).catch(function() {
          console.log('error total_items');
      });
}

function pagination(filter) {
    var filters_search = JSON.parse(localStorage.getItem('filters_search'));
    var filter_home = JSON.parse(localStorage.getItem('filter_category')) || JSON.parse(localStorage.getItem('filter_brand')) || JSON.parse(localStorage.getItem('filter_motortype')) ;
  
  if (filters_search) {
    var url = "?module=shop&op=count_filters_search";
  
  } else if (filter_home){
    console.log('entra en el elseif');
    var url = "?module=shop&op=count_filters_home";

  } else if (filter != null){
    // console.log('filterfilterfilterfilterfilterfilterfilterfilterfilter');
    var url = "?module=shop&op=count_filters_shop";
  
  } else {
    var url = "?module=shop&op=count_filters";
  }
// console.log(filter_home.value);
  ajaxPromise(friendlyURL(url), 'POST', 'JSON', {'filter': filter, 'filter_home': filter_home, 'filter_search': filters_search })
      .then(function(data) {
        // console.log(data);
          var total_prod = data[0].counts;
          if (total_prod >= 3) {
              total_pages = Math.ceil(total_prod / 3)
          } else {
              total_pages = 1;
          }
          $('.pagination').empty();
            for (let i = 1; i <= total_pages; i++) {
                $('<div></div>').attr({ 'id':  i }).appendTo(".pagination").html(
                " <div class='paginationcss'>" +
                // "<h1>" +" " +"</h1>" +
                '<button class="button_pagination" id='+ i +'>'+ i +"     " + '</button>' +
                // "<br/>"+
                "</div>"
                )
    
            } 
        // loadCars(0, 3);
          });
        
}

// // LIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKES
// // LIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKES
// // LIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKES

function click_like(id_car, lugar) {
  var token = localStorage.getItem('token');
  if (token){
      ajaxPromise( friendlyURL("?module=shop&op=control_likes"), 'POST', 'JSON', { 'id_car': id_car, 'token': token })
        .then(function (data){
            console.log(data);
            // console.log('esto es del click like');
          //YOLANDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
            //MIRA ESTA MILLORA
            if(lugar === "details"){
              // console.log('console1');
              $("#" + id_car + ".details_heart").toggleClass('is-active');
            }else{
              // console.log('console2');
              $("#" + id_car + ".list_heart").toggleClass('is-active');
            }
          }).catch(function() {
            console.log('DONA ERROR');
            });
  } else {
      localStorage.setItem('id_car', id_car);
      toastr.warning("Debes de iniciar session");
      setTimeout("location.href = '?module=login&op=view'" , 2000);
  }
}

function load_likes_user() {
  var token = localStorage.getItem('token');
  if (token) {
    // console.log('dentro del token');
      ajaxPromise(friendlyURL("?module=shop&op=load_likes_user"),'POST', 'JSON', {'token': token }) 
          .then(function(data) {
            console.log(data);
              for (row in data) {
                //YOLANDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                //MIRA ESTA MILLORA
                $("#" + data[row].car_plate + ".details_heart").toggleClass('is-active'); 
                $("#" + data[row].car_plate + ".list_heart").toggleClass('is-active');

              }
          }).catch(function() {
            console.log('que putadaaaaaaLOAD');
          });
  }
}

// function add_cart(car_plate){
//   // console.log('add_cart log');
//   var token = localStorage.getItem('token');
//   if(token){
//       ajaxPromise('module/cart/ctrl/ctrl_cart.php?op=insert_cart', 'POST', 'JSON', { 'id_car': car_plate, 'token' : token })
//       .then(function(data) { 
//         console.log(data);
//           //toastr
//       }).catch(function() {
//         console.log('CATCH');
//           window.location.href = 'index.php?page=error503'
//       });   
//     }else{
//       // localStorage.setItem('id_car', id_car);
//       toastr.warning("Debes de iniciar session");
//       setTimeout("location.href = 'index.php?page=ctrl_login&op=list';", 2000);
//     }
// }
console.log('dentro del shop js2');

$(document).ready(function () {
  loadCars();
  print_filters();
  filter_button();
  clicks();
  remove_filters();
  pagination();
});