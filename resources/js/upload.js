import Compressor from 'compressorjs';
import { throttle } from 'lodash';

const element = (tag, classes = [], content) => {
    const node = document.createElement(tag);
    if (classes.length) {
        node.classList.add(...classes);
    }
    if (content) {
        node.textContent = content;
    }
    return node;
};

export function upload(selector, options = {}) {
    let files = [];
    const input = document.querySelector(selector);
    const preview = element('div', ['preview', 'row']);

    const opendiv = document.createElement('div');
    opendiv.setAttribute('class', 'preview-image col-3 col-lg-4 col-xl-3');
    const open = document.createElement('img');
    open.setAttribute('src', '/storage/theme/icons/add_prod-secondary.svg');
    open.setAttribute('onContextMenu','return false;');
    open.style.height = '90px';
    open.style.width = '100%';
    open.style.backgroundColor = 'transparent';

    opendiv.appendChild(open);

    input.insertAdjacentElement('afterend', opendiv);
    input.insertAdjacentElement('afterend', preview);

    if (document.getElementById('db-preview-image').dataset.edit == 'true') {
        const els = document.querySelectorAll('.preview-image');
        preview.insertAdjacentElement('afterbegin', opendiv);
        els.forEach(el => preview.insertAdjacentElement('afterbegin', el));
        if(els.length >= 7){
            els[7].remove
        }
    }

    if (options.multi) {
        input.setAttribute('multiple', true);
    }

    if (options.accept && Array.isArray(options.accept)) {
        input.setAttribute('accept', options.accept.join(','));
    }
    const triggerInput = () => input.click();

    const changeHandler = event => {
        if (!event.target.files.length) {
            return;
        }


        files = Array.from(event.target.files);
        // preview.innerHTML = '';
        console.log(files);

        files.forEach(file => {
            if (!file.type.match('image')) {
                return;
            }
            new Compressor(file, {
                strict: false,
                checkOrientation: false,
                quality: 1,
                maxWidth: 700,
                maxHeight: 700,
                minWidth: 700,
                minHeight: 700,
                height: 700,
                width: 700,
                // beforeDraw(context, canvas) {
                //   console.log(context);

                //   canvas.width = 700;
                //   canvas.height = 700;
                //   context.fillStyle = '#fff';

                //   context.fillRect(0, 0, canvas.width, canvas.height);

                // },
                // drew(context, canvas) {

                //   var base_image = new Image();
                //   base_image.src = '/storage/watermark.svg';

                //   context.drawImage(base_image, canvas.width - 230, canvas.height - 80);
                // },
                success(result) {
                    const reader = new FileReader();

                    reader.onload = ev => {
                        const src = ev.target.result;
                        preview.insertAdjacentHTML(
                            'beforeend',
                            `
                        <div class="preview-image col-3 col-lg-4 col-xl-3">
                            <div class="profile-pic h-100">
                                <img src="${src}" alt="${result.name}" class="preview-element-image border-gray rounded shadow"/>
                                <div class="deleteImage text-white" data-name="${result.name}">&times;</div>
                            </div>
                        </div>`
                        );
                        let imageList = document.querySelectorAll('.preview-image');

                        imageList.forEach((el, index) => index > 7 ? el.remove() : '');
                        if(document.querySelectorAll('.preview-image').length <= 7) {
                            preview.insertAdjacentElement('beforeend', opendiv);
                            open.classList.add('trigger-insert');
                        } else {
                            open.remove();
                            document.querySelectorAll('.preview-image')[6].remove()
                        }
                    };
                    reader.readAsDataURL(result);
                },
                error(err) {
                    console.log(err.message);
                }
            });
        });


    };

    const removeHandler = event => {
        if (!event.target.dataset.name) {
            return;
        }
        if (files.length <= 7) {
            open.classList.remove('d-none');
        }

        const { name } = event.target.dataset;
        files = files.filter(file => file.name !== name);

        const block = preview.querySelector(`[data-name="${name}"]`).closest('.preview-image');
        block.classList.add('removing');
        setTimeout(() => {
            block.remove()
            if(document.querySelectorAll('.preview-image').length <= 8) {
                preview.insertAdjacentElement('beforeend', opendiv);
                opendiv.append(open)
                open.classList.add('trigger-insert');
            }
        }, 300);
    };

    open.addEventListener('click', triggerInput);
    input.addEventListener('change', changeHandler);
    preview.addEventListener('click', removeHandler);
}

