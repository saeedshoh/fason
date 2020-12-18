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

$(document).on('ready', function () {});
$('.select-color').on('click', function () {
  $('.product-colors label').removeClass('color-active');
  $(this).addClass('color-active');
});
$('.sizes .product-size').on('click', function () {
  $('.product-size').removeClass('text-danger');
  $(this).addClass('text-danger');
}); // favorite add

$('.favorite').on('click', function () {
  if ($(this).hasClass('active')) {
    var status = 0;
  } else {
    var status = 1;
  }

  $(this).toggleClass('active');
  var product_id = $(this).attr('data-id');
  $.ajax({
    url: '/favorite/' + product_id,
    type: 'PUT',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      product_id: product_id,
      status: status
    },
    success: function success(data) {
      console.log(data);
    },
    error: function error(xhr, status, _error) {
      console.log(status);
    }
  });
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
      if (data == 2) {
        location.reload(true);
      }
    },
    error: function error(xhr, status, _error2) {
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
      return countDown();
    },
    error: function error(xhr, status, _error3) {
      console.log(status);
    }
  });
}); // countable time

var seconds = 1000 * 60; //1000 = 1 second in JS

var timer;

function countDown() {
  if (seconds == 60000) timer = setInterval(countDown, 1000);
  seconds -= 1000;
  document.getElementById("count-down").innerHTML = '0:' + seconds / 1000;

  if (seconds <= 0) {
    clearInterval(timer);
    alert("Время закончилось");
  }
}

document.getElementById("count-down").innerHTML = "0:" + seconds / 1000; // preview image 

$(function () {
  $("#gallery").change(function () {
    if (typeof FileReader != "undefined") {
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