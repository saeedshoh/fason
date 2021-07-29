"use strict";

window.chosen = require('chosen-js')



import { upload } from '../upload.js'

if ($('#gallery').attr('form') == 'add_product') {
    upload('#gallery', {
        multi: true,
        accept: ['image/*']
    })
}

$('.my').change(function () {
    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
    $('.your').text(filename);
  });

$(document).ready(function() {
    $('.chosen-select').chosen({no_results_text: "Ой, ничего не найдено!"});
});

$(document).ready(function() {
    $('.chosen-select-store').chosen({no_results_text: "Ой, ничего не найдено!"});
});



$.get("/dashboard/ordersStatistic", function (statistic) {
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
                            callback: function (e) {
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
    (function () {
        var e = document.getElementById("conversionsChart");
        "undefined" != typeof Chart &&
            e &&
            new Chart(e, {
                type: "bar",
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function (e) {
                                    return e + "%";
                                },
                            },
                        },],
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
/**
 * Search items
 */
$('body').on('keyup', '#search', function () {
    var search = $(this).val();
    var item = $(this).attr('data-item');
    $.get('/dashboard/' + item, { search: search }, function (data) {
        if (item.indexOf('attribute/') != -1) {
            $('#attribute_values').empty().html(data);
        }
        else if (item.indexOf('show/') != -1 && item.indexOf('/orders') != -1) {
            $('#show_orders').empty().html(data);
        }
        else if (item.indexOf('show/') != -1 && item.indexOf('/products') != -1) {
            $('#show_products').empty().html(data);
        }
        else if (item.indexOf('products/statuses/accepted') != -1) {
            $('#products_accepted').empty().html(data);
        }
        else if (item.indexOf('products/statuses/onCheck') != -1) {
            $('#products_oncheck').empty().html(data);
        }
        else if (item.indexOf('products/statuses/canceled') != -1) {
            $('#products_canceled').empty().html(data);
        }
        else if (item.indexOf('products/statuses/hidden') != -1) {
            $('#products_hidden').empty().html(data);
        }
        else if (item.indexOf('products/statuses/notInStock') != -1) {
            $('#products_notinstock').empty().html(data);
        }
        else if (item.indexOf('products/statuses/deleted') != -1) {
            $('#products_deleted').empty().html(data);
        }
        else if (item.indexOf('stores/accepted') != -1) {
            $('#stores_accepted').empty().html(data);
        }
        else if (item.indexOf('stores/moderation') != -1) {
            $('#stores_moderation').empty().html(data);
        }
        else if (item.indexOf('stores/disabled') != -1) {
            $('#stores_disabled').empty().html(data);
        }
        else if (item.indexOf('stores/disabledUser') != -1) {
            $('#stores_disabledUser').empty().html(data);
        }
        else if (item.indexOf('stores/starred') != -1) {
            $('#stores_starred').empty().html(data);
        }
        else if (item.indexOf('categories/actives') != -1) {
            $('#categories_actives').empty().html(data);
        }
        else if (item.indexOf('categories/inactives') != -1) {
            $('#categories_inactives').empty().html(data);
        }
        else {
            $('#' + item).empty().html(data);
        }
    });
});

(function () {
    var e = document.getElementById("trafficChart");
    "undefined" != typeof Chart &&
        e &&
        new Chart(e, {
            type: "doughnut",
            options: {
                tooltips: {
                    callbacks: {
                        afterLabel: function () {
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
    (function () {
        var e = document.getElementById("trafficChartAlt");
        "undefined" != typeof Chart &&
            e &&
            new Chart(e, {
                type: "doughnut",
                options: {
                    tooltips: {
                        callbacks: {
                            afterLabel: function () {
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
    (function () {
        var e = document.getElementById("salesChart");
        "undefined" != typeof Chart &&
            e &&
            new Chart(e, {
                type: "line",
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function (e) {
                                    return "$" + e + "k";
                                },
                            },
                        },],
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
    (function () {
        var e = document.getElementById("ordersChart");
        "undefined" != typeof Chart &&
            e &&
            new Chart(e, {
                type: "bar",
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function (e) {
                                    return "$" + e + "k";
                                },
                            },
                        },],
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
    (function () {
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
                                callback: function (e) {
                                    return "$" + e + "k";
                                },
                            },
                        },
                        {
                            id: "yAxisTwo",
                            type: "linear",
                            display: "auto",
                            ticks: {
                                callback: function (e) {
                                    return e + "k";
                                },
                            },
                        },
                        {
                            id: "yAxisThree",
                            type: "linear",
                            display: "auto",
                            ticks: {
                                callback: function (e) {
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
    (function () {
        var e = document.getElementById("weeklyHoursChart");
        "undefined" != typeof Chart &&
            e &&
            new Chart(e, {
                type: "bar",
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function (e) {
                                    return e + "hrs";
                                },
                            },
                        },],
                    },
                },
                data: { labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"], datasets: [{ data: [21, 12, 28, 15, 5, 12, 17, 2] }] },
            });
    })(),
    (function () {
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
                                callback: function (e) {
                                    return "$" + e + "k";
                                },
                            },
                        },
                        {
                            id: "yAxisTwo",
                            type: "linear",
                            display: "auto",
                            ticks: {
                                callback: function (e) {
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
    (function () {
        var e = document.getElementById("sparklineChart");
        "undefined" != typeof Chart &&
            e &&
            new Chart(e, {
                type: "line",
                options: {
                    scales: { yAxes: [{ display: !1 }], xAxes: [{ display: !1 }] },
                    elements: { line: { borderWidth: 2 }, point: { hoverRadius: 0 } },
                    tooltips: {
                        custom: function () {
                            return !1;
                        },
                    },
                },
                data: { labels: new Array(12), datasets: [{ data: [0, 15, 10, 25, 30, 15, 40, 50, 80, 60, 55, 65] }] },
            });
    })(),
    (function () {
        var e = document.querySelectorAll("#sparklineChartSocialOne, #sparklineChartSocialTwo, #sparklineChartSocialThree, #sparklineChartSocialFour");
        "undefined" != typeof Chart &&
            e && [].forEach.call(e, function (e) {
                new Chart(e, {
                    type: "line",
                    options: {
                        scales: { yAxes: [{ display: !1 }], xAxes: [{ display: !1 }] },
                        elements: { line: { borderWidth: 2, borderColor: "#D2DDEC" }, point: { hoverRadius: 0 } },
                        tooltips: {
                            custom: function () {
                                return !1;
                            },
                        },
                    },
                    data: { labels: new Array(12), datasets: [{ data: [0, 15, 10, 25, 30, 15, 40, 50, 80, 60, 55, 65] }] },
                });
            });
    })(),
    (function () {
        var e = document.getElementById("feedChart");
        e &&
            new Chart(e, {
                type: "bar",
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function (e) {
                                    return "$" + e + "k";
                                },
                            },
                        },],
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


$('body').on('change', '#cat_parent', function () {
    const id = $('#cat_parent option:selected').val()
    $.ajax({
        url: '/getSubcategories',
        data: { category: id },
        method: "GET",
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                $('#attributes').empty();
                $('#cat_child').empty().append(`
                    <label for="cat_child">Под-категория</label>
                    <select class="form-control" id="cat_child_value" name="category_id" >
                        <option disabled selected>Выберите подкатегорию</option>
                    </select>
                `)
                $('#child_div').empty()
                data.forEach(element => {
                    $('#cat_child_value').append(`
                        <option value="${element['id']}">${element['name']}</option>
                    `)
                })
            } else {
                $('#cat_child').empty();
                $('#child_div').remove()
                $.ajax({
                    url: '/getAttributes',
                    data: {
                        category_id: id
                    },
                    method: "GET",
                    dataType: 'json',
                    success: function (data) {
                        $('#attributes').empty();
                        if (data.length > 0) {
                            if (data[0].at_id) {
                                data.forEach(element => {
                                    $('#attributes').append(`
                                        <div class="form-check form-check">
                                            <input class="form-check-input js-attribute" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
                                            <label class="form-check-label" for="${element['at_slug']}Checkbox${element['at_id']}">${element['at_name']}</label>
                                        </div>
                                    `);
                                })
                            }
                        }
                    }
                });
            }
        }
    })
})

$('body').on('change', '#cat_child_value', function () {
    const id = $('#cat_child_value option:selected').val()
    $.ajax({
        url: '/getSubcategories',
        data: { category: id },
        method: "GET",
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                $('#attributes').empty();
                $('#cat_child_value').attr('name', 'subcategory')
                $('#child_div').remove()
                $('#subCategories').append(`
                    <div id="child_div" class="form-group col-12 col-md-12 mb-3">
                        <label class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                        <div class="input_placeholder_style">
                        <select class="input_placeholder_style form-control position-relative" id="grandchildren" name="category_id">
                            <option disabled selected>Выберите категорию</option>
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
                $.ajax({
                    url: '/getAttributes',
                    data: {
                        category_id: id
                    },
                    method: "GET",
                    dataType: 'json',
                    success: function (data) {
                        $('#attributes').empty();
                        if (data.length > 0) {
                            if (data[0].at_id) {
                                data.forEach(element => {
                                    $('#attributes').append(`
                                        <div class="form-check form-check">
                                            <input class="form-check-input js-attribute" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
                                            <label class="form-check-label" for="${element['at_slug']}Checkbox${element['at_id']}">${element['at_name']}</label>
                                        </div>
                                    `);
                                })
                            }
                        }
                    }
                });
            }
        }
    })
})

$('body').on('change', '#grandchildren', function () {
    const id = $('#grandchildren option:selected').val()
    $.ajax({
        url: '/getAttributes',
        data: {
            category_id: id
        },
        method: "GET",
        dataType: 'json',
        success: function (data) {
            $('#attributes').empty();
            if (data.length > 0) {
                if (data[0].at_id) {
                    data.forEach(element => {
                        $('#attributes').append(`
                            <div class="form-check form-check">
                                <input class="form-check-input js-attribute" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
                                <label class="form-check-label" for="${element['at_slug']}Checkbox${element['at_id']}">${element['at_name']}</label>
                            </div>
                        `);
                    })
                }
            }
        }
    });
})

$(function ($) {
    $(".action-print").click(function () {
        window.print();
        return false;
    });
});

// attributes = (id) => {
//     $.ajax({
//         url: '/getAttributes',
//         data: {
//             category_id: id
//         },
//         method: "GET",
//         dataType: 'json',
//         success: function(data) {
//             $('#attributes').empty();
//             data.forEach(element => {
//                 $('#attributes').append(`
//                     <div class="form-check form-check">
//                         <input class="form-check-input js-attribute" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
//                         <label class="form-check-label" for="${element['at_slug']}Checkbox${element['at_id']}">${element['at_name']}</label>
//                     </div>
//                 `);
//             })
//         }
//     });
// }

// $(document).on('change', '[name="category_id"]', function() {
//     const id = $('[name="category_id"] option:selected').val();
//     $.ajax({
//         url: '/getAttributes',
//         data: {
//             category_id: id
//         },
//         method: "GET",
//         dataType: 'json',
//         success: function(data) {
//             $('#attributes').empty();
//             data.forEach(element => {
//                 $('#attributes').append(`
//                     <div class="form-check form-check">
//                         <input class="form-check-input js-attribute" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
//                         <label class="form-check-label" for="${element['at_slug']}Checkbox${element['at_id']}">${element['at_name']}</label>
//                     </div>
//                 `);
//             })
//         }
//     });
// })

$(document).on('change', '.js-attribute', function () {
    const _this = $(this);
    $.ajax({
        url: '/getAttributesValue',
        data: {
            attribute_id: _this.val()
        },
        method: "GET",
        dataType: 'json',
        success: function (data) {
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

        reader.onload = function (e) {
            $('#main-poster').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function () {
    image(this);
});

function user_avatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.user_avatar svg').hide();
            $('.user_avatar img').show().attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#profile_photo_path").change(function () {
    user_avatar(this);
});

$('#address-input').on('focusin', function () {
    $('#save-changes').removeClass('d-none');
})

$('#address-input').on('focusout', function () {
    $('#save-changes').trigger('click');
})

$('#store-address-input').on('focusin', function () {
    $('#store-save-changes').removeClass('d-none');
})

$('#store-address-input').on('focusout', function () {
    $('#store-save-changes').trigger('click');
})

$('#save-changes').on('click', function () {
    var id = $(this).data('id');
    var address = $('#address').val();
    $.post('/dashboard/clients/changeAddress', { id: id, address: address, table: 'order' }, function (order) {
        if (order) {
            $('#address').val(order);
        } else {
            $('#address').val(address);
        }
    })
    $('#save-changes').addClass('d-none');
})

$('#store-save-changes').on('click', function () {
    var id = $(this).data('id');
    var address = $('#store-address').val();
    $.post('/dashboard/clients/changeAddress', { id: id, address: address, table: 'store' }, function (store) {
        if (store) {
            $('#store-address').val(store);
        } else {
            $('#store-address').val(address);
        }
    })
    $('#store-save-changes').addClass('d-none');
})

$('body').on('click', '.change-order', function () {
    var id = $(this).attr('data-id');
    var order_number = $(this).attr('data-order_number');
    var type = $(this).attr('data-type');
    var table = $(this).attr('data-table');
    $.post('/' + table + '/order', {
        id: id,
        order_number: order_number,
        type: type,
    }, function () {
        location.reload();
    });
});

// single preview
function avatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()

        reader.onload = function (e) {
            $('#avatar-poster').attr('src', e.target.result)
            $('#avatar-poster-mobile').attr('src', e.target.result)
        }

        reader.readAsDataURL(input.files[0])
    }
}

function cover(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()

        reader.onload = function (e) {
            $('#cover-poster-mobile').attr('src', e.target.result)
        }

        reader.readAsDataURL(input.files[0])
    }
}

$('#avatar').change(function () {
    avatar(this)
})

$('#cover').change(function () {
    cover(this)
})

document.addEventListener("DOMContentLoaded", () => {
    let doc = document.getElementById('main-poster')
    let validateMainImg = document.querySelector('.add-product-btn')
    let validateInputImage = document.getElementById('image')
    let validateGallery = document.getElementById("gallery")
    let galleryMain = document.querySelector('.preview-image').getElementsByTagName('img')[0]
    let galleryWarn = document.querySelectorAll('.invalid-feedback')[7]
    let imageWarn = document.querySelectorAll('.invalid-feedback')[6]
    let hasToggle = false

    validateMainImg.addEventListener("click", function(){
        hasToggle = true
        validateMe(validateInputImage,doc,imageWarn)
        validateMe(validateGallery,galleryMain,galleryWarn)
    })

    validateInputImage.addEventListener("change",function(){
        validateMe(validateInputImage,doc,imageWarn)
    })

    validateGallery.addEventListener("change",function(){
        validateMe(validateGallery,galleryMain,galleryWarn)
    })

    function validateMe(inp,img,warn){
        if(hasToggle){
            if(inp.value == '/storage/theme/icons/add_product_plus.svg' || inp.files.length == 0){
                img.classList.add("border")
                img.classList.add("border-danger")
                warn.classList.add('d-block')
            }else{
                img.classList.remove("border")
                img.classList.remove("border-danger")
                warn.classList.remove('d-block')
            }
        }
    }
})

let previews = document.querySelectorAll('.preview-image')
if(previews.length >= 7){
    previews[7].remove()
}

let form = document.getElementById('editForm')
    let editBtn = document.getElementById('submitEdit')
    let categoryName = document.getElementById('name')
    let alert = document.querySelector('.alert')
    let feedBack = document.getElementById('nameFeedback')
    editBtn.addEventListener('click',()=>{
        console.log(categoryName)
        if(categoryName.value !== ''){
            form.submit()
            alert.classList.add('d-none')
            feedBack.classList.remove('d-block')
            categoryName.classList.remove('border-danger')
        }else{
            alert.classList.remove('d-none')
            feedBack.classList.add('d-block')
            categoryName.classList.add('border-danger')
        }
    })