$(document).on('click', '.add-product-btn', function() {
    if($('#name').val() != '' && $('#description').val() != '' && $('#quantity').val() != '' && $('select[name="category_id"]').val() != '' && $('#price').val() != '' && ($('#main-poster').attr('src').includes('data:image') || $('#main-poster').attr('src') != '/storage/theme/icons/add_product_plus.svg')) {
        var return_page = $(this).data('previous');
        var formData = new FormData();
        var store_name = $(this).data('store');
        const check_page = document.getElementById('db-preview-image').dataset.edit;

        const product_id = $(this)
            .closest('form')
            .find('input[name="product_id"]')
            .val();

        const cat_id = $(this)
            .closest('form')
            .find('select[name="category_id"]:last')
            .val();
        const name = $(this)
            .closest('form')
            .find('input[name="name"]')
            .val();
        const description = $(this)
            .closest('form')
            .find('textarea[name="description"]')
            .val();
        const quantity = $(this)
            .closest('form')
            .find('input[name="quantity"]')
            .val();
        const price = $(this)
            .closest('form')
            .find('input[name="price"]')
            .val();
        const store_id = $(this)
            .closest('form')
            .find('*[name="store_id"]')
            .val();
        var attributes = [];
        if($('#attributes').children()){
            const values = $('#attributes').children();
            values.each(function(){
                var item = {}
                if($(this).find('select').val()) {
                    item['id'] = $(this).find('input').val()
                    item['attribute_values'] = $(this).find('select').val()
                }
                else {
                    var colors = $(this).find('.Selects').children()
                    var color_vals = []
                    colors.each(function(){
                        if($(this).find('input:checked').val()){
                            color_vals.push($(this).find('input:checked').val())
                        }
                    })
                    item['id'] = $(this).find('input').val()
                    item['attribute_values'] = color_vals
                }
                attributes.push(item)
            })
        }
        const dashboard = window.location.pathname.indexOf('dashboard') == -1 ? false : true;
        const image = $('#main-poster').attr('src');
        const query_url =
            check_page == 'true' ? (dashboard ? `dashboard` : ``) + `/products/edit/test/${product_id}` : (dashboard ? `dashboard` : ``) + '/product/store/test';
        let gallery = $('.preview-element-image');
        let galleries = [];
        let itemsProcessed = 0;
        if (gallery.length > 0) {
            Array.from(gallery).forEach((item, index, array) => {
                galleries.push(item.src);
                itemsProcessed++;

                if (itemsProcessed === array.length) {
                    callback();
                }
            });
        } else {
            callback();
        }

        function callback() {
            formData.append('_token', $('meta[name=csrf-token]').attr('content'));
            formData.append('_method', $('input[name=_method]').val());
            formData.append('cat_id', cat_id);
            formData.append('name', name);
            formData.append('description', description);
            formData.append('quantity', quantity);
            formData.append('price', price);
            formData.append('store_id', store_id);
            formData.append('image', image);
            formData.append('attribute', JSON.stringify(attributes));
            formData.append('gallery', JSON.stringify(galleries));
            $.ajax({
                url: query_url,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                data: formData,
                beforeSend: function() {
                    $('.main-content .dashboard').closest('body').append(`<div class="success-preloader"><img src="/storage/Spinner-1s-200px.svg" alt="" srcset=""></div>`);
                    $('.success-preloader').removeClass('d-none');
                },
                success: data => {
                    // console.log(window.location.href.indexOf('/dashboard/products/') > -1);
                    if(window.location.href.indexOf('/dashboard/products/') > -1) {
                        window.location.href=return_page;
                        $('.tab-content').prepend(`<div class="alert alert-success">Товар успешно добавлен/изменен!</div>`);
                        // <div class="alert alert-success">Товар успешно добавлен/изменен!</div>
                    }
                    // $('.main-content .dashboard').closest('body').addClass('d-flex align-items-center bg-auth border-top border-top-2 border-primary').empty()
                    // .html(
                    //     `<div class="container">
                    //     <div class="row justify-content-center">
                    //       <div class="col-12 col-md-6 col-xl-6 my-5">
                    //         <div class="text-center">
                    //           <h6 class="text-uppercase text-muted mb-4">
                    //           Товар ${
                    //             check_page == 'true' ? 'обновлен' : 'добавлен'
                    //           }
                    //           </h6>
                    //           <h1 class="display-4 mb-3">
                    //           Товар успешно ${
                    //             check_page == 'true' ? 'обновлен' : 'добавлен'
                    //           } и проходит модерацию  ${
                    //             check_page == 'true' ? '😁' : '😊'
                    //           }
                    //           </h1>
                    //           <p class="text-muted mb-4">
                    //             Хотите вернуться в админку
                    //           </p>
                    //           <a href="/dashboard/products" class="btn btn-lg btn-primary">
                    //             Вернуться назад
                    //           </a>

                    //         </div>

                    //       </div>
                    //     </div> <!-- / .row -->
                    //   </div>`
                    // );
                    $('.content .container:eq(0)')
                        .addClass('bg-white')
                        .empty()
                        .html(
                            `<div class="mt-lg-5 py-lg-5 py-3 text-center"><img class="mb-5" src="/storage/theme/thanks.svg" width="180px" alt=""><div class="mb-3 pb-lg-0"><h5>Товар успешно ${
                  check_page == 'true' ? 'обновлен' : 'добавлен'
                } и проходит модерацию </h5><a class="rounded-11 btn btn-outline-danger mt-4" href="/store/${store_name}/show">Вернуться в магазин</a></div></div>`
                        );
                },
                error: function(xhr, status, error) {
                    console.log(status);
                },
                complete: function() {
                    $('.success-preloader').remove();
                }
            });
        }
    }
    else {
        $(this).closest('form').addClass('was-validated')
    }

});

