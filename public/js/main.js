/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.sms--false').hide();
});
$(document).ready(function () {
  $(window).scroll(fetchPosts);

  function fetchPosts() {
    var page = $('.endless-pagination').data('next-page');
    console.log(page);

    if (page !== null && page !== '') {
      clearTimeout($.data(this, "scrollCheck"));
      $.data(this, "scrollCheck", setTimeout(function () {
        var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

        if (scroll_position_for_posts_load >= $(document).height()) {
          $.get(page, function (data) {
            $('.endless-pagination').append(data.posts);
            $('.endless-pagination').data('next-page', data.next_page);
          });
        }
      }, 350));
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
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    } // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  }); // const xl = $('#hello').val()
  // console.log(JSON.parse(xl))

  $('.subcategory').each(function () {
    var category = $(this).data('id');

    var _this = $(this);

    $.ajax({
      url: '/countProducts',
      data: {
        category: category
      },
      method: "GET",
      dataType: 'json',
      success: function success(data) {
        _this.parent().find('.spinner-grow').remove();

        _this.parent().append("\n                    <span class=\"badge badge-danger badge-pill\">".concat(data, "</span>\n                "));
      }
    });
  });
  var url = $(location).attr("href");

  if (url.indexOf('filter?') !== -1) {
    var sort = url.split('sort=')[1].split('&')[0];
    var city = url.split('city=')[1].split('&')[0];

    if (url.indexOf('priceFrom')) {
      var priceFrom = url.split('priceFrom=')[1].split('&')[0];
      $('#priceFrom').val(priceFrom);
    }

    if (url.indexOf('priceTo')) {
      var priceTo = url.split('priceTo=')[1].split('&')[0];
      $('#priceTo').val(priceTo);
    }

    $(".sort[data-sort=".concat(sort, "]")).attr('checked', true);
    $(".city[data-city=".concat(city, "]")).attr('checked', true);
  }
});
$('body').on('click', '#filter', function () {
  var sort = $("input[name='sort']:checked").data('sort');
  var city = $("input[name='city']:checked").data('city');
  var priceFrom = $('#priceFrom').val();
  var priceTo = $('#priceTo').val();

  if (priceFrom.length > 0 && priceTo.length == 0) {
    window.location.href = '/filter?sort=' + sort + '&city=' + city + '&priceFrom=' + priceFrom;
  } else if (priceTo.length > 0 && priceFrom.length == 0) {
    window.location.href = '/filter?sort=' + sort + '&city=' + city + '&priceTo=' + priceTo;
  } else if (priceFrom.length > 0 && priceTo.length > 0) {
    window.location.href = '/filter?sort=' + sort + '&city=' + city + '&priceFrom=' + priceFrom + '&priceTo=' + priceTo;
  } else {
    window.location.href = '/filter?sort=' + sort + '&city=' + city;
  }
});
$('body').on('click', '.category', function () {
  var category = $(this).data('id');
  $.ajax({
    url: '/subcategories',
    data: {
      category: category
    },
    method: "GET",
    dataType: 'html',
    success: function success(data) {
      $('#categories').hide();
      $('#categoriesRow').prepend(data);
      $('.childCategory').each(function () {
        var category = $(this).data('id');

        var _this = $(this);

        $.ajax({
          url: '/countProducts',
          data: {
            category: category
          },
          method: "GET",
          dataType: 'json',
          success: function success(data) {
            _this.parent().find('.spinner-grow').remove();

            _this.parent().append("".concat(data));
          }
        });
      });
    }
  });
});
$('body').on('click', '#prevCategory', function () {
  $('#subcategories').hide();
  $('#categories').show();
});
$('body').on('click', '.subcategory', function () {
  var category = $(this).data('id');
  $('#catProducts').empty().append("\n        <div style=\"margin: 0 auto; display: block;\" class=\"spinner-grow text-center text-danger\" role=\"status\">\n            <span class=\"sr-only\">Loading...</span>\n        </div>\n    ");
  $.ajax({
    url: '/categoryProducts',
    data: {
      category: category
    },
    method: "GET",
    dataType: 'html',
    success: function success(data) {
      $('#catProducts').empty().append(data);
    }
  });
});
$('body').on('change', '#cat_parent', function () {
  var id = $('#cat_parent option:selected').val();
  $.ajax({
    url: '/getSubcategories',
    data: {
      category: id
    },
    method: "GET",
    dataType: 'json',
    success: function success(data) {
      $('#cat_child').empty().append("\n                <option>\u0412\u044B\u0431\u0435\u0440\u0438\u0442\u0435 \u043F\u043E\u0434\u043A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u044E</option>\n            ");
      $('#child_div').remove();
      data.forEach(function (element) {
        $('#cat_child').append("\n                    <option value=\"".concat(element['id'], "\">").concat(element['name'], "</option>\n                "));
      });
    }
  });
});
$('body').on('change', '#cat_child', function () {
  var id = $('#cat_child option:selected').val();
  $.ajax({
    url: '/getSubcategories',
    data: {
      category: id
    },
    method: "GET",
    dataType: 'json',
    success: function success(data) {
      if (data.hasOwnProperty('0')) {
        $('#cat_child').attr('name', 'subcategory');
        $('#child_div').remove();
        $('#subCategories').append("\n                    <div id=\"child_div\" class=\"form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center\">\n                        <label for=\"cat_child\" class=\"input_caption mr-2 text-left text-md-right\">\u041F\u043E\u0434-\u043A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u0438:</label>\n                        <div class=\"w-75 input_placeholder_style\">\n                        <select class=\"input_placeholder_style form-control position-relative\" id=\"grandchildren\" name=\"category_id\">\n                            <option disabled>\u0412\u044B\u0431\u0435\u0440\u0438\u0442\u0435 \u043A\u0430\u0442\u0435\u0433\u043E\u0440\u0438\u044E</option>\n                        </select>\n                        </div>\n                    </div>\n                ");
        data.forEach(function (element) {
          $('#grandchildren').append("\n                        <option value=\"".concat(element['id'], "\">").concat(element['name'], "</option>\n                    "));
        });
      } else {
        $('#cat_child').attr('name', 'category_id');
        $('#child_div').remove();
      }
    }
  });
});
$('.select-color').on('click', function () {
  $('.product-colors label').removeClass('color-active');
  $(this).addClass('color-active');
});
$('.sizes .product-size').on('click', function () {
  $('.product-size').removeClass('text-danger');
  $(this).addClass('text-danger');
}); // search

$('.main-search').on('keyup keypress keydown change', function () {
  var value = $(this).val();

  if (value.length >= 3) {
    $.ajax({
      url: '/livesearch',
      type: 'get',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        value: value
      },
      success: function success(data) {
        $('.search-result').show();
        $('.search-result').html(data);
      },
      error: function error(xhr, status, _error) {}
    });
  } else {
    $('.search-result').hide();
  }
}); // orders add

