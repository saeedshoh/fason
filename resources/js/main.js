const { stubString, last } = require('lodash');

require('./jquery.inputmask.bundle.js');

$('#listView').on('click', function(){
    $('#catProducts .row').removeClass('row-cols-2').addClass('row-cols-1');
    $('#gridView').removeClass('d-none');
    $(this).addClass('d-none');
    $('#catProducts .discription').removeClass('d-none');
    $('#catProducts .card').addClass('flex-row');
    $('#catProducts .card img').addClass('w-50');
    $('#catProducts .row').attr('data-style', '2');
});
$('#gridView').on('click', function(){
    $('#catProducts .row').attr('data-style', '1');
    $('.card').find('img').removeClass('w-50');
    $('#catProducts .card').removeClass('flex-row');
    $('#catProducts .row').removeClass('row-cols-1').addClass('row-cols-2');
    $('#listView').removeClass('d-none');
    $(this).addClass('d-none');
    $('#catProducts .discription').addClass('d-none');
});
////===================aaaaaaaaaaaaaaaaaaaaaaaaaa===================//
$(function() {

    $("#galler").change(function() {
        var fd = new FormData()
        var this_ = this
        fd.append('_token', $('meta[name=csrf-token]').attr("content"));
        var files = $('#galler')[0].files;
        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                fd.append('image', files[i]);
                $.ajax({
                    url: '/uploadImage',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        var x = $('#db-preview-image').find('.product_image[data-image="false"]').first()
                        x.find('img').hide()
                        x.find('.spinner-border').removeClass('d-none')
                    },
                    success: function(response) {
                        var x = $('#db-preview-image').find('.product_image[data-image="false"]').first()
                        x.find('.spinner-border').addClass('d-none')
                        x.html('').attr('data-image', 'true').append(`
                            <div class="profile-pic">
                                <img src="/storage/${response}" data-image-src="${response}" class="position-relative mw-100 pic-item">
                                <div class="deleteImage"><i class="fa fa-trash fa-lg text-danger"></i></div>
                            </div>
                    `)

                        let gallery = $('#gallery')
                        if (gallery.val() == '') {
                            gallery.val(gallery.val() + response)
                        } else {
                            gallery.val(gallery.val() + ',' + response)
                        }
                    },
                });
            }

        } else {
            alert("Please select a file.");
        }
    });
});


$('body').on('click', '.deleteImage', function() {
    let url = $(this).parent().find('img').data('image-src')
    let gallery = $('#gallery')
    let array = gallery.val().split(',')
    const index = array.indexOf(url)
    if (index > -1) {
        array.splice(index, 1);
    }
    gallery.val(array)
    $(this).parent().parent().remove()
    if (url.indexOf('products/edit/') !== -1) {
        $(this).parent().parent().parent().remove()
    } else {
        $(this).parent().parent().remove()
    }
    $('#db-preview-image').append(`
        <div class="col-3 text-center product_image d-flex justify-content-center align-items-center" data-image="false">
            <div class="spinner-border d-none" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <label for="galler">
                <img src="/storage/theme/avatar_gallery.svg" class="px-0 btn mw-100 rounded gallery"  alt="">
            </label>
        </div>
    `)
})

