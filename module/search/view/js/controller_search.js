console.log('BUENASSS');
// function load_brands() {
//     // console.log('hola brandddd');
//     ajaxPromise('module/search/ctrl/ctrl_search.php?op=search_brand', 'POST', 'JSON')
//         .then(function(data) {
//             // console.log(data);
//             $('<option>Choose a brand</option>').attr('selected', true).attr('disabled', true).appendTo('.search_brand')
//             for (row in data) {
//                 $('<option value="' + data[row].cod_brand + '">' + data[row].cod_brand + '</option>').appendTo('.search_brand')
//             }
//         }).catch(function () {
//             window.location.href = "index.php?modules=exception&op=503&error=fail_load_brands&type=503";
//         });
// }
// function load_category(brand) {
//     // console.log('hola categoryyyyyyyyyy');
//     $('.search_category').empty();
//     // console.log(brand);
//     if (brand == undefined) {
//         ajaxPromise('module/search/ctrl/ctrl_search.php?op=search_category_null', 'POST', 'JSON')
//             .then(function (data) {
//                 // console.log(data);
//                 $('<option>Choose a category</option>').attr('selected', true).attr('disabled', true).appendTo('.search_category')
//                 for (row in data) {
//                     $('<option value="' + data[row].cod_cat + '">' + data[row].name_cat + '</option>').appendTo('.search_category')
//                 }
//             }).catch(function () {
//                 window.location.href = "index.php?modules=exception&op=503&error=fail_load_category&type=503";
//             });
//     }
//     else {
//         console.log(brand);
//         ajaxPromise('module/search/ctrl/ctrl_search.php?op=search_category', 'POST', 'JSON', {brand})
//             .then(function (data) {
//                 console.log(data);
//                 $('<option>Choose a categoryS</option>').attr('selected', true).attr('disabled', true).appendTo('.search_category')
//                 for (row in data) {
//                     $('<option value="' + data[row].cod_cat + '">' + data[row].name_cat + '</option>').appendTo('.search_category')
//                 }
//             }).catch(function () {
//                 window.location.href = "index.php?page=ctrl_home&op=list";
//             });
//     }
// }

// function launch_search() {
//     load_brands();
//     load_category();

//     $('.search_brand').change(function () {
//         console.log(this.value);
//         let brand = this.value;
//        // console.log(brand);
//         if (brand === 0) {
//             load_category();
//         } else {
//             load_category(brand);
//         }
//     });
// }

// function autocomplete() {
//     // $('#searchAuto').empty();
//     // console.log('autoclick');
//     $("#autocom").on("keyup", function () {
//         $('#searchAuto').empty();
//         console.log('autoclick222');
//         let sdata = { city: $(this).val() };
//         console.log(sdata);
//         if (($('.search_brand').val() != 0)) {
//             sdata.brand = $('.search_brand').val();
//             console.log('brand',sdata.brand);
//             if (($('.search_brand').val() != 0) && ($('.search_category').val() != 0)) {
//                 sdata.category = $('.search_category').val();
//                 console.log('categoria', sdata.category);
//             }
//         }
//         if (($('.search_brand').val() == undefined) && ($('.search_category').val() != 0)) {
//             sdata.category = $('.search_category').val();
//         }
//         ajaxPromise('module/search/ctrl/ctrl_search.php?op=autocomplete', 'POST', 'JSON', sdata)
//             .then(function (data) {
//                 console.log(data);
//                 $('#searchAuto').empty();
//                 $('#searchAuto').fadeIn(1000);
//                 for (row in data) {
//                     $('#searchAuto').empty();
//                     $('<div></div>').appendTo('#search_auto').html(data[row].city).attr({ 'class': 'searchElement', 'id': data[row].city });
//                 }
//                 $(document).on('click', '.searchElement', function () {
//                     $('#autocom').val(this.getAttribute('id'));
//                     $('#search_auto').fadeOut(1000);
//                 });
//                 $(document).on('click scroll', function (event) {
//                     if (event.target.id !== 'autocom') {
//                         $('#search_auto').fadeOut(1000);
//                     }
//                 });
//             }).catch(function () {
//                 $('#search_auto').fadeOut(500);
//             });
//     });
// }

// function button_search() {
//     // console.log('esto es el button');
//     $('#search-btn').on('click', function () {
//         var search = [];

//         if ($('.search_brand').val() != undefined) {
//             search.push(['cod_brand', $('.search_brand').val()])
//             console.log(search);
//             if ($('.search_category').val() != undefined) {
//                 search.push(['name_cat', $('.search_category').val()])
//             }
//             if ($('#autocom').val() != '') {
//                 search.push(['city', $('#autocom').val()])
//             }
//         } else if ($('.search_brand').val() == undefined) {
//             if ($('.search_category').val() != undefined) {
//                 search.push(['name_cat', $('.search_category').val()])
//             }
//             if ($('#autocom').val() != '') {
//                 search.push(['city', $('#autocom').val()])
//             }
//         }
//         localStorage.removeItem('filters_search');
//         if (search.length != 0) {
//             console.log(search);
//             localStorage.setItem('filters_search', JSON.stringify(search));
//         }
//         window.location.href = 'index.php?page=ctrl_shop&op=list_shop';
//     });
// }

$(document).ready(function () {
    // launch_search();
    // autocomplete();
    // button_search();
});