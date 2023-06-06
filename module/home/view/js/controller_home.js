
// ----------------------------4 MAIN AJAX------------------------------//

function types() {
  ajaxPromise(friendlyURL("?module=home&op=type"), 'POST', 'JSON')
  .then(function( data ) {
    for (row in data) {
              $('<div></div>').attr('class', "card3").attr({ 'id': data[row].desc_type }).appendTo('#containerTypecar')
                  .html(
                      
                      "<div class='card_image'>" +
                      "<img src= " + data[row].img_type + " />" +
                      "</div>" +
                      " <div class='card_title title-white'>" +
                      "<p>" + data[row].desc_type + "</p>" +
                      "</div>"
                  )
    }
  })
  .catch(function() {
    console.log('Error: Types error');
  });
}

function carrusel(){
  ajaxPromise(friendlyURL("?module=home&op=carrusel"),'POST', 'JSON')
    .then(function(data) {
        for (row in data) {
            $('<div></div>').attr('class', "card2").attr({ 'id': data[row].cod_brand }).appendTo(".carousel__list").html(
                "<img src= " + data[row].img_brand + " />"
                )
            
        }
        
        new Glider(document.querySelector('.carousel__list'), {
            slidesToShow: 6,
            slidesToScroll: 5,
            draggable: true,
            arrows: {
              prev: '.glider-prev',
              next: '.glider-next'
            }
        });
    })

    .catch(function() {
      console.log('Error: TypesCARRUSEL error');
    });

}



function category() {
  ajaxPromise(friendlyURL("?module=home&op=category"),'POST', 'JSON')
.then(function(data) {;
    for (row in data) {

        $('<div></div>').attr('class', "card").attr({ 'id': data[row].name_cat }).appendTo('.containerCategories')
            .html(
                "<div class='card_image'>" +
                "<img src= " + data[row].img_cat + " />" +
                "</div>" +
                " <div class='card_title title-white'>" +
                "<p>" + data[row].name_cat + "</p>" +
                "</div>"
            )
            }
}).catch(function() {
    window.location.href = "index.php?module=ctrl_exceptions&op=503&type=503&lugar=Type_Categories HOME";
});
}



function carousel_most_visited() {
  ajaxPromise('?module=home&op=most_visited','POST', 'JSON')
  .then(function(data) {
      for (row in data) {
          $('<div></div>').attr('class', "card4").attr({ 'id': data[row].car_plate }).appendTo(".carousel__visited").html(
            " <div class='card_title title-black'>" +
            "<p>" + data[row].cod_brand +"  " +data[row].name_model  +  "</p>" +
            "</div>"+
            "<div class='card_image'>" +
            "<img src= " + data[row].img_car + " />" +
            "</div>"
            
              )
          
      }
      
      new Glider(document.querySelector('.carousel__visited'), {
          slidesToShow: 3,
          slidesToScroll: 2,
          draggable: true,
          arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
          }
      });
  })
  
  
  .catch(function() {
      window.location.href = "index.php?module=ctrl_exceptions&op=503&type=503&lugar=Carrusel_Brands HOME";
  });
}


// -----------------YOLANDAAA IMPROVEMENT FOR VISITOR-COUNTER WHEN YOU CLICK FROM TRENDING HOME CARS---------------//
function visitor_counter(car_plate){
  ajaxPromise(friendlyURL('?module=shop&op=visitor_counter'), 'POST', 'JSON', {'id_car' : car_plate})
  .then(function (data) {
  }).catch(function () {
      
    });
}





//----------------------CLICKS HOME-SHOP------------------------//

function clicks(){
  localStorage.removeItem('filter');
  localStorage.removeItem('filter_motortype');
  localStorage.removeItem('filter_category');
  localStorage.removeItem('filter_brand');
  localStorage.removeItem('filter_motortype_shop');
  localStorage.removeItem('filter_category_shop');
  localStorage.removeItem('filter_brand_shop');
  localStorage.removeItem('filter_car');
  localStorage.removeItem('filters_search');

  $(document).on("click",'.card2', function (){
    var filters = [];
    filters.push(["cod_brand",this.getAttribute('id')]);
    localStorage.setItem('filter_brand', JSON.stringify(filters));
      setTimeout(function(){ 
        window.location.href = 'index.php?module=shop&op=view';
      }, 100);  
  }); 

  $(document).on("click",'.card', function (){
    var filters = [];
    filters.push(['name_cat',this.getAttribute('id')]);
      localStorage.setItem('filter_category', JSON.stringify(filters)); 
      setTimeout(function(){ 
        window.location.href = 'index.php?module=shop&op=view';
      }, 100);  
  });

  $(document).on("click",'.card3', function (){
    var filters = [];
    filters.push(['desc_type',this.getAttribute('id')]);
    localStorage.setItem('filter_motortype', JSON.stringify(filters)); 
      setTimeout(function(){ 
        window.location.href = 'index.php?module=shop&op=view';
      }, 1000); 
  });

  $(document).on("click",'.card4', function (){
    var car_plate_car = this.getAttribute('id');
    var filters = [];
    visitor_counter(car_plate_car);
    filters.push("car_plate",this.getAttribute('id'));
    localStorage.setItem('filter_car', JSON.stringify(filters)); 
      setTimeout(function(){ 
        window.location.href = 'index.php?module=shop&op=view';
      }, 1000); 
  });
}



