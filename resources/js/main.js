require("./jquery.inputmask.bundle.js");
require("sweetalert2");
import { upload } from "./upload.js";
import Swal from "sweetalert2";
import Compressor from "compressorjs";
import { forEach } from "lodash";

let allAttrs = [];

$(document).on("click", ".add__attr-icon", function() {
    const imgAdd = "/storage/theme/plus_add_attr.svg";
    const img_Delete = "/storage/theme/delete_attr.svg";
    let arr = [];
    $(this).find(
        $(".st-attribute_add option:selected").each(function(el) {
            arr.push($(this).text());
        })
    );
    if ($(this).attr("src") === imgAdd) {
        $(this).attr("src", img_Delete);
        arr = [];
    } else if ($(this).attr("src") === img_Delete) {
        $(this).attr("src", imgAdd);
        console.log(arr);
    }
});

if ($("#gallery").attr("form") == "add_product") {
    upload("#gallery", {
        multi: true,
        accept: ["image/*"]
    });
}

const Toast = Swal.mixin({
    toast: true,
    position: "top-center",
    showConfirmButton: false,
    timer: 2000,
    didOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});

$("#listView").on("click", function() {
    $("#catProducts")
        .find(".card")
        .addClass("active");
    $("#catProducts .endless-pagination")
        .removeClass("row-cols-2")
        .addClass("row-cols-1");
    $("#gridView").removeClass("d-none");
    $(this).addClass("d-none");
    $("#catProducts .discription").removeClass("d-none");
    $("#catProducts .card").addClass("flex-row");
    $("#catProducts .card img").addClass("w-50 h-100");
    $("#catProducts .row").attr("data-style", "2");
    $(".line-test::before").css("content", "none");
    $("#catProducts")
        .removeClass("col-md-8")
        .addClass("col-md-12");
});
$("#gridView").on("click", function() {
    $("#catProducts")
        .find(".card")
        .removeClass("active");

    $("#catProducts .row").attr("data-style", "1");
    $(".card")
        .find("img")
        .removeClass("w-50 h-100");
    $("#catProducts .card").removeClass("flex-row");
    $("#catProducts .row")
        .removeClass("row-cols-1")
        .addClass("row-cols-2");
    $("#listView").removeClass("d-none");
    $(this).addClass("d-none");
    $("#catProducts .discription").addClass("d-none");
});

$(".numeric").on("change keyup", function() {
    var sanitized = $(this)
        .val()
        .replace(/[^0-9]/g, "");
    $(this).val(sanitized);
});
///  products line
var step_sale = 2;
var step_order = 2;
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(document).height() - $(this).height() == $(this).scrollTop()) {
            if ($(".order-scroll")[0]) {
                if ($(".show").data("type") == 1 && step_sale != 0) {
                    $(".loading_hide_sale:last").removeClass("d-none");
                    $.get("orders?salePage=" + step_sale, function(
                        data,
                        status
                    ) {
                        $(".loading_hide_sale:last").addClass("d-none");
                        step_sale++;
                        var products = $.parseHTML(data);
                        if (
                            $(products)
                                .find(".show div.empty-order p")
                                .text() != "У вас нет продаж"
                        ) {
                            $(".show").append(
                                $(products)
                                    .find(".show")
                                    .html()
                            );
                        } else {
                            step_sale = 0;
                        }
                    });
                }
            }
        }
    });
    $(window).scroll(function() {
        if ($(document).height() - $(this).height() == $(this).scrollTop()) {
            if ($(".order-scroll")[0]) {
                if ($(".show").data("type") == 2 && step_order != 0) {
                    $(".loading_hide:last").removeClass("d-none");
                    $.get("orders?orderPage=" + step_order, function(
                        data,
                        status
                    ) {
                        $(".loading_hide:last").addClass("d-none");
                        step_order++;
                        var products = $.parseHTML(data);
                        if (
                            $(products)
                                .find(".show div.empty-order p")
                                .text() != "У вас нет покупок"
                        ) {
                            $(".show").append(
                                $(products)
                                    .find(".show")
                                    .html()
                            );
                        } else {
                            step_order = 0;
                        }
                    });
                }
            }
        }
    });
    const url = $(location).attr("href");
    if (url.indexOf("category") !== -1) {
        function myFunction(x) {
            if (x.matches) {
                // If media query matches
                for (let i = 1; i <= 2; i++) {
                    // выведет линию над первыми 2 элементами класса ".custom-lined"
                    $(".custom-lined .col:nth-child(" + i + ") .card").addClass(
                        "position-relative line-test"
                    );
                }
            } else {
                for (let i = 1; i <= 3; i++) {
                    // выведет линию над первыми 3 элементами класса ".custom-lined"
                    $(".custom-lined .col:nth-child(" + i + ") .card").addClass(
                        "position-relative line-test"
                    );
                }
            }
        }
        var x = window.matchMedia("(max-width: 767px)");
        myFunction(x); // Call listener function at run time
        x.addListener(myFunction); // Attach listener function on state changes
    } else {
        function myFunction(x) {
            if (x.matches) {
                // If media query matches
                for (let i = 1; i <= 2; i++) {
                    // выведет линию над первыми 2 элементами класса ".custom-lined"
                    $(".custom-lined .col:nth-child(" + i + ") .card").addClass(
                        "position-relative line-test"
                    );
                }
            } else {
                for (let i = 1; i <= 5; i++) {
                    // выведет линию над первыми 5 элементами класса ".custom-lined"
                    $(".custom-lined .col:nth-child(" + i + ") .card").addClass(
                        "position-relative line-test"
                    );
                }
            }
        }
        var x = window.matchMedia("(max-width: 767px)");
        myFunction(x); // Call listener function at run time
        x.addListener(myFunction); // Attach listener function on state changes
    }
    $("#listView").on("click", function() {
        for (let i = 2; i <= 2; i++) {
            // выведет линию над первыми 1 элементами класса ".custom-lined"
            $(".custom-lined .col:nth-child(" + i + ") .card").removeClass(
                "line-test"
            );
        }
    });
    $("#gridView").on("click", function() {
        for (let i = 1; i <= 2; i++) {
            // выведет линию над первыми 1 элементами класса ".custom-lined"
            $(".custom-lined .col:nth-child(" + i + ") .card").addClass(
                "position-relative line-test"
            );
        }
    });

    var prev_imgPlus = $(".preview-image");
    if (prev_imgPlus.length == 8) {
        $(".preview-image")
            .children()
            .last()
            .remove();
    }
});

