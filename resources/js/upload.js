import Compressor from 'compressorjs';

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
    open.setAttribute('src', '/storage/theme/avatar_gallery.svg');
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
        if(event.target.files.length > 6) {
            alert("Вы можете загрузить только 7 фотографии для галереи");
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
                quality: 0.8,
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
                        <div class="preview-image col-3 border-gray">
                        <div class="profile-pic">
                            <img src="${src}" alt="${result.name}" class="preview-element-image"/>
                            <div class="deleteImage text-white" data-name="${result.name}">&times;</div>
                        </div>
                        </div>`
                        );
                        if(document.querySelectorAll('.preview-image').length <= 7) {
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
        if (files.length <= 8) {
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
    if(document.querySelectorAll('.preview-image').length > 7) {
        alert("Вы можете загрузить только 7 фотографии для галереи");
    } 
    else if($('#image').val() != '') {
        var formData = new FormData();
        const check_page = document.getElementById('db-preview-image').dataset.edit;

        const product_id = $(this)
            .closest('form')
            .find('input[name="product_id"]')
            .val();

        const cat_id = $(this)
            .closest('form')
            .find('select[name="category_id"]')
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
            .find('input[name="store_id"]')
            .val();

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
                    $('.success-preloader').removeClass('d-none');
                },
                success: data => {
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
    } else {
        $('#main-poster').addClass('border-danger');
        $('.image-validate').removeClass('d-none');
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
    if ($(this).val() != '')
        $('#main-poster')
        .removeClass('border-danger')
        .addClass('border-success');
    else $('#main-poster').addClass('border-danger');

    readURL(this);
});