$(document).ready(function() {
    $('body').on('keyup', '#nameStoreCreate', function() {
        $('#storeSubmit').attr('disabled', true);
        var store = $(this).val();
        if (store.length >= 3) {
            setTimeout(() => {
                $.get('/store/exist/' + store, function(data) {
                    if (data.exist) {
                        $('.store-exist').removeClass('d-none');
                        $('#storeSubmit').attr('disabled', true);
                    } else {
                        $('.store-exist').addClass('d-none');
                        $('#storeSubmit').attr('disabled', false);
                    }
                });
            }, 2000);
        }
    });

    $('body').on('keyup', '#nameEditStore', function() {
        $('#storeEditSubmit').attr('disabled', true);
        var store = $(this).val();
        if (store != this.defaultValue) {
            setTimeout(() => {
                $.get('/store/exist/' + store, function(data) {
                    if (data.exist) {
                        $('.store-exist').removeClass('d-none');
                        $('#storeEditSubmit').attr('disabled', true);
                    } else {
                        $('.store-exist').addClass('d-none');
                        $('#storeEditSubmit').attr('disabled', false);
                    }
                });
            }, 2000);
        }
    });

    $('.sms--false').hide();
    $(window).scroll(fetchPosts);

    function fetchPosts() {
        var url = $(location).attr("href")
        var page = $('.endless-pagination').data('next-page');
        if (page !== null && page !== '') {
            clearTimeout($.data(this, "scrollCheck"));

            $.data(this, "scrollCheck", setTimeout(function() {
                $('#scroll-spinner').toggleClass('d-none')

                var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

                if (scroll_position_for_posts_load >= $(document).height()) {
                    var style = $('#catProducts .row').attr('data-style');
                    console.log(style);
                    if (url.indexOf('sort=') !== -1) {
                        const sort = url.split('?')[1]
                        
                        $.get(page + '&' + sort, {style: style}, function(data) {
                            $('#scroll-spinner').toggleClass('d-none')
                            $('.endless-pagination').append(data.posts);
                            $('.endless-pagination').data('next-page', data.next_page + '&' + sort);
                        });
                    } else {
                        $.get(page, {style: style}, function(data) {
                            $('#scroll-spinner').toggleClass('d-none')
                            $('.endless-pagination').append(data.posts);
                            $('.endless-pagination').data('next-page', data.next_page);
                        });
                    }
                }
            }, 350))

        }
    }
    $('.markets').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $("#phone").inputmask({
        mask: '999 99 9999',
        placeholder: ' ',
        showMaskOnHover: false,
        showMaskOnFocus: false,
        onBeforePaste: function(pastedValue, opts) {
            var processedValue = pastedValue;

            //do something with it

            return processedValue;
        }
    });
    // const xl = $('#hello').val()
    // console.log(JSON.parse(xl))

    $('.count-products').each(function() {
        let category = $(this).data('id')
        let _this = $(this)
        $.ajax({
            url: '/countProducts',
            data: {
                category: category
            },
            method: "GET",
            dataType: 'json',
            success: function(data) {
                if ([2, 3, 4].includes(data % 10)) {
                    _this.text(`${data}  товара`)
                } else if (data % 10 == 1) {
                    _this.text(`${data}  товар`)
                } else {
                    _this.text(`${data}  товаров`)
                }
            }
        })
    })

    var url = $(location).attr("href")
    if (url.indexOf('sort=') !== -1) {
        const sort = url.split('sort=')[1].split('&')[0]
        const city = url.split('city=')[1].split('&')[0]
        if (url.indexOf('priceFrom')) {
            const priceFrom = url.split('priceFrom=')[1].split('&')[0]
            $('#priceFrom').val(priceFrom)
        }
        if (url.indexOf('priceTo')) {
            const priceTo = url.split('priceTo=')[1].split('&')[0]
            $('#priceTo').val(priceTo)
        }
        $(`.sort[data-sort=${sort}]`).attr('checked', true)
        $(`.city[data-city=${city}]`).attr('checked', true)
    }

    $('.att-show').on('click', function() {
        $('.att-show').removeClass('active');
        $(this).addClass('active');
    })
    
    var urlMobi = $(location).attr("href")
    if (url.indexOf('sort=') !== -1) {
        const sortMobi = urlMobi.split('sort=')[1].split('&')[0]
        const cityMobi = urlMobi.split('city=')[1].split('&')[0]
        if (urlMobi.indexOf('priceFromMobi')) {
            const priceFromMobi = urlMobi.split('priceFromMobi=')[1].split('&')[0]
            $('#priceFromMobi').val(priceFromMobi)
        }
        if (urlMobi.indexOf('priceToMobi')) {
            const priceToMobi = urlMobi.split('priceToMobi=')[1].split('&')[0]
            $('#priceToMobi').val(priceToMobi)
        }
        $(`.sort[data-sort=${sortMobi}]`).attr('checked', true)
        $(`.city[data-city=${cityMobi}]`).attr('checked', true)
    }

    $('.att-show').on('click', function() {
        $('.att-show').removeClass('active');
        $(this).addClass('active');
    })
})

