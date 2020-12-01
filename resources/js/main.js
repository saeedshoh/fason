$(document).on('ready', function() {
});

$('.select-color').on('click', function() {
    $('.product-colors label').removeClass('color-active');
    $(this).addClass('color-active');
})
$('.sizes .product-size').on('click', function(){
  $('.product-size').removeClass('text-danger');
  $(this).addClass('text-danger');
})