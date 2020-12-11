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
    error: function error(xhr, status, _error) {
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
    error: function error(xhr, status, _error2) {
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