$('body').on('click', '#filter', function() {
    const cat_id = $(this).data('cat-id')
    const cat_slug = $(this).data('cat-slug')
    let sort = $("input[name='sort']:checked").data('sort')
    let city = $("input[name='city']:checked").data('city')
    let priceFrom = $('#priceFrom').val()
    let priceTo = $('#priceTo').val()
    if (priceFrom.length > 0 && priceTo.length == 0) {
        window.location.href = '/category/' + cat_slug + '?sort=' + sort + '&city=' + city + '&priceFrom=' + priceFrom
    } else if (priceTo.length > 0 && priceFrom.length == 0) {
        window.location.href = '/category/' + cat_slug + '?sort=' + sort + '&city=' + city + '&priceTo=' + priceTo
    } else if (priceFrom.length > 0 && priceTo.length > 0) {
        window.location.href = '/category/' + cat_slug + '?sort=' + sort + '&city=' + city + '&priceFrom=' + priceFrom + '&priceTo=' + priceTo
    } else {
        window.location.href = '/category/' + cat_slug + '?sort=' + sort + '&city=' + city
    }
})

$('body').on('click', '#filterMobi', function() {
    const cat_idMobi = $(this).data('cat-id')
    const cat_slugMobi = $(this).data('cat-slug')
    let sortMobi = $("#mobile-Filter input[name='sort']:checked").attr('data-sort')
    let cityMobi = $("#mobile-Filter input[name='cityM']:checked").attr('data-city')
    let priceFromMobi = $('#priceFromMobi').val()
    let priceToMobi = $('#priceToMobi').val()

    if (priceFromMobi.length > 0 && priceToMobi.length == 0) {
        window.location.href = '/category/' + cat_slugMobi + '?sort=' + sortMobi + '&city=' + cityMobi + '&priceFrom=' + priceFromMobi
    } else if (priceToMobi.length > 0 && priceFromMobi.length == 0) {
        window.location.href = '/category/' + cat_slugMobi + '?sort=' + sortMobi + '&city=' + cityMobi + '&priceTo=' + priceToMobi
    } else if (priceFromMobi.length > 0 && priceToMobi.length > 0) {
        window.location.href = '/category/' + cat_slugMobi + '?sort=' + sortMobi + '&cityi=' + cityMobi + '&priceFrom=' + priceFromMobi+ '&priceTo=' + priceToMobi
    } else {
        window.location.href = '/category/' + cat_slugMobi + '?sort=' + sortMobi + '&city=' + cityMobi
    }

})

// $('body').on('click', '.category', function () {
//     let category = $(this).data('id')
//     $.ajax({
//         url: '/subcategories',
//         data: {
//             category: category
//         },
//         method: "GET",
//         dataType: 'html',
//         success: function (data) {
//             $('#categories').hide()
//             $('#categoriesRow').prepend(data)
//             $('.childCategory').each(function () {
//                 let category = $(this).data('id')
//                 let _this = $(this)
//                 $.ajax({
//                     url: '/countProducts',
//                     data: {
//                         category: category
//                     },
//                     method: "GET",
//                     dataType: 'json',
//                     success: function (data) {
//                         _this.parent().find('.spinner-grow').remove()
//                         _this.parent().find('.cat_spinner').append(`${data}`)
//                     }
//                 })
//             })
//         }
//     })
// })

$('body').on('click', '#prevCategory', function() {
    $('#subcategories').hide()
    $('#categories').show()
})

$('body').on('click', '.subcategory', function() {
    $('#attributes').empty();
    let category = $(this).data('slug')
    window.location.href = '/category/' + category
})