$('.checkout-product').on('click', function () {
  var total_price = $(this).closest('#buyProduct').find('.total-price').text();
  var address = $('#checkout_address').val();
  var quantity = $(this).closest('#buyProduct').find('.quantity-product').text();
  var product_id = $(this).closest('#buyProduct').find('.checkout-id').attr('data-id');
  $.ajax({
    url: '/orders/store',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      total_price: total_price,
      address: address,
      quantity: quantity,
      product_id: product_id
    },
    success: function success(data) {
      $('.order-number').text("Номер вашего заказа: " + data.order.id);
      console.log(data);
    },
    error: function error(xhr, status, _error2) {
      console.log(status);
    }
  });
}); // favorite add

$('.favorite').on('click', function () {
  if ($(this).hasClass('active')) {
    var status = 0;
  } else {
    var status = 1;
  }

  var this_ = $(this);
  var product_id = $(this).attr('data-id');
  $.ajax({
    url: '/add_to_favorite',
    data: {
      product_id: product_id,
      status: status
    },
    method: "GET",
    dataType: 'json',
    success: function success(data) {
      this_.toggleClass('active');
    },
    error: function error(xhr, status, _error3) {
      console.log(status);
    }
  }); // $.ajax({
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
}); // sms-congirm

$('#btn-login, #code').on('click change', function () {
  var phone = $('#phone').val();
  var code = $('#code').val();
  $.ajax({
    url: '/sms-confirmed',
    type: 'post',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      phone: phone,
      code: code
    },
    success: function success(data) {
      if ($('#adressChange')) {
        $('#enter_site').modal('hide');
        $('#adressChange').modal('show');
      } else {
        if (data == 2) {
          location.reload(true);
        }
      }
    },
    error: function error(xhr, status, _error4) {
      console.log(status);
    }
  });
}); // sms-code