function throttle(f, delay) {
    var timer = null;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = window.setTimeout(function() {
            f.apply(context, args);
        }, delay || 2000);
    };
}
$(document).ready(function() {
    var timeout;
    $("#nameStoreCreate").on("keyup", function() {
        $("#storeSubmit").attr("disabled", true);
        $(".store-exist").addClass("d-none");
        var store = $(this).val();
        if (store.length == 0) {
            $("#storeSubmit").attr("disabled", false);
        }
        if (store.length >= 3) {
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                $.get("/store/exist/" + store, function(data) {
                    if (data.exist) {
                        $(".store-exist").removeClass("d-none");
                        $("#storeSubmit").attr("disabled", true);
                    } else {
                        $(".store-exist").addClass("d-none");
                        $("#storeSubmit").attr("disabled", false);
                    }
                });
            }, 100);
        }
    });

    $("#nameEditStore").on("keyup", function() {
        $("#storeEditSubmit").attr("disabled", true);
        $(".store-exist").addClass("d-none");
        var store = $(this).val();
        if (store.length == 0) {
            $("#storeEditSubmit").attr("disabled", false);
        }
        if (store.length >= 3 && store != this.defaultValue) {
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                $.get("/store/exist/" + store, function(data) {
                    if (data.exist) {
                        $(".store-exist").removeClass("d-none");
                        $("#storeEditSubmit").attr("disabled", true);
                    } else {
                        $(".store-exist").addClass("d-none");
                        $("#storeEditSubmit").attr("disabled", false);
                    }
                });
            }, 100);
        }
    });

    $(".sms--false").hide();
    $(window).scroll(fetchPosts);

    var old_page = "";
    function fetchPosts() {
        var page = $(".endless-pagination").data("next-page");
        if (
            page !== null &&
            page !== "" &&
            !page.substring(0, 5).includes("null&")
        ) {
            $("#scroll-spinner").removeClass("d-none");
            // clearTimeout($.data(this, 'scrollCheck'))

            // $.data(
            //     this,
            //     'scrollCheck',
            setTimeout(function() {
                // $('#scroll-spinner').removeClass('d-none')
                var scroll_position_for_posts_load =
                    $(window).height() + $(window).scrollTop();
                if (scroll_position_for_posts_load <= $(document).height()) {
                    var style = $("#catProducts .row").attr("data-style");
                    if (old_page != page) {
                        $.get(page, { style: style }, function(data) {
                            $(".endless-pagination").append(data.posts);
                            $(".endless-pagination").data(
                                "next-page",
                                data.next_page
                            );
                            $("#scroll-spinner").addClass("d-none");
                        });
                        old_page = page;
                    }
                }
            }, 200);
            // )
        }
    }
    $(".markets").slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $("#phone").inputmask({
        mask: "999 99 9999",
        placeholder: " ",
        showMaskOnHover: false,
        showMaskOnFocus: false,
        onBeforePaste: function(pastedValue, opts) {
            var processedValue = pastedValue;

            //do something with it

            return processedValue;
        }
    });
    $("#code").inputmask({
        mask: "99999",
        placeholder: "",
        showMaskOnHover: false,
        showMaskOnFocus: false,
        onBeforePaste: function(pastedValue, opts) {
            var processedValue = pastedValue;

            //do something with it

            return processedValue;
        }
    });
    // const xl = $('#hello').val()
    // console.log(JSON.parse(xl))
    $(".count-products").each(function() {
        let category = $(this).data("id");
        let _this = $(this);
        $.ajax({
            url: "/countProducts",
            data: {
                category: category
            },
            method: "GET",
            dataType: "json",
            success: function(data) {
                if ([2, 3, 4].includes(data % 10)) {
                    _this.text(`${data}  товара`);
                } else if (data % 10 == 1) {
                    _this.text(`${data}  товар`);
                }
                // else if (data <= 0) {
                //     _this.css('visibility','hidden')
                // }
                else {
                    _this.text(`${data}  товаров`);
                }
            }
        });
    });

    var url = $(location).attr("href");
    if (url.indexOf("sort=") !== -1) {
        const sort = url.split("sort=")[1].split("&")[0];
        const city = url.split("city=")[1].split("&")[0];
        if (url.indexOf("priceFrom")) {
            const priceFrom = url.split("priceFrom=")[1].split("&")[0];
            $("#priceFrom").val(priceFrom);
        }
        if (url.indexOf("priceTo")) {
            const priceTo = url.split("priceTo=")[1].split("&")[0];
            $("#priceTo").val(priceTo);
        }
        $(`.sort[data-sort=${sort}]`).attr("checked", true);
        $(`.city[data-city=${city}]`).attr("checked", true);
    }

    $(".att-show").on("click", function() {
        $(".att-show").removeClass("active");
        $(this).addClass("active");
    });

    var urlMobi = $(location).attr("href");
    if (url.indexOf("sort=") !== -1) {
        const sortMobi = urlMobi.split("sort=")[1].split("&")[0];
        const cityMobi = urlMobi.split("city=")[1].split("&")[0];
        if (urlMobi.indexOf("priceFromMobi")) {
            const priceFromMobi = urlMobi
                .split("priceFromMobi=")[1]
                .split("&")[0];
            $("#priceFromMobi").val(priceFromMobi);
        }
        if (urlMobi.indexOf("priceToMobi")) {
            const priceToMobi = urlMobi.split("priceToMobi=")[1].split("&")[0];
            $("#priceToMobi").val(priceToMobi);
        }
        $(`.sort[data-sort=${sortMobi}]`).attr("checked", true);
        $(`.city[data-city=${cityMobi}]`).attr("checked", true);
    }

    $(".att-show").on("click", function() {
        $(".att-show").removeClass("active");
        $(this).addClass("active");
    });

    ///Delete store
    $("body").on("click", ".delete-store", function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: "<h4>Вы действительно хотите выключить магазин?</h4>",
            html:
                '<p style="font-size: 12px;">При выключении другие пользователи не смогут видеть ваши товары, пока вы не восстановите магазин</p>',
            icon: "warning",
            height: 200,
            position: "center",
            showCancelButton: true,
            confirmButtonText: "Да",
            cancelButtonText: "Нет",
            customClass: {
                confirmButton: "bg-danger"
            }
        }).then(result => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    $("body").on("click", ".restore-store", function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: "<h4>Вы действительно хотите восстановить магазин?</h4>",
            icon: "warning",
            height: 200,
            position: "center",
            showCancelButton: true,
            confirmButtonText: "Да",
            cancelButtonText: "Нет",
            customClass: {
                confirmButton: "bg-success"
            },
            buttons: true,
            dangerMode: true
        }).then(result => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

$("body").on("click", "#prevCategory", function() {
    $("#subcategories").hide();
    $("#categories").show();
});

$("body").on("click", ".subcategory", function() {
    $("#attributes").empty();
    let category = $(this).data("slug");
    window.location.href = "/category/" + category;
});

$(document).on("change", "#cat_parent", function() {
    $("#attributes").empty();
    var this_ = $(this);
    const id = $("#cat_parent option:selected").val();
    $.ajax({
        url: "/getSubcategories",
        data: {
            category: id
        },
        method: "GET",
        dataType: "json",
        success: function(data) {
            $("#categories-row").empty();
            $("#attributes").empty();
            if (data != "") {
                $("#subCategories").empty();
                this_.attr("name", "parent_cat");
                $("#categories-row").append(`
                    <div id="subCategories">
                        <div class="form-group d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                            <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                            <div class="w-75 input_placeholder_style input-group  w-md-100">
                                <div class="input-group-prepend position-relative">
                                    <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                                </div>
                                <select class="input_placeholder_style custom-select position-relative" id="cat_child" name="category_id" required>
                                </select>
                                <small class="invalid-feedback">
                                    Выберите под-категорию
                                </small>
                            </div>
                        </div>
                    </div>
                `);
                $("#cat_child").empty().append(`
                    <option value="">Выберите под-категорию</option>
                `);
                $("#child_div").remove();
                data.forEach(element => {
                    $("#cat_child").append(`
                        <option value="${element["id"]}">${element["name"]}</option>
                    `);
                });
            } else {
                this_.attr("name", "category_id");
                $.ajax({
                    url: "/getAttributes",
                    data: {
                        category_id: id
                    },
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#attributes").empty();
                        console.log(data);
                        if (data.length > 0) {
                            if (data[0].at_id) {
                                data.forEach(element => {
                                    $("#attributes").append(`
                                    <div id="st-attribute_val" class="font-weight-semibold w-100 input_caption"></div>
                                        <div class="form-check form-check w-75 p-0 attr__checkboxes mb-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label class="form-check-label bg-secondary px-3 text-capitalize py-1 text-white cursor-pointer">${element["at_name"]}:</label>
                                                <label for="${element["at_slug"]}Checkbox${element["at_id"]}" class="m-0 cursor-pointer"><img class="add__attr-icon" oncontextmenu="return false;" data-for-id="${element["at_slug"]}Checkbox${element["at_id"]}" src="/storage/theme/plus_add_attr.svg" /></label>
                                            </div>
                                            <input class="form-check-input js-attribute d-none" name="attribute[${element["at_slug"]}][id]" type="checkbox" id="${element["at_slug"]}Checkbox${element["at_id"]}" value="${element["at_id"]}">
                                        </div>
                                    `);
                                });
                            }
                        }
                    }
                });
            }
        }
    });
});

