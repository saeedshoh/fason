"use strict";

import { upload } from '../upload.js'

if ($('#gallery').attr('form') == 'add_product') {
    upload('#gallery', {
        multi: true,
        accept: ['image/*']
    })
}

$.get("/dashboard/ordersStatistic", function(statistic) {
    var e = document.getElementById("audienceChart");
    var labels = statistic['labels']
    var datas = statistic['datas']
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "line",
            options: {
                scales: {
                    yAxes: [{
                            id: "yAxisOne",
                            type: "linear",
                            display: "auto",
                            gridLines: { color: "#283E59", zeroLineColor: "#283E59" },
                            // ticks: {
                            //     callback: function(e) {
                            //         return e + "k";
                            //     },
                            // },
                        },
                        {
                            id: "yAxisTwo",
                            type: "linear",
                            display: "auto",
                            gridLines: { color: "#283E59", zeroLineColor: "#283E59" },
                            ticks: {
                                callback: function(e) {
                                    return e + "%";
                                },
                            },
                        },
                    ],
                },
            },
            data: {
                labels: labels,
                datasets: [
                    { label: 'Months', data: datas, yAxisID: "yAxisOne" },
                    // { label: 'months', data: datas, yAxisID: "yAxisOne", hidden: !0 },
                    // { label: 'months', data: datas, yAxisID: "yAxisTwo", hidden: !0 },
                ],
            },
        });
    (function() {
        var e = document.getElementById("conversionsChart");
        "undefined" != typeof Chart &&
            e &&
            new Chart(e, {
                type: "bar",
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(e) {
                                    return e + "%";
                                },
                            },
                        }, ],
                    },
                },
                data: {
                    labels: ["Oct 1", "Oct 2", "Oct 3", "Oct 4", "Oct 5", "Oct 6", "Oct 7", "Oct 8", "Oct 9", "Oct 10", "Oct 11", "Oct 12"],
                    datasets: [
                        { label: "2020", data: [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32] },
                        { label: "2019", data: [15, 10, 20, 12, 7, 0, 8, 16, 18, 16, 10, 22], backgroundColor: "#d2ddec", hidden: !0 },
                    ],
                },
            });
    })()
});
$('body').on('keyup', '#categorySearch', function () {
    var category = $(this).val();
    $.get('/dashboard/categories', {name: category}, function (data) {
        $('#categoryCard').empty().append(data.categories);
    });
});
// !(function() {
//     var e = document.getElementById("audienceChart");
//     var labels = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс']
//     "undefined" != typeof Chart &&
//         e &&
//         new Chart(e, {
//             type: "line",
//             options: {
//                 scales: {
//                     yAxes: [{
//                             id: "yAxisOne",
//                             type: "linear",
//                             display: "auto",
//                             gridLines: { color: "#283E59", zeroLineColor: "#283E59" },
//                             ticks: {
//                                 callback: function(e) {
//                                     return e + "k";
//                                 },
//                             },
//                         },
//                         {
//                             id: "yAxisTwo",
//                             type: "linear",
//                             display: "auto",
//                             gridLines: { color: "#283E59", zeroLineColor: "#283E59" },
//                             ticks: {
//                                 callback: function(e) {
//                                     return e + "%";
//                                 },
//                             },
//                         },
//                     ],
//                 },
//             },
//             data: {
//                 labels: labels,
//                 datasets: [
//                     { label: "Customers", data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40], yAxisID: "yAxisOne" },
//                     { label: "Sessions", data: [50, 75, 35, 25, 55, 87, 67, 53, 25, 80, 87, 45], yAxisID: "yAxisOne", hidden: !0 },
//                     { label: "Conversion", data: [40, 57, 25, 50, 57, 32, 46, 28, 59, 34, 52, 48], yAxisID: "yAxisTwo", hidden: !0 },
//                 ],
//             },
//         });
// })(),