$(document).on('change', '#cat_parent', function() {
    $('#attributes').empty();
    const id = $('#cat_parent option:selected').val();
    $.ajax({
        url: '/getSubcategories',
        data: {
            category: id
        },
        method: "GET",
        dataType: 'json',
        success: function(data) {
            $('#cat_child').empty().append(`
                <option>Выберите подкатегорию</option>
            `)
            $('#child_div').remove()
            data.forEach(element => {
                $('#cat_child').append(`
                    <option value="${element['id']}">${element['name']}</option>
                `)
            })
        }
    });
});

$(document).on('change', '[name="category_id"]', function() {
    const id = $('[name="category_id"] option:selected').val();
    $.ajax({
        url: '/getAttributes',
        data: {
            category_id: id
        },
        method: "GET",
        dataType: 'json',
        success: function(data) {
            $('#attributes').empty();
            data.forEach(element => {
                $('#attributes').append(`
                    <div class="form-check form-check w-75">
                        <input class="form-check-input js-attribute" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
                        <label class="form-check-label" for="${element['at_slug']}Checkbox${element['at_id']}">${element['at_name']}</label>
                    </div>
                `);               
            })
        }
    });
})


$(document).on('change', '.js-attribute', function() {
    const _this = $(this);
    $.ajax({
        url: '/getAttributesValue',
        data: {
            attribute_id: _this.val()
        },
        method: "GET",
        dataType: 'json',
        success: function(data) {
            if (!_this.is(":checked")) {
                _this.closest('div').find('select').remove();
                $('.Selects').remove();
                $('#color_attr').empty()
            } else {                
                if(data[0]['slug'] == 'cvet'){
                    $('#color_attr').append(`
                        <input type="text" id="colors_input" name="cvet" class="form-control" value="">
                    `)
                    _this.closest('div').append(`
                        <div class="Selects d-flex flex-wrap justify-content-between form-group" name="attribute[${data[0]['slug']}][value]">
                        </div>
                    `);
                    _this.closest('div').find('.Selects').empty();
                    data.forEach(element => {
                        _this.closest('div').find('.Selects').append(`
                        <label class="checkbox-container">
                        <input cheked class="form-check-input" name="cvet" value="${element['id']}" type="checkbox">
                        <span class="checkmark" style="background: ${element['value']}; width: 25px; height: 25px;"></span>
                        </label>
                    `);
                
                        // if(element['slug'] == 'cvet'){
                        //     $('#test').append(`
                        //         <div class="position-relative">
                        //         <input class="form-check-input" for="${element['name']}" style="background: ${element['value']}; width: 10px; height: 10px;" type="checkbox">
                        //         <label id="${element['name']}" class="form-check-label rounded-pill" style="background: ${element['value']}; width: 50px; height: 50px;"></label>
                        //         </div>
                        //     `);
                        // }                   
                    })
                }   
                else{
                    _this.closest('div').append(`
                        <select class="input_placeholder_style form-control" name="attribute[${data[0]['slug']}][value][]" multiple>
                            <option disabled>Выберите значение</option>
                        </select>
                    `);
                    data.forEach(element => {
                        _this.closest('div').find('select').append(`
                            <option value="${element['id']}">${element['name']}</option>
                        `);
                    })
                }             
              
            }
        }
    });
});

$(document).on('change', "input[name='cvet']", function(){
    const val = $(this).val()
    const colors = $('#colors_input')
    if(this.checked) {
        console.log(val)
        if(colors.val().length < 1){            
            colors.val(colors.val() + val)
        }
        else{
            colors.val(colors.val() + ',' + val)
        }
    }
    else{
        let array = colors.val().split(',')
        const index = array.indexOf(val)
        if (index > -1) {
            array.splice(index, 1);
        }
        colors.val(array)
    }
   
})