$("body").on("change", "#cat_child_value", function() {
    const id = $("#cat_child_value option:selected").val();
    $.ajax({
        url: "/getSubcategories",
        data: { category: id },
        method: "GET",
        dataType: "json",
        success: function(data) {
            if (data.length > 0) {
                $("#attributes").empty();
                $("#cat_child_value").attr("name", "subcategory");
                $("#child_div").remove();
                $("#subCategories").append(`
                    <div id="child_div" class="form-group col-12 col-md-12 mb-3">
                        <label class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                        <div class="input_placeholder_style">
                        <select class="input_placeholder_style form-control position-relative" id="grandchildren" name="category_id">
                            <option disabled selected>Выберите категорию</option>
                        </select>
                        </div>
                    </div>
                `);
                data.forEach(element => {
                    $("#grandchildren").append(`
                        <option value="${element["id"]}">${element["name"]}</option>
                    `);
                });
            } else {
                $("#cat_child").attr("name", "category_id");
                $("#child_div").remove();
                $.ajax({
                    url: "/getAttributes",
                    data: {
                        category_id: id
                    },
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#attributes").empty();
                        if (data.length > 0) {
                            if (data[0].at_id) {
                                data.forEach(element => {
                                    $("#attributes").append(`
                                    <div id="st-attribute_val" class="font-weight-semibold w-100 input_caption"></div>
                                        <div class="form-check form-check w-75 p-0 attr__checkboxes mb-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label class="form-check-label bg-secondary px-3 text-capitalize py-1 text-white cursor-pointer">${element["at_name"]}:</label>
                                                <label for="${element["at_slug"]}Checkbox${element["at_id"]}" class="m-0 cursor-pointer"><img class="add__attr-icon" oncontextmenu="return false;" data-for-id="${element["at_slug"]}Checkbox${element["at_id"]}" src="/storage/theme/plus_add_attr.svg" /></label>
                                            </div>
                                            <input class="form-check-input js-attribute d-none" name="attribute[${element["at_slug"]}][id]" type="checkbox" id="${element["at_slug"]}Checkbox${element["at_id"]}" value="${element["at_id"]}">
                                        </div>
                                    `);
                                });
                            }
                        }
                    }
                });
            }
        }
    });
});

