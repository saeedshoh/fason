$(document).on('ready', function () {});

$('.select-color').on('click', function () {
    $('.product-colors label').removeClass('color-active');
    $(this).addClass('color-active');
})
$('.sizes .product-size').on('click', function () {
    $('.product-size').removeClass('text-danger');
    $(this).addClass('text-danger');
})

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
            if(data == 2) {
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

$("#image").change(function(){
    readURL(this);
});

$("#avatar").change(function(){
    avatar(this);
});

$("#cover").change(function(){
    cover(this);
});