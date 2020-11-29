$(document).on('ready', function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            375: {
                items: 2,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: false,
                loop: false
            }
        }
    })
});

$('.select-color').on('click', function() {
    $('.product-colors label').removeClass('color-active');
    $(this).addClass('color-active');
})
$('.sizes .product-size').on('click', function(){
  $('.product-size').removeClass('text-danger');
  $(this).addClass('text-danger');
})