$("body").on("change", "#grandchildren", function() {
    const id = $("#grandchildren option:selected").val();
    $.ajax({
        url: "/getAttributes",
        data: {
            category_id: id
        },
        method: "GET",
        dataType: "json",
        success: function(data) {
            $("#attributes").empty();
            if (data.length > 0) {
                if (data[0].at_id) {
                    data.forEach(element => {
                        $("#attributes").append(`
                        <div id="st-attribute_val" class="font-weight-semibold w-100 input_caption"></div>
                            <div class="form-check form-check w-75 p-0 attr__checkboxes mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-check-label bg-secondary px-3 text-capitalize py-1 text-white cursor-pointer">${element["at_name"]}:</label>
                                    <label for="${element["at_slug"]}Checkbox${element["at_id"]}" class="m-0 cursor-pointer"><img class="add__attr-icon" oncontextmenu="return false;" data-for-id="${element["at_slug"]}Checkbox${element["at_id"]}" src="/storage/theme/plus_add_attr.svg" /></label>
                                </div>
                                <input class="form-check-input js-attribute d-none" name="attribute[${element["at_slug"]}][id]" type="checkbox" id="${element["at_slug"]}Checkbox${element["at_id"]}" value="${element["at_id"]}">
                            </div>
                        `);
                    });
                }
            }
        }
    });
});

