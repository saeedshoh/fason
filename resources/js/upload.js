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
    const open = document.createElement('IMG');
    open.setAttribute('src', '/storage/theme/icons/add_prod-secondary.svg');
    input.insertAdjacentElement('afterend', open);
    input.insertAdjacentElement('afterend', preview);

    if (document.getElementById('db-preview-image').dataset.edit == 'true') {
        const els = document.querySelectorAll('.preview-image');
        preview.insertAdjacentElement('afterbegin', open);
        els.forEach(el => preview.insertAdjacentElement('afterbegin', el));
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
                        <div class="preview-image col-3">
                        <div class="profile-pic">
                            <img src="${src}" alt="${result.name}" class="preview-element-image border-gray rounded shadow"/>
                            <div class="deleteImage text-white" data-name="${result.name}">&times;</div>
                        </div>
                        </div>`
                        );
                        let imageList = document.querySelectorAll('.preview-image');

                        imageList.forEach((el, index) => index > 6 ? el.remove() : '');

                        if(document.querySelectorAll('.preview-image').length <= 6) {
                            preview.insertAdjacentElement('beforeend', open);
                            open.classList.add('col-3');
                            open.classList.add('trigger-insert');
                        } else {
                            open.remove();
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
            if(document.querySelectorAll('.preview-image').length <= 7) {
                preview.insertAdjacentElement('beforeend', open);
                open.classList.add('col-3');
                open.classList.add('trigger-insert');
            }
        }, 300);
    };

    open.addEventListener('click', triggerInput);
    input.addEventListener('change', changeHandler);
    preview.addEventListener('click', removeHandler);
}

$(document).on('click', '.add-product-btn', function() {
    if($('#name').val() != '' && $('#description').val() != '' && $('#quantity').val() != '' && $('select[name="category_id"]').val() != '' && $('#price').val() != '') {
        var formData = new FormData();
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
            // console.log(attributes);
        }
        const image = $('#main-poster').attr('src');
        const query_url =
            check_page == 'true' ? `/products/edit/test/${product_id}` : '/product/store/test';
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
                    // $('.main-content .dashboard').closest('body').append(`<div class="success-preloader"><img src="/storage/Spinner-1s-200px.svg" alt="" srcset=""></div>`);
                    // $('.success-preloader').removeClass('d-none');
                },
                success: data => {
                    // console.log(window.location.href.indexOf('/dashboard/products/') > -1);
                    if(window.location.href.indexOf('/dashboard/products/') > -1) {
                        window.location.href='/dashboard/products';
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
                } и проходит модерацию </h5><a class="rounded-11 btn btn-outline-danger mt-4" href="/">На главную</a></div></div>`
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
                <span class="d-flex align-items-center"><svg class="mr-1" width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.003 512.003" style="enable-background:new 0 0 512.003 512.003;" xml:space="preserve">
                <g>
                    <g>
                        <path d="M477.958,262.633c-2.06-4.215-2.06-9.049,0-13.263l19.096-39.065c10.632-21.751,2.208-47.676-19.178-59.023l-38.41-20.38    c-4.144-2.198-6.985-6.11-7.796-10.729l-7.512-42.829c-4.183-23.846-26.241-39.87-50.208-36.479l-43.053,6.09    c-4.647,0.656-9.242-0.838-12.613-4.099l-31.251-30.232c-17.401-16.834-44.661-16.835-62.061,0L193.72,42.859    c-3.372,3.262-7.967,4.753-12.613,4.099l-43.053-6.09c-23.975-3.393-46.025,12.633-50.208,36.479l-7.512,42.827    c-0.811,4.62-3.652,8.531-7.795,10.73l-38.41,20.38c-21.386,11.346-29.81,37.273-19.178,59.024l19.095,39.064    c2.06,4.215,2.06,9.049,0,13.263l-19.096,39.064c-10.632,21.751-2.208,47.676,19.178,59.023l38.41,20.38    c4.144,2.198,6.985,6.11,7.796,10.729l7.512,42.829c3.808,21.708,22.422,36.932,43.815,36.93c2.107,0,4.245-0.148,6.394-0.452    l43.053-6.09c4.643-0.659,9.241,0.838,12.613,4.099l31.251,30.232c8.702,8.418,19.864,12.626,31.03,12.625    c11.163-0.001,22.332-4.209,31.03-12.625l31.252-30.232c3.372-3.261,7.968-4.751,12.613-4.099l43.053,6.09    c23.978,3.392,46.025-12.633,50.208-36.479l7.513-42.827c0.811-4.62,3.652-8.531,7.795-10.73l38.41-20.38    c21.386-11.346,29.81-37.273,19.178-59.024L477.958,262.633z M464.035,334.635l-38.41,20.38    c-12.246,6.499-20.645,18.057-23.04,31.713l-7.512,42.828c-1.415,8.068-8.874,13.487-16.987,12.342l-43.053-6.09    c-13.73-1.945-27.316,2.474-37.281,12.113L266.5,478.152c-5.886,5.694-15.109,5.694-20.997,0l-31.251-30.232    c-8.422-8.147-19.432-12.562-30.926-12.562c-2.106,0-4.229,0.148-6.355,0.449l-43.053,6.09    c-8.106,1.146-15.571-4.274-16.987-12.342l-7.513-42.829c-2.396-13.656-10.794-25.215-23.041-31.712l-38.41-20.38    c-7.236-3.839-10.086-12.61-6.489-19.969l19.096-39.065c6.088-12.456,6.088-26.742,0-39.198l-19.096-39.065    c-3.597-7.359-0.747-16.13,6.489-19.969l38.41-20.38c12.246-6.499,20.645-18.057,23.04-31.713l7.512-42.828    c1.416-8.068,8.874-13.488,16.987-12.342l43.053,6.09c13.725,1.943,27.316-2.474,37.281-12.113l31.252-30.232    c5.886-5.694,15.109-5.694,20.997,0l31.251,30.232c9.965,9.64,23.554,14.056,37.281,12.113l43.053-6.09    c8.107-1.147,15.572,4.274,16.987,12.342l7.512,42.829c2.396,13.656,10.794,25.215,23.041,31.712l38.41,20.38    c7.236,3.839,10.086,12.61,6.489,19.969l-19.096,39.064c-6.088,12.455-6.088,26.743,0,39.198l19.096,39.064    C474.121,322.024,471.271,330.796,464.035,334.635z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M363.886,148.116c-5.765-5.766-15.115-5.766-20.881,0L148.116,343.006c-5.766,5.766-5.766,15.115,0,20.881    c2.883,2.883,6.662,4.325,10.44,4.325c3.778,0,7.558-1.441,10.44-4.325l194.889-194.889    C369.653,163.231,369.653,153.883,363.886,148.116z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M196.941,123.116c-29.852,0-54.139,24.287-54.139,54.139s24.287,54.139,54.139,54.139s54.139-24.287,54.139-54.139    S226.793,123.116,196.941,123.116z M196.941,201.863c-13.569,0-24.608-11.039-24.608-24.609c0-13.569,11.039-24.608,24.608-24.608    c13.569,0,24.609,11.039,24.609,24.608C221.549,190.824,210.51,201.863,196.941,201.863z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M315.061,280.61c-29.852,0-54.139,24.287-54.139,54.139s24.287,54.139,54.139,54.139    c29.852,0,54.139-24.287,54.139-54.139S344.913,280.61,315.061,280.61z M315.061,359.357c-13.569,0-24.609-11.039-24.609-24.608    s11.039-24.608,24.609-24.608c13.569,0,24.608,11.039,24.608,24.608S328.63,359.357,315.061,359.357z"/>
                    </g>
                </g>
                </svg><span>Комиссия fason.tj: ${total-price}</span></span>
                <span class="d-flex align-items-center"><svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <g>
                        <path d="M493.297,159.693c-12.477-30.878-31.231-59.828-56.199-84.792c-24.964-24.967-53.914-43.722-84.792-56.199    C321.426,6.222,288.617,0,255.824,0c-32.748,0-65.497,6.249-96.315,18.744c-30.814,12.49-59.695,31.242-84.607,56.158    c-24.915,24.911-43.668,53.792-56.158,84.607C6.25,190.324,0.001,223.072,0.001,255.821c0,32.795,6.222,65.604,18.701,96.485    c12.477,30.878,31.231,59.829,56.199,84.793c24.964,24.967,53.914,43.722,84.792,56.199c30.882,12.48,63.69,18.701,96.484,18.703    c32.748,0,65.497-6.249,96.315-18.743c30.814-12.49,59.695-31.242,84.607-56.158c24.915-24.912,43.668-53.793,56.158-84.608    c12.494-30.817,18.743-63.565,18.744-96.315C511.999,223.383,505.778,190.575,493.297,159.693z M461.612,339.661    c-10.821,26.683-27.018,51.648-48.659,73.292c-21.643,21.64-46.608,37.837-73.291,48.659    c-26.679,10.818-55.078,16.241-83.484,16.241c-28.477,0-56.947-5.406-83.688-16.214c-26.744-10.813-51.76-27.008-73.441-48.685    c-21.679-21.682-37.874-46.697-48.685-73.442c-10.808-26.741-16.214-55.212-16.213-83.689    c-0.002-28.406,5.422-56.804,16.239-83.483c10.821-26.683,27.018-51.648,48.659-73.291c21.643-21.64,46.608-37.837,73.292-48.659    c26.679-10.818,55.078-16.241,83.484-16.241c28.477,0,56.947,5.405,83.688,16.214c26.744,10.813,51.76,27.007,73.441,48.685    c21.679,21.682,37.873,46.697,48.685,73.441c10.808,26.741,16.214,55.211,16.214,83.688    C477.853,284.583,472.43,312.981,461.612,339.661z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M356.24,183.605c9.227,0,16.707-7.48,16.707-16.707v-33.412c0-4.399-1.782-8.703-4.893-11.814s-7.414-4.893-11.814-4.893    H155.761c-6.445,0-12.337,3.728-15.097,9.552c-2.76,5.825-1.915,12.745,2.167,17.734L234.415,256l-91.583,111.937    c-4.082,4.987-4.927,11.909-2.167,17.734c2.76,5.825,8.652,9.552,15.097,9.552H356.24c4.399,0,8.702-1.782,11.814-4.893    s4.893-7.414,4.893-11.814v-33.413c0-9.227-7.48-16.707-16.707-16.707s-16.707,7.48-16.707,16.707v16.707H191.016l77.915-95.229    c5.047-6.168,5.047-14.991,0-21.158l-77.915-95.229h148.517v16.706C339.534,176.124,347.014,183.605,356.24,183.605z"/>
                    </g>
                </g>
                </svg><span>Итого: ${total}</span></span>
                `)
                console.log(price);
            },
            error: function(xhr, status, error) {
                console.log(status)
            }
        });
    }
}, 500))
