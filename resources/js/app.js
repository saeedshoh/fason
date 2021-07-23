require('./bootstrap');
window.jQuery = window.$ = require('jquery');

$("#editProfile").submit(function (event) {
    $('.success-preloader').removeClass('d-none');
});




$("#add_address").submit(function (event) {
    $('.success-preloader').removeClass('d-none');
});