// $(document).on('change', '[name="category_id"]', function() {
//     const id = $('[name="category_id"] option:selected').val()
//     $.ajax({
//         url: '/getAttributes',
//         data: {
//             category_id: id
//         },
//         method: 'GET',
//         dataType: 'json',
//         success: function(data) {
//             $('#attributes').empty()
//             if(data.length > 0){
//                 if(data[0].at_id){
//                     data.forEach(element => {
//                         $('#attributes').append(`
//                         <div id="st-attribute_val" class="font-weight-semibold w-100 input_caption"></div>
//                             <div class="form-check form-check w-75 p-0 attr__checkboxes mb-2">
//                                 <div class="d-flex justify-content-between align-items-center">
//                                     <label class="form-check-label bg-secondary px-3 text-capitalize py-1 text-white cursor-pointer">${element['at_name']}:</label>
//                                     <label for="${element['at_slug']}Checkbox${element['at_id']}" class="m-0 cursor-pointer"><img class="add__attr-icon" oncontextmenu="return false;" data-for-id="${element['at_slug']}Checkbox${element['at_id']}" src="/storage/theme/plus_add_attr.svg" /></label>
//                                 </div>
//                                 <input class="form-check-input js-attribute d-none" name="attribute[${element['at_slug']}][id]" type="checkbox" id="${element['at_slug']}Checkbox${element['at_id']}" value="${element['at_id']}">
//                             </div>
//                         `)
//                     })
//                 }
//             }
//         }
//     })
// })

$("#add_product input, #add_product textarea, #add_product select").on(
    "change",
    function() {
        if ($(this).val() == "") {
            $(this)
                .parent()
                .find("div, input, textarea")
                .addClass("border-danger");
            $(this)
                .parent()
                .find("small")
                .addClass("d-block");
        } else {
            $(this)
                .parent()
                .find("div, input, textarea")
                .removeClass("border-danger");
            $(this)
                .parent()
                .find("small")
                .removeClass("d-block");
        }
    }
);
$(document).on("submit", "#add_product", function(event) {
    $(this).addClass("was-validated");
    //stop submitting the form to see the disabled button effect
    if (
        $(".add-product")
            .find("#image")
            .val() == ""
    ) {
        $("#main-poster")
            .parent()
            .find("small")
            .removeClass("d-none");
        $("#main-poster").addClass("border-danger");
        event.preventDefault();
        return false;
    }
    if (
        $(".edit-product")
            .find("#image")
            .attr("value") == ""
    ) {
        $("#main-poster")
            .parent()
            .find("small")
            .removeClass("d-none");
        $("#main-poster").addClass("border-danger");
        event.preventDefault();
        return false;
    }
    if (
        $("#name").val() == "" &&
        $("#description").val() == "" &&
        $("#quantity").val() == "" &&
        $('select[name="category_id"]').val() == "" &&
        $("#price").val() == ""
    ) {
        event.preventDefault();
        return false;
    }
});

$(document).on("change", ".st-attribute_add", function() {});
$(document).on("click", "#btn-add_address", function() {
    var formData = new FormData();
    formData.append("_token", $("meta[name=csrf-token]").attr("content"));

    let phone = $("#phone").val();
    let name = $(this)
        .closest("form")
        .find('input[name="name"]')
        .val();
    let address = $(this)
        .closest("form")
        .find('input[name="address"]')
        .val();
    let city_id = $(this)
        .closest("form")
        .find('input[name="city_id"]:checked')
        .val();
    let profile_photo_path = $("#main-poster").attr("src");

    formData.append("phone", phone);
    formData.append("name", name);
    formData.append("address", address);
    formData.append("city_id", city_id);
    formData.append("profile_photo_path", profile_photo_path);

    if (phone != "" && address != "" && city_id != "") {
        $.ajax({
            url: "/users/contacts",
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function() {
                $(".success-preloader").removeClass("d-none");
            },
            success: data => {
                location.reload(true);
            },
            error: function(xhr, status, error) {
                console.log(status);
            }
        });
    }
});
$(document).on("change", ".js-attribute", function() {
    const _this = $(this);
    $.ajax({
        url: "/getAttributesValue",
        data: {
            attribute_id: _this.val()
        },
        method: "GET",
        dataType: "json",
        success: function(data) {
            if (!_this.is(":checked")) {
                _this
                    .closest("div")
                    .find("select")
                    .remove();
                _this
                    .closest("div")
                    .find(".Selects")
                    .remove();
                $("#color_attr").empty();
            } else {
                _this.closest("div").append(`
                    <select class="input_placeholder_style form-control st-attribute_add mt-3 other-attr" name="attribute[${data[0]["slug"]}][value][]" multiple id="st-attribute_select">
                        <option disabled>Выберите значение</option>
                    </select>
                `);
                data.forEach(element => {
                    _this.closest("div").find("select").append(`
                        <option value="${element["id"]}">${element["name"]}</option>
                    `);
                });
            }
        }
    });
});

$(document).on(
    "change",
    "input[name='cvet'], input[name='checkSvet']",
    function() {
        const val = $(this).val();
        const colors = $("#colors_input");
        if (this.checked) {
            if (colors.val().length < 1) {
                colors.val(colors.val() + val);
            } else {
                colors.val(colors.val() + "," + val);
            }
        } else {
            let array = colors.val().split(",");
            const index = array.indexOf(val);
            if (index > -1) {
                array.splice(index, 1);
            }
            colors.val(array);
        }
    }
);

