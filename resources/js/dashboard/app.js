require('sweetalert2')
require('./bootstrap');
require('./components/charts');
require('./components/Chart.extension');
require('./components/wizard');
import Swal from 'sweetalert2'

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

$(document).on('change', '.order_no', function() {
    const id = $(this).data('id')
    const sibling = $(this).find('option:selected').val()
    $.ajax({
        url: '/dashboard/changeCategoryOrder',
        data: {
            category: id,
            sibling: sibling
        },
        method: "GET",
        dataType : 'json',
        success: function( data ) {
            location.reload(true);
        }
    })
})

require('./components/list');
