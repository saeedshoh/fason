const {
    type
} = require("jquery");

$(document).on('ready', function () {



});

$('.select-color').on('click', function () {
    $('.product-colors label').removeClass('color-active');
    $(this).addClass('color-active');
})
$('.sizes .product-size').on('click', function () {
    $('.product-size').removeClass('text-danger');
    $(this).addClass('text-danger');
})
// search  
$('.main-search').on('keyup keypress keydown change', function(){
    let value = $(this).val();
    if(value.length >= 3) {
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
            error: function (xhr, status, error) {
            }
        })
    }
    else {
        $('.search-result').hide();
    }
});
// orders add 
$('.checkout-product').on('click', function () {
    let total_price = $(this).closest('#buyProduct').find('.total-price').text();
    let address = $(this).closest('#buyProduct').find('.checkout-address').text();
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
            product_id,
        },
        success: (data) => {
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

    $(this).toggleClass('active');

    const product_id = $(this).attr('data-id');
    $.ajax({

        url: '/favorite/' + product_id,
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            product_id,
            status,
        },
        success: (data) => {
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log(status);
        }

    });
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
            if (data == 2) {
                location.reload(true);
            }

        },
        error: function (xhr, status, error) {
            console.log(status);
        }

    });
});
// sms-code
$('#send-code, .send-code').on('click', function () {
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
            return countDown();

        },
        error: function (xhr, status, error) {
            console.log(status);
        }

    });
});

// countable time
var seconds = 1000 * 60; //1000 = 1 second in JS
var timer;

function countDown() {
    if (seconds == 60000)
        timer = setInterval(countDown, 1000)
    seconds -= 1000;
    document.getElementById("count-down").innerHTML = '0:' + seconds / 1000;
    if (seconds <= 0) {
        clearInterval(timer);
        alert("Время закончилось");
    }
}

document.getElementById("count-down").innerHTML = "0:" + seconds / 1000;

// preview image 

$(function () {
    $("#gallery").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#preview-product-secondary");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
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