$("body").on("change", "#cat_child", function() {
    const id = $("#cat_child option:selected").val();
    $.ajax({
        url: "/getAttributes",
        data: {
            category_id: id
        },
        method: "GET",
        dataType: "json",
        success: function(data) {
            $("#attributes").empty();
            if (data.length > 0) {
                if (data[0].at_id) {
                    data.forEach(element => {
                        $("#attributes").append(`
                        <div id="st-attribute_val" class="font-weight-semibold w-100 input_caption"></div>
                            <div class="form-check form-check w-75 p-0 attr__checkboxes mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-check-label bg-secondary px-3 text-capitalize py-1 text-white cursor-pointer">${element["at_name"]}:</label>
                                    <label for="${element["at_slug"]}Checkbox${element["at_id"]}" class="m-0 cursor-pointer"><img class="add__attr-icon" oncontextmenu="return false;" data-for-id="${element["at_slug"]}Checkbox${element["at_id"]}" src="/storage/theme/plus_add_attr.svg" /></label>
                                </div>
                                <input class="form-check-input js-attribute d-none" name="attribute[${element["at_slug"]}][id]" type="checkbox" id="${element["at_slug"]}Checkbox${element["at_id"]}" value="${element["at_id"]}">
                            </div>
                        `);
                    });
                }
            }
        }
    });
    $.ajax({
        url: "/getSubcategories",
        data: {
            category: id
        },
        method: "GET",
        dataType: "json",
        success: function(data) {
            if (data.hasOwnProperty("0")) {
                $("#cat_child").attr("name", "subcategory");
                $("#child_div").remove();
                $("#subCategories").append(`
                    <div id="child_div" class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                        <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                        <div class="w-75 input_placeholder_style input-group w-md-100">
                            <div class="input-group-prepend position-relative">
                                <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                            </div>
                            <select class="input_placeholder_style custom-select position-relative" id="grandchildren" name="category_id" required>
                                <option value="">Выберите под-категорию</option>
                            </select>
                            <small class="invalid-feedback">
                                Выберите под-категорию
                            </small>
                        </div>
                    </div>
                `);
                data.forEach(element => {
                    $("#grandchildren").append(`
                        <option value="${element["id"]}">${element["name"]}</option>
                    `);
                });
            } else {
                $("#cat_child").attr("name", "category_id");
                $("#child_div").remove();
            }
        }
    });
});

$(".select-color").on("click", function() {
    $(".product-colors label").removeClass("color-active");
    $(this).addClass("color-active");
});
$(".sizes .product-size").on("click", function() {
    $(".product-size").removeClass("text-danger");
    $(this).addClass("text-danger");
});
// search
$(".main-search").on("keyup keypress change", function() {
    let value = $(this).val();
    if (value.length > 0) {
        $(".clean__input").removeClass("d-none");
    } else {
        $(".clean__input").addClass("d-none");
    }
    if (value.length >= 3 && $(".main-search").is(":focus")) {
        $.ajax({
            url: "/livesearch",
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: {
                value
            },
            success: data => {
                if (
                    $(".main-search")[0].value != "" ||
                    $(".main-search")[0].value == null
                ) {
                    $(".search-result").show();
                    $(".search-result").html(data);
                }
            },
            error: function(xhr, status, error) {}
        });
    } else {
        $(".search-result").hide();
    }
});

$(".clean__input").on("click", function() {
    $(".main-search")[0].value = null;
    $(".search-result").hide();
    $(this).addClass("d-none");
});

/**
 * Search items
 */
$("body").on("keyup", "#search", function() {
    var search = $(this).val();
    var item = $(this).attr("data-item");
    $.get("/" + item, { search: search }, function(data) {
        if (data.posts.length > 0) {
            $("#" + item)
                .empty()
                .html(data.posts);
            $("#noneStore").empty();
            $(".endless-pagination").data("next-page", data.next_page);
        } else {
            $("#" + item).empty();
            $("#noneStore").html("По вашему запросу нечего не найдено");
        }
    });
});

$("#buyBtn").on("click", function(e) {
    var count = 0;
    var questions = $(".desktopAttrs");
    $(".selectedAttrs").empty();
    questions.each(function() {
        if (
            $(this)
                .find("input")
                .filter('[type="radio"]')
                .filter(":checked").length > 0
        ) {
            const attrValueName = $(this)
                .find("input")
                .filter('[type="radio"]')
                .filter(":checked")
                .closest("label")
                .text();
            const attrName = $(this)
                .find("input")
                .filter('[type="radio"]')
                .filter(":checked")
                .data("name");
            $(".selectedAttrs").append(`
                <h6 class="text">${attrName} ${attrValueName}</h6>
            `);
            count++;
        }
    });
    if (count >= questions.length) {
        $("#buyProduct").modal("show");
    } else {
        Toast.fire({
            toast: true,
            position: "top",
            icon: "error",
            title: "Выберите все параметры товара!"
        });
    }
});