// ------------------------LOAD BOOKS-------------------------//
function load_more_Books_car() {
  var limit = 3;

  $(document).on("click", '#load_more_books', function() {
      limit = limit + 3;
      $('.books_car').remove();
      $('#load_more_books').remove();
      
      ajaxPromise('https://www.googleapis.com/books/v1/volumes?q=Cars','GET', 'JSON')
          .then(function(data) {
              if (limit === 9) {
                  $('<button class="no-results" id="">No hay mas libros disponibles....</button></br>').appendTo('.btn-more-books');
              } else {
                  $('<button class="load_more_button" id="load_more_books">LOAD MORE</button>').appendTo('.btn-more-books');
              }

              for (i = 0; i < limit; i++) {
                  $('<div></div>').attr({ id: 'books_car', class: 'books_car' }).appendTo('.books_content')
                      .html(
                          '<div class="col-md-4 col-sm-4 col-xs-12">' +
                          '<div class="panel panel-danger adjust-border-radius">' +
                          '<div class="title_book panel-heading adjust-border">' +
                          '<h4>' + data.items[i].volumeInfo.title + '</h4>' +
                          '</div>' +
                          '<div class="panel-body">' +
                          '<ul class="plan">' +
                          '<li class="Img_new"><img src=' + data.items[i].volumeInfo.imageLinks.thumbnail + '</li>' +
                          '<li><i id="col-ico" class="fa-solid fa-user-large fa-sm"></i>&nbsp;&nbsp;' + data.items[i].volumeInfo.authors[0] + '</li>' +
                          '<li><i id="col-ico" class="fa-solid fa-calendar-days fa-sm"></i>&nbsp;&nbsp;' + data.items[i].volumeInfo.publishedDate + '</li>' +
                          '</ul>' +
                          '</div>' +
                          '<div class="panel-footer">' +
                          '<a href=' + data.items[i].volumeInfo.infoLink + ' target="_blank" class="btn btn-danger btn-block btn-lg adjust-border-radius">MORE INFO</a>' +
                          '</div>' +
                          '</div>' +
                          '</div>'
                      );
              }
          }).catch(function() {
            
          });
  })
}

function get_Books_car() {
  limit = 9;
  ajaxPromise('https://www.googleapis.com/books/v1/volumes?q=Cars','GET', 'JSON')
      .then(function(data) {
          data.items.length = limit;
          $('<h2 class="cat">Books releted</h2>').appendTo('.books_content');
          $('<button class="load_more_button" id="load_more_books">LOAD MORE</button>').appendTo('.btn-more-books');
          
          for (i = 0; i < data.items.length; i++) {
              $('<div></div>').attr({ id: 'books_car', class: 'books_car' }).appendTo('.books_content')
                  .html(
                      '<div class="col-md-4 col-sm-4 col-xs-12">' +
                      '<div class="panel panel-danger adjust-border-radius">' +
                      '<div class="title_book panel-heading adjust-border">' +
                      '<h4>' + data.items[i].volumeInfo.title + '</h4>' +
                      '</div>' +
                      '<div class="panel-body">' +
                      '<ul class="plan">' +
                      '<li class="Img_new"><img src="' + data.items[i].volumeInfo.imageLinks.thumbnail + '"</li>' +
                      '<li><i id="col-ico" class="fa-solid fa-user-large fa-sm"></i>&nbsp;&nbsp;' + data.items[i].volumeInfo.authors[0] + '</li>' +
                      '<li><i id="col-ico" class="fa-solid fa-calendar-days fa-sm"></i>&nbsp;&nbsp;' + data.items[i].volumeInfo.publishedDate + '</li>' +
                      '</ul>' +
                      '</div>' +
                      '<div class="panel-footer">' +
                      '<a href=' + data.items[i].volumeInfo.infoLink + ' target="_blank" class="btn btn-danger btn-block btn-lg adjust-border-radius">MORE INFO</a>' +
                      '</div>' +
                      '</div>' +
                      '</div>'
                  );
          }
      }).catch(function() {
          // window.location.href = "index.php?module=ctrl_exceptions&op=503&type=503&lugar=News cars HOME";
      });
  load_more_Books_car();
}


$(document).ready(function() {
types();
carrusel();
category();
carousel_most_visited();
clicks();
get_Books_car();
});