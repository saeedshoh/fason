require('sweetalert2')
require('./bootstrap');
// require('./components/navbar');
// require('./components/dropdowns');
require('./components/charts');
require('./components/Chart.extension');
// require('./components/highlight');
// require('./components/tooltip');
// require('./components/dropzone');
require('./components/select2');
require('./components/wizard');
// require('./components/quill.js');
// require('./main.js');

import Swal from 'sweetalert2'
const Toast = Swal.mixin({
    toast: true,
    position: 'top-center',
    showConfirmButton: false,
    timer: 2000,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

$('body').on('click', '.delete-confirm', function(event) {
    var form =  $(this).closest("form");
    event.preventDefault();
    Swal.fire({
        title: 'Вы уверены?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Отмена',
        confirmButtonText: 'Удалить',
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })
});

require('./components/list');