$("#buyBtnMob").on("click", function(e) {
    var count = 0;
    var questions = $(".mobAttrs");
    $(".selectedAttrs").empty();
    questions.each(function() {
        if (
            $(this)
                .find("input")
                .filter('[type="radio"]')
                .filter(":checked").length > 0
        ) {
            const attrValueName = $(this)
                .find("input")
                .filter('[type="radio"]')
                .filter(":checked")
                .closest("label")
                .text();
            const attrName = $(this)
                .find("input")
                .filter('[type="radio"]')
                .filter(":checked")
                .data("name");
            $(".selectedAttrs").append(`
                <h6 class="text">${attrName} ${attrValueName}</h6>
            `);
            count++;
        }
    });
    if (count >= questions.length) {
        $("#buyProduct").modal("show");
    } else {
        Toast.fire({
            toast: true,
            position: "top",
            icon: "error",
            title: "Выберите все параметры товара!"
        });
    }
});

// orders add
$(".checkout-product").on("click", function() {
    let total_price = $(this)
        .closest("#buyProduct")
        .find(".total-price")
        .text();
    let address = $("#checkout_address").val();
    let quantity = $(this)
        .closest("#buyProduct")
        .find(".quantity-product")
        .text();
    let product_id = $(this)
        .closest("#buyProduct")
        .find(".checkout-id")
        .attr("data-id");
    let comment = $("#comment").val();
    let attributes = [];
    $("input[type=radio]:checked").each(function() {
        attributes.push($(this).val());
    });

    $.ajax({
        url: "/orders/store",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: {
            total_price,
            address,
            quantity,
            product_id,
            comment,
            attributes
        },
        success: data => {
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.log(status);
        }
    });
});

// favorite add
$(".favorite").on("click", function() {
    if ($(this).hasClass("active")) {
        var status = 0;
    } else {
        var status = 1;
    }

    const this_ = $(this);

    const product_id = $(this).attr("data-id");
    $.ajax({
        url: "/add_to_favorite",
        data: {
            product_id: product_id,
            status: status
        },
        method: "GET",
        dataType: "json",
        success: data => {
            this_.toggleClass("active");
        },
        error: function(xhr, status, error) {
            console.log(status);
        }
    });
});

// sms-confirm
$("#btn-login").on("click", function() {
    const phone = $("#phone").val();
    const code = $("#code").val();
    $(".wrong-code").hide();
    $.ajax({
        url: "/sms-confirmed",
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: {
            phone,
            code
        },
        success: data => {
            if (data == "true") {
                location.reload(true);
            } else if (data == "false") {
                $("#enter_site").modal("hide");
                $("#adressChange").modal("show");
            } else if (data == "wrong code") {
                $(".wrong-code").show();
            }
        },
        error: function(xhr, status, error) {
            console.log(status);
        }
    });
});

$("#sms-confirmed, #add_address").on("keyup keypress", function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
// sms-code
$("#send-code, .send-code").on("click", function() {
    $(this).attr("disabled", true);
    const phone = $("#phone").val();
    if (phone.replace(/\s/g, "").length == 9) {
        $("#phone")
            .closest(".btn-group-fs")
            .find(".btn-custom-fs")
            .attr("style", "background-color: #e9ecef;");
        $("#phone").attr("disabled", true);
        $(".wrong-phone-number").hide();

        $.ajax({
            url: "/sms-send",
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: {
                phone
            },
            success: data => {
                $("#btn-login").prop("disabled", false);
                $("#send-code").hide();
                $(".enter-code").show();
                $(".sms--true").show();
                $(".sms--false").hide();
                if (data == 1) {
                    $("#adressChange").remove();
                }
                var fiveMinutes = 6 * 10,
                    display = document.querySelector("#count-down");
                return startTimer(fiveMinutes, display);
            },
            error: function(xhr, status, error) {
                console.log(status);
            }
        });
    } else {
        $(".wrong-phone-number").show();
        $(this).attr("disabled", false);
    }
});

function startTimer(duration, display) {
    var timer = duration,
        minutes,
        seconds;
    var time = setInterval(() => {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
            $(".sms--true").hide();
            $(".sms--false").show();
            $(".change-number").show();
            clearInterval(time);
            $("#btn-login").prop("disabled", true);
        }
    }, 1000);
}
$(".change-number").on("click", function() {
    location.reload(true);
});
$(".favorite").on("click", function() {
    if ($(this).hasClass("active")) {
        $(".activeSaved")
            .find(".text-sucsess")
            .text("Вы убрали товар из избранного !");
    } else {
        $(".activeSaved")
            .find(".text-sucsess")
            .text("Вы добавили товар в избранное !");
    }
    setTimeout(() => {
        $(".activeSaved").modal("hide");
    }, 1000);
});