$('#send-code, .send-code').on('click', function () {
  var phone = $('#phone').val();
  $.ajax({
    url: '/sms-send',
    type: 'post',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      phone: phone
    },
    success: function success(data) {
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
    error: function error(xhr, status, _error5) {
      console.log(status);
    }
  });
});

function startTimer(duration, display) {
  var timer = duration,
      minutes,
      seconds;
  var time = setInterval(function () {
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
} // preview image


$(function () {
  $("#gallery").change(function () {
    if (typeof FileReader != "undefined") {
      var dvPreview = $("#preview-product-secondary");
      dvPreview.html("");
      var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
      $($(this)[0].files).each(function () {
        var file = $(this);
        console.log(file);

        if (regex.test(file[0].name.toLowerCase())) {
          var reader = new FileReader();

          reader.onload = function (e) {
            var img = $('<div class="col-3 text-center"><img /></div>');
            img.find('img').addClass("mw-100");
            img.find('img').attr("src", e.target.result);
            dvPreview.append(img);
          };

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
  var images = $('#hello').val();
  images = JSON.parse(images);
  console.log(images);
  $(this).parent().find('img').remove();
}); // single preview

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#main-poster').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function avatar(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#avatar-poster').attr('src', e.target.result);
      $('#avatar-poster-mobile').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function cover(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#cover-poster').attr('src', e.target.result);
    };

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

var NumberSpinner = function NumberSpinner(elemId, subtractClassName, addClassName) {
  'use strict';

  var spinnerInput = document.getElementById(elemId);
  var btnSubtract = document.querySelector(addClassName) || spinnerInput.previousElementSibling;
  var btnAdd = document.querySelector(subtractClassName) || spinnerInput.nextElementSibling;
  var minLimit, maxLimit, step;

  function init() {
    minLimit = makeNumber(getAttribute(spinnerInput, 'min')) || 0, maxLimit = makeNumber(getAttribute(spinnerInput, 'max')) || false, step = makeNumber(getAttribute(spinnerInput, 'step') || '1');
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
      spinnerInput.value = num + step <= maxLimit ? num + step : spinnerInput.value;
    } else if (direction === 'subtract') {
      spinnerInput.value = num - step >= minLimit ? num - step : spinnerInput.value;
    }
  }

  function getAttribute(el, attr) {
    var hasGetAttr = el.getAttribute && el.getAttribute(attr) || null;

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
    return 'ontouchstart' in window;
  }

  function supportsPointer() {
    return 'pointerdown' in window;
  }
  /* Keyboard support */


  function keySpinner(e) {
    switch (e.keyCode) {
      case 40:
      case 37:
        // Down, Left
        update('subtract');
        btnSubtract.focus();
        break;

      case 38:
      case 39:
        // Top, Right
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
  var count = $('#spinner-input').val();
  var res = parseInt(product_price * count);
  $('.total-price, .price').text(res);
  $('.quantity-product').text(count);
});
$('#spinner-input').on('change', function () {
  var count = $(this).val();
  var res = parseInt(product_price * count);
  $('.total-price, .price').text(res);
  $('.quantity-product').text(count);
});
$('body').on('click', '.change-address', function () {
  $('#checkout_address').prop("disabled", false);
  $('#checkout_address').focus();
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\fason.tj\resources\js\main.js */"./resources/js/main.js");


/***/ })

/******/ });