function readURL(input) {
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
                    $('#main-poster').attr('src', src);
                };
                reader.readAsDataURL(result);
            },
            error(err) {
                console.log(err.message);
            }
        });
    }
}

$('#image').change(function() {
    if ($(this).val() != '') {
        $('#main-poster').removeClass('border-danger')
    }
    else {
     $('#main-poster').addClass('border-danger');
    }

    readURL(this);
});

$('#profile_photo_path').change(function() {
    readURL(this)
})

$('body').on('keyup', '#price', throttle(function(){
    if($(this).val() == '' || $(this).val() == '0'){
        $('.append-div').empty();
    }
    if($('select[name="category_id"]').val() != '' && $('#price').val() != '' && $(this).val() != '0'){
        var category_id = $('select[name="category_id"]:last').val();
        var store_id = $('*[name="store_id"]').val();
        var price = $(this).val();
        $.ajax({
            url: '/monetization_price',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                price,
                store_id,
                category_id
            },
            success: total => {
                $('.append-div').empty().append(`
                <div class="d-flex align-items-center w-100 justify-content-between mb-2"><span>Комиссия fason.tj:</span><span class="font-weight-bold">${total-price}</span></div>
                <div class="d-flex align-items-center w-100 justify-content-between"><span>Итого:</span><span class="font-weight-bold">${total}</span></div>
                `)
                console.log(price);
            },
            error: function(xhr, status, error) {
                console.log(status)
            }
        });
    }
}, 500))