// single preview
function avatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            if (input.files && input.files[0]) {
                new Compressor(input.files[0], {
                    quality: 0.8,
                    maxWidth: 700,
                    maxHeight: 700,
                    minWidth: 700,
                    minHeight: 700,
                    height: 700,
                    width: 700,
                    success(result) {
                        const reader = new FileReader();

                        reader.onload = ev => {
                            const src = ev.target.result;
                            $("#avatar-poster").attr("src", src);
                        };
                        reader.readAsDataURL(result);
                    },
                    error(err) {
                        console.log(err.message);
                    }
                });
            }
            $("#avatar-poster-mobile").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function cover(input) {
    if (input.files && input.files[0]) {
        new Compressor(input.files[0], {
            quality: 0.8,
            maxWidth: 700,
            maxHeight: 700,
            minWidth: 700,
            minHeight: 700,
            height: 700,
            width: 700,
            success(result) {
                const reader = new FileReader();

                reader.onload = ev => {
                    const src = ev.target.result;
                    $("#cover-poster-mobile").attr("src", src);
                };
                reader.readAsDataURL(result);
            },
            error(err) {
                console.log(err.message);
            }
        });
    }
    // if (input.files && input.files[0]) {
    //     var reader = new FileReader()

    //     reader.onload = function(e) {
    //         $('#cover-poster-mobile').attr('src', e.target.result)
    //     }

    //     reader.readAsDataURL(input.files[0])
    // }
}
$("#image").change(function() {
    if ($(this).val() != "") {
        $(".image-validate").addClass("d-none");
    } else {
        $("#main-poster").addClass("border-danger");
        $(".image-validate").removeClass("d-none");
    }
});

$("#avatar").change(function() {
    avatar(this);
});

$("#cover").change(function() {
    cover(this);
});
/* iteration number */

//gets the input by element Id, gets min, max, and step from the markup. Gets the subtract and add buttons either by optional classnames, or by the next or last element sibling.
var NumberSpinner = function(elemId, subtractClassName, addClassName) {
    "use strict";
    var spinnerInput = document.getElementById(elemId);
    var btnSubtract =
        document.querySelector(addClassName) ||
        spinnerInput.previousElementSibling;
    var btnAdd =
        document.querySelector(subtractClassName) ||
        spinnerInput.nextElementSibling;
    var minLimit, maxLimit, step;

    function init() {
        (minLimit = makeNumber(getAttribute(spinnerInput, "min")) || 0),
            (maxLimit = makeNumber(getAttribute(spinnerInput, "max")) || false),
            (step = makeNumber(getAttribute(spinnerInput, "step") || "1"));

        btnSubtract.addEventListener("click", changeSpinner, false);
        btnAdd.addEventListener("click", changeSpinner, false);
        btnSubtract.addEventListener("keyup", keySpinner, false);
        btnAdd.addEventListener("keyup", keySpinner, false);
        if (supportsTouch()) {
            btnSubtract.addEventListener("touchend", removeClickDelay, false);
            btnAdd.addEventListener("touchend", removeClickDelay, false);
        }
        if (supportsPointer()) {
            btnSubtract.addEventListener("pointerup", removeClickDelay, false);
            btnAdd.addEventListener("pointerup", removeClickDelay, false);
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
        if (direction === "add") {
            spinnerInput.value =
                num + step <= maxLimit ? num + step : spinnerInput.value;
        } else if (direction === "subtract") {
            spinnerInput.value =
                num - step >= minLimit ? num - step : spinnerInput.value;
        }
    }

    function getAttribute(el, attr) {
        var hasGetAttr = (el.getAttribute && el.getAttribute(attr)) || null;
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
        return "ontouchstart" in window;
    }

    function supportsPointer() {
        return "pointerdown" in window;
    }
    /* Keyboard support */
    function keySpinner(e) {
        switch (e.keyCode) {
            case 40:
            case 37: // Down, Left
                update("subtract");
                btnSubtract.focus();
                break;
            case 38:
            case 39: // Top, Right
                update("add");
                btnAdd.focus();
                break;
        }
    }

    function changeSpinner(e) {
        e.preventDefault();
        var increment = getAttribute(e.target, "data-type");
        update(increment);
    }
    init();
};

NumberSpinner(
    "spinner-input",
    "js-spinner-horizontal-subtract",
    "js-spinner-horizontal-add"
);

var product_price = $("#price").text();
$(".spinner__button").on("click", function() {
    let count = $("#spinner-input").val();
    let res = parseInt(product_price * count);
    $(".total-price, .price").text(res);
    $(".quantity-product").text(count);
});
$("#spinner-input").on("change", function() {
    let count = $(this).val();
    let res = parseInt(product_price * count);
    $(".total-price, .price").text(res);
    $(".quantity-product").text(count);
});
$("body").on("click", ".change-address", function() {
    $("#checkout_address").prop("disabled", false);
    $("#checkout_address").focus();
});

///product picture on hover change
$(document).ready(function() {
    $(".add-product-secondary .pic-item").on("click", function() {
        let imgSrc = $(this).attr("data-image-src");
        $(".pic-main").attr("src", imgSrc);
        $(".add-product-secondary .pic-item").removeClass("pic-item-active");
        $(this).addClass("pic-item-active");
    });

    $("body").on("click", ".delete-product", function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: "Вы действительно хотите удалить товар?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Да",
            cancelButtonText: "Нет",
            customClass: {
                confirmButton: "bg-danger"
            },
            buttons: true,
            dangerMode: true
        }).then(result => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    $("body").on("click", ".restore-product", function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: "Вы действительно хотите восстановить товар?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Да",
            cancelButtonText: "Нет",
            customClass: {
                confirmButton: "bg-success"
            },
            buttons: true,
            dangerMode: true
        }).then(result => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