(function() {
    var e = document.getElementById("trafficChart");
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "doughnut",
            options: {
                tooltips: {
                    callbacks: {
                        afterLabel: function() {
                            return "%";
                        },
                    },
                },
            },
            data: {
                labels: ["Direct", "Organic", "Referral"],
                datasets: [
                    { data: [60, 25, 15], backgroundColor: ["#2C7BE5", "#A6C5F7", "#D2DDEC"] },
                    { data: [15, 45, 20], backgroundColor: ["#2C7BE5", "#A6C5F7", "#D2DDEC"], hidden: !0 },
                ],
            },
        });
})(),
(function() {
    var e = document.getElementById("trafficChartAlt");
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "doughnut",
            options: {
                tooltips: {
                    callbacks: {
                        afterLabel: function() {
                            return "%";
                        },
                    },
                },
            },
            data: {
                labels: ["Direct", "Organic", "Referral"],
                datasets: [
                    { data: [60, 25, 15], backgroundColor: ["#2C7BE5", "#A6C5F7", "#D2DDEC"] },
                    { data: [15, 45, 20], backgroundColor: ["#2C7BE5", "#A6C5F7", "#D2DDEC"], hidden: !0 },
                ],
            },
        });
})(),
(function() {
    var e = document.getElementById("salesChart");
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "line",
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            callback: function(e) {
                                return "$" + e + "k";
                            },
                        },
                    }, ],
                },
            },
            data: {
                labels: ["Oct 1", "Oct 3", "Oct 6", "Oct 9", "Oct 12", "Oct 5", "Oct 18", "Oct 21", "Oct 24", "Oct 27", "Oct 30"],
                datasets: [
                    { label: "All", data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25] },
                    { label: "Direct", data: [7, 40, 12, 27, 34, 17, 19, 30, 28, 32, 24], hidden: !0 },
                    { label: "Organic", data: [2, 12, 35, 25, 36, 25, 34, 16, 4, 14, 15], hidden: !0 },
                ],
            },
        });
})(),
(function() {
    var e = document.getElementById("ordersChart");
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "bar",
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            callback: function(e) {
                                return "$" + e + "k";
                            },
                        },
                    }, ],
                },
            },
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    { label: "Sales", data: [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32] },
                    { label: "Affiliate", data: [15, 10, 20, 12, 7, 0, 8, 16, 18, 16, 10, 22], backgroundColor: "#d2ddec", hidden: !0 },
                ],
            },
        });
})(),
(function() {
    var e = document.getElementById("earningsChart");
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "bar",
            options: {
                scales: {
                    yAxes: [{
                            id: "yAxisOne",
                            type: "linear",
                            display: "auto",
                            ticks: {
                                callback: function(e) {
                                    return "$" + e + "k";
                                },
                            },
                        },
                        {
                            id: "yAxisTwo",
                            type: "linear",
                            display: "auto",
                            ticks: {
                                callback: function(e) {
                                    return e + "k";
                                },
                            },
                        },
                        {
                            id: "yAxisThree",
                            type: "linear",
                            display: "auto",
                            ticks: {
                                callback: function(e) {
                                    return e + "%";
                                },
                            },
                        },
                    ],
                },
            },
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                datasets: [
                    { label: "Earnings", data: [18, 10, 5, 15, 10, 20, 15, 25, 20, 26, 25, 29, 18, 10, 5, 15, 10, 20], yAxisID: "yAxisOne" },
                    { label: "Sessions", data: [50, 75, 35, 25, 55, 87, 67, 53, 25, 80, 87, 45, 50, 75, 35, 25, 55, 19], yAxisID: "yAxisTwo", hidden: !0 },
                    { label: "Bounce", data: [40, 57, 25, 50, 57, 32, 46, 28, 59, 34, 52, 48, 40, 57, 25, 50, 57, 29], yAxisID: "yAxisThree", hidden: !0 },
                ],
            },
        });
})(),
(function() {
    var e = document.getElementById("weeklyHoursChart");
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "bar",
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            callback: function(e) {
                                return e + "hrs";
                            },
                        },
                    }, ],
                },
            },
            data: { labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"], datasets: [{ data: [21, 12, 28, 15, 5, 12, 17, 2] }] },
        });
})(),
(function() {
    var e = document.getElementById("overviewChart");
    e &&
        new Chart(e, {
            type: "line",
            options: {
                scales: {
                    yAxes: [{
                            id: "yAxisOne",
                            type: "linear",
                            display: "auto",
                            ticks: {
                                callback: function(e) {
                                    return "$" + e + "k";
                                },
                            },
                        },
                        {
                            id: "yAxisTwo",
                            type: "linear",
                            display: "auto",
                            ticks: {
                                callback: function(e) {
                                    return e + "hrs";
                                },
                            },
                        },
                    ],
                },
            },
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    { label: "Earned", data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40], yAxisID: "yAxisOne" },
                    { label: "Hours Worked", data: [7, 35, 12, 27, 34, 17, 19, 30, 28, 32, 24, 39], yAxisID: "yAxisTwo", hidden: !0 },
                ],
            },
        });
})(),
(function() {
    var e = document.getElementById("sparklineChart");
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "line",
            options: {
                scales: { yAxes: [{ display: !1 }], xAxes: [{ display: !1 }] },
                elements: { line: { borderWidth: 2 }, point: { hoverRadius: 0 } },
                tooltips: {
                    custom: function() {
                        return !1;
                    },
                },
            },
            data: { labels: new Array(12), datasets: [{ data: [0, 15, 10, 25, 30, 15, 40, 50, 80, 60, 55, 65] }] },
        });
})(),
(function() {
    var e = document.querySelectorAll("#sparklineChartSocialOne, #sparklineChartSocialTwo, #sparklineChartSocialThree, #sparklineChartSocialFour");
    "undefined" != typeof Chart &&
        e && [].forEach.call(e, function(e) {
            new Chart(e, {
                type: "line",
                options: {
                    scales: { yAxes: [{ display: !1 }], xAxes: [{ display: !1 }] },
                    elements: { line: { borderWidth: 2, borderColor: "#D2DDEC" }, point: { hoverRadius: 0 } },
                    tooltips: {
                        custom: function() {
                            return !1;
                        },
                    },
                },
                data: { labels: new Array(12), datasets: [{ data: [0, 15, 10, 25, 30, 15, 40, 50, 80, 60, 55, 65] }] },
            });
        });
})(),
(function() {
    var e = document.getElementById("feedChart");
    e &&
        new Chart(e, {
            type: "bar",
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            callback: function(e) {
                                return "$" + e + "k";
                            },
                        },
                    }, ],
                },
            },
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    { label: "Sales", data: [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32] },
                    { label: "Affiliate", data: [15, 10, 20, 12, 7, 0, 8, 16, 18, 16, 10, 22], backgroundColor: "#d2ddec", hidden: !0 },
                ],
            },
        });
})();