$(document).on('click', '#storeSubmit', function(e){
    e.preventDefault();
    if($('input[name="name"]').val() != '' && $('input[name="address').val() != '' && $('textarea[name="description"]').val() != '' && $('input[name="city_id"]').val() != '') {
        var formData = new FormData();
        const name = $(this)
            .closest('form')
            .find('input[name="name"]')
            .val();
        const address = $(this)
            .closest('form')
            .find('input[name="address"]')
            .val();
        const description = $(this)
            .closest('form')
            .find('textarea[name="description"]')
            .val();
        const city_id = $(this)
            .closest('form')
            .find('input[name="city_id"]')
            .val();
        const avatar = $('#avatar-poster').attr('src');
        const cover = $('#cover-poster-mobile').attr('src');

        formData.append('_token', $('meta[name=csrf-token]').attr('content'));
        formData.append('_method', $('input[name=_method]').val());
        formData.append('name', name);
        formData.append('address', address);
        formData.append('description', description);
        formData.append('city_id', city_id);
        formData.append('avatar', avatar);
        formData.append('cover', cover);
        $.ajax({
            url: `/store/store`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function() {
                $('.success-preloader').removeClass('d-none');
            },
            success: () => {
                window.location.href='/';
                $('.content .container:eq(0)')
                    .addClass('bg-white')
                    .empty()
                    .html(
                        `<div class="mt-lg-5 py-lg-5 py-3 text-center">
                            <img class="mb-5" src="/storage/theme/thanks.svg" width="180px" alt="">
                            <div class="mb-3 pb-lg-0">
                                <h5>Товар успешно ${ check_page == 'true' ? 'обновлен' : 'добавлен' } и проходит модерацию </h5>
                                <a class="rounded-11 btn btn-outline-danger mt-4" href="/">На главную</a>
                            </div>
                        </div>`
                    );
            },
            error: function(status) {
                console.log(status);
            },
            complete: function() {
                $('.success-preloader').remove();
            }
        });
    } else {
        $(this).closest('form').addClass('was-validated')
    }
})

$(document).on('click', '#storeEditSubmit', function(e){
    e.preventDefault();
    var id = $(this).data('id')
    if($('input[name="name"]').val() != '' && $('input[name="address').val() != '' && $('textarea[name="description"]').val() != '' && $('input[name="city_id"]').val() != '') {
        var formData = new FormData();
        const name = $('input[name="name"]').val();
        const address = $('input[name="address"]').val();
        const description = $('textarea[name="description"]').val();
        const city_id = $('input[name="city_id"]:checked').val();
        const avatar = $('#avatar-poster').attr('src');
        const cover = $('#cover-poster-mobile').attr('src');
        const dashboard = window.location.pathname.indexOf('dashboard') == -1 ? false : true;

        formData.append('_token', $('meta[name=csrf-token]').attr('content'));
        formData.append('_method', $('input[name=_method]').val());
        formData.append('name', name);
        formData.append('address', address);
        formData.append('description', description);
        formData.append('city_id', city_id);
        formData.append('avatar', avatar);
        formData.append('cover', cover);
        $.ajax({
            url: (dashboard ? `/dashboard` : ``) + `/store/update/${id}`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function() {
                $('.success-preloader').removeClass('d-none');
            },
            success: data => {
                if(data.where == 'website'){
                    window.location.href = `/moderation/${data.parameter}`;
                } else {
                    window.location.href = data.parameter;
                }
            },
            error: function(status) {
                console.log(status);
            },
            complete: function() {
                $('.success-preloader').remove();
            }
        });
    } else {
        $('#update-store').addClass('was-validated')
    }
})

$(document).on('click', '#profileUpdate', function(e){
    e.preventDefault();
    var id = $(this).data('id')
    if($('input[name="city_id').val() != '' && $('input[name="name"]').val() != '' && $('input[name="address"]').val() != '') {
        var formData = new FormData();
        const avatar = $('#avatar-poster').attr('src');
        const city_id = $('input[name="city_id"]:checked').val();
        const name = $('input[name="name"]').val();
        const address = $('input[name="address"]').val();

        formData.append('_token', $('meta[name=csrf-token]').attr('content'));
        formData.append('_method', $('input[name=_method]').val());
        formData.append('avatar', avatar);
        formData.append('city_id', city_id);
        formData.append('name', name);
        formData.append('address', address);

        $.ajax({
            url: `/profile/update`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function() {
                $('.success-preloader').removeClass('d-none');
            },
            success: () => {
                location.reload();
            },
            error: function(status) {
                console.log(status);
            },
            complete: function() {
                $('.success-preloader').remove();
            }
        });
    } else {
        $('#editProfile').addClass('was-validated')
    }
})
