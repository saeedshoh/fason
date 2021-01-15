require('./jquery.inputmask.bundle.js');

$(document).ready(function(){
    $('body').on('keyup', '#nameStoreCreate', function () {
        $('#storeSubmit').attr('disabled', true);
        var store = $(this).val();
        if(store.length >= 3){
            setTimeout(() => {
                $.get('/store/exist/'+store, function(data){
                    if(data.exist){
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

    $('body').on('keyup', '#nameEditStore', function () {
        $('#storeEditSubmit').attr('disabled', true);
        var store = $(this).val();
        if(store != this.defaultValue) {
            setTimeout(() => {
                $.get('/store/exist/'+store, function(data){
                    if(data.exist){
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
        if(page !== null && page !== '') {

            clearTimeout( $.data( this, "scrollCheck" ) );

            $.data( this, "scrollCheck", setTimeout(function() {
                var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

                if(scroll_position_for_posts_load >= $(document).height()) {
                    if (url.indexOf('sort=') !== -1) {
                        const sort = url.split('?')[1]
                        $.get(page + '&' + sort, function(data){
                            $('.endless-pagination').append(data.posts);
                            $('.endless-pagination').data('next-page', data.next_page + '&' + sort);
                        });
                    }
                    else{
                        $.get(page, function(data){
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
        onBeforePaste: function (pastedValue, opts) {
        var processedValue = pastedValue;

        //do something with it

        return processedValue;
        }
    });
    // const xl = $('#hello').val()
    // console.log(JSON.parse(xl))

    $('.subcategory').each(function () {
        let category = $(this).data('id')
        let _this = $(this)
        $.ajax({
            url: '/countProducts',
            data: {
                category: category
            },
            method: "GET",
            dataType: 'json',
            success: function (data) {
                _this.parent().find('.spinner-grow').remove()
                _this.parent().append(`
                    <span class="badge badge-danger badge-pill">${data}</span>
                `)
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
})

$('body').on('click', '#filter', function () {
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

$('body').on('click', '#prevCategory', function () {
    $('#subcategories').hide()
    $('#categories').show()
})

$('body').on('click', '.subcategory', function () {
    let category = $(this).data('slug')
    window.location.href = '/category/' + category
    // $('#catProducts').empty().append(`
    //     <div style="margin: 0 auto; display: block;" class="spinner-grow text-center text-danger" role="status">
    //         <span class="sr-only">Loading...</span>
    //     </div>
    // `)
    // $.ajax({
    //     url: '/categoryProducts',
    //     data: {
    //         category: category
    //     },
    //     method: "GET",
    //     dataType: 'html',
    //     success: function (data) {
    //         $('#catProducts').empty().append(data)
    //     }
    // })

})

$(document).on('change', '#cat_parent', function () {
    const id = $('#cat_parent option:selected').val();
    $.ajax({
        url: '/getSubcategories',
        data: {
            category: id
        },
        method: "GET",
        dataType: 'json',
        success: function (data) {
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

    $.ajax({
        url: '/getAttributes',
        data: {
            category_id: id
        },
        method: "GET",
        dataType: 'json',
        success: function (data) {
            $('.append-div').empty();
            data.forEach(element => {
                $('.append-div').append(`
                    <div class="form-check form-check">
                        <input class="form-check-input js-attribute" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
                        <label class="form-check-label" for="${element['at_slug']}Checkbox${element['at_id']}">${element['at_name']}</label>
                    </div>
                `);
            })
        }
    });
});

$(document).on('change', '.js-attribute', function() {
    const _this = $(this);
    $.ajax({
        url: '/getAttributesValue',
        data: {
            attribute_id: _this.val()
        },
        method: "GET",
        dataType: 'json',
        success: function (data) {
            if(!_this.is(":checked")) {
                _this.closest('div').find('select').remove();
            } else {
                _this.closest('div').append(`
                    <select class="input_placeholder_style form-control" name="attribute[${data[0]['slug']}][value]">
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
    });
});

$('body').on('change', '#cat_child', function () {
    const id = $('#cat_child option:selected').val()
    $.ajax({
        url: '/getSubcategories',
        data: {
            category: id
        },
        method: "GET",
        dataType: 'json',
        success: function (data) {
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

$('.select-color').on('click', function () {
    $('.product-colors label').removeClass('color-active');
    $(this).addClass('color-active');
})
$('.sizes .product-size').on('click', function () {
    $('.product-size').removeClass('text-danger');
    $(this).addClass('text-danger');
})
// search
$('.main-search').on('keyup keypress keydown change', function () {
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
            error: function (xhr, status, error) {}
        })
    } else {
        $('.search-result').hide();
    }
});
// orders add
$('.checkout-product').on('click', function () {
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
            $('.order-number').text("Номер вашего заказа: " + data.order.id);
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log(status);
        }
    })
});
// favorite add
$('.favorite').on('click', function () {

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
        error: function (xhr, status, error) {
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
$('#send-code, .send-code').on('click', function () {
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
        error: function (xhr, status, error) {

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

$(function () {
    $("#gallery").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#preview-product-secondary");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                console.log(file)
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $('<div class="col-3 text-center"><img /></div>');
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

$('body').on('click', '.deleteImage', function () {
    let images = $('#hello').val()
    images = JSON.parse(images)
    console.log(images)
    $(this).parent().find('img').remove()
})

// single preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#main-poster').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function avatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar-poster').attr('src', e.target.result);
            $('#avatar-poster-mobile').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function cover(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#cover-poster').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function user_avatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.user_avatar svg').hide();
            $('.user_avatar img').show().attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#profile_photo_path").change(function () {
    user_avatar(this);
});

$("#image").change(function () {
    readURL(this);
});

$("#avatar").change(function () {
    avatar(this);
});

$("#cover").change(function () {
    cover(this);
});
/* iteration number */

//gets the input by element Id, gets min, max, and step from the markup. Gets the subtract and add buttons either by optional classnames, or by the next or last element sibling.
var NumberSpinner = function (elemId, subtractClassName, addClassName) {
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
$('.spinner__button').on('click', function () {

    let count = $('#spinner-input').val();
    let res = parseInt(product_price * count);
    $('.total-price, .price').text(res);
    $('.quantity-product').text(count);

});
$('#spinner-input').on('change', function () {

    let count = $(this).val();
    let res = parseInt(product_price * count);
    $('.total-price, .price').text(res);
    $('.quantity-product').text(count);

});

$('body').on('click', '.change-address', function () {
    $('#checkout_address').prop("disabled", false);
    $('#checkout_address').focus();
});
$('.add-product-secondary .pic-item').on('click', function(){
    let imgSrc = $(this).attr('data-image-src');
    $('.pic-main').attr('src',imgSrc);
});