$('body').on('change', '#cat_child', function() {
    const id = $('#cat_child option:selected').val()
    $.ajax({
        url: '/getSubcategories',
        data: {
            category: id
        },
        method: "GET",
        dataType: 'json',
        success: function(data) {
            if (data.hasOwnProperty('0')) {
                $('#cat_child').attr('name', 'subcategory')
                $('#child_div').remove()
                $('#subCategories').append(`
                    <div id="child_div" class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                        <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                        <div class="w-75 input_placeholder_style">
                        <select class="input_placeholder_style form-control position-relative" id="grandchildren" name="category_id">
                            <option disabled>Выберите категорию</option>
                        </select>
                        </div>
                    </div>
                `)
                data.forEach(element => {
                    $('#grandchildren').append(`
                        <option value="${element['id']}">${element['name']}</option>
                    `)
                })
            } else {
                $('#cat_child').attr('name', 'category_id')
                $('#child_div').remove()
            }
        }
    })
})

$('.select-color').on('click', function() {
    $('.product-colors label').removeClass('color-active');
    $(this).addClass('color-active');
})
$('.sizes .product-size').on('click', function() {
        $('.product-size').removeClass('text-danger');
        $(this).addClass('text-danger');
    })
    // search
$('.main-search').on('keyup keypress keydown change', function() {
    let value = $(this).val();
    if (value.length >= 3) {
        $.ajax({
            url: '/livesearch',
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                value
            },
            success: (data) => {
                $('.search-result').show();
                $('.search-result').html(data);
            },
            error: function(xhr, status, error) {}
        })
    } else {
        $('.search-result').hide();
    }
});

// orders add
$('.checkout-product').on('click', function() {
    let total_price = $(this).closest('#buyProduct').find('.total-price').text();
    let address = $('#checkout_address').val();
    let quantity = $(this).closest('#buyProduct').find('.quantity-product').text();
    let product_id = $(this).closest('#buyProduct').find('.checkout-id').attr('data-id');
    $.ajax({
        url: '/orders/store',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            total_price,
            address,
            quantity,
            product_id,
        },
        success: (data) => {
            console.log(data)
            $('.order-number').text("Номер вашего заказа: " + data.order.id);
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.log(status);
        }
    })
});

// favorite add
$('.favorite').on('click', function() {

    if ($(this).hasClass('active')) {
        var status = 0;
    } else {
        var status = 1;
    }

    const this_ = $(this)

    const product_id = $(this).attr('data-id');
    $.ajax({
            url: '/add_to_favorite',
            data: {
                product_id: product_id,
                status: status,
            },
            method: "GET",
            dataType: 'json',
            success: (data) => {
                this_.toggleClass('active');
            },
            error: function(xhr, status, error) {
                console.log(status);
            }
        })
        // $.ajax({

    //     url: '/add_to_favorite/' + product_id,
    //     type: 'GET',
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     data: {
    //         product_id,
    //         status,
    //     },
    //     success: (data) => {
    //         console.log(data);
    //     },
    //     error: function (xhr, status, error) {
    //         console.log(status);
    //     }

    // });
});

// sms-congirm
$('#btn-login, #code').on('click change', function () {
    const phone = $('#phone').val();
    const code = $('#code').val()
    $.ajax({

        url: '/sms-confirmed',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            phone,
            code,
        },
        success: (data) => {
            if ($('#adressChange')) {
                $('#enter_site').modal('hide')
                $('#adressChange').modal('show')

            } else {
                if (data == 2) {
                    location.reload(true);
                }
            }

        },
        error: function (xhr, status, error) {
            console.log(status);
        }

    });
});
// sms-code
$('#send-code, .send-code').on('click', function() {
    $(this).attr('disabled', true);
    const phone = $('#phone').val();
    $.ajax({
        url: '/sms-send',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            phone,
        },
        success: (data) => {
            console.log(data);
            $('#send-code').hide();
            $('.enter-code').show();
            $('.sms--true').show();
            $('.sms--false').hide();
            if (data == 1) {
                $('#adressChange').remove();
            }
            var fiveMinutes = 6 * 10,
                display = document.querySelector('#count-down');
            return startTimer(fiveMinutes, display);
        },
        error: function(xhr, status, error) {

            console.log(status);
        }

    });
});

function startTimer(duration, display) {
    var timer = duration,
        minutes, seconds;
    var time = setInterval(() => {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
            $('.sms--true').hide();
            $('.sms--false').show();
            clearInterval(time);

        }
    }, 1000);
}

