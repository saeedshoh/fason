import Compressor from 'compressorjs';

function bytesToSize(bytes) {
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) {
        return '0 Byte';
    }
    const i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

const element = (tag, classes = [], content) => {
    const node = document.createElement(tag)
    if (classes.length) {
        node.classList.add(...classes)
    }
    if (content) {
        node.textContent = content
    }
    return node
}
var formData = new FormData();

export function upload(selector, options = {}) {
    let files = [];
    const input = document.querySelector(selector);
    const preview = element('div', ['preview', 'row']);
    const open = document.createElement("IMG");
    open.setAttribute("src", "/storage/theme/avatar_gallery.svg");
    input.insertAdjacentElement('afterend', preview)
    input.insertAdjacentElement('afterend', open)
    if (options.multi) {
        input.setAttribute('multiple', true);
    }

    if (options.accept && Array.isArray(options.accept)) {
        input.setAttribute('accept', options.accept.join(','));

    }
    const triggerInput = () => input.click();

    const changeHandler = event => {

        if (!event.target.files.length) {
            return
        }

        files = Array.from(event.target.files)
        // preview.innerHTML = '';

        files.forEach(file => {
            if (!file.type.match('image')) {
                return
            }
            
            new Compressor(file, {
              
                quality: 0.8,
                maxWidth: 700,
                maxHeight: 700,
                minWidth: 700,
                minHeight: 700,
                height: 700,
                width: 700,
                beforeDraw(context, canvas) {
                    context.fillStyle = '#fff';
                    context.fillRect(0, 0, canvas.width, canvas.height);        
                    context.filter = 'grayscale(100%)';

                    // context.font = '2rem serif';
                    // base_image.onload = function(){
                    //     context.drawImage(base_image, 0, 0);
                    //   }
                    // context.fillText('Fason.tj', canvas.width - 130, canvas.height - 20,);
                }, drew(context, canvas) {
                    let base_image = new Image();
                    base_image.src = '/storage/watermark.svg';
                
                    context.drawImage(base_image, canvas.width - 230, canvas.height - 80);
                    
                },
                
                success(result) {
                    
                    console.log(result);
                    const reader = new FileReader()

                    reader.onload = ev => {
                        const src = ev.target.result;
                        preview.insertAdjacentHTML('afterbegin', `
                        <div class="preview-image col-3">
                            <div class="preview-remove " data-name="${result.name}">&times;</div>
                            <img src="${src}" alt="${result.name}" class="preview-element-image"/>
                        </div>`);
                        preview.insertAdjacentElement('beforeend', open)
                        open.classList.add('col-3')

                    }
                   
                    reader.readAsDataURL(result);

                    formData.append('file', result, result.name);
                    
                   
                    // Send the compressed image file to server with XMLHttpRequest.
                    //   axios.post('/path/to/upload', formData).then(() => {
                    //     console.log('Upload success');
                    //   });
                },
                error(err) {
                  console.log(err.message);
                },
              });

            
        });

    }
    const removeHandler = event => {
        if (!event.target.dataset.name) {
            return
        }
        if(files.length <= 8) {
            open.classList.remove('d-none')
        } 
        const {
            name
        } = event.target.dataset
        files = files.filter(file => file.name !== name)

        const block = preview.querySelector(`[data-name="${name}"]`)
            .closest('.preview-image')
        block.classList.add('removing')
        setTimeout(() => block.remove(), 300)
    }

    open.addEventListener('click', triggerInput)
    input.addEventListener('change', changeHandler)
    preview.addEventListener('click', removeHandler)
}


$(document).on('click', '.add-product-btn', function() {
    var gallery = $('.preview-element-image').attr('src');
    formData.append('_token', $('meta[name=csrf-token]').attr("content"));

    // var formData = new FormData($('#add_address'));
    
    let cat_id = $(this).closest('form').find('select[name="cat_id"]').val();
    let name = $(this).closest('form').find('input[name="name"]').val();
    let description = $(this).closest('form').find('textarea[name="description"]').val();
    let quantity = $(this).closest('form').find('input[name="quantity"]').val();
    let image = $(this).closest('form').find('input[name="image"]')[0].files[0];

    formData.append('cat_id', cat_id);
    formData.append('name', name);
    formData.append('description', description);
    formData.append('quantity', quantity);
    formData.append('image', image);
    formData.append('gallery', gallery);
    console.log(formData);
    $.ajax({
        url: '/product/store/test',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: false,
        processData: false,
        data: formData,
        success: (data) => {
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.log(status)
        }
    });
});