$('body').on('change', '#cat_parent', function() {
    const id = $('#cat_parent option:selected').val()
    $.ajax({
        url: '/getSubcategories',
        data: { category: id },
        method: "GET",
        dataType: 'json',
        success: function(data) {
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
    })
})

$('body').on('change', '#cat_child', function() {
    const id = $('#cat_child option:selected').val()
    $.ajax({
        url: '/getSubcategories',
        data: { category: id },
        method: "GET",
        dataType: 'json',
        success: function(data) {
            if (data.hasOwnProperty('0')) {
                $('#cat_child').attr('name', 'subcategory')
                $('#child_div').remove()
                $('#subCategories').append(`
                    <div id="child_div" class="form-group col-12 col-md-12 mb-3">
                        <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                        <div class="input_placeholder_style">
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

$(function($) {
    $(".action-print").click(function() {
        window.print();
        return false;
    });
});


////===================aaaaaaaaaaaaaaaaaaaaaaaaaa===================//
// $(function() {

//     $("#galler").change(function() {
//         var fd = new FormData()
//         fd.append('_token', $('meta[name=csrf-token]').attr("content"));
//         var files = $('#galler')[0].files;
//         if (files.length > 0) {
//             for (let i = 0; i < files.length; i++) {
//                 fd.append('image', files[i]);
//                 $.ajax({
//                     url: '/uploadImage',
//                     type: 'post',
//                     data: fd,
//                     contentType: false,
//                     processData: false,
//                     beforeSend: function() {
//                         var x = $('#db-preview-image').find('.product_image[data-image="false"]').first()
//                         x.find('img').hide()
//                         x.find('.spinner-border').removeClass('d-none')
//                     },
//                     success: function(response) {
//                         var x = $('#db-preview-image').find('.product_image[data-image="false"]').first()
//                         x.find('.spinner-border').addClass('d-none')
//                         x.html('').attr('data-image', 'true').append(`
//                             <div class="profile-pic">
//                                 <img src="/storage/${response}" data-image-src="${response}" class="position-relative mw-100 pic-item">
//                                 <div class="deleteImage"><i class="fa fa-trash fa-lg text-danger"></i></div>
//                             </div>
//                     `)

//                         let gallery = $('#gallery')
//                         if (gallery.val() == '') {
//                             gallery.val(gallery.val() + response)
//                         } else {
//                             gallery.val(gallery.val() + ',' + response)
//                         }
//                     },
//                 });
//             }

//         } else {
//             alert("Please select a file.");
//         }
//     });
// });


// $('body').on('click', '.deleteImage', function() {
//     let url = $(this).parent().find('img').data('image-src')
//     let gallery = $('#gallery')
//     let array = gallery.val().split(',')
//     const index = array.indexOf(url)
//     if (index > -1) {
//         array.splice(index, 1);
//     }
//     gallery.val(array)
//     $(this).parent().parent().remove()
//     if (url.indexOf('products/edit/') !== -1) {
//         $(this).parent().parent().parent().remove()
//     } else {
//         $(this).parent().parent().remove()
//     }
//     $('#db-preview-image').append(`
//         <div class="col-3 text-center product_image d-flex justify-content-center align-items-center" data-image="false">
//             <div class="spinner-border d-none" role="status">
//                 <span class="sr-only">Loading...</span>
//             </div>
//             <label for="galler">
//                 <img src="/storage/theme/avatar_gallery.svg" class="px-0 btn mw-100 rounded gallery"  alt="">
//             </label>
//         </div>
//     `)
// })

$(document).on('change', '[name="category_id"]', function() {
    const id = $('[name="category_id"] option:selected').val();
    $.ajax({
        url: '/getAttributes',
        data: {
            category_id: id
        },
        method: "GET",
        dataType: 'json',
        success: function(data) {
            $('#attributes').empty();
            data.forEach(element => {
                $('#attributes').append(`
                    <div class="form-check form-check">
                        <input class="form-check-input js-attribute" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
                        <label class="form-check-label" for="${element['at_slug']}Checkbox${element['at_id']}">${element['at_name']}</label>
                    </div>
                `);
            })
        }
    });
})


$(document).on('change', '.js-attribute', function() {
    const _this = $(this);
    $.ajax({
        url: '/getAttributesValue',
        data: {
            attribute_id: _this.val()
        },
        method: "GET",
        dataType: 'json',
        success: function(data) {
            if (!_this.is(":checked")) {
                _this.closest('div').find('select').remove();
            } else {
                _this.closest('div').append(`
                    <select class="input_placeholder_style form-control" name="attribute[${data[0]['slug']}][value][]" multiple>
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



function image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#main-poster').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function() {
    image(this);
});

function user_avatar(input) { 
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.user_avatar svg').hide();
            $('.user_avatar img').show().attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#profile_photo_path").change(function() {
    user_avatar(this);
});
