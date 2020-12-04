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

$('#send-code, .send-code').on('click', function() {
    const phone = $('#phone').val();
    
    $.ajax({

        url: '/sms-confirmed',
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
        error: function(xhr, status, error) {
            console.log(status);
        }

    });
});

var seconds = 1000 * 60; //1000 = 1 second in JS
var timer;

function countDown() {
   if(seconds == 60000)
     timer = setInterval(countDown, 1000)
   seconds -= 1000;
   document.getElementById("count-down").innerHTML = '0:' + seconds/1000;
   if (seconds <= 0) {
       clearInterval(timer);
       alert("Время закончилось");
   }
}

document.getElementById("count-down").innerHTML= "0:" + seconds/1000;