// preview image

$(function() {

    $("#gallery").change(function() {
        if (typeof(FileReader) != "undefined") {
            var dvPreview = $("#preview-product-secondary").find('#db-preview-image');
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.bmp|.WebP|.webp|.bat|.svg|.jfif)$/;

            $($(this)[0].files).each(function(index) {
                var file = $(this);
                console.log(file);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = $('<div class="col-3 text-center mb-4"><img width="87" height="87" style="object-fit: contain"/><button data-id="' + index + '" type="button" class="btn btn-danger my-3 db-preview-remove">Удалить</div>');
                        img.find('img').addClass("mw-100");
                        img.find('img').attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    dvPreview.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});









$('.db-preview-remove').on('click', function() {
    console.log(this);
    let gallery = $("#gallery")[0].files;
    console.log(gallery);

    let value = $(this).attr('data-id');
    console.log(value);

    function removeItemOnce(arr, value) {
        var index = arr.indexOf(value);
        if (index > -1) {
            arr.splice(index, 1);
        }
        console.log(arr);
    };
    removeItemOnce(gallery.files, value);
    console.log(gallery.files);
});
// $('body').on('click', '.deleteImage', function () {
//     let images = $('#hello').val()
//     images = JSON.parse(images)
//     console.log(images)
//     $(this).parent().find('img').remove()
// })

// single preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#main-poster').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function avatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#avatar-poster').attr('src', e.target.result);
            $('#avatar-poster-mobile').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function cover(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#cover-poster').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function user_avatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(reader)
        reader.onload = function(e) {
            $('.user_avatar svg').hide();
            $('.user_avatar img').show().attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#profile_photo_path").change(function() {
    user_avatar(this);
});

$("#image").change(function() {
    readURL(this);
});

$("#avatar").change(function() {
    avatar(this);
});

$("#cover").change(function() {
    cover(this);
});
/* iteration number */

//gets the input by element Id, gets min, max, and step from the markup. Gets the subtract and add buttons either by optional classnames, or by the next or last element sibling.
var NumberSpinner = function(elemId, subtractClassName, addClassName) {
    'use strict';
    var spinnerInput = document.getElementById(elemId);
    var btnSubtract = document.querySelector(addClassName) || spinnerInput.previousElementSibling;
    var btnAdd = document.querySelector(subtractClassName) || spinnerInput.nextElementSibling;
    var minLimit, maxLimit, step;

    function init() {
        minLimit = makeNumber(getAttribute(spinnerInput, 'min')) || 0,
            maxLimit = makeNumber(getAttribute(spinnerInput, 'max')) || false,
            step = makeNumber(getAttribute(spinnerInput, 'step') || '1');

        btnSubtract.addEventListener('click', changeSpinner, false);
        btnAdd.addEventListener('click', changeSpinner, false);
        btnSubtract.addEventListener('keyup', keySpinner, false);
        btnAdd.addEventListener('keyup', keySpinner, false);
        if (supportsTouch()) {
            btnSubtract.addEventListener('touchend', removeClickDelay, false);
            btnAdd.addEventListener('touchend', removeClickDelay, false);
        }
        if (supportsPointer()) {
            btnSubtract.addEventListener('pointerup', removeClickDelay, false);
            btnAdd.addEventListener('pointerup', removeClickDelay, false);
        }
    }

    function removeClickDelay(e) {
        e.preventDefault();
        e.target.click();
    }

    function makeNumber(inputString) {
        return parseInt(inputString, 10);
    }

    function update(direction) {
        var num = makeNumber(spinnerInput.value);
        if (direction === 'add') {
            spinnerInput.value = ((num + step) <= maxLimit) ? (num + step) : spinnerInput.value;
        } else if (direction === 'subtract') {
            spinnerInput.value = ((num - step) >= minLimit) ? (num - step) : spinnerInput.value;
        }
    }

    function getAttribute(el, attr) {
        var hasGetAttr = (el.getAttribute && el.getAttribute(attr)) || null;
        if (!hasGetAttr) {
            var attrs = el.attributes;
            for (var i = 0, len = attrs.length; i < len; i++) {
                if (attrs[i].nodeName === attr) {
                    hasGetAttr = attrs[i].nodeValue;
                }
            }
        }
        return hasGetAttr;
    }
    /* Touch and Pointer support */
    function supportsTouch() {
        return ('ontouchstart' in window);
    }

    function supportsPointer() {
        return ('pointerdown' in window);
    }
    /* Keyboard support */
    function keySpinner(e) {
        switch (e.keyCode) {
            case 40:
            case 37: // Down, Left
                update('subtract');
                btnSubtract.focus();
                break;
            case 38:
            case 39: // Top, Right
                update('add');
                btnAdd.focus();
                break;
        }
    }

    function changeSpinner(e) {
        e.preventDefault();
        var increment = getAttribute(e.target, 'data-type');
        update(increment);
    }
    init();
};

NumberSpinner('spinner-input', 'js-spinner-horizontal-subtract', 'js-spinner-horizontal-add');

var product_price = $('#price').text();
$('.spinner__button').on('click', function() {

    let count = $('#spinner-input').val();
    let res = parseInt(product_price * count);
    $('.total-price, .price').text(res);
    $('.quantity-product').text(count);

});
$('#spinner-input').on('change', function() {

    let count = $(this).val();
    let res = parseInt(product_price * count);
    $('.total-price, .price').text(res);
    $('.quantity-product').text(count);

});
$('body').on('click', '.change-address', function() {
    $('#checkout_address').prop("disabled", false);
    $('#checkout_address').focus();
});

///product picture on hover change
$('.add-product-secondary .pic-item').on("click", function() {
    let imgSrc = $(this).attr('data-image-src');
    $('.pic-main').attr('src', imgSrc);
    $('.add-product-secondary .pic-item').removeClass('pic-item-active');
    $(this).addClass('pic-item-active');
});
$('.add-product-secondary .pic-item').on('click', function() {
    let imgSrc = $(this).attr('data-image-src');
    $('.pic-main').attr('src', imgSrc);
});



//zoom image
$(function($) {
    $.fn.okzoom = function(options) {
        options = $.extend({}, $.fn.okzoom.defaults, options);

        return this.each(function() {
            var base = {};
            var el = this;
            base.options = options;
            base.$el = $(el);
            base.el = el;

            base.listener = document.createElement('div');
            base.$listener = $(base.listener).addClass('ok-listener').css({
                position: 'absolute',
                zIndex: 10000
            });
            $('body').append(base.$listener);

            var loupe = document.createElement("div");
            loupe.id = "ok-loupe";
            loupe.style.position = "absolute";
            loupe.style.backgroundRepeat = "no-repeat";
            loupe.style.pointerEvents = "none";
            loupe.style.display = "none";
            loupe.style.zIndex = 7879;
            $('body').append(loupe);
            base.loupe = loupe;

            base.$el.data("okzoom", base);

            base.options = options;
            $(base.el).bind('mouseover', (function(b) {
                return function(e) { $.fn.okzoom.build(b, e); };
            }(base)));

            base.$listener.bind('mousemove', (function(b) {
                return function(e) { $.fn.okzoom.mousemove(b, e); };
            }(base)));

            base.$listener.bind('mouseout', (function(b) {
                return function(e) { $.fn.okzoom.mouseout(b, e); };
            }(base)));

            base.options.height = base.options.height || base.options.width;

            base.image_from_data = base.$el.data("okimage");
            base.has_data_image = typeof base.image_from_data !== "undefined";

            if (base.has_data_image) {
                base.img = new Image();
                base.img.src = base.image_from_data;
            }

            base.msie = -1; // Return value assumes failure.
            if (navigator.appName == 'Microsoft Internet Explorer') {
                var ua = navigator.userAgent;
                var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
                if (re.exec(ua) != null)
                    base.msie = parseFloat(RegExp.$1);
            }
        });
    };

    $.fn.okzoom.defaults = {
        "width": 150,
        "height": null,
        "scaleWidth": null,
        "round": true,
        "background": "#fff",
        "backgroundRepeat": "no-repeat",
        "shadow": "0 0 5px #000",
        "border": 0
    };

    $.fn.okzoom.build = function(base, e) {
        if (!base.has_data_image) {
            base.img = base.el;
        } else if (base.image_from_data != base.$el.attr('data-okimage')) {
            // data() returns cached values, whereas attr() returns from the dom.
            base.image_from_data = base.$el.attr('data-okimage');

            $(base.img).remove();
            base.img = new Image();
            base.img.src = base.image_from_data;
        }

        if (base.msie > -1 && base.msie < 9.0 && !base.img.naturalized) {
            var naturalize = function(img) {
                img = img || this;
                var io = new Image();

                io.el = img;
                io.src = img.src;

                img.naturalWidth = io.width;
                img.naturalHeight = io.height;
                img.naturalized = true;
            };
            if (base.img.complete) naturalize(base.img);
            else return;
        }

        base.offset = base.$el.offset();
        base.width = base.$el.width();
        base.height = base.$el.height();
        base.$listener.css({
            display: 'block',
            width: base.$el.outerWidth(),
            height: base.$el.outerHeight(),
            top: base.$el.offset().top,
            left: base.$el.offset().left
        });

        if (base.options.scaleWidth) {
            base.naturalWidth = base.options.scaleWidth;
            base.naturalHeight = Math.round(base.img.naturalHeight * base.options.scaleWidth / base.img.naturalWidth);
        } else {
            base.naturalWidth = base.img.naturalWidth;
            base.naturalHeight = base.img.naturalHeight;
        }

        base.widthRatio = base.naturalWidth / base.width;
        base.heightRatio = base.naturalHeight / base.height;

        base.loupe.style.width = base.options.width + "px";
        base.loupe.style.height = base.options.height + "px";
        base.loupe.style.border = base.options.border;
        base.loupe.style.background = base.options.background + " url(" + base.img.src + ")";
        base.loupe.style.backgroundRepeat = base.options.backgroundRepeat;
        base.loupe.style.backgroundSize = base.options.scaleWidth ?
            base.naturalWidth + "px " + base.naturalHeight + "px" : "auto";
        base.loupe.style.borderRadius =
            base.loupe.style.OBorderRadius =
            base.loupe.style.MozBorderRadius =
            base.loupe.style.WebkitBorderRadius = base.options.round ? base.options.width + "px" : 0;

        base.loupe.style.boxShadow = base.options.shadow;
        base.initialized = true;
        $.fn.okzoom.mousemove(base, e);
    };

    $.fn.okzoom.mousemove = function(base, e) {
        if (!base.initialized) return;
        var shimLeft = base.options.width / 2;
        var shimTop = base.options.height / 2;
        var pageX = typeof e.pageX !== 'undefined' ? e.pageX :
            (e.clientX + document.documentElement.scrollLeft);
        var pageY = typeof e.pageY !== 'undefined' ? e.pageY :
            (e.clientY + document.documentElement.scrollTop);
        var scaleLeft = -1 * Math.floor((pageX - base.offset.left) * base.widthRatio - shimLeft);
        var scaleTop = -1 * Math.floor((pageY - base.offset.top) * base.heightRatio - shimTop);

        document.body.style.cursor = "none";
        base.loupe.style.display = "block";
        base.loupe.style.left = pageX - shimLeft + "px";
        base.loupe.style.top = pageY - shimTop + "px";
        base.loupe.style.backgroundPosition = scaleLeft + "px " + scaleTop + "px";
    };

    $.fn.okzoom.mouseout = function(base, e) {
        base.loupe.style.display = "none";
        base.loupe.style.background = "none";
        base.listener.style.display = "none";
        document.body.style.cursor = "auto";
    };
});

$('.add-product-secondary .pic-item').on('click', function() {
    let imgSrc = $(this).attr('data-image-src');
    $('.pic-main').attr('src', imgSrc);
});
